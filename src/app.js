import css from './style.scss';
require('./js/modules/animation.js');
require('./js/modules/parallax.js');
require('./js/modules/slider.js');



$(document).ready(function () {
    $(".input-text").each(function () {
        if ($(this).val() != "") {
            $(this).parent().addClass("animation");
        }
    });
    $(".input-text").focus(function () {
        $(this).parent().addClass("animation animation-color");
    });
    $(".input-text").focusout(function () {
        if ($(this).val() === "")
            $(this).parent().removeClass("animation");
        $(this).parent().removeClass("animation-color");
    });

    $('.hamburger-menu').on('click', function () {
        $(this).toggleClass('open');
        $('.bar').toggleClass('animate');
        $('.main-navigation').toggleClass('is-active');
        $('.overlay').toggle()

    })

});

$(window).on("load", function () {
    let contactH = $(".contact-form").height();
    $(".contact-information").height(contactH)
    let equalTo = $('.mega-footer .col-10').height();
    $('.footer-logo').height(equalTo);
});
