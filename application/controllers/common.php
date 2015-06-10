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
		// $this->lang->load('error', 'english');
	}

	/**
	 * GET BREADCRUMBS
	 * @param (String) $page
	 * @return $container
	 * --------------------------------------------
	 */
	public function get_breadcrumbs($page)
	{
		$class = array('class'=>'breadcrumbs clearfix bread-crumb');
		$container = element_tag('ul', 'open', $class);
		$container.= element_tag('li', 'open', array('class'=>'no-arrow'));
		$container.= anchor(base_url().'home/', $this->lang->line('lbl_home'));
		$container.= element_tag('li', 'close');
		$container.= element_tag('li', 'open', array('class'=>'current'));
		$container.= anchor(base_url().$page.'/', $page);
		$container.= element_tag('li', 'close');
		$container.= element_tag('ul', 'close');

		return $container;
	}

	/**
	 * CHECK DATA IF NULL
	 * @param (Object) $data
	 * @return (Object) $data
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