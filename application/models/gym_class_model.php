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

class Gym_Class_model extends Common_model {

	public function __construct() {
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

	/**
	 * GET GYM CLASS THUMBNAIL
	 *
	 * --------------------------------------------
	 * @return
	 */
	public function get_gym_class_thumb() {
		$this->db->select ( 'title, subtitle, about, img_thumb, slug' );
		$query = $this->db->get ( TBL_CLASS );

		return $query->result_array ();
	}

	/**
	 * GET GYM CLASS
	 *
	 * --------------------------------------------
	 * @param $params
	 * @return
	 */
	public function get_class($params) {
		$this->get_where ( $params );
		$this->get_orderby ( $params );
		$this->get_select ( $params, TBL_CLASS );

		// limit | offset
		if (isset ( $params ['limiter'] ) && count ( $params ['limiter'] ) > 0) {
			if (! isset ( $params ['limiter'] ['offset'] )) {
				$params ['limiter'] ['offset'] = 0;
			}

			$query = $this->db->get (
					TBL_CLASS,
					$params ['limiter'] ['limit'],
					$params ['limiter'] ['offset']
				);
		} else {
			$this->db->from ( TBL_CLASS );
			$query = $this->db->get ();
		}

		if ($query->num_rows () > 0) {
			return $query->result_array ();
		} else {
			return null;
		}
	}

	/**
	 * GET GYM CLASS TRAINER
	 *
	 * --------------------------------------------
	 * @param $params
	 * @return
	 */
	public function get_class_trainer($params) {
		$sql = TBL_TRAINER . ".*, ";
		$sql .= "CONCAT(" . TBL_TRAINER . ".firstname, ";
		$sql .= "Char(32), " . TBL_TRAINER . ".lastname ) AS name ";

		$this->get_where ( $params );
		$this->get_orderby ( $params );

		$this->db->select ( $sql );
		$this->db->from ( TBL_CLASS_TRAINER );
		$this->db->join ( TBL_TRAINER, TBL_CLASS_TRAINER . ".class_id = " . TBL_TRAINER . ".id" );

		$query = $this->db->get ();
		if ($query->num_rows () > 0) {
			return $query->result_array ();
		} else {
			return null;
		}
	}
}
?>