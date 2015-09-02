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

class Gallery_model extends Common_model {

	public function __construct()
	{
	}

	public function get_album($params) {
		$this->get_where ( $params );
		$this->get_orderby ( $params );
		$this->get_select ( $params, TBL_GALLERY );

		// limit | offset
		if (isset ( $params ['limiter'] ) && count ( $params ['limiter'] ) > 0) {
			if (! isset ( $params ['limiter'] ['offset'] )) {
				$params ['limiter'] ['offset'] = 0;
			}

			$query = $this->db->get (
					TBL_GALLERY,
					$params ['limiter'] ['limit'],
					$params ['limiter'] ['offset']
			);
		} else {
			$this->db->from ( TBL_GALLERY );
			$query = $this->db->get ();
		}

		if ($query->num_rows () > 0) {
			return $query->result_array ();
		} else {
			return null;
		}
	}

}