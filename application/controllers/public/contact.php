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

class contact extends pages {

	private $params;

	public function __construct() {
		parent::__construct ();
		$this->params = array ();
		$this->load->model ( 'company_model' );
	}

	private function clear_params() {
		$this->params = array ();
	}

	private function get_params( $type ) {
		$this->clear_params ();
	}

	public function get_public_album( ) {
	}

	public function view( $page ) {
		$common = new common ();
		$data ['breadcrumbs']  = $common->get_breadcrumbs ( $page );
		$data ['company_info'] = $this->company_model->get_company_info ();

		$this->load->view ( 'pages/' . $page, $data );
	}

}
?>