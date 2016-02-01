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

class Banner_model extends CommonModel {

	private $banner_id;
	private $img;
	private $title;
	private $subtitle;
	private $create_user_id;
	private $create_datetime;
	private $update_user_id;
	private $update_datetime;

	public function __construct() {
	}

	/**
	 * GET BANNER
	 * @return
	 */
	public function get_banner() {
		return $this->getResult('mas_banner');
	}
}
?>