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
	public $joinStmt;

	public function __construct() {
		parent::__construct();
		$this->load->database ();
	}

	/**
	 * Extract the properties of a model
	 * @param (Array) $model
	 * @param (String) $model_name
	 * @return (Array) $extracted
	 */
	public function get_properties($model, $model_name) {
		$properties = $model;
		$extracted = array();
		foreach ($properties as $prop => $value) {
			array_push($extracted,  array(str_replace($model_name,'',$prop) => $value));
		}
		array_pop($extracted);
		return $extracted;
	}

	/**
	 * SET TABLE FROM, LIMIT AND OFFSET
	 * @param (Array) $params
	 * @return
	 */
	public function get_table_from( $tblFrom, $limit, $offset ) {
		// limit | offset
		if ( !is_null( $limit ) ) {
			if ( is_null( $offset ) )
				$offset = 0;

			$query = $this->db->get ( $tblFrom, $limit, $offset );
		} else {
			$this->db->from ( $tblFrom );
			$query = $this->db->get ();
		}

		return $query;
	}

	/**
	 * GET RESULT
	 * @param (Array) $params
	 * @return
	 */
	public function get_result( $tblFrom, $limit = null, $offset = null ) {
		$query = $this->get_table_from( $tblFrom, $limit, $offset );

		if ($query->num_rows () > 0) {
			return $query->result_array ();
		} else {
			return null;
		}
	}

}
?>