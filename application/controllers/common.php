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

class common extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function load_language()
	{
		$this->lang->load('labels', 'english');
	}

	/**
	 * GET BREADCRUMBS
	 * @param $page
	 * @return $container
	 * --------------------------------------------
	 */
	public function get_breadcrumbs($page)
	{
		$class = array('class'=>'breadcrumbs clearfix bread-crumb');
		$container = element_tag('ul', 'open', $class);
		$container.= element_tag('li', 'open', array('class'=>'no-arrow'));
		$container.= anchor(base_url().'home/', $this->lang->line('LBL_00009'));
		$container.= element_tag('li');
		$container.= element_tag('li', 'open', array('class'=>'current'));
		$container.= anchor(base_url().$page.'/', str_replace('_', ' ', $page));
		$container.= element_tag('li');
		$container.= element_tag('ul');

		return $container;
	}

	/**
	 * GET FORM
	 * @param $form_path
	 * @param $form
	 * @param $data
	 * @return
	 * --------------------------------------------
	 */
	public function get_form($form_path, $form, $data = null)
	{
		$form = $form.'_form';

		if(is_null($data)){
			return $this->load->view($form_path.$form, '', true);
		}
		else {
			return $this->load->view($form_path.$form, $data, true);
		}
	}

	/**
	 * CREATES LIST
	 * @param $title
	 * @param $value
	 * @return
	 * --------------------------------------------
	 */
	public function get_list($title, $value)
	{
		$data['title'] = $title;
		$data['list']  = json_decode($value);

		return $this->load->view('pages/templates/list', $data, true);
	}

	/**
	 * CREATES BOX HEADER
	 * @param $title
	 * @return $heading
	 * --------------------------------------------
	 */
	static function box_header($title)
	{
		return heading($title, '3', 'class="box-header"');
	}


	/**
	 * CHECK DATA IF NULL
	 * @param $data
	 * @return $data
	 * --------------------------------------------
	 */
	static function checkData($data)
	{
		(isset($data) && !empty($data))?
		  $data = $data
		: $data = '';

		return $data;
	}
}
?>