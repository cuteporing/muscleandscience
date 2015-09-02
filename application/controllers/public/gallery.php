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

class gallery extends pages {

	private $params;

	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'gallery_model' );

		$this->params = array ();
	}

	/**
	 * CLEAR PARAMTERES
	 */
	private function clear_params() {
		$this->params = array ();
	}


	/**
	 * GET PARAMETERS
	 * @param <string> $type
	 */
	private function get_params( $type ) {
		$this->clear_params ();

		if( $type == "public_album" ) {
			$this->params ['where'] = array ( "deleted" => 0, "view" => "public" );
		}
	}

	/**
	 * GET PUBLIC ALBUM
	 */
	public function get_public_album( ) {

		$this->get_params ( "public_album" );

		$result = $this->gallery_model->get_album ( $this->params );
		print_r( $result, 1 );
		return $result;
	}

	/* (non-PHPdoc)
	 * @see pages::view()
	 */
	public function view( $page ) {
		$common = new common ();
		$data ['result']       = $this->get_public_album();
		$data ['breadcrumbs']  = $common->get_breadcrumbs ( $page );

		$this->load->view ( 'pages/' . $page, $data );

	}

}
?>