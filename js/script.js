/*---------------------------------------

Project: Bitcoin Landing Page
Template Version: 1.0
Author: YasirKareem

01. Navbar Fixed Top
02. Navbar Toggle
03. ScrollSpy
04. State
05. Owl Carousel
06. scrollTop
07. cryptocurrencyPricesw

---------------------------------------*/
$(function () {
    'use strict';
    // navbarFixedTop
    //$('.navbar .navbar-brand img').attr('height', '100px');
    $('.navbar .navbar-brand img').attr('class', 'logo_long');
    $('description').attr('style', 'display:none;');
    $('phone').attr('class', 'phone');
    $(window).scroll(function () {
        if ($('.navbar').offset().top > 50) {
            $('.navbar-fixed-top').addClass('top-nav');
            $('.navbar .navbar-brand img').attr('src', 'img/logo/logo.svg');
            //$('.navbar .navbar-brand img').attr('height', '40px');
            $('.navbar .navbar-brand img').attr('class', 'logo_short');
            $('description').attr('style', 'display:box;float:left;color:#fff;');
            $('phone').attr('class', 'phone-scroll');
            

        } else {           
            $('.navbar-fixed-top').removeClass('top-nav');
            $('.navbar .navbar-brand img').attr('src', 'img/logo/logo-string.svg');
            //$('.navbar .navbar-brand img').attr('height', '100px');
            $('.navbar .navbar-brand img').attr('class', 'logo_long');
            $('description').attr('style', 'display:none;');
            $('phone').attr('class', 'phone');
        }
    });
    
    // navbarToggle
    $('.navbar-toggle').on('click', function () {
        $('.navbar-toggle').toggleClass('change');
        $('.navbar').addClass('top-nav');
    });
    
    // scrollSpy
    $('body').scrollspy({target: ".navbar", offset: 50});
    $("#menu a").on('click', function (event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 1000, function () {
                window.location.hash = hash;
            });
        }
    });
    
    // state
    var a = 0;
    $(window).scroll(function () {
        var oTop = $('.state-items') - window.innerHeight;
        if (a === 0 && $(window).scrollTop() > oTop) {
            $('.stat-count').each(function () {
                var $this = $(this),
                    countTo = $this.attr('data-count');
                $({
                    countNum: $this.text()
                }).animate({
                    countNum: countTo
                },
                    {
                        duration: 2000,
                        easing: 'swing',
                        step: function () {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function () {
                            $this.text(this.countNum);
                        alert('finished');
                        }

                    });
            });
            a = 1;
        }
    });
    
    // owlCarousel
//    $(".owl-carousel").owlCarousel({
//        items: 4,
//        loop: true,
//        margin: 80,
//        autoplay: true,
//        autoplayTimeout: 3000,
//        autoplayHoverPause: true,
//        responsive: {
//            0: {
//                items: 1,
//                dots: false
//            },
//            768: {
//                items: 3
//            },
//            992: {
//                items: 4
//            }
//        }
//    });

    //scrollTop 
    var scrollButton = $(".scroll-top");
    $(window).scroll(function () {
        if ($(this).scrollTop() >= 500) {
            scrollButton.show();
        } else {
            scrollButton.hide();
        }
    });
    scrollButton.on('click', function () {
        $("html,body").animate({scrollTop: 0}, 2000);
    });
    
});
