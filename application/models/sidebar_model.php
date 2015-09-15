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

class Sidebar_model extends Common_model {

	public function __construct() {
	}

	public function get_sidebar_sub($parent_id, $user_kbn) {
		$this->db->where( 'parent_id', $parent_id );
		$this->db->where( 'user_kbn <= ', $user_kbn );
		$this->db->order_by( 'sequence', 'asc' );

		return $this->get_result( 'mas_sidebar_sub' );
	}


	/**
	 * Get sidebar
	 * @return NULL
	 */
	public function get_sidebar() {
		$user_kbn = $this->user_model->get_user_kbn();
		$this->db->where( 'user_kbn <= ', $user_kbn );
		$this->db->order_by( 'sequence', 'asc' );

		$result = $this->get_result( 'mas_sidebar' );

		if( !is_null($result) ){
			for ($i = 0; $i < count($result); $i++ ) {
				$result[$i]['sub_nav'] = $this->get_sidebar_sub(
						$result[$i]['id'], $user_kbn );
			}
		}

		return $result;
	}
}
?>