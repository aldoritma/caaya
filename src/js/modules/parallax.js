import TweenMax from 'gsap';
import ScrollMagic from 'scrollmagic';
import 'imports-loader?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap.js';

if ($('#home').length > 0) {
    let controller = new ScrollMagic.Controller({ globalSceneOptions: { triggerHook: "onLeave" } });
    let controllerEnter = new ScrollMagic.Controller({ globalSceneOptions: { triggerHook: "onEnter" } });

    let stag1 = new TimelineMax();
    stag1.add([
        TweenMax.set('.stag', {
            x: "-50px",
            opacity: 0
        }),
        TweenMax.set('#copy-desc-p-1 p', {
            opacity: 0,
        }),
        TweenMax.staggerTo('.stag', 0.5, {
            x: 0,
            opacity: 1
        }, 0.1),
        TweenMax.to('#copy-desc-p-1 span', 0.5, {
            width: "42px",
            delay: 0.5,
            opacity: 1
        }),
        TweenMax.staggerTo('#copy-desc-p-1 p', 0.5, {
            x: 0,
            opacity: 1,
            delay: 1,
        }, 0.1),
    ])

    let stag2 = new TimelineMax();
    stag2.add([
        TweenMax.set('.stag2', {
            x: "-50px",
            opacity: 0
        }),
        TweenMax.set('#copy-desc-p-2 p', {
            opacity: 0,
        }),
        TweenMax.staggerTo('.stag2', 0.5, {
            x: 0,
            opacity: 1
        }, 0.1),
        TweenMax.to('#copy-desc-p-2 span', 0.5, {
            width: "42px",
            delay: 0.5,
            opacity: 1
        }),
        TweenMax.staggerTo('#copy-desc-p-2 p', 0.5, {
            x: 0,
            opacity: 1,
            delay: 1,
        }, 0.1),
    ])

    let stag3 = new TimelineMax();
    stag3.add([
        TweenMax.set('.stag3', {
            x: "-50px",
            opacity: 0
        }),
        TweenMax.set('#copy-desc-p-1 p', {
            opacity: 0,
        }),
        TweenMax.staggerTo('.stag3', 0.5, {
            x: 0,
            opacity: 1
        }, 0.1),
        TweenMax.to('#copy-desc-p-3 span', 0.1, {
            width: "42px",
            delay: 0.2,
            opacity: 1
        }),
        TweenMax.staggerTo('#copy-desc-p-3 p', 0.3, {
            x: 0,
            opacity: 1,
            delay: 0.3,
        }, 0.1),
    ])

    new ScrollMagic.Scene({ triggerElement: ".hero-jasmine", duration: "500%", offset: 100 })
        .setTween(
        TweenMax.to('.leaf', 1, {
            y: "3000px",
            x: "-200px",
            rotation: 1200
        })
        )
        .addTo(controllerEnter);
    new ScrollMagic.Scene({ triggerElement: ".hero-jasmine", duration: "100%", offset: 200 })
        .setTween(
            TweenMax.to('#bg-par1-p', 1, {
                scale: 1.05
            })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".hero-jasmine", duration: "100%", offset: 200 })
        .setTween(
        TweenMax.to('#daun-p', 1, {
            y: "-=50px"
        })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".hero-jasmine", duration: "100%", offset: 200 })
        .setTween(
        TweenMax.to('#teko-p', 1, {
            y: "+=50px"
        })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".hero-jasmine", duration: "100%", offset: 200 })
        .setTween(
            TweenMax.to('#copy-1', 0.5, {
                y: "-=50px"
            })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".hero-jasmine", duration: "100%", offset: 200 })
        .setTween(
        TweenMax.to('#copy-2', 0.5, {
            y: "+=10px",
        })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".hero-jasmine", duration: "100%", offset: 200 })
        .setTween(
            TweenMax.to('#copy-2', 0.5, {
                y: "+=10px",
            })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".hero-jasmine", duration: "100%", offset: 200 })
        .setTween(
            TweenMax.to('#img-jas-p', 1, {
                y: "+=20px",
                scale: 1.1
            })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".hero-jasmine", duration: "100%", offset: 400 })
        .setTween(
        TweenMax.to('#img-bot-green-p', 1, {
            y: "-=50px",
            scale: 1.2
        })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".hero-jasmine", duration: "100%", offset: 600 })
        .setTween(
            TweenMax.to('#img-jas-p', 0.6, {
                y: "-=50px",
            })
        )
        .addTo(controllerEnter);
    new ScrollMagic.Scene({ triggerElement: ".content-jasmine", duration: "100%", offset: 200 })
        .setTween(
            TweenMax.to('#img-jas-p2', 0.6, {
                y: "-=20px",
            })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".content-jasmine", duration: 300, offset: 500 })
        .setTween(
        TweenMax.to('#img-bot-p-1', 0.6, {
            y: "+=20px",
        })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".content-jasmine", duration: "100%", offset: 100 })
        .setTween(stag1)
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".content-jasmine", duration: "100%", offset: 300 })
        .setTween(
            TweenMax.to('#prod-desc-p1', 0.6, {
                y: "+=20px",
            })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".hero-vanilla", duration: "100%", offset: 300 })
        .setTween(
            TweenMax.to('.vanilla-copy h4', 0.6, {
                y: "+=30px",
            })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".hero-vanilla", duration: "100%", offset: 200 })
        .setTween(
        TweenMax.to('.vanilla-copy .cp-vanila', 0.6, {
            x: "-=50px",
        })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".hero-vanilla", duration: "100%", offset: 200 })
        .setTween(
        TweenMax.to('.vanilla-copy .cp-pandan', 0.6, {
            x: "+=50px",
        })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".hero-vanilla", duration: "100%", offset: 400 })
        .setTween(
        TweenMax.to('#img-bot-blue-p', 1, {
            y: "-=50px",
            scale: 1.06
        })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".hero-vanilla", duration: "100%", offset: 200 })
        .setTween(
        TweenMax.to('#img-van-p', 0.6, {
            y: "-=100px",
        })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".hero-vanilla", duration: "100%", offset: 200 })
        .setTween(
        TweenMax.to('#img-pan-p', 0.6, {
            y: "-=25px",
        })
        )
        .addTo(controllerEnter);
    new ScrollMagic.Scene({ triggerElement: ".hero-vanilla", duration: "100%", offset: 100 })
        .setTween(
        TweenMax.to('#bg-par2-p', 1, {
            y: "+=40px"
        })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".content-vanilla", duration: "100%", offset: 100 })
        .setTween(stag2)
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".content-vanilla", duration: "100%", offset: 500 })
        .setTween(
        TweenMax.to('#img-bot-p-2', 0.6, {
            y: "+=20px",
        })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".content-vanilla", duration: "100%", offset: 500 })
        .setTween(
        TweenMax.to('#img-pan-p2', 0.6, {
            y: "-=20px",
        })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".content-vanilla", duration: "100%", offset: 500 })
        .setTween(
        TweenMax.to('#img-van-p2', 0.6, {
            x: "+=20px",
            scale: 0.95
        })
        )
        .addTo(controllerEnter);


    new ScrollMagic.Scene({ triggerElement: ".hero-rice", duration: "100%", offset: 300 })
        .setTween(
        TweenMax.to('#cp-rice-1', 0.6, {
            x: "+=30px",
        })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".hero-rice", duration: "100%", offset: 300 })
        .setTween(
        TweenMax.to('#cp-rice-2', 0.6, {
            scale: 1.1,
        })
        )
        .addTo(controllerEnter);
    new ScrollMagic.Scene({ triggerElement: ".hero-rice", duration: "100%", offset: 300 })
        .setTween(
        TweenMax.to('#cp-rice-3', 0.6, {
            y: "+=50px",
        })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".hero-rice", duration: "100%", offset: 200 })
        .setTween(
        TweenMax.to('#img-rice', 1, {
            x: "-=50px",
            scale: 1.1
        })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".hero-rice", duration: "100%", offset: 400 })
        .setTween(
        TweenMax.to('#img-rice-bot', 1, {
            y: "-=70px",
            scale: 1.07
        })
        )
        .addTo(controllerEnter);
    new ScrollMagic.Scene({ triggerElement: ".hero-rice", duration: "100%", offset: 100 })
        .setTween(
        TweenMax.to('#bg-par3-p', 1, {
            y: "+=100px"
        })
        )
        .addTo(controllerEnter);
    new ScrollMagic.Scene({ triggerElement: ".content-rice", duration: "100%", offset: 400 })
        .setTween(stag3)
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".content-rice", duration: "100%", offset: 400 })
        .setTween(
        TweenMax.to('#img-rice-b-p', 1, {
            x: "+=70px",
            scale: 1.07
        })
        )
        .addTo(controllerEnter);

    new ScrollMagic.Scene({ triggerElement: ".content-rice", duration: "100%", offset: 400 })
        .setTween(
        TweenMax.to('#img-bot-red-p', 1, {
            y: "+=30px",
            scale: 1.07
        })
        )
        .addTo(controllerEnter);


    $('.linkscroll').click(function (){
        let anchor = $(this).data('link');
        console.log(anchor)
        $('html,body').animate({ scrollTop: $("#" + anchor).offset().top }, 'slow');
        window.location.hash = anchor;
    });

}

