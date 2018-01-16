import TweenMax from 'gsap';
import ScrollMagic from 'scrollmagic';
import 'imports-loader?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap.js';

let controller = new ScrollMagic.Controller({ globalSceneOptions: { triggerHook: "onLeave" } });
let controllerEnter = new ScrollMagic.Controller({ globalSceneOptions: { triggerHook: "onEnter" } });

let introTl = new TimelineMax();
introTl.add([
    TweenMax.to(".leaf", 1, {
        y: "+=950px",
        opacity: 0,
        rotation: "+=180deg"
    }),
    TweenMax.to('.slide-bg', 1, {
        scale: "+=0.2",
        y: "+=50px"
    }),
    TweenMax.to('.entrance-text', 1, {
        y: "+=50px",
        rotationX: "-60deg",
        opacity: 0
    }),
    TweenMax.to('.tagline', 2, {
        y: "+=150px",
        rotationX: "-60deg",
        opacity: 0
    }),
    TweenMax.to('.bottle', 1, {
        scale: "+=0.2",
        x: "-50%"
    }),
]);

let mainContentTl = new TimelineMax();
mainContentTl.add([
    TweenMax.to('.content--green', 1, {
        y: '-100px'
    }),
]);

let animCopy = new TimelineMax();
animCopy.add([
    TweenMax.set('.anim-stag', {
        x: 50,
        opacity: 0
    }),
    TweenMax.to('.anim-stag', 0.5, {
        y: '+=100px'
    }),
    TweenMax.staggerTo('.anim-stag', 0.3, {
        opacity: 1,
        x: 0,
        ease: Power2.easeInOut
    }, 0.1)
]);


let animImgRevive = new TimelineMax();
animImgRevive.add([
    TweenMax.set('.revive-img', {
        x: "-150px",
        opacity: 0
    }),
    TweenMax.to('.revive-img', 1, {
        x: 0,
        y: "+=20px",
        opacity: 1
    })
]);


let botolAnim = new TimelineMax();
botolAnim.to('.footer-bottle img', 1, {
    top: 0,
})


let footercopy = new TimelineMax();
footercopy.add([
    TweenMax.set('.footer-copy h3', {
        x: 100,
        opacity: 0
    }),
    TweenMax.set('.footer-copy h5', {
        x: 100,
        opacity: 0
    }),
    TweenMax.to('.footer-copy h3', 1, {
        x: 0,
        opacity: 1
    }),
    TweenMax.to('.footer-copy h5', 0.5, {
        x: 0,
        opacity: 1
    }),
]);

let fcblue = new TimelineMax();
fcblue.add([
    TweenMax.set('.fc-blue h3', {
        x: "-100px",
        opacity: 0
    }),
    TweenMax.set('.fc-blue h5', {
        x: "-100px",
        opacity: 0
    }),
    TweenMax.to('.fc-blue h3', 1, {
        x: 0,
        opacity: 1
    }),
    TweenMax.to('.fc-blue h5', 0.5, {
        x: 0,
        opacity: 1
    }),
]);

let fcred = new TimelineMax();
fcred.add([
    TweenMax.set('.fc-red h3', {
        x: "-100px",
        opacity: 0
    }),
    TweenMax.set('.fc-red h5', {
        x: "-100px",
        opacity: 0
    }),
    TweenMax.to('.fc-red h3', 1, {
        x: 0,
        opacity: 1
    }),
    TweenMax.to('.fc-red h5', 0.5, {
        x: 0,
        opacity: 1
    }),
]);

let fdblue = new TimelineMax();
fdblue.add([

    TweenMax.to('.fd-blue span', 0.5, {
        width: "50px"
    }),
    TweenMax.to('.fd-blue p', 1, {
        x: 0,
        opacity: 1,
        delay: 1
    }),
]);


let fdred = new TimelineMax();
fdred.add([

    TweenMax.to('.fd-red span', 0.5, {
        width: "50px"
    }),
    TweenMax.to('.fd-red p', 1, {
        x: 0,
        opacity: 1,
        delay: 1
    }),
]);

let fdgreen = new TimelineMax();
fdgreen.add([

    TweenMax.to('.fd-green span', 0.5, {
        width: "50px"
    }),
    TweenMax.to('.fd-green p', 1, {
        x: 0,
        opacity: 1,
        delay: 1
    }),
]);


new ScrollMagic.Scene({ triggerElement: ".intro", duration: 320 })
    .setTween(introTl)
    .setPin('.intro')
    .addTo(controller);

new ScrollMagic.Scene({ triggerElement: ".content--green", duration: 200, offset: 200 })
    .setTween(
        TweenMax.to('.sep_one', 1, {
            y: 0
        })
    )
    .addTo(controllerEnter);

new ScrollMagic.Scene({ triggerElement: ".content--green", duration: 400, offset: 500 })
    .setTween(animImgRevive)
    .addTo(controllerEnter);

new ScrollMagic.Scene({ triggerElement: ".content--green", duration: 400, offset: 500 })
    .setTween(animCopy)
    .addTo(controllerEnter);


