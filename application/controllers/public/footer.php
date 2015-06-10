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

class footer extends CI_controller
{
	/**
	 * COMPANY INFO FOOTER DISPLAY
	 * @return
	 * --------------------------------------------
	 */
	public function display_company_info()
	{
		$company = new company;
		return $company->display_company_info();
	}

	/**
	 * COMPANY SOCIAL NETWORK FOOTER DISPLAY
	 * @return
	 * --------------------------------------------
	 */
	public function display_company_social()
	{
		$company = new company;
		return $company->display_company_social();
	}

	/**
	 * COMPANY OPENING HOURS FOOTER DISPLAY
	 * @return
	 * --------------------------------------------
	 */
	public function display_company_opening_hrs()
	{
		$company = new company;
		return $company->display_company_opening_hrs();
	}

	/**
	 * DISPLAYS PROJECT COPYRIGHT
	 * @return
	 * --------------------------------------------
	 */
	static function copyright()
	{
		$copyright = '© 2014-2015 - Muscle and Science. ';
		$link      = anchor('www.gmail.com', 'DigiArtKBV.com',
			array(
				'target'=>'_blank',
				'title'=>'DigiArtKBV.com'
				)
			);
		return div($copyright.$link,array('class'=>'copyright-area'));
	}

	/**
	 * FOOTER DISPLAY
	 * @return
	 * --------------------------------------------
	 */
	public function view()
	{
		$data['footer']['info'] = $this->display_company_info();
		$data['footer']['social'] = $this->display_company_social();
		$data['footer']['opening'] = $this->display_company_opening_hrs();
		$data['footer']['copyright'] = footer::copyright();

		$this->load->view('templates/footer',$data);
	}
}
?>
