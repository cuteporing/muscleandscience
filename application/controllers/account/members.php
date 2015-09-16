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

class Members extends Account {

	public function __construct() {
		parent::__construct();
		$this->load->model('members_model');
	}

	private function get_styles() {
		return array(
				'gentelella/datatables/tools/css/dataTables.tableTools.css'
		);
	}

	/**
	 * Get js script source
	 */
	private function get_script() {
		return array(
				'gentelella/bootstrap.min.js',
				'gentelella/nicescroll/jquery.nicescroll.min.js',
				'gentelella/chartjs/chart.min.js',
				'gentelella/icheck/icheck.min.js',
				'gentelella/custom.js',
				'gentelella/datatables/js/jquery.dataTables.js',
// 				'gentelella/datatables/tools/js/dataTables.tableTools.js',
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


		$data['page']  = strtolower( str_replace( "-", " ", $page ) );
		$data['title'] = ucfirst( $data['page'] );
		$data['header_styles'] = $this->get_styles();
		$data['footer_scripts'] = $this->get_script();
		$data['sidebar'] = $this->sidebar_model->get_sidebar();

		$this->load->view( TPL_ACCOUNT_TEMPLATES.'header', $data );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'sidebar', $data );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'top_navigation' );
		$this->load->view( TPL_ACCOUNT.$page );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'footer', $data );
	}
}
?>