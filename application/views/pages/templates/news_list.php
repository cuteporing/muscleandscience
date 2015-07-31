<ul class="blog clearfix animated fadeIn">
	<?php if ( !is_null( $news_result ) ): ?>
		<?php
		foreach ( $news_result as $row ):
			$day = format::format_date ( $row ['update_datetime'], 'd' );
			$month = format::format_date ( $row ['update_datetime'], 'M' );
		?>
			<li class="post">
				<div class="comment-box">
					<!-- POST DATE -->
					<div class="first-row">
						<?=$day ?>
						<div class="second-row">
							<?=$month ?>
						</div>
					</div>

					<!-- COMMENT COUNT -->
					<a href="#" class="comments-number" title="<?=$row ['comment_count'] ?> comment/s">
						<?=$row ['comment_count'] ?>
					</a>
				</div>
				<div class="post-content">
					<?php if( $row ['image'] != "" ): ?>
						<img class="post-image" src="<?=$row ['image'] ?>" alt="<?=$row ['title'] ?>" title="<?=$row ['title'] ?>">
					<?php endif; ?>

					<!-- POST TITLE -->
					<h2>
						<a href="<?=base_url() ?>news/title/<?=$row ['slug'] ?>" title="<?=$row ['title'] ?>">
							<?=$row ['title'] ?>
						</a>
					</h2>

					<!-- POST CONTENT -->
					<?php foreach ( $row['description'] as $description ): ?>
						<?php if( isset( $char_limit )): ?>
							<?=character_limiter ( $description, $char_limit ) ?>
						<?php else: ?>
							<?=$description ?>
						<?php endif; ?>
					<?php endforeach; ?>

					<!-- POST FOOTER -->
					<div class="post-footer">
						<ul class="categories">
							<li class="posted-by">
								<?=$this->lang->line ( 'LBL_00012' ) ?>
								<a href="#" class="author">
									<?=$row['author']['firstname']?> <?=$row['author']['lastname']?>
								</a>
							</li>

							<!-- POST TAG LIST -->
							<?php foreach ( $row['tags'] as $tag): ?>
							<li>
								<a href="<?=base_url()?>news/tag/<?=str_replace ( " ", "-", $tag )?>" title="<?=$tag ?>" data-tooltip>
									<?=$tag ?>
								</a>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<?php if( isset( $char_limit )): ?>
						<a href="<?=base_url() ?>news/title/<?=$row ['slug'] ?>" class="more icon-small-arrow margin-right-white" title="<?=$row['title'] ?>">
							<?=$this->lang->line( 'LBL_00038' ) ?>
						</a>
					<?php endif; ?>
				</div>
			</li>
		<?php endforeach; ?>
	<?php endif; ?>
</ul>