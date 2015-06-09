<?php
/*********************************************************************************
** The contents of this file are subject to the MAS (Muscle and Science)
 * Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: MAS (Muscle and Science)
 * The Initial Developer of the Original Code is Krishia Valencia.
 * Portions created by KBVCodes are Copyright (C) KBVCodes.
 * All Rights Reserved.
 *
 ********************************************************************************/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class news extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}

	static function show_all_btn()
	{
		$btn = anchor('news/', 'Show all', array(
			'class' => 'more icon-small-arrow margin-right-white',
			'title' => 'Show all' ));

		return div($btn, array('class'=>'show-all'));
	}

	/**
	 * EXTRACT POST TAGS
	 * @param $data
	 * @return $tags
	 * --------------------------------------------
	 */
	public function extract_post_tags($data)
	{
		$tags = array();

		if(!is_null($data)){
			foreach($data as $key => $val) {
				array_push($tags, $val['tag_name']);
			}
		}

		return $tags;
	}

	/**
	 * GET COMMENT BOX
	 * @param $data
	 * @return $container
	 * --------------------------------------------
	 */
	public function comment_box($data)
	{
		$day  = format::format_date($data['update_datetime'],'d');
		$month= format::format_date($data['update_datetime'],'M');

		$contents = div($day.span($month,array('class'=>'second-row')), array('class'=>'first-row'));
		$contents.= anchor('#', $data['comment_count'], array(
			'title'=>$data['comment_count'].' comment/s',
			'class'=>'comments-number'
			));
		$container = div($contents, array('class'=>'comment-box'));
		return $container;
	}

	/**
	 * GET POST IMAGE
	 * @param $path
	 * @param $title
	 * @param $id
	 * @return $img
	 * --------------------------------------------
	 */
	public function get_post_img($path, $title, $id)
	{
		$img = "";
		if($path != "")
		{
			$img = anchor('#', img($path), array(
				'class'=>'post-image',
				'title'=>$title));
		}
		return $img;
	}

	/**
	 * GET POST TITLE
	 * @param $title
	 * @param $slug
	 * @return $heading
	 * --------------------------------------------
	 */
	public function get_post_title($link, $title, $slug)
	{
		$content = anchor($link.$slug, $title, array('title'=> $title));
		$heading = heading($content, '2');

		return $heading;
	}

	/**
	 * GET POST DESCRIPTION
	 * @param $data
	 * @return $description
	 * --------------------------------------------
	 */
	public function get_description($data, $char_limit = 0)
	{
		$description = "";
		foreach ($data as $row) {
			($char_limit != 0)?
				$description.=character_limiter($row, $char_limit)
			: $description.= $row;
		}
		return $description;
	}

	/**
	 * GET POST TAGS
	 * @param $data
	 * @return $tags
	 * --------------------------------------------
	 */
	public function get_post_tag($data)
	{
		$tags = "";
		foreach ($data as $tag_name) {
			$tag_slug = str_replace(" ", "-", $tag_name);

			$tags.= element_tag('li', 'open');
			$tags.= anchor('news/'.$tag_slug, $tag_name, array('title'=>$tag_name));
			$tags.= element_tag('li', 'close');
		}
		return $tags;
	}

	/**
	 * GET POST FOOTER
	 * @param $data
	 * @return $description
	 * --------------------------------------------
	 */
	public function get_post_footer($author, $tags)
	{
		$author = $this->lang->line('lbl_posted_by').
			anchor('#', $author['firstname'].' '.$author['lastname'],
			array('class'=>'author'));

		$contents = element_tag('ul', 'open', array('class'=>'categories'));
		$contents.= element_tag('li', 'open', array('class'=>'posted-by'));
		$contents.= $author;
		$contents.= element_tag('li', 'close');
		$contents.= $this->get_post_tag($tags);
		$contents.= element_tag('ul', 'close');
		$container = div($contents, array('class'=>'post-footer'));

		return $container;
	}

	/**
	 * GET POST CONTENTS
	 * @param $data
	 * @return $container
	 * --------------------------------------------
	 */
	public function post_content($data, $char_limit = 0)
	{
		$content = $this->get_post_img($data['image'], $data['title'], $data['id']);
		$content.= $this->get_post_title('news/',$data['title'],$data['slug']);
		$content.= $this->get_description($data['description'], $char_limit);
		$content.= $this->get_post_footer($data['author'], $data['tags']);
		if($char_limit > 0){
			$content.= anchor('news/'.$data['slug'], 'More', array(
				'class'=>'more icon-small-arrow margin-right-white',
				'title'=>$data['title'],
				'id'   =>'superb'));
		}
		$container = div($content, array('class'=>'post-content'));

		return $container;
	}

	/**
	 * GET NEWS LIST
	 * @param $data
	 * @return $list
	 * --------------------------------------------
	 */
	public function news_list($data, $char_limit)
	{
		$list = '';

		foreach ($data as $row) {
			$list.= element_tag('li', 'open', array('class'=>'post'));
			$list.= $this->comment_box($row);
			$list.= $this->post_content($row, $char_limit);
			$list.= element_tag('li', 'close');
		}

		return $list;
	}

	/**
	 * GET LATEST NEWS
	 * @return $result_post
	 * --------------------------------------------
	 */
	public function get_latest_news()
	{
		$params = array();
		$params['limiter']['limit'] = 2;
		$params['where']    = array("deleted" => 0);
		$params['order_by'] = array("update_datetime" => "desc");

		$result_post = $this->news_model->get_news($params);

		if(!is_null($result_post)){
			for($i = 0; $i < count($result_post); $i++){
				$post_id   = $result_post[$i]['id'];
				$author_id = $result_post[$i]['update_user_id'];

				// search paramter for post description
				$params['limiter']['limit']  = 1;
				$params['where']    = array("post_id"  => $post_id);
				$params['order_by'] = array("sequence" => "asc");

				// get post description
				$result_details = $this->news_model->get_news_details($params);
				// get tags
				$result_tags    = $this->news_model->get_news_tags($post_id);
				// get news author
				$result_author  = $this->news_model->get_news_author($author_id);

				$result_post[$i]['author'] = $result_author[0];
				$result_post[$i]['tags'] = $this->extract_post_tags($result_tags);
				$result_post[$i]['description'] = $result_tags;
				$result_post[$i]['description'] = array($result_details[0]['description']);
				$result_post[$i]['comment_count'] = $this->news_model->get_comment_count(
					$result_post[$i]['id']);
			}
		}

		return $result_post;
	}

	/**
	 * VIEW LATEST NEWS
	 * @return $container
	 * --------------------------------------------
	 */
	public function view_latest_news()
	{
		$container = "";
		$result = $this->get_latest_news();
		if(count($result) > 0 and !is_null($result)){
			$class = array('class'=>'blog clearfix animated fadeIn');
			$container = element_tag('ul', 'open', $class);
			$container.= $this->news_list($result, 450);
			$container.= '</ul>';
			$container.= self::show_all_btn();
		}

		return $container;
	}

	static function cannot_find_page($total_rows, $offset)
	{
		$return_value = false;
		if ( $offset > $total_rows ){
			$return_value = true;
		}
		return $return_value;
	}

	public function get_all_news()
	{
		$page = str_replace('/', '', $this->uri->slash_segment(2, 'leading'));

		(!$page)? $offset = 0 : $offset = $page;
		$params = array();
		$total_rows = $this->news_model->get_news_count($params);

		if( self::cannot_find_page($total_rows, $offset) ){
			return show_404();
		}
		$params['limiter']['limit'] = 10;
		$params['limiter']['offset'] = $offset;
		$params['where']    = array("deleted" => 0);
		$params['order_by'] = array("update_datetime" => "desc");

		$result_post = $this->news_model->get_news($params);

		if(!is_null($result_post)){
			for($i = 0; $i < count($result_post); $i++){
				$post_id   = $result_post[$i]['id'];
				$author_id = $result_post[$i]['update_user_id'];

				// search paramter for post description
				$params['limiter']['limit']  = 1;
				$params['where']    = array("post_id"  => $post_id);
				$params['order_by'] = array("sequence" => "asc");

				// get post description
				$result_details = $this->news_model->get_news_details($params);
				// get tags
				$result_tags    = $this->news_model->get_news_tags($post_id);
				// get news author
				$result_author  = $this->news_model->get_news_author($author_id);

				$result_post[$i]['author'] = $result_author[0];
				$result_post[$i]['tags'] = $this->extract_post_tags($result_tags);
				$result_post[$i]['description'] = $result_tags;
				$result_post[$i]['description'] = array($result_details[0]['description']);
				$result_post[$i]['comment_count'] = $this->news_model->get_comment_count(
					$result_post[$i]['id']);
			}
		}

		return $result_post;
	}

	/**
	 * VIEW
	 * @return $container
	 * --------------------------------------------
	 */
	public function view($page)
	{
		$view_type = str_replace('/', '', $this->uri->slash_segment(2, 'leading'));

		if(!$view_type || is_numeric($view_type)){
			
			$container = "";
			$result = $this->get_all_news();
			if(count($result) > 0 and !is_null($result)){
				$class = array('class'=>'blog clearfix animated fadeIn');
				$container = element_tag('ul', 'open', $class);
				$container.= $this->news_list($result, 450);
				$container.= '</ul>';
			}

			

			$data['news_list'] = $container;

			$this->load->view('pages/'.$page, $data);
		}else{
		}
	}
}