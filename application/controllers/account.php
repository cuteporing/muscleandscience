<?php
// /*********************************************************************************
//  ** The contents of this file are subject to the MAS (Muscle and Science)
//  * Public License Version 1.0
//  * ("License"); You may not use this file except in compliance with the License
//  * The Original Code is: MAS (Muscle and Science)
//  * The Initial Developer of the Original Code is Krishia Valencia.
//  * Portions created by KBVCodes are Copyright (C) KBVCodes.
//  * All Rights Reserved.
//  *
//  ********************************************************************************/
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

	require_once( PATH_UTILS.'common.php');

class Account extends CI_controller {
	public function __construct() {
		parent::__construct ();
	}

	/**
	 * GET HEADER
	 * @param (Object) $data
	 * @return (View)
	 */
	public function getHeader($data) {
		$data ['title'] = ucfirst(str_replace('_', ' ', $data ['title']));
		$this->load->view ( TPL_ACCOUNT_TEMPLATES.'header', $data );
	}

// 	public function getSidebar() {
// 		return $this->load->view ( TPL_ACCOUNT_TEMPLATES.'sidebar' );
// 	}

	public function view($page = 'dashboard') {

		if (! file_exists ( APPPATH . "/views/account/{$page}.php" )) {
			show_404 ();
		}

		$common = new common ();
		$common->load_language ();

		$data ['page']  = strtolower( str_replace( "-", " ", $page ));
		$data ['title'] = ucfirst ( $page );


		$this->getHeader ( $data );

		// Initialize page display
		switch ($page) {
			case 'setting':
				break;
			default :
					require_once( PATH_ACCOUNT.'dashboard.php' );

				$dashboard = new Dashboard ();
				$dashboard->view ( $page );
				break;
		}
	}
}
// ?>
