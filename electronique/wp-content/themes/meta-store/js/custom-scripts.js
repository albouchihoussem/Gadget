jQuery(document).ready(function ($) {
    /** Preloader */
    $(".ms-preloader").addClass("remove");

    $('.ms-main-menu .menu-item-has-children > a, .ms-product-menu .menu-item-has-children > a').append('<button class="ms-dropdown"></button>');

    var sf = $('.ms-main-menu').superfish({
        delay: 500, // one second delay on mouseout
        animation: {opacity: 'show', height: 'show'}, // fade-in and slide-down animation
        speed: 'fast', // faster animation speed
    });

    $(window).resize(function () {
        if ($(window).width() < 1000) {
            sf.superfish('destroy');
            $('.ms-dropdown').removeClass('ms-opened');
        } else {
            sf.superfish('init');
        }
    }).resize();

    /** Goto Top */
    $("#gotop").gotop();

    $(".ms-toggle-menu-wrap.ms-click-open").mt_toggle();

    $('.ms-menu-toggle').on('click', function () {
        $(this).next('.ms-main-menu').slideToggle();
        $(this).parents('.ms-main-navigation').toggleClass('toggled');
        msKeyboardLoop($('.ms-main-menu'));
        return false;
    });

    $('.ms-dropdown').on('click', function () {
        $(this).parent().next('.sub-menu').slideToggle();
        $(this).toggleClass('ms-open');
        return false;
    });

    $('.ms-search-toggle a').on('click', function () {
        $(this).parent().next('.ms-mobile-product-search-form-wrap').slideToggle();
        return false;
    });

    $('.ms-mobile-search-form-close').on('click', function () {
        $(this).parent('.ms-mobile-product-search-form-wrap').slideUp();
        return false;
    });

    $(window).resize(function () {
        if ($(window).width() < 1000) {
            $('.ms-main-navigation .sub-menu').removeAttr('style');
            $('.ms-main-navigation .ms-dropdown').removeClass('ms-open');
        }

        if ($(window).width() > 768) {
            $('.ms-toggle-menu .sub-menu').removeAttr('style');
            $('.ms-toggle-menu .ms-dropdown').removeClass('ms-open');
        }
    }).resize();

    var msKeyboardLoop = function (elem) {
        var tabbable = elem.find('select, input, textarea, button, a').filter(':visible');

        var firstTabbable = tabbable.first();
        var lastTabbable = tabbable.last();
        console.log(firstTabbable);
        /*set focus on first input*/
        firstTabbable.focus();

        /*redirect last tab to first input*/
        lastTabbable.on('keydown', function (e) {
            if ((e.which === 9 && !e.shiftKey)) {
                e.preventDefault();
                firstTabbable.focus();
            }
        });

        /*redirect first shift+tab to last input*/
        firstTabbable.on('keydown', function (e) {
            if ((e.which === 9 && e.shiftKey)) {
                e.preventDefault();
                lastTabbable.focus();
            }
        });

        /* allow escape key to close insiders div */
        elem.on('keyup', function (e) {
            if (e.keyCode === 27) {
                elem.hide();
            }
            ;
        });
    };
});

(function ($) {
    "use strict";

    var msKeyboardLoop = function (elem) {

        var tabbable = elem.find('select, input, textarea, button, a').filter(':visible');

        var firstTabbable = tabbable.first();
        var lastTabbable = tabbable.last();
        /*set focus on first input*/
        firstTabbable.focus();

        /*redirect last tab to first input*/
        lastTabbable.on('keydown', function (e) {
            if ((e.which === 9 && !e.shiftKey)) {
                e.preventDefault();
                firstTabbable.focus();
            }
        });

        /*redirect first shift+tab to last input*/
        firstTabbable.on('keydown', function (e) {
            if ((e.which === 9 && e.shiftKey)) {
                e.preventDefault();
                lastTabbable.focus();
            }
        });

        /* allow escape key to close insiders div */
        elem.on('keyup', function (e) {
            if (e.keyCode === 27) {
                elem.hide();
            }
        });
    };

    $.fn.mt_toggle = function (opt) {
        $.each(this, function (index, el) {
            var mtog = $(el);

            //$.fn.mt_apply_class(mtog);

            mtog.on("click", function (e) {
                e.preventDefault();
                mtog.find(".ms-toggle-menu").toggleClass("ms-active");
                msKeyboardLoop($('.ms-product-menu'));
            });
        });
    };

    /** Go to Top */
    $.fn.gotop = function (e) {
        $.each(this, function (index, el) {
            var gotop = $(el);

            gotop.on("click", function (e) {
                e.preventDefault();
                $("html, body").animate({scrollTop: 0}, "300");
            });

            $(window).scroll(function () {
                if ($(window).scrollTop() > 300) {
                    gotop.addClass("show");
                } else {
                    gotop.removeClass("show");
                }
            });
        });
    };
})(jQuery);
