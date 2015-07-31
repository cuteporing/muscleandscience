<div class="content">
	<div class="row">
		<div class="page-layout">
			<div class="page-header clearfix">
				<div class="page-header-left">
					<h1><?=$this->lang->line('LBL_00017')?></h1>
					<h4><?=$this->lang->line('LBL_00016')?></h4>
				</div>
			</div>
			<?php if(isset($breadcrumbs)): ?><?=$breadcrumbs ?><?php endif; ?>
			<div class="page-left">
				<?php if(isset($news_list)): ?><?=$news_list ?><?php endif; ?>
				<?php if(isset($comments)): ?><?=$comments ?><?php endif; ?>
				<?php if(isset($pagination)): ?><?=$pagination?><?php endif; ?>
				<?php if(isset($comment_form)): ?><?=$comment_form?><?php endif; ?>
			</div>
			<div class="page-right">
				<h3 class="box-header margin"><?=$this->lang->line('LBL_00021')?></h3>
				<div class="sidebar-box first">
					<ul class="categories">
						<?php if(isset($tag_list)): ?>
							<?php foreach ($tag_list as $tags): ?>
								<li
							<?php if($view == "tag" && $search_value == $tags['tag_name']): ?>
							class="selected" <?php endif; ?>>
									<?=anchor(base_url().'news/tag/'.str_replace(" ", "-", $tags['tag_name']), $tags['tag_name'], array('data-tooltip'=>'','title'=>$tags['tag_name']))?>
								</li>
							<?php endforeach; ?>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>