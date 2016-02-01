<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

if (! function_exists ( 'check_data' )) {
	function check_data($data) {
		(isset($data) && !empty($data))?
			$data = $data
		:	$data = '';

		return $data;
	}
}

/* End of file data_helper.php */
/* Location: ./system/helpers/data_helper.php */