(function($) {
    $(document).ready(function() {
        $('.slider').owlCarousel({
            items: 1,
            loop: true,
            autoplay: false,
            stagePadding: 0,
            margin: 0,
            singleItem: true,
            nav: true,
            navText: [
              "<i class='fa fa-arrow-left'></i>",
              "<i class='fa fa-arrow-right'></i>"
            ],
            dots: true,
            autoplayTimeout: 5000
        });

        var owidth = $('.title').width();
        var imagetitle = 30;
        var sliderimg = parseInt( $('.img-infographic').first().height() );
        var space = sliderimg < 250 ? 25 : (sliderimg < 400 ? 30 : 35);

        if (owidth < 768) {
            $('#slider').css('max-width', owidth);
            $('.slider').css('max-width', owidth);
        }

        $('.slider').css('max-height', sliderimg + imagetitle);
        $('.owl-nav').css('top', (sliderimg / 2) );
        $('.owl-dots').css('top', (sliderimg - space) );

        $(window).resize(function() {
            var img = parseInt( $('.img-infographic').first().find('img').height() );
            var gap = img < 250 ? 25 : (img < 400 ? 30 : 35);

            if (owidth < 768) {
                $('#slider').css('max-width', owidth);
                $('.slider').css('max-width', owidth);
            }

            $('.slider').css('max-height', img + imagetitle);
            $('.owl-nav').css('top', (img / 2) );
            $('.owl-dots').css('top', (img - gap) );
        });

    });

}
)(jQuery);
