<div class="slideshow-wrapper">
	<?php foreach ($result as $row): ?>
		<div>
			<?=img(array( 'alt' => $row['title'], 'src' => $row['img'] ), TRUE) ?>
			<div class="slide-caption animated fadeIn">
				<h1 class="animated fadeInUp"><?=$row['title']?></h1>
				<h3 class="animated fadeInUp"><?=$row['subtitle']?></h3>
			</div>
		</div>
	<?php endforeach ?>
</div>