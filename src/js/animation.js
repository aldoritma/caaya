import TweenMax from 'gsap';

// Split string
let splitText = (textToSplit) => {
    let target = $(textToSplit)
    target.html(target.html().replace(/./g, "<span>$&</span>").replace(/\s/g, "&nbsp;"));
    return target;
}

let textEntrance = (targetEntrance, duration) => {
    let target = $(targetEntrance)
    TweenMax.staggerFromTo(target.find("span"), duration, {
        autoAlpha: 0,
        opacity: 0,
        x: 40
    }, {
        autoAlpha: 1,
        opacity: 1,
        x: 0,
        ease: Back.easeOut.config(1.7)
    }, 0.1);
}

textEntrance(splitText('.entrance-text'), 1.4);

let bgIn = (bodyClass) => {
    $('body').removeClass('green red blue');
    $('body').addClass(bodyClass);
    TweenMax.set(".slide-bg", {
        scale: 1.3,
        opacity: 0.5,
    });
    TweenMax.to($('.slide-bg'), 0.8, {
        scale: 1,
        opacity: 1,
        ease: Power1.easeIn
    });
}
bgIn('green');
let bgOut = () => {
    TweenMax.set(".slide-bg", {
        scale: 1,
        opacity: 1,
    });
    TweenMax.to($('.slide-bg'), 0.5, {
        scale: 1.3,
        opacity: 0.5,
        ease: Power1.easeOut
    });
}
let bottleOut = () => {
    TweenMax.to($('.bottle'), 0.1, { y: "+=20", yoyo: true, repeat: 4 });
    TweenMax.to($('.bottle'), 0.1, { y: "-=20", yoyo: true, repeat: 4 });
}
let bottleIn = () => {
    TweenMax.to($('.bottle'), 0.1, { y: "-=20", yoyo: true, repeat: 4 });
    TweenMax.to($('.bottle'), 0.1, { y: "0" });
}


var flashBlock = new TimelineMax({delay: 1});
flashBlock.add([
    TweenMax.set(".tagline h4", {
        color: 'transparent'
    }),
    TweenMax.fromTo(".bottle", 0.6, {
        y: 20,
        scale: 0.8,
    }, {
        y: 0,
        opacity: 1,
        scale: 1,
        delay: 1.2,
        ease: Back.easeOut.config(1.7)
    }),
    TweenMax.fromTo($('.flashblock'), 0.6, {
        width: 0,
    }, {
        width: '100%',
        ease: Power2.easeIn
    }),
    TweenMax.set(".tagline h4", {
        color: 'white',
        delay: 0.6
    }),
    TweenMax.fromTo($('.flashblock'), 0.6, {
        x: 0,
        color: 'white'
    }, {
        x: '100%',
        delay: 0.7,
        ease: Power2.easeOut
    })
]);





let botolsrc = $('.bottle').attr('src');
botolsrc = botolsrc.slice(0, -8);

let bgsrc = $('.slide-bg img').attr('src');
bgsrc = bgsrc.slice(0, -7);
console.log(bgsrc);


let toGreen = () => {
    bottleOut();
    bgOut();
    setTimeout(() => {
        $('.slide-bg img').attr('src', bgsrc + 'bg1.jpg');
        bgIn('green');
    }, 500);
    setTimeout(() => {
        $('.bottle').attr('src', botolsrc + 'bot1.png');
        bottleIn();
    }, 400);

}

let toBlue = () => {
    bottleOut();
    bgOut();
    setTimeout(() => {
        $('.slide-bg img').attr('src', bgsrc + 'bg2.jpg');
        bgIn('blue');
    }, 500);
    setTimeout(() => {
        $('.bottle').attr('src', botolsrc + 'bot2.png');
        bottleIn();
    }, 400);
}

let toRed = () => {
    bottleOut();
    bgOut();
    setTimeout(() => {
        $('.slide-bg img').attr('src', bgsrc + 'bg3.jpg');
        bgIn('red');
    }, 500);
    setTimeout(() => {
        $('.bottle').attr('src', botolsrc + 'bot3.png');
        bottleIn();
    }, 400);

}

$('.radio-btn').change(function () {
    if (this.value == 'rad-green') {
        toGreen();
        console.log('change to green');
    }
    else if (this.value == 'rad-blue') {
        toBlue();
    }
    else {
        toRed();
    }
});



$(window).scroll(function () {
    if ($('.green').length > 0) {
        console.log('green scrolling');
    }
    else if ($('.blue').length > 0) {
        console.log('blue scrolling');
    }
    else {
        console.log('red scrolling');
    }
});


