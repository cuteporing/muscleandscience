<h2><?=$this->lang->line('LBL_00026') ?></h2>
<h3><?=$this->lang->line('LBL_00027') ?></h3>
<div class="error-msg" role="error-alert"><span class="msg"></span></div>
<div class="login-panel">
	<?php
		$form = array(
				'id'          => 'login-form',
				'autocomplete'=>'off',
				'onsubmit'    =>'return false'
		);
		$username = array (
				'id'   => 'username',
				'name' => 'username',
				'placeholder' => 'Username'
		);
		$password = array (
				'id'   => 'password',
				'name' => 'password',
				'placeholder' => 'Password'
		);
		$submit = array (
				'id'    => 'loginBtn',
				'class' => 'more black icon-small-arrow margin-right-white',
				'data-msg' => 'Please wait...',
				'name' => 'btn_login',
				'value' => 'Sign in'
		);
	?>
	<?=form_open ( 'account/user-login', $form) ?>
	<?=form_input ( $username ) ?>
	<?=form_password ( $password ) ?>
	<?=form_submit( $submit )?>

</div>