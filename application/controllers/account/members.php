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
if(! defined( 'BASEPATH' ))
	exit( 'No direct script access allowed' );

class Members extends CI_controller {

	public function __construct() {
		parent::__construct();
		$this->load->model( 'sidebar_model' );
		$this->load->model('members_model');
	}

	/**
	 * Get js script source
	 * @return (Array) -- JS script source
	 */
	private function get_script() {
		return array(
				'gentelella/bootstrap.min.js',
				'gentelella/nicescroll/jquery.nicescroll.min.js',
				'gentelella/chartjs/chart.min.js',
				'gentelella/icheck/icheck.min.js',
				'gentelella/custom.js',
				'gentelella/datatables/js/jquery.dataTables.js',
				'account/controller/tableController.js'
		);
	}

	/**
	 * View gym members
	 * @param (String) $page
	 * @return (View)
	 */
	public function view($page) {
		if( !$this->user_model->authenticated() ) {
			redirect('', 'refresh');
		}

		$view_type = str_replace( '/', '', $this->uri->slash_segment( 3, 'leading' ) );

		// View Gym members
		if( $view_type == "gym" ) {
			$result = $this->members_model->get_gym_members();
		// View Personal Training members
		} elseif ( $view_type == "pt" ) {
			$result = $this->members_model->get_pt_members();
		}

		$data['page']  = strtolower( str_replace( "-", " ", $page ) );
		$data['title'] = ucfirst( $data['page'] );
		$data['footer_scripts'] = $this->get_script();
		$data['sidebar'] = $this->sidebar_model->get_sidebar();
		$data['result']  = $result;
		$data['has_check'] = true;
		$data['has_action'] = true;
		$data['list']  = $this->load->view(TPL_ACCOUNT_TEMPLATES.'table_dynamic', $data, true);

		$this->load->view( TPL_ACCOUNT_TEMPLATES.'header', $data );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'sidebar', $data );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'top_navigation' );
		$this->load->view( TPL_ACCOUNT.$page );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'footer', $data );
	}
}
?>