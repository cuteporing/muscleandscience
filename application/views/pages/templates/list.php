<?php if(isset($result) && !is_null($result)): ?>
	<h3 class="box-header"><?=$title?></h3>
	<ul class="list">
		<?php foreach ($result as $data): ?>
			<li class="icon-small-arrow right-white">
				<?=$data?>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>