<li class="home-box <?=$box_color ?>">
	<!-- HOMEBOX TITLE -->
	<?php if ( isset( $contents['title'] ) && $contents['title'] != "" ): ?>
		<h2><a href="#"><?=$contents['title'] ?></a></h2>
	<?php endif; ?>

	<!-- HOMEBOX SUBTITLE -->
	<?php if ( isset( $contents['subtitle'] ) && $contents['subtitle'] != "" ): ?>
		<h3><?=$contents['subtitle'] ?></h3>
	<?php endif; ?>

	<!-- HOMEBOX CONTENT -->
	<?php if ( isset( $display ) ): ?>
		<!-- NEWS -->
		<?php if( isset( $contents['type'] ) && $contents['type'] == 'news' ): ?>
			<div class="news clearfix">
				<?php if( isset( $contents['banner_icon'] ) ): ?>
					<span class="banner-icon <?=$contents['banner_icon'] ?>">&nbsp;</span>
				<?php endif; ?>
				<?php if ( $display == "" ): ?>
					<div class="text">no description available</div>
				<?php else: ?>
					<div class="text">
					<?php if ( isset( $contents['display_limit'] ) ): ?>
							<?=character_limiter( $display, $contents['display_limit'] )?>
						<?php else: ?>
							<?=$display ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php else: ?>
			<?=$display ?>
		<?php endif; ?>
	<?php endif; ?>
</li>