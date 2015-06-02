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
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class common extends CI_controller
{
	/**
	 * CHECK DATA IF NULL
	 * @param (Object) $data
	 * @return (Object) $data
	 * --------------------------------------------
	 */
	static function checkData($data)
	{
		(isset($data) && !empty($data))?
		  $data = $data
		: $data = '';

		return $data;
	}
}
?>