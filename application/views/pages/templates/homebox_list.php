<ul class="margin-top item-list <?= $box_color ?>">
	<?php foreach ($list as $row): ?>
		<li class="<?=$icon ?>"
		<?php if(isset($row['description']) && !is_null($row['description'])): ?>
			data-tooltip title="<?=$row['description'] ?>"
		<?php endif; ?> >
			<span>
				<?=$row['package'] ?>
				<div class="value">&#8369; <?=$row['price']?></div>
			</span>
		</li>
	<?php endforeach; ?>
</ul>