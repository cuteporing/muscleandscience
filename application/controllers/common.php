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
	 *
	 * --------------------------------------------
	 * @param (String) $page
	 * @return $container
	 */
	public function get_breadcrumbs($page)
	{
		$data['page'] = $page;

		return $this->load->view( TPL_PAGE_BREADCRUMBS, $data, true);
	}

	/**
	 * GET FORM
	 *
	 * --------------------------------------------
	 * @param (String) $form_path
	 * @param (Form) $form
	 * @param (Object) $data
	 * @return (View)
	 */
	public function get_form($form_path, $form, $data = null)
	{
		$form = $form.'_form';

		if ( is_null( $data ) ) {
			return $this->load->view($form_path.$form, '', true);
		}
		else {
			return $this->load->view($form_path.$form, $data, true);
		}
	}

	/**
	 * CREATES LIST
	 *
	 * --------------------------------------------
	 * @param (String) $title
	 * @param (Json) $value
	 * @return (View)
	 */
	public function get_list($title, $value)
	{
		$data['title'] = $title;
		$data['list']  = json_decode($value);

		return $this->load->view( TPL_PAGE_LIST, $data, true);
	}

	/**
	 * CREATES BOX HEADER
	 *
	 * --------------------------------------------
	 * @param (String) $title
	 * @return $heading
	 */
	static function box_header($title)
	{
		return heading($title, '3', 'class="box-header"');
	}


	/**
	 * CHECK DATA IF NULL
	 *
	 * --------------------------------------------
	 * @param (Object) $data
	 * @return (Object) $data
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