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
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

	require_once( PATH_UTILS.'common.php');
	require_once( PATH_ACCOUNT.'dashboard.php' );

class Account extends CI_controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model( 'sidebar_model' );
	}

	public function view($page = 'dashboard') {
		$data ['page']  = strtolower( str_replace( "-", " ", $page ));
		$data ['title'] = ucfirst ( $page );

		// Initialize controller
		if( $page == "members" )
			$instance = new Members();
		else
			$instance = new Dashboard();

		// Initialize view
		$instance->view($page);

	}
}
?>
