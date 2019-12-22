(function ($) {
	"use strict";

	$(document).ready(function(){


		var magnificPopup = $.magnificPopup.instance;

		$('body').on('click', '#photo-prev', function() {
		    magnificPopup.prev();
		});


		$('body').on('click', '#photo-next', function() {
		    magnificPopup.next();
		});


		
		var mixer = mixitup('.ms-advance-portfolio');
		
		

		 var owl = $(".light-box .owl-carousel");

			owl.owlCarousel({
			 	items: 1,
			 	loop: true,
			 	autoplay: true,
			 	autoplayTimeout: 5000,
			 	dotsEach: true,
			 });


		// Go to the next item
		$('.portfolio_incicator_button .customNextBtn').click(function() {
		    owl.trigger('next.owl.carousel');
		})
		// Go to the previous item
		$('.portfolio_incicator_button .customPrevBtn').click(function() {
		    // With optional speed parameter
		    // Parameters has to be in square bracket '[]'
		    owl.trigger('prev.owl.carousel', [300]);
		})

		



		 $('.open-popup-link').click(function(){
		 	$('.white-popup').show(function(){

		 		$('.mfp-close').click(function(){

		 			$('.tottal_popup_slider').hide();

		 			 location.reload(true);
		 		});

		 	});

		 $('.mk-post-nav').show();


		 });

		

		


		 $('.share-button').click(function(){

		 	$('.social-share-icons ul').toggle();

		 });






		  $('.open-popup-link').magnificPopup({
	  			type:'inline',
  				midClick: true,
  				gallery: {
				  enabled: true, // set to true to enable gallery

				  preload: [0,2], // read about this option in next Lazy-loading section

				  navigateByImgClick: true,

				 arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button

				 tPrev: 'Previous (Left arrow key)', // title for left button
				 tNext: 'Next (Right arrow key)', // title for right button
				  tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
				},
				
  				
			});





		 	
			
	});






}(jQuery));