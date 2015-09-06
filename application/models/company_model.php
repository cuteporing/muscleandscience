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

class Company_model extends Common_model {
	public function __construct() {
	}

	/**
	 * GET COMPANY INFORMATION
	 * @return
	 */
	public function get_company_info( ) {
		$params['from'] = TBL_COMPANY_INFO;
		return $this->get_result( $params );
	}

	/**
	 * GET COMPANY SOCIAL MEDIA
	 * @return
	 */
	public function get_company_social() {
		$params['from'] = TBL_COMPANY_SOCIAL;
		return $this->get_result( $params );
	}

	/**
	 * SET COMPANY INFORMATION
	 *  @return
	 */
	public function set_company_info() {
		return $this->db->insert ( 'mas_company_info', $data );
	}

	/**
	 * SET COMPANY INFORMATION
	 *  @return
	 */
	public function set_company_social() {
		return $this->db->insert ( 'mas_company_social', $data );
	}
}
?>