<div class="comment-form-container">
	<h3 class="box-header"><?=$this->lang->line('lbl_leave_a_reply')?></h3>
	<form class="comment-form" id="comment-form" method="post" action="?page=post">
		<fieldset class="left">
			<input class="text-input hint" value="" placeholder="Your name" type="text">
			<input class="text-input hint" value="" placeholder="Your email" type="text">
			<input class="text-input hint" value="" placeholder="Website (optional)" type="text">
		</fieldset>
		<fieldset class="right">
			<textarea class="hint" placeholder="Message"></textarea>
			<input value="Send" type="submit">
		</fieldset>
	</form>
</div>