<?php
	if( isset( $result[0]['phone'] ) ){
		$phone =  json_decode ( $result[0]['phone'] );
	}else{
		$phone = null;
	}
?>
<ul class="footer-contact-info-container clearfix">
	<li class="footer-contact-info-row">
		<div class="footer-contact-info-left">
			<?= common::checkData( $result[0]['street_address_1'] ) ?>
		</div>
		<div class="footer-contact-info-right">
			<?= common::checkData( $phone [0] ) ?>
		</div>
		<div class="footer-contact-info-left">
			<?= common::checkData( $result[0]['street_address_2'] ) ?>
		</div>
		<div class="footer-contact-info-right">
			<?= common::checkData( $phone [1] ) ?>
		</div>
		<div class="footer-contact-info-left">
			<?= common::checkData( $result[0]['city'] ) ?>
		</div>
	</li>
	<li class="footer-contact-info-row">
		<div>
			<?= anchor ( $result[0]['email'], $result[0]['email'], array ('title' => 'Send Email') ) ?>
		</div>
	</li>
</ul>