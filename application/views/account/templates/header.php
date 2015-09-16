<!DOCTYPE html>
<html lang="en">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Muscle and Science - <?=$title ?></title>
		<!-- Bootstrap core CSS -->
		<link href="<?=base_url()?>assets/css/gentelella/bootstrap.min.css" rel="stylesheet">
		<link href="<?=base_url()?>assets/css/fonts/gentelella/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?=base_url()?>assets/css/gentelella/animate.min.css" rel="stylesheet">
		<!-- Custom styling plus plugins -->
		<link href="<?=base_url()?>assets/css/gentelella/custom.css" rel="stylesheet">
		<link href="<?=base_url()?>assets/css/gentelella/icheck/flat/green.css" rel="stylesheet">
		<link href="<?=base_url()?>assets/img/icon.png" rel="shortcut icon" />

		<?php if( isset( $header_styles ) && !empty( $header_styles ) ): ?>
			<?php foreach ( $header_styles as $src ):?>
				<link href=""<?=base_url().PATH_CSS.$src?>" rel="stylesheet" />
			<?php endforeach; ?>
		<?php endif; ?>

		<script src="<?=base_url()?>assets/js/gentelella/jquery.min.js"></script>

		<!--[if lt IE 9]>
		<script src="../assets/js/ie8-responsive-file-warning.js"></script>
		<![endif]-->
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
<?php if( $title == "Login" ): ?>
	<body style="background:#F7F7F7;">
<?php else: ?>
	<body class="nav-md">
		<div class="container body">
				<div class="main_container">
<?php endif; ?>