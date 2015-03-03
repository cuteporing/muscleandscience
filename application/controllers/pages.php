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

include_once('common.php');
include_once('gym_class.php');
include_once('banner.php');
include_once('homebox.php');
include_once('footer.php');

class pages extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('html');
	}

	public function view($page = 'home')
	{
		if( !file_exists(APPPATH.'/views/pages/'.$page.'.php') )
		{
			show_404();
		}

		if( $page == 'home' ){
			$banner  = new banner;
			$homebox = new homebox;
			$gym_class = new gym_class;
			$data['banner']  = $banner->get_banner();
			$data['homebox'] = $homebox->display_homebox_banner();
			$data['gym_class'] = $gym_class->display_gym_class_thumbnail();
			$data['login'] = self::create_login_form();
		}

		$data['title']       = ucfirst($page);
		$data['description'] = common::get_constants('meta', 'DESCRIPTION');
		$data['keywords']    = common::get_constants('meta', 'KEYWORDS');
		$data['author']      = common::get_constants('meta', 'AUTHOR');

		$footer = new footer;
		$data['footer']['info'] = $footer->display_company_info();
		$data['footer']['social'] = $footer->display_company_social();
		$data['footer']['opening'] = $footer->display_company_opening_hrs();
		$data['footer']['copyright'] = footer::copyright();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/top_navigation', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer',$data);
	}

	/**
	 * CREATES A LOG-IN FORM
	 * @return String
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

		$container = common::create_homebox('G', $panel, true);

		return $container;
	}
}
?>