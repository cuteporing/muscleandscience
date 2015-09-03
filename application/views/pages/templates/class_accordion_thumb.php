<dl class="accordion accordion-gym-fitness" data-accordion>
	<?php if ( isset( $result ) ): ?>
		<?php foreach ( $result as $row ): ?>
			<dd class="accordion-navigation">
				<!-- TITLE -->
				<a href="#<?=$row['slug'] ?>">
					<h3><?=$row['title'] ?></h3>
					<h5><?=$row['subtitle'] ?></h5>
				</a>
				<!-- CONTENTS -->
				<div id="<?=$row['slug'] ?>" class="content item-content clearfix">
					<a href="#" title="<?=$row['title'] ?>" class="thumb_img">
						<img alt="<?=$row['img_thumb'] ?>" src="<?=$row['img_thumb'] ?>">
					</a>
					<div class="text"><?=character_limiter ( $row['about'], 150 ) ?></div>
					<a href="gym_class/<?=$row['slug'] ?>" class="more icon-small-arrow margin-right-white">
						<?=$this->lang->line('LBL_00028')?>
					</a>
				</div>
			</dd>
		<?php endforeach; ?>
	<?php endif; ?>
</dl>
