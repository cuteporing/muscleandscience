<?php $page = str_replace( '/', '', $this->uri->slash_segment( 1, 'leading' ) );?>
<ul class="breadcrumbs clearfix bread-crumb">
	<li class="no-arrow"><a href="<?=base_url()?>home/"><?=$this->lang->line('LBL_00009') ?></a></li>
	<li class="current"><a href="<?=base_url().$page?>/"><?=str_replace('-', ' ', $page) ?></a></li>
</ul>
