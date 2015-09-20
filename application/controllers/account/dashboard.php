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

require( 'widget.php' );

class Dashboard extends CI_controller {

	public function __construct() {
		parent::__construct();
		$this->load->model( 'sidebar_model' );
		$this->load->model( 'members_model' );
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

	/**
	 * Get top tiles data
	 * @return view
	 */
	public function get_toptiles() {
		$result = array();
		if( $this->user_model->get('user_kbn')!= 10 ) {
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
	 * Get list of top 5 gym members
	 */
	public function get_gym_toplist() {
		$data['result'] = $this->members_model->top_gym_members();

		$config['title']    = "Top 5";
		$config['subtitle'] = "Gym Members";
		$config['content']  = $this->load->view(
				TPL_ACCOUNT_TEMPLATES.'table_hover', $data, true );

		$widget = new widget();
		$widget->initialize($config);
		return $widget->create_widget();
	}

	/**
	 * Gete top 5 personal training members
	 */
	public function get_pt_toplist() {
		$data['result'] = $this->members_model->top_pt_members();
		$config['title']    = "Top 5";
		$config['subtitle'] = "Personal Training Members";
		$config['content']  = $this->load->view(
				TPL_ACCOUNT_TEMPLATES.'table_hover', $data, true );

		$widget = new widget();
		$widget->initialize($config);
		return $widget->create_widget();

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

		$widgets = array();
		array_push($widgets, $this->get_gym_toplist());
		array_push($widgets, $this->get_pt_toplist());

		$data['page']  = strtolower( str_replace( "-", " ", $page ) );
		$data['title'] = ucfirst( $data['page'] );
		$data['top_tiles']      = $this->get_toptiles();
		$data['footer_scripts'] = $this->get_script();
		$data['sidebar']        = $this->sidebar_model->get_sidebar();
		$data['widgets']        = $widgets;



		$this->load->view( TPL_ACCOUNT_TEMPLATES.'header', $data );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'sidebar', $data );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'top_navigation' );
		$this->load->view( TPL_ACCOUNT.$page );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'footer', $data );
	}
}
?>
