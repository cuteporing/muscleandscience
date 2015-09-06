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

	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'gallery_model' );
	}

	/**
	 * VIEW GALLERY PAGE
	 * @param (String) $page
	 */
	public function view( $page ) {
		$common = new common ();
		$data ['result']       = $this->gallery_model->get_public_album();
		$data ['breadcrumbs']  = $common->get_breadcrumbs ( $page );

		$this->load->view ( 'pages/' . $page, $data );
	}

}
?>