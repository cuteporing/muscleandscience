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
		$this->load->model('members_model');
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
			'gentelella/custom.js',
			'account/controller/dashboardController.js',
		);
	}

	public function get_toptiles() {
		$result = array();
		if( $this->user_model->get_user_kbn() != 10 ) {
			// Get total members
			$temp = array(
					'count' => $this->members_model->count_gym_members(),
					'icon'  => 'fa fa-caret-square-o-right',
					'title' => 'Gym Members',
					'subtitle' => 'Total number of gym members'
			);
			array_push($result, $temp);

			// Get total personal training members
			$temp = array(
					'count' => $this->members_model->count_pt_members(),
					'icon'  => 'fa fa-comments-o',
					'title' => 'Personal Training',
					'subtitle' => 'Total number of PT members'
			);
			array_push($result, $temp);

			// Get members with pending balance
			$temp = array(
					'count' => $this->members_model->count_unpaid_members(),
					'icon'  => 'fa fa-sort-amount-desc',
					'title' => 'Unpaid Members',
					'subtitle' => 'Total number of unpaid members'
			);
			array_push($result, $temp);

			// Get new sign ups
			$temp = array(
				'count' => $this->user_model->count_new_user(),
				'icon'  => 'fa fa-check-square-o',
				'title' => 'New Sign Ups',
				'subtitle' => 'There are accounts that needs activation'
			);
			array_push($result, $temp);
		} else {

		}
		$data['top_tiles_data'] = $result;

		return $this->load->view( TPL_ACCOUNT_TEMPLATES.'top_tiles', $data, true );
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
		$data['footer_scripts'] = $this->get_script();
		$data['sidebar'] = $this->sidebar_model->get_sidebar();
		$data['top_tiles'] = $this->get_toptiles();
		$data['gym_toplist'] = $this->members_model->top_gym_members();
		$data['pt_toplist'] = $this->members_model->top_pt_members();

		$this->load->view( TPL_ACCOUNT_TEMPLATES.'header', $data );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'sidebar', $data );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'top_navigation' );
		$this->load->view( TPL_ACCOUNT.$page );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'footer', $data );
	}
}
?>
