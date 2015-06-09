<div class="content">
	<div class="row">
		<div class="page-layout">
			<div class="page-header clearfix">
				<div class="page-header-left">
					<h1>WHAT'S NEW</h1>
					<h4>we delivers enough to blog about</h4>
				</div>
			</div>
			<div class="page-left">
				<?=$news_list ?>
				<?=$pagination?>
			</div>
			<div class="page-right">
				<h3 class="box-header margin">Categories</h3>
				<div class="sidebar-box first">
					<ul class="categories">
					<?php foreach ($tag_list as $tags): ?>
						<li><?=anchor(base_url().'news/tag/'.str_replace(" ", "-", $tags['tag_name']), $tags['tag_name'], array('title'=>$tags['tag_name'])) ?></li>
					<?php endforeach ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>