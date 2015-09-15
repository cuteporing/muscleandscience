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

	public function __construct() {
	}

	public function count_gym_members() {
		$this->db->where( 'mas_package_type.package_code', 'M' );
		$this->db->where( 'mas_members.date_end >=', 'NOW()' );
		$this->db->from( 'mas_members' );

		$this->db->join('mas_package', 'mas_members.package_id = mas_package.id', 'left');
		$this->db->join('mas_package_type', 'mas_package.package_type_id = mas_package_type.id', 'left');

		return $this->db->count_all_results ();
	}

	public function count_pt_members() {
		$this->db->where( 'mas_package_type.package_code', 'PT' );
		$this->db->where( 'mas_members.session_left !=', 0 );
		$this->db->from( 'mas_members' );

		$this->db->join('mas_package', 'mas_members.package_id = mas_package.id', 'left');
		$this->db->join('mas_package_type', 'mas_package.package_type_id = mas_package_type.id', 'left');

		return $this->db->count_all_results ();
	}

	public function count_unpaid_members() {
		$this->db->where( 'balance >', 0 );
		$this->db->from( 'mas_members' );
		return $this->db->count_all_results ();
	}

	public function top_gym_members() {
		$sql = "CONCAT(mas_users.firstname, Char(32), mas_users.lastname ) AS name, ";
		$sql.= "mas_members_ranking.points, ";
		$sql.= "(SELECT COUNT(*) FROM mas_members ";
		$sql.= " LEFT JOIN mas_package ON mas_members.package_id = mas_package.id";
		$sql.= " WHERE";
		$sql.= "   mas_members._id = mas_members_ranking._id AND";
		$sql.= "   mas_package.session = 1 AND";
		$sql.= "   mas_package.package_type='M'";
		$sql.= " ) AS session, ";
		$sql.= "(SELECT COUNT(*) FROM mas_members ";
		$sql.= " LEFT JOIN mas_package ON mas_members.package_id = mas_package.id";
		$sql.= " WHERE";
		$sql.= "   mas_members._id = mas_members_ranking._id AND";
		$sql.= "   mas_package.monthly = 1 AND";
		$sql.= "   mas_package.package_type='M'";
		$sql.= " ) AS monthly";

		$this->db->select($sql);
		$this->db->join('mas_users', 'mas_members_ranking._id = mas_users._id', 'left');
		$this->db->join('mas_members', 'mas_members_ranking._id = mas_members._id', 'left');
		$this->db->join('mas_package', 'mas_members.package_id = mas_package.id', 'left');
		$this->db->join('mas_package_type', 'mas_package.package_type_id = mas_package_type.id', 'left');
		$this->db->where('mas_package_type.package_code', 'M');
		$this->db->where('mas_users.deleted', 0);
		$this->db->order_by( 'points', 'desc' );

		return $this->get_result( 'mas_members_ranking', 5 );
	}

	public function top_pt_members() {
		$sql = "CONCAT(mas_users.firstname, Char(32), mas_users.lastname ) AS name, ";
		$sql.= "mas_members_ranking.points, ";
		$sql.= "(SELECT SUM(mas_package.total_session) FROM mas_members ";
		$sql.= " LEFT JOIN mas_package ON mas_members.package_id = mas_package.id";
		$sql.= " WHERE";
		$sql.= "   mas_members._id = mas_members_ranking._id AND";
		$sql.= "   mas_package.session = 1 AND";
		$sql.= "   mas_package.package_type='PT'";
		$sql.= " ) AS session, ";

		$this->db->select($sql);
		$this->db->join('mas_users', 'mas_members_ranking._id = mas_users._id', 'left');
		$this->db->join('mas_members', 'mas_members_ranking._id = mas_members._id', 'left');
		$this->db->join('mas_package', 'mas_members.package_id = mas_package.id', 'left');
		$this->db->join('mas_package_type', 'mas_package.package_type_id = mas_package_type.id', 'left');
		$this->db->where('mas_package_type.package_code', 'PT');
		$this->db->where('mas_users.deleted', 0);
		$this->db->order_by( 'points', 'desc' );

		return $this->get_result( 'mas_members_ranking', 5 );
	}
}
?>