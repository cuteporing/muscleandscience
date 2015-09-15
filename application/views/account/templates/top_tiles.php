<?php if( isset( $top_tiles_data ) ): ?>
<div class="row top_tiles">
	<?php foreach ($top_tiles_data as $row):?>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon">
					<i class="<?=$row['icon']?>"></i>
				</div>
				<div class="count"><?=$row['count']?></div>
				<h3><?=$row['title']?></h3>
				<p><?=$row['subtitle']?></p>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<?php endif; ?>