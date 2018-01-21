import Slick from 'slick-carousel'
$('.hide-parent').click(function(e) {
    e.preventDefault();
    $(this).parent().hide();
    $(this).parent().siblings().show();
    $(this).parent().siblings().find('.slider-container').slick('refresh');;
});
$('#about-slider .slider-container').slick({
    slides: '.slider-item',
    arrows: true,
    dots: true,
    prevArrow: $('#about-slider .arrow-prev'),
    nextArrow: $('#about-slider .arrow-next'),
    appendDots: '#about-slider .dots',
});

$('#about-slider2 .slider-container').slick({
    slides: '.slider-item',
    arrows: true,
    dots: true,
    prevArrow: $('#about-slider2 .arrow-prev'),
    nextArrow: $('#about-slider2 .arrow-next'),
    appendDots: '#about-slider2 .dots',
});

$('#about-slider3 .slider-container').slick({
    slides: '.slider-item',
    arrows: true,
    dots: true,
    prevArrow: $('#about-slider3 .arrow-prev'),
    nextArrow: $('#about-slider3 .arrow-next'),
    appendDots: '#about-slider3 .dots',
});

$('#about-slider4 .slider-container').slick({
    slides: '.slider-item',
    arrows: true,
    dots: true,
    prevArrow: $('#about-slider4 .arrow-prev'),
    nextArrow: $('#about-slider4 .arrow-next'),
    appendDots: '#about-slider4 .dots',
});

$('#about-slider5 .slider-container').slick({
    slides: '.slider-item',
    arrows: true,
    dots: true,
    prevArrow: $('#about-slider5 .arrow-prev'),
    nextArrow: $('#about-slider5 .arrow-next'),
    appendDots: '#about-slider5 .dots',
});
