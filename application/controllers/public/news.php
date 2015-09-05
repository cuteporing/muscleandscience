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

class news extends pages {
	private $total_rows = 0;
	private $per_page   = 0;

	private $blog_limit      = 10;
	private $post_limit      = 1;
	private $comments_limit  = 10;
	private $blog_desc_limit = 1;
	private $latest_limit    = 2;

	private $param_type = "";
	private $params = array ();

	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'news_model' );
		$this->load->library ( 'pagination' );
	}

	/**
	 * SHOW ALL BUTTON
	 * @return
	 */
	static function show_all_btn() {
		$btn = anchor ( 'news/', 'Show all', array (
				'class' => 'more icon-small-arrow margin-right-white',
				'title' => 'Show all'
		) );

		return div ( $btn, array (
				'class' => 'show-all'
		) );
	}


	/**
	 * EXTRACT POST TAGS
	 * @param (ArrayObject) $data
	 * @return (ArrayObject) $tags
	 */
	public function extract_post_tags($data) {
		$tags = array ();

		if (! is_null ( $data )) {
			foreach ( $data as $key => $val ) {
				array_push ( $tags, $val ['tag_name'] );
			}
		}

		return $tags;
	}


	/**
	 * GET COMMENTS
	 * @param (Integer) $post_id
	 * @param (Integer) $offset
	 * @return (Object)
	 */
	public function get_comments($post_id = null, $offset = 0) {
		if (! is_null ( $post_id )) {
			$this->get_params ();
			$this->params ['limiter'] ['offset'] = $offset;
			$this->params ['where'] = array (
					TBL_COMMENTS . ".deleted" => 0,
					TBL_COMMENTS . ".post_id" => $post_id
			);

			return $this->news_model->get_comments ( $this->params );
		}
	}

	/**
	 * GET PAGINATION
	 * @param $view_type
	 * @return
	 */
	public function get_pagination($view) {
		$config ['base_url'] = base_url () . 'news/' . $view . '/';
		$config ['uri_segment'] = 3;
		$config ['total_rows'] = $this->total_rows;
		$config ['per_page'] = $this->per_page;
		$config ['full_tag_open'] = '<ul class="pagination clearfix">';
		$config ['full_tag_close'] = '</ul>';
		$config ['cur_tag_open'] = '<li class="selected"><a>';
		$config ['cur_tag_close'] = '</a><li>';
		$config ['num_tag_open'] = '<li>';
		$config ['num_tag_close'] = '<li>';
		$config ['first_link'] = FALSE;
		$config ['last_link'] = FALSE;
		$config ['prev_link'] = 'previous';
		$config ['next_link'] = 'next';
		$config ['prev_tag_open'] = '<li>';
		$config ['prev_tag_close'] = '</li>';
		$config ['next_tag_open'] = '<li>';
		$config ['next_tag_close'] = '</li>';
		$this->pagination->initialize ( $config );

		return $this->pagination->create_links ();
	}

	/**
	 * IF OFFSET IS MORE THAN THE NO OF NEWS
	 * @param $total_rows
	 * @param $offset
	 * @return $return_value
	 */
	static function cannot_find_page($total_rows, $offset = 0) {
		$return_value = false;
		if ($offset > $total_rows) {
			$return_value = true;
		} elseif ( is_null( $total_rows ) ) {
			$return_value = true;
		}
		return $return_value;
	}

	public function set_param_type( $type ) {
		$this->param_type = $type;

		$this->get_params();
	}

	/**
	 * GET SEARCH PARAMETER
	 * @param $other
	 * @param $other_offset
	 */
	public function get_params($other = "", $other_offset = 0) {
		$type = str_replace ( '/', '', $this->uri->slash_segment ( 2, 'leading' ) );
		$page = str_replace ( '/', '', $this->uri->slash_segment ( 3, 'leading' ) );

		(! $page) ? $offset = 0 : $offset = $page;

		if ($other == "comments") {
			(! $other_offset) ? $offset = 0 : $offset = $other_offset;
		} else {
			(! $page) ? $offset = 0 : $offset = $page;
		}

		if (self::cannot_find_page ( $this->total_rows, $offset )) {
			return show_404 ();
		}

		$this->params = array ();

		if ($other == "latest") {
			$this->params ['limiter'] ['limit'] = $this->latest_limit;
			$this->params ['where'] = array ( "deleted" => 0 );
			$this->params ['order_by'] = array ( "update_datetime" => "desc" );
		} elseif ($other == "comments") {
			$this->params ['limiter'] ['limit'] = $this->comments_limit;
			$this->params ['order_by'] = array (
					TBL_COMMENTS . ".update_datetime" => "desc"
			);
		} elseif (! $type || $type == "blog") {
			$this->params ['limiter'] ['limit'] = $this->blog_limit;
			$this->params ['limiter'] ['offset'] = $offset;
			$this->params ['where'] = array ( "deleted" => 0 );
			$this->params ['order_by'] = array ( "update_datetime" => "desc" );
		} elseif ($type == "post") {
			$this->params ['limiter'] ['limit'] = $this->post_limit;
			$this->params ['limiter'] ['offset'] = $offset;
			$this->params ['where'] = array ( "deleted" => 0 );
			$this->params ['order_by'] = array ( "update_datetime" => "desc" );
		} elseif ($type == "tag") {
			$slug = str_replace ( '-', ' ', $page );
			$this->params ['limiter'] ['limit'] = $this->blog_limit;
			$this->params ['limiter'] ['offset'] = $offset;
			$this->params ['where'] = array (
					TBL_TAGS . ".tag_name" => $slug,
					TBL_POST . ".deleted" => 0
			);
			$this->params ['order_by'] = array ( "update_datetime" => "desc" );
		} elseif ($type == "title") {
			$this->params ['limiter'] ['limit'] = $this->post_limit;
			$this->params ['limiter'] ['offset'] = $offset;
			$this->params ['where'] = array ( "deleted" => 0, "slug" => $page );
			$this->params ['order_by'] = array ( "update_datetime" => "desc" );
		}
	}

	/**
	 * GET LATEST NEWS
	 * @return $result_post
	 */
	public function get_latest_news( ) {
		$this->get_params ( 'latest' );

		$result_post = $this->news_model->get_news ( $this->params );

		if (! is_null ( $result_post )) {
			for($i = 0; $i < count ( $result_post ); $i ++) {
				$post_id = $result_post [$i] ['id'];
				$author_id = $result_post [$i] ['update_user_id'];

				// search paramter for post description
				$this->params ['limiter'] ['limit'] = $this->blog_desc_limit;
				$this->params ['where'] = array ( "post_id" => $post_id );
				$this->params ['order_by'] = array ( "sequence" => "asc" );

				// get post description
				$result_details = $this->news_model->get_news_details ( $this->params );
				// get tags
				$result_tags = $this->news_model->get_news_tags ( $post_id );
				// get news author
				$result_author = $this->news_model->get_news_author ( $author_id );

				$result_post [$i] ['author'] = $result_author [0];
				$result_post [$i] ['tags'] = $this->extract_post_tags ( $result_tags );
				$result_post [$i] ['description'] = $result_tags;
				$result_post [$i] ['description'] = array (
						$result_details [0] ['description']
				);
				$result_post [$i] ['comment_count'] = $this->news_model->get_comment_count ( $result_post [$i] ['id'] );
			}
		}

		return $result_post;
	}

	/**
	 * VIEW LATEST NEWS
	 * @return $container
	 */
	public function view_latest_news() {
		$result = $this->get_latest_news ();
		$data ['char_limit']  = 450;
		$data ['news_result'] = $result;

		return $this->load->view ( TPL_PAGE_TEMPLATES.'news_list', $data, true ).self::show_all_btn ();
	}

	/**
	 * GET ALL NEWS
	 * @return $result_post
	 */
	public function get_all_news() {
		$type = str_replace ( '/', '', $this->uri->slash_segment ( 2, 'leading' ) );
		$page = str_replace ( '/', '', $this->uri->slash_segment ( 3, 'leading' ) );
		// get total rows
		$this->total_rows = $this->news_model->get_news_count ( $this->params );
		// get parameters
		$this->get_params ();
		// get news
		if ($type == "tag") {
			$result_post = $this->news_model->get_news_by_tag ( $this->params );
		} else {
			$result_post = $this->news_model->get_news ( $this->params );
		}

		if (! is_null ( $result_post )) {
			for($i = 0; $i < count ( $result_post ); $i ++) {
				$post_id = $result_post [$i] ['id'];
				$author_id = $result_post [$i] ['update_user_id'];

				// search paramter for post description
				if ($type == "blog") {
					$params ['limiter'] ['limit'] = $this->blog_desc_limit;
				}
				$this->params ['where'] = array (
						"post_id" => $post_id
				);
				$this->params ['order_by'] = array (
						"sequence" => "asc"
				);

				// get post description
				$result_details = $this->news_model->get_news_details ( $this->params );
				// get tags
				$result_tags = $this->news_model->get_news_tags ( $post_id );
				// get news author
				$result_author = $this->news_model->get_news_author ( $author_id );

				$result_post[$i]['author'] = $result_author [0];
				$result_post[$i]['tags'] = $this->extract_post_tags ( $result_tags );
				$result_post[$i]['description'] = $result_tags;
				$result_post[$i]['description'] = array (
						$result_details[0]['description']
				);
				$result_post[$i]['comment_count'] = $this->news_model->get_comment_count ( $result_post [$i] ['id'] );
			}
		}

		return $result_post;
	}

	/**
	 * VIEW NEWS
	 * @param (String) $page
	 */
	public function view($page) {
		$common = new common ();
		$view   = str_replace ( '/', '', $this->uri->slash_segment ( 2, 'leading' ) );
		$value  = str_replace ( '/', '', $this->uri->slash_segment ( 3, 'leading' ) );

		$result = $this->get_all_news ();

		if (self::cannot_find_page ( $result )) {
			return show_404 ();
		}

		// SEARCH BY BLOG / TAGS
		if (! $view || $view == "blog" || $view == "tag") {
			$this->per_page = $this->blog_limit;
			$data ['char_limit'] = 450;
		}
		// SEARCH BY SINGLE POST
		elseif ($view == "post") {
			$this->per_page = $this->post_limit;
			$data ['char_limit'] = 800;
		}
		// SEARCH BY TITLE
		elseif ($view == "title") {
			$this->per_page = $this->post_limit;
			if (! is_null ( $result )) {
				$data ['comment_result']  = $this->get_comments (
						$result[0]['id'], 0 );
				$data ['comment_display'] = $this->load->view (
						TPL_PAGE_TEMPLATES.'news_comment_list', $data, true );
				$data ['comments'] 	      = $this->load->view (
						TPL_PAGE_TEMPLATES.'news_comments', $data, true );
			}
			$data ['view'] = "title";
			$data ['comment_form'] = $common->get_form (
					TPL_PAGE_FORMS, 'comment' );
		}

		if ( $view != 'title' )
			$data ['pagination'] = $this->get_pagination ( $view );

		$data ['view']         = $view;
		$data ['news_result']  = $result;
		$data ['search_value'] = str_replace ( '-', ' ', $value );
		$data ['breadcrumbs']  = $common->get_breadcrumbs ( $page );
		$data ['tag_list']     = $this->news_model->get_news_tags ();
		$data ['news_list']    = $this->load->view (
				TPL_PAGE_TEMPLATES.'news_list', $data, true );

		$this->load->view ( 'pages/' . $page, $data );
	}
}