(function($) {
    "use strict";
    var iconSubMenu = function() {
        var checkChildMenu = $('#primary-menu .sub-menu').find('li:has(ul)');
        checkChildMenu.children('a').after('<i class="fa fa-caret-right" aria-hidden="true"></i>');
    }
    var headerFixed = function() {
        $(window).on('load scroll resize', function() {
            var hd_height = $('#masthead').height();
            $('#page .fix-height').css('height', hd_height);
        });
    };
    var menuLeft = function() {
        jQuery(document).ready(function($) {
            $('.components li').each(function(n) {
                if ($('.components li:has(ul)').find(">span").length == 0) {
                    $('.components li:has(ul)').append('<span class="fa fa-angle-right"></span>');
                }
                $(this).find('.sub-menu').css({ display: 'none' });
            });

            $('.components li:has(ul) > span').on('click', function(e) {
                e.preventDefault();
                $(this).closest('li').children('.sub-menu').slideToggle();
                $(this).closest('li').toggleClass('opened');
            });
        });
    };
    $(function() {
        iconSubMenu();
        headerFixed();
        menuLeft();
    });
    $('.carousel').carousel({
        interval: 5000
    });
    $('.carousel-item').first().addClass('active');
    $('.carousel-indicators li').first().addClass('active');
    $('.box-project-home .owl-carousel').owlCarousel({
        autoplay: true,
        // nav: true,
        smartSpeed: 400,
        lazyLoad: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
        },
        // navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    });
    $('.box-products-home .owl-carousel').owlCarousel({
        autoplay: true,
        smartSpeed: 400,
        lazyLoad: true,
        dots: false,
        slideBy: 4,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            768: {
                items: 3
            },
            1200: {
                items: 4
            },
        },
    });

    $(".list-quotation a").on("click", function(e) {
        e.preventDefault();
        let title = $(this).text();
        $("#myModal").find('#title-request').val(title.trim()).prop('disabled', true);
        $("#myModal").modal({ // wire up the actual modal functionality and show the dialog
            "backdrop": "static",
            "keyboard": true,
            "show": true // ensure the modal is shown immediately
        });
    });
    $(".price-all a").on("click", function(e) {
        e.preventDefault();
        let title = $(this).attr('title');
        $("#myModalContact").find('#title-request').val(title.trim()).prop('disabled', true);
        $("#myModalContact").modal({ // wire up the actual modal functionality and show the dialog
            "backdrop": "static",
            "keyboard": true,
            "show": true // ensure the modal is shown immediately
        });
    });
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
    });

})(jQuery);;