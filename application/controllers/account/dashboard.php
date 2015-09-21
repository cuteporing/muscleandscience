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
					'count'    => $this->members_model->count_gym_members(),
					'icon'     => 'fa fa-caret-square-o-right',
					'title'    => $this->lang->line('LBL_00043'),
					'subtitle' => $this->lang->line('LBL_00046')
			);
			array_push($result, $temp);

			// Get total personal training members
			$temp = array(
					'count'    => $this->members_model->count_pt_members(),
					'icon'     => 'fa fa-comments-o',
					'title'    => $this->lang->line('LBL_00044'),
					'subtitle' => $this->lang->line('LBL_00047')
			);
			array_push($result, $temp);

			// Get members with pending balance
			$temp = array(
					'count'    => $this->members_model->count_unpaid_members(),
					'icon'     => 'fa fa-sort-amount-desc',
					'title'    => $this->lang->line('LBL_00045'),
					'subtitle' => $this->lang->line('LBL_00048')
			);
			array_push($result, $temp);

			// Get new sign ups
			$temp = array(
					'count'    => $this->user_model->count_new_user(),
					'icon'     => 'fa fa-check-square-o',
					'title'    => $this->lang->line('LBL_00019'),
					'subtitle' => $this->lang->line('LBL_00049')
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
	public function get_monthly_gym() {
		$data['result'] = $this->members_model->month_enrolled_gym_members();

		$config['title']    = "Gym Members";
		$config['subtitle'] = "Enrolled for the month of ".date('F');
		$config['content']  = $this->load->view(
				TPL_ACCOUNT_TEMPLATES.'table_hover', $data, true );

		$widget = new widget();
		$widget->initialize($config);
		return $widget->create_widget();
	}

	/**
	 * Gete top 5 personal training members
	 */
	public function get_monthly_pt() {
		$data['result'] = $this->members_model->month_enrolled_pt_members();

		$config['title']    = "PT Members";
		$config['subtitle'] = "Enrolled for the month of ".date('F');
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
		array_push($widgets, $this->get_monthly_gym());
		array_push($widgets, $this->get_monthly_pt());

		$data['page']           = strtolower( str_replace( "-", " ", $page ) );
		$data['title']          = ucfirst( $data['page'] );
		$data['top_tiles']      = $this->get_toptiles();
		$data['footer_scripts'] = $this->get_script();
		$data['sidebar']        = $this->sidebar_model->get_sidebar();
		$data['widgets']        = $widgets;

		$this->load->view( TPL_ACCOUNT_TEMPLATES.'header', $data );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'sidebar' );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'top_navigation' );
		$this->load->view( TPL_ACCOUNT.$page );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'footer' );
	}
}
?>
