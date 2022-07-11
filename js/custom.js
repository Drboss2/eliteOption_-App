/* =====================================
All JavaScript fuctions Start
======================================*/

/*--------------------------------------------------------------------------------------------
	document.ready ALL FUNCTION START
---------------------------------------------------------------------------------------------*/
 /* 
	> Top Search bar Show Hide function by = custom.js  		
	> On scroll content animated function by = Viewportchecker.js 	
	> Video responsive function by = custom.js 
	> magnificPopup function	by = magnific-popup.js
	> magnificPopup for video function	by = magnific-popup.js
	> Vertically center Bootstrap modal popup function by = custom.js
	> Main menu sticky on top  when scroll down function by = custom.js
	> page scroll top on button click function by = custom.js	
	> input type file function by = custom.js	 	
	> input Placeholder in IE9 function by = custom.js
    > box height match window height according function by = custom.js 	
	> footer fixed on bottom function by = custom.js	
	> accordion active calss function by = custom.js
	> Top cart list Show Hide function by = custom.js
    > Nav submenu show hide on mobile by = custom.js
	> Home Carousel_1 Full Screen with no margin function by = owl.carousel.js
	> Home Carousel_2 Full Screen with no margin function by = owl.carousel.js
	> home_logo_carousel() function by = owl.carousel.js
    >clouds images moving function by = jquery.bgscroll.js	
	>graph images moving function by = jquery.bgscroll.js	
	>coin images moving function by = jquery.bgscroll.js	

	
 */	

/*--------------------------------------------------------------------------------------------
	window on load ALL FUNCTION START
---------------------------------------------------------------------------------------------*/
 /* 
	 > equal each box 
	 > skills bar function function by  = custom.js 
		2.1 skills bar tooltips
		2.2 skills bar widths
		
	 > Bootstrap Select box function by  = bootstrap-select.min.js 
	 > TouchSpin box function by  = jquery.bootstrap-touchspin.js 
	 > TouchSpin box function by  = jquery.bootstrap-touchspin.js 
	 > masonry function function by = isotope.pkgd.min.js
	 > page loader function by = custom.js
	
 */	

/*--------------------------------------------------------------------------------------------
	Window Scroll ALL FUNCTION START
---------------------------------------------------------------------------------------------*/
 /*
	 > Window on scroll header color fill 
 */
/*--------------------------------------------------------------------------------------------
	Window Resize ALL FUNCTION START
---------------------------------------------------------------------------------------------*/
 
(function ($) {
    'use strict';
	
/*--------------------------------------------------------------------------------------------
	document.ready ALL FUNCTION START
---------------------------------------------------------------------------------------------*/
	
//  > Top Search bar Show Hide function by = custom.js =================== //	
	 function site_search(){
			jQuery('a[href="#search"]').on('click', function(event) {                    
			jQuery('#search').addClass('open');
			jQuery('#search > form > input[type="search"]').focus();
		});
					
		jQuery('#search, #search button.close').on('click keyup', function(event) {
			if (event.target === this || event.target.className === 'close') {
				jQuery(this).removeClass('open');
			}
		});  
	 }	
	 

// > Video responsive function by = custom.js ========================= //	
	function video_responsive(){	  
		jQuery('iframe[src*="youtube.com"]').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');
		jQuery('iframe[src*="vimeo.com"]').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');	
	}  
	
// > magnificPopup function	by = magnific-popup.js =========================== //
	function magnific_popup(){
        jQuery('.mfp-gallery').magnificPopup({
          delegate: '.mfp-link',
          type: 'image',
          tLoading: 'Loading image #%curr%...',
          mainClass: 'mfp-img-mobile',
          gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
          },
          image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
          }
       });
	}

// > magnificPopup for video function	by = magnific-popup.js ===================== //	
	function magnific_video(){	
		jQuery('.mfp-video').magnificPopup({
			type: 'iframe',
		});
	}
		
