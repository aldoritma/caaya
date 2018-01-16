import css from '../style.scss';
require('./modules/utils.js');
//Load animation if fields containing data on page load
$(document).ready(function () {
    $(".input-text").each(function () {
        if ($(this).val() != "") {
            $(this).parent().addClass("animation");
        }
    });
});

$(window).on("load", function () {
    let equalTo = $(".contact-form").height();
    $(".contact-information").height(equalTo)
});

$(".input-text").focus(function () {
    $(this).parent().addClass("animation animation-color");
});
$(".input-text").focusout(function () {
    if ($(this).val() === "")
        $(this).parent().removeClass("animation");
    $(this).parent().removeClass("animation-color");
})
