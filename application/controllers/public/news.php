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

class News extends Pages {
	public $total_rows = 0;
	public $per_page   = 0;

	public $blog_limit;
	public $post_limit;
	public $comments_limit;
	public $blog_desc_limit;
	public $latest_limit;
	public $recent_limit;

	public $news_type;
	public $value;

	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'news_model' );
		$this->load->library ( 'pagination' );

		$this->news_type       = "";
		$this->blog_limit      = 10;
		$this->post_limit      = 1;
		$this->comments_limit  = 10;
		$this->blog_desc_limit = 1;
		$this->latest_limit    = 2;
		$this->recent_limit   = 10;
	}

	/**
	 * Show all button
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
	 * Extract post tags
	 * @param array $data
	 * @return array $tags
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
		return $this->news_model->get_comments(
					$post_id, $this->comments_limit, $offset );
	}

	/**
	 * Get pagination
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
	 * If offset is more than the no. of news
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

	/**
	 * Function to get comment offset
	 * @param number $offset
	 * @return number $offset
	 */
	public function get_comment_offset( $offset = 0 ) {
		return $offset;
	}

	/**
	 * Function to get offset
	 * @return $offset
	 */
	public function get_offset() {
		(! $this->value ) ? $offset = 0 : $offset = $this->value;

		return $offset;
	}

	/**
	 * Function to get limit
	 * @return number
	 */
	public function get_limit() {
		if( $this->news_type == "blog" || $this->news_type == "tag" ) {
			return $this->blog_limit;
		} elseif ( $this->news_type == "post" || $this->news_type == "title" ) {
			return $this->post_limit;
		}
	}

	/**
	 * Function to get slug
	 * @return string
	 */
	public function get_slug() {
		if( $this->news_type == "tag" ) {
			return str_replace ( '-', ' ', $this->value );
		} else {
			return $this->value;
		}
	}

	/**
	 * Get latest news
	 * @return $result_post
	 */
	public function get_latest_news( $limit = null ) {
		if( !is_null( $limit ) ) {
			$this->news_type = "recent";
		} else {
			$this->news_type = "latest";
		}

		$result_post = $this->news_model->get_latest_news ( $this->get_limit() );

		if (! is_null ( $result_post )) {
			for($i = 0; $i < count ( $result_post ); $i ++) {
				$post_id = $result_post [$i] ['id'];
				$author_id = $result_post [$i] ['update_user_id'];
				// get post description
				$result_details = $this->news_model->get_news_details (
						$post_id, $this->get_limit() );
				// get tags
				$result_tags = $this->news_model->get_news_tags ( $post_id );
				// get news author
				$result_author = $this->news_model->get_news_author ( $author_id );

				$result_post[$i]['author'] = $result_author[0];
				$result_post[$i]['tags'] = $this->extract_post_tags( $result_tags );
				$result_post[$i]['description'] = $result_tags;
				$result_post[$i]['description'] = array (
						$result_details[0]['description']
				);
				$result_post[$i]['comment_count'] = $this->news_model->
					get_comment_count( $result_post[$i]['id'] );
			}
		}

		return $result_post;
	}

	/**
	 * View latest news
	 * @return $container
	 */
	public function view_latest_news() {
		$data ['char_limit']  = 450;
		$data ['news_result'] = $this->get_latest_news();

		return $this->load->view(
				TPL_PAGE_TEMPLATES.'news_list', $data, true ).self::show_all_btn ();
	}

	/**
	 * GET ALL NEWS
	 * @return $result_post
	 */
	public function get_all_news() {
		// get total rows
		$this->total_rows = $this->news_model->get_news_count(
				$this->news_type,
				$this->get_limit(),
				$this->get_offset(),
				$this->get_slug()
			);

		// get news
		if ( $this->news_type == "tag") {
			$result_post = $this->news_model->get_news_by_tag(
					$this->get_slug(),
					$this->get_limit(),
					$this->get_offset() );
		} else {
			$result_post = $this->news_model->get_news(
					$this->news_type,
					$this->get_limit(),
					$this->get_offset(),
					$this->get_slug() );
		}

		if (! is_null ( $result_post )) {
			for($i = 0; $i < count ( $result_post ); $i ++) {
				$post_id = $result_post[$i]['id'];
				$author_id = $result_post[$i]['update_user_id'];

				// get post description
				$result_details = $this->news_model->get_news_details (
						$post_id, $this->get_limit() );
				// get tags
				$result_tags = $this->news_model->get_news_tags( $post_id );
				// get news author
				$result_author = $this->news_model->get_news_author( $author_id );

				$result_post[$i]['author'] = $result_author [0];
				$result_post[$i]['tags'] = $this->extract_post_tags( $result_tags );
				$result_post[$i]['description'] = $result_tags;
				$result_post[$i]['description'] = array(
						$result_details[0]['description']
				);
				$result_post[$i]['comment_count'] = $this->news_model->
						get_comment_count( $result_post[$i]['id'] );
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
		$this->news_type = str_replace( '/', '', $this->uri->slash_segment( 2, 'leading' ) );
		$this->value     = str_replace( '/', '', $this->uri->slash_segment( 3, 'leading' ) );

		$result = $this->get_all_news ();

		if (self::cannot_find_page ( $result )) {
			return show_404 ();
		}

		$this->per_page = $this->get_limit();

		// SEARCH BY BLOG / TAGS
		if (! $this->news_type || $this->news_type == "blog" || $this->news_type == "tag") {
			$data ['char_limit'] = 450;
		}
		// SEARCH BY SINGLE POST
		elseif ( $this->news_type == "post") {
			$data ['char_limit'] = 800;
		}
		// SEARCH BY TITLE
		elseif ( $this->news_type == "title") {
			if (! is_null ( $result )) {
				$data ['comment_result']  = $this->get_comments (
						$result[0]['id'], 0 );
				$data ['comment_display'] = $this->load->view (
						TPL_PAGE_TEMPLATES.'news_comment_list', $data, true );
				$data ['comments'] 	      = $this->load->view (
						TPL_PAGE_TEMPLATES.'news_comments', $data, true );
			}
			$data ['view'] = "title";
			$data ['comment_form'] = $this->load->view (TPL_PAGE_FORMS.'comment_form',
					 '', true );
		}

		if ( $this->news_type != 'title' )
			$data ['pagination'] = $this->get_pagination ( $this->news_type );

		$data ['view']         = $this->news_type;
		$data ['news_result']  = $result;
		$data ['search_value'] = str_replace ( '-', ' ', $this->value );
		$data ['breadcrumbs']  = $common->get_breadcrumbs ( $page );
		$data ['tag_list']     = $this->news_model->get_news_tags ();
		$data ['news_list']    = $this->load->view (
				TPL_PAGE_TEMPLATES.'news_list', $data, true );

		$this->load->view ( 'pages/' . $page, $data );
	}
}