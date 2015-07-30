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
	 * GET THE DISPLAYED OPENING HRS. DEPENDING ON
	 * THE TYPE OF DISPLAY
	 *
	 * --------------------------------------------
	 * @return (Array)
	 */
	public function get_company_operation() {
		$operation = json_decode (  $this->company_info[0]['opening_hours'] );
		$type      = $this->company_info[0]['opening_day_type'];
		$days      = array ();

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
	 * FOOTER DISPLAY
	 *
	 * @return
	 * --------------------------------------------
	 */
	public function view() {
		$data['result_info']      = $this->company_info;
		$data['result_social']    = $this->company_model->get_company_social ();
		$data['result_operation'] = $this->get_company_operation ();

		$data ['footer'] ['info'] = $this->load->view (
				TPL_FOOTER_COMPANY_INFO, $data, true );
		$data ['footer'] ['opening'] = $this->load->view (
				TPL_FOOTER_COMPANY_OPERATION, $data, true );

		$this->load->view ( 'pages/templates/footer', $data );
	}
}
?>
