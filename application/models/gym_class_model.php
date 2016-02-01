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
	private $id;
	private $title;
	private $subtitle;
	private $about;
	private $features;
	private $img;
	private $img_thumb;
	private $slug;
	private $create_user_id   = "";
	private $create_datetime  = "";
	private $update_user_id   = null;
	private $update_datetime  = "";

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Get gym class
	 * @return
	 */
	public function get_class($is_list = FALSE) {
		if( $is_list ) {
			$this->db->select ( 'title, slug' );
		}
		return $this->getResult( 'mas_class' );
	}

	/**
	 * Get gym class trainer
	 * @param integer $class_id
	 * @return associative array of query result
	 */
	public function get_class_trainer( $class_id ) {
		$sql = 'mas_trainer.*, ';
		$sql.= 'CONCAT(mas_trainer.firstname, ';
		$sql.= 'Char(32), mas_trainer.lastname ) AS name ';

		$this->db->select( $sql );
		$this->db->where( 'mas_class_trainer.class_id', $class_id );
		$this->db->join ( 'mas_trainer', 'mas_class_trainer.class_id = mas_trainer.id' );
		return $this->getResult( 'mas_class_trainer' );

	}
}
?>