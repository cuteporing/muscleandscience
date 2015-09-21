<?php if( isset($result) && !is_null($result)):?>
<table id="dt_table" class="table table-striped responsive-utilities jambo_table bulk_action">
	<thead>
		<tr class="headings">
			<?php if( isset( $has_check ) && $has_check === true ): ?>
				<th><input id="check-all" type="checkbox" class="tableflat"></th>
			<?php endif; ?>
			<?php foreach ( $result[0] as $row =>$value): ?>
				<?php if( $row != 'id'):?>
					<th><?=ucfirst(str_replace('_', ' ', $row))?></th>
				<?php endif;?>
			<?php endforeach; ?>
			<?php if( isset( $has_action ) && $has_action === true ): ?>
				<th class=" no-link last">
					<span class="nobr"><?=$this->lang->line('LBL_00042')?></span>
				</th>
			<?php endif; ?>
		</tr>
	</thead>
	<tbody>
			<?php foreach ( $result as $row ): ?>
				<tr>
					<?php if( isset( $has_check ) && $has_check === true ):?>
					<td class="a-center "><input type="checkbox" name="table_records" class="tableflat"></td>
					<?php endif; ?>
					<?php foreach( $row as $key => $value ): ?>
						<?php if( $key != 'id'):?>
							<td><?=$value?></td>
						<?php else: ?>
							<?php $id = $value?>
						<?php endif;?>
					<?php endforeach; ?>
					<?php if( isset($has_action ) && $has_action === true ): ?>
						<td>
							<div class="btn-group  btn-group-sm">
								<a href="<?=base_url().$action_view.$id?>" class="btn btn-default" type="button" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-bars"></i></a>
								<button class="btn btn-danger" type="button" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash-o"></i></button>
							</div>
						</td>
					<?php endif;?>
				</tr>
			<?php endforeach; ?>
	</tbody>
</table>
<?php else:?>
<h1>No data found</h1>
<?php endif;?>