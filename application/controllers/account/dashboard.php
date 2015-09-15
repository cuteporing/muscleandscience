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

class Dashboard extends Account {

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Get js script source
	 */
	private function get_script() {
		return array(
			'gentelella/bootstrap.min.js',
			'gentelella/nicescroll/jquery.nicescroll.min.js',
			'gentelella/chartjs/chart.min.js',
			'gentelella/progressbar/bootstrap-progressbar.min.js',
			'gentelella/icheck/icheck.min.js',
			'gentelella/moment.min2.js',
			'gentelella/datepicker/daterangepicker.js',
			'gentelella/sparkline/jquery.sparkline.min.js',
			'gentelella/custom.js',
			'gentelella/flot/jquery.flot.js',
			'gentelella/flot/jquery.flot.pie.js',
			'gentelella/flot/jquery.flot.orderBars.js',
			'gentelella/flot/jquery.flot.time.min.js',
			'gentelella/flot/date.js',
			'gentelella/flot/jquery.flot.spline.js',
			'gentelella/flot/jquery.flot.stack.js',
			'gentelella/flot/curvedLines.js',
			'gentelella/flot/jquery.flot.resize.js',
			'account/controller/dashboardController.js',
		);
	}

	/**
	 * VIEW ACCOUNT DASHBOARD
	 * @param (String) $page
	 * @return (View)
	 */
	public function view($page) {
		if( !$this->user_model->authenticated() ) {
			redirect('', 'refresh');
		}


		$data['page']  = strtolower( str_replace( "-", " ", $page ) );
		$data['title'] = ucfirst( $data['page'] );
		$data['current_user_name'] = $this->user_model->get_name();
		$data['footer_scripts'] = $this->get_script();

		$this->load->view( TPL_ACCOUNT_TEMPLATES.'header', $data );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'sidebar' );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'top_navigation' );
		$this->load->view( TPL_ACCOUNT.$page );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'footer', $data );
	}
}
?>
