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

class Common_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database ();
	}

	/**
	 * GET WHERE STATEMENT
	 *
	 * @param $params
	 * --------------------------------------------
	 */
	public function get_where($params) {
		if ( isset ( $params ['where'] ) && count ( $params ['where'] ) > 0 ) {
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
		if ( isset ( $params ['order_by'] ) && count ( $params ['order_by'] ) > 0 ) {
			foreach ( $params ['order_by'] as $field => $value ) {
				$this->db->order_by ( $field, $value );
			}
		}
	}

	/**
	 * GET SELECT
	 *
	 * --------------------------------------------
	 * @param $params
	 */
	public function get_select($params, $table) {
		if ( isset( $params ['select'] ) && count ( $params ['select'] ) > 0 ) {
			$count = 0;

			foreach ( $params ['select'] as $field => $value ) {
				$count++;
				$sql .= $value;

				if ( $count != count ( $params ['select'] ) ) {
					$sql .= ', ';
				}
			}

			$this->db->select ( $sql );
		}
	}

}
?>