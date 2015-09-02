<div class="content">

	<div class="slideshow-wrapper">
	<?php foreach ($banner as $banner_item): ?>
		<div><?=img(array( 'alt' => $banner_item['title'], 'src' => $banner_item['img'] ), TRUE) ?></div>
	<?php endforeach ?>
	</div>

	<div class="row homebox-top">
		<div class="top-hint">Give us a call: +123 356 123 124</div>
		<ul class="home-box-container clearfix">
			<li id="upcoming" class="home-box white">
				<div class="clearfix">
					<div class="header-left">
						<h2><?=$this->lang->line('LBL_00018')?></h2>
						<h3><?=$this->lang->line('LBL_00015')?></h3>
					</div>
					<div class="header-right">
						<a href="" class="prev icon-small-arrow left-black"></a> <a
							href="" class="next icon-small-arrow right-black"></a>
					</div>
					<div class="upcoming-classes-wrapper">
						<div class="viewport caroufredsel-wrapper">
							<ul class="overview items-list upcoming-classes clearfix">
								<li class="icon-clock-black"><a href="classes.php?q=gym-fitness"
									title="Gym Fitness">Gym Fitness</a>
									<div class="value">17.30 - 20.30</div></li>
								<li class="icon-clock-black"><a href="classes.php?q=taek-wondo"
									title="Taek Wondo">Taek Wondo</a>
									<div class="value">21.00 - 22.00</div></li>
								<li class="icon-clock-black"><a href="classes.php?q=boxing"
									title="Boxing">Boxing</a>
									<div class="value">11.30 - 12.30</div></li>
								<li class="icon-clock-black"><a
									href="classes.php?q=cardio-fitness" title="Cardio Fitness">Cardio
										Fitness</a>
									<div class="value">14.00 - 15.00</div></li>
								<li class="icon-clock-black"><a href="classes.php?q=zumba"
									title="Zumba">Zumba</a>
									<div class="value">17.30 - 20.30</div></li>
							</ul>
						</div>
					</div>
				</div>
			</li>
			<?=$homebox?>
		</ul>

		<div class="page-layout clearfix">
			<div id="latest-news" class="page-left clearfix">
				<div class="preloader" style="position: absolute; margin-top: 6rem;"></div>
				<?=$latest_news?>
			</div>
			<div class="page-right clearfix">
				<?=$gym_class?>
				<div class="sidebar-box">
					<ul class="home-box-container login-box">
						<?=$login?>
					</ul>
				</div>
			</div>
		</div>
	</div>

</div>
