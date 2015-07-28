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

class gym_class extends pages {
	private $gym_class_list;
	private $params = array ();
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'gym_class_model' );
	}

	/**
	 * CREATES THE HEADING FOR THE ACCORDION
	 *
	 * @param String, $accord_id
	 * @param String, $title
	 * @param String, $subtitle
	 * @return String
	 * --------------------------------------------
	 */
	public function get_accord_head($accord_id, $title = '', $subtitle = '') {
		$accord_heading = heading ( $title, '3' ) . heading ( $subtitle, '5' );

		return anchor ( '#' . $accord_id, $accord_heading, array () );
	}

	/**
	 * CREATES THE THUMBNAIL FOR THE ACCORDION
	 *
	 * @param String, $title
	 * @param String, $src
	 * @return String
	 * --------------------------------------------
	 */
	public function get_thumb_img($title, $src) {
		$img = img ( array (
				'src' => $src,
				'alt' => $src
		) );

		return anchor ( '#', $img, array (
				'class' => 'thumb_img',
				'title' => $title
		) );
	}

	/**
	 * LIMITS THE DISPLAYED DESCRIPTION
	 *
	 * @param String, $type
	 * @param String, $text
	 * @return String
	 * --------------------------------------------
	 */
	public function get_about($limit = FALSE, $text = '') {
		if ($limit = 'compact') {
			return div ( character_limiter ( $text, 150 ), array (
					'class' => 'text'
			) );
		} else {
			return div ( $text, array (
					'class' => 'text'
			) );
		}
	}

	/**
	 * DISPLAY THE GYM CLASS ACCORDION (COMPACT)
	 *
	 * @return List <dd>
	 * --------------------------------------------
	 */
	public function display_gym_class_thumbnail() {
		$result = $this->gym_class_model->get_gym_class_thumb ();

		// Clear the gym class list
		$this->gym_class_list = '';
		$dl_class = array (
				'class' => 'accordion accordion-gym-fitness',
				'data-accordion' => ''
		);
		$btn_class = array (
				'class' => 'more icon-small-arrow margin-right-white'
		);

		$list = element_tag ( 'dl', 'open', $dl_class );

		foreach ( $result as $item ) {
			// button detail link for the each class.
			$footer = '';
			$footer .= anchor ( 'gym_class/' . $item ['slug'], 'details', $btn_class );
			$footer .= anchor ( '#', 'Timetable', $btn_class );

			// contents of the gym classes displayed in the accordion
			$about = '';
			$about .= $this->get_thumb_img ( $item ['title'], $item ['img_thumb'] );
			$about .= $this->get_about ( 'compact', $item ['about'] );
			$about .= div ( $footer, array (
					'class' => 'item-footer clearfix'
			) );

			$list .= element_tag ( 'dd', 'open', array (
					'class' => 'accordion-navigation'
			) );
			$list .= $this->get_accord_head ( $item ['slug'], $item ['title'], $item ['subtitle'] );
			$list .= div ( $about, array (
					'class' => 'content item-content clearfix',
					'id' => $item ['slug']
			) );
			$list .= element_tag ( 'dd' );
		}

		$this->gym_class_list = $list . '</dl>';

		return $this->gym_class_list;
	}
	public function get_params() {
	}

	/**
	 * GET ALL GYM CLASS
	 *
	 * @return List <dd>
	 * --------------------------------------------
	 */
	public function get_all_class() {
		$this->get_params ();

		$result = $this->gym_class_model->get_class ( $this->params );

		if (! is_null ( $result )) {
			for($i = 0; $i < count ( $result ); $i ++) {
				$id = $result[$i]['id'];

				$this->params ['where'] = array (
						TBL_CLASS_TRAINER . ".class_id" => $id
				);
				$result[$i]['trainer'] = $this->gym_class_model->get_class_trainer( $this->params );
			}
		}
		return $result;
	}

	/**
	 * VIEW GYM CLASS
	 *
	 * @param $page
	 * --------------------------------------------
	 */
	public function view($page) {
		$common = new common ();
		$class_path = 'pages/templates/class_accordion_list';
		$homebox_path = 'pages/templates/class_homebox';
		$data ['class_result'] = $this->get_all_class ();
		$data ['class_list'] = $this->load->view ( $class_path, $data, true );
// 		$data ['homebox'] =
		$data ['breadcrumbs'] = $common->get_breadcrumbs ( $page );
		$this->load->view ( 'pages/' . $page, $data );
	}
}
?>