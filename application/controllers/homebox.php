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
	 * CREATES LIST INSIDE THE HOMEBOX
	 *
	 * --------------------------------------------
	 * @param (Object) $data
	 * @param (Object) $list
	 * @return (View)
	 */
	private function homebox_list($data, $list) {
		$data['result'] = $list;

		return $this->load->view ( TPL_HOMEBOX_LIST, $data, true );
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
	 * CREATES A HOMEBOX PANEL
	 * DEFAULT DISPLAYS HORIZONTALLY
	 *
	 * $contents['title'] -- homebox title
	 * $contents['subtitle'] -- homebox subtitle
	 * $contents['display'] -- homebox content ( html, text, array )
	 * $contents['banner_icon'] -- homebox icon
	 * $contents['display_limit'] -- homebox content character limit
	 * $contents['type'] -- homebox type ( news, list )
	 * --------------------------------------------
	 * @param (String) $type
	 * @param (String) $contents
	 * @param (Boolean) $is_block
	 * @return (View)
	 */
	public function create_homebox($type = 'G', $contents, $is_block = false) {
		$data['contents']  = $contents;

		switch ($type) {
			case 'G' : // GREEN
				$data['box_color'] = "green";
				$data['icon']      = "icon-card-white";
				$data['button']    = "more black icon-small-arrow margin-right-white";
				break;
			case 'LG': // LIGHT GREEN
				$data['box_color'] = "light-green";
				$data['icon']      = "icon-card-white";
				$data['button']    = "more black icon-small-arrow margin-right-white";
				break;
			case 'W' : // WHITE
				$data['box_color'] = "white";
				$data['icon'] = "icon-card-white";
				$data['button']    = "more black icon-small-arrow margin-right-white";
				break;
			case 'D' : // DARK
				$data['box_color'] = "dark";
				$data['icon']      = "icon-card-green";
				$data['button']    = "more black icon-small-arrow margin-right-white";
				break;
			default  : // GREEN
				$data['box_color'] = "green";
				$data['icon']      = "icon-card-white";
				$data['button']    = "more black icon-small-arrow margin-right-white";
				break;
		}

		// display vertically
		if ( $is_block === true )
		  $data['box_color'] = $data['box_color'] . ' block';

		if ( isset( $contents['type'] ) && $contents['type'] == 'list' ) {
			$data['display'] = $this->homebox_list ( $data, $contents['display'] );
		}else{
			$data['display'] = ( isset( $contents['display'] ) )?
									$contents['display'] : '';
		}

		return $this->load->view ( TPL_HOMEBOX, $data, true );
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
			$data['title']         = $item['title'];
			$data['subtitle']      = $item['subtitle'];
			$data['display']       = $item ['about'];
			$data['banner_icon']   = $item ['icon'];
			$data['display_limit'] = 100;
			$data['type']          = 'news';

			$box .= $this->create_homebox( $item ['type'], $data );
		}

		return $box;
	}
}
?>