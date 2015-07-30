<div class="footer-container">
	<div class="footer">
		<div class="footer-box-container clearfix">
			<?=$footer['info'] ?>
			<?=$footer['opening'] ?>
			<div class="footer-box"></div>
		</div>
		<div class="copyright-area">
			<?=COPYRIGHT ?>
			<a href="<?=AUTHOR_EMAIL ?>" title="<?=AUTHOR_DISPLAY ?>" target="_blank">
				<?=AUTHOR_DISPLAY ?>
			</a>
		</div>
	</div>
</div>

<script>
	$(document).foundation();

	$(document).ready(function(){
		$('.slideshow-wrapper').slick({
			arrows: false,
			vertical: true,
			responsive: [
				{
					breakpoint: 768,
					settings: {
						arrows: false,
						centerMode: true,
						centerPadding: '40px',
						slidesToShow: 3,
						variableWidth: true
					}
				}
			]
		});
	});
</script>
</body>
</html>