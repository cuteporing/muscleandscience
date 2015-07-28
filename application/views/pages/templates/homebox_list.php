<ul class="margin-top item-list <?= $box_color ?>">
	<?php foreach ($list as $row): ?>
		<li class="<?=$icon ?>"
		<?php if(isset($row['note']) && !is_null($row['note'])): ?>
			data-tooltip title="<?=$row['note'] ?>"
		<?php endif; ?> >
			<span>
				<?=$row['title'] ?>
				<div class="value">&#8369; <?=$row['price']?></div>
			</span>
		</li>
	<?php endforeach; ?>
</ul>