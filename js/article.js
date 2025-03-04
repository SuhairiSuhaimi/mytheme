jQuery(document).ready(function ($) {
    // When the "Read more" button is clicked
    $('#read_more').click(function () {
        div = $('.content-body');
        var div_height = div.height();
        var data = parseInt( $(this).attr('data') );
        var max = parseInt( $(this).attr('max') );

        if( (data + 1) == max && max < 4 ) {
            div.height('100%');

            $(this).attr('data', (data + 1) ).addClass('hide').hide();
            $('.div_space').removeClass('blur');
            $('#read_less').removeClass('hide').show();
        }
        else if( (data + 1) == 4 && max > 4 ) {
            div.height('100%');

            $(this).attr('data', (data + 1) ).addClass('hide').hide();
            $('.div_space').removeClass('blur');
            $('#read_less').removeClass('hide').show();
        }
        else {
            div.height( div_height + 500);

            $(this).attr('data', (data + 1) );
            $('#read_less').removeClass('hide').show();
        }
    });

    $('#read_less').click(function () {
        $(this).addClass('hide').hide();
        $('.content-body').height(500);
        $('.div_space').addClass('blur');
        $('#read_more').attr('data', 1).removeClass('hide').show();
        $('.scrolltop').trigger('click');
    });















});
