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
if (! defined( 'BASEPATH' ))
	exit( 'No direct script access allowed' );

require_once(PATH_UTILS.'homebox.php');
require_once(PATH_PUBLIC.'footer.php');
require_once(PATH_PUBLIC.'gym_class.php');
require_once(PATH_PUBLIC.'news.php');

class Pages extends CI_controller {
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Displays top public top navigation
	 * @param (Object) $data
	 * @return (View)
	 */
	public function displayTopNav($data) {
		$gym_class = new gym_class();
		$data['result'] = $gym_class->get_class(true);
		return $this->load->view( TPL_PAGE_TEMPLATES.'top_navigation', $data );
	}

	/**
	 * Controls the display for public view
	 * @param (String) $page
	 */
	public function view($page = 'home') {
		$data ['page']  = strtolower( str_replace( "-", " ", $page ));
		$data ['title'] = ucfirst( str_replace('_', ' ', $page) );

		$this->load->view( TPL_PAGE_TEMPLATES.'header', $data );
		$this->displayTopNav( $data );

		// Initialize controller
		if( $page == "news" ) {
			$instance = new News();
		}
		elseif( $page == "gym-class" ) {
			$instance = new Gym_class();
		}
		elseif( $page == "gallery" ) {
			require_once(PATH_PUBLIC.'gallery.php');
			$instance = new Gallery();
		}
		elseif( $page == "contact" ) {
			require_once(PATH_PUBLIC.'contact.php');
			$instance = new Contact();
		}
		else {
			require_once(PATH_PUBLIC.'home.php');
			$instance = new Home();
		}
		// Initialize display
		$instance->view( $page );

		$footer = new footer();
		$footer->view();
	}
}
?>