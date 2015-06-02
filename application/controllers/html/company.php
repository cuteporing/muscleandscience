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

class company extends CI_controller
{

	private $company_info_list;
	private $company_opening_hrs;
	private $company_social_list;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('company_model');
	}

	/**
	 * GET COMPANY INFO
	 * @return (Array)
	 * --------------------------------------------
	 */
	public function get_company_info()
	{
		return $this->company_model->get_company_info();
	}

	/**
	 * DISPLAYS THE COMPANY INFO LISTS
	 * @return List <li>
	 * --------------------------------------------
	 */
	public function display_company_info($list = '')
	{
		$result = $this->get_company_info();

		// Clear the company's info details before
		// adding the latest details
		$this->company_info_list = '';

		$row_start= '<li class="footer-contact-info-row">';
		$col_left = array('class' => 'footer-contact-info-left');
		$col_right= array('class' => 'footer-contact-info-right');
		$row_end  = '</li>';

		foreach ($result as $item) {
			$phone = json_decode($item['phone']);
			$email = anchor($item['email'], $item['email'], array('title' => 'Send Email'));

			// Displays the list of contact information
			$list .= $row_start;
			$list .= div(common::checkData($item['street_address_1']), $col_left);
			$list .= div(common::checkData($phone[0]), $col_right).$row_end.$row_start;
			$list .= div(common::checkData($item['street_address_2']), $col_left);
			$list .= div(common::checkData($phone[1]), $col_right).$row_end.$row_start;
			$list .= div(common::checkData($item['city']), $col_left);
			$list .= div('', $col_right);
			$list .= $row_end.$row_start;
			$list .= div($email);
			$list .= $row_end;
		}

		$this->company_info_list = $list;

		return $this->company_info_list;
	}

	/**
	 * GET COMPANY OPERATING SCHEDULE
	 * @return (Array)
	 * --------------------------------------------
	 */
	public function display_company_opening_hrs()
	{
		date_default_timezone_set('asia/manila');
		$result       = $this->get_company_info();
		$opening      = json_decode($result[0]['opening_hours']);
		$opening_type = $result[0]['opening_day_type'];
		$list         = '';
		$li           = '<li class="icon-clock-green">';

		// Clear the company's info details before
		// adding the latest details
		$this->company_opening_hrs = '';

		$days = $this->get_company_operation($opening_type, $opening);

		foreach ($days as $key) {
			$time    =  $key['opening'].' - '.$key['closing'];
			$tooltip =  date ('h:i A',strtotime($key['opening'])).' - '.
									date ('h:i A',strtotime($key['closing']));

			$list .= $li;
			$list .= span($key['day']);
			$list .= div($time, array(
					'class' => 'value',
					'data-tooltip' => '',
					'title' => $tooltip
				)
			);
			$list .= '</li>';
		}
		$this->company_opening_hrs = $list;

		return $this->company_opening_hrs;
	}

	/**
	 * GET THE DISPLAYED OPENING HRS. DEPENDING ON
	 * THE TYPE OF DISPLAY
	 * @param (String) $type -- [MF, E]
	 * @param (Array) $opening
	 * @return (Array)
	 * --------------------------------------------
	 */
	public function get_company_operation($type, $opening)
	{
		$days = array();

		foreach( $opening as $item )
		{
			if( $type == 'MF' )
			{
				if( empty( $days ) || $item->day == 'Saturday' ){
					array_push($days, array(
							'day'     => $item->day,
							'opening' => $item->opening,
							'closing' => $item->closing
						)
					);
				}

				$last_day  = end($days);
				$key       = key($days);
				$last_day  = current(array_slice($days, -1));

				if( $last_day['day']  == 'Monday' && $item->day == 'Friday' )
				{
					$days[$key]['day'] = $last_day['day'].' - '.$item->day;
				}

				if( $item->day == 'Sunday' )
				{
					if( $item->opening == $last_day['opening'] &&
						$item->opening == $last_day['closing'] )
					{
						$days[$key]['day'] = $last_day['day'].' - '.$item->day;
					}else{
						array_push($days, array(
							'day'     => $item->day,
							'opening' => $item->opening,
							'closing' => $item->closing
							)
						);
					}
					
				}
			}
			elseif( $type == 'E' )
			{
				array_push($days, array(
					'day'     => $item->day,
					'opening' => $item->opening,
					'closing' => $item->closing
					)
				);
			}
		}
		return $days;
	}

	/**
	 * GET COMPANY SOCIAL MEDIA NETWORKS
	 * @return (Array)
	 * --------------------------------------------
	 */
	public function get_company_social()
	{
		return $this->company_model->get_company_social();
	}

	/**
	 * GET ATTRIBUTES FOR THE SOCIAL ICON
	 * @param (String) $title
	 * @param (String) $icon
	 * @return (Array)
	 * --------------------------------------------
	 */
	public function get_company_social_attrib($title, $icon)
	{
		return array(
			'class'        => 'social-icon '.$icon,
			'data-tooltip' => '',
			'target'       => '_blank',
			'title'        => $title );
	}

	/**
	 * DISPLAYS THE FOOTER LISTS FOR SOCIAL SITE
	 * @return List <li>
	 * --------------------------------------------
	 */
	public function display_company_social()
	{
		$result = $this->get_company_social();

		// Clear the company's social list before
		// adding all the list
		$this->company_social_list = '';

		foreach ($result as $item) {

			$attribute = $this->get_company_social_attrib(
				$item['social_network'], $item['icon'] );

			$this->company_social_list .= '<li>'.anchor(
				$item['link'], '&nbsp;', $attribute);

		}
		return $this->company_social_list;
	}
}
?>