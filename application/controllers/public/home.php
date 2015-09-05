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
	}

	/**
	 * GET LOG-IN FORM
	 * @return (String) $container
	 */
	static function create_login_form() {
		$common = new common ();
		$homebox = new homebox ();
		$data['display']  = $common->get_form( TPL_PAGE_FORMS, 'login' );
		$container = $homebox->create_homebox ( 'G', $data, true );

		return $container;
	}

	/**
	 * CREATES A LOG-IN FORM
	 * @param (String) $page
	 */
	public function view($page) {
		$banner = new banner ();
		$homebox = new homebox ();
		$gym_class = new gym_class ();
		$news = new news ();
		$data ['login'] = self::create_login_form ();
		$data ['banner'] = $banner->view();
		$data ['homebox'] = $homebox->display_homebox_banner ();
		$data ['gym_class'] = $gym_class->display_gym_class_thumbnail ();
		$data ['latest_news'] = $news->view_latest_news ();

		$this->load->view ( 'pages/' . $page, $data );
	}
}