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
class format extends CI_controller {
	public function __construct() {
		parent::__construct ();
	}

	/**
	 * FORMAT DATE
	 *
	 * --------------------------------------------
	 * @param (String) $datetime
	 * @param (String) $format
	 * @return (String) $formatted
	 */
	static function format_date($datetime, $format = 'Y-m-d') {
		$date = new DateTime ( $datetime );
		$formatted = $date->format ( $format );

		return $formatted;
	}

	/**
	 * CALCULATE TIME
	 *
	 * --------------------------------------------
	 * @param (String) $time
	 * @return
	 */
	static function calc_time($time) {
		$time = time() - $time;

		$tokens = array (
				31536000 => 'year',
				2592000 => 'month',
				604800 => 'week',
				86400 => 'day',
				3600 => 'hour',
				60 => 'minute',
				1 => 'second'
		);

		foreach ($tokens as $unit => $text) {
			if ($time < $unit) continue;
			$numberOfUnits = floor($time / $unit);
			return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
		}
	}
}
?>