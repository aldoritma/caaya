import TweenMax from 'gsap';
import ScrollMagic from 'scrollmagic';
import 'imports-loader?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap.js';
// import 'imports-loader?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators.js';

let controller = new ScrollMagic.Controller({ globalSceneOptions: { triggerHook: "onLeave" } });
let controllerEnter = new ScrollMagic.Controller({ globalSceneOptions: { triggerHook: "onEnter" } });

let splitText = (textToSplit) => {
    let target = $(textToSplit)
    target.html(target.html().replace(/./g, "<span>$&</span>").replace(/\s/g, "&nbsp;"));
    return target;
}
splitText('.entrance-text');

let aboutIntro = new TimelineMax();
aboutIntro.add([
    TweenMax.set(".entrance-text span", {
        y: 10
    }),
    TweenMax.set(".hero h1", {
        y: 100
    }),
    TweenMax.set(".img-hero", {
        scale: 3
    }),
    TweenMax.set(".hero p", {
        y: "-20px",
        opacity: 0
    }),
    TweenMax.to(".img-hero", 1, {
        scale: 0.99,
        delay: 0.3,
        // ease: Back.easeOut.config(1.7)
        ease: Back.easeOut.config(1.4),
    }),
    TweenMax.to(".hero h1", 1, {
        opacity: 1,
        y: 0,
        delay: 0.5,
        ease: Back.easeOut.config(1.7)
    }),
    TweenMax.staggerTo(".entrance-text span", 0.4, {
        opacity: 1,
        y: 0,
        delay: 1,
    }, 0.03),
    TweenMax.to(".hero p", 0.6, {
        delay: 1.4,
        y: 0,
        opacity: 1
    }),
])

new ScrollMagic.Scene({ triggerElement: ".about-green", duration: "100%", offset: 200 })
    .setTween(
    TweenMax.to('.about-green .bg-par', 0.2, {
        y: "+=50px",
        x: "+=50px",
        scale: 1.1
    })
    )
    .addTo(controllerEnter);


new ScrollMagic.Scene({ triggerElement: ".about-green", duration: "100%" })
    .setTween(
        TweenMax.to('.about-green .punchline h4', 0.2, {
            y: "+=30px"
        })
    )
    .addTo(controllerEnter);


new ScrollMagic.Scene({ triggerElement: ".about-green", duration: "100%" })
    .setTween(
    TweenMax.to('.about-green .punchline h2', 0.2, {
        y: "=10px",
        scale: 1.1
    })
    )
    .addTo(controllerEnter);


new ScrollMagic.Scene({ triggerElement: ".about-green", duration: "100%", offset: 200 })
    .setTween(
    TweenMax.to('.about-green .punchline blockquote', 0.2, {
        y: "+=60px"
    })
    )
    .addTo(controllerEnter);

new ScrollMagic.Scene({ triggerElement: ".about-green", duration: "100%", offset: 200 })
    .setTween(
    TweenMax.to('.about-green .about-bottle', 0.2, {
        y: "+=120px",
        scale: 1.2
    })
    )
    .addTo(controllerEnter);





new ScrollMagic.Scene({ triggerElement: ".about-blue", duration: "100%" })
    .setTween(
    TweenMax.to('.about-blue .punchline h4', 0.2, {
        x: "-=50px"
    })
    )
    .addTo(controllerEnter);


new ScrollMagic.Scene({ triggerElement: ".about-blue", duration: "100%" })
    .setTween(
    TweenMax.to('.about-blue .punchline .txt-1', 0.2, {
        x: "+60px",
        scale: 1.1
    })
    )
    .addTo(controllerEnter);


new ScrollMagic.Scene({ triggerElement: ".about-blue", duration: "100%" })
    .setTween(
    TweenMax.to('.about-blue .punchline .txt-2', 0.2, {
        x: "-60px",
        scale: 1.1
    })
    )
    .addTo(controllerEnter);


new ScrollMagic.Scene({ triggerElement: ".about-blue", duration: "100%", offset: 200 })
    .setTween(
    TweenMax.to('.about-blue .punchline blockquote', 0.2, {
        y: "-=60px"
    })
    )
    .addTo(controllerEnter);

new ScrollMagic.Scene({ triggerElement: ".about-blue", duration: "100%", offset: 200 })
    .setTween(
    TweenMax.to('.about-blue .about-bottle', 0.2, {
        y: "+=80px",
        scale: 1.2
    })
    )
    .addTo(controllerEnter);


new ScrollMagic.Scene({ triggerElement: ".about-blue", duration: "100%", offset: 200 })
    .setTween(
    TweenMax.to('.about-blue .bg-par', 0.2, {
        y: "+=50px",
        scale: 1.1
    })
    )
    .addTo(controllerEnter);






new ScrollMagic.Scene({ triggerElement: ".about-red", duration: "100%", offset: 200 })
    .setTween(
    TweenMax.to('.about-red h2.get-bigger', 0.2, {
        scale: 1.2
    })
    )
    .addTo(controllerEnter);


new ScrollMagic.Scene({ triggerElement: ".about-red", duration: "100%", offset: 200 })
    .setTween(
    TweenMax.to('.about-red .about-bottle', 0.2, {
        y: "+=80px",
        scale: 1.2
    })
    )
    .addTo(controllerEnter);


new ScrollMagic.Scene({ triggerElement: ".about-red", duration: "100%", offset: 200 })
    .setTween(
    TweenMax.to('.about-red .punchline h4', 0.2, {
        y: "+=10px",
    })
    )
    .addTo(controllerEnter);


new ScrollMagic.Scene({ triggerElement: ".about-red", duration: "100%", offset: 200 })
    .setTween(
    TweenMax.to('.about-red .punchline blockquote', 0.2, {
        y: "-=60px"
    })
    )
    .addTo(controllerEnter);
