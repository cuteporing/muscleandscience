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

class gym_class extends CI_controller
{
	private $gym_class_list;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->model('gym_class_model');
	}

	/**
	 * CREATES THE HEADING FOR THE ACCORDION
	 * @param String, $accord_id
	 * @param String, $title
	 * @param String, $subtitle
	 * @return String
	 * --------------------------------------------
	 */
	public function get_accord_head($accord_id, $title = '', $subtitle = '')
	{
		$accord_heading  = heading($title, '3').heading($subtitle, '5');

		return anchor('#'.$accord_id, $accord_heading, array());
	}

	/**
	 * CREATES THE THUMBNAIL FOR THE ACCORDION
	 * @param String, $title
	 * @param String, $src
	 * @return String
	 * --------------------------------------------
	 */
	public function get_thumb_img($title, $src)
	{
		$img = img(array( 'src' => $src, 'alt' => $src ));

		return anchor('#', $img, array(
			'class' => 'thumb_img',
			'title' => $title ));
	}

	/**
	 * LIMITS THE DISPLAYED DESCRIPTION
	 * @param String, $type
	 * @param String, $text
	 * @return String
	 * --------------------------------------------
	 */
	public function get_about($limit = FALSE, $text = '')
	{
		if( $limit = 'compact' )
		{
			return div(
				character_limiter($text, 150),
				array( 'class' => 'text'));
		}else{
			return div($text, array( 'class' => 'text'));
		}
	}

	/**
	 * DISPLAY THE GYM CLASS ACCORDION (COMPACT)
	 * @return List <dd>
	 * --------------------------------------------
	 */
	public function display_gym_class_thumbnail()
	{
		$result = $this->gym_class_model->get_gym_class_thumb();

		$list = '';
		//Clear the gym class list
		$this->gym_class_list = '';

		$btn_class = array( 'class' => 'more icon-small-arrow margin-right-white' );
		$list     .= element_tag('dl', 'open', array('class'=>'accordion accordion-gym-fitness', 'data-accordion'=>'' ));

		foreach( $result as $item )
		{

			//button detail link for the each class.
			$footer  = '';
			$footer .= anchor('classes/'.$item['slug'], 'details', $btn_class);
			$footer .= anchor('#', 'Timetable', $btn_class);

			//contents of the gym classes displayed in the accordion
			$about  = '';
			$about .= $this->get_thumb_img($item['title'], $item['img_thumb']);
			$about .= $this->get_about('compact', $item['about']);
			$about .= div($footer, array( 'class' => 'item-footer clearfix' ));

			$list .= element_tag('dd', 'open', array( 'class'=>'accordion-navigation' ));
			$list .= $this->get_accord_head($item['slug'], $item['title'], $item['subtitle']);
			$list .= div($about, array( 'class' => 'content item-content clearfix', 'id' => $item['slug'] ));
			$list .= element_tag('dd', 'close');
		}

		$this->gym_class_list = $list.'</dl>';

		return $this->gym_class_list;
	}
}
?>