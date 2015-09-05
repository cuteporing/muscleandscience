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

require_once ('common.php');
require_once ('banner.php');
require_once (PATH_UTILS.'format.php');
require_once (PATH_UTILS.'homebox.php');
require_once (PATH_PUBLIC.'footer.php');
require_once (PATH_PUBLIC.'home.php');
require_once (PATH_PUBLIC.'gym_class.php');
require_once (PATH_PUBLIC.'home.php');
require_once (PATH_PUBLIC.'news.php');
require_once (PATH_PUBLIC.'gallery.php');
require_once (PATH_PUBLIC.'contact.php');

class pages extends CI_controller {
	public function __construct() {
		parent::__construct ();
	}

	/**
	 * GET HEADER
	 * @param (Object) $data
	 * @return (View)
	 */
	public function getHeader($data) {
		$data ['title'] = ucfirst(str_replace('_', ' ', $data ['title']));
		$this->load->view ( TPL_PAGE_TEMPLATES.'header', $data );
	}

	/**
	 * DISPLAY TOP NAVIGATION
	 * @param (Object) $data
	 * @return (View)
	 */
	public function displayTopNav($data) {
		return $this->load->view ( TPL_PAGE_TEMPLATES.'top_navigation', $data );
	}

	/**
	 * PAGE VIEW
	 * @param (String) $page
	 */
	public function view($page = 'home') {
		if (! file_exists ( APPPATH . '/views/pages/' . $page . '.php' )) {
			show_404 ();
		}
		$common = new common ();
		$common->load_language ();

		$data ['page']  = strtolower( str_replace( "-", " ", $page ));
		$data ['title'] = ucfirst ( $page );

		$this->getHeader ( $data );
		$this->displayTopNav ( $data );

		// Initialize page display
		switch ($page) {
			case 'news' :
				$news = new news ();
				$news->view ( $page );
				break;
			case 'gym-class' :
				$gym_class = new gym_class ();
				$gym_class->view ( $page );
				break;
			case 'gallery' :
				$gallery = new gallery ();
				$gallery->view ( $page );
				break;
			case 'contact' :
				$contact = new contact ();
				$contact->view ( $page );
				break;;
			default :
				$home = new home ();
				$home->view ( $page );
				break;
		}

		$footer = new footer ();
		$footer->view ();
	}
}
?>