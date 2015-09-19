<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

/**
 * Widget class
 *
 * @package Muscle and Science
 * @subpackage Libraries
 * @author Ashenvale
 *
 */
class Widget {
	var $title       = '';
	var $subtitle    = '';
	var $type        = 'basic';
	var $content     = '';
	var $has_toolbox = TRUE;
	var $width       = 6;
	var $widget_class= 'col-md-6 col-sm-6 col-xs-12tt';

	/**
	 * Constructor
	 *
	 * @access public
	 * @param array initialization parameters
	 */
	public function __construct($params = array()) {
		if (count ( $params ) > 0) {
			$this->initialize ( $params );
		}

		log_message ( 'debug', "Widget Class Initialized" );
	}

	// --------------------------------------------------------------------

	/**
	 * Initialize Preferences
	 *
	 * @access public
	 * @param array initialization parameters
	 * @return void
	 */
	function initialize($params = array()) {
		if (count ( $params ) > 0) {
			foreach ( $params as $key => $val ) {
				if (isset ( $this->$key )) {
					$this->$key = $val;
				}
			}
		}
	}

}
?>