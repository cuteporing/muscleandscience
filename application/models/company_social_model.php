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

class Company_Social_model extends CommonModel {
	private $company_social_id=null;
	private $social_network   = "";
	private $link             = "";
	private $icon             = "";
	private $create_user_id   = "";
	private $create_datetime  = "";
	private $update_user_id   = null;
	private $update_datetime  = "";

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Get company social media
	 * @return
	 */
	public function get_company_social() {
		return $this->getResult( 'mas_company_social' );
	}
}
?>