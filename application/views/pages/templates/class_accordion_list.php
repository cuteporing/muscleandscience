<dl class="accordion accordion-gym-fitness" data-accordion>
	<?php if(isset($class_result)): ?>
		<?php foreach ($class_result as $class): ?>
			<?php
				$newTitle = strtolower(str_replace(" ", "-", $class['title']));
				$accordion_id = "accordion-".$newTitle;
				$about_id     = $newTitle."-about";
				$trainer_id   = $newTitle."-trainers";
			?>
			<dd id="<?=$accordion_id?>">
				<a href="#<?=$newTitle?>"><h3><?=$class['title']?></h3><h5><?=$class['subtitle']?></h5></a>
				<div id="<?=$newTitle?>" class="content">
					<!--CONTENT -->
					<div class="training-classes wide ui-accordion-content clearfix">
						<!--BUTTONS -->
						<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
							<li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active">
								<a href="#<?=$about_id?>"><?=$this->lang->line('LBL_00022')?></a>
							</li>
							<li class="ui-state-default ui-corner-top">
								<a href="#<?=$trainer_id?>"><?=$this->lang->line('LBL_00023')?></a>
							</li>
							<li class="ui-state-default ui-corner-top">
								<a href="#Timetable"><?=$this->lang->line('LBL_00024')?></a>
							</li>
						</ul>
					</div>
				</div>
			</dd>
		<?php endforeach ?>
	<?php endif ?>
</dl>