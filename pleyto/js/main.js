

function main() {

    (function () {
        'use strict';

        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                // you're at the bottom of the page
                $('#social').addClass('social-hide');
            } else {
                $('#social').removeClass('social-hide');
            }
        };

        /* ==============================================
  	Testimonial Slider
  	=============================================== */

        $('a.page-scroll').click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top - 40
                    }, 900);
                    return false;
                }
            }
        });

        /*====================================
        Show Menu on Book
        ======================================*/
        $(window).bind('scroll', function () {
            var navHeight = $(window).height() - 100;
            if ($(window).scrollTop() > navHeight) {
                $('.navbar-default').addClass('on');
                $('.navbar-logo').addClass('navbar-logo-resize');
                $('#tf-menu.navbar-default .navbar-nav > li > a').addClass('white');
                $('#tf-menu.navbar-default .navbar-nav > li > a').addClass('navbar-text-change');
            } else {
                $('.navbar-default').removeClass('on');
                $('.navbar-logo').removeClass('navbar-logo-resize');
                $('#tf-menu.navbar-default .navbar-nav > li > a').removeClass('white');
                $('#tf-menu.navbar-default .navbar-nav > li > a').removeClass('navbar-text-change');
            }
        });

        $('body').scrollspy({
            target: '.navbar-default',
            offset: 80
        })

        $(document).ready(function () {

            var appCar = $("#instruction").owlCarousel({
                navigation: true, // Show next and prev buttons
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true
            });
            
//            setInterval(function(){
//                appCar.trigger("owl.next");
//            }, 6000);

        });

        /*====================================
    Portfolio Isotope Filter
    ======================================*/
        $(window).load(function () {
            var $container = $('#lightbox');
            $container.isotope({
                filter: '*',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            $('.cat a').click(function () {
                $('.cat .active').removeClass('active');
                $(this).addClass('active');
                var selector = $(this).attr('data-filter');
                $container.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });
                return false;
            });

        });



    }());


}
main();