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

class Gym_Class_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_gym_class_thumb()
	{
		$this->db->select('title, subtitle, about, img_thumb, slug');

		$query = $this->db->get('mas_class');

		return $query->result_array();
	}

}
?>