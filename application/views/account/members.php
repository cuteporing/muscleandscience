<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>&nbsp;</h3>
			</div>

			<div class="title_right">
				<div
					class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<div class="input-group">
						<input type="text" class="form-control"
							placeholder="Search for..."> <span class="input-group-btn">
							<button class="btn btn-default" type="button">Go!</button>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="row">

			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>
										<?php if( isset($page_title) ): ?><?=$page_title ?><?php endif; ?>
										 <small><?php if( isset($page_subtitle) ): ?><?=$page_subtitle ?><?php endif; ?></small>
						</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a href="#"><i class="fa fa-chevron-up"></i></a></li>
							<li class="dropdown"><a href="#" class="dropdown-toggle"
								data-toggle="dropdown" role="button" aria-expanded="false"><i
									class="fa fa-wrench"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?=base_url()?>account/members/unpaid"><?= $this->lang->line('LBL_00045')?></a></li>
									<li><a href="<?=base_url()?>account/members/gym"><?= $this->lang->line('LBL_00043')?></a></li>
									<li><a href="<?=base_url()?>account/members/pt"><?= $this->lang->line('LBL_00044')?></a></li>
								</ul></li>
							<li><a href="#"><i class="fa fa-close"></i></a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<?php if( isset($list) ): ?>
							<?=$list ?>
						<?php elseif( isset($profile) ):?>
							<?=$profile ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<br /> <br /> <br />
		</div>
	</div>
