"use strict";

/*------------------------------------

  HT Predefined Variables

--------------------------------------*/

var $window = $(window),

  $document = $(document),

  $body = $('body'),

  $fullScreen = $('.fullscreen-banner') || $('.section-fullscreen');

  // $halfScreen = $('.halfscreen-banner');



//Check if function exists

$.fn.exists = function () {

  return this.length > 0;

};

/*------------------------------------

  HT FullScreen

--------------------------------------*/

function fullScreen() {

  if ($fullScreen.exists()) {

    $fullScreen.each(function () {

      var $elem = $(this),

        elemHeight = $window.height();

      if ($window.width() < 768) $elem.css('height', elemHeight / 1);

      else $elem.css('height', elemHeight);

    });

  }

 };


/*------------------------------------

  HT Window load and functions

--------------------------------------*/

// $(document).ready(function () {

//   slitslider();

// });



$window.resize(function () {

  fullScreen();

});



/***********************************

project single carasual

**************************************/

$('#Projectcarousel').owlCarousel({

  loop: true,

  autoplay: true,

  autoplayTimeout: 8000,

  slideSpeed: 8000,

  paginationSpeed: 1000,

  scrollPerPage: true,

  margin: 0,

  items: 1,

  nav: false,

  dots: false,

  responsiveClass: true,

  responsive: {

    0: {

        items: 1

    },

    480: {

        items: 1

    },

    991: {

        items: 1

    },

    1200: {

        items: 1

    }

  }

});

/***********************************

project single carasual

**************************************/

$('#relatedProjectcarousel').owlCarousel({

  loop: true,

  autoplay: true,

  autoplayTimeout: 8000,

  slideSpeed: 8000,

  paginationSpeed: 1000,

  scrollPerPage: true,

  margin: 15,

  items: 1,

  nav: false,

  dots: false,

  responsiveClass: true,

  responsive: {

    0: {

        items: 1

    },

    480: {

        items: 1

    },

    991: {

        items: 3

    },

    1200: {

        items: 3

    }

  }

});

/*

scroll top top

*/

$(window).scroll(function() {

    if ($(this).scrollTop() > 20 ) {

        $('.scrolltop:hidden').stop(true, true).fadeIn();

    } else {

        $('.scrolltop').stop(true, true).fadeOut();

    }

});

$(function(){$(".scroll").click(function(){$("html,body").animate({scrollTop:$(".thetop").offset().top},"1000");return false})})



/***********************************

project single carasual

**************************************/

$('#clientSlider').owlCarousel({

  loop: true,

  autoplay: true,

  autoplayTimeout: 8000,

  slideSpeed: 8000,

  paginationSpeed: 1000,

  scrollPerPage: true,

  margin: 15,

  items: 1,

  nav: false,

  dots: false,

  responsiveClass: true,

  responsive: {

    0: {

        items: 1

    },

    480: {

        items: 1

    },

    991: {

        items: 2

    },

    1200: {

        items: 2

    }

  }

});

/*****************************

loader

******************************************/

$(document).ready(function () {

    setTimeout(function () {

        $("#loading").fadeOut("slow");

    }, 2000);



});

