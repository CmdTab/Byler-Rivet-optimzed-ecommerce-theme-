/*function overflowHeight() {
	jQuery('.overflow-links').each(function(){
		var pHeight = jQuery(this).parenet().outerHeight();
		jQuery(this).css('height', pHeight);
	});
}*/
function catHeight() {
	var currentHeight = 0;
	var maxHeight = 0;
	jQuery('li.product').each(function() {
		currentHeight = jQuery(this).outerHeight();
		if(currentHeight > maxHeight) {
			maxHeight = currentHeight;
			}
		});
	jQuery('li.product').css('height', maxHeight);
}
function detailHeight() {
	var currentHeight = 0;
	var maxHeight = 0;
	jQuery('li .prod-detail').each(function() {
		currentHeight = jQuery(this).outerHeight();
		if(currentHeight > maxHeight) {
			maxHeight = currentHeight;
			}
		});
	jQuery('li .prod-detail').css('height', maxHeight);
}
function megaToggle() {
	jQuery('.with-mega a').click(function() {
		if(jQuery(this).siblings('.mega-menu').hasClass('expanded')) {
			jQuery('.mega-menu').removeClass('expanded');
			jQuery(this).removeClass('active');
		} else {
			jQuery('.mega-menu').removeClass('expanded');
			jQuery('#productTrigger, .with-mega a').removeClass('active');
			jQuery('#product-menu').removeClass('expand');
			jQuery(this).addClass('active');
			jQuery(this).siblings('.mega-menu').addClass('expanded');
		}
		return false;
	});
}
function productMenu() {
	jQuery('#productTrigger, #productTrigger2').click(function() {
		jQuery('.mega-menu').removeClass('expanded');
		jQuery('.with-mega a').removeClass('active');
		jQuery(this).toggleClass('active');
		jQuery('#product-menu, #product-menu2').toggleClass('expand');
		return false;
	});
}
function closeProductMenu() {
	jQuery(document).click(function(){
		if(jQuery('#product-menu, #product-menu2').hasClass('expand')){
			jQuery('#product-menu, #product-menu2').removeClass('expand');
			jQuery('#productTrigger, #productTrigger2').removeClass('active');
		}
	});
	jQuery("#product-menu, #product-menu2").click(function(e){
		e.stopPropagation();
	});
}
/*function productMobile() {
	jQuery('#productMobile').click(function() {
		if(jQuery( '#productMobile' ).hasClass( 'product-menu-expanded' )) {
			jQuery( '#productMobile' ).removeClass( 'product-menu-expanded' );
			jQuery( '.toggle-nav' ).removeClass( 'active' );
			jQuery(this).toggleClass('active');
			jQuery('.main-nav').slideUp( 'slow' , function() {
				jQuery('#product-menu').toggleClass( 'expand' );
			});
		} else {
			jQuery( '#productMobile' ).addClass( 'product-menu-expanded' );
			jQuery(this).toggleClass('active');
			jQuery('.main-nav').slideDown( 'slow' );	
			jQuery('#product-menu').toggleClass( 'expand' );
		}
		return false;
	});
}*/
function toggleNav() {
	jQuery( '#toggleNav' ).click(function() {
		if(jQuery( '#toggleNav' ).hasClass( 'expanded' )) {
			jQuery( '#toggleNav' ).removeClass( 'expanded' );
			jQuery( '.main-nav' ).slideUp( 'slow' );
			jQuery( '#product-menu' ).removeClass( 'expand' );
			jQuery( '#productTrigger' ).removeClass( 'active' );
		} else {
			jQuery( '#toggleNav' ).addClass( 'expanded' );
			jQuery( '.main-nav' ).slideDown( 'slow' );
			jQuery( '#product-menu.expand' ).slideUp( 'slow' );
		} 
		return false;
	});
}
function tabsToggle() {
	jQuery('.tab-toggle').click(function() {
		jQuery(this).siblings('li:not(.ui-state-active)').slideToggle();
		jQuery( ".selector" ).tabs( {event: "mouseover" } );
		
		if(jQuery(this).parent().hasClass('shown')) {
			jQuery(this).children('b').html('Show More');
		} else {
			jQuery(this).children('b').html('Hide');
		}
		jQuery(this).parent().toggleClass('shown');
		return false;
	});
}

function storeOfferHeight() {
	var currentHeight = 0;
	var maxHeight = 0;
	jQuery('.contact-box').each(function() {
		currentHeight = jQuery(this).outerHeight();
		if(currentHeight > maxHeight) {
			maxHeight = currentHeight;
			}
		});
	jQuery('.contact-box').css('height', maxHeight);
}
function gridHeight() {
	jQuery('.product-list').each(function() {
		var currentHeight = 0;
		var maxHeight = 0;
		if(jQuery(this).is(':visible')) {
			jQuery(this).children('li').each(function() {
				currentHeight = jQuery(this).outerHeight();
				if(currentHeight > maxHeight) {
					maxHeight = currentHeight;
					}
				});
			jQuery(this).children('li').css('height', maxHeight);
		}
	});
}

