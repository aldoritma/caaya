import css from './style.scss';

if ($('.about').length > 0 ){
    require('./js/modules/aboutParallax.js');
}

if ($('.home').length > 0) {
    require('./js/modules/utils.js');
    require('./js/modules/animation.js');
    require('./js/modules/homeParallax.js');
}


$(document).ready(function () {
    $(".input-text").each(function () {
        if ($(this).val() != "") {
            $(this).parent().addClass("animation");
        }
    });
});

$(window).on("load", function () {
    let contactH = $(".contact-form").height();
    $(".contact-information").height(contactH)
});

$(".input-text").focus(function () {
    $(this).parent().addClass("animation animation-color");
});
$(".input-text").focusout(function () {
    if ($(this).val() === "")
        $(this).parent().removeClass("animation");
    $(this).parent().removeClass("animation-color");
})


$(window).on("load", function () {
    let equalTo = $('.mega-footer .col-10').height();
    $('.footer-logo').height(equalTo);
});



