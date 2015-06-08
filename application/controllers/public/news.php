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
		}
		print_r($result_post);
	}

	public function view_latest_news()
	{

	}
}