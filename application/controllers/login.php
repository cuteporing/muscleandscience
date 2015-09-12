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

require ( 'users.php' );

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct ();
	}

	public function view($page = "login") {
		$data ['page']  = strtolower( str_replace( "-", " ", $page ));
		$data ['title'] = ucfirst ( $page );
		$this->load->view ( TPL_ACCOUNT.'login');
	}
}
?>
