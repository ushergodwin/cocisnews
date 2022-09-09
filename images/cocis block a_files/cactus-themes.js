// JavaScript Document
jQuery(document).ready(function(e) {
	var check_rtl = false; 
	if (jQuery('body').hasClass('rtl')) {
		check_rtl = true;
	}

	var woo_cart_update_buttons = function(){
		jQuery( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).addClass( 'buttons_added' ).append( '<input type="button" value="+" id="add1" class="plus" />' ).prepend( '<input type="button" value="-" id="minus1" class="minus" />' );
		jQuery('.buttons_added #minus1').click(function(e) {
			var inputquantity = jQuery('.input-text.qty', jQuery(this).parent());
			var value = parseInt(inputquantity.val()) - 1;
			if(value > 0){
				inputquantity.val(value);
				jQuery('.woocommerce-cart table.cart input[name="update_cart"]').prop("disabled", false)
			}
		});
		jQuery('.buttons_added #add1').click(function(e) {
			var inputquantity = jQuery('.input-text.qty', jQuery(this).parent());
			var value = parseInt(inputquantity.val()) + 1;
			inputquantity.val(value);
			jQuery('.woocommerce-cart table.cart input[name="update_cart"]').prop("disabled", false)
		});
	}
	
	woo_cart_update_buttons();
	
	jQuery( document.body ).on('updated_wc_div', function(){
		woo_cart_update_buttons();
	});

	jQuery('.lang_sel_sel.icl-en').click(function(e) {
		if(jQuery(window).width()<767){
			if(jQuery('#lang_sel_click ul li ul').css('visibility') == 'visible'){ 
			   jQuery('#lang_sel_click ul li ul').css('display','hidden');
			} else { 
			   jQuery('#lang_sel_click ul li ul').css('display','visible');
			}
		};
	});	
	jQuery('textarea#comment').focus(function(){
		jQuery('.cm-form-info').addClass('cm_show');
		jQuery('p.form-submit').addClass('form_heig');
	});	
	jQuery('#uni-project').change(function() {
		var link = jQuery('#uni-project option:selected').val()
		if(link !=undefined){
			window.location.href= link;
		}
	});
	//Submenu
	jQuery('.menu-item-has-children.parent a').click(function(e) {
		var get_att = jQuery( this ).attr('href');
		if (get_att == '#' ){
			jQuery(this).removeAttr('href', '#');
		}
    });
	jQuery('.menu-item-has-children.parent').click(function(e) {
		jQuery('.menu-item-has-children.parent').removeClass('show_submenu');
		jQuery('.menu-item-has-children.parent .sub-menu').removeClass('show_sub_menu');
		jQuery(this).addClass('show_submenu');
		jQuery('.menu-item-has-children.parent.show_submenu .sub-menu').addClass('show_sub_menu');
    });
	//carousel
	jQuery(".is-carousel").each(function(){
		var carousel_id = jQuery(this).attr('id');
		var auto_play = (jQuery(this).data('autoplay')) ? true : false;
		var auto_play_time = jQuery(this).data('autoplay');
		var items = jQuery(this).data('items');
		var navigation = jQuery(this).data('navigation');
		if(jQuery(this).hasClass('single-carousel')){ //single style
			jQuery(this).addClass('owl-carousel');
			jQuery(this).owlCarousel({
				items: 1,
				autoplay:auto_play,
				autoplayTimeout: auto_play_time,
				rtl: check_rtl,
				loop: true,
				nav: navigation?true:false,
				navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
			});
		}else{
			jQuery(this).addClass('owl-carousel');
			jQuery(this).owlCarousel({
				autoplay:auto_play,
				autoplayTimeout: auto_play_time,
				items: items?items:4,
				loop: true,
				rtl: check_rtl,
				nav: navigation?true:false,
				navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
				responsive:{
			        0:{
			            items:1
			        },
			        768:{
			            items:items?(items>=2?2:1):2
			        },
			        992: {
			        	items:items?items:4
			        }
			    }
			});
		}
	});
	//grid or carousel
	if(jQuery(window).width()<977){
		jQuery(".grid-listing").addClass('owl-carousel');
		jQuery(".grid-listing").owlCarousel({ 
			rtl: check_rtl,
		    loop:true,
		    responsive:{
		        0:{
		            items:1
		        },
		        768:{
		            items:2
		        }
		    }
		});
	}
	
	//Countdown
	jQuery('[data-countdown]').each(function() {
		var $this = jQuery(this), finalDate = jQuery(this).data('countdown');
		var day_label = $this.data('daylabel');
		var hour_label = $this.data('hourlabel');
		var minute_label = $this.data('minutelabel');
		var second_label = $this.data('secondlabel');
		var show_second = $this.data('showsecond');
		$this.countdown(finalDate, function(event) {
			$this.html(event.strftime(''
				+ '<span class="countdown-block"><span class="countdown-number main-color-1-bg dark-div minion">%D</span><span class="countdown-label main-color-1">'+day_label+'</span></span>'
				+ '<span class="countdown-block"><span class="countdown-number main-color-1-bg dark-div minion">%H</span><span class="countdown-label main-color-1">'+hour_label+'</span></span>'
				+ '<span class="countdown-block"><span class="countdown-number main-color-1-bg dark-div minion">%M</span><span class="countdown-label main-color-1">'+minute_label+'</span></span>'
				+ (show_second?'<span class="countdown-block"><span class="countdown-number main-color-1-bg dark-div minion">%S</span><span class="countdown-label main-color-1">'+second_label+'</span></span>':'')
			));
		});
	});
	if(jQuery('.colorbox-grid').length){
		jQuery('.colorbox-grid').colorbox({
			rel: function(){
				return jQuery(this).data('rel');
			},
			inline:true,
			href: function(){
				if(jQuery(this).data('isgallery')){
					return jQuery(this).data('content')+' .popup-data-gallery';
				}else{
					return jQuery(this).data('content')+' .popup-data:not(.popup-data-gallery)';
				}
			},
			top: 110,
			width: 690,
			responsive: true,
			onOpen: function(){
				jQuery('body').addClass('popup-active');
			},
			onClosed: function(){
				jQuery('body').removeClass('popup-active');
			},
			previous: '<i class="fa fa-chevron-left"></i>',
			next: '<i class="fa fa-chevron-right"></i>',
			close: '<i class="fa fa-times"></i>',
		});
	}
	
	if(jQuery('.colorbox-video-banner').length){
		jQuery('.colorbox-video-banner').colorbox({
			inline:true,
			arrowKey: false,
			href: function(){
				if(jQuery(this).data('isgallery')){
					return jQuery(this).data('content')+' .popup-data-gallery';
				}else{
					return jQuery(this).data('content')+' .popup-data:not(.popup-data-gallery)';
				}
			},
			innerWidth:853,
			innerHeight:480,
			responsive: true,
			onOpen: function(){
				jQuery('body').addClass('popup-active');
			},
			onClosed: function(){
				jQuery('body').removeClass('popup-active');
			},
			close: '<i class="fa fa-times"></i>',
		});
	}
	//smooth scroll anchor
	jQuery('a[href*="#"]:not([href="#"]):not(.cf)').click(function() {
		if(jQuery(this).hasClass('featured-tab') || jQuery(this).hasClass('popup-gallery-comment') || jQuery(this).parents('ul').hasClass('tabs') || jQuery(this).hasClass('comment-reply-link') || jQuery(this).hasClass('ui-tabs-anchor') || jQuery(this).data('vc-container') || jQuery(this).parents('div').hasClass('wpb_tour_next_prev_nav')){
			return true;
		}else if(location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
			|| location.hostname == this.hostname) {
			var target = jQuery(this.hash);
			target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
			   if (target.length) {
				jQuery('html,body,#body-wrap').animate({
					 scrollTop: target.offset().top - 50
				}, 660);
				return true;
			}
		}
	});
	jQuery('.wpb_accordion_header a').click(function() {
		thisa = jQuery(this);
		   setTimeout(function(){ 
			 jQuery('html,body,#body-wrap').animate({
			   scrollTop: thisa.offset().top - 120
			 }, 660);
		   }, 400);      
		return true;
	});
	
	//search toggle focus
	jQuery('#nav-search').on('shown.bs.collapse', function () {
		jQuery('#nav-search .search-field').focus();
	});
	jQuery(document).mouseup(function(e){
		var container = jQuery("#nav-search");
		if (!container.is(e.target) && container.has(e.target).length === 0){
			jQuery('#nav-search.in').collapse('hide');
		}
	});
	
	//mobile menu
	jQuery('.mobile-menu-toggle').click(function(e) {
        jQuery('body').toggleClass('enable-mobile-menu');
		jQuery('body').removeClass('scroll-mobile-menu');
    });
	jQuery('.mobile-menu').scroll(function(e) {
        jQuery('body').addClass('scroll-mobile-menu');
    });
	
	//paralax
	var $window = jQuery(window);
	jQuery('.pc .u_paralax .wpb_row, .pc .is-paralax').each(function(){
		var $bgobj = jQuery(this); // assigning the object
		var yPos = -( ($window.scrollTop()-$bgobj.offset().top) / 5);
		var coords = 'background-position: 50% '+ yPos + 'px !important; transition: none;';
		$bgobj.attr('style', coords);
		
		jQuery(window).scroll(function() {
			var yPos = -( ($window.scrollTop()-$bgobj.offset().top) / 5);
			// Put together our final background position
			var coords = 'background-position: 50% '+ yPos + 'px !important; transition: none;';
			// Move the background
			$bgobj.attr('style', coords);
		});
	});
	
	//animation delay
	jQuery('.wpb_animate_when_almost_visible').each(function(index, element) {
		var delay = jQuery(this).data('delay');
        if(delay){
			var delay_css = 'transition-delay: '+delay+'s; -webkit-transition-delay: '+delay+'s; -moz-transition-delay: '+delay+'s; animation-delay: '+delay+'s; -webkit-animation-delay: '+delay+'s; -moz-animation-delay: '+delay+'s;';
			jQuery(this).attr('style',delay_css);
		}
    });
	
	//iOS fix
	jQuery('.event-item').bind('touchstart', function(e) {
		if(!jQuery(this).hasClass('hover_effect')){
			e.preventDefault();
			jQuery('.event-item').removeClass('hover_effect');
			jQuery(this).toggleClass('hover_effect');
		}
    });
	jQuery('.event-item.hover_effect').bind('touchstart', function(e) {
        return true;
    });

});//document ready

