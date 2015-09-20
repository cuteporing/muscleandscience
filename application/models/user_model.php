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

	private $id       = null;
	private $username  = "";
	private $password  = "";
	private $user_kbn  = null;
	private $lastname  = "";
	private $firstname = "";
	private $status    = null;
	private $gender    = "";
	private $birthday  = "";
	private $phone     = null;
	private $email     = null;
	private $occupation= null;
	private $address   = null;
	private $img       = null;
	private $photo     = "";

	private $title     = "";
	private $name      = "";

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Function to get a property
	 * @param $property
	 */
	public function get($property) {
		if (property_exists($this, $property)) {
			return $this->$property;
		}
	}

	/**
	 * Function for setting a value to a property
	 * @param (string) $property
	 * @param (string, number) $value
	 * @return User_model
	 */
	public function set($property, $value) {
		if (property_exists($this, $property)) {
			$this->$property = $value;
		}

		return $this;
	}

	/**
	 * Set user info
	 * @param (array) $result -- associative array
	 */
	public function set_user($result) {
		foreach ($result as $user => $row) {
			foreach ($row as $key=> $value) {
				$this->set($key, $value);
			}
		}
	}

	/**
	 * Function for setting an equivalent title per user_kbn
	 */
	public function set_title() {
		if( $this->user_kbn == 30 )
			$this->set('title', 'Technical Admin');
		elseif( $this->user_kbn == 20 )
			$this->set('title', 'Administrator');
		else
			$this->set('title', 'Member');
	}

	/**
	 * Function for setting the logged in user info
	 * @param (array) $result
	 */
	public function set_login_data($result) {
		$this->set_user($result);
		$this->set_title();
	}

	/**
	 * Generate the encrypted version of the user's password
	 * @param (Array) $user_info
	 * @return (String) $encrypted_password
	 */
	private function generate_password() {
		return $this->bcrypt->hash_password($this->get('password'));
	}

	/**
	 * Check if user exist
	 * @return (Array)
	 */
	public function check_login_user( $authenticated = false ) {
		$this->db->select( 'mas_users.*, mas_gallery_photos.photo' );
		if( $authenticated ) {
			$this->db->where( 'mas_users.id', $this->get('id') );
		} else {
			$this->db->where( 'username', $this->get('username') );
		}

		$this->db->where( 'status', 1 );
		$this->db->where( 'deleted', 0 );
		$this->db->join ( 'mas_gallery_photos', 'mas_users.img = mas_gallery_photos.id', 'left' );
		return $this->get_result( 'mas_users', 1 );
	}

	/**
	 * Count all new user that signed up
	 */
	public function count_new_user() {
		$this->db->where( 'status', 2 );
		$this->db->where( 'deleted', 0 );
		$this->db->from( 'mas_users' );
		return $this->db->count_all_results ();
	}

	/**
	 * Check if user is authenticated
	 * @return boolean
	 */
	public function authenticated() {
		$mas_user = $this->session->userdata('mas_user');
		if( $mas_user !== FALSE ) {
			// Get user info
			$this->set( 'id', $mas_user['id'] );

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
			$this->session->set_userdata( 'mas_user', array('id'=>$result[0]['id']) );
			return true;
		} else {
			return false;
		}
	}
}
?>