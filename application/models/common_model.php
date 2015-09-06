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
	 * @param $params
	 */
	public function get_where( $params ) {
		if ( isset ( $params ['where'] ) && count ( $params ['where'] ) > 0 ) {
			foreach ( $params ['where'] as $field => $value ) {
				$this->db->where ( $field, $value );
			}
		}
	}

	/**
	 * GET ORDER BY STATEMENT
	 * @param $params
	 */
	public function get_orderby( $params ) {
		if ( isset ( $params ['order_by'] ) && count ( $params ['order_by'] ) > 0 ) {
			foreach ( $params ['order_by'] as $field => $value ) {
				$this->db->order_by ( $field, $value );
			}
		}
	}

	/**
	 * GET SELECT
	 * @param $params
	 */
	public function get_select( $params ) {
		if ( isset( $params ['select'] ) && count ( $params ['select'] ) > 0 ) {
			$count = 0;
			$sql = "";

			if ( is_array( $params ['select'] ) ) {
				foreach ( $params ['select'] as $field => $value ) {
					$count++;
					$sql .= $value;

					if ( $count != count ( $params ['select'] ) ) {
						$sql .= ', ';
					}
				}
			} else {
				$sql = $params ['select'];
			}
			$this->db->select ( $sql );
		}
	}

	/**
	 * SET TABLE FROM, LIMIT AND OFFSET
	 * @param (Array) $params
	 * @return
	 */
	public function get_table_from( $params ) {
		// limit | offset
		if (isset ( $params ['limiter'] ) && count ( $params ['limiter'] ) > 0) {
			if (! isset ( $params ['limiter'] ['offset'] )) {
				$params ['limiter'] ['offset'] = 0;
			}

			$query = $this->db->get (
					$params['from'],
					$params ['limiter'] ['limit'],
					$params ['limiter'] ['offset']
			);
		} else {
			$this->db->from ( $params['from'] );
			$query = $this->db->get ();
		}

		return $query;
	}

	public function get_join( $params ) {
		if ( isset( $params ['join'] ) && count ( $params ['join'] ) > 0 ) {
			foreach ( $params ['join'] as $field => $value ) {
				$this->db->join ( $value['table'], $value['condition'] );
			}
		}
	}

	public function get_result( $params ) {
		$this->get_where ( $params );
		$this->get_orderby ( $params );
		$this->get_select ( $params );
		$this->get_join( $params );
		$query = $this->get_table_from( $params );

		if ($query->num_rows () > 0) {
			return $query->result_array ();
		} else {
			return null;
		}
	}

}
?>