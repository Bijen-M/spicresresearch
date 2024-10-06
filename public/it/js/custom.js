$('#Clientcarousel').owlCarousel({
  loop: false,
  autoplay: true,
  autoplayTimeout: 8000,
  slideSpeed: 8000,
  paginationSpeed: 1000,
  scrollPerPage: true,
  margin: 0,
  items: 1,
  nav: false,
  dots: true,
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
/*
swiper slider
1-13-219
*/
var menu = [];
jQuery('.swiper-slide').each( function(index){
	menu.push( jQuery(this).find('.slide-inner').attr("data-text") );
});
var interleaveOffset = 0.5;
var swiperOptions = {
	loop: true,
	speed: 1000,
	parallax: true,
		autoplay: {
		delay: 4000,
		disableOnInteraction: false,
	  },
	grabCursor: true,
	watchSlidesProgress: true,
	pagination: {
	  el: '.swiper-custom-pagination',
			clickable: true,
			renderBullet: function (index, className) {
		  return '<span class="' + className + '">' + (menu[index]) + '</span>';
		},
	},
	on: {
	progress: function() {
	  var swiper = this;
	  for (var i = 0; i < swiper.slides.length; i++) {
		var slideProgress = swiper.slides[i].progress;
		var innerOffset = swiper.width * interleaveOffset;
		var innerTranslate = slideProgress * innerOffset;
		swiper.slides[i].querySelector(".slide-inner").style.transform =
		  "translate3d(" + innerTranslate + "px, 0, 0)";
	  }      
	},
	touchStart: function() {
	  var swiper = this;
	  for (var i = 0; i < swiper.slides.length; i++) {
		swiper.slides[i].style.transition = "";
	  }
	},
	setTransition: function(speed) {
	  var swiper = this;
	  for (var i = 0; i < swiper.slides.length; i++) {
		swiper.slides[i].style.transition = speed + "ms";
		swiper.slides[i].querySelector(".slide-inner").style.transition =
		  speed + "ms";
	  }
	}
  }
};

var swiper = new Swiper(".swiper-container", swiperOptions);
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


/*
project deatils
*/
$('#Projectcarousel').owlCarousel({
  loop: false,
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
        items: 1
    },
    1200: {
        items: 1
    }
  }
});

/*
project Slider
*/
$('#relatedProject-carousel').owlCarousel({
  loop: false,
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
project deatils
*/
$('#Teamcarousel').owlCarousel({
  loop: false,
  autoplay: true,
  autoplayTimeout: 8000,
  slideSpeed: 8000,
  paginationSpeed: 1000,
  scrollPerPage: true,
  margin:15,
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
        items: 4
    },
    1200: {
        items: 4
    }
  }
});
/*
isotope free plugin
*/
//// ISOTOPE TRIGGER
var $grid = $('.PortfolioContent').isotope({
  itemSelector: '.PortfolioItem',
  stagger: 30
});
$(window).on('load', function(){ $grid.isotope('layout') }); 
$('.filterWork').on( 'click', '.button', function() {
  var filterValue = $(this).attr('data-filter');
  $grid.isotope({ filter: filterValue });
});
// change is-checked class on buttons
$('.buttonGroup').each( function( i, buttonGroup ) {
  var $buttonGroup = $( buttonGroup );
  $buttonGroup.on( 'click', 'a', function() {
    $buttonGroup.find('.is-checked').removeClass('is-checked');
    $( this ).addClass('is-checked');
  });
});

//// MASONRY
$('.PortfolioContent').isotope({
  itemSelector: '.work-caption img',
  masonry: {
    columnWidth: 0
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

  