function searchTrigger() {
	jQuery( '.fa-search.submit' ).click(function() {
		if(jQuery( 'input' ).hasClass( 'search-expanded' )) {
			jQuery( 'input' ).removeClass( 'search-expanded' );
		} else {
			jQuery( 'input' ).addClass( 'search-expanded' );
		}
		return false;
	});
}
function tabsHover() {
	jQuery( '.ui-state-default' ).click(function() {
		jQuery( '' ).tabs({
			event: "mouseover"
		});
	});
}

function modalVideo() {
	var beginEmbed = '<div class="fitvids"><iframe width="1280" height="720" src="https://www.youtube.com/embed/';
	var endEmbed = '?autoplay=1" frameborder="0" allowfullscreen></iframe></div>';
	jQuery('.cat-video').click(function () {
		var videoID = jQuery(this).data('video');
		var videoEmbed = beginEmbed + videoID + endEmbed;
		jQuery('.modalContent').html(videoEmbed);
		jQuery(".fitvids").fitVids();
		jQuery('.modalVideo').addClass('showModal');
		return false;
	});
}
function closeModal() {
	//Click outside content
	jQuery('.modalVideo').click(function () {
		jQuery(this).removeClass('showModal');
		jQuery('.modalContent').html('');
		return false;
	});
	//Esc Key
	jQuery(document).keyup(function (e) {
		if (e.keyCode === 27) {
			jQuery('.modalVideo').removeClass('showModal');
			jQuery('.modalContent').html('');
		}
	});
	jQuery('.hideModal').click(function () {
		jQuery('.modalVideo').removeClass('showModal');
		jQuery('.modalContent').html('');
		return false;
	});
}
function categoryList() {
	var mylist = jQuery('ul.products');
	var listitems = mylist.children('ul.prod-meta li').get();
	listitems.sort(function(a, b) {
	   var compA = jQuery(a).text().toUpperCase();
	   var compB = jQuery(b).text().toUpperCase();
	   return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;
	});
	jQuery.each(listitems, function(idx, itm) { mylist.append(itm); });
}

function questionTrigger() {
	jQuery( '.submit-question-trigger' ).click(function() {
		jQuery( '.product-question-form' ).css( 'display' , 'block' );
	});
	jQuery( '.product-question-form .fa' ).click(function() {
		jQuery( '.product-question-form' ).css( 'display' , 'none' );
	});
	jQuery(document).on('submitResponse.myFunction', function(e, response){
	   // Check for errors.
	   if ( ! response.errors ) { // No errors
      	jQuery( '.form-close' ).click(function() {
      		jQuery( '.product-question-form' ).css( 'display' , 'none' );
      	});
	   }
	   return true;
	});
}

function shareTrigger() {
	jQuery( '.share-product-trigger' ).click(function() {
		jQuery( '.share-product-form' ).css( 'display' , 'block' );
	});
	jQuery( '.share-product-form .fa' ).click(function() {
		jQuery( '.share-product-form' ).css( 'display' , 'none' );
	});
	jQuery(document).on('submitResponse.myFunction', function(e, response){
	   // Check for errors.
	   if ( ! response.errors ) { // No errors
      	jQuery( '.form-close' ).click(function() {
      		jQuery( '.share-product-form' ).css( 'display' , 'none' );
      	});
	   }
	   return true;
	});
}

function hideTabs() {
	/*jQuery(document).ready(function(){
		if (jQuery("#videos").text().length > 0) {
			jQuery('.testing-hide').show();
		} else {
			jQuery('.testing-hide').hide();
		}                                        
	});*/
}

jQuery(document).ready(function() {
	var vw = jQuery(window).width();
	jQuery( ".regular-tabs, #product-menu, .new-tabs" ).tabs();
	productMenu();
	hideTabs();
	categoryList();
	questionTrigger();
	//productMobile();
	tabsToggle();
	toggleNav();
	tabsHover();
	megaToggle();
	closeProductMenu();
	modalVideo();
	closeModal();
	shareTrigger();
	jQuery('.carousel').carousel();
	if (vw > 800) {
		storeOfferHeight();
	}
	if (vw < 1000) {
		searchTrigger();
	}
});

jQuery(window).load(function() {
	var vw = jQuery(window).width();
	gridHeight();
	catHeight();
	if (vw > 800) {
		detailHeight();
	}
});

jQuery(window).resize(function() {
	var vw = jQuery(window).width();
	catHeight();
	if (vw > 800) {
		detailHeight();
	}
});