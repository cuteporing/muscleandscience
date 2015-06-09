<div class="top-bar-container">
	<div class="row">
		<nav class="top-bar" data-topbar role="navigation">
			<ul class="title-area">
				<li class="name">
					<h1><a href="index.php"><img data-interchange="[<?=base_url()?>assets/img/logo.png, (default)], [<?=base_url()?>assets/img/logo-small.jpg, (only screen and (max-width: 640px))]" id="logo"></a></h1>
				</li>
				<li class="toggle-topbar menu-icon"><a href="#"></a></li>
			</ul>

		<section class="top-bar-section">
			<ul class="right">
				<li><a href="index.php" class="main-link"><?=$this->lang->line('lbl_home')?></a></li>
				<li class="has-dropdown">
					<a href="news.php"><?=$this->lang->line('lbl_news')?></a>
					<ul class="dropdown">
						<li><a href="<?=base_url()?>news/blog/" class="main-link"><?=$this->lang->line('lbl_blog')?></a></li>
						<li><a href="<?=base_url()?>news/post/" class="main-link"><?=$this->lang->line('lbl_single_post')?></a></li>
					</ul>
				</li>
				<li class="has-dropdown">
					<a href="classes.php"><?=$this->lang->line('lbl_classes')?></a>
					<ul class="dropdown">
						<?php //get_class_topbar();?>
					</ul>
				</li>
				<li><a href="gallery.php" class="main-link"><?=$this->lang->line('lbl_gallery')?></a></li>
				<li><a href="contact.php" class="main-link"><?=$this->lang->line('lbl_contact')?></a></li>
			</ul>
		</section>
		</nav>
	</div>
</div>