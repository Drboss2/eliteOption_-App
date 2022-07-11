(function ($) {
    "use strict";


    jQuery(document).ready(function($){

        $('.banner .scroll-down').on('click', function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 500);
                    return false;
                }
            }
        });

        $('.single-price').on('mouseover', function(){
            $(this).addClass('special');
        }); 
        $('.single-price').on('mouseout', function () {
            $(this).removeClass('special');
        }); 


        /*=======================================
            counterUp
        ========================================*/
        $('.count-up').counterUp({
            delay: 10,
            time: 1000
        });

        
        /*--------------------
            wow js init
        ---------------------*/
        new WOW().init();

        /*=======================================
        testimonial carousel
        ========================================*/
        var testimonialCarousel = $('.banner-slider');
        testimonialCarousel.owlCarousel({
            loop: true,
            dots: true,
            nav: false,
            margin: 0,
            autoplay: true,
            smartSpeed: 3000,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                960: {
                    items: 1
                },
                1200: {
                    items: 1
                },
                1920: {
                    items: 1
                }
            }
        }); 

        
        /*=======================================
           testimonial carousel
       ========================================*/
        var testimonialCarousel = $('.testimonial-slider');
        testimonialCarousel.owlCarousel({
            loop: true,
            dots: true,
            nav: false, 
            margin: 30,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                960: {
                    items: 2
                },
                1200: {
                    items: 3
                },
                1920: {
                    items: 3
                }
            }
        }); 


        //======================================
        //========== magnificPopup video ============
        //======================================
        $('.venobox').magnificPopup({
            type: 'video'
        });
        $('.image-popup').magnificPopup({
            type: 'image'
        }); 
        
        $('.scroll-to-top').on('click', function () {
            $("html,body").animate({
                scrollTop: 0
            }, 1000);
        });


        //======================================
        //============= YTPlayer ===============
        //======================================
        if($("#bgndVideo").length){
            $("#bgndVideo").YTPlayer();
        }
       

 
    });



    //define variable for store last scrolltop
    var lastScrollTop = '';
    
    $(window).on('scroll', function () {

        
        //back to top show/hide
        var ScrollTop = $('.scroll-to-top');
       if ($(window).scrollTop() > 300) {
           ScrollTop.fadeIn(1000);
       } else {
           ScrollTop.fadeOut(1000);
       }
       /*--------------------------
        sticky menu activation
       -------------------------*/
        var st = $(this).scrollTop();
        var mainMenuTop = $('.header-bottom');
        if ($(window).scrollTop() > 300) {
            if (st > lastScrollTop) {
                // hide sticky menu on scrolldown 
                mainMenuTop.removeClass('nav-fixed');
                
            } else {
                // active sticky menu on scrollup 
                mainMenuTop.addClass('nav-fixed');
            }

        } else {
            mainMenuTop.removeClass('nav-fixed ');
        }
        lastScrollTop = st;
       
    });
           


    $(window).on('load',function(){
        /*-----------------
            preloader
        ------------------*/
        var preLoder = $(".sec");
        preLoder.fadeOut(1000);
       
    });
    
}(jQuery));	







