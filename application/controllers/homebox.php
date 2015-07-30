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

class homebox extends CI_controller {

	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'homebox_model' );
	}

	/**
	 * CREATES THE TITLE HEADER FOR HOMEBOX <h2>
	 *
	 * --------------------------------------------
	 * @param (String) $title
	 * @param (String) $link
	 * @return (String) $homebox_title
	 */
	private function homebox_title($title, $link = '') {
		($title == "") ?
		  $homebox_title = heading ( anchor ( '#', 'Untitled homebox' ), '2' )
		: $homebox_title = heading ( anchor ( $link, $title, array (
				'title' => $title
		) ), '2' );

		return $homebox_title;
	}

	/**
	 * CREATES THE SUBTITLE HEADER FOR HOMEBOX <h3>
	 *
	 * --------------------------------------------
	 * @param (String) $subtitle
	 * @return (String) $homebox_subtitle
	 */
	private function homebox_subtitle($subtitle) {
		($subtitle == "") ?
		  $homebox_subtitle = heading ( anchor ( '#', 'no subtitle' ), '3' )
		: $homebox_subtitle = heading ( $subtitle, '3' );

		return $homebox_subtitle;
	}

	/**
	 * CREATES THE DESCRIPTION FOR HOMEBOX
	 *
	 * --------------------------------------------
	 * @param (String) $about
	 * @return (String) $description
	 */
	private function homebox_about($about) {
		($about == "") ?
		  $description = heading ( anchor ( '#', 'no description available!' ), '2' )
		: $description = div ( character_limiter ( $about, 100 ), array (
				'class' => 'text'
		) );

		return $description;
	}

	/**
	 * CREATES THE CONTENT FOR THE HOME BOX
	 *
	 * --------------------------------------------
	 * @param (String) $icon
	 * @param (String) $about
	 * @param (String) $link
	 * @return (String) $contents
	 */
	private function homebox_content($icon, $about, $link) {
		$span_class = array (
				'class' => 'banner-icon ' . $icon
		);

		$contents = '<div class="news clearfix">';
		$contents .= span ( '', $span_class );
		$contents .= $this->homebox_about ( $about ) . '</div>';

		return $contents;
	}

	/**
	 * CREATES LIST INSIDE THE HOMEBOX
	 *
	 * --------------------------------------------
	 * @param (String) $box_color
	 * @param (String) $icon
	 * @param (String) $list
	 * @return (View) $list
	 */
	private function homebox_list($box_color, $icon, $list) {
		$data['box_color'] = $box_color;
		$data['icon'] = $icon;
		$data['list'] = $list;

		$temp_path = 'pages/templates/homebox_list';
		$list = $this->load->view ( $temp_path, $data, true );

		return $list;
	}

	/**
	 * CREATES BUTTON FOR HOMEBOX
	 *
	 * --------------------------------------------
	 * @param (String) $type
	 * @return
	 */
	private function homebox_button($type) {
		return anchor(base_url().'/home',
				$this->lang->line('LBL_00025'), array('class'=>$type));
	}

	/**
	 * CREATES A HOMEBOX PANEL
	 *
	 * --------------------------------------------
	 * @param (String) $type
	 * @param (String) $contents
	 * @param (Boolean) $is_block
	 * @return (String) $homebox
	 */
	public function create_homebox($type = 'G', $contents = '', $is_block = false) {
		switch ($type) {
			case 'G' :
				$box_color = "green";
				$list_icon = "icon-card-white";
				$button    = "more black icon-small-arrow margin-right-white";
				break;
			case 'LG':
				$box_color = "light-green";
				$list_icon = "icon-card-white";
				$button    = "more black icon-small-arrow margin-right-white";
				break;
			case 'W' :
				$box_color = 'white';
				$list_icon = "icon-card-white";
				$button    = "more black icon-small-arrow margin-right-white";
				break;
			case 'D' :
				$box_color = 'dark';
				$list_icon = "icon-card-green";
				$button = "more black icon-small-arrow margin-right-white";
				break;
			default  :
				$box_color = 'green';
				$list_icon = "icon-card-white";
				$button = "more black icon-small-arrow margin-right-white";
				break;
		}

		($is_block === true) ? $box_color = $box_color . ' block' : $box_color;

		$attribute = array (
				'class' => 'home-box ' . $box_color
		);

		$homebox = element_tag ( 'li', 'open', $attribute );

		if( is_array( $contents ) ) {
			$homebox .= $this->homebox_title( $contents['title'] );
			$homebox .= $this->homebox_subtitle ( $contents ['subtitle'] );
			$homebox .= $this->homebox_list ( $box_color, $list_icon, $contents['list'] );
			$homebox .= $this->homebox_button ( $button );
		}else{
			$homebox .= $contents;
		}

		$homebox .= element_tag ( 'li' );

		return $homebox;
	}

	/**
	 * CREATES THE DISPLAY FOR HOME BOX BANNER
	 *
	 * --------------------------------------------
	 * @return (String)
	 */
	public function display_homebox_banner() {
		$result = $this->homebox_model->get_homebox ();
		$box = '';
		foreach ( $result as $item ) {
			$attributes = array (
					'title' => $item ['title'],
					'target' => '_blank',
					'class' => 'more black icon-small-arrow margin-right-white'
			);

			$contents = '';
			$contents .= $this->homebox_title ( $item ['title'], $item ['link'] );
			$contents .= $this->homebox_subtitle ( $item ['subtitle'] );
			$contents .= $this->homebox_content ( $item ['icon'], $item ['about'], $item ['link'] );
			$contents .= anchor ( $item ['link'], 'More', $attributes );

			$box .= $this->create_homebox ( $item ['type'], $contents );
		}

		return $box;
	}
}
?>