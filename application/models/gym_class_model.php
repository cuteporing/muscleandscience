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
	}

	/**
	 * GET GYM CLASS
	 * @return
	 */
	public function get_class() {
		return $this->get_result( 'mas_class' );
	}

	/**
	 * GET GYM CLASS LIST
	 * @return NULL
	 */
	public function get_class_list() {
		$this->db->select ( 'title, slug' );
		return $this->get_result( 'mas_class' );
	}

	/**
	 * GET GYM CLASS TRAINER
	 * @param $params
	 * @return
	 */
	public function get_class_trainer( $class_id ) {

		$sql = 'mas_trainer.*, ';
		$sql.= 'CONCAT(mas_trainer.firstname, ';
		$sql.= 'Char(32), mas_trainer.lastname ) AS name ';

		$this->db->select( $sql );
		$this->db->where( 'mas_class_trainer.class_id', $class_id );
		$this->db->join ( 'mas_trainer', 'mas_class_trainer.class_id = mas_trainer.id' );
		return $this->get_result( 'mas_class_trainer' );

	}
}
?>