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
include_once('public/home.php');

class pages extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * GET HEADER
	 * @param (Object) $data
	 * --------------------------------------------
	 */
	public function getHeader($data)
	{
		$this->load->view('templates/header', $data);
	}

	/**
	 * DISPLAY TOP NAVIGATION
	 * @param (Object) $data
	 * --------------------------------------------
	 */
	public function displayTopNav($data)
	{
		$this->load->view('templates/top_navigation', $data);
	}

	/**
	 * DISPLAY HOME PAGE
	 * @param (String) $page
	 * --------------------------------------------
	 */
	public function home($page)
	{
		$home = new home;
		$data = $home->view($page);
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

		$data['title'] = ucfirst($page);

		$this->getHeader($data);
		$this->displayTopNav($data);

		switch ($page) {
			case 'home': $this->home($page); break;
			default:     $this->home($page); break;
		}

		$footer = new footer;
		$footer->view();
	}
}
?>