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

class gym_class extends pages {
	private $params = array ();

	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'gym_class_model' );
		$this->load->model ( 'package_model' );
	}

	/**
	 * DISPLAY THE GYM CLASS ACCORDION (COMPACT)
	 *
	 * --------------------------------------------
	 * @return (View)
	 */
	public function display_gym_class_thumbnail() {
		$data['result'] = $this->gym_class_model->get_gym_class_thumb ();

		return $this->load->view ( TPL_CLASS_ACCORDION_THUMB, $data, true );
	}

	/**
	 * GET ALL GYM CLASS
	 *
	 * --------------------------------------------
	 * @return (Array) $result
	 */
	public function get_all_class() {
		$result = $this->gym_class_model->get_class ( $this->params );

		if (! is_null ( $result )) {
			for($i = 0; $i < count ( $result ); $i ++) {
				$id = $result[$i]['id'];

				$this->params ['where'] = array (
					TBL_CLASS_TRAINER . ".class_id" => $id
				);
				$result[$i]['trainer'] = $this->gym_class_model->get_class_trainer( $this->params );
			}
		}
		return $result;
	}

	/**
	 * GET SEARCH PARAMETERS
	 *
	 * --------------------------------------------
	 * @param (String) $type
	 */
	private function get_params( $type ) {
		$this->params = array ();

		$this->params ['where'] = array (
			"package_type" => $type,
			"deleted" => 0
		);
	}

	/**
	 * GET HOMEBOX FOR MEMBERSHIP PACKAGE
	 *
	 * --------------------------------------------
	 * @return
	 */
	public function get_package_homebox() {
		$homebox = new homebox ();
		$this->get_params('M');
		$result = $this->package_model->get_package ( $this->params );

		$data['title']    = $this->lang->line ( 'LBL_00030' );
		$data['subtitle'] = $this->lang->line ( 'LBL_00031' );
		$data['display']  = $result;
		$data['type']     = 'list';

		return $homebox->create_homebox( 'LG', $data, true );
	}

	/**
	 * GET HOMEBOX FOR PERSONAL TRAINING PACKAGE
	 *
	 * --------------------------------------------
	 * @return
	 */
	public function get_pt_homebox() {
		$homebox = new homebox ();
		$this->get_params('PT');
		$result = $this->package_model->get_package ( $this->params );

		$data['title']    = $this->lang->line ( 'LBL_00032' );
		$data['subtitle'] = $this->lang->line ( 'LBL_00033' );
		$data['display']  = $result;
		$data['type']     = 'list';

		return $homebox->create_homebox( 'G', $data, true );
	}

	/**
	 * GET HOMEBOX FOR SPECIAL PACKAGE
	 *
	 * --------------------------------------------
	 * @return
	 */
	public function get_sp_homebox() {
		$homebox = new homebox ();
		$this->get_params('S');
		$result = $this->package_model->get_package ( $this->params );

		$data['title']    = $this->lang->line ( 'LBL_00034' );
		$data['subtitle'] = $this->lang->line ( 'LBL_00035' );
		$data['display']  = $result;
		$data['type']     = 'list';

		return $homebox->create_homebox( 'D', $data, true );
	}

	/**
	 * GET RIGHT HOMEBOX DISPLAY
	 *
	 * --------------------------------------------
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
	 *
	 * --------------------------------------------
	 * @param (String) $page
	 * @return (View)
	 */
	public function view($page) {
		$common = new common ();
		$data ['breadcrumbs']  = $common->get_breadcrumbs ( $page );
		$data ['class_result'] = $this->get_all_class ();
		$data ['homebox']      = $this->get_homebox();
		$data ['class_list']   = $this->load->view (
				TPL_CLASS_ACCORDION_LIST, $data, true );

		$this->load->view ( 'pages/' . $page, $data );
	}
}
?>