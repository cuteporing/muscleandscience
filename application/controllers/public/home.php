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

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('news.php');

class home extends pages
{
	public function __construct()
	{
		parent::__construct();
	}
	

	/**
	 * CREATES A LOG-IN FORM
	 * @return (String) $container
	 * --------------------------------------------
	 */
	static function create_login_form()
	{
		$attributes = array( 'autocomplete'=>'off' );
		$username   = array( 'name'=>'username', 'placeholder'=>'Username');
		$password   = array( 'name'=>'password', 'placeholder'=>'Password');
		$submit     = array(
			'class'   =>'more black icon-small-arrow margin-right-white',
			'data-msg'=>'Please wait...',
			'name'    =>'btn_login',
			'value'   =>'Sign in' );

		$form  = form_open('#', $attributes);
		$form .= form_input($username);
		$form .= form_password($password);
		$form .= form_submit($submit);

		$panel  = heading('Sign in', '2');
		$panel .= heading('Go to your account', '3');
		$panel .= div('', array( 'class'=>'error-msg' ));
		$panel .= div($form, array( 'class'=>'login-panel') );

		$container = homebox::create_homebox('G', $panel, true);

		return $container;
	}

	/**
	 * CREATES A LOG-IN FORM
	 * @return (Object) $data
	 * --------------------------------------------
	 */
	public function view($page)
	{
		$banner    = new banner;
		$homebox   = new homebox;
		$gym_class = new gym_class;
		$news      = new news;
		$data['login'] = self::create_login_form();
		$data['banner'] = $banner->get_banner();
		$data['homebox'] = $homebox->display_homebox_banner();
		$data['gym_class'] = $gym_class->display_gym_class_thumbnail();
		$data['latest_news'] = $news->view_latest_news();

		$this->load->view('pages/'.$page, $data);
	}
}