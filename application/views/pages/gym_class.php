<div class="content">
	<div class="row">
		<div class="page-layout">
			<div class="page-header clearfix">
				<div class="page-header-left">
					<h1><?=$this->lang->line('LBL_00019')?></h1>
					<h4><?=$this->lang->line('LBL_00020')?></h4>
				</div>
			</div>
			<?php if(isset($breadcrumbs)): ?><?=$breadcrumbs ?><?php endif ?>
			<div class="page-left">
				<?php if(isset($class_list)): ?><?=$class_list ?><?php endif ?>
			</div>
			<div class="page-right">
			</div>
		</div>
	</div>
</div>