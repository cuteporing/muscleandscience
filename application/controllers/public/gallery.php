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

class gallery extends CI_controller {

	private $params    = array ();
	private $view_type = null;

	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'gallery_model' );
	}

	private function clear_params() {
		$this->params = array ();
	}

	private function get_params() {
		$this->clear_params ();

		if ( $this->view_type == "public_album" ) {
			$this->params ['where'] = array (
				"deleted" => 0, "view" => "public" );
		}
	}

	public function get_public_album( ) {
		$this->view_type = "public_album";

		$this->get_params ();


	}

	public function view( $page ) {
		$common = new common ();
		$data ['breadcrumbs']  = $common->get_breadcrumbs ( $page );

		$this->load->view ( 'pages/' . $page, $data );

	}

}
?>