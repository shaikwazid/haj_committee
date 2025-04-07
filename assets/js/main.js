$(function () {
    'use strict'


    //Sticky-navbar js
    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        if (scroll < 20) {
            $("#navigation").removeClass("fixed-top");
        } else {
            $("#navigation").addClass("fixed-top");
        }
    });


    // Nice Select Js
    // $('select').niceSelect();

    // $(document).ready(function () {
    //     $('.counter-value').each(function () {
    //         $(this).prop('Counter', 0).animate({
    //             Counter: $(this).text()
    //         }, {
    //             duration: 3500,
    //             easing: 'swing',
    //             step: function (now) {
    //                 $(this).text(Math.ceil(now));
    //             }
    //         });
    //     });
    // });


     //scroll to top
     
    $('.back-to-top').fadeOut();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
    });
    $('.back-to-top').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 700);
        return false;
    });


});