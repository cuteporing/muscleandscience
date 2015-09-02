<h2><?=$this->lang->line('LBL_00026') ?></h2>
<h3><?=$this->lang->line('LBL_00027') ?></h3>
<div class="error-msg"></div>
<div class="login-panel">
	<?php
		$username = array (
				'name' => 'username',
				'placeholder' => 'Username'
		);
		$password = array (
				'name' => 'password',
				'placeholder' => 'Password'
		);
		$submit = array (
				'class' => 'more black icon-small-arrow margin-right-white',
				'data-msg' => 'Please wait...',
				'name' => 'btn_login',
				'value' => 'Sign in'
		);
	?>
	<?=form_open ( '#', array('autocomplete'=>'off') ) ?>
	<?=form_input ( $username ) ?>
	<?=form_password ( $password ) ?>
	<?=form_submit ( $submit ) ?>

</div>
