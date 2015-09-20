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
	private $member_id      = null; // mandatory not null
	private $user_id        = null; // mandatory not null
	private $package_id     = null; // mandatory not null
	private $date_start     = "";   // mandatory
	private $date_end       = "";   // mandatory
	private $amount         = null; // mandatory not null
	private $discount       = null;
	private $note           = "";
	private $session_left   = null; // mandatory not null
	private $create_user_id = null; // mandatory not null
	private $create_datetime= "";   // mandatory
	private $update_user_id = null; // mandatory not null
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
		$this->db->where( 'mas_package_type.package_code', 'M' );
		$this->db->where( 'mas_members.date_end >=', date("Y-m-d"));
		$this->db->from( 'mas_members' );

		$this->db->join('mas_package', 'mas_members.package_id = mas_package.id', 'left');
		$this->db->join('mas_package_type', 'mas_package.package_type_id = mas_package_type.id', 'left');

		return $this->db->count_all_results ();
	}

	/**
	 * Function for getting the number of personal training members
	 * return (integer)
	 */
	public function count_pt_members() {
		$this->db->where( 'mas_package_type.package_code', 'PT' );
		$this->db->where( 'mas_members.session_left !=', 0 );
		$this->db->from( 'mas_members' );

		$this->db->join('mas_package', 'mas_members.package_id = mas_package.id', 'left');
		$this->db->join('mas_package_type', 'mas_package.package_type_id = mas_package_type.id', 'left');

		return $this->db->count_all_results ();
	}

	/**
	 * Function for getting the number of unpaid members
	 * return (integer)
	 */
	public function count_unpaid_members() {
		$this->db->where( 'balance >', 0 );
		$this->db->from( 'mas_members' );
		return $this->db->count_all_results ();
	}

	/**
	 * Function for getting the top 5 gym members
	 * @return
	 */
	public function top_gym_members() {
		$sql = "CONCAT(mas_users.firstname, Char(32), mas_users.lastname ) AS name, ";
		$sql.= "mas_members_ranking.points, ";
		$sql.= "(SELECT COUNT(*) FROM mas_members ";
		$sql.= " LEFT JOIN mas_package ON mas_members.package_id = mas_package.id";
		$sql.= " WHERE";
		$sql.= "   mas_members.user_id = mas_members_ranking.user_id AND";
		$sql.= "   mas_package.session = 1 AND";
		$sql.= "   mas_package.package_type='M'";
		$sql.= " ) AS session, ";
		$sql.= "(SELECT COUNT(*) FROM mas_members ";
		$sql.= " LEFT JOIN mas_package ON mas_members.package_id = mas_package.id";
		$sql.= " WHERE";
		$sql.= "   mas_members.user_id = mas_members_ranking.user_id AND";
		$sql.= "   mas_package.monthly = 1 AND";
		$sql.= "   mas_package.package_type='M'";
		$sql.= " ) AS monthly";

		$this->db->select($sql);
		$this->db->join('mas_users', 'mas_members_ranking.user_id = mas_users.id', 'left');
		$this->db->join('mas_members', 'mas_members_ranking.user_id = mas_members.user_id', 'left');
		$this->db->join('mas_package', 'mas_members.package_id = mas_package.id', 'left');
		$this->db->join('mas_package_type', 'mas_package.package_type_id = mas_package_type.id', 'left');
		$this->db->where('mas_package_type.package_code', 'M');
		$this->db->where('mas_users.deleted', 0);
		$this->db->order_by( 'mas_members_ranking.points', 'desc' );
		$this->db->group_by('name');

		return $this->get_result( 'mas_members_ranking', 5 );
	}

	/**
	 * Function for getting the top 5 personal training members
	 * @return
	 */
	public function top_pt_members() {
		$sql = "CONCAT(mas_users.firstname, Char(32), mas_users.lastname ) AS name, ";
		$sql.= "mas_members_ranking.points, ";
		$sql.= "(SELECT SUM(mas_package.total_session) FROM mas_members ";
		$sql.= " LEFT JOIN mas_package ON mas_members.package_id = mas_package.id";
		$sql.= " WHERE";
		$sql.= "   mas_members.user_id = mas_members_ranking.user_id AND";
		$sql.= "   mas_package.session = 1 AND";
		$sql.= "   mas_package.package_type='PT'";
		$sql.= " ) AS session, ";

		$this->db->select($sql);
		$this->db->join('mas_users', 'mas_members_ranking.user_id = mas_users.id', 'left');
		$this->db->join('mas_members', 'mas_members_ranking.user_id = mas_members.user_id', 'left');
		$this->db->join('mas_package', 'mas_members.package_id = mas_package.id', 'left');
		$this->db->join('mas_package_type', 'mas_package.package_type_id = mas_package_type.id', 'left');
		$this->db->where('mas_package_type.package_code', 'PT');
		$this->db->where('mas_users.deleted', 0);
		$this->db->order_by('mas_members_ranking.points', 'desc');
		$this->db->group_by('name');

		return $this->get_result( 'mas_members_ranking', 5 );
	}

	public function get_all_members() {
		$sql = "mas_users.id,
						CONCAT(mas_users.firstname, Char(32), mas_users.lastname ) AS name,
						mas_package_type.package AS membership,
						mas_package.package,
						mas_members.balance,
						(CASE
							WHEN mas_package_type.id = 1 THEN '---'
							ELSE mas_members.session_left END ) AS session_left";

		$this->db->select($sql);
		$this->db->join('mas_users', 'mas_users.id = mas_members.user_id', 'left');
		$this->db->join('mas_package', 'mas_package.id = mas_members.package_id', 'left');
		$this->db->join('mas_package_type', 'mas_package_type.id = mas_package.package_type_id', 'left');
		$this->db->where('mas_members.date_end >=', date("Y-m-d"));
		$this->db->where('mas_users.user_kbn', 10);
		$this->db->where('mas_users.deleted', 0);
		$this->db->where('mas_users.status', 1);

		return $this->get_result( 'mas_members' );
	}
}
?>