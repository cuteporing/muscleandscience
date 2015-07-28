<div class="footer-container">
	<div class="footer">
		<div class="footer-box-container clearfix">
			<div class="footer-box">
				<h3 class="box-header"><?=$this->lang->line('LBL_00007')?></h3>
				<ul class="footer-contact-info-container clearfix"><?=$footer['info'] ?></ul>
				<ul class="footer-social-icons"><?=$footer['social'] ?></ul>
			</div>
			<div class="footer-box">
				<h3 class="box-header"><?=$this->lang->line('LBL_00011')?></h3>
				<ul class="list-items gray opening-hours"><?=$footer['opening'] ?></ul>
			</div>
			<div class="footer-box"></div>
		</div>
		<?=$footer['copyright']?>
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