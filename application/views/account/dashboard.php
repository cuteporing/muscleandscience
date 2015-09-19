<!-- page content -->
<div class="right_col" role="main">
	<br />
	<div class="">

		<?php if( isset( $top_tiles) ): ?>
		<?= $top_tiles?>
		<?php endif; ?>

		<div class="row">
			<?php if( isset($widgets) && !empty($widgets)): ?>
			<?php foreach ($widgets as $row):?>
				<?=$row ?>
			<?php endforeach; ?>
			<?php endif;?>
		</div>
	</div>




