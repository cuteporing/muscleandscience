<?php if( isset($tabs) && isset($contents)): ?>
	<div class="" role="tabpanel" data-example-id="togglable-tabs">
		<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
			<?php $count = 0; ?>
			<?php foreach ( $tabs as $row ):?>
				<?php $count++; ?>
				<li role="presentation" <?php if( $count == 1 ):?>class="active"<?php endif;?> >
					<a href="#tab_content<?=$count?>" id="tab-label<?=$count?>" role="tab" data-toggle="tab" aria-expanded="true">
						<?=ucfirst($row)?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
		<div id="myTabContent" class="tab-content">
			<?php $count = 0; ?>
			<?php foreach ( $contents as $row ):?>
				<?php $count++; ?>
				<div role="tabpanel" class="tab-pane fade <?php if( $count == 1 ): ?>active in<?php endif;?>" id="tab_content<?=$count?>" aria-labelledby="home-tab">
					<?=$row?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>