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
	private static $instance;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Get breadcrumbs
	 * @param (String) $page
	 * @return (View)
	 */
	public function get_breadcrumbs($page) {
		$data['page'] = $page;
		return $this->load->view( TPL_PAGE_TEMPLATES.'breadcrumbs', $data, true);
	}


	/**
	 * Create list
	 * @param (String) $title
	 * @param (Json) $value
	 * @return (View)
	 */
	public static function get_list($title, $value) {
		if (!self::$instance)
			self::$instance = new self();

		$data['title'] = $title;
		$data['list']  = json_decode($value);

		return self::$instance->load->view( TPL_PAGE_TEMPLATES.'list', $data, true);
	}
}
?>