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
		$params['from'] = TBL_CLASS;
		return $this->get_result( $params );
	}

	/**
	 * GET GYM CLASS LIST
	 * @return NULL
	 */
	public function get_class_list() {
		$params['select'] = array ( 'title', 'slug' );
		$params['from']   = TBL_CLASS;
		return $this->get_result( $params );
	}

	/**
	 * GET GYM CLASS TRAINER
	 * @param $params
	 * @return
	 */
	public function get_class_trainer( $other_params = array() ) {

		$sql = TBL_TRAINER . ".*, ";
		$sql.= "CONCAT(" . TBL_TRAINER . ".firstname, ";
		$sql.= "Char(32), " . TBL_TRAINER . ".lastname ) AS name ";

		$params['select'] = $sql;


		if( count( $other_params ) > 0 ) {
			if( isset( $other_params['class_id'] ) ) {
				$params['where'] = array(
					TBL_CLASS_TRAINER . ".class_id" => $other_params['class_id'] );
			}
		}

		$tempArray = array();

		array_push( $tempArray, array(
			'table' => TBL_TRAINER,
			'condition' => TBL_CLASS_TRAINER.".class_id = ".TBL_TRAINER.".id"
		 ) );

		$params['from'] = TBL_CLASS_TRAINER;
		$params['join'] = $tempArray;

		return $this->get_result( $params );

	}
}
?>