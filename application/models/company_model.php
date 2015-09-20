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
	private $company_info_id  = null;
	private $street_address_1 = "";
	private $street_address_2 = "";
	private $city             = null;
	private $email            = "";
	private $phone            = "";
	private $opening_hours    = null;
	private $opening_day_type = null;
	private $create_user_id   = "";
	private $phone            = "";
	private $create_datetime  = "";
	private $update_user_id   = null;
	private $update_datetime  = "";

	public function __construct() {
		parent::__construct();
	}

	public function get($property) {
		if (property_exists($this, $property)) {
			return $this->$property;
		}
	}

	public function set($property, $value) {
		if (property_exists($this, $property)) {
			$this->$property = $value;
		}

		return $this;
	}

	/**
	 * Get company information
	 * @return
	 */
	public function get_company_info( ) {
		return $this->get_result( 'mas_company_info' );
	}

	/**
	 * Get company social media
	 * @return
	 */
	public function get_company_social() {
		return $this->get_result( 'mas_company_social' );
	}
}
?>