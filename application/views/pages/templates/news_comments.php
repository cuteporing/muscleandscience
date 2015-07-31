<?php if ( isset( $comment_result ) ): ?>
	<?php if ( count( $comment_result ) > 1 ): ?>
		<!-- COMMENTS COUNT -->
		<div class="comment-box">
			<div class="first-row">
				<span class="second-row small">
					<?=count( $comment_result ) ?>
					<?php if ( count( $comment_result ) > 1 && !is_null( $comment_result )): ?>
						<?=$this->lang->line ( 'LBL_00005' ) ?>
					<?php else: ?>
						<?=$this->lang->line ( 'LBL_00004' ) ?>
					<?php endif; ?>
				</span>
			</div>
		</div>
	<?php endif; ?>

		<!-- COMMENTS LIST -->
		<div id="comments-list">
			<ul class="fadeInUp  column-no-margin">
				<?php if ( isset( $comment_display ) ): ?>
					<?=$comment_display ?>
				<?php endif; ?>
			</ul>
		</div>

<?php endif; ?>