jQuery(window).resize(function(e) {
	if(jQuery(window).width()<977){
		jQuery(".grid-listing").each(function(index, element) {
			if(!jQuery(this).hasClass('owl-loaded')){
				jQuery(this).addClass('owl-carousel');
				jQuery(this).owlCarousel({ 
					rtl:check_rtl,
				    loop:true,
				    responsive:{
				        0:{
				            items:1
				        },
				        768:{
				            items:2
				        }
				    }
				});
			}
		});
	}else{
		jQuery(".grid-listing").each(function(index, element) {
            if(jQuery(this).hasClass('owl-loaded')){
				var owl = jQuery(this).data('owlCarousel');
				jQuery(this).removeClass('owl-carousel');
				jQuery(this).trigger('destroy.owl.carousel');
			}
        });
	}
});

//Post scroller
jQuery(document).ready(function(e) {
	jQuery('.post-scroller-carousel').each(function(){
		//init
		var this_scroller = jQuery(this);
		var this_scroller_inner = jQuery('.post-scroller-carousel-inner',this_scroller);
        
        var bottom_count = 0;
		//calculate
		var scroller_height = this_scroller.outerHeight(true);
		var scroller_list_height = this_scroller_inner.outerHeight(true);
		var scroller_distance = 0;
		
		//action
		jQuery('.post-scroller-item:first-child',this_scroller).addClass('active');
		
		jQuery(document).on('click',this_scroller.data('next'),function(){
            var scroller = jQuery(this).parent().parent().prev();
            var scroller_inner = jQuery('.post-scroller-carousel-inner',scroller);
			scroller_height = scroller.outerHeight(true);
			scroller_list_height = scroller_inner.outerHeight(true);
			active_scroller_item = jQuery('.post-scroller-item.active',scroller);
			if(active_scroller_item.next().length && scroller_distance < (scroller_list_height-scroller_height)){
				active_scroller_item.next().addClass('active')
				active_scroller_item.removeClass('active');
			}
			active_scroller_item = jQuery('.post-scroller-item.active',scroller);
			//scroller_distance += active_scroller_item.outerHeight();
			scroller_distance = 0
			active_scroller_item.prevAll().each(function() {
                scroller_distance += scroller.outerHeight(true);
            });
			if(scroller_distance >= (scroller_list_height-scroller_height)){
				scroller_distance=scroller_list_height-scroller_height;
				//back to top
				/*
				bottom_count++;
				if(bottom_count>2){
					bottom_count = 0;
					scroller_distance = 0;
					active_scroller_item.removeClass('active');
					jQuery('.post-scroller-item:first-child',scroller).addClass('active');
				}*/
			}
			scroller_inner.css({
				'transform': 'translate3d(0px, -'+scroller_distance+'px, 0px)',
				'-webkit-transform': 'translate3d(0px, -'+scroller_distance+'px, 0px)',
				'-ms-transform': 'translateY(-'+scroller_distance+'px)',
			});
			return false;
		});
		jQuery(document).on('click',this_scroller.data('prev'),function(){
            var scroller = jQuery(this).parent().parent().prev();
            var scroller_inner = jQuery('.post-scroller-carousel-inner',scroller);
			scroller_height = scroller.outerHeight(true);
			scroller_list_height = scroller_inner.outerHeight(true);
			active_scroller_item = jQuery('.post-scroller-item.active',scroller);
			if(active_scroller_item.prev().length){
				active_scroller_item.prev().addClass('active')
				active_scroller_item.removeClass('active');
			}
			active_scroller_item = jQuery('.post-scroller-item.active',scroller);
			scroller_distance = 0
			active_scroller_item.prevAll().each(function() {
                scroller_distance += scroller.outerHeight(true);
            });
			if(scroller_distance >= (scroller_list_height-scroller_height)){
				scroller_distance=scroller_list_height-scroller_height;
			}
			scroller_inner.css({
				'transform': 'translate3d(0px, -'+scroller_distance+'px, 0px)',
				'-webkit-transform': 'translate3d(0px, -'+scroller_distance+'px, 0px)',
				'-ms-transform': 'translateY(-'+scroller_distance+'px)',
			});
			return false;
		});
	});
	
	/*Fix menu hover in mobile (add by vanna)*/
	jQuery('.navbar-nav li>a').bind('touchstart', function(e){
		if(jQuery(this).parents('li').find('ul').length > 0 && !jQuery(this).hasClass('no-go-to-touch')){
			jQuery(this).addClass('no-go-to-touch');
			return false;
		};
	});
	/*Fix menu hover in mobile*/
});
jQuery(window).resize(function(e) {
	jQuery('.post-scroller-carousel').each(function(){
		//init
		var this_scroller = jQuery(this);
		var this_scroller_inner = jQuery('.post-scroller-carousel-inner',this);
		//calculate
		var scroller_height = this_scroller.height();
		var scroller_list_height = this_scroller_inner.height();
		
		var active_scroller_item = jQuery('.post-scroller-item.active',this);
		var scroller_distance = 0
		active_scroller_item.prevAll().each(function() {
			scroller_distance += jQuery(this).outerHeight(true);
		});
		if(scroller_distance >= (scroller_list_height-scroller_height)){
			scroller_distance=scroller_list_height-scroller_height;
		}
		jQuery('.post-scroller-carousel-inner',this).css({
			'transform': 'translate3d(0px, -'+scroller_distance+'px, 0px)',
			'-webkit-transform': 'translate3d(0px, -'+scroller_distance+'px, 0px)',
		});
	});
});
//End Post scroller

//Pre loading
jQuery(window).load(function(e) {
	jQuery("#pageloader").fadeOut(500);
});

// Add some classes to body for CSS hooks
// Get browser
if(jQuery.browser){
	jQuery.each(jQuery.browser, function(i) {
		jQuery('body').addClass(i);
		return false;  
	});
}
// Get OS
var os = [
    'iphone',
    'ipad',
    'windows',
    'mac',
    'linux',
	'android',
	'mobile'
];
var match = navigator.appVersion.toLowerCase().match(new RegExp(os.join('|')));
if (match) {
    jQuery('body').addClass(match[0]);
}
if(typeof match[0] == 'undefined'){
	match[0]='';
}
if ( (navigator.appVersion.indexOf("Win")!=-1 || navigator.appVersion.indexOf("Mac")!=-1 || navigator.appVersion.indexOf("X11")!=-1 || match[0]=='windows' || match[0]=='mac') && match[0]!='iphone' && match[0]!='ipad'){
	jQuery('body').addClass('pc');
}else{
	jQuery('body').addClass('mobile');
}
//End body class