// Vertically center Bootstrap modal popup function by = custom.js ==============//
	function popup_vertical_center(){	
		jQuery(function() {
			function reposition() {
				var modal = jQuery(this),
				dialog = modal.find('.modal-dialog');
				modal.css('display', 'block');
				
				// Dividing by two centers the modal exactly, but dividing by three 
				// or four works better for larger screens.
				dialog.css("margin-top", Math.max(0, (jQuery(window).height() - dialog.height()) / 2));
			}
			// Reposition when a modal is shown
			jQuery('.modal').on('show.bs.modal', reposition);
			// Reposition when the window is resized
			jQuery(window).on('resize', function() {
				jQuery('.modal:visible').each(reposition);
			});
		});
	}
	
// > Main menu sticky on top  when scroll down function by = custom.js ========== //		
	function sticky_header(){
		if(jQuery('.sticky-header').length){
			var sticky = new Waypoint.Sticky({
			  element: jQuery('.sticky-header')
			})
		}
	}
	
// > page scroll top on button click function by = custom.js ===================== //	
	function scroll_top(){
		jQuery("button.scroltop").on('click', function() {
			jQuery("html, body").animate({
				scrollTop: 0
			}, 1000);
			return false;
		});
	
		jQuery(window).on("scroll", function() {
			var scroll = jQuery(window).scrollTop();
			if (scroll > 900) {
				jQuery("button.scroltop").fadeIn(1000);
			} else {
				jQuery("button.scroltop").fadeOut(1000);
			}
		});
	}

// > input type file function by = custom.js ========================== //	 	 
	function input_type_file_form(){
		jQuery(document).on('change', '.btn-file :file', function() {
			var input = jQuery(this),
				numFiles = input.get(0).files ? input.get(0).files.length : 1,
				label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
			input.trigger('fileselect', [numFiles, label]);
		});
	
		jQuery('.btn-file :file').on('fileselect', function(event, numFiles, label) {
		
			var input = jQuery(this).parents('.input-group').find(':text'),
				log = numFiles > 10 ? numFiles + ' files selected' : label;
		
			if (input.length) {
				input.val(log);
			} else {
				if (log) alert(log);
			}
		
		});	
	}
	
// > input Placeholder in IE9 function by = custom.js ======================== //	
	function placeholderSupport(){
	/* input placeholder for ie9 & ie8 & ie7 */
		jQuery.support.placeholder = ('placeholder' in document.createElement('input'));
		/* input placeholder for ie9 & ie8 & ie7 end*/
		
		/*fix for IE7 and IE8  */
		if (!jQuery.support.placeholder) {
			jQuery("[placeholder]").on('focus', function () {
				if (jQuery(this).val() === jQuery(this).attr("placeholder")) jQuery(this).val("");
			}).blur(function () {
				if (jQuery(this).val() === "") jQuery(this).val(jQuery(this).attr("placeholder"));
			}).blur();
	
			jQuery("[placeholder]").parents("form").on('submit', function () {
				jQuery(this).find('[placeholder]').each(function() {
					if (jQuery(this).val() === jQuery(this).attr("placeholder")) {
						 jQuery(this).val("");
					}
				});
			});
		}
		/*fix for IE7 and IE8 end */
	}	
	
// > box height match window height according function by = custom.js ========= //	
	function set_height() {
		if(jQuery('.demo-wraper').length){
			windowHeight = jQuery(window).innerHeight();
			jQuery('.demo-wraper').css('min-height', windowHeight);
		}
	}
	
// > footer fixed on bottom function by = custom.js ======================== //	
	function footer_fixed() {
	  jQuery('.site-footer').css('display', 'block');
	  jQuery('.site-footer').css('height', 'auto');
	  var footerHeight = jQuery('.site-footer').outerHeight();
	  jQuery('.footer-fixed > .page-wraper').css('padding-bottom', footerHeight);
	  jQuery('.site-footer').css('height', footerHeight);
	}
	
