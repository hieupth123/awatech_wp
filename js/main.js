(function($) {
    "use strict";
    var iconSubMenu = function() {
        var checkChildMenu = $('#primary-menu .sub-menu').find('li:has(ul)');
        checkChildMenu.children('a').after('<i class="fa fa-caret-right" aria-hidden="true"></i>');
    }
    $(function() {
        iconSubMenu();
    });
    $('.carousel').carousel({
        interval: 5000
    });
    $('.carousel-item').first().addClass('active');
    $('.carousel-indicators li').first().addClass('active');
    $('.box-project-home .owl-carousel').owlCarousel({
        items: 2,
        autoplay: true,
        // nav: true,
        smartSpeed: 400,
        lazyLoad: true,
        dots: false,
        // navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    });
    $('.box-products-home .owl-carousel').owlCarousel({
        items: 4,
        autoplay: true,
        smartSpeed: 400,
        lazyLoad: true,
        dots: false,
        slideBy: 4
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

})(jQuery);;