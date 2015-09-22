<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

/**
 * Tab_panel class
 *
 * @package Muscle and Science
 * @subpackage Libraries
 * @author Ashenvale
 *
 */
class Tab_panel extends CI_controller {
	var $panels   = array();
	var $tabs     = array();
	var $contents = array();

	/**
	 * Constructor
	 *
	 * @access public
	 * @param (Array) initialization parameters
	 */
	public function __construct() {
		parent::__construct();
	}

	// --------------------------------------------------------------------

	/**
	 * Initialize Preferences
	 *
	 * @access public
	 * @param (String) $label
	 * @param (String) $content
	 * @return void
	 */
	function set($label, $content) {
		if( empty($label) ) return;

		array_push($this->panels, array(
				'tab_label'    =>$label,
				'panel_content'=>$content
		));
	}

	function initialize() {
		if( count($this->panels) > 0 ) {
			foreach ($this->panels as $row ) {
				array_push($this->tabs, $row['tab_label']);
				array_push($this->contents, $row['panel_content']);
			}
		}
	}

	function create() {
		$this->initialize();
		$data['tabs']     = $this->tabs;
		$data['contents'] = $this->contents;

		return $this->load->view( TPL_ACCOUNT_TEMPLATES.'tab_panel', $data, TRUE);
	}
}
?>