// > accordion active calss function by = custom.js ========================= //	
	function accordion_active() {
		$('.acod-head a').on('click', function() {
			$('.acod-head').removeClass('acc-actives');
			$(this).parents('.acod-head').addClass('acc-actives');
			
			$('.acod-title').removeClass('acc-actives'); //just to make a visual sense
			$(this).parent().addClass('acc-actives'); //just to make a visual sense
			
			($(this).parents('.acod-head').attr('class'));
		 });
	}	

// > Top cart list Show Hide function by = custom.js =================== //	
	 function cart_block(){
		jQuery('.cart-btn').on('click', function () { 
		jQuery( ".cart-dropdown-item-wraper" ).slideToggle( "slow" );
	  });  
	 }
	 
// > Nav submenu show hide on mobile by = custom.js

	 function mobile_nav(){
		jQuery(".sub-menu").parent('li').addClass('has-child');
		jQuery(".mega-menu").parent('li').addClass('has-child');
		jQuery("<div class=' glyphicon glyphicon-plus submenu-toogle'></div>").insertAfter(".has-child > a");
		jQuery('.has-child a+.submenu-toogle').on('click', function(ev) {
			jQuery(this).next(jQuery('.sub-menu')).slideToggle('fast', function(){
				jQuery(this).parent().toggleClass('nav-active');
			});
			ev.stopPropagation();
		});
	 }
	 
// > Home Carousel_1 Full Screen with no margin function by = owl.carousel.js ========================== //
	function home_carousel_1(){
	jQuery('.home-carousel-1').owlCarousel({
        loop:true,
		margin:15,
		nav:false,
		dots: true,
		navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
		responsive:{
			0:{
				items:1
			},
			480:{
				items:1
			},			
			
			767:{
				items:1,
				margin:50
			},
			1000:{
				items:2
			}
		}
		
	});
	}


// > home_logo_carousel() function by = owl.carousel.js ========================== //
	function home_logo_carousel(){
	jQuery('.home-logo-carousel').owlCarousel({
        loop:true,
		autoplay:true,
		margin:0,
		nav:false,
		dots: false,
		navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
		responsive:{
			0:{
				items:2
			},
			480:{
				items:3
			},			
			
			767:{
				items:4
			},
			1000:{
				items:5
			}
		}
		
	});
	}
	
// >clouds images moving function by = jquery.bgscroll.js		
	function clouds_moving(){
		jQuery( function() {			  
	    jQuery('.clouds1').bgscroll({scrollSpeed:50 , direction:'h' });
		});
	}
	
// >graph images moving function by = jquery.bgscroll.js		
	function graph_moving(){
		jQuery( function() {			  
		jQuery('.graph-slide-image').bgscroll({scrollSpeed:20 , direction:'h' });
		});
	}
	
// >coin images moving function by = jquery.bgscroll.js		
	function coin_moving(){
		jQuery( function() {			  
		jQuery('.coin-slide').bgscroll({scrollSpeed:10 , direction:'v' });
		});
	}		



/*--------------------------------------------------------------------------------------------
	Window on load ALL FUNCTION START
---------------------------------------------------------------------------------------------*/

// > equal each box function by  = custom.js =========================== //	 
	function equalheight(container) {
		var currentTallest = 0, 
			currentRowStart = 0, 
			rowDivs = new Array(), 
			$el, topPosition = 0,
			currentDiv = 0;
		
		jQuery(container).each(function() {
			$el = jQuery(this);
			jQuery($el).height('auto');
			var topPostion = $el.position().top;
	
			if (currentRowStart != topPostion) {
				for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
					rowDivs[currentDiv].height(currentTallest);
				}
				rowDivs.length = 0; // empty the array
				currentRowStart = topPostion;
				currentTallest = $el.height();
				rowDivs.push($el);
			} else {
				rowDivs.push($el);
				currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
			}
			for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
				rowDivs[currentDiv].height(currentTallest);
			}
		});
	}

// > On scroll content animated function by = Viewportchecker.js ============= //
	function animate_content(){
		jQuery('.animate').scrolla({
			mobile: false,
			once: true
		});
	}

