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

class footer extends CI_controller {
	private $company_info;

	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'company_model' );
		$this->company_info = $this->company_model->get_company_info ();
	}


	/**
	 * Get the displayed opening hrs depending on the type of display
	 * @return (Array) $days
	 */
	public function get_company_operation() {
		$operation = json_decode (  $this->company_info[0]['opening_hours'] );
		$type      = $this->company_info[0]['opening_day_type'];
		$days      = array ();

		if( count( $operation ) == 0 ) {
			return;
		}

		foreach ( $operation as $row ) {
			if ( $row->opening != "00:00" ) {
				if ( !empty ( $days ) ) {
					$key  = key ( $days );
					$last = current ( array_slice ( $days, - 1 ) );

					if(  $row->opening == $last['opening'] && $row->closing == $last['closing'] ) {
						$days[$key]['day'] = $last_day.' - '.$row->day;
					}else {
						$last_day = $row->day;
						array_push ( $days, array (
							'day' => $row->day,
							'opening' => $row->opening,
							'closing' => $row->closing
						) );
					}

				}else{
					$last_day = $row->day;

					array_push ( $days, array (
						'day' => $row->day,
						'opening' => $row->opening,
						'closing' => $row->closing
					) );
				}
			}
		}

		return $days;
	}

	/**
	 * Footer display
	 * @return (View) -- Display page
	 */
	public function view() {
		$news = new news ();
		$data['result_info']      = $this->company_info;
		$data['result_social']    = $this->company_model->get_company_social ();
		$data['result_operation'] = $this->get_company_operation ();
		$data['result_recent_post'] = $news->get_latest_news();

		$data ['footer'] ['info'] = $this->load->view (
				TPL_PAGE_TEMPLATES.'footer_company_info', $data, true );
		$data ['footer'] ['opening'] = $this->load->view (
				TPL_PAGE_TEMPLATES.'footer_company_operation', $data, true );
		$data ['footer'] ['recent_post'] = $this->load->view (
				TPL_PAGE_TEMPLATES.'footer_recent_post', $data, true );

		$this->load->view ( 'pages/templates/footer', $data );
	}
}
?>
