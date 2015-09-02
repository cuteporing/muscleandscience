<?php if(isset($list) && !is_null($list)): ?>
	<?= common::box_header($title)?>
	<ul class="list">
		<?php foreach ($list as $data): ?>
			<li class="icon-small-arrow right-white">
				<?=$data?>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>