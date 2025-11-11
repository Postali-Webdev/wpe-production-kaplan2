jQuery(function ($) {
    "use strict";

    $(document).ready(function () {
        let windowWidth = $(window).width();
        $('.faq-wrapper > .faq-inner-wrapper > .question').on('click', function () {
            let answer = $(this).find('.question-text').data('faq');
            if (windowWidth > 1024) {
                $('.question.active, .question-text.active, .answer-desktop.active').toggleClass('active');
                $(this).toggleClass('active');
                $(this).find('.question-text').toggleClass('active');
                $('.' + answer).toggleClass('active');    
            } else {
                $('.question.active, .question-text.active').toggleClass('active');
                $(this).toggleClass('active');
                $(this).find('.question-text').toggleClass('active');
                $(this).find('.answer-mobile').toggleClass('active');  
            }
        })
    });

    //add button before child links on landing page
    $("<div class='all-pages'>View All Pages <span></span></div>").insertBefore('.children');
    $('.all-pages').click(function() {
        $(this).toggleClass("active");
        $(this).parent().find('.children').toggleClass("active");
        $(this).parent().find('.children').slideToggle(400);
    });

    $(document).ready(function () {
        $('.select-box select').on('change', function () {
            var anchorLink = $(this).find('option:selected').val();
            window.location.href = anchorLink;
        })
    })
});