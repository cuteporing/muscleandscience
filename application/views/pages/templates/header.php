<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="<?=META_DESCRIPTION ?>" />
		<meta name="keywords" content="<?=META_KEYWORDS ?>">
		<meta name="author" content="<?=META_AUTHOR ?>">
		<title>Muscle and Science - <?=ucfirst(str_replace( '-', ' ', $title )) ?></title>
		<link rel="stylesheet" href="<?=base_url()?>assets/css/normalize.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/foundation.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/topbar.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/breadcrumbs.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/homebox.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/boxpanel.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/button.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/texteditor.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/page.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/list.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/tabs.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/news.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/pagination.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/accordion-small.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/footer.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/dialogbox.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/table.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/modal.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/forms.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/sprites.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/custom.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/responsive.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/animate.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/slick.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/foundation-icons.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/tinycarousel.css" />
		<link rel="shortcut icon" href="<?=base_url()?>assets/img/icon.png" />
		<script src="<?=base_url()?>assets/js/vendor/modernizr.js"></script>
		<script src="<?=base_url()?>assets/js/vendor/jquery.js"></script>
		<script src="<?=base_url()?>assets/js/foundation.min.js"></script>
		<script src="<?=base_url()?>assets/js/jquery.tinycarousel.js"></script>
		<script src="<?=base_url()?>assets/js/carousel.js"></script>
		<script src="<?=base_url()?>assets/js/slick.min.js"></script>
		<script src="<?=base_url()?>assets/js/all.js"></script>

		<?php if( isset( $header_scripts ) && !empty( $header_scripts ) ): ?>
			<?php foreach ( $header_scripts as $src ):?>
				<script src="<?=base_url().PATH_JS.$src?>"></script>
			<?php endforeach; ?>
		<?php endif; ?>
	</head>
	<body>