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

class Members_model extends Common_model {
	// mas_members
	private $member_id      = null;
	private $user_id        = null;
	private $package_id     = null;
	private $start_date     = "";
	private $end_date       = "";
	private $amount         = null;
	private $discount       = null;
	private $note           = "";
	private $session_left   = null;
	private $create_user_id = null;
	private $create_datetime= "";
	private $update_user_id = null;
	private $update_datetime= "";


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
	 * Function for getting the number of gym members
	 * @return (integer)
	 */
	public function count_gym_members() {
		$this->db->from( 'mas_members' );
		$this->db->join('mas_users', 'mas_users.id = mas_members.user_id', 'left');
		$this->db->join('mas_package', 'mas_package.id = mas_members.package_id', 'left');
		$this->db->join('mas_package_type', 'mas_package_type.id = mas_package.package_type_id', 'left');
		$this->db->where('mas_members.end_date >=', date("Y-m-d"));
		$this->db->where('mas_package_type.id', 1);
		$this->db->where('mas_users.user_kbn', 10);
		$this->db->where('mas_users.deleted', 0);
		$this->db->where('mas_users.status', 1);

		return $this->db->count_all_results ();
	}

	/**
	 * Function for getting the number of personal training members
	 * return (integer)
	 */
	public function count_pt_members() {
		$this->db->from('mas_members');
		$this->db->join('mas_package', 'mas_members.package_id = mas_package.id', 'left');
		$this->db->join('mas_package_type', 'mas_package.package_type_id = mas_package_type.id', 'left');
		$this->db->where('mas_package_type.id', 2);
		$this->db->where('mas_members.session_left !=', 0 );

		return $this->db->count_all_results ();
	}

	/**
	 * Function for getting the number of unpaid members
	 * return (integer)
	 */
	public function count_unpaid_members() {
		$this->db->where( 'balance >', 0 );
		$this->db->from( 'mas_members' );
		$this->db->group_by('user_id');
		return $this->db->count_all_results ();
	}


	/**
	 * Enrolled Gym members per month
	 * @return
	 */
	public function month_enrolled_gym_members() {
		$this->db->select("CONCAT(mas_users.firstname, Char(32), mas_users.lastname ) AS name, mas_package.package, ");
		$this->db->select("DATE_FORMAT(mas_members.start_date, '%M %e, %Y') AS start_date", FALSE);
		$this->db->join('mas_users', 'mas_members.user_id = mas_users.id', 'left');
		$this->db->join('mas_package', 'mas_members.package_id = mas_package.id', 'left');
		$this->db->join('mas_package_type', 'mas_package.package_type_id = mas_package_type.id', 'left');
		$this->db->where("( MONTH(mas_members.start_date) = '".date('m')."' OR  MONTH(mas_members.end_date) = '".date('m')."' )", NULL, FALSE);
		$this->db->where('mas_package_type.id', 1);
		$this->db->where('mas_users.user_kbn', 10);
		$this->db->where('mas_users.deleted', 0);
		$this->db->where('mas_users.status', 1);
		$this->db->group_by('mas_users.id');

		return $this->get_result( 'mas_members');
	}

	/**
	 * Enrolled PT members per month
	 * @return
	 */
	public function month_enrolled_pt_members() {
		$this->db->select("CONCAT(mas_users.firstname, Char(32), mas_users.lastname ) AS name, mas_package.package, mas_members.session_left");
		$this->db->join('mas_users', 'mas_members.user_id = mas_users.id', 'left');
		$this->db->join('mas_package', 'mas_members.package_id = mas_package.id', 'left');
		$this->db->join('mas_package_type', 'mas_package.package_type_id = mas_package_type.id', 'left');
		$this->db->where("( MONTH(mas_members.start_date) = '".date('m')."' )", NULL, FALSE);
		$this->db->where('mas_package_type.id', 2);

		$this->db->where('mas_users.user_kbn', 10);
		$this->db->where('mas_users.deleted', 0);
		$this->db->where('mas_users.status', 1);
		$this->db->group_by('mas_users.id');

		return $this->get_result( 'mas_members');
	}

