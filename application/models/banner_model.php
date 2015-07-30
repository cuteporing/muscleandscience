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
class Banner_model extends CI_Model {
	public function __construct() {
		$this->load->database ();
	}

	/**
	 * GET BANNER
	 *
	 * @return (Object)
	 * --------------------------------------------
	 */
	public function get_banner() {
		$query = $this->db->get ( 'mas_banner' );
		return $query->result_array ();
	}

	/**
	 * SET BANNER
	 *
	 * @return
	 * --------------------------------------------
	 */
	public function set_banner() {
		$this->load->helper ( 'url' );

		// get constant image path for banner
		$common = new common ();
		$imgPath = IMG_BANNER;
		$img = $this->input->post ( 'img' );

		// Set parameters to an array data
		$data = array (
				'img' => $img,
				'title' => $this->input->post ( 'title' ),
				'subtitle' => $this->input->post ( 'subtitle' )
		);

		// @TABLE_NAME = mas_banner
		return $this->db->insert ( 'mas_banner', $data );
	}
}
?>