new ScrollMagic.Scene({ triggerElement: ".footer-content", duration: 200, offset: 200 })
    .setTween(
        TweenMax.to('.sep_two', 1, {
            y: 0
        })
    )
    .addTo(controllerEnter);

new ScrollMagic.Scene({ triggerElement: ".footer-content", duration: 300, offset: 400 })
    .setTween(botolAnim)
    .addTo(controllerEnter);

new ScrollMagic.Scene({ triggerElement: ".footer-content", duration: 100, offset: 600 })
    .setTween(footercopy)
    .addTo(controllerEnter);






new ScrollMagic.Scene({ triggerElement: ".content--blue", duration: 200, offset: 200 })
    .setTween(
        TweenMax.to('.sep-blue-one', 1, {
            height: "120px"
        })
    )
    .addTo(controllerEnter);

new ScrollMagic.Scene({ triggerElement: ".content--blue", duration: "100%", offset: 700 })
    .setTween(
        TweenMax.to('.revive-blue-img', 1, {
            scale: 1.2,
            opacity: 1
        })
    )
    .addTo(controllerEnter);

new ScrollMagic.Scene({ triggerElement: ".content--blue", duration: 300, offset: 400 })
    .setTween(TweenMax.to('.vanil-1', 0.5, {
        y: 0,
        scale: 1,
        opacity: 1,
    }))
    .addTo(controllerEnter);

new ScrollMagic.Scene({ triggerElement: ".content--blue", duration: "100%", offset: 400 })
    .setTween(TweenMax.to('.vanil-2', 1, {
        y: "-50px",
        scale: 1,
        opacity: 1,
    }))
    .addTo(controllerEnter);

new ScrollMagic.Scene({ triggerElement: ".content--blue", duration: "100%", offset: 500 })
    .setTween(TweenMax.to('.vanil-3', 0.5, {
        y: "-100px",
        scale: 1,
        opacity: 1,
    }))
    .addTo(controllerEnter);

new ScrollMagic.Scene({ triggerElement: ".content--blue", duration: "100%", offset: 500 })
    .setTween(TweenMax.to('.vanil-4', 1, {
        y: "-150px",
        scale: 1,
        opacity: 1,
    }))
    .addTo(controllerEnter);

new ScrollMagic.Scene({ triggerElement: ".footer-content-blue", duration: 200, offset: 200 })
    .setTween(
    TweenMax.to('.sep-blue-two', 1, {
        height: "120px"
    })
    )
    .addTo(controllerEnter);

new ScrollMagic.Scene({ triggerElement: ".footer-content-blue", duration: 300, offset: 300  })
    .setTween(
        TweenMax.to('.fb-blue img', 0.3, {
            top: 0,
        })
    )
    .addTo(controllerEnter);

new ScrollMagic.Scene({ triggerElement: ".footer-content-blue", duration: 300, offset: 600 })
    .setTween(fcblue)
    .addTo(controllerEnter);


new ScrollMagic.Scene({ triggerElement: ".footer-content-blue", duration: 300, offset: 0 })
    .setTween(fdblue)
    .addTo(controller);


new ScrollMagic.Scene({ triggerElement: ".footer-content", duration: 300, offset: 0 })
    .setTween(fdgreen)
    .addTo(controller);






new ScrollMagic.Scene({ triggerElement: ".content--red", duration: 200, offset: 400 })
    .setTween(
        TweenMax.to('.sep-red-one', 1, {
            height: "120px"
        })
    )
    .addTo(controllerEnter);


new ScrollMagic.Scene({ triggerElement: ".content--red", duration: 300, offset: 700 })
    .setTween(
    TweenMax.to('.revive-red-img', 1, {
        opacity: 1,
        y: "-=100px"
    })
    )
    .addTo(controllerEnter);

new ScrollMagic.Scene({ triggerElement: ".content--red", duration: 300, offset: 300 })
    .setTween(
    TweenMax.to('.red-copy', 0.5, {
        y: "+=80px",
        opacity: 1
    })
    )
    .addTo(controllerEnter);

new ScrollMagic.Scene({ triggerElement: ".footer-content-red", duration: 200, offset: 200 })
    .setTween(
        TweenMax.to('.sep-red-two', 1, {
            height: "120px"
        })
    )
    .addTo(controllerEnter);


new ScrollMagic.Scene({ triggerElement: ".footer-content-red", duration: 300, offset: 300 })
    .setTween(
        TweenMax.to('.fb-red img', 0.3, {
            top: 0,
        })
    )
    .addTo(controllerEnter);


new ScrollMagic.Scene({ triggerElement: ".footer-content-red", duration: 300, offset: 600 })
    .setTween(fcred)
    .addTo(controllerEnter);

new ScrollMagic.Scene({ triggerElement: ".footer-content-red", duration: 300, offset: 0 })
    .setTween(fdred)
    .addTo(controller);


new ScrollMagic.Scene({ triggerElement: ".home", duration: "100%", offset: 800})
    .setTween(
    TweenMax.to(".leaf-big", 2, {
            opacity: 1,
            rotation: "+=180deg",
            y: "2000px",
        })
    )
    .addTo(controller);