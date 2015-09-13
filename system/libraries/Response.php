<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

/**
 * Response class
 *
 * @package CodeIgniter
 * @subpackage Libraries
 * @author Ashenvale
 *
 */
class Response {
	public function __construct($config = array()) {
		$this->CI = & get_instance();
		$this->CI->load->language( 'error' );
	}

	/**
	 * Generate response message for ajax call
	 *
	 * @param string $error_code -- key from error_lang
	 * @param array $data
	 */
	public function generate( $error_code = "", $data = array() ) {
		$CI = & get_instance ();

		$response = array();
		$response['responseName'] = ( isset( $_POST['responseName'] ) )?
				$_POST['responseName'] : "";

		if( $error_code != "" ) {
			$response['errorCode'] = str_replace( "ERROR_", "", $error_code );
			$response['errorMsg'] = $CI->lang->line ( $error_code );
		} else {
			$response['errorCode'] = "";
			$response['errorMsg'] = "";
		}

		$response['data'] = ( is_array( $data ) )? $data : array( $data );

		die( json_encode( $response ) );
	}
}
?>