// > skills bar function function by  = custom.js ========================= //
	/* 2.1 skills bar tooltips*/
	function progress_bar_tooltips() {
		jQuery(function () { 
		  jQuery('[data-toggle="tooltips"]').tooltip({trigger: 'manual'}).tooltip('show');
		});  
	}
  
	/* 2.2 skills bar widths*/
	function progress_bar_width() {	
		jQuery( window ).on('scroll', function() {   
		  jQuery(".progress-bar").each(function(){
			progress_bar_width = jQuery(this).attr('aria-valuenow');
			jQuery(this).width(progress_bar_width + '%');
		  });
		}); 
	}
	
// > Bootstrap Select box function by  = bootstrap-select.min.js =============== // 
	function select_box_form() {	
		jQuery('.selectpicker').selectpicker()
	}
	
// > TouchSpin box function by  = jquery.bootstrap-touchspin.js =============== //
	function input_number_form() {	 
		jQuery("input[name='demo3']").TouchSpin()
	}
	
// > TouchSpin box function by  = jquery.bootstrap-touchspin.js =============== // 
	function input_number_vertical_form() {	
		jQuery("input[name='demo_vertical2']").TouchSpin({
		  verticalbuttons: true,
		  verticalupclass: 'glyphicon glyphicon-plus',
		  verticaldownclass: 'glyphicon glyphicon-minus'
		})	
	}
	
// > masonry function function by = isotope.pkgd.min.js ========================= //	
	function masonryBox() {
        if ( jQuery().isotope ) {      
		     
            var $container = jQuery('.portfolio-wrap');
                $container.isotope({
                    itemSelector: '.masonry-item',
                    transitionDuration: '1s',
					originLeft: true
                });

            jQuery('.masonry-filter li').on('click',function() {                           
                var selector = jQuery(this).find("a").attr('data-filter');
                jQuery('.masonry-filter li').removeClass('active');
                jQuery(this).addClass('active');
                $container.isotope({ filter: selector });
                return false;
            });

    	};
	}	
	
// > background image parallax function by = stellar.js ==================== //	
	function bg_image_stellar(){
		jQuery(function(){
				jQuery.stellar({
					horizontalScrolling: false,
					verticalOffset:100
				});
			});			
	}	
	
// > page loader function by = custom.js ========================= //		
	function page_loader() {
		$('.loading-area').fadeOut(1000)
	};

/*--------------------------------------------------------------------------------------------
    Window on scroll ALL FUNCTION START
---------------------------------------------------------------------------------------------*/
    function color_fill_header() {
        var scroll = $(window).scrollTop();
        if(scroll >= 100) {
            $(".is-fixed").addClass("color-fill");
        } else {
            $(".is-fixed").removeClass("color-fill");
        }
    };	
	
/*--------------------------------------------------------------------------------------------
	document.ready ALL FUNCTION START
---------------------------------------------------------------------------------------------*/

	jQuery(document).ready(function() {
	
	// > Top Search bar Show Hide function by = custom.js  		
		site_search(),
		
	// > Video responsive function by = custom.js 
		video_responsive(),
	
	// > magnificPopup function	by = magnific-popup.js
		magnific_popup(),
		
	// > magnificPopup for video function	by = magnific-popup.js
		magnific_video(),
		
	// > Vertically center Bootstrap modal popup function by = custom.js
		popup_vertical_center();
		
	// > Main menu sticky on top  when scroll down function by = custom.js		
		sticky_header(),
	
	// > page scroll top on button click function by = custom.js	
		scroll_top(),
		
	// > input type file function by = custom.js	 	
		input_type_file_form(),
	
	// > input Placeholder in IE9 function by = custom.js		
		placeholderSupport(),
		
	//	> box height match window height according function by = custom.js
		set_height(),
	
	// > footer fixed on bottom function by = custom.js	
		footer_fixed(),
		
	// > accordion active calss function by = custom.js ========================= //			
		accordion_active(),
		
	// > Top cart list Show Hide function by = custom.js =================== //		
		cart_block(),

	// > Nav submenu on off function by = custome.js ===================//
		mobile_nav(),
		
	// > Home Carousel_1 Full Screen with no margin function by = owl.carousel.js
	    home_carousel_1(),
		
	// > our_pricing_carousel_1  function by = owl.carousel.js
	    home_logo_carousel(),
		
	// >clouds images moving function by = jquery.bgscroll.js	
		clouds_moving(),
		
	// >graph images moving function by = jquery.bgscroll.js	
	    graph_moving(),
		
	// >coin images moving function by = jquery.bgscroll.js	
		coin_moving()
			
		 		
	}); 
	
	
