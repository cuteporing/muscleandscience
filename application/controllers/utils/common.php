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
	 * Get form
	 * @param (String) $form_path
	 * @param (Form) $form
	 * @param (Object) $data
	 * @return (View)
	 */
	public function get_form($form_path, $form, $data = null) {
		$form = $form.'_form';

		if ( is_null( $data ) ) {
			return $this->load->view($form_path.$form, '', true);
		}
		else {
			return $this->load->view($form_path.$form, $data, true);
		}
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

	/**
	 * Create box header
	 * @param (String) $title
	 * @return $heading
	 */
	static function box_header($title) {
		return heading($title, '3', 'class="box-header"');
	}


	/**
	 * Check if data is null
	 * @param (Object) $data
	 * @return (Object) $data
	 */
	static function checkData($data) {
		(isset($data) && !empty($data))?
			$data = $data
		:	$data = '';

		return $data;
	}

// 	public static function createErrorMsg( $errorCode ) {
// 		if ( isset( $errorCode ) && !empty( $errorCode ) ){
// 			if( !defined( $errorCode ) ){
// 				$errorMsg = $errorCode;
// 			} else {
// 				$errorMsg = constant($errorCode);
// 			}

// 			Logger::error( $errorMsg );
// 		} else {
// 			$errorMsg = "";
// 		}

// 		return $errorMsg;
// 	}

// 	public static function createResponse( $errorCode, $data ) {
// 		$msg['responseName'] = $_POST['responseName'];
// 		$msg['errorCode']    = self::createErrorCode( $errorCode );
// 		$msg['errorMsg']     = self::createErrorMsg( $errorCode );
// 	}
}
?>