<?php if( isset( $result ) && !is_null( $result ) ): ?>
<table class="data table table-striped no-margin">
	<thead>
		<tr>
			<?php if( isset( $has_num ) && $has_num = true ):?><th>#</th><?php endif; ?>
			<?php foreach ( $result[0] as $row =>$value): ?>
				<?php if( $row != 'id'):?>
					<th><?=ucfirst(str_replace('_',' ',$row))?></th>
				<?php endif; ?>
			<?php endforeach; ?>
		</tr>
	</thead>
	<tbody>
		<?php $row_num = 0; ?>
		<?php foreach ( $result as $row ): ?>
		<?php $row_num++; ?>
		<tr>
			<?php if( isset( $has_num ) && $has_num = true ):?>
			<th scope="row"><?=$row_num ?></th>
			<?php endif; ?>
			<?php foreach ($row as $key => $value):?>
				<?php if( $key != 'id'):?>
					<td><?=$value?></td>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<?php else: ?>
<h4>No data</h4>
<?php endif; ?>