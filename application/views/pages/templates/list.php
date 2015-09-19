<?php if(isset($list) && !is_null($list)): ?>
	<h3 class="box-header"><?=$title?></h3>
	<ul class="list">
		<?php foreach ($list as $data): ?>
			<li class="icon-small-arrow right-white">
				<?=$data?>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>