if ($('#about').length > 0) {
    if ($(window).width() > 768) {
        let movementStrength = 25;
        let height = movementStrength / $(window).height();
        let width = movementStrength / $(window).width();

        $(".about-hero").mousemove(function (e) {
            let pageX = e.pageX - ($(window).width() / 2);
            let pageY = e.pageY - ($(window).height() / 2);
            let newvalueX = width * pageX * -1 - 25;
            let newvalueY = height * pageY * -1 - 50;
            $('.about-hero').css("background-position", newvalueX + "px     " + newvalueY + "px");
        });

        let controller = new ScrollMagic.Controller({ globalSceneOptions: { triggerHook: "onLeave" } });
        let controllerEnter = new ScrollMagic.Controller({ globalSceneOptions: { triggerHook: "onEnter" } });

        new ScrollMagic.Scene({ triggerElement: "#about-slider", duration: "100%", offset: 0 })
            .setTween(
            TweenMax.to('#about-slider .wrap-desc', 0.7, {
                y: "-=60px"
            })
            )
            .addTo(controllerEnter);

        new ScrollMagic.Scene({ triggerElement: "#about-slider", duration: "100%", offset: 0 })
            .setTween(
            TweenMax.to('#about-slider .detail-img', 0.7, {
                y: "+=60px"
            })
            )
            .addTo(controllerEnter);

        new ScrollMagic.Scene({ triggerElement: "#about-slider2", duration: "100%", offset: 0 })
            .setTween(
            TweenMax.to('#about-slider2 .wrap-desc', 0.7, {
                y: "+=60px"
            })
            )
            .addTo(controllerEnter);

        new ScrollMagic.Scene({ triggerElement: "#about-slider2", duration: "100%", offset: 0 })
            .setTween(
            TweenMax.to('#about-slider2 .detail-img', 0.7, {
                y: "-=60px"
            })
            )
            .addTo(controllerEnter);

        new ScrollMagic.Scene({ triggerElement: "#about-slider3", duration: "100%", offset: 0 })
            .setTween(
            TweenMax.to('#about-slider3 .wrap-desc', 0.7, {
                y: "-=60px"
            })
            )
            .addTo(controllerEnter);

        new ScrollMagic.Scene({ triggerElement: "#about-slider3", duration: "100%", offset: 0 })
            .setTween(
            TweenMax.to('#about-slider3 .detail-img', 0.7, {
                y: "+=60px"
            })
            )
            .addTo(controllerEnter);

        new ScrollMagic.Scene({ triggerElement: "#about-slider4", duration: "100%", offset: 0 })
            .setTween(
            TweenMax.to('#about-slider4 .wrap-desc', 0.7, {
                y: "+=60px"
            })
            )
            .addTo(controllerEnter);

        new ScrollMagic.Scene({ triggerElement: "#about-slider4", duration: "100%", offset: 0 })
            .setTween(
            TweenMax.to('#about-slider4 .detail-img', 0.7, {
                y: "-=60px"
            })
            )
            .addTo(controllerEnter);

        new ScrollMagic.Scene({ triggerElement: "#about-slider5", duration: "100%", offset: 0 })
            .setTween(
            TweenMax.to('#about-slider5 .wrap-desc', 0.7, {
                y: "-=60px"
            })
            )
            .addTo(controllerEnter);

        new ScrollMagic.Scene({ triggerElement: "#about-slider5", duration: "100%", offset: 0 })
            .setTween(
            TweenMax.to('#about-slider5 .detail-img', 0.7, {
                y: "+=60px"
            })
            )
            .addTo(controllerEnter);

    }

    let controller = new ScrollMagic.Controller({ globalSceneOptions: { triggerHook: "onLeave" } });
    let controllerEnter = new ScrollMagic.Controller({ globalSceneOptions: { triggerHook: "onEnter" } });
    let windowH = $(document).height();
    new ScrollMagic.Scene({ triggerElement: ".about-detail", duration: windowH })
        .setClassToggle('#about .header .logo img', 'blacked')
        .addTo(controller);
        console.log('about-para');

    let stag3 = new TimelineMax();
    stag3.add([
        TweenMax.to('.about-hero .about-hero-d .line', 0.6, {
            width: "68px",
            opacity: 1,
            delay: 1,
            ease: Power1.easeOut
        }),
        TweenMax.to('.about-hero .about-hero-d p', 1, {
            x: 0,
            opacity: 1,
            delay: 1.8,
            ease: Back.easeOut.config(1.7)
        }),
    ]);




}
