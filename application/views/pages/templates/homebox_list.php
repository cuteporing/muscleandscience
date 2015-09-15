<ul class="margin-top item-list <?= $box_color ?>">
	<?php foreach ($result as $row): ?>
		<li class="<?=$icon ?>"
		<?php if(isset($row['description']) && !is_null($row['description'])): ?>
			data-tooltip title="<?=$row['description'] ?>"
		<?php endif; ?> >
			<span>
				<?=$row['package'] ?>
				<?php if( !is_null($row['price']) ): ?>
					<div class="value">&#8369; <?=$row['price']?></div>
				<?php else: ?>
					<div class="value"><?=$row['description']?></div>
				<?php endif; ?>
			</span>
		</li>
	<?php endforeach; ?>
</ul>