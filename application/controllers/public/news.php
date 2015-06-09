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
		$btn = anchor('view/news/', 'Show all', array(
			'class' => 'more icon-small-arrow margin-right-white',
			'title' => 'Show all' ));

		return div($btn, array('class'=>'show-all'));
	}

	/**
	 * GET LATEST NEWS
	 * @return
	 * --------------------------------------------
	 */
	public function get_latest_news()
	{
		$params = array();
		$params['limiter']['limit'] = 2;
		$params['where']    = array("deleted" => 0);
		$params['order_by'] = array("update_datetime" => "desc");

		$result_post = $this->news_model->get_news($params);

		for($i = 0; $i < count($result_post); $i++){
			$post_id = $result_post[$i]['id'];
			$params['limiter']['limit']  = 1;
			$params['where']    = array("post_id"  => $post_id);
			$params['order_by'] = array("sequence" => "asc");
			$result_details = $this->news_model->get_news_details($params);

			$result_post[$i]['description'] = $result_details[0]['description'];
			$result_post[$i]['comment_count'] = $this->news_model->get_comment_count(
				$result_post[$i]['id']);
		}

		return $result_post;
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
			'title'=>$data['comment_count'].' comments',
			'class'=>'comments-number'
			));
		$container = div($contents, array('class'=>'comment-box'));
		return $container;
	}

	public function post_content($data)
	{

	}

	/**
	 * GET NEWS LIST
	 * @param $data
	 * @return $list
	 * --------------------------------------------
	 */
	public function news_list($data)
	{
		$list = '';

		foreach ($data as $row) {
			$list.= element_tag('li', 'open', array('class'=>'post'));
			$list.= $this->comment_box($row);
			$list.= element_tag('li', 'close');
		}

		return $list;
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
		if(count($result) > 0){
			$container = '<ul class="blog clearfix fadeInDown">';
			$container.= $this->news_list($result);
			$container.= '</ul>';
			$container.= self::show_all_btn();
		}

		return $container;
	}
}