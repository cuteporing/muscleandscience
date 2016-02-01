var homeController = (function() {
	$('.slideshow-wrapper').slick({
		arrows: true,
		autoplay: true,
		swipe: true,
		touchMove: true,
		lazyLoad: 'ondemand',
		prevArrow: '<button type="button" data-role="none" class="slick-prev animated fadeInLeft">Previous</button>',
		nextArrow: '<button type="button" data-role="none" class="slick-next animated fadeInRight">Next</button>',
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
			$('.slide-caption').off();
			$('.slide-caption').slideUp(300);
		},
		onAfterChange: function() {
			$('.slide-caption').off();
			$('.slick-active .slide-caption').off();
			$('.slick-active .slide-caption').slideDown(500);
		}
	});
})();