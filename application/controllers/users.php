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

require_once( PATH_UTILS.'common.php');

class Users extends CI_controller {

	static $DEFAULT_PASSWORD_CRYPT_TYPE;

	public function __construct() {
		parent::__construct ();
		$this->load->model('users_model');
		$this->load->helper('security');

		self::$DEFAULT_PASSWORD_CRYPT_TYPE = (version_compare(PHP_VERSION, '5.3.0') >= 0)?
			'PHP5.3MD5': 'MD5';
	}

	/**
	 * Generate the encrypted version of the user's password
	 * @param (Array) $user_info
	 * @return (String) $encrypted_password
	 */
	private function generate_password($user_info) {
		// Get the first 2 characters from the username for salt
		$salt = substr($user_info['username'], 0, 2);

		// If there is no encyryption type defined, use the
		// default encryption type
		if( !isset( $user_info['crypt_type'] ) ||
				empty( $user_info['crypt_type'] ) ) {
			$user_info['crypt_type'] = self::DEFAULT_PASSWORD_CRYPT_TYPE;
		}

		// Generate salt
		if( $user_info['crypt_type'] == 'MD5')
			$salt = '$1$' . $salt . '$';
		elseif( $user_info['crypt_type'] == 'BLOWFISH')
			$salt = '$2$' . $salt . '$';
		elseif( $user_info['crypt_type'] == 'PHP5.3MD5')
			$salt = '$1$' . str_pad($salt, 9, '0');

		// Use blowfish for encryption
		$encrypted_password = crypt( $user_info['password'], $salt);

		return $encrypted_password;
	}

}
?>
