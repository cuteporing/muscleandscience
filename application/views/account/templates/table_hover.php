<?php if( isset( $result ) && !is_null( $result ) ): ?>
<table class="table table-hover">
	<thead>
		<tr>
			<?php if( isset( $has_num ) && $has_num = true ):?><th>#</th><?php endif; ?>
			<?php foreach ( $result[0] as $row =>$value): ?>
				<th><?=ucfirst($row)?></th>
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
				<td><?=$value?></td>
			<?php endforeach; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<?php endif; ?>