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

class common
{
	/**
	 * GET CONSTANTS
	 * @param string $type
	 * @param string $request
	 * @return array
	 * --------------------------------------------
	 */
	static function get_constants($type, $request)
	{
		$constants = array(
			'meta' => array(
				'DESCRIPTION' => 'Gym/Fitness Center',
				'KEYWORDS'    => 'gym, fitness, health, center, muscle, science',
				'AUTHOR'      => 'KBVCodes, 2014', ),
			'imgPath' => array(
				'BANNER' => '/upload/banner/', ),
		);

		return $constants[$type][$request];
	}

	/**
	 * CREATES A HOMEBOX PANEL
	 * @param string $type
	 * @param string $contents
	 * @return string $homebox
	 * --------------------------------------------
	 */
	static function create_homebox($type='G', $contents='', $is_block = false)
	{
		switch ($type) {
			case 'G' : $box_color = 'green'; break;
			case 'LG': $box_color = 'light-green'; break;
			case 'W' : $box_color = 'white'; break;
			default: case 'G' : $box_color = 'green'; break;
		}
		
		( $is_block === true )?
		  $box_color = $box_color.' block' : $box_color;

		$attribute = array( 'class'=>'home-box '.$box_color );

		$homebox   = element_tag('li', 'open', $attribute);
		$homebox  .= $contents;
		$homebox  .= element_tag('li', 'close');

		return $homebox;
	}
}


function checkData($data){
	(isset($data) && !empty($data))?
	  $data = $data
	: $data = '';

	return $data;
}
?>