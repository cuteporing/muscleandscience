<dl class="accordion accordion-gym-fitness" data-accordion>
	<?php if(isset($class_result)): ?>
	<?php $common = new common?>
		<?php foreach ($class_result as $class): ?>
			<?php
			$newTitle = strtolower ( str_replace ( " ", "-", $class ['title'] ) );
			$accordion_id = "accordion-" . $newTitle;
			$about_id = $newTitle . "-about";
			$trainer_id = $newTitle . "-trainers";
			?>
			<dd id="<?=$accordion_id?>">
				<a href="#<?=$newTitle?>"><h3><?=$class['title']?></h3>
				<h5><?=$class['subtitle']?></h5></a>
				<div id="<?=$newTitle?>" class="content">
					<!--CONTENT -->
					<div class="training-classes wide ui-accordion-content clearfix">
						<!--BUTTONS -->
						<ul
							class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
							<li
								class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active">
								<a href="#<?=$about_id?>"><?=$this->lang->line('LBL_00022')?></a>
							</li>
							<li class="ui-state-default ui-corner-top"><a
								href="#<?=$trainer_id?>"><?=$this->lang->line('LBL_00023')?></a></li>
							<li class="ui-state-default ui-corner-top"><a href="#Timetable"><?=$this->lang->line('LBL_00024')?></a>
							</li>
						</ul>
						<!-- end BUTTONS -->
						<!-- ABOUT PANEL -->
						<div id="<?=$about_id?>" class="ui-tabs-panel">
							<?php if(!is_null($class['img'])): ?>
								<img class="about-img" alt="<?=$class['title'] ?>" src="<?=base_url().$class['img'] ?>">
							<?php endif; ?>

							<div class="column-container column-margin-top clearfix">
								<div class="column-left">
									<?= common::box_header($class['title'])?>
									<p><?=$class['about'] ?></p>

									<?php if(isset($class['trainer'])): ?>
										<?= common::box_header('Trainers')?>
										<ul class="list top-marker trainers">
										<!-- TRAINER'S LIST -->
											<?php foreach ($class['trainer'] as $trainer): ?>
											<li class="icon-small-arrow right-white">
												<?=$trainer['firstname'].' '.$trainer['lastname']?>
												<?php if(! is_null($trainer['experience'])): ?>
													<span class="time-desc"><?=$trainer['experience'] ?> years experience</span>
												<?php endif; ?>
											</li>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>
								</div>
								<!-- end COLUMN LEFT -->
								<div class="column-right">
									<?= $common->get_list('Features', $class['features'])?>
								</div>
								<!-- end COLUMN RIGHT -->
							</div>
						</div>
						<!-- end ABOUT PANEL -->

						<!-- TRAINER PANEL -->
						<div id="<?=$trainer_id?>" class="ui-tabs-panel ui-tabs-hide">
							<?php if(isset($class['trainer'])): ?>
								<?php foreach ($class['trainer'] as $trainer): ?>
									<!-- TRAINER'S IMG -->
									<?php if(!is_null($trainer['img'])): ?>
										<img class="about-img" alt="<?=$trainer['firstname'] ?>" src="<?=base_url().$trainer['img'] ?>">
									<?php endif; ?>
									<h2><?=$trainer['name'] ?></h2>
									<!-- TRAINER'S QUOTE -->
									<?php if(!is_null($trainer['quote'])): ?>
										<h4 class='sentence'><?=$trainer['quote'] ?></h4>
									<?php endif; ?>
									<!-- TRAINER'S ABOUT INFO -->
									<?php if(!is_null($trainer['about'])): ?>
										<?= common::box_header('About')?>
										<p><?= $trainer['about'] ?></p>
									<?php endif; ?>

									<div class="column-container clearfix">
										<div class="column-left">
											<?= $common->get_list('Skills', $trainer['skills'])?>
										</div>
										<div class="column-right">
											<?= $common->get_list('Achievements', $trainer['achievement'])?>
										</div>
									</div>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
						<!-- end TRAINER PANEL -->
					</div>
				</div>
			</dd>
		<?php endforeach ?>
	<?php endif ?>
</dl>