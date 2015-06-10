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
	private $total_rows      = 0;
	private $blog_limit      = 10;
	private $comments_limit  = 10;
	private $post_limit      = 1;
	private $blog_desc_limit = 1;
	private $per_page        = 0;
	private $params          = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		$this->load->library('pagination');
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
	 * @param $link
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
	 * @param $char_limit
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
			$tags.= anchor(base_url().'news/tag/'.$tag_slug, $tag_name, array('title'=>$tag_name));
			$tags.= element_tag('li', 'close');
		}
		return $tags;
	}

	/**
	 * GET POST FOOTER
	 * @param $author
	 * @param $tags
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
	 * @param $char_limit
	 * @return $container
	 * --------------------------------------------
	 */
	public function post_content($data, $char_limit)
	{
		$content = $this->get_post_img($data['image'], $data['title'], $data['id']);
		$content.= $this->get_post_title(base_url().'news/title/',$data['title'],$data['slug']);
		$content.= $this->get_description($data['description'], $char_limit);
		$content.= $this->get_post_footer($data['author'], $data['tags']);
		if($char_limit > 0){
			$content.= anchor(base_url().'news/title/'.$data['slug'], 'More', array(
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
	public function news_list($data, $char_limit = 0)
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
		$this->get_params('latest');

		$result_post = $this->news_model->get_news($this->params);

		if(!is_null($result_post)){
			for($i = 0; $i < count($result_post); $i++){
				$post_id   = $result_post[$i]['id'];
				$author_id = $result_post[$i]['update_user_id'];

				// search paramter for post description
				$this->params['limiter']['limit']  = $this->blog_desc_limit;
				$this->params['where']    = array("post_id"  => $post_id);
				$this->params['order_by'] = array("sequence" => "asc");

				// get post description
				$result_details = $this->news_model->get_news_details($this->params);
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

	/**
	 * IF OFFSET IS MORE THAN THE NO OF NEWS
	 * @param $total_rows
	 * @param $offset
	 * @return $return_value
	 * --------------------------------------------
	 */
	static function cannot_find_page($total_rows, $offset)
	{
		$return_value = false;
		if ( $offset > $total_rows ){
			$return_value = true;
		}
		return $return_value;
	}

	/**
	 * GET SEARCH PARAMETER
	 * @param $is_latest
	 * --------------------------------------------
	 */
	public function get_params($other = "", $other_offset = 0)
	{
		$type = str_replace('/', '', $this->uri->slash_segment(2, 'leading'));
		$page = str_replace('/', '', $this->uri->slash_segment(3, 'leading'));

		(!$page)? $offset = 0 : $offset = $page;

		if($other == "comments"){
			(!$other_offset)? $offset = 0 : $offset = $other_offset;
		}
		else{
			(!$page)? $offset = 0 : $offset = $page;
		}

		if( self::cannot_find_page($this->total_rows, $offset) ){
			return show_404();
		}

		$this->params = array();

		if($other == "latest"){
			$this->params['limiter']['limit'] = 2;
			$this->params['where']    = array("deleted" => 0);
			$this->params['order_by'] = array("update_datetime" => "desc");
		}
		elseif($other == "comments"){
			$this->params['limiter']['limit'] = $this->comments_limit;
			$this->params['order_by'] = array(TBL_COMMENTS.".update_datetime" => "desc");
		}
		elseif(!$type || $type == "blog"){
			$this->params['limiter']['limit'] = $this->blog_limit;
			$this->params['limiter']['offset'] = $offset;
			$this->params['where']    = array("deleted" => 0);
			$this->params['order_by'] = array("update_datetime" => "desc");
		}
		elseif($type == "post"){
			$this->params['limiter']['limit'] = $this->post_limit;
			$this->params['limiter']['offset'] = $offset;
			$this->params['where']    = array("deleted" => 0);
			$this->params['order_by'] = array("update_datetime" => "desc");
		}
		elseif($type == "title"){
			$this->params['limiter']['limit'] = $this->post_limit;
			$this->params['limiter']['offset'] = $offset;
			$this->params['where']    = array("deleted" => 0, "slug"=>$page);
			$this->params['order_by'] = array("update_datetime" => "desc");
		}
	}

	/**
	 * GET ALL NEWS
	 * @return $result_post
	 * --------------------------------------------
	 */
	public function get_all_news()
	{
		$type = str_replace('/', '', $this->uri->slash_segment(2, 'leading'));
		$page = str_replace('/', '', $this->uri->slash_segment(3, 'leading'));
		// get total rows
		$this->total_rows = $this->news_model->get_news_count($this->params);
		// get parameters
		$this->get_params();

		$result_post = $this->news_model->get_news($this->params);

		if(!is_null($result_post)){
			for($i = 0; $i < count($result_post); $i++){
				$post_id   = $result_post[$i]['id'];
				$author_id = $result_post[$i]['update_user_id'];

				// search paramter for post description
				if($type == "blog"){
					$params['limiter']['limit']  = $this->blog_desc_limit;
				}
				$this->params['where']    = array("post_id"  => $post_id);
				$this->params['order_by'] = array("sequence" => "asc");

				// get post description
				$result_details = $this->news_model->get_news_details($this->params);
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
	 * GET PAGINATION
	 * @param $view_type
	 * @return
	 * --------------------------------------------
	 */
	public function get_pagination($view_type)
	{
		$config['base_url'] = base_url().'news/'.$view_type.'/';
		$config['uri_segment'] = 3;
		$config['total_rows'] = $this->total_rows;
		$config['per_page'] = $this->per_page;
		$config['full_tag_open'] = '<ul class="pagination clearfix">';
		$config['full_tag_close'] = '</ul>';
		$config['cur_tag_open'] = '<li class="selected"><a>';
		$config['cur_tag_close'] = '</a><li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '<li>';
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['prev_link'] = 'previous';
		$config['next_link'] = 'next';
		$config['prev_tag_open']  = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open']  = '<li>';
		$config['next_tag_close'] = '</li>';
		$this->pagination->initialize($config);

		return $this->pagination->create_links();
	}

	/**
	 * GET COMMENT AUTHOR'S AVATAR
	 * @param $img_path
	 * @return $container
	 * --------------------------------------------
	 */
	public function get_comment_avatar($img_path)
	{
		$style = ' no-repeat; background-size: cover;';
		$style.= ' background-position: center center;';
		$container = div('&nbsp;', array(
			'class'=>'comment-author-avatar',
			'style'=>'background: url('.$img_path.' '.$style));

		return $container;
	}

	public function get_comment_details($data)
	{
		$author = ucfirst($data['firstname'].' '.$data['lastname']);
		$contents = anchor('#', $author, array('class'=>'author'));
		$container = div($contents, array('class'=>'comment-details'));

		return $container;
	}

	/**
	 * GET COMMENTS
	 * @param $post_id
	 * @param $offset
	 * @return $result
	 * --------------------------------------------
	 */
	public function get_comments($post_id = null, $offset = null)
	{
		if(!is_null($post_id)){
			$this->get_params();
			$this->params['limiter']['offset'] = $offset;
			$this->params['where'] = array(
				TBL_COMMENTS.".deleted" => 0,
				TBL_COMMENTS.".post_id" =>$post_id);

			$result = $this->news_model->get_comments($this->params);

			if(!is_null($result)){
				$class = array('class'=>'comment clearfix');

				foreach ($result as $row) {
					$list = $element_tag('li', 'open', $class);
					$list.= $this->get_comment_avatar($row['photo_thumb']);
				}
				$result = $list;
			}

			return $result;
		}
	}

	/**
	 * VIEW NEWS
	 * @param $page
	 * @return $container
	 * --------------------------------------------
	 */
	public function view($page)
	{
		$view_type = str_replace('/', '', $this->uri->slash_segment(2, 'leading'));

		$container = "";
		$result = $this->get_all_news();
		$class  = array('class'=>'blog clearfix animated fadeIn');

		
		// SEARCH BY BLOG
		if(!$view_type || $view_type == "blog"){
			if(count($result) > 0 and !is_null($result)){
				$container = element_tag('ul', 'open', $class);
				$container.= $this->news_list($result, 450);
				$container.= element_tag('ul', 'close');
			}

				$this->per_page = $this->blog_limit;
				$data['pagination'] = $this->get_pagination($view_type);
			}
			// SEARCH BY SINGLE POST
			elseif($view_type == "post"){
				if(count($result) > 0 and !is_null($result)){
				$container = element_tag('ul', 'open', $class);
				$container.= $this->news_list($result, 450);
				$container.= element_tag('ul', 'close');
			}

				$this->per_page = $this->post_limit;
				$data['pagination'] = $this->get_pagination($view_type);
			}
			// SEARCH BY TITLE
			elseif($view_type == "title"){
				if(count($result) > 0 and !is_null($result)){
				$container = element_tag('ul', 'open', $class);
				$container.= $this->news_list($result);
				$container.= element_tag('ul', 'close');
				$container.= $this->get_comments($result[0]['id'], 0);
			}

			$this->per_page = $this->post_limit;
			
		}
		$common = new common;
		$data['breadcrumbs'] = $common->get_breadcrumbs($page);
		$data['news_list']   = $container;
		$data['tag_list']    = $this->news_model->get_news_tags();

		$this->load->view('pages/'.$page, $data);
	}
}