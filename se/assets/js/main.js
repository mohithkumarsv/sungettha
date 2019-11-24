$(window).on("load", function() {
	
	"use strict";
		   
	var comingSoonTimer = $('#coming-soon-timer');
	var fancyboxIframe = $('.fancybox-iframe');
    var mixItUp = $('#mixItUp');
	var scrollTop = $('#scroll-top');
	var bodyScroll = $('html, body');	


		if($('.preloader').length) {	 
		 $('.preloader').addClass('loaderout');
	    }
         
	
	if($('.fancybox').length) {
		 $('.fancybox').fancybox();
	}

 	if($('#faq').length){   
		$('#faq').accordion();
	}
	
	initMap();

	owlCarouselInit();  	
	if(comingSoonTimer.length){
		comingsoonInt();
	}
	
	var searchOpen = $('#search-open');
	var headSearchClick = $('.search-click');
	var headSearchClickDismis = $('.search-close');
		headSearchClick.on('click',function(e){
			
			e.preventDefault();
			searchOpen.addClass('searchopen');
		});
		headSearchClickDismis.on('click',function(e){
			e.preventDefault();
			searchOpen.removeClass('searchopen');
		});	

	if (scrollTop.length) {
		scrollTop.on('click',function(){
			  bodyScroll.animate({
						scrollTop: 0
				},
				2000);
		});
		
		$(window).on('scroll',function() {

			if ($(this).scrollTop()>500){
				scrollTop.addClass('showScrollTop');
			 }else{
			  scrollTop.removeClass('showScrollTop');
			 }
		 });
	}
		
		var headerSticky = $( "#header" );
		if ( headerSticky.length ) {	
			$(window).on('scroll',function() {

			if ($(this).scrollTop()>10){
				headerSticky.addClass('sticky-header');
			 }else{
			  headerSticky.removeClass('sticky-header');
			 }
		 });
		}
			

    if (mixItUp.length) {
        mixItUp.mixItUp();
    }
/* 	var images=[];
	$.ajax({
		type: "GET",
		url: 'http://192.168.1.102:90/solar/api/getImageList',
		dataType: "json",
		async:false,
		contentType : "application/json",
		success: function(response){
			images=response.data
			console.log("images",images);
			 if(images.length){
             createGallery(images)
			}else{
				$('#gallery').append('No images');	
			}
 
		},error:function(response){
		  console.log("error response==>",response);
		}		
	  }); */
});

	

function owlCarouselInit() {
	
	"use strict";	
			
	// var mainSlider = $('#main-slider');
	var portfolioSlider = $('#portfolio-slider');	
	var photographySlider = $('#photography-slider');	
	var partnerSlider = $('#partner-slider');	
	var sidebarSlider = $('#sidebar-slider');	
	var nextNav = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
	var prevNav = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
	
		// if(mainSlider.length) {	
		//  mainSlider.owlCarousel({
		// 		loop:true,
		// 		margin:0,
		// 		nav:false,
		// 		navText:[prevNav,nextNav],
		// 		dots:true,
		// 		autoplay:true,
		// 		mouseDrag:true,
		// 		responsive:{
		// 			0:{
		// 				items:1
		// 			},
		// 			600:{
		// 				items:1
		// 			},
		// 			1000:{
		// 				items:1
		// 			}
		// 		}
		// 	});
		// }
		
		// if(portfolioSlider.length) {	
		//  portfolioSlider.owlCarousel({
		// 		loop:true,
		// 		margin:0,
		// 		nav:true,
		// 		navText:[prevNav,nextNav],
		// 		dots:false,
		// 		autoplay:false,
		// 		responsive:{
		// 			0:{
		// 				items:1
		// 			},
		// 			600:{
		// 				items:2
		// 			},
		// 			1000:{
		// 				items:4
		// 			}
		// 		}
		// 	});
		// }
		// if(photographySlider.length) {	
		//  photographySlider.owlCarousel({
		// 		loop:true,
		// 		margin:0,
		// 		nav:false,
		// 		navText:[prevNav,nextNav],
		// 		dots:true,
		// 		autoplay:false,
		// 		responsive:{
		// 			0:{
		// 				items:1
		// 			},
		// 			600:{
		// 				items:2
		// 			},
		// 			1000:{
		// 				items:3
		// 			}
		// 		}
		// 	});
		// }
		// if(partnerSlider.length) {	
		//  partnerSlider.owlCarousel({
		// 		loop:true,
		// 		margin:0,
		// 		nav:true,
		// 		navText:[prevNav,nextNav],
		// 		dots:false,
		// 		autoplay:false,
		// 		responsive:{
		// 			0:{
		// 				items:1
		// 			},
		// 			600:{
		// 				items:3
		// 			},
		// 			1000:{
		// 				items:4
		// 			}
		// 		}
		// 	});
		// }
		// if(sidebarSlider.length) {	
		//  sidebarSlider.owlCarousel({
		// 		loop:true,
		// 		margin:0,
		// 		nav:true,
		// 		navText:[prevNav,nextNav],
		// 		dots:false,
		// 		autoplay:false,
		// 		responsive:{
		// 			0:{
		// 				items:1
		// 			},
		// 			600:{
		// 				items:1
		// 			},
		// 			1000:{
		// 				items:1
		// 			}
		// 		}
		// 	});
		// }
		

}

function initMap() {
    "use strict";

    var mapDiv = $('#gmap_canvas');

    if (mapDiv.length) {
        var myOptions = {
            zoom: 5,
            scrollwheel: false,
            draggable: true,
			//backgroundColor:grey,
            center: new google.maps.LatLng(12.8877267, 77.5795196),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
        var marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(12.8877267, 77.5795196)
        });
        var infowindow = new google.maps.InfoWindow({
            content: '<strong>ITGEEkS</strong>'
        });
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
        });

        infowindow.open(map, marker);
		
    }

}			


/*
*****************************************************
*	END OF THE JS 									*
*	DOCUMENT                       					*
*****************************************************
*/