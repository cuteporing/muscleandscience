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
				'gentelella/progressbar/bootstrap-progressbar.min.js',
				'gentelella/icheck/icheck.min.js',
				'gentelella/custom.js',
				'gentelella/datatables/js/jquery.dataTables.js',
				'account/controller/tableController.js'
		);
	}

	/**
	 * Admin view
	 * @param (String) $page
	 */
	public function admin_view($page) {
		$view_type = str_replace( '/', '', $this->uri->slash_segment( 3, 'leading' ) );

		// View Gym members
		if( $view_type == "gym" ) {
			$result = $this->members_model->get_active_gym_members();
			for( $i = 0; $i < count($result); $i++) {
				if( $result[$i]['balance'] > 0 ) {
					$result[$i]['balance'] = $result[$i]['balance'].' <span class="label label-danger">Unpaid</span>';
				}
			}
		}
		// View Personal Training members
		elseif ( $view_type == "pt" ) {
			$result = $this->members_model->get_active_pt_members();
			for( $i = 0; $i < count($result); $i++) {
				if( $result[$i]['balance'] > 0 ) {
					$result[$i]['balance'] = $result[$i]['balance'].' <span class="label label-danger">Unpaid</span>';
				}
			}
		}
		// View Unpaid members
		elseif( $view_type == "unpaid" ) {
			$result = $this->members_model->get_unpaid_members();
		}
		else {
			$action = str_replace( '/', '', $this->uri->slash_segment( 4, 'leading' ) );
			$id     = str_replace( '/', '', $this->uri->slash_segment( 5, 'leading' ) );
			if( $action == "view") {
				$result['member_profile'] = $this->user_model->search_user($id);

			}

		}

		$data['page']  = strtolower( str_replace( "-", " ", $page ) );
		$data['title'] = ucfirst( $data['page'] );
		$data['footer_scripts'] = $this->get_script();
		$data['sidebar'] = $this->sidebar_model->get_sidebar();
		$data['result'] = $result;

		if( $view_type != "profile" ) {
			$data['page_title']    = "List of active members";
			$data['page_subtitle'] = "Gym and Personal Training";
			$data['has_check']     = true;
			$data['has_action']    = true;
			$data['action_view']   = "account/members/profile/view/";
			$data['action_delete'] = "account/members/profile/delete/";
			$data['list']  = $this->load->view(TPL_ACCOUNT_TEMPLATES.'table_dynamic', $data, true);
		} else {
			$data['profile'] = $this->load->view(TPL_ACCOUNT_TEMPLATES.'member_profile', $data, true);
		}

		$this->load->view( TPL_ACCOUNT_TEMPLATES.'header', $data );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'sidebar' );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'top_navigation' );
		$this->load->view( TPL_ACCOUNT.$page );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'footer' );
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

		if( $this->user_model->get('user_kbn') > 10 ) {
			$this->admin_view($page);
		} else {

		}
	}
}
?>