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

class Package_model extends Common_model {

	public function __construct() {
	}

	/**
	 * GET MEMBERSHIP PACKAGE
	 * @param (Boolean) $is_active
	 * @return
	 */
	public function get_mem_package( $is_active = true ) {
		( $is_active )? $is_active = 0 : $is_active = 1;
		$this->db->where ( 'package_type', 'M' );
		$this->db->where ( 'deleted', $is_active );
		return $this->get_result( 'mas_package' );
	}

	/**
	 * GET PERSONAL TRAINING PACKAGE
	 * @param (Boolean) $is_active
	 * @return
	 */
	public function get_pt_package( $is_active = true ) {
		( $is_active )? $is_active = 0 : $is_active = 1;
		$this->db->where ( 'package_type', 'PT' );
		$this->db->where ( 'deleted', $is_active );
		return $this->get_result( 'mas_package' );
	}

	/**
	 * GET SPECIAL PACKAGE
	 * @param (Boolean) $is_active
	 * @return
	 */
	public function get_sp_package( $is_active = true ) {
		( $is_active )? $is_active = 0 : $is_active = 1;
		$this->db->where ( 'package_type', 'S' );
		$this->db->where ( 'deleted', $is_active );
		return $this->get_result( 'mas_package' );
	}
}
?>