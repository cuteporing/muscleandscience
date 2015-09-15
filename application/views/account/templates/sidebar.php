<div class="col-md-3 left_col">
	<div class="left_col scroll-view">

		<div class="navbar nav_title" style="border: 0;">
			<a href="<?=base_url()?>" class="site_title" target="_blank"><span>Muscle and Science</span></a>
		</div>
		<div class="clearfix"></div>

		<!-- menu prile quick info -->
		<div class="profile">
			<div class="profile_pic">
				<img src="<?=base_url().IMG_GALLERY.$this->user_model->get_user_photo()?>" alt="..." class="img-circle profile_img">
			</div>
			<div class="profile_info">
				<span>Welcome,</span>
				<h2><?=$this->user_model->get_name()?></h2>
			</div>
			</div>
			<!-- /menu prile quick info -->

			<br />

			<!-- sidebar menu -->
			<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

			<div class="menu_section">
				<h3><?=$this->user_model->get_title()?></h3>
				<ul class="nav side-menu">
					<?php if( isset( $sidebar ) && !is_null( $sidebar ) ): ?>
					<?php foreach ( $sidebar as $row ): ?>
					<li>
						<a><i class="fa <?=$row['icon']?>"></i><?=$row['title']?><span class="fa fa-chevron-down"></span></a>
						<?php if( !is_null( $row['sub_nav'] ) ): ?>
						<ul class="nav child_menu" style="display: none">
							<?php foreach ( $row['sub_nav'] as $row_sub ): ?>
							<li><a href="<?=base_url().$row_sub['link']?>"><?=$row_sub['title']?></a></li>
							<?php endforeach; ?>
						</ul>
						<?php endif; ?>
					</li>
					<?php endforeach; ?>
					<?php endif; ?>
				</ul>
			</div>
		</div>
		<!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" href="<?=base_url()?>account/user-logout" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>