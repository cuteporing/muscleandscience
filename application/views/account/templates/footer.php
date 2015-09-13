<?php if( $title != "Login" ): ?>
			</div>
		</div>

		<div id="custom_notifications" class="custom-notifications dsp_none">
			<ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group"></ul>
			<div class="clearfix"></div>
			<div id="notif-group" class="tabbed_notifications"></div>
		</div>
<?php endif; ?>
	<?php if( isset( $footer_scripts ) && !empty( $footer_scripts ) ): ?>
		<?php foreach ( $footer_scripts as $src ):?>
			<script src="<?=base_url().PATH_JS.$src?>"></script>
		<?php endforeach; ?>
	<?php endif; ?>
	</body>
</html>
