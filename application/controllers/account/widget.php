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
	var $title          = '';
	var $subtitle       = '';
	var $type           = 'basic';
	var $content        = '';
	var $has_toolbox    = TRUE;
	var $custom_toolbox = '';
	var $width          = 6;
	var $widget_class   = '';

	/**
	 * Constructor
	 *
	 * @access public
	 * @param (Array) initialization parameters
	 */
	public function __construct($params = array()) {
		if (count ( $params ) > 0) {
			$this->initialize ( $params );
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Initialize Preferences
	 *
	 * @access public
	 * @param (Array) initialization parameters
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
		$this->set_widget_class();
	}

	// --------------------------------------------------------------------

	/**
	 * Set class name for widget container
	 */
	function set_widget_class() {
		switch( $this->width ) {
			case 1: break;
			case 2: break;
			case 3: break;
			case 4: break;
			case 5: break;
			case 6: $this->widget_class ="col-md-6 col-sm-6 col-xs-12"; break;
			case 7: break;
			default: $this->widget_class ="col-md-6 col-sm-6 col-xs-12"; break;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Set the title for the widget
	 * @return (String) -- widget title
	 */
	function get_title() {
		$widget_heading = heading($this->title.small( $this->subtitle ), '2');

		if($this->has_toolbox) {
			if ( $this->custom_toolbox != "" ){
				$widget_heading.=$this->custom_toolbox;
			}else{
				$widget_heading.='<ul class="nav navbar-right panel_toolbox">';
				$widget_heading.='<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>';
				$widget_heading.='<li><a class="close-link"><i class="fa fa-close"></i></a></li></ul>';
				$widget_heading.='<div class="clearfix"></div>';
			}
		}

		return div($widget_heading, array('class'=>'x_title'));
	}

	// --------------------------------------------------------------------

	/**
	 * Creates a widget
	 * @return (String) $output -- widget
	 */
	function create_widget() {
		$output = "";
		$output.= $this->get_title();
		$output.= div($this->content, array('class'=>'x_content'));

		$output = div($output, array('class'=>'x_panel'));
		$output = div($output, array('class'=>$this->widget_class));

		return $output;
	}

}
?>