	/**
	 * Get active gym members
	 * @return
	 */
	public function get_active_gym_members() {
		$this->db->select("mas_users.id, CONCAT(mas_users.firstname, Char(32), mas_users.lastname ) AS name, ");
		$this->db->select("mas_package_type.package AS membership, mas_package.package,");
		$this->db->select("mas_members.start_date, mas_members.end_date, mas_members.balance");
		$this->db->join('mas_users', 'mas_users.id = mas_members.user_id', 'left');
		$this->db->join('mas_package', 'mas_package.id = mas_members.package_id', 'left');
		$this->db->join('mas_package_type', 'mas_package_type.id = mas_package.package_type_id', 'left');
		$this->db->where('mas_members.end_date >=', date("Y-m-d"));
		$this->db->where('mas_package_type.id', 1);
		$this->db->where('mas_users.user_kbn', 10);
		$this->db->where('mas_users.deleted', 0);
		$this->db->where('mas_users.status', 1);

		return $this->get_result( 'mas_members' );
	}

	/**
	 * Get list of active personal training members
	 * @return
	 */
	public function get_active_pt_members() {
		$sql = "mas_users.id,
						CONCAT(mas_users.firstname, Char(32), mas_users.lastname ) AS name,
						mas_package_type.package AS membership,
						mas_package.package,
						mas_members.balance,
						mas_members.session_left";

		$this->db->select($sql);
		$this->db->join('mas_users', 'mas_users.id = mas_members.user_id', 'left');
		$this->db->join('mas_package', 'mas_package.id = mas_members.package_id', 'left');
		$this->db->join('mas_package_type', 'mas_package_type.id = mas_package.package_type_id', 'left');
		$this->db->where('mas_package_type.id', 2);
		$this->db->where('mas_members.session_left !=', 0);
		$this->db->where('mas_users.user_kbn', 10);
		$this->db->where('mas_users.deleted', 0);
		$this->db->where('mas_users.status', 1);

		return $this->get_result( 'mas_members' );
	}

	/**
	 * Get list of unpaid members
	 * @return
	 */
	public function get_unpaid_members() {
		$sql = "mas_users.id,
						CONCAT(mas_users.firstname, Char(32), mas_users.lastname ) AS name,
						(SELECT SUM(balance) FROM mas_members WHERE mas_members.user_id=mas_users.id) AS total_balance";

		$this->db->select($sql);
		$this->db->join('mas_users', 'mas_users.id = mas_members.user_id', 'left');
		$this->db->join('mas_package', 'mas_package.id = mas_members.package_id', 'left');
		$this->db->join('mas_package_type', 'mas_package_type.id = mas_package.package_type_id', 'left');
		$this->db->where('mas_users.user_kbn', 10);
		$this->db->where('mas_users.deleted', 0);
		$this->db->where('mas_users.status', 1);
		$this->db->group_by('mas_users.id');

		return $this->get_result( 'mas_members' );
	}

	public function get_membership_history($id) {
		$sql = "mas_members.member_id AS id,
						mas_package_type.package AS membership,
						mas_members.start_date,
						mas_package.package,
						mas_members.amount,
						mas_members.balance,";
		$this->db->select($sql);
		$this->db->join('mas_users', 'mas_users.id = mas_members.user_id', 'left');
		$this->db->join('mas_package', 'mas_package.id = mas_members.package_id', 'left');
		$this->db->join('mas_package_type', 'mas_package_type.id = mas_package.package_type_id', 'left');
		$this->db->where('mas_users.id', $id);
		$this->db->order_by( 'mas_members.start_date', 'desc' );

		return $this->get_result( 'mas_members' );
	}
}
?>