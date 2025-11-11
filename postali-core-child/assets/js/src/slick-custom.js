jQuery(function ($) {
    "use strict";

    $('.reviews-slider').slick({
        dots: false,
        infinite: true,
        arrows:false,
        fade: false,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 800,
        slidesToShow: 3,
        slidesToScroll: 1,
        swipeToSlide: true,
        cssEase: 'ease-in-out',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

	$('#awards').slick({
		dots: false,
		infinite: true,
        arrows:true,
		fade: false,
		autoplay: true,
  		autoplaySpeed: 3000,
  		speed: 800,
		slidesToShow: 6,
		slidesToScroll: 1,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
              breakpoint: 821,
              settings: {
                    slidesToShow: 3,
                }
            },
            {
              breakpoint: 601,
              settings: {
                    slidesToShow: 2,
                }
            },
            {
              breakpoint: 450,
              settings: {
                    slidesToShow: 1,
                }
            }
        ]
	});
    
    $('.review-prev').on('click', function() {
        $('.reviews-slider').slick('slickPrev');
    });
    
    $('.review-next').on('click', function() {
        $('.reviews-slider').slick('slickNext');
    });

    $('.process-slider').slick({
        dots: false,
        infinite: true,
        arrows:false,
        fade: false,
        autoplay: false,
        autoplaySpeed: 3000,
        speed: 800,
        slidesToShow: 2,
        slidesToScroll: 1,
        swipeToSlide: true,
        cssEase: 'ease-in-out',
        vertical: false,
        verticalSwiping: false,
        responsive: [
            {
                breakpoint: 1024,
            },
            {
                breakpoint: 820,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    $('.step-prev').on('click', function() {
        $('.process-slider').slick('slickPrev');
    });
    
    $('.step-next').on('click', function() {
        $('.process-slider').slick('slickNext');
    });

});