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
				<li class="toggle-topbar menu-icon"><a href="#"></a></li>
			</ul>

			<section class="top-bar-section">
				<ul class="right">
					<li <?php if( $page == strtolower( $this->lang->line('LBL_00009') ) ) { ?>class="active"<?php } ?>>
						<a href="<?=base_url()?>" class="main-link"><?=$this->lang->line('LBL_00009')?></a>
					</li>
					<li class="has-dropdown <?php if( $page == strtolower( $this->lang->line('LBL_00001') ) ) { ?>active<?php } ?>">
						<a href="<?=base_url()?>news/blog/"><?=$this->lang->line('LBL_00001')?></a>
						<ul class="dropdown">
							<li><a href="<?=base_url()?>news/blog/" class="main-link"><?=$this->lang->line('LBL_00003')?></a></li>
							<li><a href="<?=base_url()?>news/post/" class="main-link"><?=$this->lang->line('LBL_00014')?></a></li>
						</ul></li>
					<li class="has-dropdown <?php if( $page == strtolower( $this->lang->line('LBL_00002') ) ) { ?>active<?php } ?>">
						<a href="<?=base_url()?>gym-class/"><?=$this->lang->line('LBL_00002')?></a>
						<ul class="dropdown">
							<?php if( isset( $result ) && !is_null( $result ) ): ?>
								<?php foreach ($result as $row): ?>
									<li><a href="<?=base_url()?>gym-class/<?=$row['slug'] ?>" class="main-link"><?=$row['title'] ?></a></li>
								<?php endforeach; ?>
							<?php endif; ?>
						</ul>
					</li>
					<li <?php if( $page == strtolower( $this->lang->line('LBL_00008') ) ) { ?>class="active"<?php } ?> >
						<a href="<?=base_url()?>gallery" class="main-link"><?=$this->lang->line('LBL_00008')?></a>
					</li>
					<li <?php if( $page == strtolower( $this->lang->line('LBL_00006') ) ) { ?>class="active"<?php } ?> >
						<a href="<?=base_url()?>contact" class="main-link"><?=$this->lang->line('LBL_00006')?></a>
					</li>
					<?php if( !$this->user_model->authenticated() ): ?>
						<li <?php if( $page == strtolower( $this->lang->line('LBL_00026') ) ) { ?>class="active"<?php } ?> >
							<a href="<?=base_url()?>account/login" class="main-link" data-link-pointer ><?=$this->lang->line('LBL_00026')?></a>
						</li>
					<?php else: ?>
						<li>
							<a href="<?=base_url()?>account/dashboard" class="main-link" data-link-pointer >
								My page
							</a>
						</li>
					<?php endif; ?>
				</ul>
			</section>
		</nav>
	</div>
</div>

