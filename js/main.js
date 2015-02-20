/*

WINTERED TEMPLATE  V1.0 BY SUPVIEW.BE


00. PARALLAX SETTING
01. NAVBAR STICKY + SELECTED
02. SMOOTH SCROLLING OF NAV BAR
03. HEADER + H2 TEXT
04. INTERSECTION ( TESTIMONIAL )
05. WORKS SLIDER EXEMPLE
06. CLIENTS INTERSECTION SLIDER
07. PROCESS SLIDER
08. RESPONSIVE MENU
09. ANNIMATIONS MAKE IT APPEAR
10. LOADING PAGE

*/



$(document).ready(function () {


/*-----------------------------------------------------------------------------------*/
/*	00. PARALLAX SETTING
/*-----------------------------------------------------------------------------------*/

  
  mediaCheck({
    media: '(max-width: 768px)',
    entry: function() {
    
      // NONE FOR DISABLE PARALLAX SCROLLING IN SMARTHPHONES & TABLET
      
    },
    exit: function() {
      
        //.parallax(xPosition, speedFactor, outerHeight) options:
        //xPosition - Horizontal position of the element
        //inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
        //outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
        $('#cbp-bislideshow li').parallax("center", -0.6, true);
        $('#intersection').parallax("center", 0.4, true);
        $('#client').parallax("center",0.3, true);
        $('#contact_intersection').parallax("center", 0.2, true);
            
    }
  });





/*-----------------------------------------------------------------------------------*/
/*	01. NAVBAR STICKY + SELECTED
/*-----------------------------------------------------------------------------------*/
	


var cbpAnimatedHeader = (function() {

	var docElem = document.documentElement,
		header = document.querySelector( '.cbp-af-header' ),
		didScroll = false,
		changeHeaderOn = 250;

	function init() {
		window.addEventListener( 'scroll', function( event ) {
			if( !didScroll ) {
				didScroll = true;
				setTimeout( scrollPage, 100 );
			}
		}, false );
	}

	function scrollPage() {
		var sy = scrollY();
		if ( sy >= changeHeaderOn ) {
			classie.add( header, 'cbp-af-header-shrink' );
		}
		else {
			classie.remove( header, 'cbp-af-header-shrink' );
		}
		didScroll = false;
	}

	function scrollY() {
		return window.pageYOffset || docElem.scrollTop;
	}

	init();

})();

	var sections = $("section");
	var navigation_links = $("nav a");
	
	sections.waypoint({
		handler: function(event, direction) {
		
			var active_section;
			active_section = $(this);
			if (direction === "up") active_section = active_section.prev();

			var active_link = $('nav a[href="#' + active_section.attr("id") + '"]');
			navigation_links.removeClass("selected");
			active_link.addClass("selected");

		},
		offset: '30%'
	});
	

/*-----------------------------------------------------------------------------------*/
/*	02. SMOOTH SCROLLING OF NAV BAR
/*-----------------------------------------------------------------------------------*/
	

$('.goto').click(function(e){
    $('html,body').scrollTo(this.hash,this.hash);
    e.preventDefault();
});



/*-----------------------------------------------------------------------------------*/
/*	03. HEADER + H2 TEXT
/*-----------------------------------------------------------------------------------*/



$(function () {
    cbpBGSlideshow.init();
});




    setTimeout(function () {
        $(".Impressions.First").removeClass("hidden").animate({
            opacity: "1"
        }, 500)
    }, 500);
/*
    setTimeout(function () {
        $(".Impressions.First").animate({
            opacity: "0"
        }, 500);

        setTimeout(function () {
            $(".Impressions.First").addClass("hidden")
        }, 500);

        $(".Impressions.Second").removeClass("hidden").animate({
            opacity: "1"
        }, 1500)
    }, 6000);

    setTimeout(function () {
        $(".Impressions.Second").animate({
            opacity: "0"
        }, 500);
        setTimeout(function () {
            $(".Impressions.Second").addClass("hidden")
        }, 500);
        $(".Impressions.Third").removeClass("hidden").animate({
            opacity: "1"
        }, 1500)
    }, 9000);
    setTimeout(function () {
        $(".Impressions.Third").animate({
            opacity: "0"
        }, 500);
        setTimeout(function () {
            $(".Impressions.Third").addClass("hidden")
        }, 500);

        $(".Impressions.Last").removeClass("hidden").addClass("active").animate({
            opacity: "1"
        }, 1500)
    }, 12000);
*/


/*-----------------------------------------------------------------------------------*/
/*	04. INTERSECTION ( TESTIMONIAL ) 
/*-----------------------------------------------------------------------------------*/


    $("#testimonial").owlCarousel({
        autoPlay: true,
        stopOnHover: true,
        navigation: false,
        paginationSpeed: 1000,
        goToFirstSpeed: 2000,
        singleItem: true,
        autoHeight: true,
        transitionStyle: "fade"
    });



/*-----------------------------------------------------------------------------------*/
/*	05. WORKS SLIDER EXEMPLE 
/*-----------------------------------------------------------------------------------*/


    $(".exemple_slider").owlCarousel({
        autoPlay: true,
        stopOnHover: true,
        navigation: false,
        paginationSpeed: 1000,
        goToFirstSpeed: 2000,
        singleItem: true,
        autoHeight: true,
        transitionStyle: "fade"
    });




/*-----------------------------------------------------------------------------------*/
/*	06. CLIENTS INTERSECTION SLIDER
/*-----------------------------------------------------------------------------------*/


    $("#clients").owlCarousel({
        autoPlay: true,
        stopOnHover: true,
        navigation: false,
        paginationSpeed: 1000,
        goToFirstSpeed: 2000,
        singleItem: false,
        autoHeight: true,
        transitionStyle: "fade"
    });


/*-----------------------------------------------------------------------------------*/
/*	07. PROCESS SLIDER
/*-----------------------------------------------------------------------------------*/

    $('#process-slider').liquidSlider({
        autoHeight: true,
        slideEaseFunction: 'animate.css',
        slideEaseDuration: 500,
        heightEaseDuration: 500,
        animateIn: "fadeInDown",
        animateOut: "fadeOutUp",

    })


/*-----------------------------------------------------------------------------------*/
/*	08. RESPONSIVE MENU
/*-----------------------------------------------------------------------------------*/


jQuery("#collapse").hide();
jQuery("#collapse-menu").on("click", function () {

    jQuery("#collapse").slideToggle(300);
    return false;

}, function () {

    jQuery("#collapse").slideToggle(300);
    return false;
});



/*-----------------------------------------------------------------------------------*/
/*	09. ANNIMATIONS MAKE IT APPEAR
/*-----------------------------------------------------------------------------------*/



  $('.make-it-appear-top').waypoint(function(direction) {
      $(this).addClass('animated fadeInDown');
    }, {
      offset: '80%'
  });

  $('.make-it-appear-left').waypoint(function(direction) {
      $(this).addClass('animated fadeInLeft');
    }, {
      offset: '80%'
  });

  $('.make-it-appear-right').waypoint(function(direction) {
      $(this).addClass('animated fadeInRight');
    }, {
      offset: '80%'
  });

  $('.make-it-appear-bottom').waypoint(function(direction) {
      $(this).addClass('animated fadeInUp');
    }, {
      offset: '80%'
  });

  $('.bounce').waypoint(function(direction) {
      $(this).addClass('animated bounce');
    }, {
      offset: '70%'
  });

  $('.pulse').waypoint(function(direction) {
      $(this).addClass('animated pulse');
    }, {
      offset: '50%'
  });


});


/*-----------------------------------------------------------------------------------*/
/*	10. LOADING PAGE
/*-----------------------------------------------------------------------------------*/



$(window).load(function() {
        // will first fade out the loading animation
    jQuery("#loading-animation").fadeOut();
	        // will fade out the whole DIV that covers the website.
    jQuery("#preloader").delay(600).fadeOut("slow");
  
    
});


