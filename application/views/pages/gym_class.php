<div class="content">
	<div class="row">
		<div class="page-layout">
			<div class="page-header clearfix">
				<div class="page-header-left">
					<h1><?=$this->lang->line('LBL_00002')?></h1>
					<h4><?=$this->lang->line('LBL_00020')?></h4>
				</div>
			</div>
			<?php if(isset($breadcrumbs)): ?><?=$breadcrumbs ?><?php endif; ?>
			<div class="page-left page-margin-top">
				<?php if(isset($class_list)): ?><?=$class_list ?><?php endif; ?>
			</div>
			<div class="page-right page-margin-top">
				<?php if(isset($homebox)): ?><?=$homebox ?><?php endif; ?>
			</div>
		</div>
	</div>
</div>