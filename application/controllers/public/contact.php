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

class Contact extends Pages {

	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'gym_class_model' );
		$this->load->model ( 'company_info_model' );
	}

	public function view( $page ) {
		$data ['breadcrumbs']  = $this->load->view(
				TPL_PAGE_TEMPLATES.'breadcrumbs', '', true);
		$data ['company_info'] = $this->company_info_model->get_company_info ();

		$this->load->view ( 'pages/' . $page, $data );
	}

}
?>