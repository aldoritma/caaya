if ($('.faq').length > 0) {
    $('.nav-tab').first().addClass('is-active');
    $('.tab-content').first().addClass('is-active');

    $('.nav-tab').click(function(event){
        event.preventDefault();
        let href = $(this).attr('href');
        window.location.hash = href;
        $('.nav-tab').removeClass('is-active');
        $(this).addClass('is-active');
        $('.tab-content').removeClass('is-active');
        $(href).addClass('is-active');
        // window.location.hash = href;
    });


}