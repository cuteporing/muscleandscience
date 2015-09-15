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

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct ();
	}

	/**
	 * Get js script source
	 */
	private function get_script() {
		return array(
			'account/model/optionsModel.js',
			'account/model/responseModel.js',
			'account/controller/commonController.js',
			'account/controller/loginController.js'
		);
	}

	public function user_logout() {
		session_start();
		$this->session->unset_userdata('mas_user');
		session_destroy();
		return redirect('home', 'refresh');
	}

	public function user_login() {
		$this->user_model->set_username( $this->input->post('username') );
		$this->user_model->set_password( $this->input->post('password') );

		if( !$this->user_model->authenticated() ) {
			$this->response->generate( 'ERROR_00001' );
		} else {
			$this->response->generate( '', array(
					'redirect'=>base_url().'account/dashboard') );
		}
	}

	/**
	 * VIEW ACCOUNT DASHBOARD
	 * @param (String) $page
	 * @return (View)
	 */
	public function view($page = "login") {
		if( $this->user_model->authenticated() ) {
			redirect('account/dashboard', 'refresh');
		}
		$data['page']  = strtolower( str_replace( "-", " ", $page ) );
		$data['title'] = ucfirst( $data['page'] );
		$data['footer_scripts'] = $this->get_script();

		$this->load->view( TPL_ACCOUNT_TEMPLATES.'header', $data );
		$this->load->view( TPL_ACCOUNT."login" );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'footer', $data );
	}
}
?>
