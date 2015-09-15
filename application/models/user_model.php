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

class User_model extends Common_model {

	public $id;
	public $username;
	public $password;
	public $name;
	public $user_data;

	public function __construct() {
		parent::__construct();

		$this->id = null;
		$this->username = "";
		$this->password = "";
		$this->name = "";
		$this->user_data = array();
	}

	public function set_userid($id) {
		$this->id = $id;
	}

	public function set_username($username) {
		$this->username = $username;
	}

	public function set_password($password) {
		$this->password = $password;
	}

	public function set_name() {
		$this->name = ucwords($this->user_data['firstname'].' '.
													$this->user_data['lastname']);
	}

	public function get_name() {
		return $this->name;
	}

	public function set_login_data($result) {
		$this->user_data = $result[0];
		$this->set_name();
	}

	public function get_login_data() {
		return $this->user_data;
	}

	/**
	 * Generate the encrypted version of the user's password
	 * @param (Array) $user_info
	 * @return (String) $encrypted_password
	 */
	private function generate_password() {
		return $this->bcrypt->hash_password($this->password);
	}


	/**
	 * Check if user exist
	 * @return (Array)
	 */
	public function check_login_user( $authenticated = false ) {
		if( $authenticated ) {
			$this->db->where( '_id', $this->id );
		} else {
			$this->db->where( 'username', $this->username );
		}

		$this->db->where( 'status', 1 );
		return $this->get_result( 'mas_users', 1 );
	}

	/**
	 * Check if user is authenticated
	 * @return boolean
	 */
	public function authenticated() {
		$mas_user = $this->session->userdata('mas_user');
		if( $mas_user !== FALSE ) {
			// Get user info
			$this->set_userid($mas_user['id']);
			$result = $this->check_login_user( true );
			$this->set_login_data($result);
			return true;
		}

		// Get user info
		$result = $this->check_login_user();

		// If no username matched return false
		if( is_null($result) ) return false;

		$stored_password = $result[0]['password'];

		// Authenticate password
		if ($this->bcrypt->check_password($this->password, $stored_password) ) {
			$this->session->set_userdata( 'mas_user', array('id'=>$result[0]['_id']) );
			return true;
		} else {
			return false;
		}
	}
}
?>