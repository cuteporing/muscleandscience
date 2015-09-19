<div class="footer-box">
	<h3 class="box-header"><?=$this->lang->line('LBL_00011')?></h3>
	<ul class="list-items gray opening-hours">
		<?php if( isset( $result_operation ) ): ?>
			<?php foreach ( $result_operation as $row ): ?>
				<?php
					$tooltip = date ( 'h:i A', strtotime ( $row['opening'] ) ).' - ';
					$tooltip.= date ( 'h:i A', strtotime ( $row['closing'] ) );
				?>

				<li class="icon-clock-green">
					<span><?=$row['day'] ?></span>
					<div class="value" title="<?=$tooltip ?>" data-tooltip>
						<?=$row['opening'] ?> - <?=$row['closing'] ?>
					</div>
				</li>
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>
</div>