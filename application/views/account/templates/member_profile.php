
	<div class="col-md-3 col-sm-3 col-xs-12 profile_left">

		<div class="profile_img">

			<!-- end of image cropping -->
			<div id="crop-avatar">
				<!-- Current avatar -->
				<div class="avatar-view" title="Change the avatar">
					<img src="<?=base_url().IMG_GALLERY.$result['member_profile']['img']?>" alt="Avatar">
				</div>

				<!-- Cropping modal -->

				<!-- /.modal -->

				<!-- Loading state -->
				<div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
			</div>
			<!-- end of image cropping -->

		</div>
		<h3><?=ucwords($result['member_profile']['firstname'].' '.$result['member_profile']['lastname'])?></h3>

		<ul class="list-unstyled user_data">
			<?php if( isset($result['member_profile']['address']) && !empty($result['member_profile']['address'])):?>
				<li><i class="fa fa-map-marker user-profile-icon"></i> <?=$result['member_profile']['address']?></li>
			<?php endif; ?>
			<?php if( isset($result['member_profile']['occupation']) && !empty($result['member_profile']['occupation'])):?>
				<li><i class="fa fa-briefcase user-profile-icon"></i> <?=$result['member_profile']['occupation']?></li>
			<?php endif; ?>
			<?php if( isset($result['member_profile']['email']) && !empty($result['member_profile']['email'])):?>
				<li class="m-top-xs"><i class="fa fa-external-link user-profile-icon"></i>
					<?= anchor ($result['member_profile']['email'], $result['member_profile']['email'], array ('title' => 'Send Email') ) ?>
				</li>
			<?php endif; ?>
		</ul>

		<a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit
			Profile</a> <br />

		<!-- start skills -->
		<h4>Skills</h4>
		<ul class="list-unstyled user_data">
			<li>
				<p>Web Applications</p>
				<div class="progress progress_sm">
					<div class="progress-bar bg-green" role="progressbar"
						data-transitiongoal="50"></div>
				</div>
			</li>
			<li>
				<p>Website Design</p>
				<div class="progress progress_sm">
					<div class="progress-bar bg-green" role="progressbar"
						data-transitiongoal="70"></div>
				</div>
			</li>
			<li>
				<p>Automation & Testing</p>
				<div class="progress progress_sm">
					<div class="progress-bar bg-green" role="progressbar"
						data-transitiongoal="30"></div>
				</div>
			</li>
			<li>
				<p>UI / UX</p>
				<div class="progress progress_sm">
					<div class="progress-bar bg-green" role="progressbar"
						data-transitiongoal="50"></div>
				</div>
			</li>
		</ul>
		<!-- end of skills -->

	</div>
	<div class="col-md-9 col-sm-9 col-xs-12">

		<div class="" role="tabpanel" data-example-id="togglable-tabs">
			<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
				<li role="presentation" class="active">
					<a href="#tab_content1"id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
				</li>
				<li role="presentation" class="">
					<a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Membership history</a>
				</li>
				<li role="presentation" class="">
					<a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
				</li>
			</ul>
			<div id="myTabContent" class="tab-content">
				<div role="tabpanel" class="tab-pane fade active in"
					id="tab_content1" aria-labelledby="home-tab">



				</div>
				<div role="tabpanel" class="tab-pane fade" id="tab_content2"
					aria-labelledby="profile-tab">

					<!-- start user projects -->
					<?= $result['member_history']?>
					<!-- end user projects -->

				</div>
				<div role="tabpanel" class="tab-pane fade" id="tab_content3"
					aria-labelledby="profile-tab">
					<p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla
						single-origin coffee squid. Exercitation +1 labore velit, blog
						sartorial PBR leggings next level wes anderson artisan four loko
						farm-to-table craft beer twee. Qui photo booth letterpress,
						commodo enim craft beer mlkshk</p>
				</div>
			</div>
		</div>
	</div>
