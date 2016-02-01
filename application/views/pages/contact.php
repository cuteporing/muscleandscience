<div class="content">
	<div class="row">
		<div class="page-layout">
			<div class="page-header clearfix">
				<div class="page-header-left">
					<h1><?=$this->lang->line('LBL_00006')?></h1>
					<h4><?=$this->lang->line('LBL_00041')?></h4>
				</div>
			</div>
			<?php if(isset($breadcrumbs)): ?><?=$breadcrumbs ?><?php endif; ?>
			<div class="column-container full-width page-margin-top">
				<div class="column-left">
					<h3 class="box-header">Leave a message</h3>
					<h4 class="info-white page-margin-top">Want to say hello or ask a serious business question?</h4>
					<h4 class="info-green">Do not hesitate to send us a message</h4>

					<form class="contact-form" id="contact-form" >
						<div data-alert class="errorMsg"></div>
						<div class="hide"><input type="hidden" name="txtVal" value=""></div>
						<fieldset class="left">
							<div class="block"><input class="text-input hint" name="name" type="text" placeholder="Your name" value="" required /></div>
							<div class="block"><input class="text-input hint" name="email" type="email" value="" placeholder="Your email" required/></div>
							<div class="block"><input class="text-input hint" name="tel" type="tel" placeholder="Mobile (optional)" /></div>
						</fieldset>
					<fieldset class="right">
						<div class="block"><textarea name="message" placeholder="Message" class="hint" required></textarea></div>
						<div class="hide"><input type="text" name="txtValue" value=""></div>
						<input name="submit" type="submit" value="Send">
						<input name="action" type="hidden" value="contact-form">
					</fieldset>
					</form>
				</div>

				<div class="column-right">
					<h3 class="box-header">On The Map</h3>
					<div class="contact-details page-margin-top">
						<div class="contact-details-about">
							<span class="logo-left">MAS</span>
							<span class="logo-right">GYM</span>
							<p>
								<?= check_data( $company_info[0]['street_address_1'] ) ?>&nbsp;
								<?= check_data( $company_info[0]['street_address_2'] ) ?>,&nbsp;
								<?= check_data( $company_info[0]['city'] ) ?><br>
							</p>
							<ul class="contact-data">
								<li class="phone">+123 655 655</li>
								<li class="fax">+123 755 755</li>
								<li class="email"><a href="mailto:drvfitness@gmail.com">drvfitness@mail.com</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>