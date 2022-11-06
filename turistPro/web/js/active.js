(function ($) {
    'use strict';

    if ($.fn.owlCarousel) {
        // нулевой блок с анимациями
        $(".features-slides").owlCarousel({
            items: 5,
            loop: true,
            autoplay: false,
            smartSpeed: 2000,
            margin: 50,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 5
                }
            }
        })
    }

 // поисковая модель
    $('#search-btn, #closeBtn').on('click', function () {
        $('body').toggleClass('search-form-on');
    });
    
    //функция вычисления ширины
    if ($.fn.matchHeight) {
        $('.equal-height').matchHeight();
    }
    
    // функция скрола
    if ($.fn.scrollUp) {
        $.scrollUp({
            scrollSpeed: 1500,
            scrollText: '<i class="pe-7s-angle-up" aria-hidden="true"></i>'
        });
    }

    // окрытие при скролле в определенную точку всплыывание анимации
    if ($.fn.onePageNav) {
        $('#listingNav').onePageNav({
            currentClass: 'active',
            scrollSpeed: 2000,
            easing: 'easeOutQuad'
        });
    }

    //превью для клика
    $("a[href='#']").on('click', function ($) {
        $.preventDefault();
    });

  
    if ($.fn.init) {
        new WOW().init();
    }

    var $window = $(window);

    // принятие липкой стрелки к объекту тела
    $window.on('scroll', function () {
        if ($window.scrollTop() > 0) {
            $('body').addClass('sticky');
        } else {
            $('body').removeClass('sticky');
        }
    });

    // нерабочий прелоадер
    $window.on('load', function () {
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });

})(jQuery);