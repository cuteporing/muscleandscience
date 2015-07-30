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
class home extends pages {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'banner_model' );
	}

	/**
	 * GET LOG-IN FORM
	 *
	 * --------------------------------------------
	 * @return (String) $container
	 */
	static function create_login_form() {
		$common = new common ();
		$panel = $common->get_form( TPL_PAGE_FORMS, 'login' );
		$container = homebox::create_homebox ( 'G', $panel, true );

		return $container;
	}

	/**
	 * CREATES A LOG-IN FORM
	 *
	 * --------------------------------------------
	 * @param (String) $page
	 * @return (Object) $data
	 */
	public function view($page) {
		$homebox = new homebox ();
		$gym_class = new gym_class ();
		$news = new news ();
		$data ['login'] = self::create_login_form ();
		$data ['banner'] = $this->banner_model->get_banner ();
		$data ['homebox'] = $homebox->display_homebox_banner ();
		$data ['gym_class'] = $gym_class->display_gym_class_thumbnail ();
		$data ['latest_news'] = $news->view_latest_news ();

		$this->load->view ( 'pages/' . $page, $data );
	}
}