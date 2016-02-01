<div class="footer-box">
	<div id="recent_post">
		<div class="clearfix">
			<!-- RECENT POST HEADER -->
			<div class="header-left">
				<h3 class="box-header"><?=$this->lang->line('LBL_00039')?></h3>
			</div>
			<div class="header-right">
				<a class="prev scrolling-list-control-left icon-small-arrow left-white" href="#"></a>
				<a class="next scrolling-list-control-right icon-small-arrow right-white" href="#"></a>
			</div>
			<div class="scrolling-list-wrapper">
				<div class="viewport caroufredsel-wrapper" style="height: 240px;">
					<ul class="overview scrolling-list recent-post-small">
						<?php if ( isset( $result_recent_post ) ): ?>
							<?php foreach ( $result_recent_post as $row ): ?>
								<li class="icon-small-arrow right-white">
									<a href="<?=base_url() ?>news/title/<?=$row ['slug'] ?>">
										<span class="title"><?=character_limiter ( $row ['title'], 100 ) ?></span>
										<abbr title="<?=format_date( $row['post_date'], "D M d H:i:s Y" ) ?>" class="timeago">
											<?=calc_time($row['post_date']) ?>
										</abbr>
									</a>
								</li>
							<?php endforeach; ?>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
