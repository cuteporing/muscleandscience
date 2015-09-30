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

require( 'tabpanel.php' );

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

	public function custom_action_btn($id) {
		$btn_attr = array(
				'class'      => 'btn btn-default dropdown-toggle btn-xs',
				'data-toggle'=> 'dropdown',
				'type'       => 'button' );

		$custom_btn = '<div class="btn-group">';
		$custom_btn.= button('Action <span class="caret"></span>', $btn_attr );
		$custom_btn.= '<ul class="dropdown-menu">';
		$custom_btn.= '<li><a href="'.base_url().'modal/settle_payment/'.$id.'" id="settle-modal" data-toggle="modal" data-target="">Settle payment</a></li>';
		$custom_btn.= '<li><a href="#" id="payment-history-modal" >Check payment history</a></li>';
		$custom_btn.= '</ul></div>';

		return $custom_btn;

	}

	public function member_history($id) {
		$data['result'] = $this->members_model->get_membership_history($id);
		for( $i = 0; $i < count($data['result']); $i++) {
			if( $data['result'][$i]['balance'] > 0 ) {
				$data['result'][$i]['balance'] = $data['result'][$i]['balance'].' <span class="label label-danger">Unpaid</span>';
			} elseif ( $data['result'][$i]['balance'] == '0.00' ) {
				$data['result'][$i]['amount'] = $data['result'][$i]['amount'].' <span class="label label-success">Paid</span>';
				$data['result'][$i]['balance'] = 0;
			}

			$data['result'][$i]['Action'] = $this->custom_action_btn($data['result'][$i]['id']);
		}
		$data['has_num'] = true;
		return $this->load->view(TPL_ACCOUNT_TEMPLATES.'table_striped', $data, true);
	}

	public function get_admin_member_result($view_type) {
		$result = array();
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
		// Member's profile
		elseif( $view_type == "profile" ) {
			$action = str_replace( '/', '', $this->uri->slash_segment( 4, 'leading' ) );
			$id     = str_replace( '/', '', $this->uri->slash_segment( 5, 'leading' ) );
			if( $action == "view") {
				$result['member_profile'] = $this->user_model->search_user($id);
				$result['member_history'] = $this->member_history($id);
			}
		}
		return $result;
	}
	/**
	 * Admin view
	 * @param (String) $page
	 */
	public function admin_view($page) {
		$view_type = str_replace( '/', '', $this->uri->slash_segment( 3, 'leading' ) );

		$data['page']  = strtolower( str_replace( "-", " ", $page ) );
		$data['title'] = ucfirst( $data['page'] );
		$data['footer_scripts'] = $this->get_script();
		$data['sidebar'] = $this->sidebar_model->get_sidebar();
		$data['result'] = $this->get_admin_member_result($view_type);

		if( $view_type == "profile" ){
			$tab_panel = new tab_panel();
			$tab_panel->set('Membership history', $data['result']['member_history']);
			$tab_panel->set('Training program', '');
			$data['tab_panel'] = $tab_panel->create();
			$data['profile'] = $this->load->view(TPL_ACCOUNT_TEMPLATES.'member_profile', $data, true);
		} else {
			$data['page_title']    = "List of active members";
			$data['page_subtitle'] = "Gym and Personal Training";
			$data['has_check']     = true;
			$data['has_action']    = true;
			$data['action_view']   = "account/members/profile/view/";
			$data['action_delete'] = "account/members/profile/delete/";
			$data['list']  = $this->load->view(TPL_ACCOUNT_TEMPLATES.'table_dynamic', $data, true);
		}

		$this->load->view( TPL_ACCOUNT_TEMPLATES.'header', $data );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'sidebar' );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'top_navigation' );
		$this->load->view( TPL_ACCOUNT.$page );
		$this->load->view( TPL_ACCOUNT_TEMPLATES.'modal' );
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