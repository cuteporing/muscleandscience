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
	}

	/**
	 * Function to get the property
	 * @param $property
	 */
	public function get($property) {
		if (property_exists($this, $property)) {
			return $this->$property;
		}
	}

	/**
	 * Function for setting a value to a property
	 * @param string $property
	 * @param string|number $value
	 * @return Model
	 */
	public function set($property,  $value) {
		if (property_exists($this, $property)) {
			$this->$property = $value;
		}

		return $this;
	}

	/**
	 * Query generator
	 * @param string $from
	 * @param integer $limit
	 * @param integer $offset
	 * @return query
	 */
	public function getTableFrom($from, $limit, $offset) {
		// limit | offset
		if (!is_null($limit)) {
			if (is_null($offset))
				$offset = 0;

			$query = $this->db->get($from, $limit, $offset);
		} else {
			$this->db->from($from);
			$query = $this->db->get();
		}

		return $query;
	}

	/**
	 * Get search result
	 * @param string $from
	 * @param integer $limit
	 * @param integer $offset
	 * @return ResultSet
	 */
	public function getResult($from, $limit = null, $offset = null) {
		$result = null;
		$query = $this->getTableFrom($from, $limit, $offset);

		if ($query->num_rows() > 0) {
			$result = $query->result_array();
		}

		return $result;
	}
}
?>