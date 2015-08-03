<div class="top-bar-container">
	<div class="row">
		<nav class="top-bar" data-topbar role="navigation">
			<ul class="title-area">
				<li class="name">
					<h1>
						<a href="<?=base_url()?>"><img
							data-interchange="[<?=base_url()?>assets/img/logo.png, (default)], [<?=base_url()?>assets/img/logo-small.jpg, (only screen and (max-width: 1280px))]"
							id="logo"></a>
					</h1>
				</li>
				<li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
			</ul>

			<section class="top-bar-section">
				<ul class="right">
					<li><a href="<?=base_url()?>" class="main-link"><?=$this->lang->line('LBL_00009')?></a></li>
					<li class="has-dropdown"><a href="<?=base_url()?>news/blog/"><?=$this->lang->line('LBL_00001')?></a>
						<ul class="dropdown">
							<li><a href="<?=base_url()?>news/blog/" class="main-link"><?=$this->lang->line('LBL_00003')?></a></li>
							<li><a href="<?=base_url()?>news/post/" class="main-link"><?=$this->lang->line('LBL_00014')?></a></li>
						</ul></li>
					<li class="has-dropdown"><a href="<?=base_url()?>gym_class/"><?=$this->lang->line('LBL_00002')?></a>
						<ul class="dropdown">
						<?php //get_class_topbar();?>
						</ul>
					</li>
					<li><a href="<?=base_url()?>gallery" class="main-link"><?=$this->lang->line('LBL_00008')?></a></li>
					<li><a href="contact.php" class="main-link"><?=$this->lang->line('LBL_00006')?></a></li>
				</ul>
			</section>
		</nav>
	</div>
</div>

