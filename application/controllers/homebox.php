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

include_once ('common.php');
class homebox extends CI_controller {
	private $banner_title;
	private $banner_subtitle;
	private $banner_content;
	private $box;
	private $contents;
	private $description;
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'homebox_model' );
	}
	public function get_homebox() {
		return $this->homebox_model->get_homebox ();
	}
	
	/**
	 * CLEAR OBJECT
	 * --------------------------------------------
	 */
	public function clear_object() {
		$this->banner_title = '';
		$this->banner_subtitle = '';
		$this->banner_content = '';
		$this->contents = '';
		$this->description = '';
	}
	
	/**
	 * CREATES THE TITLE HEADER FOR HOMEBOX <h2>
	 * 
	 * @param (String) $title        	
	 * @param (String) $link        	
	 * @return (String) --------------------------------------------
	 */
	public function homebox_title($title, $link) {
		($title == "") ? $this->banner_title .= heading ( anchor ( '#', 'Untitled homebox' ), '2' ) : $this->banner_title .= heading ( anchor ( $link, $title, array (
				'title' => $title 
		) ), '2' );
		
		return $this->banner_title;
	}
	
	/**
	 * CREATES THE SUBTITLE HEADER FOR HOMEBOX <h3>
	 * 
	 * @param (String) $subtitle        	
	 * @return (String) --------------------------------------------
	 */
	public function homebox_subtitle($subtitle) {
		($subtitle == "") ? $this->banner_subtitle .= heading ( anchor ( '#', 'no subtitle' ), '3' ) : $this->banner_subtitle .= heading ( $subtitle, '3' );
		
		return $this->banner_subtitle;
	}
	
	/**
	 * CREATES THE DESCRIPTION FOR HOMEBOX
	 * 
	 * @param (String) $about        	
	 * @return (String) --------------------------------------------
	 */
	public function homebox_about($about) {
		($about == "") ? $this->description .= heading ( anchor ( '#', 'no description available!' ), '2' ) : $this->description .= div ( character_limiter ( $about, 100 ), array (
				'class' => 'text' 
		) );
		
		return $this->description;
	}
	
	/**
	 * CREATES THE CONTENT FOR THE HOME BOX
	 * 
	 * @param (String) $icon        	
	 * @param (String) $about        	
	 * @param (String) $link        	
	 * @return (String) --------------------------------------------
	 */
	public function homebox_content($icon, $about, $link) {
		$span_class = array (
				'class' => 'banner-icon ' . $icon 
		);
		
		$this->contents .= '<div class="news clearfix">';
		$this->contents .= span ( '', $span_class );
		$this->contents .= $this->homebox_about ( $about ) . '</div>';
		
		return $this->contents;
	}
	
	/**
	 * CREATES A HOMEBOX PANEL
	 * 
	 * @param (String) $type        	
	 * @param (String) $contents        	
	 * @return (String) $homebox
	 *         --------------------------------------------
	 */
	static function create_homebox($type = 'G', $contents = '', $is_block = false) {
		switch ($type) {
			case 'G' :
				$box_color = 'green';
				break;
			case 'LG' :
				$box_color = 'light-green';
				break;
			case 'W' :
				$box_color = 'white';
				break;
			default :
			case 'G' :
				$box_color = 'green';
				break;
		}
		
		($is_block === true) ? $box_color = $box_color . ' block' : $box_color;
		
		$attribute = array (
				'class' => 'home-box ' . $box_color 
		);
		
		$homebox = element_tag ( 'li', 'open', $attribute );
		$homebox .= $contents;
		$homebox .= element_tag ( 'li' );
		
		return $homebox;
	}
	
	/**
	 * CREATES THE DISPLAY FOR HOME BOX BANNER
	 * 
	 * @return (String) --------------------------------------------
	 */
	public function display_homebox_banner() {
		$result = $this->get_homebox ();
		
		foreach ( $result as $item ) {
			$attributes = array (
					'title' => $item ['title'],
					'target' => '_blank',
					'class' => 'more black icon-small-arrow margin-right-white' 
			);
			
			$contents = $this->homebox_title ( $item ['title'], $item ['link'] );
			$contents .= $this->homebox_subtitle ( $item ['subtitle'] );
			$contents .= $this->homebox_content ( $item ['icon'], $item ['about'], $item ['link'] );
			$contents .= anchor ( $item ['link'], 'More', $attributes );
			
			$this->box .= self::create_homebox ( $item ['type'], $contents );
			$this->clear_object ();
			$contents = '';
		}
		
		return $this->box;
	}
}
?>