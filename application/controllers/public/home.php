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

class Home extends Pages {

	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'banner_model' );
	}

	/**
	 * Get js script source
	 */
	private function get_script() {
		return array(
			'account/model/optionsModel.js',
			'account/model/responseModel.js',
			'account/controller/commonController.js',
			'account/controller/loginController.js',
			'public/controller/homeController.js',
		);
	}

	/**
	 * GET LOG-IN FORM
	 * @return (String) $container
	 */
	public function create_login_form() {
		$data['display']  =  $this->load->view('pages/forms/login_form', '', true);
		$homebox = new homebox ();
		$container = $homebox->create_homebox ( 'G', $data, true );

		return $container;
	}

	public function get_banner(){
		$data['result'] = $this->banner_model->get_banner();

		return $this->load->view ( TPL_PAGE_TEMPLATES.'banner', $data, true );
	}

	/**
	 * CREATES A LOG-IN FORM
	 * @param (String) $page
	 */
	public function view($page) {
		$homebox = new homebox ();
		$gym_class = new gym_class ();
		$news = new news ();
		$data['banner'] = $this->get_banner();
		$data['homebox'] = $homebox->display_homebox_banner ();
		$data['gym_class'] = $gym_class->display_gym_class_thumbnail ();
		$data['latest_news'] = $news->view_latest_news ();
		$data['footer_scripts'] = $this->get_script();

		if( !$this->user_model->authenticated() ) {
			$data['login'] = $this->create_login_form ();
		}

		$this->load->view ( 'pages/' . $page, $data );
	}
}