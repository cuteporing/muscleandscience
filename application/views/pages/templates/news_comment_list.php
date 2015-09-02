<?php if ( is_null( $comment_result ) ): ?>
	<li class="comment clearfix"
		<div class="comment-details">
			<a href="#comment-form" class="icon-small-arrow right-white reply-button" onclick="scrollPage($(this));">
				<?=$this->lang->line ( 'LBL_00013' ) ?>
			</a>
		</div>
	</li>
<?php else: ?>
	<?php
	foreach ( $comment_result as $row ):
		$date = format::format_date ( $row['update_datetime'], 'd M Y, g.i a' );
	?>
		<li class="comment clearfix">
			<!-- USER AVATAR -->
			<div class="comment-author-avatar"
			style="background: url(<?=base_url().$row['photo_thumb'] ?>)
			no-repeat; background-size: cover;
			background-position: center center;"></div>

			<!-- COMMENT DETAILS -->
			<div class="comment-details">
				<div class="posted-by">
					<a href="#" class="author"><?=ucfirst($row['firstname']) ?> <?=ucfirst($row['lastname']) ?></a> on
					 <?=$date ?>
				</div>

				<p><?=$row['comment'] ?></p>
				<a href="#comment-form" class="icon-small-arrow right-white reply-button" onclick="scrollPage($(this));">
					<?=$this->lang->line ( 'LBL_00013' ) ?>
				</a>
			</div>
		</li>
	<?php endforeach; ?>
<?php endif; ?>

