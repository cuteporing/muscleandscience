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

class Gym_class extends Pages {

	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'gym_class_model' );
		$this->load->model ( 'package_model' );
	}

	/**
	 * DISPLAY THE GYM CLASS ACCORDION (COMPACT)
	 * @return (View)
	 */
	public function display_gym_class_thumbnail() {
		$data['result'] = $this->gym_class_model->get_class();
		return $this->load->view (
				TPL_PAGE_TEMPLATES.'class_accordion_thumb', $data, true );
	}

	public function get_class_list() {
		return $this->gym_class_model->get_class_list ( );
	}

	/**
	 * GET ALL GYM CLASS
	 * @return (Array) $result
	 */
	public function get_all_class() {
		$result = $this->gym_class_model->get_class ();

		if (! is_null ( $result )) {
			for($i = 0; $i < count ( $result ); $i ++) {
				$id = $result[$i]['id'];
				$result[$i]['trainer'] = $this->gym_class_model->get_class_trainer( $id );
			}
		}
		return $result;
	}

	/**
	 * GET HOMEBOX FOR MEMBERSHIP PACKAGE
	 * @return
	 */
	public function get_package_homebox() {
		$result = $this->package_model->get_mem_package();

		if( is_null( $result ) ) return $result;

		$data['title']    = $this->lang->line ( 'LBL_00030' );
		$data['subtitle'] = $this->lang->line ( 'LBL_00031' );
		$data['display']  = $result;
		$data['type']     = 'list';

		$homebox = new homebox ();
		return $homebox->create_homebox( 'LG', $data, true );
	}

	/**
	 * GET HOMEBOX FOR PERSONAL TRAINING PACKAGE
	 * @return
	 */
	public function get_pt_homebox() {
		$result = $this->package_model->get_pt_package();

		if( is_null( $result ) ) return $result;

		$data['title']    = $this->lang->line ( 'LBL_00032' );
		$data['subtitle'] = $this->lang->line ( 'LBL_00033' );
		$data['display']  = $result;
		$data['type']     = 'list';

		$homebox = new homebox ();
		return $homebox->create_homebox( 'G', $data, true );
	}

	/**
	 * GET HOMEBOX FOR SPECIAL PACKAGE
	 * @return
	 */
	public function get_sp_homebox() {
		$result = $this->package_model->get_sp_package();

		if( is_null( $result ) ) return $result;

		$data['title']    = $this->lang->line ( 'LBL_00034' );
		$data['subtitle'] = $this->lang->line ( 'LBL_00035' );
		$data['display']  = $result;
		$data['type']     = 'list';

		$homebox = new homebox ();
		return $homebox->create_homebox( 'D', $data, true );
	}

	/**
	 * GET RIGHT HOMEBOX DISPLAY
	 * @return $homebox
	 */
	public function get_homebox() {
		$homebox = $this->get_package_homebox ();
		$homebox.= $this->get_pt_homebox ();
		$homebox.= $this->get_sp_homebox ();

		return $homebox;
	}

	/**
	 * VIEW GYM CLASS
	 * @param (String) $page
	 * @return (View)
	 */
	public function view($page) {
		$data ['class_result'] = $this->get_all_class ();
		$data ['homebox']      = $this->get_homebox();
		$data ['breadcrumbs']  = $this->load->view(
				TPL_PAGE_TEMPLATES.'breadcrumbs', '', true);
		$data ['class_list']   = $this->load->view (
				TPL_PAGE_TEMPLATES.'class_accordion_list', $data, true );

		$this->load->view ( 'pages/' . $page, $data );
	}
}
?>