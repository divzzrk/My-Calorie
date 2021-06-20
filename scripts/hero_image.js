// Get viewport height for Hero Image
var headerHeight = $(".headerIntro").css({"padding-top":"0%","height":"90vh"}).outerHeight();
var overlayHeight = $(".headerIntro .header__overlay").css({"padding-top":"0%","height":"95vh"}).outerHeight();

    $(".headerIntro").css({
        "paddingTop":0,
        "height":headerHeight,
    });

    $(".header__overlay").css({
        "paddingTop":0,
        "height":overlayHeight,
    });

// scroll animation in headerIntro section
$(window).scroll(function (event) {

$(".headerIntro h2").css("opacity", 1 - $(window).scrollTop() / 180);
$(".headerIntro h1").css("opacity", 1 - $(window).scrollTop() / 290);
$(".headerIntro p").css("opacity", 1 - $(window).scrollTop() / 450);
$(".headerIntro .js-to-Scroll").css("opacity", 1 - $(window).scrollTop() / 550);

var scrollPos = $(this).scrollTop(),
    opacityValHeart = 1-(Math.min(scrollPos/100,2)),
    
    headerHeart = $(".headerIntro .header__title__img__wrapper");
    headerHeart.css({ 'transform' : 'translate(0px, -'+ scrollPos /1 +'%)','opacity': opacityValHeart });
    
    headerFade2 = $(".headerIntro h2"),
    headerFade1 = $(".headerIntro h1"),
    headerFadep = $(".headerIntro p"),
    headerFadesvg = $(".headerIntro .js-to-Scroll");
    headerFade2.css({ 'transform' : 'translate(0px, -'+ scrollPos /0.4 +'%)' });
    headerFade1.css({ 'transform' : 'translate(0px, -'+ scrollPos /4.3 +'%)' });
    headerFadep.css({ 'transform' : 'translate(0px, -'+ scrollPos /2.8 +'%)' });
    headerFadesvg.css({ 'transform' : 'translate(0px, -'+ scrollPos /1.5 +'%)' });

    var alphaVal = 0.2+(Math.min(scrollPos/950,1)),
    rgba = 'rgba(0, 0, 0, ' + alphaVal + ')',
    headerOverlay = $(".header__overlay");

    headerOverlay.css({'backgroundColor': rgba });

});

// css animation for headerIntro section
$(document).ready(function(){

var logo = $(".headerIntro .header__title__img__wrapper")
logo.delay(1000).animate({opacity: '1'}, 600);

var logoheadline = $(".headerIntro h2")
logoheadline.delay(1400).animate({top:'0px', opacity: '1'}, 600);

var headline = $(".headerIntro h1")
headline.delay(1400).animate({top:'0px', opacity: '1'}, 600);

var div = $(".headerIntro .header__title__paragraph")
div.delay(1400).animate({top:'0px', opacity: '1'}, 600); 

var scroll = $(".headerIntro .js-to-Scroll")
scroll.delay(1200).animate({opacity: '1'}, 600);  

  $('.headerIntro').addClass('scaling');


$('html,body').delay(1400).fadeIn( "slow" ,function(){
    $('.headerIntro').css( "transform", "matrix(1, 0, 0, 1, 0, 0)" ).fadeIn(500);
});

});

// smooth scroll to
$('.scroll__icon').on('click', function(e) {
e.preventDefault();
$('html, body').animate({ 
  scrollTop: $(this.hash).offset().top
}, 900);
});
