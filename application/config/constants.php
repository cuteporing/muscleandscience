<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

	/*
 * |--------------------------------------------------------------------------
 * | File and Directory Modes
 * |--------------------------------------------------------------------------
 * |
 * | These prefs are used when checking and setting modes when working
 * | with the file system. The defaults are fine on servers with proper
 * | security, but you may wish (or even need) to change the values in
 * | certain environments (Apache running a separate process for each
 * | user, PHP under CGI with Apache suEXEC, etc.). Octal values should
 * | always be used to set the mode correctly.
 * |
 */
define ( 'FILE_READ_MODE', 0644 );
define ( 'FILE_WRITE_MODE', 0666 );
define ( 'DIR_READ_MODE', 0755 );
define ( 'DIR_WRITE_MODE', 0777 );

/*
 * |--------------------------------------------------------------------------
 * | File Stream Modes
 * |--------------------------------------------------------------------------
 * |
 * | These modes are used when working with fopen()/popen()
 * |
 */

define ( 'FOPEN_READ',							'rb' );
define ( 'FOPEN_READ_WRITE',					'r+b' );
define ( 'FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb' ); // truncates existing file data, use with care
define ( 'FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b' ); // truncates existing file data, use with care
define ( 'FOPEN_WRITE_CREATE',					'ab' );
define ( 'FOPEN_READ_WRITE_CREATE',				'a+b' );
define ( 'FOPEN_WRITE_CREATE_STRICT',			'xb' );
define ( 'FOPEN_READ_WRITE_CREATE_STRICT',		'x+b' );

/*
 * |--------------------------------------------------------------------------
 * | Config Modes
 * |--------------------------------------------------------------------------
 * |
 * | These modes are used as added configuration
 * |
 */

define ( 'CONFIG_TIMEZONE', 'asia/manila' );

/*
 * |--------------------------------------------------------------------------
 * | Copyright Modes
 * |--------------------------------------------------------------------------
 * |
 * | These modes are used to store copyright values
 * |
 */

define ( 'COPYRIGHT', '© 2014-2015 - Muscle and Science.');
define ( 'AUTHOR_DISPLAY', 'DigiArtKBV.com');
define ( 'AUTHOR_EMAIL', 'www.gmail.com');

/*
 * |--------------------------------------------------------------------------
 * | Meta Modes
 * |--------------------------------------------------------------------------
 * |
 * | These modes are used when meta name
 * |
 */

define ( 'META_DESCRIPTION',	'Gym/Fitness Center' );
define ( 'META_KEYWORDS',		'gym, fitness, health, center, muscle, science' );
define ( 'META_AUTHOR',			'KBVCodes, 2014' );

/*
 * |--------------------------------------------------------------------------
 * | Image Modes
 * |--------------------------------------------------------------------------
 * |
 * | These modes are used for image config
 * |
 */

define ( 'IMG_BANNER', 					'upload/banner/' );
define ( 'IMG_GALLERY',					'upload/gallery/' );
define ( 'NO_IMAGE_FILE_PATH', 	'assets/img/' );
define ( 'NO_IMAGE_FILE_EXT', 	'.png' );
define ( 'NO_IMAGE_RAW_NAME', 	'noPhoto-icon' );
define ( 'IMG_ALLOWED_TYPE', 		'gif|jpg|png' );
define ( 'IMG_MAX_SIZE', 				350 );
define ( 'IMG_MAX_WIDTH',				1024 );
define ( 'IMG_MAX_HEIGHT', 			768 );


/*
 * |--------------------------------------------------------------------------
 * | Template Modes
 * |--------------------------------------------------------------------------
 * |
 * | These modes are used to store template path
 * |
 */
define ( 'TPL_PAGE_FORMS',					'pages/forms/' );
define ( 'TPL_PAGE_TEMPLATES',			'pages/templates/' );
define ( 'TPL_ACCOUNT',							'account/');
define ( 'TPL_ACCOUNT_FORMS',				'account/forms/' );
define ( 'TPL_ACCOUNT_TEMPLATES',		'account/templates/' );

/*
 * |--------------------------------------------------------------------------
 * | Path Modes
 * |--------------------------------------------------------------------------
 * |
 * | These modes are used to store path
 * |
 */

define ( 'PATH_ACCOUNT',		'account/' );
define ( 'PATH_PUBLIC',			'public/' );
define ( 'PATH_UTILS',			'utils/' );
define ( 'PATH_JS',					'assets/js/' );
define ( 'PATH_CSS',				'assets/css/' );


/* End of file constants.php */
/* Location: ./application/config/constants.php */