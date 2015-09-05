<?php
	if( isset( $result_info[0]['phone'] ) ){
		$phone =  json_decode ( $result_info[0]['phone'] );
	}else{
		$phone = null;
	}
?>
<div class="footer-box">
	<?= common::box_header( $this->lang->line('LBL_00007') )?>
	<ul class="footer-contact-info-container clearfix">
		<li class="footer-contact-info-row">
			<div class="clearfix footer-contact-info-left">
				<?= common::checkData( $result_info[0]['street_address_1'] ) ?>
			</div>
			<div class="footer-contact-info-right">
				<?= common::checkData( $phone [0] ) ?>
			</div>
			<div class="footer-contact-info-left">
				<?= common::checkData( $result_info[0]['street_address_2'] ) ?>
			</div>
			<div class="footer-contact-info-right">
				<?= common::checkData( $phone [1] ) ?>
			</div>
			<div class="footer-contact-info-left">
				<?= common::checkData( $result_info[0]['city'] ) ?>
			</div>
		</li>
		<li class="footer-contact-info-row">
			<div>
				<?= anchor ( $result_info[0]['email'], $result_info[0]['email'], array ('title' => 'Send Email') ) ?>
			</div>
		</li>
	</ul>
	<ul class="footer-social-icons">
		<?php if( isset( $result_social ) && !is_null( $result_social ) ): ?>
			<?php foreach ( $result_social as $row ): ?>
				<li>
					<a href="<?=$row['link'] ?>" class="social-icon <?=$row['icon'] ?>" title="<?=$row['social_network'] ?>" target="_blank" data-tooltip >&nbsp;</a>
				</li>
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>
</div>