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

class Package_model extends CI_Model {

	public function __construct() {
		$this->load->database ();
	}

	/**
	 * SET TITLE
	 *
	 * @param $param
	 * --------------------------------------------
	 */
	public function set_title($param) {
		$this->gym_class->title = $param;
	}

	/**
	 * SET SUBTITLE
	 *
	 * @param $param
	 * --------------------------------------------
	 */
	public function set_subtitle($param) {
		$this->gym_class->subtitle = $param;
	}

	/**
	 * GET WHERE STATEMENT
	 *
	 * @param $params
	 * --------------------------------------------
	 */
	public function get_where($params) {
		if (isset ( $params ['where'] ) && count ( $params ['where'] ) > 0) {
			foreach ( $params ['where'] as $field => $value ) {
				$this->db->where ( $field, $value );
			}
		}
	}

	/**
	 * GET ORDER BY STATEMENT
	 *
	 * @param $params
	 * --------------------------------------------
	 */
	public function get_orderby($params) {
		if (isset ( $params ['order_by'] ) && count ( $params ['order_by'] ) > 0) {
			foreach ( $params ['order_by'] as $field => $value ) {
				$this->db->order_by ( $field, $value );
			}
		}
	}

	/**
	 * GET PACKAGE
	 *
	 * @return
	 * --------------------------------------------
	 */
	public function get_gym_class_thumb() {
		$query = $this->db->get ( TBL_PACKAGE );

		return $query->result_array();
	}
}
?>