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

	private $params;

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
		$this->get_params( "class_thumb" );
		$data['result'] = $this->gym_class_model->get_class ( $this->params );

		return $this->load->view ( TPL_PAGE_TEMPLATES.'class_accordion_thumb', $data, true );
	}

	public function get_class_list() {
		$this->get_params( "class_list" );
		return $this->gym_class_model->get_class ( $this->params );
	}

	/**
	 * GET ALL GYM CLASS
	 * @return (Array) $result
	 */
	public function get_all_class() {
		$this->get_params( );
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
	 * @param (String) $type
	 */
	private function get_params( $type = "", $value = "" ) {
		$this->params = array ();

		if( empty( $type ) ) return;

		if( $type == "package" ) {
			$this->params ['where'] = array (
				"package_type" => $value,
				"deleted" => 0
			);
		} elseif ( $type == "class_thumb" ) {
			$this->params['select'] = array (
				'title',
				'subtitle',
				'about',
				'img_thumb',
				'slug'
			);
		} elseif( $type == "class_list" ) {
			$this->params['select'] = array ( 'title', 'slug' );
		}

	}

	/**
	 * GET HOMEBOX FOR MEMBERSHIP PACKAGE
	 * @return
	 */
	public function get_package_homebox() {
		$homebox = new homebox ();
		$this->get_params( 'package', 'M');
		$result = $this->package_model->get_package ( $this->params );

		$data['title']    = $this->lang->line ( 'LBL_00030' );
		$data['subtitle'] = $this->lang->line ( 'LBL_00031' );
		$data['display']  = $result;
		$data['type']     = 'list';

		return $homebox->create_homebox( 'LG', $data, true );
	}

	/**
	 * GET HOMEBOX FOR PERSONAL TRAINING PACKAGE
	 * @return
	 */
	public function get_pt_homebox() {
		$homebox = new homebox ();
		$this->get_params( 'package', 'PT');
		$result = $this->package_model->get_package ( $this->params );

		$data['title']    = $this->lang->line ( 'LBL_00032' );
		$data['subtitle'] = $this->lang->line ( 'LBL_00033' );
		$data['display']  = $result;
		$data['type']     = 'list';

		return $homebox->create_homebox( 'G', $data, true );
	}

	/**
	 * GET HOMEBOX FOR SPECIAL PACKAGE
	 * @return
	 */
	public function get_sp_homebox() {
		$homebox = new homebox ();
		$this->get_params( 'package', 'S');
		$result = $this->package_model->get_package ( $this->params );

		$data['title']    = $this->lang->line ( 'LBL_00034' );
		$data['subtitle'] = $this->lang->line ( 'LBL_00035' );
		$data['display']  = $result;
		$data['type']     = 'list';

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
		$common = new common ();
		$data ['breadcrumbs']  = $common->get_breadcrumbs ( $page );
		$data ['class_result'] = $this->get_all_class ();
		$data ['homebox']      = $this->get_homebox();
		$data ['class_list']   = $this->load->view (
				TPL_PAGE_TEMPLATES.'class_accordion_list', $data, true );

		$this->load->view ( 'pages/' . $page, $data );
	}
}
?>