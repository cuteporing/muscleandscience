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

class Gallery extends Pages {

	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'gallery_model' );
	}

	/**
	 * View gallery page
	 * @param (String) $page
	 */
	public function view( $page ) {
		$data ['result']       = $this->gallery_model->get_public_album();
		$data ['breadcrumbs']  = $this->load->view(
				TPL_PAGE_TEMPLATES.'breadcrumbs', '', true);

		$this->load->view ( 'pages/' . $page, $data );
	}

}
?>