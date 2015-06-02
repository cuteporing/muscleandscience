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

include_once('html/common.php');
include_once('html/gym_class.php');
include_once('html/banner.php');
include_once('html/homebox.php');
include_once('html/footer.php');
include_once('public/home.php');

class pages extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * PAGE VIEW
	 * @param (String) $page
	 * --------------------------------------------
	 */
	public function view($page = 'home')
	{
		if( !file_exists(APPPATH.'/views/pages/'.$page.'.php') )
		{
			show_404();
		}

		if( $page = 'home' ){
			$home = new home;
			$data = $home->view();
		}

		$data['title'] = ucfirst($page);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/top_navigation', $data);
		$this->load->view('pages/'.$page, $data);

		$footer = new footer;
		$footer->view();
	}
}
?>