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

class News_model extends Common_model {

	public function __construct() {
	}

	/**
	 * GET NEWS
	 * @param $params
	 * @return
	 */
	public function get_news($type="blog", $limit, $offset, $slug = '') {
		if( $type == "blog" || $type == "post" ) {
			$this->db->where( 'deleted', 0 );
		} elseif ( $type == "title" ) {
			$this->db->where( 'slug', $slug );
			$this->db->where( 'deleted', 0 );
		}

		$this->db->order_by ( 'update_datetime', 'desc' );
		return $this->get_result( 'mas_post', $limit, $offset );
	}

	/**
	 * GET NEWS COUNT
	 * @param $params
	 * @return
	 */
	public function get_news_count($type="blog", $limit, $offset, $slug = '') {

		if( $type == "blog" || $type == "post" ) {
			$this->db->where( 'deleted', 0 );
		} elseif ( $type == "title" ) {
			$this->db->where( 'slug', $slug );
			$this->db->where( 'deleted', 0 );
		}

		$this->db->from ( 'mas_post' );
		return $this->db->count_all_results ();
	}

	public function get_latest_news( $limit ) {
		$this->db->where( 'deleted', 0 );
		$this->db->order_by( 'update_datetime', 'desc' );
		return $this->get_result( 'mas_post', $limit );
	}

	/**
	 * GET NEWS
	 * @param $where
	 * @param $limiter
	 * @param $orderBy
	 * @return
	 */
	public function get_news_details($post_id, $limit) {
		$this->db->where( 'post_id', $post_id );
		$this->db->order_by( 'sequence', 'asc' );
		return $this->get_result( 'mas_post_details', $limit );
	}

	/**
	 * GET NEWS TAGS
	 * @param $post_id
	 * @return
	 */
	public function get_news_tags($post_id = null) {
		$this->db->select( 'mas_tags.tag_name' );
		$this->db->join ( 'mas_tags', 'mas_post_tags.tag_id = mas_tags.id' );
		if (! is_null ( $post_id ))
			$this->db->where( 'mas_post_tags.post_id', $post_id );

		return $this->get_result( 'mas_post_tags' );
	}

	/**
	 * GET NEWS AUTHOR
	 * @param $user_id
	 * @return
	 */
	public function get_news_author($user_id) {
		$this->db->select ( 'firstname, lastname' );
		$this->db->where ( 'id', $user_id );
		return $this->get_result( 'mas_users' );
	}



	/**
	 * GET COMMENT COUNT PER POST
	 * @param $post_id
	 * @return
	 */
	public function get_comment_count($post_id) {
		$this->db->from ( 'mas_comments' );
		$this->db->where ( 'post_id', $post_id );
		return $this->db->count_all_results ();
	}

	/**
	 * GET COMMENTS
	 * @param $post_id
	 * @return
	 */
	public function get_comments( $post_id, $limit, $offset ) {
		$sql = 'mas_comments.id, ';
		$sql.= 'mas_comments.post_id, ';
		$sql.= 'mas_comments.comment, ';
		$sql.= 'mas_comments.update_user_id, ';
		$sql.= 'mas_comments.update_datetime, ';
		$sql.= 'mas_users.firstname, ';
		$sql.= 'mas_users.lastname, ';
		$sql.= 'mas_gallery_photos.photo_thumb ';

		$this->db->select( $sql );
		$this->db->join( 'mas_users', 'mas_comments.id =  mas_users.id' );
		$this->db->join( 'mas_gallery_photos', 'mas_gallery_photos.id = mas_users.img' );
		$this->db->where( 'mas_comments.post_id', $post_id );
		$this->db->where( 'mas_comments.deleted', 0 );
		$this->db->order_by( 'mas_comments.update_datetime', 'desc' );

		return $this->get_result( 'mas_comments', $limit, $offset );
	}

	/**
	 * GET NEWS BY TAG
	 * @param $params
	 * @return
	 */
	public function get_news_by_tag($slug, $limit, $offset) {
		$this->db->select( 'mas_post.* ' );
		$this->db->where( 'mas_tags.tag_name', $slug );
		$this->db->where( 'mas_post.deleted', 0 );
		$this->db->join( 'mas_post_tags', 'mas_tags.id = mas_post_tags.tag_id' );
		$this->db->join( 'mas_post', 'mas_post.id = mas_tags.id' );
		$this->db->order_by( 'update_datetime', 'desc' );

		return $this->get_result( 'mas_tags', $limit, $offset );
	}
}
?>