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

class banner extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model ( 'banner_model' );
	}

	/**
	 * Function for displaying banner in home screen
	 * @return (View)
	 */
	public function view () {
		$data['result'] = $this->banner_model->get_banner();

		return $this->load->view ( TPL_PAGE_TEMPLATES.'banner', $data, true );
	}
}
?>