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

	public function __construct()
	{
		$this->load->database();
	}

	/**
	 * GET WHERE STATEMENT
	 * @param $params
	 * --------------------------------------------
	 */
	public function get_where($params)
	{
		if( isset($params['where']) && count($params['where'] ) > 0 ) {
			foreach ($params['where'] as $field => $value) {
				$this->db->where( $field, $value );
			}
		}
	}

	/**
	 * GET ORDER BY STATEMENT
	 * @param $params
	 * --------------------------------------------
	 */
	public function get_orderby($params)
	{
		if( isset($params['order_by']) && count($params['order_by']) > 0 ) {
			foreach ($params['order_by'] as $field => $value) {
				$this->db->order_by( $field, $value );
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
		$this->get_where($params);
		$this->get_orderby($params);

		// limit | offset
		if( isset($params['limiter']) && count($params['limiter']) > 0 ) {
			if( !isset($params['limiter']['offset']) ){
				$params['limiter']['offset'] = 0;
			}

			$query = $this->db->get( TBL_POST,
				$params['limiter']['limit'], $params['limiter']['offset']);
		}
		else {
			$this->db->from( TBL_POST );
			$query = $this->db->get();
		}

		if( $query->num_rows() > 0 ){
			return $query->result_array();
		}
		else{
			return null;
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
		$this->get_where($params);
		$this->get_orderby($params);

		// limit | offset
		if( isset($params['limiter']) && count($params['limiter']) > 0 ) {
			if( !isset($params['limiter']['offset']) ){
				$params['limiter']['offset'] = 0;
			}

			$query = $this->db->get( TBL_POST_DETAILS,
				$params['limiter']['limit'], $params['limiter']['offset']);
		}
		else {
			$this->db->from( TBL_POST_DETAILS );
			$query = $this->db->get();
		}

		if( $query->num_rows() > 0 ){
			return $query->result_array();
		}
		else{
			return null;
		}
	}

	/**
	 * GET NEWS TAGS
	 * @param $post_id
	 * @return
	 * --------------------------------------------
	 */
	public function get_news_tags($post_id = null)
	{
		$this->db->select(TBL_TAGS.'.tag_name');
		$this->db->from(TBL_POST_TAGS);
		$this->db->join(TBL_TAGS, TBL_POST_TAGS.'.tag_id = '.TBL_TAGS.'.id');
		if(!is_null($post_id)){
			$this->db->where(TBL_POST_TAGS.'.post_id', $post_id);
		}
		$query = $this->db->get();
		if( $query->num_rows() > 0 ){
			return $query->result_array();
		}
		else{
			return null;
		}
	}

	/**
	 * GET NEWS AUTHOR
	 * @param $user_id
	 * @return
	 * --------------------------------------------
	 */
	public function get_news_author($user_id)
	{
		$this->db->select('firstname, lastname');
		$this->db->from(TBL_USERS);
		$this->db->where('_id', $user_id);

		$query = $this->db->get();
		if( $query->num_rows() > 0 ){
			return $query->result_array();
		}
		else{
			return null;
		}
	}

	public function get_news_count($params)
	{
		$this->db->from(TBL_POST);
		$this->get_where($params);
		return $this->db->count_all_results();
	}

	/**
	 * GET COMMENT COUNT PER POST
	 * @param $post_id
	 * @return
	 * --------------------------------------------
	 */
	public function get_comment_count($post_id)
	{
		$this->db->from(TBL_COMMENTS);
		$this->db->where('post_id', $post_id);
		return $this->db->count_all_results();
	}

	/**
	 * GET COMMENTS
	 * @param $post_id
	 * @return
	 * --------------------------------------------
	 */
	public function get_comments($params)
	{
		$this->get_where($params);
		$this->get_orderby($params);

		$sql = TBL_COMMENTS.".id, ";
		$sql.= TBL_COMMENTS.".post_id, ";
		$sql.= TBL_COMMENTS.".comment, ";
		$sql.= TBL_COMMENTS.".update_user_id, ";
		$sql.= TBL_COMMENTS.".update_datetime, ";
		$sql.= TBL_USERS.".firstname, ";
		$sql.= TBL_USERS.".lastname, ";
		$sql.= TBL_GALLERY_PHOTOS.".photo_thumb ";

		$this->db->select($sql);
		$this->db->from(TBL_COMMENTS);
		$this->db->join(TBL_USERS, TBL_COMMENTS.".id = ".TBL_USERS."._id");
		$this->db->join(TBL_GALLERY_PHOTOS, TBL_GALLERY_PHOTOS.".id = ".TBL_USERS.".img");

		$query = $this->db->get();
		if( $query->num_rows() > 0 ){
			return $query->result_array();
		}
		else{
			return null;
		}
	}
}
?>