/*--------------------------------------------------------------------------------------------
	Window Load START
---------------------------------------------------------------------------------------------*/
	jQuery(window).on('load', function () {
	
	// > equal each box function by  = custom.js			
		equalheight(".equal-wraper .equal-col"),
		
	// > On scroll content animated function by = Viewportchecker.js	
		animate_content(),
		
	// > skills bar function function by  = custom.js			
		progress_bar_tooltips(),
		
	// > skills bar function function by  = custom.js		
		progress_bar_width(),

	// > On scroll content animated function by = Viewportchecker.js 			
		select_box_form(),
		
	// > TouchSpin box function by  = jquery.bootstrap-touchspin.js		
		input_number_form(),
		
	// > TouchSpin box function by  = jquery.bootstrap-touchspin.js		
		input_number_vertical_form(),
		
	// > box height match window height according function by = custom.js		
		set_height(),
		
	// > masonry function function by = isotope.pkgd.min.js		
		masonryBox(),
		
	// > background image parallax function by = stellar.js	
		bg_image_stellar(),
		
	// > page loader function by = custom.js		
		page_loader() 

});


 /*===========================
	Window Scroll ALL FUNCTION START
===========================*/

	jQuery(window).on('scroll', function () {
		
	// > Window on scroll header color fill 
		color_fill_header()
		
	});


 /*===========================
	Window Resize ALL FUNCTION START
===========================*/
	jQuery(window).on('resize', function () {
	 
	// > footer fixed on bottom function by = custom.js		 
	 	footer_fixed(),
	// > box height match window height according function by = custom.js
	 	set_height()

	});
	
	
/*===========================
	Document on  Submit FUNCTION START
===========================*/

	// > Contact form (for contact us pages) function by = custom.js	
	jQuery(document).on('submit', 'form.cons-contact-form2', function(e){
		e.preventDefault();
		var form = jQuery(this);
	
		/* sending message */
		jQuery.ajax({
			url: 'http://thewebmax.com/bitinvest/form-handler.php',
			data: form.serialize() + "&action=contactform",
			type: 'POST',
			dataType: 'JSON',
			beforeSend: function() {
				jQuery('.loading-area').show();
			},
			success:function(data){
				jQuery('.loading-area').hide();
				if(data['success']){
				jQuery("<div class='alert alert-success'>"+data['message']+"</div>").insertBefore('form.cons-contact-form2');
				}else{
				jQuery("<div class='alert alert-danger'>"+data['message']+"</div>").insertBefore('form.cons-contact-form2');	
				}
			}
		});
		return false;
	});	
	
	// > Contact form (for home pages) function by = custom.js	
	jQuery(document).on('submit', 'form.cons-contact-form', function(e){
		e.preventDefault();
		var form = jQuery(this);
	
		/* sending message */
		jQuery.ajax({
			url: 'http://thewebmax.com/bitinvest/form-handler2.php',
			data: form.serialize() + "&action=contactform",
			type: 'POST',
			dataType: 'JSON',
			beforeSend: function() {
				jQuery('.loading-area').show();
			},
			success:function(data){
				jQuery('.loading-area').hide();
				if(data['success']){
				jQuery("<div class='alert alert-success'>"+data['message']+"</div>").insertBefore('form.cons-contact-form');
				}else{
				jQuery("<div class='alert alert-danger'>"+data['message']+"</div>").insertBefore('form.cons-contact-form');	
				}
			}
		});
		return false;
	});	
/*===========================
	Document on  Submit FUNCTION END
===========================*/	
	
	
})(window.jQuery);