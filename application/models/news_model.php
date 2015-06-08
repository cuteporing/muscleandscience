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
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model {

	private $tbl_post = "mas_post";
	private $tbl_post_details = "mas_post_details";

	public function __construct()
	{
		$this->load->database();
	}

	public function get_where($params)
	{
		// where
		if( isset($params['where']) && count($params['where'] ) > 0 ) {
			foreach ($params['where'] as $field => $value) {
				$this->db->where( $field, $value );
			}
		}
	}

	/**
	 * GET NEWS
	 * @param $where
	 * @param $limiter
	 * @param $orderBy
	 * @return
	 * --------------------------------------------
	 */
	public function get_news($params)
	{
		

		// order by
		if( isset($params['order_by']) && count($params['order_by']) > 0 ) {
			foreach ($params['order_by'] as $field => $value) {
				$this->db->order_by( $field, $value );
			}
		}

		// limit | offset
		if( isset($params['limiter']) && count($params['limiter']) > 0 ) {
			if( !isset($params['limiter']['offset']) ){
				$params['limiter']['offset'] = 0;
			}

			$query = $this->db->get( $this->tbl_post,
				$params['limiter']['limit'], $params['limiter']['offset']);
		}
		else {
			$this->db->from( $this->tbl_post );
			$query = $this->db->get();
		}

		if( $query->num_rows() > 0 ){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	/**
	 * GET NEWS
	 * @param $where
	 * @param $limiter
	 * @param $orderBy
	 * @return
	 * --------------------------------------------
	 */
	public function get_news_details($params)
	{
		// where
		if( isset($params['where']) && count($params['where'] ) > 0 ) {
			foreach ($params['where'] as $field => $value) {
				$this->db->where( $field, $value );
			}
		}

		// order by
		if( isset($params['order_by']) && count($params['order_by']) > 0 ) {
			foreach ($params['order_by'] as $field => $value) {
				$this->db->order_by( $field, $value );
			}
		}

		// limit | offset
		if( isset($params['limiter']) && count($params['limiter']) > 0 ) {
			if( !isset($params['limiter']['offset']) ){
				$params['limiter']['offset'] = 0;
			}

			$query = $this->db->get( $this->tbl_post_details,
				$params['limiter']['limit'], $params['limiter']['offset']);
		}
		else {
			$this->db->from( $this->tbl_post_details );
			$query = $this->db->get();
		}

		if( $query->num_rows() > 0 ){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

}
?>