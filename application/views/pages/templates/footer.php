<div class="footer-container">
	<div class="footer">
		<div class="footer-box-container clearfix">
			<?=$footer['info'] ?>
			<?=$footer['opening'] ?>
			<?=$footer['recent_post'] ?>
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
			arrows: true,
			autoplay: true,
			swipe: true,
			touchMove: true,
			lazyLoad: 'ondemand',
			prevArrow: '<button type="button" data-role="none" class="slick-prev">Previous</button>',
			nextArrow: '<button type="button" data-role="none" class="slick-next">Next</button>',
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
			],
			onBeforeChange: function() {

				$('.slide-caption').slideUp(300);

			},
			onAfterChange: function() {
				$('.slick-active .slide-caption').slideDown(500);
			}
		});
	});
</script>
</body>
</html>