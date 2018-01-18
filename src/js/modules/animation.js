import TweenMax from 'gsap';
let splitText = (textToSplit) => {
    let target = $(textToSplit)
    target.html(target.html().replace(/./g, "<span>$&</span>").replace(/\s/g, "&nbsp;"));
    return target;
}

let textEntrance = (targetEntrance, duration, del) => {
    let target = $(targetEntrance)
    TweenMax.staggerFromTo(target.find("span"), duration, {
        autoAlpha: 0,
        opacity: 0,
        y: -40,
        rotationX: "60deg"
    }, {
        autoAlpha: 1,
        opacity: 1,
        y: 0,
        rotationX: 0,
        delay: del
        // ease: Power2.easeOut
    }, 0.02);
}
if ($('#home').length > 0) {
    textEntrance(splitText('h1'), 1, 0.7)
    let homeEntrance = new TimelineMax();
    homeEntrance.add([
        TweenMax.set('.b-green', {
            scale: 0,
            opacity: 0
        }),
        TweenMax.set('.leaf', {
            y: "-400%"
        }),
        TweenMax.set('.leaf-big', {
            y: "-400%"
        }),
        TweenMax.to('.b-green', 1, {
            scale: 1,
            opacity: 1,
            ease: Back.easeOut.config(1.7)
        }),
        TweenMax.to('.b-red', 1, {
            x: 0,
            opacity:1,
            delay: 0.6,
            ease: Power2.easeOut
        }),
        TweenMax.to('.b-blue', 1, {
            x: 0,
            opacity:1,
            delay: 0.6,
            ease: Power2.easeOut
        }),
        TweenMax.to('.leaf', 4, {
            scale: 1.1,
            rotation: 360,
            y: "0%",
            delay: 1,
            ease: Power2.easeOut
        }),
        TweenMax.to('.leaf-big', 5, {
            scale: 1.1,
            rotation: -360,
            y: "0%",
            delay: 1,
            ease: Power2.easeOut
        }),
        TweenMax.staggerTo('.list-par li', 0.5, {
            y: 0,
            opacity: 1,
            delay: 1.3,
            ease: Power2.easeIn
        },0.1),
    ]);

}