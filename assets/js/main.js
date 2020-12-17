(function($) {
    $('.hero-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        speed: 600,
        autoplay: true,
        autoplaySpeed: 10000,
        cssEase: 'ease-in-out'
    });
    $(window).scroll(function () {
        rectHeader();
        console.log('test');
    });
    function rectHeader() {
        var sc = $(window).scrollTop();

        if (sc > 1) {
            $("header").addClass("active");
        } else {
            $("header").removeClass("active");
        }
    };
    rectHeader();
}(jQuery));