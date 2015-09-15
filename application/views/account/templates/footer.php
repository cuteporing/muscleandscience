<?php if( $title != "Login" ): ?>
<!-- footer content -->
				<footer>
					<div class="">
						<p class="pull-right">
							Codeigniter <a>KBVCodes</a>. | <span
								class="lead"> <i class="fa fa-paw"></i> Muscle and Science
							</span>
						</p>
					</div>
					<div class="clearfix"></div>
				</footer>
				<!-- /footer content -->
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
