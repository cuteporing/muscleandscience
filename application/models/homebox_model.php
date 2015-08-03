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

class Homebox_model extends Common_model {

	public function __construct() {
		$this->load->database ();
	}

	/**
	 * GET HOMEBOX
	 *
	 * @param $params
	 * --------------------------------------------
	 */
	public function get_homebox() {
		$query = $this->db->get ( 'mas_homebox' );
		return $query->result_array ();
	}

	/**
	 * SET HOMEBOX
	 *
	 * @param $params
	 * --------------------------------------------
	 */
	public function set_homebox() {
		return $this->db->insert ( 'mas_homebox', $data );
	}
}
?>