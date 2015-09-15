<!-- page content -->
<div class="right_col" role="main">

	<br />
	<div class="">

		<?php if( isset( $top_tiles) ): ?>
		<?= $top_tiles?>
		<?php endif; ?>

		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Top 5 <small>Gym Members</small></h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle"
								data-toggle="dropdown" role="button" aria-expanded="false"><i
									class="fa fa-wrench"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Settings 1</a></li>
									<li><a href="#">Settings 2</a></li>
								</ul></li>
							<li><a class="close-link"><i class="fa fa-close"></i></a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<?php if( isset( $gym_toplist ) && !is_null( $gym_toplist ) ): ?>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<?php foreach ( $gym_toplist[0] as $row =>$value): ?>
										<th><?=ucfirst($row)?></th>
									<?php endforeach; ?>
								</tr>
							</thead>
							<tbody>
								<?php $count = 0; ?>
								<?php foreach ( $gym_toplist as $row): ?>
								<?php $count++; ?>
								<tr>
									<th scope="row"><?=$count ?></th>
									<?php foreach ($row as $key => $value):?>
										<td><?=$value?></td>
									<?php endforeach; ?>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Top 5 <small>Personal Training Members</small></h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle"
								data-toggle="dropdown" role="button" aria-expanded="false"><i
									class="fa fa-wrench"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Settings 1</a></li>
									<li><a href="#">Settings 2</a></li>
								</ul></li>
							<li><a class="close-link"><i class="fa fa-close"></i></a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<?php if( isset( $pt_toplist ) && !is_null( $pt_toplist ) ): ?>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<?php foreach ( $pt_toplist[0] as $row =>$value): ?>
										<th><?=ucfirst($row)?></th>
									<?php endforeach; ?>
								</tr>
							</thead>
							<tbody>
								<?php $count = 0; ?>
								<?php foreach ( $pt_toplist as $row): ?>
								<?php $count++; ?>
								<tr>
									<th scope="row"><?=$count ?></th>
									<?php foreach ($row as $key => $value):?>
										<td><?=$value?></td>
									<?php endforeach; ?>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>




