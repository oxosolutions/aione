/**
 * jQuery Equal Heights
 */
(function($) {
	$.fn.equalHeights = function(minHeight, maxHeight) {
		tallest = (minHeight) ? minHeight : 0;
		this.each(function() {
			$(this).css('height', 'auto');
			if($(this).outerHeight() > tallest) {
				tallest = $(this).outerHeight();
			}
		});
		if((maxHeight) && tallest > maxHeight) {
			tallest = maxHeight;
		}
		return this.each(function() {
			$(this).css( 'min-height', tallest ).css("overflow","auto");
		});
	};
})(jQuery);

/* jQuery CounTo */

(function(a){a.fn.countTo=function(g){g=g||{};return a(this).each(function(){function e(a){a=b.formatter.call(h,a,b);f.html(a)}var b=a.extend({},a.fn.countTo.defaults,{from:a(this).data("from"),to:a(this).data("to"),speed:a(this).data("speed"),refreshInterval:a(this).data("refresh-interval"),decimals:a(this).data("decimals")},g),j=Math.ceil(b.speed/b.refreshInterval),l=(b.to-b.from)/j,h=this,f=a(this),k=0,c=b.from,d=f.data("countTo")||{};f.data("countTo",d);d.interval&&clearInterval(d.interval);d.interval=
setInterval(function(){c+=l;k++;e(Math.abs(c));"function"==typeof b.onUpdate&&b.onUpdate.call(h,c);k>=j&&(f.removeData("countTo"),clearInterval(d.interval),c=b.to,"function"==typeof b.onComplete&&b.onComplete.call(h,c))},b.refreshInterval);e(c)})};a.fn.countTo.defaults={from:0,to:0,speed:1E3,refreshInterval:100,decimals:0,formatter:function(a,e){return a.toFixed(e.decimals)},onUpdate:null,onComplete:null}})(jQuery);

/*
* hoverFlow - A Solution to Animation Queue Buildup in jQuery
* Version 1.00
*
* Copyright (c) 2009 Ralf Stoltze, http://www.2meter3.de/code/hoverFlow/
* Dual-licensed under the MIT and GPL licenses.
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*/
(function($){$.fn.hoverFlow=function(c,d,e,f,g){if($.inArray(c,['mouseover','mouseenter','mouseout','mouseleave'])==-1){return this}var h=typeof e==='object'?e:{complete:g||!g&&f||$.isFunction(e)&&e,duration:e,easing:g&&f||f&&!$.isFunction(f)&&f};h.queue=false;var i=h.complete;h.complete=function(){$(this).dequeue();if($.isFunction(i)){i.call(this)}};return this.each(function(){var b=$(this);if(c=='mouseover'||c=='mouseenter'){b.data('jQuery.hoverFlow',true)}else{b.removeData('jQuery.hoverFlow')}b.queue(function(){var a=(c=='mouseover'||c=='mouseenter')?b.data('jQuery.hoverFlow')!==undefined:b.data('jQuery.hoverFlow')===undefined;if(a){b.animate(d,h)}else{b.queue([])}})})}})(jQuery);

/**
 * User agent
 * http://cssuseragent.org/
 */
var cssua=function(n,l,p){var q=/\s*([\-\w ]+)[\s\/\:]([\d_]+\b(?:[\-\._\/]\w+)*)/,r=/([\w\-\.]+[\s\/][v]?[\d_]+\b(?:[\-\._\/]\w+)*)/g,s=/\b(?:(blackberry\w*|bb10)|(rim tablet os))(?:\/(\d+\.\d+(?:\.\w+)*))?/,t=/\bsilk-accelerated=true\b/,u=/\bfluidapp\b/,v=/(\bwindows\b|\bmacintosh\b|\blinux\b|\bunix\b)/,w=/(\bandroid\b|\bipad\b|\bipod\b|\bwindows phone\b|\bwpdesktop\b|\bxblwp7\b|\bzunewp7\b|\bwindows ce\b|\bblackberry\w*|\bbb10\b|\brim tablet os\b|\bmeego|\bwebos\b|\bpalm|\bsymbian|\bj2me\b|\bdocomo\b|\bpda\b|\bchtml\b|\bmidp\b|\bcldc\b|\w*?mobile\w*?|\w*?phone\w*?)/,
x=/(\bxbox\b|\bplaystation\b|\bnintendo\s+\w+)/,k={parse:function(b,d){var a={};d&&(a.standalone=d);b=(""+b).toLowerCase();if(!b)return a;for(var c,e,g=b.split(/[()]/),f=0,k=g.length;f<k;f++)if(f%2){var m=g[f].split(";");c=0;for(e=m.length;c<e;c++)if(q.exec(m[c])){var h=RegExp.$1.split(" ").join("_"),l=RegExp.$2;if(!a[h]||parseFloat(a[h])<parseFloat(l))a[h]=l}}else if(m=g[f].match(r))for(c=0,e=m.length;c<e;c++)h=m[c].split(/[\/\s]+/),h.length&&"mozilla"!==h[0]&&(a[h[0].split(" ").join("_")]=h.slice(1).join("-"));
w.exec(b)?(a.mobile=RegExp.$1,s.exec(b)&&(delete a[a.mobile],a.blackberry=a.version||RegExp.$3||RegExp.$2||RegExp.$1,RegExp.$1?a.mobile="blackberry":"0.0.1"===a.version&&(a.blackberry="7.1.0.0"))):v.exec(b)?a.desktop=RegExp.$1:x.exec(b)&&(a.game=RegExp.$1,c=a.game.split(" ").join("_"),a.version&&!a[c]&&(a[c]=a.version));a.intel_mac_os_x?(a.mac_os_x=a.intel_mac_os_x.split("_").join("."),delete a.intel_mac_os_x):a.cpu_iphone_os?(a.ios=a.cpu_iphone_os.split("_").join("."),delete a.cpu_iphone_os):a.cpu_os?
(a.ios=a.cpu_os.split("_").join("."),delete a.cpu_os):"iphone"!==a.mobile||a.ios||(a.ios="1");a.opera&&a.version?(a.opera=a.version,delete a.blackberry):t.exec(b)?a.silk_accelerated=!0:u.exec(b)&&(a.fluidapp=a.version);if(a.applewebkit)a.webkit=a.applewebkit,delete a.applewebkit,a.opr&&(a.opera=a.opr,delete a.opr,delete a.chrome),a.safari&&(a.chrome||a.crios||a.opera||a.silk||a.fluidapp||a.phantomjs||a.mobile&&!a.ios?delete a.safari:a.safari=a.version&&!a.rim_tablet_os?a.version:{419:"2.0.4",417:"2.0.3",
416:"2.0.2",412:"2.0",312:"1.3",125:"1.2",85:"1.0"}[parseInt(a.safari,10)]||a.safari);else if(a.msie||a.trident)if(a.opera||(a.ie=a.msie||a.rv),delete a.msie,a.windows_phone_os)a.windows_phone=a.windows_phone_os,delete a.windows_phone_os;else{if("wpdesktop"===a.mobile||"xblwp7"===a.mobile||"zunewp7"===a.mobile)a.mobile="windows desktop",a.windows_phone=9>+a.ie?"7.0":10>+a.ie?"7.5":"8.0",delete a.windows_nt}else if(a.gecko||a.firefox)a.gecko=a.rv;a.rv&&delete a.rv;a.version&&delete a.version;return a},
format:function(b){var d="",a;for(a in b)if(a&&b.hasOwnProperty(a)){var c=a,e=b[a],c=c.split(".").join("-"),g=" ua-"+c;if("string"===typeof e){for(var e=e.split(" ").join("_").split(".").join("-"),f=e.indexOf("-");0<f;)g+=" ua-"+c+"-"+e.substring(0,f),f=e.indexOf("-",f+1);g+=" ua-"+c+"-"+e}d+=g}return d},encode:function(b){var d="",a;for(a in b)a&&b.hasOwnProperty(a)&&(d&&(d+="\x26"),d+=encodeURIComponent(a)+"\x3d"+encodeURIComponent(b[a]));return d}};k.userAgent=k.ua=k.parse(l,p);l=k.format(k.ua)+
" js";n.className=n.className?n.className.replace(/\bno-js\b/g,"")+l:l.substr(1);return k}(document.documentElement,navigator.userAgent,navigator.standalone);


var generateCarousel = function() {
	if(jQuery().carouFredSel) {
		jQuery('.es-carousel-wrapper').not('.aione-woo-featured-products-slider').each(function() {
			jQuery(this).find('ul').carouFredSel({
				auto: false,
				prev: jQuery(this).find('.es-nav-prev'),
				next: jQuery(this).find('.es-nav-next'),
				width: '100%',
				height: 'variable',
				align: 'center',
				onCreate: function(data) {
					jQuery( this ).find( '.image' ).css('visibility', 'visible');
				}
			});
		});

		jQuery('.aione-woo-featured-products-slider').each(function() {
			var carousel = jQuery(this).find('ul');
			carousel.carouFredSel({
				auto: false,
				prev: jQuery(this).find('.es-nav-prev'),
				next: jQuery(this).find('.es-nav-next'),
				align: 'left',
				left: 0,
				width: '100%',
				height: 'variable',
				responsive: true,
				scroll: {
					items: 1
				},
				items: {
					width: 500,
					height: 'variable',
					visible: {
						min: 1,
						max: 30
					}
				},
				onCreate: function(data) {
					jQuery( this ).find( '.image' ).css('visibility', 'visible');
					jQuery( this ).parent().css('overflow', '');
				}
			});
		});

		jQuery('.simple-products-slider-variable').each(function() {
			var carousel = jQuery(this).find('ul');
			carousel.carouFredSel({
				auto: false,
				prev: jQuery(this).find('.es-nav-prev'),
				next: jQuery(this).find('.es-nav-next'),
				width: '100%',
				height: 'variable',
				align: 'center'
			});
		});
	}
};

var calcTabsLayout = function(tab_selector) {
	jQuery(tab_selector).each(function() {
		var menuWidth = jQuery(this).parent().width();
		var menuItems = jQuery(this).find('li').length;
		var mod = menuWidth % menuItems;
		var itemWidth = (menuWidth - mod)/menuItems;
		var lastItemWidth = menuWidth - itemWidth*(menuItems - 1);

		jQuery(this).css({'width': menuWidth +'px'});
		jQuery(this).find('li').css({'width': itemWidth +'px'});
		jQuery(this).find('li:last').css({'width': lastItemWidth +'px'}).addClass('no-border-right');
	});
};

var aione_reanimate_slider = function( element ) {
	var elements = jQuery( '.tfs-slider' ).find( '.slide-content' );

	jQuery( elements ).each( function() {

		jQuery(this).stop( true, true );

		jQuery(this).css('opacity', '0');
		jQuery(this).css('margin-top', '50px');

		jQuery(this).animate({
			'opacity': '1',
			'margin-top': '0'
		}, 1000 );

	});
};

function onPlayerStateChange(frame, slider) {
	return function(event) {
		if(event.data == YT.PlayerState.PLAYING) {
			jQuery(slider).flexslider("pause");
		}
		if(event.data == YT.PlayerState.PAUSED) {
			jQuery(slider).flexslider("play");
		}
		if(event.data == YT.PlayerState.BUFFERING) {
			jQuery(slider).flexslider("pause");
		}
	}
}
function onPlayerReady(slide) {
	return function(event) {
		if( jQuery(slide).attr('data-mute') == 'yes' ) {
			event.target.mute();
		}
	}
}

(function( jQuery ) {

	"use strict";

	// init sticky header
	jQuery.fn.init_sticky_header = function() {

		var sticky_mobile_menu_padding;

		var sticky_header_height = 65;
		var sticky_top = jQuery('.sticky-header').css('top');
		var sticky_start = sticky_top.replace('px','') - 55;
		var logo = '.sticky-header .logo img.normal_logo';
		var not_logo = '.sticky-header .logo img.retina_logo';
		var orig_logo_height, orig_logo_width, logo_max_width, width_ratio, calc_width, calc_height,
			logo_height, logo_line_height, logo_width, logo_margin_top	= 0;

		var anchor_scrolling = 0;
		jQuery('.sticky-header').css('top', sticky_start+'px');
		jQuery('.init-sticky-header').waypoint(function(direction) {
			if(direction === "down") {

				// one page anchor page load scrolling
				var adminbar_height = jQuery('#wpadminbar').outerHeight();
				var anchor = window.location.hash.toString();

				if( anchor.length > 1 && jQuery(anchor).length && ! anchor_scrolling ) {
					jQuery('html, body').animate({
						scrollTop: jQuery(anchor).offset().top - adminbar_height - 65 + 1
					}, 350, 'easeInOutExpo');
					anchor_scrolling = 1;
				}

				if(jQuery('#wpadminbar').length >= 1) {
					sticky_top = jQuery('#wpadminbar').outerHeight()+"px";
				}
				jQuery('.sticky-header').show();
				jQuery('.sticky-header').animate({
					height: sticky_header_height + 3 + 'px',
					top: sticky_top
					}, 500 );
				jQuery('.sticky-shadow').animate({
					height: sticky_header_height  + 'px',
					top: sticky_top
				}, 500 );


				if( jQuery('#header .retina_logo').is(':visible')) {
					logo = '.sticky-header .logo img.retina_logo';
					not_logo ='.sticky-header .logo img.normal_logo';
				} else {
					logo = '.sticky-header .logo img.normal_logo';
					not_logo = '.sticky-header .logo img.retina_logo';
				}

				orig_logo_height = jQuery(logo).height();
				orig_logo_width = jQuery(logo).width();
				logo_max_width = jQuery(logo).data("max-width");

				//IE8 quirks
				if (jQuery('.no-svg').length >= 1) {
					orig_logo_height = orig_logo_height + 4;
					orig_logo_width = orig_logo_width + 4;
				}

				calc_width = orig_logo_width;
				calc_height = orig_logo_height;
				if (logo_max_width > 0) {
					width_ratio = logo_max_width / orig_logo_width;
					calc_width = logo_max_width;
					calc_height = orig_logo_height * width_ratio;
				}

				if (calc_height > 55) {
					logo_height = "55px";
					logo_line_height = "55px";
					logo_width =  55 / orig_logo_height * orig_logo_width;
					logo_margin_top = "5px";
				} else {
					logo_height = calc_height+"px";
					logo_line_height = calc_height+"px";
					logo_width = calc_width;
					logo_margin_top = (65 - calc_height) / 2;
				}

				sticky_mobile_menu_padding = logo_width+25;

				jQuery('body #header-sticky.sticky-header .sticky-shadow .mobile-nav-holder').css('padding-left', sticky_mobile_menu_padding+"px");
				logo_width = logo_width+"px";

				//IE8 quirks
				if (jQuery('.no-svg').length >= 1) {
					jQuery(logo).animate({
						height: logo_height,
						'line-height': logo_line_height,
						'max-width': logo_width,
						'margin-top': logo_margin_top
					}, 500 );
					jQuery(not_logo).css('height', logo_height).css('line-height', logo_line_height).css('max-width', logo_width).css('margin-top', logo_margin_top);
					jQuery(logo).css('display', '');
				} else {
					jQuery(logo).animate({
						height: logo_height,
						'line-height': logo_line_height,
						width: logo_width,
						'margin-top': logo_margin_top
					}, 500 );
					jQuery(not_logo).css('height', logo_height).css('line-height', logo_line_height).css('width', logo_width).css('margin-top', logo_margin_top);
					jQuery(logo).css('display', '');
				}

				jQuery('.sticky-header #sticky-nav ul.menu > li > a').animate({
					height: sticky_header_height + 'px',
					'line-height': sticky_header_height + 'px'
				}, 500 );


				jQuery('.sticky-header').addClass('sticky');
				jQuery('#small-nav').css('visibility', 'hidden');
		 } else if(direction === "up") {
				jQuery('.sticky-header').css( 'height', '' );
				jQuery('.sticky-shadow').css( 'height', '' );

				jQuery('#header-sticky .retina_logo').css( 'height', orig_logo_height );
				jQuery('#header .retina_logo, #header-sticky .retina_logo').css( 'width', orig_logo_width );
				jQuery('#header-sticky .retina_logo').css( 'margin-top', '' );
				jQuery('#header .normal_logo, #header-sticky .normal_logo').css( 'height', '' );
				jQuery('#header .normal_logo, #header-sticky .normal_logo').css( 'width', '' );
				jQuery('#header-sticky .retina_logo').css( 'margin-top', '' );

				jQuery(logo+','+not_logo).css( 'line-height', '' );
				jQuery(logo+','+not_logo).css( 'padding-top', '' );
				jQuery(logo+','+not_logo).css( 'max-width', '' );
				jQuery(logo+','+not_logo).css( 'margin-top', '' );

				jQuery('.sticky-header #sticky-nav ul.menu > li > a').css( 'height', '' );
				jQuery('.sticky-header #sticky-nav ul.menu > li > a').css( 'line-height', '' );

				jQuery('.sticky-header').removeClass( 'sticky' );
				jQuery('.sticky-header').hide();
				jQuery('#small-nav').css('visibility', 'visible');

				jQuery('.sticky-header .mobile-nav-holder #mobile-nav').css( 'display', 'none' );
			 }
		});
	};

	// position mega menu correctly
	jQuery.fn.aione_position_megamenu = function( variables ) {

		var reference_elem = '';
		if( jQuery( '.header-v4' ).length ) {
			reference_elem = jQuery( this ).parent('nav').parent();
		} else {
			reference_elem = jQuery( this ).parent('nav');
		}

		if( jQuery( this ).parent( 'nav' ).length ) {

			var main_nav_container = reference_elem,
				main_nav_container_position = main_nav_container.offset(),
				main_nav_container_width = main_nav_container.width(),
				main_nav_container_left_edge = main_nav_container_position.left,
				main_nav_container_right_edge = main_nav_container_left_edge + main_nav_container_width;

			if( ! jQuery( '.rtl' ).length ) {
				return this.each( function() {

					jQuery( this ).children( 'li' ).each( function() {
						var li_item = jQuery( this ),
							li_item_position = li_item.offset(),
							megamenu_wrapper = li_item.find( '.aione-megamenu-wrapper' ),
							megamenu_wrapper_width = megamenu_wrapper.outerWidth(),
							megamenu_wrapper_position = 0;

						// check if there is a megamenu
						if( megamenu_wrapper.length ) {
							megamenu_wrapper.removeAttr( 'style' );

							// set megamenu max width
							var reference_aione_row;

							if( jQuery( '#small-nav' ).length ) {
								reference_aione_row = jQuery( '.header-wrapper #small-nav .aione-row' );
							} else {
								reference_aione_row = jQuery( '.header-wrapper .aione-row' );
							}

							if( megamenu_wrapper.hasClass( 'col-span-12' ) && ( reference_aione_row.width() < megamenu_wrapper.data( 'maxwidth' ) ) ) {
								megamenu_wrapper.css( 'width', reference_aione_row.width() );
							} else {
								megamenu_wrapper.removeAttr( 'style' );
							}

							// reset the megmenu width after resizing the menu
							megamenu_wrapper_width = megamenu_wrapper.outerWidth();

							if( li_item_position.left + megamenu_wrapper_width > main_nav_container_right_edge ) {
								megamenu_wrapper_position = -1 * ( li_item_position.left - ( main_nav_container_right_edge - megamenu_wrapper_width ) );

								if( js_local_vars.logo_alignment.toLowerCase() == 'right' ) {
									if( li_item_position.left + megamenu_wrapper_position < main_nav_container_left_edge ) {
										megamenu_wrapper_position = -1 * ( li_item_position.left - main_nav_container_left_edge );
									}
								}

								megamenu_wrapper.css( 'left', megamenu_wrapper_position );
							}
						}
					});
				});

			} else {
				return this.each( function() {

					jQuery( this ).children( 'li' ).each( function() {
						var li_item = jQuery( this ),
							li_item_position = li_item.offset(),
							li_item_right_edge = li_item_position.left + li_item.outerWidth(),
							megamenu_wrapper = li_item.find( '.aione-megamenu-wrapper' ),
							megamenu_wrapper_width = megamenu_wrapper.outerWidth(),
							megamenu_wrapper_position = 0;

						// check if there is a megamenu
						if( megamenu_wrapper.length ) {
							megamenu_wrapper.removeAttr( 'style' );

							// set megamenu max width
							var reference_aione_row;

							if( jQuery( '#small-nav' ).length ) {
								reference_aione_row = jQuery( '.header-wrapper #small-nav .aione-row' );
							} else {
								reference_aione_row = jQuery( '.header-wrapper .aione-row' );
							}

							if( megamenu_wrapper.hasClass( 'col-span-12' ) && ( reference_aione_row.width() < megamenu_wrapper.data( 'maxwidth' ) ) ) {
								megamenu_wrapper.css( 'width', reference_aione_row.width() );
							} else {
								megamenu_wrapper.removeAttr( 'style' );
							}

							if( li_item_right_edge - megamenu_wrapper_width < main_nav_container_left_edge ) {

								megamenu_wrapper_position = -1 * ( megamenu_wrapper_width - ( li_item_right_edge - main_nav_container_left_edge ) );

								if( js_local_vars.logo_alignment.toLowerCase() == 'left' || ( js_local_vars.logo_alignment.toLowerCase() == 'center' && ! jQuery( '.header-v5' ).length ) ) {
									if( li_item_right_edge - megamenu_wrapper_position > main_nav_container_right_edge ) {
										megamenu_wrapper_position = -1 * ( main_nav_container_right_edge - li_item_right_edge );
									}
								}

								megamenu_wrapper.css( 'right', megamenu_wrapper_position );
							}
						}
					});
				});
			}
		}
	};

	jQuery.fn.position_last_top_menu_item = function( variables ) {
		if( jQuery( this ).children( 'ul' ).length || jQuery( this).children( 'div' ).length ) {
			var last_item = jQuery( this ),
				last_item_left_pos = last_item.position().left,
				last_item_width = last_item.outerWidth(),
				last_item_child,
				parent_container = jQuery( '.header-social .aione-row' ),
				parent_container_left_pos = parent_container.position().left,
				parent_container_width = parent_container.outerWidth();

			if( last_item.children( 'ul' ).length ) {
				last_item_child =  last_item.children( 'ul' );
			} else if( last_item.children('div').length ) {
				last_item_child =  last_item.children( 'div' );
			}

			if( ! jQuery( '.rtl' ).length ) {
				if( last_item_left_pos + last_item_child.outerWidth() > parent_container_left_pos + parent_container_width ) {
					last_item_child.css( 'right', '-1px' ).css( 'left', 'auto' );

					last_item_child.find( '.sub-menu' ).each( function() {
						jQuery( this ).css( 'right', '100px' ).css( 'left', 'auto' );
					});
				}
			} else {
				if( last_item_child.position().left < last_item_left_pos ) {
					last_item_child.css( 'left', '-1px' ).css( 'right', 'auto' );

					last_item_child.find( '.sub-menu' ).each( function() {
						jQuery( this ).css( 'left', '100px' ).css( 'right', 'auto' );
					});
				}
			}
		}
	};

	// Waypoint
	jQuery.fn.init_waypoint = function() {
		if( jQuery().waypoint ) {

			// Counters Box
			jQuery('.aione-counter-box').not('.aione-modal .aione-counter-box').waypoint(function() {
				jQuery(this).find('.display-counter').each(function() {
					jQuery(this).aione_box_counting();
				});
			}, {
				triggerOnce: true,
				offset: 'bottom-in-view'
			});

			// Counter Circles
			jQuery('.counter-circle-wrapper').not('.aione-modal .counter-circle-wrapper').waypoint(function() {
				jQuery(this).aione_draw_circles();
			}, {
				triggerOnce: true,
				offset: 'bottom-in-view'
			});

			// Progressbar
			jQuery( '.aione-progressbar' ).not('.aione-modal .aione-progressbar').waypoint( function() {
				jQuery(this).aione_draw_progress();
			}, {
				triggerOnce: true,
				offset: 'bottom-in-view'
			});

			// CSS Animations
			jQuery('.aione-animated').waypoint(function() {
				jQuery(this).css('visibility', 'visible');

				// this code is executed for each appeared element
				var animation_type = jQuery(this).data('animationtype');
				var animation_duration = jQuery(this).data('animationduration');

				jQuery(this).addClass('animated-	'+animation_type);

				if(animation_duration) {
					jQuery(this).css('-moz-animation-duration', animation_duration+'s');
					jQuery(this).css('-webkit-animation-duration', animation_duration+'s');
					jQuery(this).css('-ms-animation-duration', animation_duration+'s');
					jQuery(this).css('-o-animation-duration', animation_duration+'s');
					jQuery(this).css('animation-duration', animation_duration+'s');
				}
			},{ triggerOnce: true, offset: 'bottom-in-view' });
		}
	};

	// animate counter boxes
	jQuery.fn.aione_box_counting = function() {
		var count_value = jQuery( this ).data( 'value' );
		var count_direction = jQuery( this ).data( 'direction' );

		if( count_direction == 'down' ) {
			jQuery(this).countTo( { from: count_value, to: 0, refreshInterval: 10, speed: 1000 } );
		} else {
			jQuery(this).countTo( { from: 0, to: count_value, refreshInterval: 10, speed: 1000 } );
		}
	};

	// animate counter circles
	jQuery.fn.aione_draw_circles = function() {
		var circle = jQuery(this);
		var countdown = circle.children('.counter-circle').attr('data-countdown');
		var filledcolor = circle.children('.counter-circle').attr('data-filledcolor');
		var unfilledcolor = circle.children('.counter-circle').attr('data-unfilledcolor');
		var scale = circle.children('.counter-circle').attr('data-scale');
		var size = circle.children('.counter-circle').attr('data-size');
		var speed = circle.children('.counter-circle').attr('data-speed');
		var stroksize = circle.children('.counter-circle').attr('data-strokesize');

		var percentage = circle.children('.counter-circle').attr('data-percent');

		if( scale ) {
			scale = jQuery( 'body' ).css( 'color' );
		}

		if( countdown ) {
			circle.children('.counter-circle').attr('data-percent', 100);

			circle.children('.counter-circle').easyPieChart({
				barColor: filledcolor,
				trackColor: unfilledcolor,
				scaleColor: scale,
				scaleLength: 5,
				lineCap: 'round',
				lineWidth: stroksize,
				size: size,
				rotate: 0,
				animate: {
					duration: speed, enabled: true
				}
			});
			circle.children('.counter-circle').data('easyPieChart').enableAnimation();
			circle.children('.counter-circle').data('easyPieChart').update(percentage);
		} else {
			circle.children('.counter-circle').easyPieChart({
				barColor: filledcolor,
				trackColor: unfilledcolor,
				scaleColor: scale,
				scaleLength: 5,
				lineCap: 'round',
				lineWidth: stroksize,
				size: size,
				rotate: 0,
				animate: {
					duration: speed, enabled: true
				}
			});
		}
	};

	// animate progress bar
	jQuery.fn.aione_draw_progress = function() {
		var progressbar = jQuery( this );
		if ( jQuery( 'html' ).hasClass( 'lt-ie9' ) ) {
			progressbar.css( 'visibility', 'visible' );
			progressbar.each( function() {
				var percentage = progressbar.find( '.progress' ).attr("aria-valuenow");
				progressbar.find( '.progress' ).css( 'width', '0%' );
				progressbar.find( '.progress' ).animate( {
					width: percentage+'%'
				}, 'slow' );
			} );
		} else {
			progressbar.find( '.progress' ).css( "width", function() {
				return jQuery( this ).attr( "aria-valuenow" ) + "%";
			});
		}
	};

	// set flip boxes equal front/back height
	jQuery.fn.aione_calc_flip_boxes_height = function() {
		var flip_box = jQuery( this );
		var outer_height, height, top_margin = 0;

		flip_box.find( '.flip-box-front' ).css( 'min-height', '' );
		flip_box.find( '.flip-box-back' ).css( 'min-height', '' );
		flip_box.find( '.flip-box-front-inner' ).css( 'margin-top', '' );
		flip_box.find( '.flip-box-back-inner' ).css( 'margin-top', '' );
		flip_box.css( 'min-height', '' );

		setTimeout( function() {
			if( flip_box.find( '.flip-box-front' ).outerHeight() > flip_box.find( '.flip-box-back' ).outerHeight() ) {
				height = flip_box.find( '.flip-box-front' ).height();
				if( cssua.ua.ie && cssua.ua.ie.substr(0, 1) == '8' ) {
					outer_height = flip_box.find( '.flip-box-front' ).height();
				} else {
					outer_height = flip_box.find( '.flip-box-front' ).outerHeight();
				}
				top_margin = ( height - flip_box.find( '.flip-box-back-inner' ).outerHeight() ) / 2;

				flip_box.find( '.flip-box-back' ).css( 'min-height', outer_height );
				flip_box.css( 'min-height', outer_height );
				flip_box.find( '.flip-box-back-inner' ).css( 'margin-top', top_margin );
			} else {
				height = flip_box.find( '.flip-box-back' ).height();
				if( cssua.ua.ie && cssua.ua.ie.substr(0, 1) == '8' ) {
					outer_height = flip_box.find( '.flip-box-back' ).height();
				} else {
					outer_height = flip_box.find( '.flip-box-back' ).outerHeight();
				}
				top_margin = ( height - flip_box.find( '.flip-box-front-inner' ).outerHeight() ) / 2;

				flip_box.find( '.flip-box-front' ).css( 'min-height', outer_height );
				flip_box.css( 'min-height', outer_height );
				flip_box.find( '.flip-box-front-inner' ).css( 'margin-top', top_margin );
			}

			if( cssua.ua.ie && cssua.ua.ie.substr(0, 1) == '8' ) {
				flip_box.find( '.flip-box-back' ).css( 'height', '100%' );
			}

		}, 100 );
	};

})( jQuery );

jQuery(window).load(function() {
	// Static layout
	if( js_local_vars.is_responsive == '0' ) {
		var column_classes = ['col-sm-0', 'col-sm-1', 'col-sm-2', 'col-sm-3', 'col-sm-4', 'col-sm-5', 'col-sm-6', 'col-sm-7', 'col-sm-8', 'col-sm-9', 'col-sm-10', 'col-sm-11', 'col-sm-12'];
		jQuery( '.col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12' ).each( function() {
			for( var i = 0; i < column_classes.length; i++ ) {
				if( jQuery( this ).attr('class').indexOf( column_classes[i] ) !== -1 ) {
					jQuery( this ).addClass( 'col-xs-' + i );
				}
			}
		});
	}

	// Initialize Waypoint
	jQuery.waypoints( 'viewportHeight' );
	jQuery(window).init_waypoint();

	// Counters Box - Modals
	jQuery('.aione-modal .aione-counter-box').each(function() {
		jQuery(this).appear(function() {
			jQuery(this).find('.display-counter').each(function() {
				jQuery(this).aione_box_counting();
			});
		});
	});

	// Counter Circles - Modals
	jQuery('.aione-modal .counter-circle-wrapper').each(function() {
		jQuery(this).appear(function() {
			jQuery(this).aione_draw_circles();
		});
	});

	// Progressbar - Modals
	jQuery('.aione-modal .aione-progressbar').each(function() {
		jQuery(this).appear(function() {
			jQuery(this).aione_draw_progress();
		});
	});

	// Flip Boxes
	jQuery( '.flip-box-inner-wrapper' ).each( function() {
		jQuery( this ).aione_calc_flip_boxes_height();
	});

	// Testimonials
	function onAfter( curr, next, opts, fwd ) {
	  var $ht = jQuery( this ).height();

	  //set the container's height to that of the current slide
	  jQuery( this ).parent().css( 'height' , $ht );
	}

	if( jQuery().cycle ) {
		var reviews_cycle_args = {
			fx: 'fade',
			after: onAfter,
			delay: 0
		};

		if ( js_local_vars.testimonials_speed ) {
			reviews_cycle_args.timeout = parseInt(js_local_vars.testimonials_speed);
		}
		jQuery( '.reviews' ).cycle( reviews_cycle_args );
	}

	// Toggles
	jQuery( '.aione-accordian .panel-title a' ).on( 'click', function () {
		var clicked_toggle = jQuery( this );
		var toggle_content_to_activate = jQuery( jQuery( this ).data( 'target' ) ).find( '.panel-body' );

		if( clicked_toggle.hasClass( 'active' ) ) {
			clicked_toggle.parents( '.aione-accordian ').find( '.panel-title a' ).removeClass( 'active' );
		} else {
			clicked_toggle.parents( '.aione-accordian ').find( '.panel-title a' ).removeClass( 'active' );
			clicked_toggle.addClass( 'active' );

			setTimeout( function(){
				toggle_content_to_activate.find( '.shortcode-map' ).each(function() {
					var map_id = jQuery(this).attr('id');
					window['aione_run_map_' + map_id]();
				});

				if( toggle_content_to_activate.find( '.es-carousel-wrapper' ).length ) {
					generateCarousel();
				}

				toggle_content_to_activate.find( '.portfolio' ).each( function() {
					jQuery( this).find( '.portfolio-wrapper' ).isotope( 'layout' );
				});

				if( toggle_content_to_activate.find( '.flexslider' ).length ) {
					jQuery( window ).trigger( 'resize' );
				}

				toggle_content_to_activate.find( '.aione-blog-shortcode' ).each( function() {
					if( jQuery( this ).find( '.grid-layout' ).hasClass( 'grid-layout-3' ) ) {
						var gridwidth = ( jQuery( this ).find( '.grid-layout-3' ).width() / 3 ) - 30;
					} else if( jQuery( this ).find( '.grid-layout' ).hasClass( 'grid-layout-4' ) )  {
						var gridwidth = ( jQuery( this ).find( '.grid-layout-4' ).width() / 4 ) - 35;
					} else {
						var gridwidth = ( jQuery( this ).find( '.grid-layout' ).width() / 2 ) - 22;
					}

					jQuery( this ).find( '.grid-layout .post' ).css('width', gridwidth);

					jQuery( this ).find( '.grid-layout' ).isotope( 'option', {
						isOriginLeft: jQuery( '.rtl' ).length ? false : true,
						masonry: {
							columnWidth: gridwidth,
							gutter: 40
						}
					});

					jQuery( this).find( '.grid-layout' ).isotope();
				});
			}, 350);
		}
	});

	// Initialize Bootstrap Modals
	jQuery( '.aione-modal' ).each( function() {
		jQuery( '#wrapper' ).append( jQuery( this ) );
	});

	jQuery( '.aione-modal' ).bind('hidden.bs.modal', function () {
		jQuery( 'html' ).css( 'overflow', '' );
	});

	jQuery( '.aione-modal' ).bind('show.bs.modal', function () {
		jQuery( 'html' ).css( 'overflow', 'visible' );

		var modal_window = jQuery ( this );

		setTimeout( function(){
			modal_window.find( '.shortcode-map' ).each(function() {
				var map_id = jQuery(this).attr('id');
				window['aione_run_map_' + map_id]();
			});

			if( modal_window.find( '.es-carousel-wrapper' ).length ) {
				generateCarousel();
			}

			modal_window.find( '.portfolio' ).each( function() {
				jQuery( this ).find( '.portfolio-wrapper' ).isotope( 'layout' );
			});

			if( modal_window.find( '.flexslider' ).length ) {
				jQuery( window ).trigger( 'resize' );
			}

			modal_window.find( '.aione-blog-shortcode' ).each( function() {
				if( jQuery( this ).find( '.grid-layout' ).hasClass( 'grid-layout-3' ) ) {
					var gridwidth = ( jQuery( this ).find( '.grid-layout-3' ).width() / 3 ) - 30;
				} else if( jQuery( this ).find( '.grid-layout' ).hasClass( 'grid-layout-4' ) )  {
					var gridwidth = ( jQuery( this ).find( '.grid-layout-4' ).width() / 4 ) - 35;
				} else {
					var gridwidth = ( jQuery( this ).find( '.grid-layout' ).width() / 2 ) - 22;
				}

				jQuery( this ).find( '.grid-layout .post' ).css( 'width', gridwidth );

				jQuery( this ).find( '.grid-layout' ).isotope( 'option', {
					isOriginLeft: jQuery( '.rtl' ).length ? false : true,
					masonry: {
						columnWidth: gridwidth,
						gutter: 40
					}
				});

				jQuery( this).find( '.grid-layout' ).isotope();
			});
		}, 350);
	});

	if( jQuery( '.tfs-slider' ).data( 'parallax' ) == 1 ) {
		jQuery( '.aione-modal' ).css( 'top', jQuery( '.header-wrapper' ).height() );
	}

	// stop videos in modals when closed
    jQuery( '.aione-modal' ).each(function() {
        jQuery( this ).on( 'hide.bs.modal', function() {

			// Youtube
			jQuery( this ).find('iframe').each(function(i) {
				var func = 'stopVideo';
				this.contentWindow.postMessage('{"event":"command","func":"' + func + '","args":""}', '*');
			});

			// Vimeo
			jQuery( this ).find('.aione-vimeo iframe').each(function(i) {
				$f(this).api('pause');
			});
		});
	});

	jQuery('[data-toggle=modal]').on('click', function(e) {
		e.preventDefault();
	});

	jQuery( '.aione-modal-text-link' ).click( function( e ) {
		e.preventDefault();
	});

	if(cssua.ua.mobile || cssua.ua.tablet_pc) {
		jQuery('.aione-popover, .aione-tooltip').each(function() {
			jQuery(this).attr('data-trigger', 'click');
			jQuery(this).data('trigger', 'click');
		});
	}

	// Initialize Bootstrap Popovers
	jQuery( '[data-toggle~="popover"]' ).popover({
		container: 'body'
	});

	// Initialize Bootstrap Tabs
	// Initialize vertical tabs content container height
	if( jQuery( '.vertical-tabs' ).length ) {
		jQuery( '.vertical-tabs .tab-content .tab-pane' ).each( function() {
			jQuery ( this ).css( 'min-height', jQuery( '.vertical-tabs .nav-tabs' ).outerHeight() );

			if( jQuery ( this ).find( '.video-shortcode' ).length ) {
				var video_width = parseInt( jQuery ( this ).find( '.aione-video' ).css( 'max-width' ).replace( 'px', '' ) );
				jQuery ( this ).css({
					'float': 'none',
					'max-width': video_width + 60
				});
			}
		});
	}

	jQuery( window ).on( 'resize', function() {
		if( jQuery( '.vertical-tabs' ).length ) {
			jQuery( '.vertical-tabs .tab-content .tab-pane' ).css( 'min-height', jQuery( '.vertical-tabs .nav-tabs' ).outerHeight() );
		}
	});

	// Initialize Bootstrap Tooltip
	jQuery( '[data-toggle~="tooltip"]' ).tooltip({
		container: 'body'
	});

	generateCarousel();

	if(jQuery().flexslider && jQuery('.woocommerce .images #carousel').length >= 1) {
		var WooThumbWidth = 100;
		if(jQuery('body.woocommerce .sidebar').is(':visible')) {
			wooThumbWidth = 100;
		} else {
			wooThumbWidth = 118;
		}

		if(typeof jQuery('.woocommerce .images #carousel').data('flexslider') !== 'undefined') {
			jQuery('.woocommerce .images #carousel').flexslider('destroy');
			jQuery('.woocommerce .images #slider').flexslider('destroy');
		}

		jQuery('.woocommerce .images #carousel').flexslider({
			animation: 'slide',
			controlNav: false,
			directionNav: false,
			animationLoop: false,
			slideshow: false,
			itemWidth: wooThumbWidth,
			itemMargin: 9,
			touch: false,
			useCSS: false,
			asNavFor: '.woocommerce .images #slider',
			smoothHeight: false,
			prevText: '&#xf104;',
			nextText: '&#xf105;'
		});

		jQuery('.woocommerce .images #slider').flexslider({
			animation: 'slide',
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			smoothHeight: true,
			touch: true,
			useCSS: false,
			sync: '.woocommerce .images #carousel',
			prevText: '&#xf104;',
			nextText: '&#xf105;'
		});
	}

	if(jQuery().flexslider && jQuery('.flexslider-attachments').length >= 1) {
		if(typeof jQuery('.flexslider-attachments').data('flexslider') !== 'undefined') {
			jQuery('.flexslider-attachments').flexslider('destroy');
		}

		jQuery('.flexslider-attachments').flexslider({
			slideshow: Boolean(Number(js_local_vars.slideshow_autoplay)),
			slideshowSpeed: js_local_vars.slideshow_speed,
			video: false,
			smoothHeight: false,
			pauseOnHover: false,
			useCSS: false,
			prevText: '&#xf104;',
			nextText: '&#xf105;',
			controlNav: 'thumbnails'
		});
	}

	jQuery('.content-boxes-icon-boxed').each(function() {
		jQuery(this).find('.content-box-column .content-wrapper-boxed').equalHeights();
		jQuery(this).find('.content-box-column .content-wrapper-boxed').css( 'overflow', 'visible' );
	});
});
jQuery(document).ready(function($) {
	if(js_local_vars.disable_mobile_animate_css == '1' && cssua.ua.mobile) {
		jQuery('body').addClass('dont-animate');
	} else {
		jQuery('body').addClass('do-animate');
	}

	// Sidebar Position
	if(jQuery('#sidebar-2').length >= 1) {
		var sidebar_1_float = jQuery('#sidebar').css('float');
		jQuery('body').addClass('sidebar-position-' + sidebar_1_float);
	}

	jQuery('.aione-flip-box').mouseover(function() {
		jQuery(this).addClass('hover');
	});

	jQuery('.aione-flip-box').mouseout(function() {
		jQuery(this).removeClass('hover');
	});

	jQuery('.aione-accordian .panel-title a').click(function(e) {
		e.preventDefault();
	});

	// Top Menu last item positioning
	jQuery('.top-menu > ul > li:last-child').position_last_top_menu_item();

	// Activates the mega menu
	if( jQuery.fn.aione_position_megamenu ) {
		jQuery( '.aione-navbar-nav' ).aione_position_megamenu();

		jQuery( '.aione-navbar-nav .aione-megamenu-menu' ).mouseenter( function() {
			jQuery( this ).parent().aione_position_megamenu();
		});

		jQuery(window).resize(function() {
			jQuery( '.aione-navbar-nav' ).aione_position_megamenu();
		});
	}

	jQuery('.aione-megamenu-menu').mouseenter(function() {
		if(jQuery(this).find('.shortcode-map').length >= 1) {
			jQuery(this).find('.shortcode-map').each(function() {
				jQuery(this).goMap(window[this.id]);
				marker = jQuery.goMap.markers[0];
				if(marker) {
					info = jQuery.goMap.getInfo(marker);
					jQuery.goMap.setInfo(marker, info);
				}
				var center = jQuery.goMap.getMap().getCenter();
				google.maps.event.trigger(jQuery.goMap.getMap(), 'resize');
				jQuery.goMap.getMap().setCenter(center);
			});
		}
	});

	jQuery(".my-show").click(function(){
		jQuery(".my-hidden").css('visibility', 'visible');
	});

	if (jQuery(".demo_store").length ) {
		jQuery("#wrapper").css('margin-top', jQuery(".demo_store").outerHeight());
		if(jQuery("#slidingbar-area").outerHeight()  > 0) {
			jQuery(".header-wrapper").css('margin-top', '0');
		}
		if(jQuery('.sticky-header').length ) {
			jQuery('.sticky-header').css('margin-top', jQuery('.demo_store').outerHeight());
		}
	}

	// sliding bar
	var slidingbar_state = 0;

	if(jQuery('#slidingbar-area.open_onload').length ) {
		jQuery("div#slidingbar").slideDown(240,'easeOutQuad');
		jQuery('.sb-toggle').addClass('open');
		slidingbar_state = 1;

		if(jQuery('#slidingbar .shortcode-map').length >= 1) {
			jQuery('#slidingbar').find('.shortcode-map').each(function() {
				jQuery("#"+this.id).goMap();
				marker = jQuery.goMap.markers[0];
				if(marker) {
					info = jQuery.goMap.getInfo(marker);
					jQuery.goMap.setInfo(marker, info);
				}
				var center = jQuery.goMap.getMap().getCenter();
				google.maps.event.trigger(jQuery.goMap.getMap(), 'resize');
				jQuery.goMap.getMap().setCenter(center);
			});
		}

		jQuery('#slidingbar-area').removeClass('open_onload');
	}

	jQuery( '.sb-toggle' ).click(function(){
		//Expand
		if(slidingbar_state == 0) {
			jQuery( 'div#slidingbar' ).slideDown( 240, 'easeOutQuad' );
			jQuery( '.sb-toggle' ).addClass( 'open' );
			slidingbar_state = 1;

			if(jQuery( '#slidingbar .shortcode-map' ).length ) {
				jQuery( '#slidingbar' ).find( '.shortcode-map' ).each(function() {
					jQuery("#"+this.id).goMap();
					marker = jQuery.goMap.markers[0];
					if(marker) {
						info = jQuery.goMap.getInfo(marker);
						jQuery.goMap.setInfo(marker, info);
					}
					var center = jQuery.goMap.getMap().getCenter();
					google.maps.event.trigger(jQuery.goMap.getMap(), 'resize');
					jQuery.goMap.getMap().setCenter(center);
				});
			}

		//Collapse
		} else if( slidingbar_state == 1 ) {
			jQuery( 'div#slidingbar' ).slideUp(240,'easeOutQuad');
			jQuery( '.sb-toggle' ).removeClass( 'open' );
			slidingbar_state = 0;
		}
	});

	// Foter without social icons
	if( ! jQuery( '.aione-social-links-footer' ).find( '.aione-social-networks' ).children().length ) {
		jQuery( '.aione-social-links-footer' ).hide();
		jQuery( '#footer .copyright' ).css( 'padding-bottom', '0' );
	}

	// to top
	if(jQuery().UItoTop) {
		if(cssua.ua.mobile && js_local_vars.status_totop_mobile == '1') {
			jQuery().UItoTop({ easingType: 'easeOutQuart' });
		} else if( ! cssua.ua.mobile ) {
			jQuery().UItoTop({ easingType: 'easeOutQuart' });
		}
	}

	// sticky header resizing control
	jQuery(window).on('resize', function() {
		// check for woo demo bar which can take on 2 lines and thus sticky position must be calculated
		if(jQuery(".demo_store").length) {
			jQuery("#wrapper").css('margin-top', jQuery(".demo_store").outerHeight());
			if(jQuery('.sticky-header').length) {
				jQuery(".sticky-header").css('margin-top', jQuery(".demo_store").outerHeight());
			}
		}

		if(jQuery(".sticky-header").length ) {
			if(jQuery(window).width() < 765) {
				jQuery('body.admin-bar #header-sticky.sticky-header').css('top', '46px');
			} else {
				jQuery('body.admin-bar #header-sticky.sticky-header').css('top', '32px');
			}
		}
	});

	//top nav
	jQuery('.header-wrapper .mobile-topnav-holder').append('<div class="mobile-selector"><span>'+js_local_vars.dropdown_goto+'</span></div>');
	jQuery('.header-wrapper .mobile-topnav-holder .mobile-selector').append('<div class="selector-down"></div>');
	jQuery('.header-wrapper .mobile-topnav-holder').append(jQuery('.header-wrapper .top-menu ul#snav').clone());
	jQuery('.header-wrapper .mobile-topnav-holder ul#snav').attr("class","mobile-topnav");
	jQuery('.header-wrapper .mobile-topnav-holder ul#snav').attr("id","mobile-nav");
	jQuery('.header-wrapper .mobile-topnav-holder ul#mobile-nav').children('.cart').each(function () {
	    jQuery(this).children('.my-cart-link').text(js_local_vars.mobile_nav_cart);
	    jQuery(this).children('.cart-contents').remove();
	});
	jQuery('.header-wrapper .mobile-topnav-holder ul#mobile-nav').children('li').each(function () {
		var classes = 'mobile-nav-item';

		if(jQuery(this).hasClass('current-menu-item') || jQuery(this).hasClass('current-menu-parent') || jQuery(this).hasClass('current-menu-ancestor')) {
			classes += ' mobile-current-nav-item';
		}
		jQuery( this ).attr( 'class', classes );

	    if( jQuery( this ).attr('id' ) ) {
	    	jQuery( this ).attr( 'id', jQuery( this ).attr( 'id' ).replace( 'menu-item', 'mobile-topmenu-item' ) );
		}
	    jQuery( this ).attr( 'style', '' );
	});
	jQuery('.header-wrapper .mobile-topnav-holder .mobile-selector').click(function(){
		jQuery('.header-wrapper .mobile-topnav-holder #mobile-nav').slideToggle(240,'easeOutQuad');
	});

	//main nav
	if(js_local_vars.mobile_menu_design == 'classic') {
		jQuery('.header-wrapper .mobile-nav-holder').append('<div class="mobile-selector"><span>'+js_local_vars.dropdown_goto+'</span></div>');
		jQuery('.header-wrapper .mobile-nav-holder .mobile-selector').append('<div class="selector-down"></div>');
	}
	jQuery('.header-wrapper .mobile-nav-holder').append(jQuery('.header-wrapper .nav-holder .aione-navbar-nav').clone());
	jQuery('.header-wrapper .mobile-nav-holder .aione-navbar-nav').attr("id","mobile-nav");
	jQuery('.header-wrapper .mobile-nav-holder ul#mobile-nav').removeClass('aione-navbar-nav');
	jQuery('.header-wrapper .mobile-nav-holder ul#mobile-nav').children('.cart').remove();

	jQuery('.header-wrapper .mobile-nav-holder ul#mobile-nav li').children('#main-nav-search-link').each(function () {
		jQuery(this).parents('li').remove();
	});
	jQuery('.header-wrapper .mobile-nav-holder ul#mobile-nav').children('li').each(function () {
		var classes = 'mobile-nav-item';

		if(jQuery(this).hasClass('current-menu-item') || jQuery(this).hasClass('current-menu-parent') || jQuery(this).hasClass('current-menu-ancestor')) {
			classes += ' mobile-current-nav-item';
		}
		jQuery( this ).attr( 'class', classes );
		if( jQuery( this ).attr('id' ) ) {
			jQuery( this ).attr( 'id', jQuery( this ).attr( 'id' ).replace( 'menu-item', 'mobile-menu-item' ) );
		}
	});
	jQuery('.header-wrapper .mobile-nav-holder .mobile-selector').click(function(){
		if( jQuery('.header-wrapper .mobile-nav-holder #mobile-nav').hasClass( 'mobile-menu-expanded' ) ) {
			jQuery('.header-wrapper .mobile-nav-holder #mobile-nav').removeClass( 'mobile-menu-expanded' );
		} else {
			jQuery('.header-wrapper .mobile-nav-holder #mobile-nav').addClass( 'mobile-menu-expanded' );
	}
		jQuery('.header-wrapper .mobile-nav-holder #mobile-nav').slideToggle(240,'easeOutQuad');
	});

	//sticky header nav
	jQuery('.sticky-header .aione-navbar-nav').children('li').each(function () {
		 jQuery( this ).removeAttr( 'id' );
	});
	jQuery('.sticky-header .mobile-nav-holder').append('<div class="mobile-selector"><span>'+js_local_vars.dropdown_goto+'</span></div>');
	jQuery('.sticky-header .mobile-nav-holder .mobile-selector').append('<div class="selector-down"></div>');
	jQuery('.sticky-header .mobile-nav-holder').append(jQuery('.sticky-header .nav-holder ul.navigation').clone());
	jQuery('.sticky-header .mobile-nav-holder ul.navigation').attr("class","navigation mobile-sticky-nav");
	jQuery('.sticky-header .mobile-nav-holder ul.navigation').removeClass('aione-navbar-nav');
	jQuery('.sticky-header .mobile-nav-holder .mobile-sticky-nav').children( '.cart' ).each(function () {
		jQuery(this).children('.my-cart-link').text(js_local_vars.mobile_nav_cart);
		jQuery(this).children('.cart-contents').remove();
	});
	jQuery('.sticky-header .mobile-nav-holder ul.navigation').attr("id","mobile-nav");
	jQuery('.sticky-header .mobile-nav-holder .mobile-sticky-nav').children('li').each(function () {
		var classes = 'mobile-nav-item';

		if(jQuery(this).hasClass('current-menu-item') || jQuery(this).hasClass('current-menu-parent') || jQuery(this).hasClass('current-menu-ancestor')) {
			classes += ' mobile-current-nav-item';
		}
		jQuery( this ).attr( 'class', classes );

		jQuery( this ).removeAttr( 'id' );
		jQuery( this ).children( 'a' ).css( 'style', '' );
	});
	jQuery('.sticky-header .mobile-nav-holder .mobile-sticky-nav li').children('#sticky-nav-search-link').each(function () {
		jQuery(this).parents('li').remove();
	});
	jQuery('.sticky-header .mobile-nav-holder .mobile-selector').click(function(){
		jQuery('.sticky-header .mobile-nav-holder .mobile-sticky-nav').slideToggle(240,'easeOutQuad');
	});
	jQuery('body #header-sticky.sticky-header .sticky-shadow .mobile-nav-holder').css('padding-left', jQuery('.sticky-header .sticky-shadow .logo').width() + 25 + "px");


	// Make megamenu items mobile ready
	jQuery('.header-wrapper .mobile-nav-holder .navigation > .mobile-nav-item, .sticky-header .mobile-nav-holder .navigation > .mobile-nav-item').each(function() {
		jQuery(this).find('.aione-megamenu-widgets-container').remove();

		jQuery(this).find('.aione-megamenu-holder > ul').each( function() {
			jQuery(this).attr('class', 'sub-menu');
			jQuery(this).attr('style', '');
			jQuery(this).find('> li').each( function() {

				// add menu needed menu classes to li elements
				var classes = 'mobile-nav-item';

				if(jQuery(this).hasClass('current-menu-item') || jQuery(this).hasClass('current-menu-parent') || jQuery(this).hasClass('current-menu-ancestor') || jQuery(this).hasClass('mobile-current-nav-item')) {
					classes += ' mobile-current-nav-item';
				}
				jQuery( this ).attr( 'class', classes );

				// Append column titles and title links correctly
				if( ! jQuery(this).find('.aione-megamenu-title a, > a').length ) {
					jQuery(this).find('.aione-megamenu-title').each( function() {
						if( ! jQuery( this ).children( 'a' ).length ) {
							jQuery( this ).append( '<a href="#">' + jQuery( this ).text() + '</a>' );
						}
					});

					if( ! jQuery(this).find('.aione-megamenu-title').length ) {

						var parent_li = jQuery(this);

						jQuery( this ).find( '.sub-menu').each( function() {
							parent_li.after( jQuery( this ) );

						});
						jQuery( this ).remove();
					}
				}
				jQuery( this ).prepend( jQuery( this ).find( '.aione-megamenu-title a, > a' ) );

				jQuery( this ).find( '.aione-megamenu-title' ).remove();
			});
			jQuery( this ).closest( '.mobile-nav-item' ).append( jQuery( this ) );
		});

		jQuery( this ).find( '.aione-megamenu-wrapper, .caret, .aione-megamenu-bullet' ).remove();
	});

	// Make mobile menu sub-menu toggles
	if( js_local_vars.submenu_slideout == 1 ) {
		jQuery('.header-wrapper .mobile-topnav-holder .mobile-topnav li, .header-wrapper .mobile-nav-holder .navigation li, .sticky-header .mobile-nav-holder .navigation li').each(function() {
			var classes = 'mobile-nav-item';

			if(jQuery(this).hasClass('current-menu-item') || jQuery(this).hasClass('current-menu-parent') || jQuery(this).hasClass('current-menu-ancestor') || jQuery(this).hasClass('mobile-current-nav-item')) {
				classes += ' mobile-current-nav-item';
			}
			jQuery( this ).attr( 'class', classes );

			if( jQuery( this ).find( ' > ul' ).length ) {
				jQuery( this ).prepend('<span href="#" aria-haspopup="true" class="open-submenu"></span>' );

				jQuery( this ).find( ' > ul' ).hide();
			}
		});

		jQuery('.header-wrapper .mobile-topnav-holder .open-submenu, .header-wrapper .mobile-nav-holder .open-submenu, .sticky-header .mobile-nav-holder .open-submenu').click( function(e) {

			e.stopPropagation();
			jQuery( this ).parent().children( '.sub-menu' ).slideToggle(240,'easeOutQuad');

		});
	}

	jQuery( '.mobile-menu-icons .aioneicon-bars' ).click(function() {
		jQuery('.header-wrapper #mobile-nav').slideToggle(240,'easeOutQuad');
	});

	jQuery( '.mobile-menu-icons .aioneicon-search' ).click(function() {
		jQuery('.header-wrapper .mobile-header-search').slideToggle(240,'easeOutQuad');
	});

	// adjust mobile menu when it falls to 2 rows
	var mobile_menu_sep_added = false;

	function adjust_mobile_menu_settings() {
		var menu_width = 0;

		if( Modernizr.mq( 'only screen and (max-width: 800px)' ) ) {
			jQuery( '.top-menu #snav' ).children( 'li' ).each( function() {
				menu_width += jQuery( this ).outerWidth( true ) + 2;
			});

			if( menu_width > jQuery( window ).width() && jQuery( window ).width() > 318 ) {
				if( ! mobile_menu_sep_added ) {
					jQuery( '.top-menu #snav' ).append( '<div class="mobile-menu-sep"></div>' );
					jQuery( '.top-menu #snav' ).css( 'position', 'relative' );
					jQuery( '.mobile-menu-sep' ).css( {
						'position': 'absolute',
						'top': jQuery( '.top-menu #snav li' ).height() - 1 + 'px',
						'width': '100%',
						'border-bottom-width': '1px',
						'border-bottom-style': 'solid'
					});
					mobile_menu_sep_added = true;
				}
			} else {
				jQuery( '.top-menu #snav' ).css( 'position', '' );
				jQuery( '.top-menu #snav' ).find( '.mobile-menu-sep' ).remove();
				mobile_menu_sep_added = false;
			}
		} else {
			jQuery( '.top-menu #snav' ).css( 'position', '' );
			jQuery( '.top-menu #snav' ).find( '.mobile-menu-sep' ).remove();
			mobile_menu_sep_added = false;
		}
	}

	adjust_mobile_menu_settings();

	jQuery( window ).on( 'resize', function() {
		adjust_mobile_menu_settings();
	});

	// One page scrolling effect
	var adminbar_height = 0;
	var sticky_height = 0;

	if( jQuery( '#wpadminbar' ).length ) {
		adminbar_height = parseInt( jQuery( '#wpadminbar' ).outerHeight() );
	}

	jQuery(window).on('resize', function() {
		if( jQuery( '#wpadminbar' ).length ) {
			adminbar_height = parseInt( jQuery( '#wpadminbar' ).outerHeight() );
		}
	});

	if( jQuery( '.sticky-header' ).length ) {
		if( jQuery( '.tfs_parallax' ).length ) {
			sticky_height = 62;
		} else {
			sticky_height = 65;
		}
	}

	jQuery('.aione-navbar-nav a:not([href=#], .aione-megamenu-widgets-container a, .search-link), .top-menu .menu a:not([href=#]), .mobile-nav-item a:not([href=#], .search-link), a.aione-button:not([href=#]), a.aione-one-page-text-link:not([href=#])').click(function() {

		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || location.hostname == this.hostname) {

			var target = jQuery(this.hash);
			target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
			if (target.length && this.hash.slice(1) != '' ) {
				 jQuery('html, body').animate({
					 scrollTop: target.offset().top - sticky_height
				}, 850, 'easeInOutExpo');
				return false;
			}
		}
	});

	var scrollspy_target = '.nav-holder .aione-navbar-nav li > a';
	var sticky_scroll = sticky_height;

	if( jQuery( '.tfs_parallax' ).length ) {
		if( jQuery( '.header-v1' ).length ) {
			sticky_scroll = 65 + jQuery( '.header-v1' ).height() + adminbar_height + 20;
		} else {
			sticky_scroll = 65;
		}
	}

	jQuery('body').scrollspy({
		target: scrollspy_target,
		offset: parseInt( adminbar_height + sticky_scroll )
	});

	// side nav drop downs
	jQuery('.side-nav-left .side-nav li').each(function() {
		if(jQuery(this).find('> .children').length) {
			if( jQuery( '.rtl' ).length ) {
				jQuery(this).find('> a').prepend('<span class="arrow"></span>');
			} else {
				jQuery(this).find('> a').append('<span class="arrow"></span>');
			}
		}
	});

	jQuery('.side-nav-right .side-nav li').each(function() {
		if(jQuery(this).find('> .children').length) {
			if( jQuery( '.rtl' ).length ) {
				jQuery(this).find('> a').append('<span class="arrow"></span>');
			} else {
				jQuery(this).find('> a').prepend('<span class="arrow"></span>');
			}
		}
	});

	jQuery('.side-nav .current_page_item').each(function() {
		if(jQuery(this).find('.children').length ){
			jQuery(this).find('.children').show('slow');
		}
	});

	jQuery('.side-nav .current_page_item').each(function() {
		if(jQuery(this).parent().hasClass('side-nav')) {
			jQuery(this).find('ul').show('slow');
		}

		if(jQuery(this).parent().hasClass('children')){
			jQuery(this).parents('ul').show('slow');
		}
	});

	if ('ontouchstart' in document.documentElement || navigator.msMaxTouchPoints) {
		jQuery('.nav-holder li.menu-item-has-children > a, .order-dropdown > li .current-li').on("click", function (e) {
			var link = jQuery(this);
			if (link.hasClass('hover')) {
				link.removeClass("hover");
				return true;
			} else {
				link.addClass("hover");
				jQuery('.nav-holder li.menu-item-has-children > a, .order-dropdown > li .current-li').not(this).removeClass("hover");
				e.preventDefault();
				return false;
			}
		});


		jQuery('.sub-menu li, .mobile-nav-item li').not('li.menu-item-has-children').on("click", function (e) {
			var link = jQuery(this).find('a').attr('href');
			window.location = link;

	  		return true;
		});
	}

	// Touch support for win phone devices
	jQuery('#nav li a, .top-menu li a, #sticky-nav li a, .side-nav li a, .mobile-nav-item a').each(function() {
		jQuery(this).attr('aria-haspopup', 'true');
	});

	// Ubermenu responsive fix
	if(jQuery('.megaResponsive').length >= 1) {
		jQuery('.mobile-nav-holder.main-menu').addClass('set-invisible');
	}

	// WPML search form input add
	if( js_local_vars.language_flag != '') {
		jQuery('.search-field, #searchform').each( function() {
			if( ! jQuery( this ).find( 'input[name="lang"]' ).length && ! jQuery( this ).parents( '#searchform' ).find( 'input[name="lang"]' ).length ) {
				jQuery( this ).append('<input type="hidden" name="lang" value="'+js_local_vars.language_flag+'"/>');
			}
		});
	}

	jQuery( '#wrapper .share-box' ).each( function() {
		if( ! jQuery( 'meta[property="og:title"]' ).length ) {
			jQuery( 'head title' ).after( '<meta property="og:title" content="' + jQuery( this ).data( 'title' )  + '"/>' );
			jQuery( 'head title' ).after( '<meta property="og:description" content="' + jQuery( this ).data( 'description' )  + '"/>' );
			jQuery( 'head title' ).after( '<meta property="og:type" content="article"/>' );
			jQuery( 'head title' ).after( '<meta property="og:url" content="' + jQuery( this ).data( 'link' )  + '"/>' );
			jQuery( 'head title' ).after( '<meta property="og:image" content="' + jQuery( this ).data( 'image' )  + '"/>' );
		}
	});

	sharebox_h4_width = jQuery('#wrapper .share-box h4').outerWidth();
	sharebox_ul = jQuery('.share-box ul').outerWidth();
	// social share box alignment on resize
	if( sharebox_h4_width + sharebox_ul > jQuery('.post-content').width() && ! jQuery('.single-aione_portfolio').length ) {
		jQuery('#wrapper .share-box').css('height', 'auto');
		jQuery('#wrapper .share-box h4').css('float', 'none').css('line-height', '20px').css('padding-bottom', '25px').css('padding-top', '25px');
		jQuery('.share-box ul').css('float', 'none').css('margin-top', '0').css('overflow', 'hidden').css('padding', '0 25px 25px');
	} else {
		jQuery('#wrapper .share-box').css( 'height', '' );
	}

	// Chrome soical icons drop to second row bug quirks
	header_social_social_networks = 0;
	jQuery('.header-social .social-networks li').each(function() {
		header_social_social_networks += jQuery(this).outerWidth(true);
	});
	if(header_social_social_networks > jQuery('.header-social .social-networks').css('max-width')) {
		header_social_social_networks = jQuery('.header-social .social-networks').css('max-width');
	}

	jQuery(window).on('resize', function() {
		jQuery('.title').each(function(index) {
			if(special_titles_width[index] > jQuery(this).parent().width()) {
				jQuery(this).addClass('border-below-title');
			} else {
				jQuery(this).removeClass('border-below-title');
			}
		});

		// social share box alignment on resize
		if( sharebox_h4_width + sharebox_ul > jQuery('#content').width() ) {
			jQuery('#wrapper .share-box').css('height', 'auto');
			jQuery('#wrapper .share-box h4').css('float', 'none').css('line-height', '20px').css('padding-bottom', '25px').css('padding-top', '25px');
			jQuery('.share-box ul').css('float', 'none').css('margin-top', '0').css('overflow', 'hidden').css('padding', '0 25px 25px');
		} else {
			jQuery('#wrapper .share-box').css( 'height', '' );
			//jQuery('#wrapper .share-box, #wrapper .share-box h4, .share-box ul').attr("style", "");
		}

		// Chrome soical icons drop to second row bug quirks
		if(jQuery(window).width() >= 784) {
			jQuery('.header-social .social-networks').css('width', header_social_social_networks);
		} else {
			jQuery('.header-social .social-networks').css('width', '');
		}
	});

	/* search icon show/hide */
	jQuery(document).click(function() {
		jQuery('.main-nav-search-form').hide();
	});
	jQuery('.main-nav-search-form').click(function(e) {
		e.stopPropagation();
	});
	jQuery('.main-nav-search .search-link').click(function(e) {
		e.stopPropagation();
		if(jQuery(this).parent().find('.main-nav-search-form').css('display') == 'block') {
			jQuery(this).parent().find('.main-nav-search-form').hide();
		} else {
			jQuery(this).parent().find('.main-nav-search-form').show();
		}
	});

	var special_titles_width = [];
	jQuery('.title').each(function(index) {
		special_titles_width[index] = jQuery(this).width();
		if(jQuery(this).find('h1,h2,h3,h4,h5,h6').width() > jQuery(this).parent().width()) {
			jQuery(this).addClass('border-below-title');
		}
	});


	// Tabs
	// On page load
	// Direct linked tab handling
	jQuery( '.aione-tabs' ).each( function() {
		if( document.location.hash && jQuery( this ).find( '.nav-tabs li a[href="' + document.location.hash + '"]' ).length ) {
			jQuery( this ).find( '.nav-tabs li' ).removeClass( 'active' );
			jQuery( this ).find( '.nav-tabs li a[href="' + document.location.hash + '"]' ).parent().addClass( 'active' );

			jQuery( this ).find( '.tab-content .tab-pane' ).removeClass( 'in' ).removeClass( 'active' );
			jQuery( this ).find( '.tab-content .tab-pane[id="' + document.location.hash.split('#')[1]  + '"]' ).addClass( 'in' ).addClass( 'active' );
		}

		if( document.location.hash && jQuery( this ).find( '.nav-tabs li a[id="' + window.location.href.split('#')[1] + '"]' ).length ) {
			jQuery( this ).find( '.nav-tabs li' ).removeClass( 'active' );
			jQuery( this ).find( '.nav-tabs li a[id="' + window.location.href.split('#')[1] + '"]' ).parent().addClass( 'active' );

			jQuery( this ).find( '.tab-content .tab-pane' ).removeClass( 'in' ).removeClass( 'active' );
			jQuery( this ).find( '.tab-content .tab-pane[id="' + jQuery( this ).find( '.nav-tabs li a[id="' + window.location.href.split('#')[1] + '"]' ).attr( 'href' ).split('#')[1] + '"]' ).addClass( 'in' ).addClass( 'active' );
		}
	});

	//On Click Event
	jQuery(".nav-tabs li").click(function(e) {
		var clicked_tab = jQuery(this);
		var tab_content_to_activate = jQuery(this).find("a").attr("href");
		var map_id = clicked_tab.attr('id');

		setTimeout( function(){
			clicked_tab.parents( '.aione-tabs' ).find( tab_content_to_activate ).find( '.shortcode-map' ).each(function() {
				var map_id = jQuery(this).attr('id');
				window['aione_run_map_' + map_id]();
			});

			if( clicked_tab.parents( '.aione-tabs' ).find( tab_content_to_activate ).find( '.es-carousel-wrapper' ).length ) {
				generateCarousel();
			}

			clicked_tab.parents( '.aione-tabs' ).find( tab_content_to_activate ).find( '.portfolio' ).each( function() {
				jQuery( this).find( '.portfolio-wrapper' ).isotope( 'layout' );
			});


			if( clicked_tab.parents( '.aione-tabs' ).find( tab_content_to_activate ).find( '.flexslider' ).length ) {
				jQuery( window ).trigger( 'resize' );
			}

			clicked_tab.parents( '.aione-tabs' ).find( tab_content_to_activate ).find( '.aione-blog-shortcode' ).each( function() {
				if( jQuery( this ).find( '.grid-layout' ).hasClass( 'grid-layout-3' ) ) {
					var gridwidth = ( jQuery( this ).find( '.grid-layout-3' ).width() / 3 ) - 30;
				} else if( jQuery( this ).find( '.grid-layout' ).hasClass( 'grid-layout-4' ) )  {
					var gridwidth = ( jQuery( this ).find( '.grid-layout-4' ).width() / 4 ) - 35;
				} else {
					var gridwidth = ( jQuery( this ).find( '.grid-layout' ).width() / 2 ) - 22;
				}

				jQuery( this ).find( '.grid-layout .post' ).css('width', gridwidth);

				jQuery( this ).find( '.grid-layout' ).isotope( 'option', {
					isOriginLeft: jQuery( '.rtl' ).length ? false : true,
					masonry: {
						columnWidth: gridwidth,
						gutter: 40
					}
				});

				jQuery( this ).find( '.grid-layout' ).isotope();
			});
		}, 350);

		e.preventDefault();
	});

	// Tabs Widget
	jQuery( '.tabs-widget .tabset li a' ).click( function( e ) {
		e.preventDefault();
	});

	// When page loads
	jQuery( '.tabs-widget' ).each(function() {
		jQuery( this ).find( '.tabset li:first' ).addClass( 'active' ).show(); //Activate first tab
		jQuery( this ).find( '.tab_content:first' ).show(); //Show first tab content
	});

	//On Click Event
	jQuery( '.tabs-widget .tabset li' ).click(function(e) {
		var tab_to_activate = jQuery( this ).find( 'a' ).attr( 'href' );

		jQuery( this ).parent().find( ' > li' ).removeClass( 'active' ); //Remove all 'active' classes
		jQuery( this ).addClass( 'active' ); // Add 'active' class to selected tab

		jQuery( this ).parents( '.tabs-widget' ).find( '.tab_content' ).hide(); //Hide all tab content
		jQuery( this ).parents( '.tabs-widget' ).find( tab_to_activate ).fadeIn(); //Fade in the new active tab content
	});

	jQuery('.woocommerce .images #carousel a').click(function(e) {
		e.preventDefault();
	});

	jQuery('.tooltip-shortcode, .author_social .social-networks li, #footer .social-networks li, .footer-area .social-networks li, .sidebar .social-networks li, .social_links_shortcode li, .share-box li, .social-icon, .social li').mouseenter(function(e){
		jQuery(this).find('.popup').hoverFlow(e.type, {
			'opacity' :'show'
		});
	});

	jQuery('.tooltip-shortcode, .author_social .social-networks li, #footer .social-networks li, .footer-area .social-networks li, .sidebar .social-networks li, .social_links_shortcode li, .share-box li, .social-icon, .social li').mouseleave(function(e){
		jQuery(this).find('.popup').hoverFlow(e.type, {
			'opacity' :'hide'
		});
	});

	jQuery('.portfolio-tabs a').click(function(e){
		e.preventDefault();

		var selector = jQuery(this).attr('data-filter');
		jQuery(this).parents('.portfolio').find('.portfolio-wrapper').isotope({ filter: selector });

		jQuery(this).parents('ul').find('li').removeClass('active');
		jQuery(this).parent().addClass('active');
	});

	jQuery('.faq-tabs a').click(function(e){
		e.preventDefault();

		var selector = jQuery(this).attr('data-filter');

		jQuery('.faqs .portfolio-wrapper .faq-item').fadeOut();
		jQuery('.faqs .portfolio-wrapper .faq-item'+selector).fadeIn();

		jQuery(this).parents('ul').find('li').removeClass('active');
		jQuery(this).parent().addClass('active');
	});

	function isScrolledIntoView(elem)
	{
		var docViewTop = jQuery(window).scrollTop();
		var docViewBottom = docViewTop + jQuery(window).height();

		var elemTop = jQuery(elem).offset().top;
		var elemBottom = elemTop + jQuery(elem).height();

		return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
	}

	jQuery('.aione-alert .close').click(function(e) {
		e.preventDefault();

		jQuery(this).parent().slideUp();
	});

	jQuery('input, textarea').placeholder();

	function checkForImage(url) {
		return(url.match(/\.(jpeg|jpg|gif|png)$/) != null);
	}

	if(Modernizr.mq('only screen and (max-width: 479px)')) {
		jQuery('.overlay-full.layout-text-left .slide-excerpt p').each(function () {
			var excerpt = jQuery(this).html();
			var wordArray = excerpt.split(/[\s\.\?]+/); //Split based on regular expression for spaces
			var maxWords = 10; //max number of words
			var total_words = wordArray.length; //current total of words
			var newString = "";
			//Roll back the textarea value with the words that it had previously before the maximum was reached
			if (total_words > maxWords+1) {
				 for (var i = 0; i < maxWords; i++) {
					newString += wordArray[i] + " ";
				}
				jQuery(this).html(newString);
			}
		});

		jQuery('.portfolio .gallery-icon').each(function () {
			var img = jQuery(this).attr('href');

			if(checkForImage(img) == true) {
				jQuery(this).parents('.image').find('> img').attr('src', img).attr('width', '').attr('height', '');
			}
			jQuery(this).parents('.portfolio-item').css('width', 'auto');
			jQuery(this).parents('.portfolio-item').css('height', 'auto');
			jQuery(this).parents('.portfolio-one:not(.portfolio-one-text)').find('.portfolio-item').css('margin', '0');
		});

		if(jQuery('.portfolio').length >= 1) {
			jQuery('.portfolio-wrapper').isotope();
		}
	}

	if(Modernizr.mq('only screen and (max-width: 800px)')) {
		jQuery('.tabs-vertical').addClass('tabs-horizontal').removeClass('tabs-vertical');
	}

	jQuery(window).on('resize', function() {
		if(Modernizr.mq('only screen and (max-width: 800px)')) {
			jQuery('.tabs-vertical').addClass('tabs-original-vertical');
			jQuery('.tabs-vertical').addClass('tabs-horizontal').removeClass('tabs-vertical');
		} else {
			jQuery('.tabs-original-vertical').removeClass('tabs-horizontal').addClass('tabs-vertical');
		}
	});

	// Woocommerce
	jQuery('.catalog-ordering .orderby .current-li a').html(jQuery('.catalog-ordering .orderby ul li.current a').html());
	jQuery('.catalog-ordering .sort-count .current-li a').html(jQuery('.catalog-ordering .sort-count ul li.current a').html());
	jQuery('.woocommerce #calc_shipping_state').parent().addClass('aione-column aione-one-half');
	jQuery('.woocommerce #calc_shipping_postcode').parent().addClass('aione-column aione-one-half last');
	jQuery('.woocommerce .shop_table .variation dd').after('<br />');
	jQuery('.woocommerce .aione-myaccount-data th.order-actions').text(js_local_vars.order_actions);

	jQuery( '.rtl .woocommerce .wc-forward' ).each( function() {
		var checkout_button = jQuery( this );
		checkout_button.val( '\u2190 ' + checkout_button.val().replace( '\u2192', '' ) );
	});

	var aione_myaccount_active = jQuery('.aione-myaccount-nav').find('.active a');

	if(aione_myaccount_active.hasClass('address') ) {
		jQuery('.aione-myaccount-data .edit_address_heading').fadeIn();
	} else {
		jQuery('.aione-myaccount-data h2:nth-of-type(1)').fadeIn();
	}

	if(aione_myaccount_active.hasClass('downloads') ) {
		jQuery('.aione-myaccount-data .digital-downloads').fadeIn();
	} else if(aione_myaccount_active.hasClass('orders') ) {
		jQuery('.aione-myaccount-data .my_account_orders').fadeIn();
	} else if(aione_myaccount_active ) {
		jQuery('.aione-myaccount-data .myaccount_address, .aione-myaccount-data .addresses').fadeIn();
	}

	jQuery('.rtl .aione-myaccount-data .my_account_orders .order-status').each( function() {
		jQuery( this ).css( 'text-align', 'right' );
	});

	jQuery('.woocommerce input').each(function() {
		if(!jQuery(this).has('#coupon_code')) {
			name = jQuery(this).attr('id');
			jQuery(this).attr('placeholder', jQuery(this).parent().find('label[for='+name+']').text());
		}
	});


	if(jQuery('.woocommerce #reviews #comments .comment_container .comment-text').length ) {
		jQuery('.woocommerce #reviews #comments .comment_container').append('<div class="clear"></div>');
	}

	if( jQuery('.woocommerce.single-product .related.products > h2').length ) {
		jQuery('.woocommerce.single-product .related.products > h2').addClass( 'title-heading-left' );
		jQuery('.woocommerce.single-product .related.products > h2').wrap( '<div class="aione-title title"></div>' );
		jQuery('.woocommerce.single-product .related.products > .title').append( '<div class="title-sep-container"><div class="title-sep sep-double"></div></div>' );
	}

	if( jQuery('.woocommerce.single-product .upsells.products > h2').length ) {
		jQuery('.woocommerce.single-product .upsells.products > h2').wrap( '<div class="title"></div>' );
		jQuery('.woocommerce.single-product .upsells.products > h2').wrap( '<div class="aione-title title"></div>' );
		jQuery('.woocommerce.single-product .upsells.products > .title').append( '<div class="title-sep-container"><div class="title-sep sep-double"></div></div>' );
	}

	if(jQuery('body .sidebar').css('display') == "block") {
		jQuery('body').addClass('has-sidebar');
		calcTabsLayout('.woocommerce-tabs .tabs-horizontal');
	}

	jQuery('.sidebar .products,.footer-area .products,#slidingbar-area .products').each(function() {
		jQuery(this).removeClass('products-4');
		jQuery(this).removeClass('products-3');
		jQuery(this).removeClass('products-2');
		jQuery(this).addClass('products-1');
	});

	jQuery('.products-6 li, .products-5 li, .products-4 li, .products-3 li, .products-3 li').removeClass('last');

	// Woocommerce nested products plugin support
	jQuery( '.subcategory-products' ).each( function() {
		jQuery( this ).addClass( 'products-' + js_local_vars.woocommerce_shop_page_columns );
	});

	jQuery('.woocommerce-tabs ul.tabs li a').unbind( 'click' );
	jQuery('.woocommerce-tabs > ul.tabs li a').click(function(){

		var $tab = $(this);
		var $tabs_wrapper = $tab.closest('.woocommerce-tabs');

		$('ul.tabs li', $tabs_wrapper).removeClass('active');
		$('div.panel', $tabs_wrapper).hide();
		$('div' + $tab.attr('href'), $tabs_wrapper).show();
		$tab.parent().addClass('active');

		return false;
	});


	jQuery('.woocommerce-checkout-nav a,.continue-checkout').click(function(e) {
		e.preventDefault();

		if( ! jQuery( '.woocommerce .aione-checkout' ).find( '.woocommerce-invalid' ).is( ':visible' ) ) {
			var data_name = $(this).attr('data-name');
			var name = data_name;
			if(data_name != '#order_review') {
				name = '.' + data_name;
			}

			jQuery('form.checkout .col-1, form.checkout .col-2, form.checkout #order_review_heading, form.checkout #order_review').hide();

			jQuery('form.checkout').find(name).fadeIn();
			if(name == '#order_review') {
				jQuery('form.checkout').find('#order_review_heading').fadeIn();
			}

			jQuery('.woocommerce-checkout-nav li').removeClass('active');
			jQuery('.woocommerce-checkout-nav').find('[data-name='+data_name+']').parent().addClass('active');

			if( jQuery( this ).hasClass( 'continue-checkout' ) && jQuery( window ).scrollTop() > 0 ) {
				jQuery('html, body').animate({scrollTop: jQuery( '.woocommerce-content-box.aione-checkout' ).offset().top - adminbar_height - sticky_height }, 500);
			}
		}
	});


	jQuery('.aione-myaccount-nav a').click(function(e) {
		e.preventDefault();

		jQuery('.aione-myaccount-data h2, .aione-myaccount-data .digital-downloads, .aione-myaccount-data .my_account_orders, .aione-myaccount-data .myaccount_address, .aione-myaccount-data .addresses, .aione-myaccount-data .edit-account-heading, .aione-myaccount-data .edit-account-form').hide();

		if(jQuery(this).hasClass('downloads') ) {
			jQuery('.aione-myaccount-data h2:nth-of-type(1), .aione-myaccount-data .digital-downloads').fadeIn();
		} else if(jQuery(this).hasClass('orders') ) {

			if( jQuery(this).parents('.aione-myaccount-nav').find('.downloads').length ) {
				heading = jQuery('.aione-myaccount-data h2:nth-of-type(2)');
			} else {
				heading = jQuery('.aione-myaccount-data h2:nth-of-type(1)');
			}

			heading.fadeIn();
			jQuery('.aione-myaccount-data .my_account_orders').fadeIn();
		} else if(jQuery(this).hasClass('address') ) {

			if( jQuery(this).parents('.aione-myaccount-nav').find('.downloads').length && jQuery(this).parents('.aione-myaccount-nav').find('.orders').length ) {
				heading = jQuery('.aione-myaccount-data h2:nth-of-type(3)');
			} else if( jQuery(this).parents('.aione-myaccount-nav').find('.downloads').length || jQuery(this).parents('.aione-myaccount-nav').find('.orders').length ) {
				heading = jQuery('.aione-myaccount-data h2:nth-of-type(2)');
			} else {
				heading = jQuery('.aione-myaccount-data h2:nth-of-type(1)');
			}

			heading.fadeIn();
			jQuery('.aione-myaccount-data .myaccount_address, .aione-myaccount-data .addresses').fadeIn();
		} else if(jQuery(this).hasClass('account') ) {
			jQuery('.aione-myaccount-data .edit-account-heading, .aione-myaccount-data .edit-account-form').fadeIn();
		}

		jQuery('.aione-myaccount-nav li').removeClass('active');
		jQuery(this).parent().addClass('active');
	});

	jQuery('a.add_to_cart_button').click(function(e) {
		var link = this;
		jQuery(link).closest('.product').find('.cart-loading').find('i').removeClass('aioneicon-check-square-o').addClass('aioneicon-spinner');
		jQuery(this).closest('.product').find('.cart-loading').fadeIn();
		setTimeout(function(){
			jQuery(link).closest('.product').find('.product-images img').animate({opacity: 0.75});
			jQuery(link).closest('.product').find('.cart-loading').find('i').hide().removeClass('aioneicon-spinner').addClass('aioneicon-check-square-o').fadeIn();

			setTimeout(function(){
				jQuery(link).closest('.product').find('.cart-loading').fadeOut().closest('.product').find('.product-images img').animate({opacity: 1});;
			}, 2000);
		}, 2000);
	});

	jQuery('li.product').mouseenter(function() {
		if(jQuery(this).find('.cart-loading').find('i').hasClass('aioneicon-check-square-o')) {
			jQuery(this).find('.cart-loading').fadeIn();
		}
	}).mouseleave(function() {
		if(jQuery(this).find('.cart-loading').find('i').hasClass('aioneicon-check-square-o')) {
			jQuery(this).find('.cart-loading').fadeOut();
		}
	});

	jQuery( '.cart-collaterals #calc_shipping_country, .widget_layered_nav select').wrap('<p class="aione-select-parent"></p>').after('<div class="select-arrow">&#xe61f;</div>');
	jQuery( '.cart-collaterals #calc_shipping_state' ).after('<div class="select-arrow">&#xe61f;</div>');

	if( ! jQuery( '#billing_country_field .chosen-container').length ) {
		jQuery( '#billing_country_field 	select.country_select').wrap('<p class="aione-select-parent"></p>').after('<span class="select-arrow">&#xe61f;</span>');
		jQuery( '#billing_state_field select.state_select').wrap('<div class="aione-select-parent"></div>').after('<div class="select-arrow">&#xe61f;</div>');
	}

	if( ! jQuery( '#shipping_country_field .chosen-container').length ) {
		jQuery( '#shipping_country_field select.country_select').wrap('<p class="aione-select-parent"></p>').after('<span class="select-arrow">&#xe61f;</span>');
		jQuery( '#shipping_state_field select.state_select').wrap('<div class="aione-select-parent"></div>').after('<div class="select-arrow">&#xe61f;</div>');
	}

	jQuery( "#calc_shipping_country" ).change(function() {

		if( jQuery('.aione-shipping-calculator-form #calc_shipping_state.input-text').length) {
			jQuery('.aione-shipping-calculator-form #calc_shipping_state').parent().children('.select-arrow').hide();
		} else {
			jQuery('.aione-shipping-calculator-form #calc_shipping_state').parent().children('.select-arrow').show();
		}

		calc_select_arrow_dimensions();
	});

	jQuery( "#billing_country" ).change(function() {

		if( jQuery( '#billing_state_field .chosen-container').length ) {
			jQuery( '#billing_state_field .aione-select-parent' ).hide();
		} else {
			jQuery( '#billing_state_field .aione-select-parent' ).show();
		}

		if( jQuery('#billing_state_field input').length) {
			jQuery('#billing_state_field .select-arrow').hide();
		} else {
			jQuery('#billing_state_field .select-arrow').show();
		}
	});

	jQuery( "#shipping_country" ).change(function() {

		if( jQuery( '#shipping_country_field .chosen-container').length ) {
			jQuery( '#shipping_country_field .aione-select-parent' ).hide();
		} else {
			jQuery( '#shipping_country_field .aione-select-parent' ).show();
		}

		if( jQuery('#shipping_state_field input').length) {
			jQuery('#shipping_state_field .select-arrow').hide();
		} else {
			jQuery('#shipping_state_field .select-arrow').show();
		}
	});

	// wrap variation forms select and add arrow
	jQuery('table.variations select').wrap('<div class="aione-select-parent"></div>');
	jQuery('<div class="select-arrow">&#xe61f;</div>').appendTo('table.variations .aione-select-parent');

	// wrap cf7 select and add arrow
	jQuery('.wpcf7-select:not([multiple])').wrap('<div class="wpcf7-select-parent"></div>');
	jQuery('<div class="select-arrow">&#xe61f;</div>').appendTo('.wpcf7-select-parent');

	// wrap gravity forms select and add arrow
	jQuery('.gform_wrapper select:not([multiple])').each( function() {
		var select_width = jQuery( this ).css('width');
		jQuery( this ).wrap('<div class="gravity-select-parent"></div>');
		jQuery( this ).parent().width( select_width );
		jQuery( this ).css( 'cssText', "width: 100% !important;" );
		jQuery('<div class="select-arrow">&#xe61f;</div>').appendTo( jQuery( this ).parent( '.gravity-select-parent' ) );
	});

	// wrap woo and bbpress select and add arrow
	jQuery('#bbp_stick_topic_select, #bbp_topic_status_select, #bbp_forum_id, #bbp_destination_topic').wrap('<div class="aione-select-parent"></div>').after('<div class="select-arrow">&#xe61f;</div>');

	jQuery('.variations_form select').change(function() {
		if ( jQuery('.product #slider').length ) {
			jQuery('.product #slider').flexslider(0);
		}
	});

	// wrap category and archive widget dropdowns
	jQuery('.widget_categories select, .widget_archive select ').css( 'width', '100%' );
	jQuery('.widget_categories select, .widget_archive select ').wrap('<div class="aione-select-parent"></div>').after('<div class="select-arrow">&#xe61f;</div>');

	// BBPress
	jQuery( '.bbp-template-notice' ).each( function() {
		if( jQuery( this ).hasClass( 'info' ) ) {
			jQuery( this ).attr( 'class', 'aione-alert alert notice alert-dismissable alert-info alert-shadow' );
		} else {
			jQuery( this ).attr( 'class', 'aione-alert alert notice alert-dismissable alert-warning alert-shadow' );
		}
		jQuery( this ).children( 'tt' ).contents().unwrap();
		jQuery( this ).children( 'p' ).contents().unwrap();
		jQuery( this ).prepend( '<button class="close toggle-alert" aria-hidden="true" data-dismiss="alert" type="button">&times;</button><span class="alert-icon"><i class="fa fa-lg fa-lg fa-cog"></i></span>' );

		jQuery( this ).children( '.close' ).click(function(e) {
			e.preventDefault();

			jQuery(this).parent().slideUp();
		});
	});

	jQuery( '.bbp-login-form' ).each( function() {
		jQuery( this ).children( 'tt' ).contents().unwrap();
	});

    // Text area climit expandability
    jQuery( '.textarea-comment' ).each( function() {
		jQuery( this ).css( 'max-width', jQuery( '#content').width() );
    });

});

// set heights of select arrows correctly
jQuery(window).load(function() {
	calc_select_arrow_dimensions();
});

function calc_select_arrow_dimensions() {
	jQuery( '.aione-select-parent .select-arrow, .gravity-select-parent .select-arrow, .wpcf7-select-parent .select-arrow' ).each( function() {
		if( jQuery( this ).prev().innerHeight() > 0 ) {
			jQuery( this ).css( {
				height: jQuery( this ).prev().innerHeight(),
				width: jQuery( this ).prev().innerHeight(),
				'line-height': jQuery( this ).prev().innerHeight() + 'px'
			});
		}
	});
}

// unwrap gravity selects that get a chzn field appended on the fly
jQuery(document).bind('gform_post_conditional_logic', function(){
	var select = jQuery('.gform_wrapper select');
	jQuery(select).each(function() {
		if(jQuery(this).hasClass('chzn-done') && jQuery(this).parent().hasClass('gravity-select-parent')) {
			jQuery(this).parent().find('.select-arrow').remove();
			jQuery(this).unwrap('<div class="gravity-select-parent"></div>');
		}
	});
});



/*!
 * Bootstrap v3.1.1 (http://getbootstrap.com)
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * scrollspy.js
 * modified by OXOSolutions 2014
 */

+function ($) {
  'use strict';

  // SCROLLSPY CLASS DEFINITION
  // ==========================

  function ScrollSpy(element, options) {
	var href;
	var process  = $.proxy(this.process, this);

	this.$element	   = $(element).is('body') ? $(window) : $(element);
	this.$body		  = $('body');
	this.$scrollElement = this.$element.on('scroll.bs.scroll-spy.data-api', process);
	this.options		= $.extend({}, ScrollSpy.DEFAULTS, options);
	this.selector	   = (this.options.target
	  || ((href = $(element).attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '')) //strip for ie7
	  || '');
	this.offsets		= $([]);
	this.targets		= $([]);
	this.activeTarget   = null;

	this.refresh();
	this.process();
  }

  ScrollSpy.DEFAULTS = {
	offset: 10
  };

  ScrollSpy.prototype.refresh = function () {
	var offsetMethod = this.$element[0] == window ? 'offset' : 'position';

	this.offsets = $([]);
	this.targets = $([]);

	var self	 = this;
	var $targets = this.$body
	  .find(this.selector)
	  .map(function () {
		var $el   = $(this);
		var href  = $el.data('target') || $el.attr('href');
		var $href = /^#./.test(href) && $(href);

		return ($href
		  && $href.length
		  && $href.is(':visible')
		  && [[ $href[offsetMethod]().top + (!$.isWindow(self.$scrollElement.get(0)) && self.$scrollElement.scrollTop()), href ]]) || null;
	  })
	  .sort(function (a, b) { return a[0] - b[0]; })
	  .each(function () {
		self.offsets.push(this[0]);
		self.targets.push(this[1]);
	  });
  };

  ScrollSpy.prototype.process = function () {
	var scrollTop	= this.$scrollElement.scrollTop() + this.options.offset;
	var scrollHeight = this.$scrollElement[0].scrollHeight || this.$body[0].scrollHeight;
	var maxScroll	= scrollHeight - this.$scrollElement.height();
	var offsets	  = this.offsets;
	var targets	  = this.targets;
	var activeTarget = this.activeTarget;
	var i;

	if (scrollTop >= maxScroll) {
	  return activeTarget != (i = targets.last()[0]) && this.activate(i);
	}

	for (i = offsets.length; i--;) {
	  activeTarget != targets[i]
		&& scrollTop >= offsets[i]
		&& (!offsets[i + 1] || scrollTop <= offsets[i + 1])
		&& this.activate( targets[i] );
	}
  };

  ScrollSpy.prototype.activate = function (target) {
	this.activeTarget = target;

	$(this.selector)
	  .parents('.current-menu-item')
	  .removeClass('current-menu-item');

	var selector = this.selector +
		'[data-target="' + target + '"],' +
		this.selector + '[href="' + target + '"]';

	var active = $(selector)
	  .parents('li')
	  .addClass('current-menu-item');

	if (active.parent('.sub-menu').length) {
	  active = active
		.closest('li.aione-dropdown-menu')
		.addClass('current-menu-item');
	}

	active.trigger('activate.bs.scrollspy');
  };


  // SCROLLSPY PLUGIN DEFINITION
  // ===========================

  var old = $.fn.scrollspy;

  $.fn.scrollspy = function (option) {
	return this.each(function () {
	  var $this   = $(this);
	  var data	= $this.data('bs.scrollspy');
	  var options = typeof option == 'object' && option;

	  if (!data) $this.data('bs.scrollspy', (data = new ScrollSpy(this, options)));
	  if (typeof option == 'string') data[option]();
	});
  };

  $.fn.scrollspy.Constructor = ScrollSpy;


  // SCROLLSPY NO CONFLICT
  // =====================

  $.fn.scrollspy.noConflict = function () {
	$.fn.scrollspy = old;
	return this;
  };


  // SCROLLSPY DATA-API
  // ==================

  $(window).on('load', function () {
	$('[data-spy="scroll"]').each(function () {
	  var $spy = $(this);
	  $spy.scrollspy($spy.data());
	});
  });

}(jQuery);

// Generated by CoffeeScript 1.6.2
/*
jQuery Waypoints - v2.0.3
Copyright (c) 2011-2013 Caleb Troughton
Dual licensed under the MIT license and GPL license.
https://github.com/imakewebthings/jquery-waypoints/blob/master/licenses.txt
*/


(function() {
  var __indexOf = [].indexOf || function(item) { for (var i = 0, l = this.length; i < l; i++) { if (i in this && this[i] === item) return i; } return -1; },
	__slice = [].slice;

  (function(root, factory) {
	if (typeof define === 'function' && define.amd) {
	  return define('waypoints', ['jquery'], function($) {
		return factory($, root);
	  });
	} else {
	  return factory(root.jQuery, root);
	}
  })(this, function($, window) {
	var $w, Context, Waypoint, allWaypoints, contextCounter, contextKey, contexts, isTouch, jQMethods, methods, resizeEvent, scrollEvent, waypointCounter, waypointKey, wp, wps;

	$w = $(window);
	isTouch = __indexOf.call(window, 'ontouchstart') >= 0;
	allWaypoints = {
	  horizontal: {},
	  vertical: {}
	};
	contextCounter = 1;
	contexts = {};
	contextKey = 'waypoints-context-id';
	resizeEvent = 'resize.waypoints';
	scrollEvent = 'scroll.waypoints';
	waypointCounter = 1;
	waypointKey = 'waypoints-waypoint-ids';
	wp = 'waypoint';
	wps = 'waypoints';
	Context = (function() {
	  function Context($element) {
		var _this = this;

		this.$element = $element;
		this.element = $element[0];
		this.didResize = false;
		this.didScroll = false;
		this.id = 'context' + contextCounter++;
		this.oldScroll = {
		  x: $element.scrollLeft(),
		  y: $element.scrollTop()
		};
		this.waypoints = {
		  horizontal: {},
		  vertical: {}
		};
		$element.data(contextKey, this.id);
		contexts[this.id] = this;
		$element.bind(scrollEvent, function() {
		  var scrollHandler;

		  if (!(_this.didScroll || isTouch)) {
			_this.didScroll = true;
			scrollHandler = function() {
			  _this.doScroll();
			  return _this.didScroll = false;
			};
			return window.setTimeout(scrollHandler, $[wps].settings.scrollThrottle);
		  }
		});
		$element.bind(resizeEvent, function() {
		  var resizeHandler;

		  if (!_this.didResize) {
			_this.didResize = true;
			resizeHandler = function() {
			  $[wps]('refresh');
			  return _this.didResize = false;
			};
			return window.setTimeout(resizeHandler, $[wps].settings.resizeThrottle);
		  }
		});
	  }

	  Context.prototype.doScroll = function() {
		var axes,
		  _this = this;

		axes = {
		  horizontal: {
			newScroll: this.$element.scrollLeft(),
			oldScroll: this.oldScroll.x,
			forward: 'right',
			backward: 'left'
		  },
		  vertical: {
			newScroll: this.$element.scrollTop(),
			oldScroll: this.oldScroll.y,
			forward: 'down',
			backward: 'up'
		  }
		};
		if (isTouch && (!axes.vertical.oldScroll || !axes.vertical.newScroll)) {
		  $[wps]('refresh');
		}
		$.each(axes, function(aKey, axis) {
		  var direction, isForward, triggered;

		  triggered = [];
		  isForward = axis.newScroll > axis.oldScroll;
		  direction = isForward ? axis.forward : axis.backward;
		  $.each(_this.waypoints[aKey], function(wKey, waypoint) {
			var _ref, _ref1;

			if ((axis.oldScroll < (_ref = waypoint.offset) && _ref <= axis.newScroll)) {
			  return triggered.push(waypoint);
			} else if ((axis.newScroll < (_ref1 = waypoint.offset) && _ref1 <= axis.oldScroll)) {
			  return triggered.push(waypoint);
			}
		  });
		  triggered.sort(function(a, b) {
			return a.offset - b.offset;
		  });
		  if (!isForward) {
			triggered.reverse();
		  }
		  return $.each(triggered, function(i, waypoint) {
			if (waypoint.options.continuous || i === triggered.length - 1) {
			  return waypoint.trigger([direction]);
			}
		  });
		});
		return this.oldScroll = {
		  x: axes.horizontal.newScroll,
		  y: axes.vertical.newScroll
		};
	  };

	  Context.prototype.refresh = function() {
		var axes, cOffset, isWin,
		  _this = this;

		isWin = $.isWindow(this.element);
		cOffset = this.$element.offset();
		this.doScroll();
		axes = {
		  horizontal: {
			contextOffset: isWin ? 0 : cOffset.left,
			contextScroll: isWin ? 0 : this.oldScroll.x,
			contextDimension: this.$element.width(),
			oldScroll: this.oldScroll.x,
			forward: 'right',
			backward: 'left',
			offsetProp: 'left'
		  },
		  vertical: {
			contextOffset: isWin ? 0 : cOffset.top,
			contextScroll: isWin ? 0 : this.oldScroll.y,
			contextDimension: isWin ? $[wps]('viewportHeight') : this.$element.height(),
			oldScroll: this.oldScroll.y,
			forward: 'down',
			backward: 'up',
			offsetProp: 'top'
		  }
		};
		return $.each(axes, function(aKey, axis) {
		  return $.each(_this.waypoints[aKey], function(i, waypoint) {
			var adjustment, elementOffset, oldOffset, _ref, _ref1;

			adjustment = waypoint.options.offset;
			oldOffset = waypoint.offset;
			elementOffset = $.isWindow(waypoint.element) ? 0 : waypoint.$element.offset()[axis.offsetProp];
			if ($.isFunction(adjustment)) {
			  adjustment = adjustment.apply(waypoint.element);
			} else if (typeof adjustment === 'string') {
			  adjustment = parseFloat(adjustment);
			  if (waypoint.options.offset.indexOf('%') > -1) {
				adjustment = Math.ceil(axis.contextDimension * adjustment / 100);
			  }
			}
			waypoint.offset = elementOffset - axis.contextOffset + axis.contextScroll - adjustment;
			if ((waypoint.options.onlyOnScroll && (oldOffset != null)) || !waypoint.enabled) {
			  return;
			}
			if (oldOffset !== null && (oldOffset < (_ref = axis.oldScroll) && _ref <= waypoint.offset)) {
			  return waypoint.trigger([axis.backward]);
			} else if (oldOffset !== null && (oldOffset > (_ref1 = axis.oldScroll) && _ref1 >= waypoint.offset)) {
			  return waypoint.trigger([axis.forward]);
			} else if (oldOffset === null && axis.oldScroll >= waypoint.offset) {
			  return waypoint.trigger([axis.forward]);
			}
		  });
		});
	  };

	  Context.prototype.checkEmpty = function() {
		if ($.isEmptyObject(this.waypoints.horizontal) && $.isEmptyObject(this.waypoints.vertical)) {
		  this.$element.unbind([resizeEvent, scrollEvent].join(' '));
		  return delete contexts[this.id];
		}
	  };

	  return Context;

	})();
	Waypoint = (function() {
	  function Waypoint($element, context, options) {
		var idList, _ref;

		options = $.extend({}, $.fn[wp].defaults, options);
		if (options.offset === 'bottom-in-view') {
		  options.offset = function() {
			var contextHeight;

			contextHeight = $[wps]('viewportHeight');
			if (!$.isWindow(context.element)) {
			  contextHeight = context.$element.height();
			}
			return contextHeight - $(this).outerHeight();
		  };
		}
		this.$element = $element;
		this.element = $element[0];
		this.axis = options.horizontal ? 'horizontal' : 'vertical';
		this.callback = options.handler;
		this.context = context;
		this.enabled = options.enabled;
		this.id = 'waypoints' + waypointCounter++;
		this.offset = null;
		this.options = options;
		context.waypoints[this.axis][this.id] = this;
		allWaypoints[this.axis][this.id] = this;
		idList = (_ref = $element.data(waypointKey)) != null ? _ref : [];
		idList.push(this.id);
		$element.data(waypointKey, idList);
	  }

	  Waypoint.prototype.trigger = function(args) {
		if (!this.enabled) {
		  return;
		}
		if (this.callback != null) {
		  this.callback.apply(this.element, args);
		}
		if (this.options.triggerOnce) {
		  return this.destroy();
		}
	  };

	  Waypoint.prototype.disable = function() {
		return this.enabled = false;
	  };

	  Waypoint.prototype.enable = function() {
		this.context.refresh();
		return this.enabled = true;
	  };

	  Waypoint.prototype.destroy = function() {
		delete allWaypoints[this.axis][this.id];
		delete this.context.waypoints[this.axis][this.id];
		return this.context.checkEmpty();
	  };

	  Waypoint.getWaypointsByElement = function(element) {
		var all, ids;

		ids = $(element).data(waypointKey);
		if (!ids) {
		  return [];
		}
		all = $.extend({}, allWaypoints.horizontal, allWaypoints.vertical);
		return $.map(ids, function(id) {
		  return all[id];
		});
	  };

	  return Waypoint;

	})();
	methods = {
	  init: function(f, options) {
		var _ref;

		if (options == null) {
		  options = {};
		}
		if ((_ref = options.handler) == null) {
		  options.handler = f;
		}
		this.each(function() {
		  var $this, context, contextElement, _ref1;

		  $this = $(this);
		  contextElement = (_ref1 = options.context) != null ? _ref1 : $.fn[wp].defaults.context;
		  if (!$.isWindow(contextElement)) {
			contextElement = $this.closest(contextElement);
		  }
		  contextElement = $(contextElement);
		  context = contexts[contextElement.data(contextKey)];
		  if (!context) {
			context = new Context(contextElement);
		  }
		  return new Waypoint($this, context, options);
		});
		$[wps]('refresh');
		return this;
	  },
	  disable: function() {
		return methods._invoke(this, 'disable');
	  },
	  enable: function() {
		return methods._invoke(this, 'enable');
	  },
	  destroy: function() {
		return methods._invoke(this, 'destroy');
	  },
	  prev: function(axis, selector) {
		return methods._traverse.call(this, axis, selector, function(stack, index, waypoints) {
		  if (index > 0) {
			return stack.push(waypoints[index - 1]);
		  }
		});
	  },
	  next: function(axis, selector) {
		return methods._traverse.call(this, axis, selector, function(stack, index, waypoints) {
		  if (index < waypoints.length - 1) {
			return stack.push(waypoints[index + 1]);
		  }
		});
	  },
	  _traverse: function(axis, selector, push) {
		var stack, waypoints;

		if (axis == null) {
		  axis = 'vertical';
		}
		if (selector == null) {
		  selector = window;
		}
		waypoints = jQMethods.aggregate(selector);
		stack = [];
		this.each(function() {
		  var index;

		  index = $.inArray(this, waypoints[axis]);
		  return push(stack, index, waypoints[axis]);
		});
		return this.pushStack(stack);
	  },
	  _invoke: function($elements, method) {
		$elements.each(function() {
		  var waypoints;

		  waypoints = Waypoint.getWaypointsByElement(this);
		  return $.each(waypoints, function(i, waypoint) {
			waypoint[method]();
			return true;
		  });
		});
		return this;
	  }
	};
	$.fn[wp] = function() {
	  var args, method;

	  method = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
	  if (methods[method]) {
		return methods[method].apply(this, args);
	  } else if ($.isFunction(method)) {
		return methods.init.apply(this, arguments);
	  } else if ($.isPlainObject(method)) {
		return methods.init.apply(this, [null, method]);
	  } else if (!method) {
		return $.error("jQuery Waypoints needs a callback function or handler option.");
	  } else {
		return $.error("The " + method + " method does not exist in jQuery Waypoints.");
	  }
	};
	$.fn[wp].defaults = {
	  context: window,
	  continuous: true,
	  enabled: true,
	  horizontal: false,
	  offset: 0,
	  triggerOnce: false
	};
	jQMethods = {
	  refresh: function() {
		return $.each(contexts, function(i, context) {
		  return context.refresh();
		});
	  },
	  viewportHeight: function() {
		var _ref;

		return (_ref = window.innerHeight) != null ? _ref : $w.height();
	  },
	  aggregate: function(contextSelector) {
		var collection, waypoints, _ref;

		collection = allWaypoints;
		if (contextSelector) {
		  collection = (_ref = contexts[$(contextSelector).data(contextKey)]) != null ? _ref.waypoints : void 0;
		}
		if (!collection) {
		  return [];
		}
		waypoints = {
		  horizontal: [],
		  vertical: []
		};
		$.each(waypoints, function(axis, arr) {
		  $.each(collection[axis], function(key, waypoint) {
			return arr.push(waypoint);
		  });
		  arr.sort(function(a, b) {
			return a.offset - b.offset;
		  });
		  waypoints[axis] = $.map(arr, function(waypoint) {
			return waypoint.element;
		  });
		  return waypoints[axis] = $.unique(waypoints[axis]);
		});
		return waypoints;
	  },
	  above: function(contextSelector) {
		if (contextSelector == null) {
		  contextSelector = window;
		}
		return jQMethods._filter(contextSelector, 'vertical', function(context, waypoint) {
		  return waypoint.offset <= context.oldScroll.y;
		});
	  },
	  below: function(contextSelector) {
		if (contextSelector == null) {
		  contextSelector = window;
		}
		return jQMethods._filter(contextSelector, 'vertical', function(context, waypoint) {
		  return waypoint.offset > context.oldScroll.y;
		});
	  },
	  left: function(contextSelector) {
		if (contextSelector == null) {
		  contextSelector = window;
		}
		return jQMethods._filter(contextSelector, 'horizontal', function(context, waypoint) {
		  return waypoint.offset <= context.oldScroll.x;
		});
	  },
	  right: function(contextSelector) {
		if (contextSelector == null) {
		  contextSelector = window;
		}
		return jQMethods._filter(contextSelector, 'horizontal', function(context, waypoint) {
		  return waypoint.offset > context.oldScroll.x;
		});
	  },
	  enable: function() {
		return jQMethods._invoke('enable');
	  },
	  disable: function() {
		return jQMethods._invoke('disable');
	  },
	  destroy: function() {
		return jQMethods._invoke('destroy');
	  },
	  extendFn: function(methodName, f) {
		return methods[methodName] = f;
	  },
	  _invoke: function(method) {
		var waypoints;

		waypoints = $.extend({}, allWaypoints.vertical, allWaypoints.horizontal);
		return $.each(waypoints, function(key, waypoint) {
		  waypoint[method]();
		  return true;
		});
	  },
	  _filter: function(selector, axis, test) {
		var context, waypoints;

		context = contexts[$(selector).data(contextKey)];
		if (!context) {
		  return [];
		}
		waypoints = [];
		$.each(context.waypoints[axis], function(i, waypoint) {
		  if (test(context, waypoint)) {
			return waypoints.push(waypoint);
		  }
		});
		waypoints.sort(function(a, b) {
		  return a.offset - b.offset;
		});
		return $.map(waypoints, function(waypoint) {
		  return waypoint.element;
		});
	  }
	};
	$[wps] = function() {
	  var args, method;

	  method = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
	  if (jQMethods[method]) {
		return jQMethods[method].apply(null, args);
	  } else {
		return jQMethods.aggregate.call(null, method);
	  }
	};
	$[wps].settings = {
	  resizeThrottle: 100,
	  scrollThrottle: 30
	};
	return $w.load(function() {
	  return $[wps]('refresh');
	});
  });

}).call(this);

/*! http://mths.be/placeholder v2.0.7 by @mathias */
;(function(window, document, $) {

	var isInputSupported = 'placeholder' in document.createElement('input');
	var isTextareaSupported = 'placeholder' in document.createElement('textarea');
	var prototype = $.fn;
	var valHooks = $.valHooks;
	var propHooks = $.propHooks;
	var hooks;
	var placeholder;

	if (isInputSupported && isTextareaSupported) {

		placeholder = prototype.placeholder = function() {
			return this;
		};

		placeholder.input = placeholder.textarea = true;

	} else {

		placeholder = prototype.placeholder = function() {
			var $this = this;
			$this
				.filter((isInputSupported ? 'textarea' : ':input') + '[placeholder]')
				.not('.placeholder')
				.bind({
					'focus.placeholder': clearPlaceholder,
					'blur.placeholder': setPlaceholder
				})
				.data('placeholder-enabled', true)
				.trigger('blur.placeholder');
			return $this;
		};

		placeholder.input = isInputSupported;
		placeholder.textarea = isTextareaSupported;

		hooks = {
			'get': function(element) {
				var $element = $(element);

				var $passwordInput = $element.data('placeholder-password');
				if ($passwordInput) {
					return $passwordInput[0].value;
				}

				return $element.data('placeholder-enabled') && $element.hasClass('placeholder') ? '' : element.value;
			},
			'set': function(element, value) {
				var $element = $(element);

				var $passwordInput = $element.data('placeholder-password');
				if ($passwordInput) {
					return $passwordInput[0].value = value;
				}

				if (!$element.data('placeholder-enabled')) {
					return element.value = value;
				}
				if (value == '') {
					element.value = value;
					// Issue #56: Setting the placeholder causes problems if the element continues to have focus.
					if (element != safeActiveElement()) {
						// We can't use `triggerHandler` here because of dummy text/password inputs :(
						setPlaceholder.call(element);
					}
				} else if ($element.hasClass('placeholder')) {
					clearPlaceholder.call(element, true, value) || (element.value = value);
				} else {
					element.value = value;
				}
				// `set` can not return `undefined`; see http://jsapi.info/jquery/1.7.1/val#L2363
				return $element;
			}
		};

		if (!isInputSupported) {
			valHooks.input = hooks;
			propHooks.value = hooks;
		}
		if (!isTextareaSupported) {
			valHooks.textarea = hooks;
			propHooks.value = hooks;
		}

		$(function() {
			// Look for forms
			$(document).delegate('form', 'submit.placeholder', function() {
				// Clear the placeholder values so they don't get submitted
				var $inputs = $('.placeholder', this).each(clearPlaceholder);
				setTimeout(function() {
					$inputs.each(setPlaceholder);
				}, 10);
			});
		});

		// Clear placeholder values upon page reload
		$(window).bind('beforeunload.placeholder', function() {
			$('.placeholder').each(function() {
				this.value = '';
			});
		});

	}

	function args(elem) {
		// Return an object of element attributes
		var newAttrs = {};
		var rinlinejQuery = /^jQuery\d+$/;
		$.each(elem.attributes, function(i, attr) {
			if (attr.specified && !rinlinejQuery.test(attr.name)) {
				newAttrs[attr.name] = attr.value;
			}
		});
		return newAttrs;
	}

	function clearPlaceholder(event, value) {
		var input = this;
		var $input = $(input);
		if (input.value == $input.attr('placeholder') && $input.hasClass('placeholder')) {
			if ($input.data('placeholder-password')) {
				$input = $input.hide().next().show().attr('id', $input.removeAttr('id').data('placeholder-id'));
				// If `clearPlaceholder` was called from `$.valHooks.input.set`
				if (event === true) {
					return $input[0].value = value;
				}
				$input.focus();
			} else {
				input.value = '';
				$input.removeClass('placeholder');
				input == safeActiveElement() && input.select();
			}
		}
	}

	function setPlaceholder() {
		var $replacement;
		var input = this;
		var $input = $(input);
		var id = this.id;
		if (input.value == '') {
			if (input.type == 'password') {
				if (!$input.data('placeholder-textinput')) {
					try {
						$replacement = $input.clone().attr({ 'type': 'text' });
					} catch(e) {
						$replacement = $('<input>').attr($.extend(args(this), { 'type': 'text' }));
					}
					$replacement
						.removeAttr('name')
						.data({
							'placeholder-password': $input,
							'placeholder-id': id
						})
						.bind('focus.placeholder', clearPlaceholder);
					$input
						.data({
							'placeholder-textinput': $replacement,
							'placeholder-id': id
						})
						.before($replacement);
				}
				$input = $input.removeAttr('id').hide().prev().attr('id', id).show();
				// Note: `$input[0] != input` now!
			}
			$input.addClass('placeholder');
			$input[0].value = $input.attr('placeholder');
		} else {
			$input.removeClass('placeholder');
		}
	}

	function safeActiveElement() {
		// Avoid IE9 `document.activeElement` of death
		// https://github.com/mathiasbynens/jquery-placeholder/pull/99
		try {
			return document.activeElement;
		} catch (err) {}
	}

}(this, document, jQuery));

/*!
 * Isotope PACKAGED v2.0.0
 * Filter & sort magical layouts
 * http://isotope.metafizzy.co
 */

(function(t){function e(){}function i(t){function i(e){e.prototype.option||(e.prototype.option=function(e){t.isPlainObject(e)&&(this.options=t.extend(!0,this.options,e))})}function n(e,i){t.fn[e]=function(n){if("string"==typeof n){for(var s=o.call(arguments,1),a=0,u=this.length;u>a;a++){var p=this[a],h=t.data(p,e);if(h)if(t.isFunction(h[n])&&"_"!==n.charAt(0)){var f=h[n].apply(h,s);if(void 0!==f)return f}else r("no such method '"+n+"' for "+e+" instance");else r("cannot call methods on "+e+" prior to initialization; "+"attempted to call '"+n+"'")}return this}return this.each(function(){var o=t.data(this,e);o?(o.option(n),o._init()):(o=new i(this,n),t.data(this,e,o))})}}if(t){var r="undefined"==typeof console?e:function(t){console.error(t)};return t.bridget=function(t,e){i(e),n(t,e)},t.bridget}}var o=Array.prototype.slice;"function"==typeof define&&define.amd?define("jquery-bridget/jquery.bridget",["jquery"],i):i(t.jQuery)})(window),function(t){function e(e){var i=t.event;return i.target=i.target||i.srcElement||e,i}var i=document.documentElement,o=function(){};i.addEventListener?o=function(t,e,i){t.addEventListener(e,i,!1)}:i.attachEvent&&(o=function(t,i,o){t[i+o]=o.handleEvent?function(){var i=e(t);o.handleEvent.call(o,i)}:function(){var i=e(t);o.call(t,i)},t.attachEvent("on"+i,t[i+o])});var n=function(){};i.removeEventListener?n=function(t,e,i){t.removeEventListener(e,i,!1)}:i.detachEvent&&(n=function(t,e,i){t.detachEvent("on"+e,t[e+i]);try{delete t[e+i]}catch(o){t[e+i]=void 0}});var r={bind:o,unbind:n};"function"==typeof define&&define.amd?define("eventie/eventie",r):"object"==typeof exports?module.exports=r:t.eventie=r}(this),function(t){function e(t){"function"==typeof t&&(e.isReady?t():r.push(t))}function i(t){var i="readystatechange"===t.type&&"complete"!==n.readyState;if(!e.isReady&&!i){e.isReady=!0;for(var o=0,s=r.length;s>o;o++){var a=r[o];a()}}}function o(o){return o.bind(n,"DOMContentLoaded",i),o.bind(n,"readystatechange",i),o.bind(t,"load",i),e}var n=t.document,r=[];e.isReady=!1,"function"==typeof define&&define.amd?(e.isReady="function"==typeof requirejs,define("doc-ready/doc-ready",["eventie/eventie"],o)):t.docReady=o(t.eventie)}(this),function(){function t(){}function e(t,e){for(var i=t.length;i--;)if(t[i].listener===e)return i;return-1}function i(t){return function(){return this[t].apply(this,arguments)}}var o=t.prototype,n=this,r=n.EventEmitter;o.getListeners=function(t){var e,i,o=this._getEvents();if(t instanceof RegExp){e={};for(i in o)o.hasOwnProperty(i)&&t.test(i)&&(e[i]=o[i])}else e=o[t]||(o[t]=[]);return e},o.flattenListeners=function(t){var e,i=[];for(e=0;t.length>e;e+=1)i.push(t[e].listener);return i},o.getListenersAsObject=function(t){var e,i=this.getListeners(t);return i instanceof Array&&(e={},e[t]=i),e||i},o.addListener=function(t,i){var o,n=this.getListenersAsObject(t),r="object"==typeof i;for(o in n)n.hasOwnProperty(o)&&-1===e(n[o],i)&&n[o].push(r?i:{listener:i,once:!1});return this},o.on=i("addListener"),o.addOnceListener=function(t,e){return this.addListener(t,{listener:e,once:!0})},o.once=i("addOnceListener"),o.defineEvent=function(t){return this.getListeners(t),this},o.defineEvents=function(t){for(var e=0;t.length>e;e+=1)this.defineEvent(t[e]);return this},o.removeListener=function(t,i){var o,n,r=this.getListenersAsObject(t);for(n in r)r.hasOwnProperty(n)&&(o=e(r[n],i),-1!==o&&r[n].splice(o,1));return this},o.off=i("removeListener"),o.addListeners=function(t,e){return this.manipulateListeners(!1,t,e)},o.removeListeners=function(t,e){return this.manipulateListeners(!0,t,e)},o.manipulateListeners=function(t,e,i){var o,n,r=t?this.removeListener:this.addListener,s=t?this.removeListeners:this.addListeners;if("object"!=typeof e||e instanceof RegExp)for(o=i.length;o--;)r.call(this,e,i[o]);else for(o in e)e.hasOwnProperty(o)&&(n=e[o])&&("function"==typeof n?r.call(this,o,n):s.call(this,o,n));return this},o.removeEvent=function(t){var e,i=typeof t,o=this._getEvents();if("string"===i)delete o[t];else if(t instanceof RegExp)for(e in o)o.hasOwnProperty(e)&&t.test(e)&&delete o[e];else delete this._events;return this},o.removeAllListeners=i("removeEvent"),o.emitEvent=function(t,e){var i,o,n,r,s=this.getListenersAsObject(t);for(n in s)if(s.hasOwnProperty(n))for(o=s[n].length;o--;)i=s[n][o],i.once===!0&&this.removeListener(t,i.listener),r=i.listener.apply(this,e||[]),r===this._getOnceReturnValue()&&this.removeListener(t,i.listener);return this},o.trigger=i("emitEvent"),o.emit=function(t){var e=Array.prototype.slice.call(arguments,1);return this.emitEvent(t,e)},o.setOnceReturnValue=function(t){return this._onceReturnValue=t,this},o._getOnceReturnValue=function(){return this.hasOwnProperty("_onceReturnValue")?this._onceReturnValue:!0},o._getEvents=function(){return this._events||(this._events={})},t.noConflict=function(){return n.EventEmitter=r,t},"function"==typeof define&&define.amd?define("eventEmitter/EventEmitter",[],function(){return t}):"object"==typeof module&&module.exports?module.exports=t:this.EventEmitter=t}.call(this),function(t){function e(t){if(t){if("string"==typeof o[t])return t;t=t.charAt(0).toUpperCase()+t.slice(1);for(var e,n=0,r=i.length;r>n;n++)if(e=i[n]+t,"string"==typeof o[e])return e}}var i="Webkit Moz ms Ms O".split(" "),o=document.documentElement.style;"function"==typeof define&&define.amd?define("get-style-property/get-style-property",[],function(){return e}):"object"==typeof exports?module.exports=e:t.getStyleProperty=e}(window),function(t){function e(t){var e=parseFloat(t),i=-1===t.indexOf("%")&&!isNaN(e);return i&&e}function i(){for(var t={width:0,height:0,innerWidth:0,innerHeight:0,outerWidth:0,outerHeight:0},e=0,i=s.length;i>e;e++){var o=s[e];t[o]=0}return t}function o(t){function o(t){if("string"==typeof t&&(t=document.querySelector(t)),t&&"object"==typeof t&&t.nodeType){var o=r(t);if("none"===o.display)return i();var n={};n.width=t.offsetWidth,n.height=t.offsetHeight;for(var h=n.isBorderBox=!(!p||!o[p]||"border-box"!==o[p]),f=0,c=s.length;c>f;f++){var d=s[f],l=o[d];l=a(t,l);var y=parseFloat(l);n[d]=isNaN(y)?0:y}var m=n.paddingLeft+n.paddingRight,g=n.paddingTop+n.paddingBottom,v=n.marginLeft+n.marginRight,_=n.marginTop+n.marginBottom,I=n.borderLeftWidth+n.borderRightWidth,L=n.borderTopWidth+n.borderBottomWidth,z=h&&u,S=e(o.width);S!==!1&&(n.width=S+(z?0:m+I));var b=e(o.height);return b!==!1&&(n.height=b+(z?0:g+L)),n.innerWidth=n.width-(m+I),n.innerHeight=n.height-(g+L),n.outerWidth=n.width+v,n.outerHeight=n.height+_,n}}function a(t,e){if(n||-1===e.indexOf("%"))return e;var i=t.style,o=i.left,r=t.runtimeStyle,s=r&&r.left;return s&&(r.left=t.currentStyle.left),i.left=e,e=i.pixelLeft,i.left=o,s&&(r.left=s),e}var u,p=t("boxSizing");return function(){if(p){var t=document.createElement("div");t.style.width="200px",t.style.padding="1px 2px 3px 4px",t.style.borderStyle="solid",t.style.borderWidth="1px 2px 3px 4px",t.style[p]="border-box";var i=document.body||document.documentElement;i.appendChild(t);var o=r(t);u=200===e(o.width),i.removeChild(t)}}(),o}var n=t.getComputedStyle,r=n?function(t){return n(t,null)}:function(t){return t.currentStyle},s=["paddingLeft","paddingRight","paddingTop","paddingBottom","marginLeft","marginRight","marginTop","marginBottom","borderLeftWidth","borderRightWidth","borderTopWidth","borderBottomWidth"];"function"==typeof define&&define.amd?define("get-size/get-size",["get-style-property/get-style-property"],o):"object"==typeof exports?module.exports=o(require("get-style-property")):t.getSize=o(t.getStyleProperty)}(window),function(t,e){function i(t,e){return t[a](e)}function o(t){if(!t.parentNode){var e=document.createDocumentFragment();e.appendChild(t)}}function n(t,e){o(t);for(var i=t.parentNode.querySelectorAll(e),n=0,r=i.length;r>n;n++)if(i[n]===t)return!0;return!1}function r(t,e){return o(t),i(t,e)}var s,a=function(){if(e.matchesSelector)return"matchesSelector";for(var t=["webkit","moz","ms","o"],i=0,o=t.length;o>i;i++){var n=t[i],r=n+"MatchesSelector";if(e[r])return r}}();if(a){var u=document.createElement("div"),p=i(u,"div");s=p?i:r}else s=n;"function"==typeof define&&define.amd?define("matches-selector/matches-selector",[],function(){return s}):window.matchesSelector=s}(this,Element.prototype),function(t){function e(t,e){for(var i in e)t[i]=e[i];return t}function i(t){for(var e in t)return!1;return e=null,!0}function o(t){return t.replace(/([A-Z])/g,function(t){return"-"+t.toLowerCase()})}function n(t,n,r){function a(t,e){t&&(this.element=t,this.layout=e,this.position={x:0,y:0},this._create())}var u=r("transition"),p=r("transform"),h=u&&p,f=!!r("perspective"),c={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"otransitionend",transition:"transitionend"}[u],d=["transform","transition","transitionDuration","transitionProperty"],l=function(){for(var t={},e=0,i=d.length;i>e;e++){var o=d[e],n=r(o);n&&n!==o&&(t[o]=n)}return t}();e(a.prototype,t.prototype),a.prototype._create=function(){this._transn={ingProperties:{},clean:{},onEnd:{}},this.css({position:"absolute"})},a.prototype.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},a.prototype.getSize=function(){this.size=n(this.element)},a.prototype.css=function(t){var e=this.element.style;for(var i in t){var o=l[i]||i;e[o]=t[i]}},a.prototype.getPosition=function(){var t=s(this.element),e=this.layout.options,i=e.isOriginLeft,o=e.isOriginTop,n=parseInt(t[i?"left":"right"],10),r=parseInt(t[o?"top":"bottom"],10);n=isNaN(n)?0:n,r=isNaN(r)?0:r;var a=this.layout.size;n-=i?a.paddingLeft:a.paddingRight,r-=o?a.paddingTop:a.paddingBottom,this.position.x=n,this.position.y=r},a.prototype.layoutPosition=function(){var t=this.layout.size,e=this.layout.options,i={};e.isOriginLeft?(i.left=this.position.x+t.paddingLeft+"px",i.right=""):(i.right=this.position.x+t.paddingRight+"px",i.left=""),e.isOriginTop?(i.top=this.position.y+t.paddingTop+"px",i.bottom=""):(i.bottom=this.position.y+t.paddingBottom+"px",i.top=""),this.css(i),this.emitEvent("layout",[this])};var y=f?function(t,e){return"translate3d("+t+"px, "+e+"px, 0)"}:function(t,e){return"translate("+t+"px, "+e+"px)"};a.prototype._transitionTo=function(t,e){this.getPosition();var i=this.position.x,o=this.position.y,n=parseInt(t,10),r=parseInt(e,10),s=n===this.position.x&&r===this.position.y;if(this.setPosition(t,e),s&&!this.isTransitioning)return this.layoutPosition(),void 0;var a=t-i,u=e-o,p={},h=this.layout.options;a=h.isOriginLeft?a:-a,u=h.isOriginTop?u:-u,p.transform=y(a,u),this.transition({to:p,onTransitionEnd:{transform:this.layoutPosition},isCleaning:!0})},a.prototype.goTo=function(t,e){this.setPosition(t,e),this.layoutPosition()},a.prototype.moveTo=h?a.prototype._transitionTo:a.prototype.goTo,a.prototype.setPosition=function(t,e){this.position.x=parseInt(t,10),this.position.y=parseInt(e,10)},a.prototype._nonTransition=function(t){this.css(t.to),t.isCleaning&&this._removeStyles(t.to);for(var e in t.onTransitionEnd)t.onTransitionEnd[e].call(this)},a.prototype._transition=function(t){if(!parseFloat(this.layout.options.transitionDuration))return this._nonTransition(t),void 0;var e=this._transn;for(var i in t.onTransitionEnd)e.onEnd[i]=t.onTransitionEnd[i];for(i in t.to)e.ingProperties[i]=!0,t.isCleaning&&(e.clean[i]=!0);if(t.from){this.css(t.from);var o=this.element.offsetHeight;o=null}this.enableTransition(t.to),this.css(t.to),this.isTransitioning=!0};var m=p&&o(p)+",opacity";a.prototype.enableTransition=function(){this.isTransitioning||(this.css({transitionProperty:m,transitionDuration:this.layout.options.transitionDuration}),this.element.addEventListener(c,this,!1))},a.prototype.transition=a.prototype[u?"_transition":"_nonTransition"],a.prototype.onwebkitTransitionEnd=function(t){this.ontransitionend(t)},a.prototype.onotransitionend=function(t){this.ontransitionend(t)};var g={"-webkit-transform":"transform","-moz-transform":"transform","-o-transform":"transform"};a.prototype.ontransitionend=function(t){if(t.target===this.element){var e=this._transn,o=g[t.propertyName]||t.propertyName;if(delete e.ingProperties[o],i(e.ingProperties)&&this.disableTransition(),o in e.clean&&(this.element.style[t.propertyName]="",delete e.clean[o]),o in e.onEnd){var n=e.onEnd[o];n.call(this),delete e.onEnd[o]}this.emitEvent("transitionEnd",[this])}},a.prototype.disableTransition=function(){this.removeTransitionStyles(),this.element.removeEventListener(c,this,!1),this.isTransitioning=!1},a.prototype._removeStyles=function(t){var e={};for(var i in t)e[i]="";this.css(e)};var v={transitionProperty:"",transitionDuration:""};return a.prototype.removeTransitionStyles=function(){this.css(v)},a.prototype.removeElem=function(){this.element.parentNode.removeChild(this.element),this.emitEvent("remove",[this])},a.prototype.remove=function(){if(!u||!parseFloat(this.layout.options.transitionDuration))return this.removeElem(),void 0;var t=this;this.on("transitionEnd",function(){return t.removeElem(),!0}),this.hide()},a.prototype.reveal=function(){delete this.isHidden,this.css({display:""});var t=this.layout.options;this.transition({from:t.hiddenStyle,to:t.visibleStyle,isCleaning:!0})},a.prototype.hide=function(){this.isHidden=!0,this.css({display:""});var t=this.layout.options;this.transition({from:t.visibleStyle,to:t.hiddenStyle,isCleaning:!0,onTransitionEnd:{opacity:function(){this.isHidden&&this.css({display:"none"})}}})},a.prototype.destroy=function(){this.css({position:"",left:"",right:"",top:"",bottom:"",transition:"",transform:""})},a}var r=t.getComputedStyle,s=r?function(t){return r(t,null)}:function(t){return t.currentStyle};"function"==typeof define&&define.amd?define("outlayer/item",["eventEmitter/EventEmitter","get-size/get-size","get-style-property/get-style-property"],n):(t.Outlayer={},t.Outlayer.Item=n(t.EventEmitter,t.getSize,t.getStyleProperty))}(window),function(t){function e(t,e){for(var i in e)t[i]=e[i];return t}function i(t){return"[object Array]"===f.call(t)}function o(t){var e=[];if(i(t))e=t;else if(t&&"number"==typeof t.length)for(var o=0,n=t.length;n>o;o++)e.push(t[o]);else e.push(t);return e}function n(t,e){var i=d(e,t);-1!==i&&e.splice(i,1)}function r(t){return t.replace(/(.)([A-Z])/g,function(t,e,i){return e+"-"+i}).toLowerCase()}function s(i,s,f,d,l,y){function m(t,i){if("string"==typeof t&&(t=a.querySelector(t)),!t||!c(t))return u&&u.error("Bad "+this.constructor.namespace+" element: "+t),void 0;this.element=t,this.options=e({},this.constructor.defaults),this.option(i);var o=++g;this.element.outlayerGUID=o,v[o]=this,this._create(),this.options.isInitLayout&&this.layout()}var g=0,v={};return m.namespace="outlayer",m.Item=y,m.defaults={containerStyle:{position:"relative"},isInitLayout:!0,isOriginLeft:!0,isOriginTop:!0,isResizeBound:!0,isResizingContainer:!0,transitionDuration:"0.4s",hiddenStyle:{opacity:0,transform:"scale(0.001)"},visibleStyle:{opacity:1,transform:"scale(1)"}},e(m.prototype,f.prototype),m.prototype.option=function(t){e(this.options,t)},m.prototype._create=function(){this.reloadItems(),this.stamps=[],this.stamp(this.options.stamp),e(this.element.style,this.options.containerStyle),this.options.isResizeBound&&this.bindResize()},m.prototype.reloadItems=function(){this.items=this._itemize(this.element.children)},m.prototype._itemize=function(t){for(var e=this._filterFindItemElements(t),i=this.constructor.Item,o=[],n=0,r=e.length;r>n;n++){var s=e[n],a=new i(s,this);o.push(a)}return o},m.prototype._filterFindItemElements=function(t){t=o(t);for(var e=this.options.itemSelector,i=[],n=0,r=t.length;r>n;n++){var s=t[n];if(c(s))if(e){l(s,e)&&i.push(s);for(var a=s.querySelectorAll(e),u=0,p=a.length;p>u;u++)i.push(a[u])}else i.push(s)}return i},m.prototype.getItemElements=function(){for(var t=[],e=0,i=this.items.length;i>e;e++)t.push(this.items[e].element);return t},m.prototype.layout=function(){this._resetLayout(),this._manageStamps();var t=void 0!==this.options.isLayoutInstant?this.options.isLayoutInstant:!this._isLayoutInited;this.layoutItems(this.items,t),this._isLayoutInited=!0},m.prototype._init=m.prototype.layout,m.prototype._resetLayout=function(){this.getSize()},m.prototype.getSize=function(){this.size=d(this.element)},m.prototype._getMeasurement=function(t,e){var i,o=this.options[t];o?("string"==typeof o?i=this.element.querySelector(o):c(o)&&(i=o),this[t]=i?d(i)[e]:o):this[t]=0},m.prototype.layoutItems=function(t,e){t=this._getItemsForLayout(t),this._layoutItems(t,e),this._postLayout()},m.prototype._getItemsForLayout=function(t){for(var e=[],i=0,o=t.length;o>i;i++){var n=t[i];n.isIgnored||e.push(n)}return e},m.prototype._layoutItems=function(t,e){function i(){o.emitEvent("layoutComplete",[o,t])}var o=this;if(!t||!t.length)return i(),void 0;this._itemsOn(t,"layout",i);for(var n=[],r=0,s=t.length;s>r;r++){var a=t[r],u=this._getItemLayoutPosition(a);u.item=a,u.isInstant=e||a.isLayoutInstant,n.push(u)}this._processLayoutQueue(n)},m.prototype._getItemLayoutPosition=function(){return{x:0,y:0}},m.prototype._processLayoutQueue=function(t){for(var e=0,i=t.length;i>e;e++){var o=t[e];this._positionItem(o.item,o.x,o.y,o.isInstant)}},m.prototype._positionItem=function(t,e,i,o){o?t.goTo(e,i):t.moveTo(e,i)},m.prototype._postLayout=function(){this.resizeContainer()},m.prototype.resizeContainer=function(){if(this.options.isResizingContainer){var t=this._getContainerSize();t&&(this._setContainerMeasure(t.width,!0),this._setContainerMeasure(t.height,!1))}},m.prototype._getContainerSize=h,m.prototype._setContainerMeasure=function(t,e){if(void 0!==t){var i=this.size;i.isBorderBox&&(t+=e?i.paddingLeft+i.paddingRight+i.borderLeftWidth+i.borderRightWidth:i.paddingBottom+i.paddingTop+i.borderTopWidth+i.borderBottomWidth),t=Math.max(t,0),this.element.style[e?"width":"height"]=t+"px"}},m.prototype._itemsOn=function(t,e,i){function o(){return n++,n===r&&i.call(s),!0}for(var n=0,r=t.length,s=this,a=0,u=t.length;u>a;a++){var p=t[a];p.on(e,o)}},m.prototype.ignore=function(t){var e=this.getItem(t);e&&(e.isIgnored=!0)},m.prototype.unignore=function(t){var e=this.getItem(t);e&&delete e.isIgnored},m.prototype.stamp=function(t){if(t=this._find(t)){this.stamps=this.stamps.concat(t);for(var e=0,i=t.length;i>e;e++){var o=t[e];this.ignore(o)}}},m.prototype.unstamp=function(t){if(t=this._find(t))for(var e=0,i=t.length;i>e;e++){var o=t[e];n(o,this.stamps),this.unignore(o)}},m.prototype._find=function(t){return t?("string"==typeof t&&(t=this.element.querySelectorAll(t)),t=o(t)):void 0},m.prototype._manageStamps=function(){if(this.stamps&&this.stamps.length){this._getBoundingRect();for(var t=0,e=this.stamps.length;e>t;t++){var i=this.stamps[t];this._manageStamp(i)}}},m.prototype._getBoundingRect=function(){var t=this.element.getBoundingClientRect(),e=this.size;this._boundingRect={left:t.left+e.paddingLeft+e.borderLeftWidth,top:t.top+e.paddingTop+e.borderTopWidth,right:t.right-(e.paddingRight+e.borderRightWidth),bottom:t.bottom-(e.paddingBottom+e.borderBottomWidth)}},m.prototype._manageStamp=h,m.prototype._getElementOffset=function(t){var e=t.getBoundingClientRect(),i=this._boundingRect,o=d(t),n={left:e.left-i.left-o.marginLeft,top:e.top-i.top-o.marginTop,right:i.right-e.right-o.marginRight,bottom:i.bottom-e.bottom-o.marginBottom};return n},m.prototype.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},m.prototype.bindResize=function(){this.isResizeBound||(i.bind(t,"resize",this),this.isResizeBound=!0)},m.prototype.unbindResize=function(){this.isResizeBound&&i.unbind(t,"resize",this),this.isResizeBound=!1},m.prototype.onresize=function(){function t(){e.resize(),delete e.resizeTimeout}this.resizeTimeout&&clearTimeout(this.resizeTimeout);var e=this;this.resizeTimeout=setTimeout(t,100)},m.prototype.resize=function(){this.isResizeBound&&this.needsResizeLayout()&&this.layout()},m.prototype.needsResizeLayout=function(){var t=d(this.element),e=this.size&&t;return e&&t.innerWidth!==this.size.innerWidth},m.prototype.addItems=function(t){var e=this._itemize(t);return e.length&&(this.items=this.items.concat(e)),e},m.prototype.appended=function(t){var e=this.addItems(t);e.length&&(this.layoutItems(e,!0),this.reveal(e))},m.prototype.prepended=function(t){var e=this._itemize(t);if(e.length){var i=this.items.slice(0);this.items=e.concat(i),this._resetLayout(),this._manageStamps(),this.layoutItems(e,!0),this.reveal(e),this.layoutItems(i)}},m.prototype.reveal=function(t){var e=t&&t.length;if(e)for(var i=0;e>i;i++){var o=t[i];o.reveal()}},m.prototype.hide=function(t){var e=t&&t.length;if(e)for(var i=0;e>i;i++){var o=t[i];o.hide()}},m.prototype.getItem=function(t){for(var e=0,i=this.items.length;i>e;e++){var o=this.items[e];if(o.element===t)return o}},m.prototype.getItems=function(t){if(t&&t.length){for(var e=[],i=0,o=t.length;o>i;i++){var n=t[i],r=this.getItem(n);r&&e.push(r)}return e}},m.prototype.remove=function(t){t=o(t);var e=this.getItems(t);if(e&&e.length){this._itemsOn(e,"remove",function(){this.emitEvent("removeComplete",[this,e])});for(var i=0,r=e.length;r>i;i++){var s=e[i];s.remove(),n(s,this.items)}}},m.prototype.destroy=function(){var t=this.element.style;t.height="",t.position="",t.width="";for(var e=0,i=this.items.length;i>e;e++){var o=this.items[e];o.destroy()}this.unbindResize(),delete this.element.outlayerGUID,p&&p.removeData(this.element,this.constructor.namespace)},m.data=function(t){var e=t&&t.outlayerGUID;return e&&v[e]},m.create=function(t,i){function o(){m.apply(this,arguments)}return Object.create?o.prototype=Object.create(m.prototype):e(o.prototype,m.prototype),o.prototype.constructor=o,o.defaults=e({},m.defaults),e(o.defaults,i),o.prototype.settings={},o.namespace=t,o.data=m.data,o.Item=function(){y.apply(this,arguments)},o.Item.prototype=new y,s(function(){for(var e=r(t),i=a.querySelectorAll(".js-"+e),n="data-"+e+"-options",s=0,h=i.length;h>s;s++){var f,c=i[s],d=c.getAttribute(n);try{f=d&&JSON.parse(d)}catch(l){u&&u.error("Error parsing "+n+" on "+c.nodeName.toLowerCase()+(c.id?"#"+c.id:"")+": "+l);continue}var y=new o(c,f);p&&p.data(c,t,y)}}),p&&p.bridget&&p.bridget(t,o),o},m.Item=y,m}var a=t.document,u=t.console,p=t.jQuery,h=function(){},f=Object.prototype.toString,c="object"==typeof HTMLElement?function(t){return t instanceof HTMLElement}:function(t){return t&&"object"==typeof t&&1===t.nodeType&&"string"==typeof t.nodeName},d=Array.prototype.indexOf?function(t,e){return t.indexOf(e)}:function(t,e){for(var i=0,o=t.length;o>i;i++)if(t[i]===e)return i;return-1};"function"==typeof define&&define.amd?define("outlayer/outlayer",["eventie/eventie","doc-ready/doc-ready","eventEmitter/EventEmitter","get-size/get-size","matches-selector/matches-selector","./item"],s):t.Outlayer=s(t.eventie,t.docReady,t.EventEmitter,t.getSize,t.matchesSelector,t.Outlayer.Item)}(window),function(t){function e(t){function e(){t.Item.apply(this,arguments)}return e.prototype=new t.Item,e.prototype._create=function(){this.id=this.layout.itemGUID++,t.Item.prototype._create.call(this),this.sortData={}},e.prototype.updateSortData=function(){if(!this.isIgnored){this.sortData.id=this.id,this.sortData["original-order"]=this.id,this.sortData.random=Math.random();var t=this.layout.options.getSortData,e=this.layout._sorters;for(var i in t){var o=e[i];this.sortData[i]=o(this.element,this)}}},e}"function"==typeof define&&define.amd?define("isotope/js/item",["outlayer/outlayer"],e):(t.Isotope=t.Isotope||{},t.Isotope.Item=e(t.Outlayer))}(window),function(t){function e(t,e){function i(t){this.isotope=t,t&&(this.options=t.options[this.namespace],this.element=t.element,this.items=t.filteredItems,this.size=t.size)}return function(){function t(t){return function(){return e.prototype[t].apply(this.isotope,arguments)}}for(var o=["_resetLayout","_getItemLayoutPosition","_manageStamp","_getContainerSize","_getElementOffset","needsResizeLayout"],n=0,r=o.length;r>n;n++){var s=o[n];i.prototype[s]=t(s)}}(),i.prototype.needsVerticalResizeLayout=function(){var e=t(this.isotope.element),i=this.isotope.size&&e;return i&&e.innerHeight!==this.isotope.size.innerHeight},i.prototype._getMeasurement=function(){this.isotope._getMeasurement.apply(this,arguments)},i.prototype.getColumnWidth=function(){this.getSegmentSize("column","Width")},i.prototype.getRowHeight=function(){this.getSegmentSize("row","Height")},i.prototype.getSegmentSize=function(t,e){var i=t+e,o="outer"+e;if(this._getMeasurement(i,o),!this[i]){var n=this.getFirstItemSize();this[i]=n&&n[o]||this.isotope.size["inner"+e]}},i.prototype.getFirstItemSize=function(){var e=this.isotope.filteredItems[0];return e&&e.element&&t(e.element)},i.prototype.layout=function(){this.isotope.layout.apply(this.isotope,arguments)},i.prototype.getSize=function(){this.isotope.getSize(),this.size=this.isotope.size},i.modes={},i.create=function(t,e){function o(){i.apply(this,arguments)}return o.prototype=new i,e&&(o.options=e),o.prototype.namespace=t,i.modes[t]=o,o},i}"function"==typeof define&&define.amd?define("isotope/js/layout-mode",["get-size/get-size","outlayer/outlayer"],e):(t.Isotope=t.Isotope||{},t.Isotope.LayoutMode=e(t.getSize,t.Outlayer))}(window),function(t){function e(t,e){var o=t.create("masonry");return o.prototype._resetLayout=function(){this.getSize(),this._getMeasurement("columnWidth","outerWidth"),this._getMeasurement("gutter","outerWidth"),this.measureColumns();var t=this.cols;for(this.colYs=[];t--;)this.colYs.push(0);this.maxY=0},o.prototype.measureColumns=function(){if(this.getContainerWidth(),!this.columnWidth){var t=this.items[0],i=t&&t.element;this.columnWidth=i&&e(i).outerWidth||this.containerWidth}this.columnWidth+=this.gutter,this.cols=Math.floor((this.containerWidth+this.gutter)/this.columnWidth),this.cols=Math.max(this.cols,1)},o.prototype.getContainerWidth=function(){var t=this.options.isFitWidth?this.element.parentNode:this.element,i=e(t);this.containerWidth=i&&i.innerWidth},o.prototype._getItemLayoutPosition=function(t){t.getSize();var e=t.size.outerWidth%this.columnWidth,o=e&&1>e?"round":"ceil",n=Math[o](t.size.outerWidth/this.columnWidth);n=Math.min(n,this.cols);for(var r=this._getColGroup(n),s=Math.min.apply(Math,r),a=i(r,s),u={x:this.columnWidth*a,y:s},p=s+t.size.outerHeight,h=this.cols+1-r.length,f=0;h>f;f++)this.colYs[a+f]=p;return u},o.prototype._getColGroup=function(t){if(2>t)return this.colYs;for(var e=[],i=this.cols+1-t,o=0;i>o;o++){var n=this.colYs.slice(o,o+t);e[o]=Math.max.apply(Math,n)}return e},o.prototype._manageStamp=function(t){var i=e(t),o=this._getElementOffset(t),n=this.options.isOriginLeft?o.left:o.right,r=n+i.outerWidth,s=Math.floor(n/this.columnWidth);s=Math.max(0,s);var a=Math.floor(r/this.columnWidth);a-=r%this.columnWidth?0:1,a=Math.min(this.cols-1,a);for(var u=(this.options.isOriginTop?o.top:o.bottom)+i.outerHeight,p=s;a>=p;p++)this.colYs[p]=Math.max(u,this.colYs[p])},o.prototype._getContainerSize=function(){this.maxY=Math.max.apply(Math,this.colYs);var t={height:this.maxY};return this.options.isFitWidth&&(t.width=this._getContainerFitWidth()),t},o.prototype._getContainerFitWidth=function(){for(var t=0,e=this.cols;--e&&0===this.colYs[e];)t++;return(this.cols-t)*this.columnWidth-this.gutter},o.prototype.needsResizeLayout=function(){var t=this.containerWidth;return this.getContainerWidth(),t!==this.containerWidth},o}var i=Array.prototype.indexOf?function(t,e){return t.indexOf(e)}:function(t,e){for(var i=0,o=t.length;o>i;i++){var n=t[i];if(n===e)return i}return-1};"function"==typeof define&&define.amd?define("masonry/masonry",["outlayer/outlayer","get-size/get-size"],e):t.Masonry=e(t.Outlayer,t.getSize)}(window),function(t){function e(t,e){for(var i in e)t[i]=e[i];return t}function i(t,i){var o=t.create("masonry"),n=o.prototype._getElementOffset,r=o.prototype.layout,s=o.prototype._getMeasurement;e(o.prototype,i.prototype),o.prototype._getElementOffset=n,o.prototype.layout=r,o.prototype._getMeasurement=s;var a=o.prototype.measureColumns;o.prototype.measureColumns=function(){this.items=this.isotope.filteredItems,a.call(this)};var u=o.prototype._manageStamp;return o.prototype._manageStamp=function(){this.options.isOriginLeft=this.isotope.options.isOriginLeft,this.options.isOriginTop=this.isotope.options.isOriginTop,u.apply(this,arguments)},o}"function"==typeof define&&define.amd?define("isotope/js/layout-modes/masonry",["../layout-mode","masonry/masonry"],i):i(t.Isotope.LayoutMode,t.Masonry)}(window),function(t){function e(t){var e=t.create("fitRows");return e.prototype._resetLayout=function(){this.x=0,this.y=0,this.maxY=0},e.prototype._getItemLayoutPosition=function(t){t.getSize(),0!==this.x&&t.size.outerWidth+this.x>this.isotope.size.innerWidth&&(this.x=0,this.y=this.maxY);var e={x:this.x,y:this.y};return this.maxY=Math.max(this.maxY,this.y+t.size.outerHeight),this.x+=t.size.outerWidth,e},e.prototype._getContainerSize=function(){return{height:this.maxY}},e}"function"==typeof define&&define.amd?define("isotope/js/layout-modes/fit-rows",["../layout-mode"],e):e(t.Isotope.LayoutMode)}(window),function(t){function e(t){var e=t.create("vertical",{horizontalAlignment:0});return e.prototype._resetLayout=function(){this.y=0},e.prototype._getItemLayoutPosition=function(t){t.getSize();var e=(this.isotope.size.innerWidth-t.size.outerWidth)*this.options.horizontalAlignment,i=this.y;return this.y+=t.size.outerHeight,{x:e,y:i}},e.prototype._getContainerSize=function(){return{height:this.y}},e}"function"==typeof define&&define.amd?define("isotope/js/layout-modes/vertical",["../layout-mode"],e):e(t.Isotope.LayoutMode)}(window),function(t){function e(t,e){for(var i in e)t[i]=e[i];return t}function i(t){return"[object Array]"===h.call(t)}function o(t){var e=[];if(i(t))e=t;else if(t&&"number"==typeof t.length)for(var o=0,n=t.length;n>o;o++)e.push(t[o]);else e.push(t);return e}function n(t,e){var i=f(e,t);-1!==i&&e.splice(i,1)}function r(t,i,r,u,h){function f(t,e){return function(i,o){for(var n=0,r=t.length;r>n;n++){var s=t[n],a=i.sortData[s],u=o.sortData[s];if(a>u||u>a){var p=void 0!==e[s]?e[s]:e,h=p?1:-1;return(a>u?1:-1)*h}}return 0}}var c=t.create("isotope",{layoutMode:"masonry",isJQueryFiltering:!0,sortAscending:!0});c.Item=u,c.LayoutMode=h,c.prototype._create=function(){this.itemGUID=0,this._sorters={},this._getSorters(),t.prototype._create.call(this),this.modes={},this.filteredItems=this.items,this.sortHistory=["original-order"];for(var e in h.modes)this._initLayoutMode(e)},c.prototype.reloadItems=function(){this.itemGUID=0,t.prototype.reloadItems.call(this)},c.prototype._itemize=function(){for(var e=t.prototype._itemize.apply(this,arguments),i=0,o=e.length;o>i;i++){var n=e[i];n.id=this.itemGUID++}return this._updateItemsSortData(e),e},c.prototype._initLayoutMode=function(t){var i=h.modes[t],o=this.options[t]||{};this.options[t]=i.options?e(i.options,o):o,this.modes[t]=new i(this)},c.prototype.layout=function(){return!this._isLayoutInited&&this.options.isInitLayout?(this.arrange(),void 0):(this._layout(),void 0)},c.prototype._layout=function(){var t=this._getIsInstant();this._resetLayout(),this._manageStamps(),this.layoutItems(this.filteredItems,t),this._isLayoutInited=!0},c.prototype.arrange=function(t){this.option(t),this._getIsInstant(),this.filteredItems=this._filter(this.items),this._sort(),this._layout()},c.prototype._init=c.prototype.arrange,c.prototype._getIsInstant=function(){var t=void 0!==this.options.isLayoutInstant?this.options.isLayoutInstant:!this._isLayoutInited;return this._isInstant=t,t},c.prototype._filter=function(t){function e(){f.reveal(n),f.hide(r)}var i=this.options.filter;i=i||"*";for(var o=[],n=[],r=[],s=this._getFilterTest(i),a=0,u=t.length;u>a;a++){var p=t[a];if(!p.isIgnored){var h=s(p);h&&o.push(p),h&&p.isHidden?n.push(p):h||p.isHidden||r.push(p)}}var f=this;return this._isInstant?this._noTransition(e):e(),o},c.prototype._getFilterTest=function(t){return s&&this.options.isJQueryFiltering?function(e){return s(e.element).is(t)}:"function"==typeof t?function(e){return t(e.element)}:function(e){return r(e.element,t)}},c.prototype.updateSortData=function(t){this._getSorters(),t=o(t);var e=this.getItems(t);e=e.length?e:this.items,this._updateItemsSortData(e)
},c.prototype._getSorters=function(){var t=this.options.getSortData;for(var e in t){var i=t[e];this._sorters[e]=d(i)}},c.prototype._updateItemsSortData=function(t){for(var e=0,i=t.length;i>e;e++){var o=t[e];o.updateSortData()}};var d=function(){function t(t){if("string"!=typeof t)return t;var i=a(t).split(" "),o=i[0],n=o.match(/^\[(.+)\]$/),r=n&&n[1],s=e(r,o),u=c.sortDataParsers[i[1]];return t=u?function(t){return t&&u(s(t))}:function(t){return t&&s(t)}}function e(t,e){var i;return i=t?function(e){return e.getAttribute(t)}:function(t){var i=t.querySelector(e);return i&&p(i)}}return t}();c.sortDataParsers={parseInt:function(t){return parseInt(t,10)},parseFloat:function(t){return parseFloat(t)}},c.prototype._sort=function(){var t=this.options.sortBy;if(t){var e=[].concat.apply(t,this.sortHistory),i=f(e,this.options.sortAscending);this.filteredItems.sort(i),t!==this.sortHistory[0]&&this.sortHistory.unshift(t)}},c.prototype._mode=function(){var t=this.options.layoutMode,e=this.modes[t];if(!e)throw Error("No layout mode: "+t);return e.options=this.options[t],e},c.prototype._resetLayout=function(){t.prototype._resetLayout.call(this),this._mode()._resetLayout()},c.prototype._getItemLayoutPosition=function(t){return this._mode()._getItemLayoutPosition(t)},c.prototype._manageStamp=function(t){this._mode()._manageStamp(t)},c.prototype._getContainerSize=function(){return this._mode()._getContainerSize()},c.prototype.needsResizeLayout=function(){return this._mode().needsResizeLayout()},c.prototype.appended=function(t){var e=this.addItems(t);if(e.length){var i=this._filterRevealAdded(e);this.filteredItems=this.filteredItems.concat(i)}},c.prototype.prepended=function(t){var e=this._itemize(t);if(e.length){var i=this.items.slice(0);this.items=e.concat(i),this._resetLayout(),this._manageStamps();var o=this._filterRevealAdded(e);this.layoutItems(i),this.filteredItems=o.concat(this.filteredItems)}},c.prototype._filterRevealAdded=function(t){var e=this._noTransition(function(){return this._filter(t)});return this.layoutItems(e,!0),this.reveal(e),t},c.prototype.insert=function(t){var e=this.addItems(t);if(e.length){var i,o,n=e.length;for(i=0;n>i;i++)o=e[i],this.element.appendChild(o.element);var r=this._filter(e);for(this._noTransition(function(){this.hide(r)}),i=0;n>i;i++)e[i].isLayoutInstant=!0;for(this.arrange(),i=0;n>i;i++)delete e[i].isLayoutInstant;this.reveal(r)}};var l=c.prototype.remove;return c.prototype.remove=function(t){t=o(t);var e=this.getItems(t);if(l.call(this,t),e&&e.length)for(var i=0,r=e.length;r>i;i++){var s=e[i];n(s,this.filteredItems)}},c.prototype._noTransition=function(t){var e=this.options.transitionDuration;this.options.transitionDuration=0;var i=t.call(this);return this.options.transitionDuration=e,i},c}var s=t.jQuery,a=String.prototype.trim?function(t){return t.trim()}:function(t){return t.replace(/^\s+|\s+$/g,"")},u=document.documentElement,p=u.textContent?function(t){return t.textContent}:function(t){return t.innerText},h=Object.prototype.toString,f=Array.prototype.indexOf?function(t,e){return t.indexOf(e)}:function(t,e){for(var i=0,o=t.length;o>i;i++)if(t[i]===e)return i;return-1};"function"==typeof define&&define.amd?define(["outlayer/outlayer","get-size/get-size","matches-selector/matches-selector","isotope/js/item","isotope/js/layout-mode","isotope/js/layout-modes/masonry","isotope/js/layout-modes/fit-rows","isotope/js/layout-modes/vertical"],r):t.Isotope=r(t.Outlayer,t.getSize,t.matchesSelector,t.Isotope.Item,t.Isotope.LayoutMode)}(window);

 /*!
 * hoverIntent r7 // 2013.03.11 // jQuery 1.9.1+
 * http://cherne.net/brian/resources/jquery.hoverIntent.html
 *
 * You may use hoverIntent under the terms of the MIT license. Basically that
 * means you are free to use hoverIntent as long as this header is left intact.
 * Copyright 2007, 2013 Brian Cherne
 */

/* hoverIntent is similar to jQuery's built-in "hover" method except that
 * instead of firing the handlerIn function immediately, hoverIntent checks
 * to see if the user's mouse has slowed down (beneath the sensitivity
 * threshold) before firing the event. The handlerOut function is only
 * called after a matching handlerIn.
 *
 * // basic usage ... just like .hover()
 * .hoverIntent( handlerIn, handlerOut )
 * .hoverIntent( handlerInOut )
 *
 * // basic usage ... with event delegation!
 * .hoverIntent( handlerIn, handlerOut, selector )
 * .hoverIntent( handlerInOut, selector )
 *
 * // using a basic configuration object
 * .hoverIntent( config )
 *
 * @param  handlerIn   function OR configuration object
 * @param  handlerOut  function OR selector for delegation OR undefined
 * @param  selector	selector OR undefined
 * @author Brian Cherne <brian(at)cherne(dot)net>
 */
(function($) {
	$.fn.hoverIntent = function(handlerIn,handlerOut,selector) {

		// default configuration values
		var cfg = {
			interval: 100,
			sensitivity: 7,
			timeout: 0
		};

		if ( typeof handlerIn === "object" ) {
			cfg = $.extend(cfg, handlerIn );
		} else if ($.isFunction(handlerOut)) {
			cfg = $.extend(cfg, { over: handlerIn, out: handlerOut, selector: selector } );
		} else {
			cfg = $.extend(cfg, { over: handlerIn, out: handlerIn, selector: handlerOut } );
		}

		// instantiate variables
		// cX, cY = current X and Y position of mouse, updated by mousemove event
		// pX, pY = previous X and Y position of mouse, set by mouseover and polling interval
		var cX, cY, pX, pY;

		// A private function for getting mouse position
		var track = function(ev) {
			cX = ev.pageX;
			cY = ev.pageY;
		};

		// A private function for comparing current and previous mouse position
		var compare = function(ev,ob) {
			ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
			// compare mouse positions to see if they've crossed the threshold
			if ( ( Math.abs(pX-cX) + Math.abs(pY-cY) ) < cfg.sensitivity ) {
				$(ob).off("mousemove.hoverIntent",track);
				// set hoverIntent state to true (so mouseOut can be called)
				ob.hoverIntent_s = 1;
				return cfg.over.apply(ob,[ev]);
			} else {
				// set previous coordinates for next time
				pX = cX; pY = cY;
				// use self-calling timeout, guarantees intervals are spaced out properly (avoids JavaScript timer bugs)
				ob.hoverIntent_t = setTimeout( function(){compare(ev, ob);} , cfg.interval );
			}
		};

		// A private function for delaying the mouseOut function
		var delay = function(ev,ob) {
			ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
			ob.hoverIntent_s = 0;
			return cfg.out.apply(ob,[ev]);
		};

		// A private function for handling mouse 'hovering'
		var handleHover = function(e) {
			// copy objects to be passed into t (required for event object to be passed in IE)
			var ev = jQuery.extend({},e);
			var ob = this;

			// cancel hoverIntent timer if it exists
			if (ob.hoverIntent_t) { ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t); }

			// if e.type == "mouseenter"
			if (e.type == "mouseenter") {
				// set "previous" X and Y position based on initial entry point
				pX = ev.pageX; pY = ev.pageY;
				// update "current" X and Y position based on mousemove
				$(ob).on("mousemove.hoverIntent",track);
				// start polling interval (self-calling timeout) to compare mouse coordinates over time
				if (ob.hoverIntent_s != 1) { ob.hoverIntent_t = setTimeout( function(){compare(ev,ob);} , cfg.interval );}

				// else e.type == "mouseleave"
			} else {
				// unbind expensive mousemove event
				$(ob).off("mousemove.hoverIntent",track);
				// if hoverIntent state is true, then call the mouseOut function after the specified delay
				if (ob.hoverIntent_s == 1) { ob.hoverIntent_t = setTimeout( function(){delay(ev,ob);} , cfg.timeout );}
			}
		};

		// listen for mouseenter and mouseleave
		return this.on({'mouseenter.hoverIntent':handleHover,'mouseleave.hoverIntent':handleHover}, cfg.selector);
	};
})(jQuery);

/*
|--------------------------------------------------------------------------
| UItoTop jQuery Plugin 1.2 by Matt Varone
| http://www.mattvarone.com/web-design/uitotop-jquery-plugin/
|--------------------------------------------------------------------------
*/
(function($){
	$.fn.UItoTop = function(options) {

 		var defaults = {
				text: '',
				min: 200,
				inDelay:600,
				outDelay:400,
	  			containerID: 'toTop',
				containerHoverID: 'toTopHover',
				scrollSpeed: 1200,
				easingType: 'linear'
 			},
			settings = $.extend(defaults, options),
			containerIDhash = '#' + settings.containerID,
			containerHoverIDHash = '#'+settings.containerHoverID;

		$('body').append('<div class="to-top-container"><a href="#" id="'+settings.containerID+'">'+settings.text+'</a></div>');
		$(containerIDhash).hide().on('click.UItoTop',function(){
			$('html, body').animate({scrollTop:0}, settings.scrollSpeed, settings.easingType);
			$('#'+settings.containerHoverID, this).stop().animate({'opacity': 0 }, settings.inDelay, settings.easingType);
			return false;
		})
		.prepend('<span id="'+settings.containerHoverID+'"></span>')
		.hover(function() {
				$(containerHoverIDHash, this).stop().animate({
					'opacity': 1
				}, 600, 'linear');
			}, function() {
				$(containerHoverIDHash, this).stop().animate({
					'opacity': 0
				}, 700, 'linear');
			});

		$(window).scroll(function() {
			var sd = $(window).scrollTop();
			if(typeof document.body.style.maxHeight === "undefined") {
				$(containerIDhash).css({
					'position': 'absolute',
					'top': sd + $(window).height() - 50
				});
			}
			if ( sd > settings.min ) {
				$(containerIDhash).fadeIn(settings.inDelay);
			} else {
				$(containerIDhash).fadeOut(settings.Outdelay);
			}
		});
};
})(jQuery);

(function( window, $, undefined ) {

	/*
	* smartresize: debounced resize event for jQuery
	*
	* latest version and complete README available on Github:
	* https://github.com/louisremi/jquery.smartresize.js
	*
	* Copyright 2011 @louis_remi
	* Licensed under the MIT license.
	*/

	var $event = $.event, resizeTimeout;

	$event.special.smartresize 	= {
		setup: function() {
			$(this).bind( "resize", $event.special.smartresize.handler );
		},
		teardown: function() {
			$(this).unbind( "resize", $event.special.smartresize.handler );
		},
		handler: function( event, execAsap ) {
			// Save the context
			var context = this,
				args 	= arguments;

			// set correct event type
			event.type = "smartresize";

			if ( resizeTimeout ) { clearTimeout( resizeTimeout ); }
			resizeTimeout = setTimeout(function() {
				jQuery.event.handle.apply( context, args );
			}, execAsap === "execAsap"? 0 : 100 );
		}
	};

	$.fn.smartresize 			= function( fn ) {
		return fn ? this.bind( "smartresize", fn ) : this.trigger( "smartresize", ["execAsap"] );
	};

	$.Slideshow 				= function( options, element ) {

		this.$el			= $( element );

		/***** images ****/

		// list of image items
		this.$list			= this.$el.find('ul.ei-slider-large');
		// image items
		this.$imgItems		= this.$list.children('li');
		// total number of items
		this.itemsCount		= this.$imgItems.length;
		// images
		this.$images		= this.$imgItems.find('img:first');

		/***** thumbs ****/

		// thumbs wrapper
		this.$sliderthumbs	= this.$el.find('ul.ei-slider-thumbs').hide();
		// slider elements
		this.$sliderElems	= this.$sliderthumbs.children('li');
		// sliding div
		this.$sliderElem	= this.$sliderthumbs.children('li.ei-slider-element');
		// thumbs
		this.$thumbs		= this.$sliderElems.not('.ei-slider-element');

		// initialize slideshow
		this._init( options );

	};

	$.Slideshow.defaults 		= {
		// animation types:
		// "sides" : new slides will slide in from left / right
		// "center": new slides will appear in the center
		animation			: 'sides', // sides || center
		// if true the slider will automatically slide, and it will only stop if the user clicks on a thumb
		autoplay			: false,
		// interval for the slideshow
		slideshow_interval	: 3000,
		// speed for the sliding animation
		speed			: 800,
		// easing for the sliding animation
		easing			: '',
		// percentage of speed for the titles animation. Speed will be speed * titlesFactor
		titlesFactor		: 0.60,
		// titles animation speed
		titlespeed			: 800,
		// titles animation easing
		titleeasing			: '',
		// maximum width for the thumbs in pixels
		thumbMaxWidth		: 150
	};

	$.Slideshow.prototype 		= {
		_init 				: function( options ) {

			this.options 		= $.extend( true, {}, $.Slideshow.defaults, options );

			// set the opacity of the title elements and the image items
			this.$imgItems.css( 'opacity', 0 );
			this.$imgItems.find('div.ei-title > *').css( 'opacity', 0 );

			// index of current visible slider
			this.current		= 0;

			var _self			= this;

			// preload images
			// add loading status
			this.$loading		= $('<div class="ei-slider-loading">Loading</div>').prependTo( _self.$el );

			$.when( this._preloadImages() ).done( function() {

				// hide loading status
				_self.$loading.hide();

				// calculate size and position for each image
				_self._setImagesSize();

				// configure thumbs container
				_self._initThumbs();

				// show first
				_self.$imgItems.eq( _self.current ).css({
					'opacity' 	: 1,
					'z-index'	: 10
				}).show().find('div.ei-title > *').css( 'opacity', 1 );

				// if autoplay is true
				if( _self.options.autoplay ) {

					_self._startSlideshow();

				}

				// initialize the events
				_self._initEvents();

			});

		},
		_preloadImages		: function() {

			// preloads all the large images

			var _self	= this,
				loaded	= 0;

			return $.Deferred(

				function(dfd) {

					_self.$images.each( function( i ) {

						$('<img/>').load( function() {

							if( ++loaded === _self.itemsCount ) {

								dfd.resolve();

							}

						}).attr( 'src', $(this).attr('src') );

					});

				}

			).promise();

		},
		_setImagesSize		: function() {

			// save ei-slider's width
			this.elWidth	= this.$el.width();

			var _self	= this;

			this.$images.each( function( i ) {

				var $img	= $(this);
					imgDim	= _self._getImageDim( $img.attr('src') );

				$img.css({
					width		: imgDim.width,
					height		: imgDim.height,
					marginLeft	: imgDim.left,
					marginTop	: imgDim.top
				});

			});

		},
		_getImageDim		: function( src ) {

			var $img	= new Image();

			$img.src	= src;

			var c_w		= this.elWidth,
				c_h		= this.$el.height(),
				r_w		= c_h / c_w,

				i_w		= $img.width,
				i_h		= $img.height,
				r_i		= i_h / i_w,
				new_w, new_h, new_left, new_top;

			if( r_w > r_i ) {

				new_h	= c_h;
				new_w	= c_h / r_i;

			}
			else {

				new_h	= c_w * r_i;
				new_w	= c_w;

			}

			return {
				width	: new_w,
				height	: new_h,
				left	: ( c_w - new_w ) / 2,
				top		: ( c_h - new_h ) / 2
			};

		},
		_initThumbs			: function() {

			// set the max-width of the slider elements to the one set in the plugin's options
			// also, the width of each slider element will be 100% / total number of elements
			this.$sliderElems.css({
				'max-width' : this.options.thumbMaxWidth + 'px',
				'width'		: 100 / this.itemsCount + '%'
			});

			// set the max-width of the slider and show it
			this.$sliderthumbs.css( 'max-width', this.options.thumbMaxWidth * this.itemsCount + 'px' ).show();

		},
		_startSlideshow		: function() {

			var _self	= this;

			this.slideshow	= setTimeout( function() {

				var pos;

				( _self.current === _self.itemsCount - 1 ) ? pos = 0 : pos = _self.current + 1;

				_self._slideTo( pos );

				if( _self.options.autoplay ) {

					_self._startSlideshow();

				}

			}, this.options.slideshow_interval);

		},
		// shows the clicked thumb's slide
		_slideTo			: function( pos ) {

			// return if clicking the same element or if currently animating
			if( pos === this.current || this.isAnimating )
				return false;

			this.isAnimating	= true;

			var $currentSlide	= this.$imgItems.eq( this.current ),
				$nextSlide		= this.$imgItems.eq( pos ),
				_self			= this,

				preCSS			= {zIndex	: 10},
				animCSS			= {opacity	: 1};

			// new slide will slide in from left or right side
			if( this.options.animation === 'sides' ) {

				preCSS.left		= ( pos > this.current ) ? -1 * this.elWidth : this.elWidth;
				animCSS.left	= 0;

			}

			// titles animation
			$nextSlide.find('div.ei-title > h2')
					  .css( 'margin-right', 50 + 'px' )
					  .stop()
					  .delay( this.options.speed * this.options.titlesFactor )
					  .animate({ marginRight : 0 + 'px', opacity : 1 }, this.options.titlespeed, this.options.titleeasing )
					  .end()
					  .find('div.ei-title > h3')
					  .css( 'margin-right', -50 + 'px' )
					  .stop()
					  .delay( this.options.speed * this.options.titlesFactor )
					  .animate({ marginRight : 0 + 'px', opacity : 1 }, this.options.titlespeed, this.options.titleeasing );

			$.when(

				// fade out current titles
				$currentSlide.css( 'z-index' , 1 ).find('div.ei-title > *').stop().fadeOut( this.options.speed / 2, function() {
					// reset style
					$(this).show().css( 'opacity', 0 );
				}),

				// animate next slide in
				$nextSlide.css( preCSS ).stop().animate( animCSS, this.options.speed, this.options.easing ),

				// "sliding div" moves to new position
				this.$sliderElem.stop().animate({
					left	: this.$thumbs.eq( pos ).position().left
				}, this.options.speed )

			).done( function() {

				// reset values
				$currentSlide.css( 'opacity' , 0 ).find('div.ei-title > *').css( 'opacity', 0 );
					_self.current	= pos;
					_self.isAnimating		= false;

				});

		},
		_initEvents			: function() {

			var _self	= this;

			// window resize
			$(window).on( 'smartresize.eislideshow', function( event ) {

				// resize the images
				_self._setImagesSize();

				// reset position of thumbs sliding div
				_self.$sliderElem.css( 'left', _self.$thumbs.eq( _self.current ).position().left );

			});

			// click the thumbs
			this.$thumbs.on( 'click.eislideshow', function( event ) {

				if( _self.options.autoplay ) {

					clearTimeout( _self.slideshow );
					_self.options.autoplay	= false;

				}

				var $thumb	= $(this),
					idx		= $thumb.index() - 1; // exclude sliding div

				_self._slideTo( idx );

				return false;

			});

		}
	};

	var logError 				= function( message ) {

		if ( this.console ) {

			console.error( message );

		}

	};

	$.fn.eislideshow			= function( options ) {

		if ( typeof options === 'string' ) {

			var args = Array.prototype.slice.call( arguments, 1 );

			this.each(function() {

				var instance = $.data( this, 'eislideshow' );

				if ( !instance ) {
					logError( "cannot call methods on eislideshow prior to initialization; " +
					"attempted to call method '" + options + "'" );
					return;
				}

				if ( !$.isFunction( instance[options] ) || options.charAt(0) === "_" ) {
					logError( "no such method '" + options + "' for eislideshow instance" );
					return;
				}

				instance[ options ].apply( instance, args );

			});

		}
		else {

			this.each(function() {

				var instance = $.data( this, 'eislideshow' );
				if ( !instance ) {
					$.data( this, 'eislideshow', new $.Slideshow( options, this ) );
				}

			});

		}

		return this;

	};

})( window, jQuery );

/*!
 * jQuery Cycle Lite Plugin
 * http://malsup.com/jquery/cycle/lite/
 * Copyright (c) 2008-2012 M. Alsup
 * Version: 1.7 (20-FEB-2013)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 * Requires: jQuery v1.3.2 or later
 */
;(function($) {
"use strict";

var ver = 'Lite-1.7';
var msie = /MSIE/.test(navigator.userAgent);

$.fn.cycle = function(options) {
	return this.each(function() {
		options = options || {};

		if (this.cycleTimeout)
			clearTimeout(this.cycleTimeout);

		this.cycleTimeout = 0;
		this.cyclePause = 0;

		var $cont = $(this);
		var $slides = options.slideExpr ? $(options.slideExpr, this) : $cont.children();
		var els = $slides.get();
		if (els.length < 2) {
			return; // don't bother
		}

		// support metadata plugin (v1.0 and v2.0)
		var opts = $.extend({}, $.fn.cycle.defaults, options || {}, $.metadata ? $cont.metadata() : $.meta ? $cont.data() : {});
		var meta = $.isFunction($cont.data) ? $cont.data(opts.metaAttr) : null;
		if (meta)
			opts = $.extend(opts, meta);

		opts.before = opts.before ? [opts.before] : [];
		opts.after = opts.after ? [opts.after] : [];
		opts.after.unshift(function(){ opts.busy=0; });

		// allow shorthand overrides of width, height and timeout
		var cls = this.className;
		opts.width = parseInt((cls.match(/w:(\d+)/)||[])[1], 10) || opts.width;
		opts.height = parseInt((cls.match(/h:(\d+)/)||[])[1], 10) || opts.height;
		opts.timeout = parseInt((cls.match(/t:(\d+)/)||[])[1], 10) || opts.timeout;

		if ($cont.css('position') == 'static')
			$cont.css('position', 'relative');
		if (opts.width)
			$cont.width(opts.width);
		if (opts.height && opts.height != 'auto')
			$cont.height(opts.height);

		var first = 0;
		$slides.css({position: 'absolute', top:0}).each(function(i) {
			$(this).css('z-index', els.length-i);
		});

		$(els[first]).css('opacity',1).show(); // opacity bit needed to handle reinit case
		if (msie)
			els[first].style.removeAttribute('filter');

		if (opts.fit && opts.width)
			$slides.width(opts.width);
		if (opts.fit && opts.height && opts.height != 'auto')
			$slides.height(opts.height);
		if (opts.pause)
			$cont.hover(function(){this.cyclePause=1;}, function(){this.cyclePause=0;});

		var txFn = $.fn.cycle.transitions[opts.fx];
		if (txFn)
			txFn($cont, $slides, opts);

		$slides.each(function() {
			var $el = $(this);
			this.cycleH = (opts.fit && opts.height) ? opts.height : $el.height();
			this.cycleW = (opts.fit && opts.width) ? opts.width : $el.width();
		});

		if (opts.cssFirst)
			$($slides[first]).css(opts.cssFirst);

		if (opts.timeout) {
			// ensure that timeout and speed settings are sane
			if (opts.speed.constructor == String)
				opts.speed = {slow: 600, fast: 200}[opts.speed] || 400;
			if (!opts.sync)
				opts.speed = opts.speed / 2;
			while((opts.timeout - opts.speed) < 250)
				opts.timeout += opts.speed;
		}
		opts.speedIn = opts.speed;
		opts.speedOut = opts.speed;

		opts.slideCount = els.length;
		opts.currSlide = first;
		opts.nextSlide = 1;

		// fire artificial events
		var e0 = $slides[first];
		if (opts.before.length)
			opts.before[0].apply(e0, [e0, e0, opts, true]);
		if (opts.after.length > 1)
			opts.after[1].apply(e0, [e0, e0, opts, true]);

		if (opts.click && !opts.next)
			opts.next = opts.click;
		if (opts.next)
			$(opts.next).unbind('click.cycle').bind('click.cycle', function(){return advance(els,opts,opts.rev?-1:1);});
		if (opts.prev)
			$(opts.prev).unbind('click.cycle').bind('click.cycle', function(){return advance(els,opts,opts.rev?1:-1);});

		if (opts.timeout)
			this.cycleTimeout = setTimeout(function() {
				go(els,opts,0,!opts.rev);
			}, opts.timeout + (opts.delay||0));
	});
};

function go(els, opts, manual, fwd) {
	if (opts.busy)
		return;
	var p = els[0].parentNode, curr = els[opts.currSlide], next = els[opts.nextSlide];
	if (p.cycleTimeout === 0 && !manual)
		return;

	if (manual || !p.cyclePause) {
		if (opts.before.length)
			$.each(opts.before, function(i,o) { o.apply(next, [curr, next, opts, fwd]); });
		var after = function() {
			if (msie)
				this.style.removeAttribute('filter');
			$.each(opts.after, function(i,o) { o.apply(next, [curr, next, opts, fwd]); });
			queueNext(opts);
		};

		if (opts.nextSlide != opts.currSlide) {
			opts.busy = 1;
			$.fn.cycle.custom(curr, next, opts, after);
		}
		var roll = (opts.nextSlide + 1) == els.length;
		opts.nextSlide = roll ? 0 : opts.nextSlide+1;
		opts.currSlide = roll ? els.length-1 : opts.nextSlide-1;
	} else {
	  queueNext(opts);
	}

	function queueNext(opts) {
		if (opts.timeout)
			p.cycleTimeout = setTimeout(function() { go(els,opts,0,!opts.rev); }, opts.timeout);
	}
}

// advance slide forward or back
function advance(els, opts, val) {
	var p = els[0].parentNode, timeout = p.cycleTimeout;
	if (timeout) {
		clearTimeout(timeout);
		p.cycleTimeout = 0;
	}
	opts.nextSlide = opts.currSlide + val;
	if (opts.nextSlide < 0) {
		opts.nextSlide = els.length - 1;
	}
	else if (opts.nextSlide >= els.length) {
		opts.nextSlide = 0;
	}
	go(els, opts, 1, val>=0);
	return false;
}

$.fn.cycle.custom = function(curr, next, opts, cb) {
	var $l = $(curr), $n = $(next);
	$n.css(opts.cssBefore);
	var fn = function() {$n.animate(opts.animIn, opts.speedIn, opts.easeIn, cb);};
	$l.animate(opts.animOut, opts.speedOut, opts.easeOut, function() {
		$l.css(opts.cssAfter);
		if (!opts.sync)
			fn();
	});
	if (opts.sync)
		fn();
};

$.fn.cycle.transitions = {
	fade: function($cont, $slides, opts) {
		$slides.not(':eq(0)').hide();
		opts.cssBefore = { opacity: 0, display: 'block' };
		opts.cssAfter  = { display: 'none' };
		opts.animOut = { opacity: 0 };
		opts.animIn = { opacity: 1 };
	},
	fadeout: function($cont, $slides, opts) {
		opts.before.push(function(curr,next,opts,fwd) {
			$(curr).css('zIndex',opts.slideCount + (fwd === true ? 1 : 0));
			$(next).css('zIndex',opts.slideCount + (fwd === true ? 0 : 1));
		});
		$slides.not(':eq(0)').hide();
		opts.cssBefore = { opacity: 1, display: 'block', zIndex: 1 };
		opts.cssAfter  = { display: 'none', zIndex: 0 };
		opts.animOut = { opacity: 0 };
		opts.animIn = { opacity: 1 };
	}
};

$.fn.cycle.ver = function() { return ver; };

// @see: http://malsup.com/jquery/cycle/lite/
$.fn.cycle.defaults = {
	animIn:		{},
	animOut:	   {},
	fx:		   'fade',
	after:		 null,
	before:		null,
	cssBefore:	 {},
	cssAfter:	  {},
	delay:		 0,
	fit:		   0,
	height:	   'auto',
	metaAttr:	 'cycle',
	next:		  null,
	pause:		 false,
	prev:		  null,
	speed:		 1000,
	slideExpr:	 null,
	sync:		  true,
	timeout:	   4000
};

})(jQuery);

/*!
 * imagesLoaded PACKAGED v3.0.4
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */

(function(){"use strict";function e(){}function t(e,t){for(var n=e.length;n--;)if(e[n].listener===t)return n;return-1}function n(e){return function(){return this[e].apply(this,arguments)}}var i=e.prototype;i.getListeners=function(e){var t,n,i=this._getEvents();if("object"==typeof e){t={};for(n in i)i.hasOwnProperty(n)&&e.test(n)&&(t[n]=i[n])}else t=i[e]||(i[e]=[]);return t},i.flattenListeners=function(e){var t,n=[];for(t=0;e.length>t;t+=1)n.push(e[t].listener);return n},i.getListenersAsObject=function(e){var t,n=this.getListeners(e);return n instanceof Array&&(t={},t[e]=n),t||n},i.addListener=function(e,n){var i,r=this.getListenersAsObject(e),o="object"==typeof n;for(i in r)r.hasOwnProperty(i)&&-1===t(r[i],n)&&r[i].push(o?n:{listener:n,once:!1});return this},i.on=n("addListener"),i.addOnceListener=function(e,t){return this.addListener(e,{listener:t,once:!0})},i.once=n("addOnceListener"),i.defineEvent=function(e){return this.getListeners(e),this},i.defineEvents=function(e){for(var t=0;e.length>t;t+=1)this.defineEvent(e[t]);return this},i.removeListener=function(e,n){var i,r,o=this.getListenersAsObject(e);for(r in o)o.hasOwnProperty(r)&&(i=t(o[r],n),-1!==i&&o[r].splice(i,1));return this},i.off=n("removeListener"),i.addListeners=function(e,t){return this.manipulateListeners(!1,e,t)},i.removeListeners=function(e,t){return this.manipulateListeners(!0,e,t)},i.manipulateListeners=function(e,t,n){var i,r,o=e?this.removeListener:this.addListener,s=e?this.removeListeners:this.addListeners;if("object"!=typeof t||t instanceof RegExp)for(i=n.length;i--;)o.call(this,t,n[i]);else for(i in t)t.hasOwnProperty(i)&&(r=t[i])&&("function"==typeof r?o.call(this,i,r):s.call(this,i,r));return this},i.removeEvent=function(e){var t,n=typeof e,i=this._getEvents();if("string"===n)delete i[e];else if("object"===n)for(t in i)i.hasOwnProperty(t)&&e.test(t)&&delete i[t];else delete this._events;return this},i.removeAllListeners=n("removeEvent"),i.emitEvent=function(e,t){var n,i,r,o,s=this.getListenersAsObject(e);for(r in s)if(s.hasOwnProperty(r))for(i=s[r].length;i--;)n=s[r][i],n.once===!0&&this.removeListener(e,n.listener),o=n.listener.apply(this,t||[]),o===this._getOnceReturnValue()&&this.removeListener(e,n.listener);return this},i.trigger=n("emitEvent"),i.emit=function(e){var t=Array.prototype.slice.call(arguments,1);return this.emitEvent(e,t)},i.setOnceReturnValue=function(e){return this._onceReturnValue=e,this},i._getOnceReturnValue=function(){return this.hasOwnProperty("_onceReturnValue")?this._onceReturnValue:!0},i._getEvents=function(){return this._events||(this._events={})},"function"==typeof define&&define.amd?define(function(){return e}):"object"==typeof module&&module.exports?module.exports=e:this.EventEmitter=e}).call(this),function(e){"use strict";var t=document.documentElement,n=function(){};t.addEventListener?n=function(e,t,n){e.addEventListener(t,n,!1)}:t.attachEvent&&(n=function(t,n,i){t[n+i]=i.handleEvent?function(){var t=e.event;t.target=t.target||t.srcElement,i.handleEvent.call(i,t)}:function(){var n=e.event;n.target=n.target||n.srcElement,i.call(t,n)},t.attachEvent("on"+n,t[n+i])});var i=function(){};t.removeEventListener?i=function(e,t,n){e.removeEventListener(t,n,!1)}:t.detachEvent&&(i=function(e,t,n){e.detachEvent("on"+t,e[t+n]);try{delete e[t+n]}catch(i){e[t+n]=void 0}});var r={bind:n,unbind:i};"function"==typeof define&&define.amd?define(r):e.eventie=r}(this),function(e){"use strict";function t(e,t){for(var n in t)e[n]=t[n];return e}function n(e){return"[object Array]"===c.call(e)}function i(e){var t=[];if(n(e))t=e;else if("number"==typeof e.length)for(var i=0,r=e.length;r>i;i++)t.push(e[i]);else t.push(e);return t}function r(e,n){function r(e,n,s){if(!(this instanceof r))return new r(e,n);"string"==typeof e&&(e=document.querySelectorAll(e)),this.elements=i(e),this.options=t({},this.options),"function"==typeof n?s=n:t(this.options,n),s&&this.on("always",s),this.getImages(),o&&(this.jqDeferred=new o.Deferred);var a=this;setTimeout(function(){a.check()})}function c(e){this.img=e}r.prototype=new e,r.prototype.options={},r.prototype.getImages=function(){this.images=[];for(var e=0,t=this.elements.length;t>e;e++){var n=this.elements[e];"IMG"===n.nodeName&&this.addImage(n);for(var i=n.querySelectorAll("img"),r=0,o=i.length;o>r;r++){var s=i[r];this.addImage(s)}}},r.prototype.addImage=function(e){var t=new c(e);this.images.push(t)},r.prototype.check=function(){function e(e,r){return t.options.debug&&a&&s.log("confirm",e,r),t.progress(e),n++,n===i&&t.complete(),!0}var t=this,n=0,i=this.images.length;if(this.hasAnyBroken=!1,!i)return this.complete(),void 0;for(var r=0;i>r;r++){var o=this.images[r];o.on("confirm",e),o.check()}},r.prototype.progress=function(e){this.hasAnyBroken=this.hasAnyBroken||!e.isLoaded;var t=this;setTimeout(function(){t.emit("progress",t,e),t.jqDeferred&&t.jqDeferred.notify(t,e)})},r.prototype.complete=function(){var e=this.hasAnyBroken?"fail":"done";this.isComplete=!0;var t=this;setTimeout(function(){if(t.emit(e,t),t.emit("always",t),t.jqDeferred){var n=t.hasAnyBroken?"reject":"resolve";t.jqDeferred[n](t)}})},o&&(o.fn.imagesLoaded=function(e,t){var n=new r(this,e,t);return n.jqDeferred.promise(o(this))});var f={};return c.prototype=new e,c.prototype.check=function(){var e=f[this.img.src];if(e)return this.useCached(e),void 0;if(f[this.img.src]=this,this.img.complete&&void 0!==this.img.naturalWidth)return this.confirm(0!==this.img.naturalWidth,"naturalWidth"),void 0;var t=this.proxyImage=new Image;n.bind(t,"load",this),n.bind(t,"error",this),t.src=this.img.src},c.prototype.useCached=function(e){if(e.isConfirmed)this.confirm(e.isLoaded,"cached was confirmed");else{var t=this;e.on("confirm",function(e){return t.confirm(e.isLoaded,"cache emitted confirmed"),!0})}},c.prototype.confirm=function(e,t){this.isConfirmed=!0,this.isLoaded=e,this.emit("confirm",this,t)},c.prototype.handleEvent=function(e){var t="on"+e.type;this[t]&&this[t](e)},c.prototype.onload=function(){this.confirm(!0,"onload"),this.unbindProxyEvents()},c.prototype.onerror=function(){this.confirm(!1,"onerror"),this.unbindProxyEvents()},c.prototype.unbindProxyEvents=function(){n.unbind(this.proxyImage,"load",this),n.unbind(this.proxyImage,"error",this)},r}var o=e.jQuery,s=e.console,a=s!==void 0,c=Object.prototype.toString;"function"==typeof define&&define.amd?define(["eventEmitter/EventEmitter","eventie/eventie"],r):e.imagesLoaded=r(e.EventEmitter,e.eventie)}(window);

/*jshint undef: true */
/*global jQuery: true */

/*
   --------------------------------
   Infinite Scroll
   --------------------------------
   + https://github.com/paulirish/infinite-scroll
   + version 2.0b2.120519
   + Copyright 2011/12 Paul Irish & Luke Shumard
   + Licensed under the MIT license

   + Documentation: http://infinite-scroll.com/
*/

(function (window, $, undefined) {
	"use strict";

	$.infinitescroll = function infscr(options, callback, element) {
		this.element = $(element);

		// Flag the object in the event of a failed creation
		if (!this._create(options, callback)) {
			this.failed = true;
		}
	};

	$.infinitescroll.defaults = {
		loading: {
			finished: undefined,
			finishedMsg: "<em>Congratulations, you've reached the end of the internet.</em>",
			img: js_local_vars.theme_url + '/images/loading.gif',
			msg: null,
			msgText: "<em>Loading the next set of posts...</em>",
			selector: null,
			speed: 'fast',
			start: undefined
		},
		state: {
			isDuringAjax: false,
			isInvalidPage: false,
			isDestroyed: false,
			isDone: false, // For when it goes all the way through the archive.
			isPaused: false,
			isBeyondMaxPage: false,
			currPage: 1
		},
		debug: false,
		behavior: undefined,
		binder: $(window), // used to cache the selector
		nextSelector: "div.navigation a:first",
		navSelector: "div.navigation",
		contentSelector: null, // rename to pageFragment
		extraScrollPx: 150,
		itemSelector: "div.post",
		animate: false,
		pathParse: undefined,
		dataType: 'html',
		appendCallback: true,
		bufferPx: 40,
		errorCallback: function () { },
		infid: 0, //Instance ID
		pixelsFromNavToBottom: undefined,
		path: undefined, // Either parts of a URL as an array (e.g. ["/page/", "/"] or a function that takes in the page number and returns a URL
		prefill: false, // When the document is smaller than the window, load data until the document is larger or links are exhausted
		maxPage: undefined // to manually control maximum page (when maxPage is undefined, maximum page limitation is not work)
	};

	$.infinitescroll.prototype = {

		/*
			----------------------------
			Private methods
			----------------------------
			*/

		// Bind or unbind from scroll
		_binding: function infscr_binding(binding) {

			var instance = this,
			opts = instance.options;

			opts.v = '2.0b2.120520';

			// if behavior is defined and this function is extended, call that instead of default
			if (!!opts.behavior && this['_binding_'+opts.behavior] !== undefined) {
				this['_binding_'+opts.behavior].call(this);
				return;
			}

			if (binding !== 'bind' && binding !== 'unbind') {
				this._debug('Binding value  ' + binding + ' not valid');
				return false;
			}

			if (binding === 'unbind') {
				(this.options.binder).unbind('smartscroll.infscr.' + instance.options.infid);
			} else {
				(this.options.binder)[binding]('smartscroll.infscr.' + instance.options.infid, function () {
					instance.scroll();
				});
			}

			this._debug('Binding', binding);
		},

		// Fundamental aspects of the plugin are initialized
		_create: function infscr_create(options, callback) {

			// Add custom options to defaults
			var opts = $.extend(true, {}, $.infinitescroll.defaults, options);
			this.options = opts;
			var $window = $(window);
			var instance = this;

			// Validate selectors
			if (!instance._validate(options)) {
				return false;
			}

			// Validate page fragment path
			var path = $(opts.nextSelector).attr('href');
			if (!path) {
				this._debug('Navigation selector not found');
				return false;
			}

			// Set the path to be a relative URL from root.
			opts.path = opts.path || this._determinepath(path);

			// contentSelector is 'page fragment' option for .load() / .ajax() calls
			opts.contentSelector = opts.contentSelector || this.element;

			// loading.selector - if we want to place the load message in a specific selector, defaulted to the contentSelector
			opts.loading.selector = opts.loading.selector || opts.contentSelector;

			// Define loading.msg
			opts.loading.msg = opts.loading.msg || $('<div id="infscr-loading"><img alt="Loading..." src="' + opts.loading.img + '" /><div>' + opts.loading.msgText + '</div></div>');

			// Preload loading.img
			(new Image()).src = opts.loading.img;

			// distance from nav links to bottom
			// computed as: height of the document + top offset of container - top offset of nav link
			if(opts.pixelsFromNavToBottom === undefined) {
				opts.pixelsFromNavToBottom = $(document).height() - $(opts.navSelector).offset().top;
				this._debug("pixelsFromNavToBottom: " + opts.pixelsFromNavToBottom);
			}

			var self = this;

			// determine loading.start actions
			opts.loading.start = opts.loading.start || function() {
				$(opts.navSelector).hide();
				opts.loading.msg
				.appendTo(opts.loading.selector)
				.show(opts.loading.speed, $.proxy(function() {
					this.beginAjax(opts);
				}, self));
			};

			// determine loading.finished actions
			opts.loading.finished = opts.loading.finished || function() {
				if (!opts.state.isBeyondMaxPage)
					opts.loading.msg.fadeOut(opts.loading.speed);
			};

			// callback loading
			opts.callback = function(instance, data, url) {
				if (!!opts.behavior && instance['_callback_'+opts.behavior] !== undefined) {
					instance['_callback_'+opts.behavior].call($(opts.contentSelector)[0], data, url);
				}

				if (callback) {
					callback.call($(opts.contentSelector)[0], data, opts, url);
				}

				if (opts.prefill) {
					$window.bind("resize.infinite-scroll", instance._prefill);
				}
			};

			if (options.debug) {
				// Tell IE9 to use its built-in console
				if (Function.prototype.bind && (typeof console === 'object' || typeof console === 'function') && typeof console.log === "object") {
					["log","info","warn","error","assert","dir","clear","profile","profileEnd"]
						.forEach(function (method) {
							console[method] = this.call(console[method], console);
						}, Function.prototype.bind);
				}
			}

			this._setup();

			// Setups the prefill method for use
			if (opts.prefill) {
				this._prefill();
			}

			// Return true to indicate successful creation
			return true;
		},

		_prefill: function infscr_prefill() {
			var instance = this;
			var $window = $(window);

			function needsPrefill() {
				return (instance.options.contentSelector.height() <= $window.height());
			}

			this._prefill = function() {
				if (needsPrefill()) {
					instance.scroll();
				}

				$window.bind("resize.infinite-scroll", function() {
					if (needsPrefill()) {
						$window.unbind("resize.infinite-scroll");
						instance.scroll();
					}
				});
			};

			// Call self after setting up the new function
			this._prefill();
		},

		// Console log wrapper
		_debug: function infscr_debug() {
			if (true !== this.options.debug) {
				return;
			}

			if (typeof console !== 'undefined' && typeof console.log === 'function') {
				// Modern browsers
				// Single argument, which is a string
				if ((Array.prototype.slice.call(arguments)).length === 1 && typeof Array.prototype.slice.call(arguments)[0] === 'string') {
					console.log( (Array.prototype.slice.call(arguments)).toString() );
				} else {
					console.log( Array.prototype.slice.call(arguments) );
				}
			} else if (!Function.prototype.bind && typeof console !== 'undefined' && typeof console.log === 'object') {
				// IE8
				Function.prototype.call.call(console.log, console, Array.prototype.slice.call(arguments));
			}
		},

		// find the number to increment in the path.
		_determinepath: function infscr_determinepath(path) {

			var opts = this.options;

			// if behavior is defined and this function is extended, call that instead of default
			if (!!opts.behavior && this['_determinepath_'+opts.behavior] !== undefined) {
				return this['_determinepath_'+opts.behavior].call(this,path);
			}

			if (!!opts.pathParse) {

				this._debug('pathParse manual');
				return opts.pathParse(path, this.options.state.currPage+1);

			} else if (path.match(/^(.*?)\b2\b(.*?$)/)) {
				path = path.match(/^(.*?)\b2\b(.*?$)/).slice(1);

				// if there is any 2 in the url at all.
			} else if (path.match(/^(.*?)2(.*?$)/)) {

				// page= is used in django:
				// http://www.infinite-scroll.com/changelog/comment-page-1/#comment-127
				if (path.match(/^(.*?page=)2(\/.*|$)/)) {
					path = path.match(/^(.*?page=)2(\/.*|$)/).slice(1);
					return path;
				}

				path = path.match(/^(.*?)2(.*?$)/).slice(1);

			} else {

				// page= is used in drupal too but second page is page=1 not page=2:
				// thx Jerod Fritz, vladikoff
				if (path.match(/^(.*?page=)1(\/.*|$)/)) {
					path = path.match(/^(.*?page=)1(\/.*|$)/).slice(1);
					return path;
				} else {
					this._debug('Sorry, we couldn\'t parse your Next (Previous Posts) URL. Verify your the css selector points to the correct A tag. If you still get this error: yell, scream, and kindly ask for help at infinite-scroll.com.');
					// Get rid of isInvalidPage to allow permalink to state
					opts.state.isInvalidPage = true;  //prevent it from running on this page.
				}
			}
			this._debug('determinePath', path);
			return path;

		},

		// Custom error
		_error: function infscr_error(xhr) {

			var opts = this.options;

			// if behavior is defined and this function is extended, call that instead of default
			if (!!opts.behavior && this['_error_'+opts.behavior] !== undefined) {
				this['_error_'+opts.behavior].call(this,xhr);
				return;
			}

			if (xhr !== 'destroy' && xhr !== 'end') {
				xhr = 'unknown';
			}

			this._debug('Error', xhr);

			if (xhr === 'end' || opts.state.isBeyondMaxPage) {
				this._showdonemsg();
			}

			opts.state.isDone = true;
			opts.state.currPage = 1; // if you need to go back to this instance
			opts.state.isPaused = false;
			opts.state.isBeyondMaxPage = false;
			this._binding('unbind');

		},

		// Load Callback
		_loadcallback: function infscr_loadcallback(box, data, url) {
			var opts = this.options,
			callback = this.options.callback, // GLOBAL OBJECT FOR CALLBACK
			result = (opts.state.isDone) ? 'done' : (!opts.appendCallback) ? 'no-append' : 'append',
			frag;

			// if behavior is defined and this function is extended, call that instead of default
			if (!!opts.behavior && this['_loadcallback_'+opts.behavior] !== undefined) {
				this['_loadcallback_'+opts.behavior].call(this,box,data);
				return;
			}

			switch (result) {
				case 'done':
					this._showdonemsg();
					return false;

				case 'no-append':
					if (opts.dataType === 'html') {
						data = '<div>' + data + '</div>';
						data = $(data).find(opts.itemSelector);
					}
					break;

				case 'append':
					var children = box.children();
					// if it didn't return anything
					if (children.length === 0) {
						return this._error('end');
					}

					// use a documentFragment because it works when content is going into a table or UL
					frag = document.createDocumentFragment();
					while (box[0].firstChild) {
						frag.appendChild(box[0].firstChild);
					}

					this._debug('contentSelector', $(opts.contentSelector)[0]);
					$(opts.contentSelector)[0].appendChild(frag);
					// previously, we would pass in the new DOM element as context for the callback
					// however we're now using a documentfragment, which doesn't have parents or children,
					// so the context is the contentContainer guy, and we pass in an array
					// of the elements collected as the first argument.

					data = children.get();
					break;
			}

			// loadingEnd function
			opts.loading.finished.call($(opts.contentSelector)[0],opts);

			// smooth scroll to ease in the new content
			if (opts.animate) {
				var scrollTo = $(window).scrollTop() + $(opts.loading.msg).height() + opts.extraScrollPx + 'px';
				$('html,body').animate({ scrollTop: scrollTo }, 800, function () { opts.state.isDuringAjax = false; });
			}

			if (!opts.animate) {
				// once the call is done, we can allow it again.
				opts.state.isDuringAjax = false;
			}

			callback(this, data, url);

			if (opts.prefill) {
				this._prefill();
			}
		},

		_nearbottom: function infscr_nearbottom() {

			var opts = this.options,
			pixelsFromWindowBottomToBottom = 0 + $(document).height() - (opts.binder.scrollTop()) - $(window).height();

			// if behavior is defined and this function is extended, call that instead of default
			if (!!opts.behavior && this['_nearbottom_'+opts.behavior] !== undefined) {
				return this['_nearbottom_'+opts.behavior].call(this);
			}

			this._debug('math:', pixelsFromWindowBottomToBottom, opts.pixelsFromNavToBottom);

			// if distance remaining in the scroll (including buffer) is less than the orignal nav to bottom....
			return (pixelsFromWindowBottomToBottom - opts.bufferPx < opts.pixelsFromNavToBottom);

		},

		// Pause / temporarily disable plugin from firing
		_pausing: function infscr_pausing(pause) {

			var opts = this.options;

			// if behavior is defined and this function is extended, call that instead of default
			if (!!opts.behavior && this['_pausing_'+opts.behavior] !== undefined) {
				this['_pausing_'+opts.behavior].call(this,pause);
				return;
			}

			// If pause is not 'pause' or 'resume', toggle it's value
			if (pause !== 'pause' && pause !== 'resume' && pause !== null) {
				this._debug('Invalid argument. Toggling pause value instead');
			}

			pause = (pause && (pause === 'pause' || pause === 'resume')) ? pause : 'toggle';

			switch (pause) {
				case 'pause':
					opts.state.isPaused = true;
				break;

				case 'resume':
					opts.state.isPaused = false;
				break;

				case 'toggle':
					opts.state.isPaused = !opts.state.isPaused;
				break;
			}

			this._debug('Paused', opts.state.isPaused);
			return false;

		},

		// Behavior is determined
		// If the behavior option is undefined, it will set to default and bind to scroll
		_setup: function infscr_setup() {

			var opts = this.options;

			// if behavior is defined and this function is extended, call that instead of default
			if (!!opts.behavior && this['_setup_'+opts.behavior] !== undefined) {
				this['_setup_'+opts.behavior].call(this);
				return;
			}

			this._binding('bind');

			return false;

		},

		// Show done message
		_showdonemsg: function infscr_showdonemsg() {

			var opts = this.options;

			// if behavior is defined and this function is extended, call that instead of default
			if (!!opts.behavior && this['_showdonemsg_'+opts.behavior] !== undefined) {
				this['_showdonemsg_'+opts.behavior].call(this);
				return;
			}

			opts.loading.msg
			.find('img')
			.hide()
			.parent()
			.find('div').html(opts.loading.finishedMsg).animate({ opacity: 1 }, 2000, function () {
				$(this).parent().fadeOut(opts.loading.speed);
			});

			// user provided callback when done
			opts.errorCallback.call($(opts.contentSelector)[0],'done');
		},

		// grab each selector option and see if any fail
		_validate: function infscr_validate(opts) {
			for (var key in opts) {
				if (key.indexOf && key.indexOf('Selector') > -1 && $(opts[key]).length === 0) {
					this._debug('Your ' + key + ' found no elements.');
					return false;
				}
			}

			return true;
		},

		/*
			----------------------------
			Public methods
			----------------------------
			*/

		// Bind to scroll
		bind: function infscr_bind() {
			this._binding('bind');
		},

		// Destroy current instance of plugin
		destroy: function infscr_destroy() {
			this.options.state.isDestroyed = true;
			this.options.loading.finished();
			return this._error('destroy');
		},

		// Set pause value to false
		pause: function infscr_pause() {
			this._pausing('pause');
		},

		// Set pause value to false
		resume: function infscr_resume() {
			this._pausing('resume');
		},

		beginAjax: function infscr_ajax(opts) {
			var instance = this,
				path = opts.path,
				box, desturl, method, condition;

			// increment the URL bit. e.g. /page/3/
			opts.state.currPage++;

			// Manually control maximum page
			if ( opts.maxPage != undefined && opts.state.currPage > opts.maxPage ){
				opts.state.isBeyondMaxPage = true;
				this.destroy();
				return;
			}

			// if we're dealing with a table we can't use DIVs
			box = $(opts.contentSelector).is('table, tbody') ? $('<tbody/>') : $('<div/>');

			desturl = (typeof path === 'function') ? path(opts.state.currPage) : path.join(opts.state.currPage);
			instance._debug('heading into ajax', desturl);

			method = (opts.dataType === 'html' || opts.dataType === 'json' ) ? opts.dataType : 'html+callback';
			if (opts.appendCallback && opts.dataType === 'html') {
				method += '+callback';
			}

			switch (method) {
				case 'html+callback':
					instance._debug('Using HTML via .load() method');
					box.load(desturl + ' ' + opts.itemSelector, undefined, function infscr_ajax_callback(responseText) {
						instance._loadcallback(box, responseText, desturl);
					});

					break;

				case 'html':
					instance._debug('Using ' + (method.toUpperCase()) + ' via $.ajax() method');
					$.ajax({
						// params
						url: desturl,
						dataType: opts.dataType,
						complete: function infscr_ajax_callback(jqXHR, textStatus) {
							condition = (typeof (jqXHR.isResolved) !== 'undefined') ? (jqXHR.isResolved()) : (textStatus === "success" || textStatus === "notmodified");
							if (condition) {
								instance._loadcallback(box, jqXHR.responseText, desturl);
							} else {
								instance._error('end');
							}
						}
					});

					break;
				case 'json':
					instance._debug('Using ' + (method.toUpperCase()) + ' via $.ajax() method');
					$.ajax({
						dataType: 'json',
						type: 'GET',
						url: desturl,
						success: function (data, textStatus, jqXHR) {
							condition = (typeof (jqXHR.isResolved) !== 'undefined') ? (jqXHR.isResolved()) : (textStatus === "success" || textStatus === "notmodified");
							if (opts.appendCallback) {
								// if appendCallback is true, you must defined template in options.
								// note that data passed into _loadcallback is already an html (after processed in opts.template(data)).
								if (opts.template !== undefined) {
									var theData = opts.template(data);
									box.append(theData);
									if (condition) {
										instance._loadcallback(box, theData);
									} else {
										instance._error('end');
									}
								} else {
									instance._debug("template must be defined.");
									instance._error('end');
								}
							} else {
								// if appendCallback is false, we will pass in the JSON object. you should handle it yourself in your callback.
								if (condition) {
									instance._loadcallback(box, data, desturl);
								} else {
									instance._error('end');
								}
							}
						},
						error: function() {
							instance._debug("JSON ajax request failed.");
							instance._error('end');
						}
					});

					break;
			}
		},

		// Retrieve next set of content items
		retrieve: function infscr_retrieve(pageNum) {
			pageNum = pageNum || null;

			var instance = this,
			opts = instance.options;

			// if behavior is defined and this function is extended, call that instead of default
			if (!!opts.behavior && this['retrieve_'+opts.behavior] !== undefined) {
				this['retrieve_'+opts.behavior].call(this,pageNum);
				return;
			}

			// for manual triggers, if destroyed, get out of here
			if (opts.state.isDestroyed) {
				this._debug('Instance is destroyed');
				return false;
			}

			// we dont want to fire the ajax multiple times
			opts.state.isDuringAjax = true;

			opts.loading.start.call($(opts.contentSelector)[0],opts);
		},

		// Check to see next page is needed
		scroll: function infscr_scroll() {

			var opts = this.options,
			state = opts.state;

			// if behavior is defined and this function is extended, call that instead of default
			if (!!opts.behavior && this['scroll_'+opts.behavior] !== undefined) {
				this['scroll_'+opts.behavior].call(this);
				return;
			}

			if (state.isDuringAjax || state.isInvalidPage || state.isDone || state.isDestroyed || state.isPaused) {
				return;
			}

			if (!this._nearbottom()) {
				return;
			}

			this.retrieve();

		},

		// Toggle pause value
		toggle: function infscr_toggle() {
			this._pausing();
		},

		// Unbind from scroll
		unbind: function infscr_unbind() {
			this._binding('unbind');
		},

		// update options
		update: function infscr_options(key) {
			if ($.isPlainObject(key)) {
				this.options = $.extend(true,this.options,key);
			}
		}
	};


	/*
		----------------------------
		Infinite Scroll function
		----------------------------

		Borrowed logic from the following...

		jQuery UI
		- https://github.com/jquery/jquery-ui/blob/master/ui/jquery.ui.widget.js

		jCarousel
		- https://github.com/jsor/jcarousel/blob/master/lib/jquery.jcarousel.js

		Masonry
		- https://github.com/desandro/masonry/blob/master/jquery.masonry.js

*/

	$.fn.infinitescroll = function infscr_init(options, callback) {


		var thisCall = typeof options;

		switch (thisCall) {

			// method
			case 'string':
				var args = Array.prototype.slice.call(arguments, 1);

				this.each(function () {
					var instance = $.data(this, 'infinitescroll');

					if (!instance) {
						// not setup yet
						// return $.error('Method ' + options + ' cannot be called until Infinite Scroll is setup');
						return false;
					}

					if (!$.isFunction(instance[options]) || options.charAt(0) === "_") {
						// return $.error('No such method ' + options + ' for Infinite Scroll');
						return false;
					}

					// no errors!
					instance[options].apply(instance, args);
				});

			break;

			// creation
			case 'object':

				this.each(function () {

				var instance = $.data(this, 'infinitescroll');

				if (instance) {

					// update options of current instance
					instance.update(options);

				} else {

					// initialize new instance
					instance = new $.infinitescroll(options, callback, this);

					// don't attach if instantiation failed
					if (!instance.failed) {
						$.data(this, 'infinitescroll', instance);
					}

				}

			});

			break;

		}

		return this;
	};



	/*
	 * smartscroll: debounced scroll event for jQuery *
	 * https://github.com/lukeshumard/smartscroll
	 * Based on smartresize by @louis_remi: https://github.com/lrbabe/jquery.smartresize.js *
	 * Copyright 2011 Louis-Remi & Luke Shumard * Licensed under the MIT license. *
	 */

	var event = $.event,
	scrollTimeout;

	event.special.smartscroll = {
		setup: function () {
			$(this).bind("scroll", event.special.smartscroll.handler);
		},
		teardown: function () {
			$(this).unbind("scroll", event.special.smartscroll.handler);
		},
		handler: function (event, execAsap) {
			// Save the context
			var context = this,
			args = arguments;

			// set correct event type
			event.type = "smartscroll";

			if (scrollTimeout) { clearTimeout(scrollTimeout); }
			scrollTimeout = setTimeout(function () {
				$(context).trigger('smartscroll', args);
			}, execAsap === "execAsap" ? 0 : 100);
		}
	};

	$.fn.smartscroll = function (fn) {
		return fn ? this.bind("smartscroll", fn) : this.trigger("smartscroll", ["execAsap"]);
	};


})(window, jQuery);

// Init style shamelessly stolen from jQuery http://jquery.com
var Froogaloop = (function(){
	// Define a local copy of Froogaloop
	function Froogaloop(iframe) {
		// The Froogaloop object is actually just the init constructor
		return new Froogaloop.fn.init(iframe);
	}

	var eventCallbacks = {},
		hasWindowEvent = false,
		isReady = false,
		slice = Array.prototype.slice,
		playerDomain = '';

	Froogaloop.fn = Froogaloop.prototype = {
		element: null,

		init: function(iframe) {
			if (typeof iframe === "string") {
				iframe = document.getElementById(iframe);
			}

			this.element = iframe;

			// Register message event listeners
			playerDomain = getDomainFromUrl(this.element.getAttribute('src'));

			return this;
		},

		/*
		 * Calls a function to act upon the player.
		 *
		 * @param {string} method The name of the Javascript API method to call. Eg: 'play'.
		 * @param {Array|Function} valueOrCallback params Array of parameters to pass when calling an API method
		 *								or callback function when the method returns a value.
		 */
		api: function(method, valueOrCallback) {
			if (!this.element || !method) {
				return false;
			}

			var self = this,
				element = self.element,
				target_id = element.id !== '' ? element.id : null,
				params = !isFunction(valueOrCallback) ? valueOrCallback : null,
				callback = isFunction(valueOrCallback) ? valueOrCallback : null;

			// Store the callback for get functions
			if (callback) {
				storeCallback(method, callback, target_id);
			}

			postMessage(method, params, element);
			return self;
		},

		/*
		 * Registers an event listener and a callback function that gets called when the event fires.
		 *
		 * @param eventName (String): Name of the event to listen for.
		 * @param callback (Function): Function that should be called when the event fires.
		 */
		addEvent: function(eventName, callback) {
			if (!this.element) {
				return false;
			}

			var self = this,
				element = self.element,
				target_id = element.id !== '' ? element.id : null;


			storeCallback(eventName, callback, target_id);

			// The ready event is not registered via postMessage. It fires regardless.
			if (eventName != 'ready') {
				postMessage('addEventListener', eventName, element);
			}
			else if (eventName == 'ready' && isReady) {
				callback.call(null, target_id);
			}

			return self;
		},

		/*
		 * Unregisters an event listener that gets called when the event fires.
		 *
		 * @param eventName (String): Name of the event to stop listening for.
		 */
		removeEvent: function(eventName) {
			if (!this.element) {
				return false;
			}

			var self = this,
				element = self.element,
				target_id = element.id !== '' ? element.id : null,
				removed = removeCallback(eventName, target_id);

			// The ready event is not registered
			if (eventName != 'ready' && removed) {
				postMessage('removeEventListener', eventName, element);
			}
		}
	};

	/**
	 * Handles posting a message to the parent window.
	 *
	 * @param method (String): name of the method to call inside the player. For api calls
	 * this is the name of the api method (api_play or api_pause) while for events this method
	 * is api_addEventListener.
	 * @param params (Object or Array): List of parameters to submit to the method. Can be either
	 * a single param or an array list of parameters.
	 * @param target (HTMLElement): Target iframe to post the message to.
	 */
	function postMessage(method, params, target) {
		if (!target.contentWindow.postMessage) {
			return false;
		}

		var url = target.getAttribute('src').split('?')[0],
			data = JSON.stringify({
				method: method,
				value: params
			});

		if (url.substr(0, 2) === '//') {
			url = window.location.protocol + url;
		}

		target.contentWindow.postMessage(data, url);
	}

	/**
	 * Event that fires whenever the window receives a message from its parent
	 * via window.postMessage.
	 */
	function onMessageReceived(event) {
		var data, method;

		try {
			data = JSON.parse(event.data);
			method = data.event || data.method;
		}
		catch(e)  {
			//fail silently... like a ninja!
		}

		if (method == 'ready' && !isReady) {
			isReady = true;
		}

		// Handles messages from moogaloop only
		if (event.origin != playerDomain) {
			return false;
		}

		var value = data.value,
			eventData = data.data,
			target_id = target_id === '' ? null : data.player_id,

			callback = getCallback(method, target_id),
			params = [];

		if (!callback) {
			return false;
		}

		if (value !== undefined) {
			params.push(value);
		}

		if (eventData) {
			params.push(eventData);
		}

		if (target_id) {
			params.push(target_id);
		}

		return params.length > 0 ? callback.apply(null, params) : callback.call();
	}


	/**
	 * Stores submitted callbacks for each iframe being tracked and each
	 * event for that iframe.
	 *
	 * @param eventName (String): Name of the event. Eg. api_onPlay
	 * @param callback (Function): Function that should get executed when the
	 * event is fired.
	 * @param target_id (String) [Optional]: If handling more than one iframe then
	 * it stores the different callbacks for different iframes based on the iframe's
	 * id.
	 */
	function storeCallback(eventName, callback, target_id) {
		if (target_id) {
			if (!eventCallbacks[target_id]) {
				eventCallbacks[target_id] = {};
			}
			eventCallbacks[target_id][eventName] = callback;
		}
		else {
			eventCallbacks[eventName] = callback;
		}
	}

	/**
	 * Retrieves stored callbacks.
	 */
	function getCallback(eventName, target_id) {
		if (target_id) {
			return eventCallbacks[target_id][eventName];
		}
		else {
			return eventCallbacks[eventName];
		}
	}

	function removeCallback(eventName, target_id) {
		if (target_id && eventCallbacks[target_id]) {
			if (!eventCallbacks[target_id][eventName]) {
				return false;
			}
			eventCallbacks[target_id][eventName] = null;
		}
		else {
			if (!eventCallbacks[eventName]) {
				return false;
			}
			eventCallbacks[eventName] = null;
		}

		return true;
	}

	/**
	 * Returns a domain's root domain.
	 * Eg. returns http://vimeo.com when http://vimeo.com/channels is sbumitted
	 *
	 * @param url (String): Url to test against.
	 * @return url (String): Root domain of submitted url
	 */
	function getDomainFromUrl(url) {
		if (url.substr(0, 2) === '//') {
			url = window.location.protocol + url;
		}

		var url_pieces = url.split('/'),
			domain_str = '';

		for(var i = 0, length = url_pieces.length; i < length; i++) {
			if(i<3) {domain_str += url_pieces[i];}
			else {break;}
			if(i<2) {domain_str += '/';}
		}

		return domain_str;
	}

	function isFunction(obj) {
		return !!(obj && obj.constructor && obj.call && obj.apply);
	}

	function isArray(obj) {
		return toString.call(obj) === '[object Array]';
	}

	// Give the init function the Froogaloop prototype for later instantiation
	Froogaloop.fn.init.prototype = Froogaloop.fn;

	// Listens for the message event.
	// W3C
	if (window.addEventListener) {
		window.addEventListener('message', onMessageReceived, false);
	}
	// IE
	else {
		window.attachEvent('onmessage', onMessageReceived);
	}

	// Expose froogaloop to the global object
	return (window.Froogaloop = window.$f = Froogaloop);

})();

/**!
 * easyPieChart
 * Lightweight plugin to render simple, animated and retina optimized pie charts
 *
 * @license
 * @author Robert Fleischmann <rendro87@gmail.com> (http://robert-fleischmann.de)
 * @version 2.1.3
 **/

(function(root, factory) {
	if(typeof exports === 'object') {
		module.exports = factory(require('jquery'));
	}
	else if(typeof define === 'function' && define.amd) {
		define(['jquery'], factory);
	}
	else {
		factory(root.jQuery);
	}
}(this, function($) {
/**
 * Renderer to render the chart on a canvas object
 * @param {DOMElement} el	  DOM element to host the canvas (root of the plugin)
 * @param {object}	 options options object of the plugin
 */
var CanvasRenderer = function(el, options) {
	var cachedBackground;
	var canvas = document.createElement('canvas');

	el.appendChild(canvas);

	if (typeof(G_vmlCanvasManager) !== 'undefined') {
		G_vmlCanvasManager.initElement(canvas);
	}

	var ctx = canvas.getContext('2d');

	canvas.width = canvas.height = options.size;

	// canvas on retina devices
	var scaleBy = 1;
	if (window.devicePixelRatio > 1) {
		scaleBy = window.devicePixelRatio;
		canvas.style.width = canvas.style.height = [options.size, 'px'].join('');
		canvas.width = canvas.height = options.size * scaleBy;
		ctx.scale(scaleBy, scaleBy);
	}

	// move 0,0 coordinates to the center
	ctx.translate(options.size / 2, options.size / 2);

	// rotate canvas -90deg
	ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI);

	var radius = (options.size - options.lineWidth) / 2;
	if (options.scaleColor && options.scaleLength) {
		radius -= options.scaleLength + 2; // 2 is the distance between scale and bar
	}

	// IE polyfill for Date
	Date.now = Date.now || function() {
		return +(new Date());
	};

	/**
	 * Draw a circle around the center of the canvas
	 * @param {strong} color	 Valid CSS color string
	 * @param {number} lineWidth Width of the line in px
	 * @param {number} percent   Percentage to draw (float between -1 and 1)
	 */
	var drawCircle = function(color, lineWidth, percent) {
		percent = Math.min(Math.max(-1, percent || 0), 1);
		var isNegative = percent <= 0 ? true : false;

		ctx.beginPath();
		ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, isNegative);

		ctx.strokeStyle = color;
		ctx.lineWidth = lineWidth;

		ctx.stroke();
	};

	/**
	 * Draw the scale of the chart
	 */
	var drawScale = function() {
		var offset;
		var length;

		ctx.lineWidth = 1;
		ctx.fillStyle = options.scaleColor;

		ctx.save();
		for (var i = 24; i > 0; --i) {
			if (i % 6 === 0) {
				length = options.scaleLength;
				offset = 0;
			} else {
				length = options.scaleLength * 0.6;
				offset = options.scaleLength - length;
			}
			ctx.fillRect(-options.size/2 + offset, 0, length, 1);
			ctx.rotate(Math.PI / 12);
		}
		ctx.restore();
	};

	/**
	 * Request animation frame wrapper with polyfill
	 * @return {function} Request animation frame method or timeout fallback
	 */
	var reqAnimationFrame = (function() {
		return  window.requestAnimationFrame ||
				window.webkitRequestAnimationFrame ||
				window.mozRequestAnimationFrame ||
				function(callback) {
					window.setTimeout(callback, 1000 / 60);
				};
	}());

	/**
	 * Draw the background of the plugin including the scale and the track
	 */
	var drawBackground = function() {
		if(options.scaleColor) drawScale();
		if(options.trackColor) drawCircle(options.trackColor, options.lineWidth, 1);
	};

  /**
	* Canvas accessor
   */
  this.getCanvas = function() {
	return canvas;
  };

  /**
	* Canvas 2D context 'ctx' accessor
   */
  this.getCtx = function() {
	return ctx;
  };

	/**
	 * Clear the complete canvas
	 */
	this.clear = function() {
		ctx.clearRect(options.size / -2, options.size / -2, options.size, options.size);
	};

	/**
	 * Draw the complete chart
	 * @param {number} percent Percent shown by the chart between -100 and 100
	 */
	this.draw = function(percent) {
		// do we need to render a background
		if (!!options.scaleColor || !!options.trackColor) {
			// getImageData and putImageData are supported
			if (ctx.getImageData && ctx.putImageData) {
				if (!cachedBackground) {
					drawBackground();
					cachedBackground = ctx.getImageData(0, 0, options.size * scaleBy, options.size * scaleBy);
				} else {
					ctx.putImageData(cachedBackground, 0, 0);
				}
			} else {
				this.clear();
				drawBackground();
			}
		} else {
			this.clear();
		}

		ctx.lineCap = options.lineCap;

		// if barcolor is a function execute it and pass the percent as a value
		var color;
		if (typeof(options.barColor) === 'function') {
			color = options.barColor(percent);
		} else {
			color = options.barColor;
		}

		// draw bar
		drawCircle(color, options.lineWidth, percent / 100);
	}.bind(this);

	/**
	 * Animate from some percent to some other percentage
	 * @param {number} from Starting percentage
	 * @param {number} to   Final percentage
	 */
	this.animate = function(from, to) {
		var startTime = Date.now();
		options.onStart(from, to);
		var animation = function() {
			var process = Math.min(Date.now() - startTime, options.animate.duration);
			var currentValue = options.easing(this, process, from, to - from, options.animate.duration);
			this.draw(currentValue);
			options.onStep(from, to, currentValue);
			if (process >= options.animate.duration) {
				options.onStop(from, to);
			} else {
				reqAnimationFrame(animation);
			}
		}.bind(this);

		reqAnimationFrame(animation);
	}.bind(this);
};

var EasyPieChart = function(el, opts) {
	var defaultOptions = {
		barColor: '#ef1e25',
		trackColor: '#f9f9f9',
		scaleColor: '#dfe0e0',
		scaleLength: 5,
		lineCap: 'round',
		lineWidth: 3,
		size: 110,
		rotate: 0,
		animate: {
			duration: 1000,
			enabled: true
		},
		easing: function (x, t, b, c, d) { // more can be found here: http://gsgd.co.uk/sandbox/jquery/easing/
			t = t / (d/2);
			if (t < 1) {
				return c / 2 * t * t + b;
			}
			return -c/2 * ((--t)*(t-2) - 1) + b;
		},
		onStart: function(from, to) {
			return;
		},
		onStep: function(from, to, currentValue) {
			return;
		},
		onStop: function(from, to) {
			return;
		}
	};

	// detect present renderer
	if (typeof(CanvasRenderer) !== 'undefined') {
		defaultOptions.renderer = CanvasRenderer;
	} else if (typeof(SVGRenderer) !== 'undefined') {
		defaultOptions.renderer = SVGRenderer;
	} else {
		throw new Error('Please load either the SVG- or the CanvasRenderer');
	}

	var options = {};
	var currentValue = 0;

	/**
	 * Initialize the plugin by creating the options object and initialize rendering
	 */
	var init = function() {
		this.el = el;
		this.options = options;

		// merge user options into default options
		for (var i in defaultOptions) {
			if (defaultOptions.hasOwnProperty(i)) {
				options[i] = opts && typeof(opts[i]) !== 'undefined' ? opts[i] : defaultOptions[i];
				if (typeof(options[i]) === 'function') {
					options[i] = options[i].bind(this);
				}
			}
		}

		// check for jQuery easing
		if (typeof(options.easing) === 'string' && typeof(jQuery) !== 'undefined' && jQuery.isFunction(jQuery.easing[options.easing])) {
			options.easing = jQuery.easing[options.easing];
		} else {
			options.easing = defaultOptions.easing;
		}

		// process earlier animate option to avoid bc breaks
		if (typeof(options.animate) === 'number') {
			options.animate = {
				duration: options.animate,
				enabled: true
			};
		}

		if (typeof(options.animate) === 'boolean' && !options.animate) {
			options.animate = {
				duration: 1000,
				enabled: options.animate
			};
		}

		// create renderer
		this.renderer = new options.renderer(el, options);

		// initial draw
		this.renderer.draw(currentValue);

		// initial update
		if (el.dataset && el.dataset.percent) {
			this.update(parseFloat(el.dataset.percent));
		} else if (el.getAttribute && el.getAttribute('data-percent')) {
			this.update(parseFloat(el.getAttribute('data-percent')));
		}
	}.bind(this);

	/**
	 * Update the value of the chart
	 * @param  {number} newValue Number between 0 and 100
	 * @return {object}		  Instance of the plugin for method chaining
	 */
	this.update = function(newValue) {
		newValue = parseFloat(newValue);
		if (options.animate.enabled) {
			this.renderer.animate(currentValue, newValue);
		} else {
			this.renderer.draw(newValue);
		}
		currentValue = newValue;
		return this;
	}.bind(this);

	/**
	 * Disable animation
	 * @return {object} Instance of the plugin for method chaining
	 */
	this.disableAnimation = function() {
		options.animate.enabled = false;
		return this;
	};

	/**
	 * Enable animation
	 * @return {object} Instance of the plugin for method chaining
	 */
	this.enableAnimation = function() {
		options.animate.enabled = true;
		return this;
	};

	init();
};

$.fn.easyPieChart = function(options) {
	return this.each(function() {
		var instanceOptions;

		if (!$.data(this, 'easyPieChart')) {
			instanceOptions = $.extend({}, options, $(this).data());
			$.data(this, 'easyPieChart', new EasyPieChart(this, instanceOptions));
		}
	});
};

}));

/*
 * jQuery.appear
 * https://github.com/bas2k/jquery.appear/
 * http://code.google.com/p/jquery-appear/
 *
 * Copyright (c) 2009 Michael Hixson
 * Copyright (c) 2012 Alexander Brovikov
 * Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php)
 */
(function($) {
	$.fn.appear = function(fn, options) {

		var settings = $.extend({

			//arbitrary data to pass to fn
			data: undefined,

			//call fn only on the first appear?
			one: true,

			// X & Y accuracy
			accX: 0,
			accY: 0

		}, options);

		return this.each(function() {

			var t = $(this);

			//whether the element is currently visible
			t.appeared = false;

			if (!fn) {

				//trigger the custom event
				t.trigger('appear', settings.data);
				return;
			}

			var w = $(window);

			//fires the appear event when appropriate
			var check = function() {

				//is the element hidden?
				if (!t.is(':visible')) {

					//it became hidden
					t.appeared = false;
					return;
				}

				//is the element inside the visible window?
				var a = w.scrollLeft();
				var b = w.scrollTop();
				var o = t.offset();
				var x = o.left;
				var y = o.top;

				var ax = settings.accX;
				var ay = settings.accY;
				var th = t.height();
				var wh = w.height();
				var tw = t.width();
				var ww = w.width();

				if (y + th + ay >= b &&
					y <= b + wh + ay &&
					x + tw + ax >= a &&
					x <= a + ww + ax) {

					//trigger the custom event
					if (!t.appeared) t.trigger('appear', settings.data);

				} else {

					//it scrolled out of view
					t.appeared = false;
				}
			};

			//create a modified fn with some additional logic
			var modifiedFn = function() {

				//mark the element as visible
				t.appeared = true;

				//is this supposed to happen only once?
				if (settings.one) {

					//remove the check
					w.unbind('scroll', check);
					var i = $.inArray(check, $.fn.appear.checks);
					if (i >= 0) $.fn.appear.checks.splice(i, 1);
				}

				//trigger the original fn
				fn.apply(this, arguments);
			};

			//bind the modified fn to the element
			if (settings.one) t.one('appear', settings.data, modifiedFn);
			else t.bind('appear', settings.data, modifiedFn);

			//check whenever the window scrolls
			w.scroll(check);

			//check whenever the dom changes
			$.fn.appear.checks.push(check);

			//check now
			(check)();
		});
	};

	//keep a queue of appearance checks
	$.extend($.fn.appear, {

		checks: [],
		timeout: null,

		//process the queue
		checkAll: function() {
			var length = $.fn.appear.checks.length;
			if (length > 0) while (length--) ($.fn.appear.checks[length])();
		},

		//check the queue asynchronously
		run: function() {
			if ($.fn.appear.timeout) clearTimeout($.fn.appear.timeout);
			$.fn.appear.timeout = setTimeout($.fn.appear.checkAll, 20);
		}
	});

	//run checks when these methods are called
	$.each(['append', 'prepend', 'after', 'before', 'attr',
		'removeAttr', 'addClass', 'removeClass', 'toggleClass',
		'remove', 'css', 'show', 'hide'], function(i, n) {
		var old = $.fn[n];
		if (old) {
			$.fn[n] = function() {
				var r = old.apply(this, arguments);
				$.fn.appear.run();
				return r;
			}
		}
	});

})(jQuery);

/* ========================================================================
 * Bootstrap: transition.js v3.1.1
 * http://getbootstrap.com/javascript/#transitions
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // CSS TRANSITION SUPPORT (Shoutout: http://www.modernizr.com/)
  // ============================================================

  function transitionEnd() {
	var el = document.createElement('bootstrap');

	var transEndEventNames = {
	  'WebkitTransition' : 'webkitTransitionEnd',
	  'MozTransition'	: 'transitionend',
	  'OTransition'	  : 'oTransitionEnd otransitionend',
	  'transition'	   : 'transitionend'
	};

	for (var name in transEndEventNames) {
	  if (el.style[name] !== undefined) {
		return { end: transEndEventNames[name] }
	  }
	}

	return false; // explicit for ie8 (  ._.)
  }

  // http://blog.alexmaccaw.com/css-transitions
  $.fn.emulateTransitionEnd = function (duration) {
	var called = false, $el = this;
	$(this).one($.support.transition.end, function () { called = true });
	var callback = function () { if (!called) $($el).trigger($.support.transition.end) };
	setTimeout(callback, duration);
	return this;
  };

  $(function () {
	$.support.transition = transitionEnd();
  })

}(jQuery);

/* ========================================================================
 * Bootstrap: collapse.js v3.1.1
 * http://getbootstrap.com/javascript/#collapse
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // COLLAPSE PUBLIC CLASS DEFINITION
  // ================================

  var Collapse = function (element, options) {
	this.$element	  = $(element);
	this.options	   = $.extend({}, Collapse.DEFAULTS, options);
	this.transitioning = null;

	if (this.options.parent) this.$parent = $(this.options.parent);
	if (this.options.toggle) this.toggle();
  };

  Collapse.DEFAULTS = {
	toggle: true
  };

  Collapse.prototype.dimension = function () {
	var hasWidth = this.$element.hasClass('width');
	return hasWidth ? 'width' : 'height';
  };

  Collapse.prototype.show = function () {
	if (this.transitioning || this.$element.hasClass('in')) return;

	var startEvent = $.Event('show.bs.collapse');
	this.$element.trigger(startEvent);
	if (startEvent.isDefaultPrevented()) return;

	var actives = this.$parent && this.$parent.find('> .aione-panel > .in');

	if (actives && actives.length) {
	  var hasData = actives.data('bs.collapse');
	  if (hasData && hasData.transitioning) return;
	  actives.collapse('hide');
	  hasData || actives.data('bs.collapse', null)
	}

	var dimension = this.dimension();

	this.$element
	  .removeClass('collapse')
	  .addClass('collapsing')
	  [dimension](0);

	this.transitioning = 1;

	var complete = function () {
	  this.$element
		.removeClass('collapsing')
		.addClass('collapse in')
		[dimension]('auto');
	  this.transitioning = 0;
	  this.$element.trigger('shown.bs.collapse');
	};

	if (!$.support.transition) return complete.call(this);

	var scrollSize = $.camelCase(['scroll', dimension].join('-'));

	this.$element
	  .one($.support.transition.end, $.proxy(complete, this))
	  .emulateTransitionEnd(350)
	  [dimension](this.$element[0][scrollSize]);
  };

  Collapse.prototype.hide = function () {
	if (this.transitioning || !this.$element.hasClass('in')) return;

	var startEvent = $.Event('hide.bs.collapse');
	this.$element.trigger(startEvent);
	if (startEvent.isDefaultPrevented()) return;

	var dimension = this.dimension();

	this.$element
	  [dimension](this.$element[dimension]())
	  [0].offsetHeight;

	this.$element
	  .addClass('collapsing')
	  .removeClass('collapse')
	  .removeClass('in');

	this.transitioning = 1;

	var complete = function () {
	  this.transitioning = 0;
	  this.$element
		.trigger('hidden.bs.collapse')
		.removeClass('collapsing')
		.addClass('collapse');
	};

	if (!$.support.transition) return complete.call(this);

	this.$element
	  [dimension](0)
	  .one($.support.transition.end, $.proxy(complete, this))
	  .emulateTransitionEnd(350);
  };

  Collapse.prototype.toggle = function () {
	this[this.$element.hasClass('in') ? 'hide' : 'show']();
  };


  // COLLAPSE PLUGIN DEFINITION
  // ==========================

  var old = $.fn.collapse;

  $.fn.collapse = function (option) {
	return this.each(function () {
	  var $this   = $(this);
	  var data	= $this.data('bs.collapse');
	  var options = $.extend({}, Collapse.DEFAULTS, $this.data(), typeof option == 'object' && option);

	  if (!data && options.toggle && option == 'show') option = !option;
	  if (!data) $this.data('bs.collapse', (data = new Collapse(this, options)));
	  if (typeof option == 'string') data[option]();
	})
  };

  $.fn.collapse.Constructor = Collapse;


  // COLLAPSE NO CONFLICT
  // ====================

  $.fn.collapse.noConflict = function () {
	$.fn.collapse = old;
	return this;
  };


  // COLLAPSE DATA-API
  // =================

  $(document).on('click.bs.collapse.data-api', '[data-toggle=collapse]', function (e) {
	var $this   = $(this), href;
	var target  = $this.attr('data-target')
		|| e.preventDefault()
		|| (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, ''); //strip for ie7
	var $target = $(target);
	var data	= $target.data('bs.collapse');
	var option  = data ? 'toggle' : $this.data();
	var parent  = $this.attr('data-parent');
	var $parent = parent && $(parent);

	if (!data || !data.transitioning) {
	  if ($parent) $parent.find('[data-toggle=collapse][data-parent="' + parent + '"]').not($this).addClass('collapsed');
	  $this[$target.hasClass('in') ? 'addClass' : 'removeClass']('collapsed');
	}

	$target.collapse(option);
  });

  jQuery('click.bs.collapse.data-api, [data-toggle=collapse]').each(function() {
  	var parent = jQuery(this).attr('data-parent');

	if(jQuery(this).parents('.panel-group').length == 0) {
		var random = Math.floor((Math.random() * 10) + 1);
		var single_panel = jQuery(this).parents('.aione-panel');
		jQuery(this).attr('data-parent', 'accordian-' + random);
		jQuery(single_panel).wrap('<div class="accordian aione-accordian aione-single-accordian"><div class="panel-group" id="accordion-' + random + '"></div></div>');
	}
  });

}(jQuery);


/* ========================================================================
 * Bootstrap: modal.js v3.1.1
 * http://getbootstrap.com/javascript/#modals
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // MODAL CLASS DEFINITION
  // ======================

  var Modal = function (element, options) {
	this.options   = options;
	this.$element  = $(element);
	this.$backdrop = '';
	this.isShown   = null;

	if (this.options.remote) {
	  this.$element
		.find('.modal-content')
		.load(this.options.remote, $.proxy(function () {
		  this.$element.trigger('loaded.bs.modal');
		}, this));
	}
  };

  Modal.DEFAULTS = {
	backdrop: true,
	keyboard: true,
	show: true
  };

  Modal.prototype.toggle = function (_relatedTarget) {
	return this[!this.isShown ? 'show' : 'hide'](_relatedTarget);
  };

  Modal.prototype.show = function (_relatedTarget) {
	var that = this;
	var e	= $.Event('show.bs.modal', { relatedTarget: _relatedTarget });

	this.$element.trigger(e);

	if (this.isShown || e.isDefaultPrevented()) return;

	this.isShown = true;

	this.escape();

	this.$element.on('click.dismiss.bs.modal', '[data-dismiss="modal"]', $.proxy(this.hide, this));

	this.backdrop(function () {
	  var transition = $.support.transition && that.$element.hasClass('fade');

	  if (!that.$element.parent().length) {
		that.$element.appendTo(document.body); // don't move modals dom position
	  }

	  that.$element
		.show()
		.scrollTop(0);

	  if (transition) {
		that.$element[0].offsetWidth; // force reflow
	  }

	  that.$element
		.addClass('in')
		.attr('aria-hidden', false);

	  that.enforceFocus();

	  var e = $.Event('shown.bs.modal', { relatedTarget: _relatedTarget });

	  transition ?
		that.$element.find('.modal-dialog') // wait for modal to slide in
		  .one($.support.transition.end, function () {
			that.$element.focus().trigger(e);
		  })
		  .emulateTransitionEnd(300) :
		that.$element.focus().trigger(e);
	})
  };

  Modal.prototype.hide = function (e) {
	if (e) e.preventDefault();

	e = $.Event('hide.bs.modal');

	this.$element.trigger(e);

	if (!this.isShown || e.isDefaultPrevented()) return;

	this.isShown = false;

	this.escape();

	$(document).off('focusin.bs.modal');

	this.$element
	  .removeClass('in')
	  .attr('aria-hidden', true)
	  .off('click.dismiss.bs.modal');

	$.support.transition && this.$element.hasClass('fade') ?
	  this.$element
		.one($.support.transition.end, $.proxy(this.hideModal, this))
		.emulateTransitionEnd(300) :
	  this.hideModal();
  };

  Modal.prototype.enforceFocus = function () {
	$(document)
	  .off('focusin.bs.modal') // guard against infinite focus loop
	  .on('focusin.bs.modal', $.proxy(function (e) {
		if (this.$element[0] !== e.target && !this.$element.has(e.target).length) {
		  this.$element.focus();
		}
	  }, this));
  };

  Modal.prototype.escape = function () {
	if (this.isShown && this.options.keyboard) {
	  this.$element.on('keyup.dismiss.bs.modal', $.proxy(function (e) {
		e.which == 27 && this.hide();
	  }, this));
	} else if (!this.isShown) {
	  this.$element.off('keyup.dismiss.bs.modal');
	}
  };

  Modal.prototype.hideModal = function () {
	var that = this;
	this.$element.hide();
	this.backdrop(function () {
	  that.removeBackdrop();
	  that.$element.trigger('hidden.bs.modal');
	});
  };

  Modal.prototype.removeBackdrop = function () {
	this.$backdrop && this.$backdrop.remove();
	this.$backdrop = null;
  };

  Modal.prototype.backdrop = function (callback) {
	var animate = this.$element.hasClass('fade') ? 'fade' : '';

	if (this.isShown && this.options.backdrop) {
	  var doAnimate = $.support.transition && animate;

	  this.$backdrop = $('<div class="modal-backdrop ' + animate + '" />')
		.appendTo(document.body);

	  this.$element.on('click.dismiss.bs.modal', $.proxy(function (e) {
		if (e.target !== e.currentTarget) return;
		this.options.backdrop == 'static'
		  ? this.$element[0].focus.call(this.$element[0])
		  : this.hide.call(this);
	  }, this));

	  if (doAnimate) this.$backdrop[0].offsetWidth; // force reflow

	  this.$backdrop.addClass('in');

	  if (!callback) return;

	  doAnimate ?
		this.$backdrop
		  .one($.support.transition.end, callback)
		  .emulateTransitionEnd(150) :
		callback();

	} else if (!this.isShown && this.$backdrop) {
	  this.$backdrop.removeClass('in');

	  $.support.transition && this.$element.hasClass('fade') ?
		this.$backdrop
		  .one($.support.transition.end, callback)
		  .emulateTransitionEnd(150) :
		callback();

	} else if (callback) {
	  callback();
	}
  };


  // MODAL PLUGIN DEFINITION
  // =======================

  var old = $.fn.modal;

  $.fn.modal = function (option, _relatedTarget) {
	return this.each(function () {
	  var $this   = $(this);
	  var data	= $this.data('bs.modal');
	  var options = $.extend({}, Modal.DEFAULTS, $this.data(), typeof option == 'object' && option);

	  if (!data) $this.data('bs.modal', (data = new Modal(this, options)));
	  if (typeof option == 'string') data[option](_relatedTarget);
	  else if (options.show) data.show(_relatedTarget);
	});
  };

  $.fn.modal.Constructor = Modal;


  // MODAL NO CONFLICT
  // =================

  $.fn.modal.noConflict = function () {
	$.fn.modal = old;
	return this;
  };


  // MODAL DATA-API
  // ==============

  $(document).on('click.bs.modal.data-api', '[data-toggle="modal"]', function (e) {
	var $this   = $(this);
	var href	= $this.attr('href');
	var $target = $($this.attr('data-target') || (href && href.replace(/.*(?=#[^\s]+$)/, ''))); //strip for ie7
	var option  = $target.data('bs.modal') ? 'toggle' : $.extend({ remote: !/#/.test(href) && href }, $target.data(), $this.data());

	if ($this.is('a')) e.preventDefault();

	$target
	  .modal(option, this)
	  .one('hide', function () {
		$this.is(':visible') && $this.focus();
	  });
  });

  $(document)
	.on('show.bs.modal', '.modal', function () { $(document.body).addClass('modal-open') })
	.on('hidden.bs.modal', '.modal', function () { $(document.body).removeClass('modal-open') });

}(jQuery);

/* ========================================================================
 * Bootstrap: tab.js v3.1.1
 * http://getbootstrap.com/javascript/#tabs
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // TAB CLASS DEFINITION
  // ====================

  var Tab = function (element) {
	this.element = $(element);
  };

  Tab.prototype.show = function () {
	var $this	= this.element;
	var $ul	  = $this.closest('ul:not(.dropdown-menu)');
	var selector = $this.data('target');

	if (!selector) {
	  selector = $this.attr('href');
	  selector = selector && selector.replace(/.*(?=#[^\s]*$)/, ''); //strip for ie7
	}

	if ($this.parent('li').hasClass('active')) return;

	var previous = $ul.find('.active:last a')[0];
	var e		= $.Event('show.bs.tab', {
	  relatedTarget: previous
	});

	$this.trigger(e);

	if (e.isDefaultPrevented()) return;

	var $target = $(selector);

	this.activate($this.parent('li'), $ul);
	this.activate($target, $target.parent(), function () {
	  $this.trigger({
		type: 'shown.bs.tab',
		relatedTarget: previous
	  });
	});
  };

  Tab.prototype.activate = function (element, container, callback) {
	var $active	= container.find('> .active');
	var transition = callback
	  && $.support.transition
	  && $active.hasClass('fade');

	function next() {
	  $active
		.removeClass('active')
		.find('> .dropdown-menu > .active')
		.removeClass('active');

	  element.addClass('active');

	  if (transition) {
		element[0].offsetWidth; // reflow for transition
		element.addClass('in');
	  } else {
		element.removeClass('fade');
	  }

	  if (element.parent('.dropdown-menu')) {
		element.closest('li.dropdown').addClass('active');
	  }

	  callback && callback();
	}

	transition ?
	  $active
		.one($.support.transition.end, next)
		.emulateTransitionEnd(150) :
	  next();

	$active.removeClass('in');
  };


  // TAB PLUGIN DEFINITION
  // =====================

  var old = $.fn.tab;

  $.fn.tab = function ( option ) {
	return this.each(function () {
	  var $this = $(this);
	  var data  = $this.data('bs.tab');

	  if (!data) $this.data('bs.tab', (data = new Tab(this)));
	  if (typeof option == 'string') data[option]();
	});
  };

  $.fn.tab.Constructor = Tab;


  // TAB NO CONFLICT
  // ===============

  $.fn.tab.noConflict = function () {
	$.fn.tab = old;
	return this;
  };


  // TAB DATA-API
  // ============

  $(document).on('click.bs.tab.data-api', '[data-toggle="tab"], [data-toggle="pill"]', function (e) {
	e.preventDefault();
	$(this).tab('show');
  });

}(jQuery);


/* ========================================================================
 * Bootstrap: tooltip.js v3.1.1
 * http://getbootstrap.com/javascript/#tooltip
 * Inspired by the original jQuery.tipsy by Jason Frame
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // TOOLTIP PUBLIC CLASS DEFINITION
  // ===============================

  var Tooltip = function (element, options) {
	this.type	   = '';
	this.options	= '';
	this.enabled	= '';
	this.timeout	= '';
	this.hoverState = '';
	this.$element   = null;

	this.init('tooltip', element, options);
  };

  Tooltip.DEFAULTS = {
	animation: true,
	placement: 'top',
	selector: false,
	template: '<div class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
	trigger: 'hover focus',
	title: '',
	delay: 0,
	html: false,
	container: false
  };

  Tooltip.prototype.init = function (type, element, options) {
	this.enabled  = true;
	this.type	 = type;
	this.$element = $(element);
	this.options  = this.getOptions(options);

	var triggers = this.options.trigger.split(' ');

	for (var i = triggers.length; i--;) {
	  var trigger = triggers[i];

	  if (trigger == 'click') {
		this.$element.on('click.' + this.type, this.options.selector, $.proxy(this.toggle, this));
	  } else if (trigger != 'manual') {
		var eventIn  = trigger == 'hover' ? 'mouseenter' : 'focusin';
		var eventOut = trigger == 'hover' ? 'mouseleave' : 'focusout';

		this.$element.on(eventIn  + '.' + this.type, this.options.selector, $.proxy(this.enter, this));
		this.$element.on(eventOut + '.' + this.type, this.options.selector, $.proxy(this.leave, this));
	  }
	}

	this.options.selector ?
	  (this._options = $.extend({}, this.options, { trigger: 'manual', selector: '' })) :
	  this.fixTitle();
  };

  Tooltip.prototype.getDefaults = function () {
	return Tooltip.DEFAULTS;
  };

  Tooltip.prototype.getOptions = function (options) {
	options = $.extend({}, this.getDefaults(), this.$element.data(), options);

	if (options.delay && typeof options.delay == 'number') {
	  options.delay = {
		show: options.delay,
		hide: options.delay
	  };
	}

	return options;
  };

  Tooltip.prototype.getDelegateOptions = function () {
	var options  = {};
	var defaults = this.getDefaults();

	this._options && $.each(this._options, function (key, value) {
	  if (defaults[key] != value) options[key] = value;
	});

	return options;
  };

  Tooltip.prototype.enter = function (obj) {
	var self = obj instanceof this.constructor ?
	  obj : $(obj.currentTarget)[this.type](this.getDelegateOptions()).data('bs.' + this.type);

	clearTimeout(self.timeout);

	self.hoverState = 'in';

	if (!self.options.delay || !self.options.delay.show) return self.show();

	self.timeout = setTimeout(function () {
	  if (self.hoverState == 'in') self.show();
	}, self.options.delay.show);
  };

  Tooltip.prototype.leave = function (obj) {
	var self = obj instanceof this.constructor ?
	  obj : $(obj.currentTarget)[this.type](this.getDelegateOptions()).data('bs.' + this.type);

	clearTimeout(self.timeout);

	self.hoverState = 'out';

	if (!self.options.delay || !self.options.delay.hide) return self.hide();

	self.timeout = setTimeout(function () {
	  if (self.hoverState == 'out') self.hide();
	}, self.options.delay.hide);
  };

  Tooltip.prototype.show = function () {
	var e = $.Event('show.bs.' + this.type);

	if (this.hasContent() && this.enabled) {
	  this.$element.trigger(e);

	  if (e.isDefaultPrevented()) return;
	  var that = this;

	  var $tip = this.tip();

	  this.setContent();

	  if (this.options.animation) $tip.addClass('fade');

	  var placement = typeof this.options.placement == 'function' ?
		this.options.placement.call(this, $tip[0], this.$element[0]) :
		this.options.placement;

	  var autoToken = /\s?auto?\s?/i;
	  var autoPlace = autoToken.test(placement);
	  if (autoPlace) placement = placement.replace(autoToken, '') || 'top';

	  $tip
		.detach()
		.css({ top: 0, left: 0, display: 'block' })
		.addClass(placement)
		.addClass(this.$element.data('class')); // Aione Edit

	  this.options.container ? $tip.appendTo(this.options.container) : $tip.insertAfter(this.$element);

	  var pos		  = this.getPosition();
	  var actualWidth  = $tip[0].offsetWidth;
	  var actualHeight = $tip[0].offsetHeight;

	  if (autoPlace) {
		var $parent = this.$element.parent();

		var orgPlacement = placement;
		var docScroll	= document.documentElement.scrollTop || document.body.scrollTop;
		var parentWidth  = this.options.container == 'body' ? window.innerWidth  : $parent.outerWidth();
		var parentHeight = this.options.container == 'body' ? window.innerHeight : $parent.outerHeight();
		var parentLeft   = this.options.container == 'body' ? 0 : $parent.offset().left;

		placement = placement == 'bottom' && pos.top   + pos.height  + actualHeight - docScroll > parentHeight  ? 'top'	:
					placement == 'top'	&& pos.top   - docScroll   - actualHeight < 0						 ? 'bottom' :
					placement == 'right'  && pos.right + actualWidth > parentWidth							  ? 'left'   :
					placement == 'left'   && pos.left  - actualWidth < parentLeft							   ? 'right'  :
					placement;

		$tip
		  .removeClass(orgPlacement)
		  .addClass(placement);
	  }

	  var calculatedOffset = this.getCalculatedOffset(placement, pos, actualWidth, actualHeight);

	  this.applyPlacement(calculatedOffset, placement);
	  this.hoverState = null;

	  var complete = function() {
		that.$element.trigger('shown.bs.' + that.type);
	  };

	  $.support.transition && this.$tip.hasClass('fade') ?
		$tip
		  .one($.support.transition.end, complete)
		  .emulateTransitionEnd(150) :
		complete();
	}
  };

  Tooltip.prototype.applyPlacement = function (offset, placement) {
	var replace;
	var $tip   = this.tip();
	var width  = $tip[0].offsetWidth;
	var height = $tip[0].offsetHeight;

	// manually read margins because getBoundingClientRect includes difference
	var marginTop = parseInt($tip.css('margin-top'), 10);
	var marginLeft = parseInt($tip.css('margin-left'), 10);

	// we must check for NaN for ie 8/9
	if (isNaN(marginTop))  marginTop  = 0;
	if (isNaN(marginLeft)) marginLeft = 0;

	offset.top  = offset.top  + marginTop;
	offset.left = offset.left + marginLeft;

	// $.fn.offset doesn't round pixel values
	// so we use setOffset directly with our own function B-0
	$.offset.setOffset($tip[0], $.extend({
	  using: function (props) {
		$tip.css({
		  top: Math.round(props.top),
		  left: Math.round(props.left)
		});
	  }
	}, offset), 0);

	$tip.addClass('in');

	// check to see if placing tip in new offset caused the tip to resize itself
	var actualWidth  = $tip[0].offsetWidth;
	var actualHeight = $tip[0].offsetHeight;

	if (placement == 'top' && actualHeight != height) {
	  replace = true;
	  offset.top = offset.top + height - actualHeight;
	}

	if (/bottom|top/.test(placement)) {
	  var delta = 0;

	  if (offset.left < 0) {
		delta	   = offset.left * -2;
		offset.left = 0;

		$tip.offset(offset);

		actualWidth  = $tip[0].offsetWidth;
		actualHeight = $tip[0].offsetHeight;
	  }

	  this.replaceArrow(delta - width + actualWidth, actualWidth, 'left');
	} else {
	  this.replaceArrow(actualHeight - height, actualHeight, 'top');
	}

	if (replace) $tip.offset(offset);
  };

  Tooltip.prototype.replaceArrow = function (delta, dimension, position) {
	this.arrow().css(position, delta ? (50 * (1 - delta / dimension) + '%') : '');
  };

  Tooltip.prototype.setContent = function () {
	var $tip  = this.tip();
	var title = this.getTitle();

	$tip.find('.tooltip-inner')[this.options.html ? 'html' : 'text'](title);
	$tip.removeClass('fade in top bottom left right');
  };

  Tooltip.prototype.hide = function () {
	var that = this;
	var $tip = this.tip();
	var e	= $.Event('hide.bs.' + this.type);

	function complete() {
	  if (that.hoverState != 'in') $tip.detach();
	  that.$element.trigger('hidden.bs.' + that.type);
	};

	this.$element.trigger(e);

	if (e.isDefaultPrevented()) return;

	$tip.removeClass('in');

	$.support.transition && this.$tip.hasClass('fade') ?
	  $tip
		.one($.support.transition.end, complete)
		.emulateTransitionEnd(150) :
	  complete();

	this.hoverState = null;

	return this;
  };

  Tooltip.prototype.fixTitle = function () {
	var $e = this.$element;
	if ($e.attr('title') || typeof($e.attr('data-original-title')) != 'string') {
	  //$e.attr('data-original-title', $e.attr('title') || '').attr('title', '');
	  $e.attr('data-original-title', $e.attr('title') || '');  // Aione Edit
	}
  };

  Tooltip.prototype.hasContent = function () {
	return this.getTitle();
  };

  Tooltip.prototype.getPosition = function () {
	var el = this.$element[0];
	return $.extend({}, (typeof el.getBoundingClientRect == 'function') ? el.getBoundingClientRect() : {
	  width: el.offsetWidth,
	  height: el.offsetHeight
	}, this.$element.offset());
  };

  Tooltip.prototype.getCalculatedOffset = function (placement, pos, actualWidth, actualHeight) {
	return placement == 'bottom' ? { top: pos.top + pos.height,   left: pos.left + pos.width / 2 - actualWidth / 2  } :
		   placement == 'top'	? { top: pos.top - actualHeight, left: pos.left + pos.width / 2 - actualWidth / 2  } :
		   placement == 'left'   ? { top: pos.top + pos.height / 2 - actualHeight / 2, left: pos.left - actualWidth } :
		/* placement == 'right' */ { top: pos.top + pos.height / 2 - actualHeight / 2, left: pos.left + pos.width   };
  };

  Tooltip.prototype.getTitle = function () {
	var title;
	var $e = this.$element;
	var o  = this.options;

	title = $e.attr('data-original-title')
	  || (typeof o.title == 'function' ? o.title.call($e[0]) :  o.title);

	return title;
  };

  Tooltip.prototype.tip = function () {
	return this.$tip = this.$tip || $(this.options.template);
  };

  Tooltip.prototype.arrow = function () {
	return this.$arrow = this.$arrow || this.tip().find('.tooltip-arrow');
  };

  Tooltip.prototype.validate = function () {
	if (!this.$element[0].parentNode) {
	  this.hide();
	  this.$element = null;
	  this.options  = null;
	}
  };

  Tooltip.prototype.enable = function () {
	this.enabled = true;
  };

  Tooltip.prototype.disable = function () {
	this.enabled = false;
  };

  Tooltip.prototype.toggleEnabled = function () {
	this.enabled = !this.enabled;
  };

  Tooltip.prototype.toggle = function (e) {
	var self = e ? $(e.currentTarget)[this.type](this.getDelegateOptions()).data('bs.' + this.type) : this;
	self.tip().hasClass('in') ? self.leave(self) : self.enter(self);
  };

  Tooltip.prototype.destroy = function () {
	clearTimeout(this.timeout);
	this.hide().$element.off('.' + this.type).removeData('bs.' + this.type);
  };


  // TOOLTIP PLUGIN DEFINITION
  // =========================

  var old = $.fn.tooltip;

  $.fn.tooltip = function (option) {
	return this.each(function () {
	  var $this   = $(this);
	  var data	= $this.data('bs.tooltip');
	  var options = typeof option == 'object' && option;

	  if (!data && option == 'destroy') return;
	  if (!data) $this.data('bs.tooltip', (data = new Tooltip(this, options)));
	  if (typeof option == 'string') data[option]();
	});
  };

  $.fn.tooltip.Constructor = Tooltip;


  // TOOLTIP NO CONFLICT
  // ===================

  $.fn.tooltip.noConflict = function () {
	$.fn.tooltip = old;
	return this;
  };

}(jQuery);

/* ========================================================================
 * Bootstrap: popover.js v3.1.1
 * http://getbootstrap.com/javascript/#popovers
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // POPOVER PUBLIC CLASS DEFINITION
  // ===============================

  var Popover = function (element, options) {
	this.init('popover', element, options);
  };

  if (!$.fn.tooltip) throw new Error('Popover requires tooltip.js');

  Popover.DEFAULTS = $.extend({}, $.fn.tooltip.Constructor.DEFAULTS, {
	placement: 'right',
	trigger: 'click',
	content: '',
	template: '<div class="popover"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
  });


  // NOTE: POPOVER EXTENDS tooltip.js
  // ================================

  Popover.prototype = $.extend({}, $.fn.tooltip.Constructor.prototype);

  Popover.prototype.constructor = Popover;

  Popover.prototype.getDefaults = function () {
	return Popover.DEFAULTS;
  };

  Popover.prototype.setContent = function () {
	var $tip	= this.tip();
	var title   = this.getTitle();
	var content = this.getContent();

	$tip.find('.popover-title')[this.options.html ? 'html' : 'text'](title);
	$tip.find('.popover-content')[ // we use append for html objects to maintain js events
	  this.options.html ? (typeof content == 'string' ? 'html' : 'append') : 'text'
	](content);

	$tip.removeClass('fade top bottom left right in');

	// IE8 doesn't accept hiding via the `:empty` pseudo selector, we have to do
	// this manually by checking the contents.
	if (!$tip.find('.popover-title').html()) $tip.find('.popover-title').hide();
  };

  Popover.prototype.hasContent = function () {
	return this.getTitle() || this.getContent();
  };

  Popover.prototype.getContent = function () {
	var $e = this.$element;
	var o  = this.options;

	return $e.attr('data-content')
	  || (typeof o.content == 'function' ?
			o.content.call($e[0]) :
			o.content);
  };

  Popover.prototype.arrow = function () {
	return this.$arrow = this.$arrow || this.tip().find('.arrow');
  };

  Popover.prototype.tip = function () {
	if (!this.$tip) this.$tip = $(this.options.template);
	return this.$tip;
  };


  // POPOVER PLUGIN DEFINITION
  // =========================

  var old = $.fn.popover;

  $.fn.popover = function (option) {
	return this.each(function () {
	  var $this   = $(this);
	  var data	= $this.data('bs.popover');
	  var options = typeof option == 'object' && option;

	  if (!data && option == 'destroy') return;
	  if (!data) $this.data('bs.popover', (data = new Popover(this, options)));
	  if (typeof option == 'string') data[option]();
	});
  };

  $.fn.popover.Constructor = Popover;


  // POPOVER NO CONFLICT
  // ===================

  $.fn.popover.noConflict = function () {
	$.fn.popover = old;
	return this;
  };

}(jQuery);


/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 *
 * Open source under the BSD License.
 *
 * Copyright Â© 2008 George McGinley Smith
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 * Redistributions of source code must retain the above copyright notice, this list of
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list
 * of conditions and the following disclaimer in the documentation and/or other materials
 * provided with the distribution.
 *
 * Neither the name of the author nor the names of contributors may be used to endorse
 * or promote products derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 *
*/

// t: current time, b: begInnIng value, c: change In value, d: duration
jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
	def: 'easeOutQuad',
	swing: function (x, t, b, c, d) {
		//alert(jQuery.easing.default);
		return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
	},
	easeInQuad: function (x, t, b, c, d) {
		return c*(t/=d)*t + b;
	},
	easeOutQuad: function (x, t, b, c, d) {
		return -c *(t/=d)*(t-2) + b;
	},
	easeInOutQuad: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t + b;
		return -c/2 * ((--t)*(t-2) - 1) + b;
	},
	easeInCubic: function (x, t, b, c, d) {
		return c*(t/=d)*t*t + b;
	},
	easeOutCubic: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t + 1) + b;
	},
	easeInOutCubic: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t + b;
		return c/2*((t-=2)*t*t + 2) + b;
	},
	easeInQuart: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t + b;
	},
	easeOutQuart: function (x, t, b, c, d) {
		return -c * ((t=t/d-1)*t*t*t - 1) + b;
	},
	easeInOutQuart: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
		return -c/2 * ((t-=2)*t*t*t - 2) + b;
	},
	easeInQuint: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t*t + b;
	},
	easeOutQuint: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	},
	easeInOutQuint: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
		return c/2*((t-=2)*t*t*t*t + 2) + b;
	},
	easeInSine: function (x, t, b, c, d) {
		return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
	},
	easeOutSine: function (x, t, b, c, d) {
		return c * Math.sin(t/d * (Math.PI/2)) + b;
	},
	easeInOutSine: function (x, t, b, c, d) {
		return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
	},
	easeInExpo: function (x, t, b, c, d) {
		return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
	},
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
	},
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	},
	easeInCirc: function (x, t, b, c, d) {
		return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
	},
	easeOutCirc: function (x, t, b, c, d) {
		return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
	},
	easeInOutCirc: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
		return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
	},
	easeInElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
	},
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	},
	easeInOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
		return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
	},
	easeInBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*(t/=d)*t*((s+1)*t - s) + b;
	},
	easeOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	},
	easeInOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
		return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
	},
	easeInBounce: function (x, t, b, c, d) {
		return c - jQuery.easing.easeOutBounce (x, d-t, 0, c, d) + b;
	},
	easeOutBounce: function (x, t, b, c, d) {
		if ((t/=d) < (1/2.75)) {
			return c*(7.5625*t*t) + b;
		} else if (t < (2/2.75)) {
			return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
		} else if (t < (2.5/2.75)) {
			return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
		} else {
			return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
		}
	},
	easeInOutBounce: function (x, t, b, c, d) {
		if (t < d/2) return jQuery.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
		return jQuery.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
	}
});


/*
 * Dynamic javascript File Port
 */

function insertParam(url, parameterName, parameterValue, atStart){
	replaceDuplicates = true;

	if(url.indexOf('#') > 0){
		var cl = url.indexOf('#');
		urlhash = url.substring(url.indexOf('#'),url.length);
	} else {
		urlhash = '';
		cl = url.length;
	}
	sourceUrl = url.substring(0,cl);

	var urlParts = sourceUrl.split("?");
	var newQueryString = "";

	if (urlParts.length > 1)
	{
		var parameters = urlParts[1].split("&");
		for (var i=0; (i < parameters.length); i++)
		{
			var parameterParts = parameters[i].split("=");
			if (!(replaceDuplicates && parameterParts[0] == parameterName))
			{
				if (newQueryString == "") {
					newQueryString = "?" + parameterParts[0] + "=" + (parameterParts[1]?parameterParts[1]:'');
				}
				else {
					newQueryString += "&";
					newQueryString += parameterParts[0] + "=" + (parameterParts[1]?parameterParts[1]:'');
				}
			}
		}
	}
	if (newQueryString == "")
		newQueryString = "?";

	if(atStart){
		newQueryString = '?'+ parameterName + "=" + parameterValue + (newQueryString.length>1?'&'+newQueryString.substring(1):'');
	} else {
		if (newQueryString !== "" && newQueryString != '?')
			newQueryString += "&";
		newQueryString += parameterName + "=" + (parameterValue?parameterValue:'');
	}
	return urlParts[0] + newQueryString + urlhash;
}

function ytVidId(url) {
	var p = /^(?:https?:)?(\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
	return (url.match(p)) ? RegExp.$1 : false;
	//return (url.match(p)) ? true : false;
}

jQuery(document).ready(function() {
	jQuery('.portfolio-wrapper').hide();
	jQuery('.portfolio-tabs ').hide();
	jQuery('.faq-tabs ').hide();
	if(jQuery('.portfolio').length >= 1) {
		jQuery('#content').append('<div class="loading-container"><img src="' + js_local_vars.theme_url + '/images/loading.gif' + '" alt="Loading..."><div class="loading-msg">'+js_local_vars.portfolio_loading_text+'</div>');
	}
	if(jQuery('.faqs').length >= 1) {
		jQuery('#content').append('<div class="loading-container"><img src="' + js_local_vars.theme_url + '/images/loading.gif' + '" alt="Loading..."><div class="loading-msg">'+js_local_vars.faqs_loading_text+'</div>');
	}

	var iframes = jQuery('iframe');
	jQuery.each(iframes, function(i, v) {
		var src = jQuery(this).attr('src');
		if(src) {
			if(!Number(js_local_vars.status_vimeo) && src.indexOf('vimeo') >= 1) {
				jQuery(this).attr('id', 'player_'+(i+1));
				var new_src = insertParam(src, 'api', '1', false);
				var new_src_2 = insertParam(new_src, 'player_id', 'player_'+(i+1), false);

				jQuery(this).attr('src', new_src_2);
			}

			if(!Number(js_local_vars.status_yt) && ytVidId(src)) {
				jQuery(this).attr('id', 'player_'+(i+1));
				jQuery(this).parent().wrap('<span class="play3" />');

				var new_src = insertParam(src, 'enablejsapi', '1', false);

				jQuery(this).attr('src', new_src);

				window.yt_vid_exists = true;
			}
		}
	});

	if(!Number(js_local_vars.status_yt) && window.yt_vid_exists == true) {
		var tag = document.createElement('script');
		tag.src = window.location.protocol + "//www.youtube.com/iframe_api";
		var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
	}
});


// Define YT_ready function.
var YT_ready = (function() {
	var onReady_funcs = [], api_isReady = false;
	/* @param func function	 Function to execute on ready
	 * @param func Boolean	  If true, all qeued functions are executed
	 * @param b_before Boolean  If true, the func will added to the first
	 position in the queue*/
	return function(func, b_before) {
		if (func === true) {
			api_isReady = true;
			while (onReady_funcs.length) {
				// Removes the first func from the array, and execute func
				onReady_funcs.shift()();
			}
		} else if (typeof func == "function") {
			if (api_isReady) func();
			else onReady_funcs[b_before?"unshift":"push"](func);
		}
	}
})();

// This function will be called when the API is fully loaded
function onYouTubePlayerAPIReady() {YT_ready(true);}

// Control header-v1 and sticky on tfs parallax pages

// Setting some global vars. Those are also needed for the correct header resizing on none parallax slider pages
var orig_logo_height = jQuery('.header-wrapper' ).find( '.logo' ).height();
var orig_logo_container_margin_top = String( jQuery('.header-wrapper' ).find( '.logo' ).data( 'margin-top' ) );
var orig_logo_container_margin_bottom = String( jQuery('.header-wrapper' ).find( '.logo' ).data( 'margin-bottom' ) );
var orig_menu_height = jQuery( '.header-wrapper .aione-navbar-nav > li > a' ).outerHeight();
if( jQuery( '#wrapper' ).length >= 1 ) {
	var wrapper_position = jQuery( '#wrapper' ).position().left;
} else {
	var wrapper_position;
}
var is_parallax_tfs_slider = false;

if ( ! orig_logo_container_margin_top ) {
	orig_logo_container_margin_top = '0px';
}

if ( ! orig_logo_container_margin_bottom ) {
	orig_logo_container_margin_bottom = '0px';
}

// Make sure that the modern sticky header animation is only used for the parallax special case with header above slider and on none transparent header
if( js_local_vars.header_sticky == '1' && jQuery( '.header-v1' ).length && jQuery( '.header-wrapper' ).css( 'position' ) != 'absolute' && jQuery( '.header-wrapper' ).prev().attr( 'id' ) != 'sliders-container'  ) {

	jQuery( '.tfs-slider' ).each( function() {
		if( ! jQuery( this ).parents('.post-content').length && jQuery( this ).data( 'parallax' ) == 1 ) {
			is_parallax_tfs_slider = true;

			jQuery( window ).scroll( animate_scrolled_header_v1 );

			if( ! Modernizr.mq('only screen and (max-width: 1000px)') ) {
				jQuery( '#header-sticky' ).addClass( 'tfs_parallax' );
			}
		}
	});

	// Only use modern sticky when parallax slider in sliders container is used
	if( is_parallax_tfs_slider ) {

		if( orig_logo_height + parseInt(orig_logo_container_margin_top.replace( 'px', '' ) ) + parseInt( orig_logo_container_margin_bottom.replace( 'px', '' ) ) > orig_menu_height ) {
			var orig_header_height = orig_logo_height + parseInt(orig_logo_container_margin_top.replace( 'px', '' ) ) + parseInt( orig_logo_container_margin_bottom.replace( 'px', '' ) );
		} else {
			var orig_header_height = orig_menu_height;
		}

		var is_scrolled = false;
		var scrolled_header_height = 65;

		if( jQuery( '.header-wrapper' ).find( '.logo .logo_normal:visible' ) ) {
			var scrolled_logo_height = jQuery( '.header-v1' ).find( '.logo .normal_logo' ).height();
			if(  scrolled_logo_height < scrolled_header_height - 10 ) {
				var scrolled_logo_container_margin = ( scrolled_header_height - scrolled_logo_height ) / 2;
			} else {
				scrolled_logo_height = scrolled_header_height - 10;
				var scrolled_logo_container_margin = 5;
			}
		}

		jQuery(window).on('resize', function() {
			if( jQuery( '#wrapper' ).length >= 1 ) {
				wrapper_position = jQuery( '#wrapper' ).position().left;
			} else {
				wrapper_position;
			}

			if( Modernizr.mq('only screen and (max-width: 1000px)') ) {
				jQuery( '.header-v1' ).css( {
					'height': '',
					'position': ''
				});

				jQuery( '#header-sticky' ).removeClass( 'tfs_parallax' );
			}

			if( ! Modernizr.mq('only screen and (max-width: 1000px)') ) {
				if( is_scrolled ) {
					jQuery( '.header-wrapper' ).css({
						'margin-left': -wrapper_position + 'px',
						'height': scrolled_header_height
					});

					if( js_local_vars.layout_mode == 'boxed' ) {
						jQuery( '.header-v1' ).css({
							'width': jQuery( '#wrapper' ).width(),
							'left': '0',
							'right': '0',
							'margin': ' 0 auto'
						});
					} else {
						jQuery( '.header-v1' ).css({
							'width': '100%',
						});
					}

					jQuery( '.header-v1' ).css({
						'position': 'fixed',
						'height': scrolled_header_height,
						'-webkit-box-shadow': '0 1px 3px rgba(0, 0, 0, 0.12)',
						'-moz-box-shadow': '0 1px 3px rgba(0, 0, 0, 0.12)',
						'box-shadow': '0 1px 3px rgba(0, 0, 0, 0.12)'
					});

					jQuery( '.header-wrapper' ).find( '.aione-row' ).css({
						'padding-top': '0',
						'padding-bottom': '0'
					});

					if( jQuery( '.header-wrapper' ).find( '.logo .logo_normal:visible' ) ) {
						jQuery( '.header-wrapper' ).find( '.logo .logo_normal' ).css({
							'height': scrolled_logo_height
						});
					}

					jQuery( '.header-wrapper' ).find( '.logo' ).css({
						'margin-top': scrolled_logo_container_margin,
						'margin-bottom': scrolled_logo_container_margin
					});

					jQuery( '.header-wrapper' ).find( '.aione-navbar-nav > li > a' ).css({
						'height': scrolled_header_height - 3 + 'px',
						'line-height': scrolled_header_height - 3 + 'px'
					});
				}

				if( ! is_scrolled ) {
					jQuery( '.header-wrapper, .header-v1' ).css( 'height', orig_header_height );

					jQuery( '.header-wrapper' ).find( '.logo' ).css({
						'margin-top': orig_logo_container_margin_top,
						'margin-bottom': orig_logo_container_margin_top,
						'height': orig_logo_height
					});

					jQuery( '.header-wrapper' ).find( '.aione-navbar-nav > li > a' ).css({
						'height': orig_menu_height + 'px',
						'line-height': orig_menu_height + 'px'
					});
				}

				jQuery( '#header-sticky' ).addClass( 'tfs_parallax' );
			}
		});
	}
}

function animate_scrolled_header_v1() {
	if( jQuery( '#wrapper' ).length >= 1 ) {
		wrapper_position = jQuery( '#wrapper' ).position().left;
	} else {
		wrapper_position;
	}

	if( ! Modernizr.mq('only screen and (max-width: 1000px)') ) {
		if( jQuery(window).scrollTop() > 0 ) {
			if( ! is_scrolled ) {
				jQuery( '.header-wrapper' ).css({
					'z-index': '5',
					'position': '',
					'margin-left': -wrapper_position + 'px',
					'height': orig_header_height
				});

				if( js_local_vars.layout_mode == 'boxed' ) {
					jQuery( '.header-v1' ).css({
						'width': jQuery( '#wrapper' ).width(),
						'left': '0',
						'right': '0',
						'margin': ' 0 auto'
					});
				} else {
					jQuery( '.header-v1' ).css({
						'width': '100%',
					});
				}

				jQuery( '.header-v1' ).css( {
					'z-index': '5',
					'position': 'fixed',
					'height': orig_header_height,
					'-webkit-box-shadow': '0 1px 3px rgba(0, 0, 0, 0.12)',
					'-moz-box-shadow': '0 1px 3px rgba(0, 0, 0, 0.12)',
					'box-shadow': '0 1px 3px rgba(0, 0, 0, 0.12)',
					'-webkit-backface-visibility': 'hidden'
				});

				jQuery( '.header-wrapper' ).find( '.aione-navbar-nav > li > a' ).css( 'height', orig_menu_height );

				jQuery( '.header-wrapper,	 .header-v1' ).stop(true, true).animate({
					height: scrolled_header_height
				}, { queue:false, duration:350, easing: 'easeOutCubic' });

				jQuery( '.header-wrapper' ).find( '.aione-row' ).stop(true, true).animate({
					'padding-top': '0',
					'padding-bottom': '0'
				}, { queue:false, duration:350, easing: 'easeOutCubic' });

				if( jQuery( '.header-wrapper' ).find( '.logo .logo_normal:visible' ) ) {
					var scrolled_logo_height = jQuery( '.header-v1' ).find( '.logo .normal_logo' ).height();
					if(  scrolled_logo_height < scrolled_header_height - 10 ) {
						var scrolled_logo_container_margin = ( scrolled_header_height - scrolled_logo_height ) / 2;
					} else {
						scrolled_logo_height = scrolled_header_height - 10;
						var scrolled_logo_container_margin = 5;
					}

					jQuery( '.header-wrapper' ).find( '.logo .logo_normal' ).stop(true, true).animate({
						'height': scrolled_logo_height
					}, { queue:false, duration:350, easing: 'easeOutCubic' });
				}

				jQuery( '.header-wrapper' ).find( '.logo' ).stop(true, true).animate({
					'margin-top': scrolled_logo_container_margin,
					'margin-bottom': scrolled_logo_container_margin
				}, { queue:false, duration:350, easing: 'easeOutCubic' });

				jQuery( '.header-wrapper' ).find( '.aione-navbar-nav > li > a' ).stop(true, true).animate({
					height: scrolled_header_height - 3,
					'line-height': scrolled_header_height - 3
				}, { queue:false, duration:350, easing: 'easeOutCubic', complete: function() {
						if( ! jQuery( '.header-v1 .nav-holder style' ).length ) {
							jQuery( '.header-v1 .nav-holder' ).prepend( '<style>.header-v1 #nav.nav-holder .navigation > .cart > a { height:' + scrolled_header_height + ';line-height:' + scrolled_header_height + '; }</style>' );
						}
					}
				});
			}
		} else {
			if( is_scrolled ) {

				jQuery( '.header-v1' ).css( {
					'-webkit-box-shadow': '',
					'-moz-box-shadow': '',
					'box-shadow': '',
					'-webkit-backface-visibility': ''
				});

				jQuery( '.header-wrapper, .header-v1' ).stop(true, true).animate({
					'height': orig_header_height
				}, { queue:false, duration:350, easing: 'easeOutCubic', complete: function() {
						jQuery( '.header-wrapper' ).css( 'margin-left', '' );

						jQuery( this ).css({
							'position': 'relative',
							'width': ''
						});
					}
				});

				jQuery( '.header-wrapper' ).find( '.aione-row' ).stop(true, true).animate({
					'padding-top': '0',
					'padding-bottom': '0'
				}, { queue:false, duration:350, easing: 'easeOutCubic' });

				if( jQuery( '.header-wrapper' ).find( '.logo .logo_normal:visible' ) ) {
					jQuery( '.header-wrapper' ).find( '.logo .logo_normal' ).stop(true, true).animate({
						'height': orig_logo_height
					}, { queue:false, duration:350, easing: 'easeOutCubic' });
				}

				jQuery( '.header-wrapper' ).find( '.logo' ).stop(true, true).animate({
					'margin-top': orig_logo_container_margin_top,
					'margin-bottom': orig_logo_container_margin_bottom
				}, { queue:false, duration:350, easing: 'easeOutCubic' });

				jQuery( '.header-wrapper' ).find( '.aione-navbar-nav > li > a' ).stop(true, true).animate({
					'height': orig_menu_height,
					'line-height': orig_menu_height
				}, { queue:false, duration:350, easing: 'easeOutCubic', complete: function() {
						if( jQuery( '.header-wrapper .nav-holder style' ).length ) {
							jQuery( '.header-wrapper .nav-holder style' ).remove();
						}
					}
				});
			}
		}
	}

	if( jQuery(window).scrollTop() > 0 ) {
		is_scrolled = true;
	} else {
		is_scrolled = false;
	}
}

jQuery(window).load(function() {
	var headerHeight = jQuery('.header-wrapper').height();

	if( jQuery( '.header-v1' ).length ) {
		if( orig_logo_height + parseInt(orig_logo_container_margin_top.replace( 'px', '' ) ) + parseInt( orig_logo_container_margin_bottom.replace( 'px', '' ) ) > orig_menu_height ) {
			headerHeight = orig_logo_height + parseInt(orig_logo_container_margin_top.replace( 'px', '' ) ) + parseInt( orig_logo_container_margin_bottom.replace( 'px', '' ) );
		} else {
			headerHeight = orig_menu_height;
		}
	}

	if(jQuery('.sidebar').is(':visible')) {
		jQuery('.post-content div.portfolio').each(function() {
			var columns = jQuery(this).data('columns');
			jQuery(this).addClass('portfolio-'+columns+'-sidebar');
		});
	}

	if(jQuery().isotope) {
		imagesLoaded(jQuery('.portfolio-one .portfolio-wrapper'), function() {
			jQuery('.portfolio-wrapper').fadeIn();
			jQuery('.portfolio-tabs').fadeIn();
			jQuery('.faq-tabs').fadeIn();
			jQuery('.loading-container').fadeOut();
			jQuery('.portfolio-one .portfolio-wrapper').isotope({
				// options
				itemSelector: '.portfolio-item',
				layoutMode: 'vertical',
				transformsEnabled: false,
				isOriginLeft: jQuery( '.rtl' ).length ? false : true
			});
			jQuery('[data-spy="scroll"]').each(function () {
				var $spy = jQuery(this).scrollspy('refresh');
			});
		});

		imagesLoaded(jQuery('.portfolio-masonry .portfolio-wrapper, .portfolio-two .portfolio-wrapper, .portfolio-three .portfolio-wrapper, .portfolio-four .portfolio-wrapper, .portfolio-five .portfolio-wrapper, .portfolio-six .portfolio-wrapper'),function() {
			jQuery('.portfolio-wrapper').fadeIn();
			jQuery('.portfolio-tabs').fadeIn();
			jQuery('.loading-container').fadeOut();
			jQuery('.portfolio-masonry .portfolio-wrapper, .portfolio-two .portfolio-wrapper, .portfolio-three .portfolio-wrapper, .portfolio-four .portfolio-wrapper, .portfolio-five .portfolio-wrapper, .portfolio-six .portfolio-wrapper').isotope({
				// options
				itemSelector: '.portfolio-item',
				resizable: true,
				layoutMode: js_local_vars.isotope_type,
				transformsEnabled: false,
				isOriginLeft: jQuery( '.rtl' ).length ? false : true
			});
			jQuery('[data-spy="scroll"]').each(function () {
				var $spy = jQuery(this).scrollspy('refresh');
			});
		});

		jQuery(window).resize(function() {
			jQuery('.portfolio-wrapper').isotope();
		});

		/*
		var masonryContainer = jQuery('.portfolio-masonry .portfolio-wrapper');
		imagesLoaded(masonryContainer, function() {
			jQuery('.portfolio-wrapper').fadeIn();
			jQuery('.portfolio-tabs').fadeIn();
			jQuery('.loading-container').fadeOut();
			var gridTwo = masonryContainer.parent().hasClass('portfolio-grid-2');
			var columns;
			if(gridTwo) {
				columns = 2;
			} else {
				columns = 3;
			}
			masonryContainer.isotope({
				// options
				itemSelector: '.portfolio-item',
				layoutMode: 'masonry',
				transformsEnabled: false,
				isOriginLeft: jQuery( '.rtl' ).length ? false : true,
				masonry: { columnWidth: masonryContainer.width() / columns }
			});
			jQuery('[data-spy="scroll"]').each(function () {
				var $spy = jQuery(this).scrollspy('refresh');
			});
		});
		*/
	}

	if(jQuery().flexslider) {
		var aione_ytplayer;

		if(!Number(js_local_vars.status_vimeo)) {
			function ready(player_id) {
				var froogaloop = $f(player_id);

				var slide = jQuery('#' + player_id).parents('li');

				froogaloop.addEvent('play', function (data) {
					jQuery('#' + player_id).parents('li').parent().parent().flexslider("pause");
				});

				froogaloop.addEvent('pause', function (data) {
					if(jQuery(slide).attr('data-loop') == 'yes') {
						jQuery('#' + player_id).parents('li').parent().parent().flexslider("pause");
					} else {
						jQuery('#' + player_id).parents('li').parent().parent().flexslider("play");
					}
				});
			}

			var vimeoPlayers = jQuery('.flexslider').find('iframe'), player;

			jQuery('.flexslider').find('iframe').each(function () {
				var id = jQuery(this).attr('id');

				if(id) {
					$f(id).addEvent('ready', ready);
				}
			});

			function addEvent(element, eventName, callback) {
				if (element.addEventListener) {
					element.addEventListener(eventName, callback, false)
				} else {
					element.attachEvent(eventName, callback, false);
				}
			}
		}

		jQuery('.full-video, .video-shortcode, .wooslider .slide-content').not('#bbpress-forums full-video, #bbpress-forums .video-shortcode, #bbpress-forums .wooslider .slide-content').fitVids();
		jQuery('#bbpress-forums').fitVids();

		jQuery('.tfs-slider').each(function() {
			var this_tfslider = this;

			var first_slide = jQuery(this_tfslider).find('li').get(0);

			if(jQuery(this_tfslider).parents('.post-content').length >= 1) {
				jQuery(this_tfslider).data('parallax', 0);
			}

			if(cssua.ua.tablet_pc) {
				jQuery(this_tfslider).data('full_screen', 0);
				jQuery(this_tfslider).data('parallax', 0);
			}

			if(cssua.ua.mobile) {
				jQuery(this_tfslider).data('parallax', 0);
			}

			wpadminbarHeight = 0;
			if(jQuery('#wpadminbar').length >= 1) {
				var wpadminbarHeight = jQuery('#wpadminbar').height();
			}

			if(jQuery(this_tfslider).data('full_screen') == 1) {

				var sliderHeight = jQuery(window).height();
				if(jQuery(this_tfslider).parents('#sliders-container').next().hasClass('header-wrapper')) {
					sliderHeight = sliderHeight + (headerHeight - wpadminbarHeight);
				}

				if(Modernizr.mq('only screen and (max-width: 800px)')) {
					var sliderHeight = jQuery(window).height() - (headerHeight + wpadminbarHeight);
				}

				jQuery(this_tfslider).find('video').each(function() {
					var aspect_ratio = jQuery(this).width() / jQuery(this).height();
					var arc_sliderWidth = aspect_ratio * sliderHeight;
					var arc_sliderLeft = '-' + ((arc_sliderWidth - jQuery(this_tfslider).width()) / 2) + 'px';
					var compare_width = jQuery(window).width();
					if(jQuery(this_tfslider).parents('.post-content').length >= 1) {
						compare_width = jQuery(this_tfslider).width();
					}
					if(compare_width > arc_sliderWidth) {
						arc_sliderWidth = '100%';
						arc_sliderLeft = 0;
					}
					jQuery(this).width(arc_sliderWidth);
					jQuery(this).css('left', arc_sliderLeft);
				});
			} else {
				var sliderWidth = jQuery(this_tfslider).data('slider_width');
				var sliderHeight = parseInt(jQuery(this_tfslider).data('slider_height'));
			}

			if(jQuery(this_tfslider).data('full_screen') == 1) {
				jQuery(this_tfslider).css('max-width', '100%');
				jQuery(this_tfslider).find('.slides, .background').css('width', '100%');
			}

			jQuery(this_tfslider).parents('.aione-slider-container').css('height', sliderHeight);
			jQuery(this_tfslider).css('height', sliderHeight);
			jQuery(this_tfslider).find('.background, .mobile_video_image').css('height', sliderHeight);

			if(jQuery('.layout-boxed-mode').length >= 1) {
				var boxed_mode_width = jQuery('.layout-boxed-mode #wrapper').width();
				jQuery(this_tfslider).css('width', boxed_mode_width);
				jQuery(this_tfslider).css('margin-left', 'auto');
				jQuery(this_tfslider).css('margin-right', 'auto');

				if(jQuery(this_tfslider).data('parallax') == 1 && ! Modernizr.mq('only screen and (max-width: 1000px)')) {
					jQuery(this_tfslider).css('left', '50%');
					jQuery(this_tfslider).css('margin-left', '-' + (boxed_mode_width / 2) + 'px');
				}
				jQuery(this_tfslider).find('.slides, .background').css('width', '100%');
			}

			if(cssua.ua.mobile) {
				jQuery(this_tfslider).find('a.button').each(function() {
					jQuery(this).removeClass('xlarge large medium button-xlarge button-large button-medium');
					jQuery(this).addClass('small button-small');
				});
				jQuery(this_tfslider).find('li').each(function() {
					jQuery(this).attr('data-autoplay', 'no');
					jQuery(this).data('autoplay', 'no');
				});
			}

			jQuery(this_tfslider).find('a.button').each(function() {
				jQuery(this).data('old', jQuery(this).attr('class'));
			});

			if(Modernizr.mq('only screen and (max-width: 800px)')) {
				jQuery(this_tfslider).find('a.button').each(function() {
					jQuery(this).data('old', jQuery(this).attr('class'));
					jQuery(this).removeClass('xlarge large medium button-xlarge button-large button-medium');
					jQuery(this).addClass('small button-small');
				});
			} else {
				jQuery(this_tfslider).find('a.button').each(function() {
					jQuery(this).attr('class', jQuery(this).data('old'));
				});
			}

			if(jQuery(this_tfslider).data('parallax') == 1) {
				jQuery(window).scroll(function () {
					if(jQuery(window).scrollTop() >= jQuery(this_tfslider).parents('#sliders-container').position().top + jQuery(this_tfslider).parents('#sliders-container').height()) {
						jQuery(this_tfslider).css('display', 'none');
					} else {
						jQuery(this_tfslider).css('display', 'block');
					}
				});
			}

			jQuery(window).on('resize', function() {
				var wpadminbarHeight = 0;
				var headerHeight = jQuery('.header-wrapper').height();

				if( orig_logo_height + parseInt(orig_logo_container_margin_top.replace( 'px', '' ) ) + parseInt( orig_logo_container_margin_bottom.replace( 'px', '' ) ) > orig_menu_height ) {
					headerHeight = orig_logo_height + parseInt(orig_logo_container_margin_top.replace( 'px', '' ) ) + parseInt( orig_logo_container_margin_bottom.replace( 'px', '' ) );
				} else {
					headerHeight = orig_menu_height;
				}

				if(jQuery('#wpadminbar').length >= 1) {
					var wpadminbarHeight = jQuery('#wpadminbar').height();
				}

				if(jQuery(this_tfslider).data('full_screen') == 1) {
					var sliderHeight = jQuery(window).height();
					if(jQuery(this_tfslider).parents('#sliders-container').next().hasClass('header-wrapper')) {
						sliderHeight = sliderHeight + (headerHeight - wpadminbarHeight);
					}
					if(Modernizr.mq('only screen and (max-width: 800px)')) {
						var sliderHeight = jQuery(window).height() - (headerHeight + wpadminbarHeight);
					}

					jQuery(this_tfslider).find('video').each(function() {
						var aspect_ratio = jQuery(this).width() / jQuery(this).height();
						var arc_sliderWidth = aspect_ratio * jQuery(window).height();
						var arc_sliderLeft = '-' + ((arc_sliderWidth - jQuery(this_tfslider).width()) / 2) + 'px';
						var compare_width = jQuery(window).width();
						if(jQuery(this_tfslider).parents('.post-content').length >= 1) {
							compare_width = jQuery(this_tfslider).width();
						}
						if(compare_width > arc_sliderWidth) {
							arc_sliderWidth = '100%';
							arc_sliderLeft = 0;
						}
						jQuery(this).width(arc_sliderWidth);
						jQuery(this).css('left', arc_sliderLeft);
					});
				} else {
					var sliderWidth = jQuery(this_tfslider).data('slider_width');

					if(sliderWidth.indexOf('%') != -1) {
						sliderWidth = jQuery(this_tfslider).data('first_slide_width');

						if( sliderWidth < jQuery(this_tfslider).data('slider_width') ) {
							sliderWidth = jQuery(this_tfslider).data('slider_width');
						}

						var percentage_width = true;
					} else {
						sliderWidth = parseInt(jQuery(this_tfslider).data('slider_width'));
					}

					var sliderHeight = parseInt(jQuery(this_tfslider).data('slider_height'));
					var aspect_ratio = sliderHeight / sliderWidth;

					if(aspect_ratio < 0.5) {
						aspect_ratio = 0.5;
					}

					var compare_width = jQuery(window).width();
					if(jQuery(this_tfslider).parents('.post-content').length >= 1) {
						compare_width = jQuery(this_tfslider).width();
					}
					var sliderHeight = aspect_ratio * compare_width;

					if(sliderHeight > parseInt(jQuery(this_tfslider).data('slider_height'))) {
						sliderHeight = parseInt(jQuery(this_tfslider).data('slider_height'));
					}

					if(sliderHeight < 200) {
						sliderHeight = 300;
					}

					jQuery(this_tfslider).find('video').each(function() {
						var aspect_ratio = jQuery(this).width() / jQuery(this).height();
						var arc_sliderWidth = aspect_ratio * sliderHeight;

						if(arc_sliderWidth < sliderWidth && !jQuery(this_tfslider).hasClass('full-width-slider')) {
							arc_sliderWidth = sliderWidth;
						}

						var arc_sliderLeft = '-' + ((arc_sliderWidth - jQuery(this_tfslider).width()) / 2) + 'px';
						var compare_width = jQuery(window).width();
						if(jQuery(this_tfslider).parents('.post-content').length >= 1) {
							compare_width = jQuery(this_tfslider).width();
						}
						if(compare_width > arc_sliderWidth && percentage_width == true && jQuery(this_tfslider).data('full_screen') != 1) {
							arc_sliderWidth = '100%';
							arc_sliderLeft = 0;
						}
						jQuery(this).width(arc_sliderWidth);
						jQuery(this).css('left', arc_sliderLeft);
					});

					if(Modernizr.mq('only screen and (max-width: 800px)')) {
						jQuery(this_tfslider).find('a.button').each(function() {
							jQuery(this).removeClass('xlarge large medium button-xlarge button-large button-medium');
							jQuery(this).addClass('small button-small');
						});
					} else {
						jQuery(this_tfslider).find('a.button').each(function() {
							jQuery(this).attr('class', jQuery(this).data('old'));
						});
					}
				}


				if(jQuery(this_tfslider).data('full_screen') == 1) {
					jQuery(this_tfslider).css('max-width', '100%');
					jQuery(this_tfslider).find('.slides, .background').css('width', '100%');
				}

				jQuery(this_tfslider).parents('.aione-slider-container').css('height', sliderHeight);
				jQuery(this_tfslider).parents('.aione-slider-container').css('max-height', sliderHeight );
				jQuery(this_tfslider).css('height', sliderHeight);
				jQuery(this_tfslider).find('.background, .mobile_video_image').css('height', sliderHeight);

				if(jQuery('.layout-boxed-mode').length >= 1) {
					var boxed_mode_width = jQuery('.layout-boxed-mode #wrapper').width();
					jQuery(this_tfslider).css('width', boxed_mode_width);
					jQuery(this_tfslider).css('margin-left', 'auto');
					jQuery(this_tfslider).css('margin-right', 'auto');

					if(jQuery(this_tfslider).data('parallax') == 1 && ! Modernizr.mq('only screen and (max-width: 1000px)')) {
						jQuery(this_tfslider).css('left', '50%');
						jQuery(this_tfslider).css('margin-left', '-' + (boxed_mode_width / 2) + 'px');
					}

					jQuery(this_tfslider).find('.slides, .background').css('width', '100%');
				}

				if(jQuery(this_tfslider).data('parallax') == 1 && ! Modernizr.mq('only screen and (max-width: 1000px)')) {
					jQuery(this_tfslider).css('position', 'fixed');
					if( jQuery( '.header-wrapper' ).css( 'position' ) != 'absolute' ) {
						jQuery('.header-wrapper').css('position', 'relative');
						jQuery(this_tfslider).parents('.aione-slider-container').css('margin-top', '-' + headerHeight + 'px');
					}
					jQuery('#main, .footer-area, #footer, .page-title-container').css('position', 'relative');
					jQuery('#main, .footer-area, #footer, .page-title-container').css('z-index', '3');
					jQuery('.header-wrapper').css('z-index', '5');
					jQuery('.header-wrapper').css('height', headerHeight);

					jQuery(this_tfslider).find('.flex-direction-nav li a').css('-webkit-transform', 'translate(0, ' + (headerHeight / 2) + 'px)');
					jQuery(this_tfslider).find('.flex-direction-nav li a').css('-ms-transform', 'translate(0, ' + (headerHeight / 2) + 'px)');
					jQuery(this_tfslider).find('.flex-direction-nav li a').css('-o-transform', 'translate(0, ' + (headerHeight / 2) + 'px)');
					jQuery(this_tfslider).find('.flex-direction-nav li a').css('-moz-transform', 'translate(0, ' + (headerHeight / 2) + 'px)');
					jQuery(this_tfslider).find('.flex-direction-nav li a').css('transform', 'translate(0, ' + (headerHeight / 2) + 'px)');

					if(jQuery(this_tfslider).hasClass('fixed-width-slider')) {
						var fixed_width_center = '-' + (jQuery(this_tfslider).width() / 2) + 'px';
						jQuery(this_tfslider).css('left', '50%');
						jQuery(this_tfslider).css('margin-left', fixed_width_center);
					}

					jQuery(this_tfslider).find('.flex-control-nav').css('bottom', (headerHeight / 2));
				} else if(jQuery(this_tfslider).data('parallax') == 1 && Modernizr.mq('only screen and (max-width: 1000px)')) {
					jQuery(this_tfslider).css('position', 'relative');
					jQuery(this_tfslider).css('left', '0');
					jQuery(this_tfslider).css('margin-left', '0');
					if( jQuery( '.header-wrapper' ).css( 'position' ) != 'absolute' ) {
						jQuery('.header-wrapper').css('position', 'relative');
					}
					jQuery('#main, .footer-area, #footer, .page-title-container').css('position', 'relative');
					jQuery('#main, .footer-area, #footer, .page-title-container').css('z-index', '3');
					jQuery('.header-wrapper').css('z-index', '5');
					jQuery('.header-wrapper').css('height', 'auto');
					jQuery(this_tfslider).parents('.aione-slider-container').css('margin-top', '');
					jQuery(this_tfslider).find('.flex-direction-nav li a').css('-webkit-transform', 'translate(0, 0)');
					jQuery(this_tfslider).find('.flex-direction-nav li a').css('-ms-transform', 'translate(0, 0)');
					jQuery(this_tfslider).find('.flex-direction-nav li a').css('-o-transform', 'translate(0, 0)');
					jQuery(this_tfslider).find('.flex-direction-nav li a').css('-moz-transform', 'translate(0, 0)');
					jQuery(this_tfslider).find('.flex-direction-nav li a').css('transform', 'translate(0, 0)');

					jQuery(this_tfslider).find('.flex-control-nav').css('bottom', 0);
				}

				if(Modernizr.mq('only screen and (max-width: 640px)')) {
					jQuery(this_tfslider).parents('.aione-slider-container').css('height', sliderHeight);
					jQuery(this_tfslider).css('height', sliderHeight);
					jQuery(this_tfslider).find('.background, .mobile_video_image').css('height', sliderHeight);

					var slideContent = jQuery(this_tfslider).find('.slide-content-container');
					jQuery(slideContent).each(function() {
						var contentHeight = '-' + (jQuery(this).find('.slide-content').height() / 2) + 'px';
						var contentPadding = '0px';

						jQuery(this).css('margin-top', contentHeight);
						jQuery(this).css('padding-top', contentPadding);
					});
				} else if(Modernizr.mq('only screen and (max-width: 1000px)')) {
					jQuery(this_tfslider).parents('.aione-slider-container').css('height', sliderHeight);
					jQuery(this_tfslider).css('height', sliderHeight);
					jQuery(this_tfslider).find('.background, .mobile_video_image').css('height', sliderHeight);

					var slideContent = jQuery(this_tfslider).find('.slide-content-container');
					jQuery(slideContent).each(function() {
						var contentHeight = '-' + (jQuery(this).find('.slide-content').height() / 2) + 'px';
						var contentPadding = '0px';

						jQuery(this).css('margin-top', contentHeight);
						jQuery(this).css('padding-top', contentPadding);
					});
				} else {
					jQuery(this_tfslider).parents('.aione-slider-container').css('height', sliderHeight);
					jQuery(this_tfslider).css('height', sliderHeight);
					jQuery(this_tfslider).find('.background, .mobile_video_image').css('height', sliderHeight);

					var slideContent = jQuery(this_tfslider).find('.slide-content-container');
					jQuery(slideContent).each(function() {
						jQuery(this).css('-webkit-transform', '');
						jQuery(this).css('-ms-transform', '');
						jQuery(this).css('-o-transform', '');
						jQuery(this).css('-moz-transform', '');
						jQuery(this).css('transform', '');

						var contentHeight = '-' + (jQuery(this).find('.slide-content').height() / 2) + 'px';
						if(jQuery(this_tfslider).data('parallax') == '1' && jQuery(this_tfslider).parents('.post-content').length == 0) {
							var contentPadding = headerHeight / 2;
						}

						jQuery(this).css('margin-top', contentHeight);
						jQuery(this).css('padding-top', contentPadding);
					});
				}

				if((cssua.ua.mobile && cssua.ua.mobile != 'ipad') || jQuery(this_tfslider).parents('.post-content').length >= 1) {
					jQuery(this_tfslider).parents('.aione-slider-container').css('height', 'auto');
					jQuery(this_tfslider).css('height', 'auto');
					jQuery(this_tfslider).parents('.aione-slider-container').css('max-height', 'none');
					jQuery(this_tfslider).find('.mobile_video_image').each(function() {
						var img_url = jQuery('.mobile_video_image').css('background-image').replace('url(', '').replace(')', '');
						if(img_url) {
							var preview_image = new Image();
							preview_image.name = img_url;
							preview_image.src = img_url;
							preview_image.onload = function() {
								var ar = this.height / this.width;
								var compare_width = jQuery(window).width();
								if(jQuery(this_tfslider).parents('.post-content').length >= 1) {
									compare_width = jQuery(this_tfslider).width();
								}
								var mobile_preview_height = ar * compare_width;
								if(mobile_preview_height < sliderHeight) {
									jQuery(this_tfslider).find('.mobile_video_image').css('height', mobile_preview_height);
									jQuery(this_tfslider).css('height', mobile_preview_height);
								}
							}
						}
					});
				}

				if(Modernizr.mq('only screen and (max-width: 1000px)')) {
						jQuery('.header-wrapper').css('height', '' );
				}
			});

			if(jQuery(this_tfslider).parents('.post-content').length >= 1) {
				jQuery(this_tfslider).find('.slides').css('max-width', '100%');
			}

			jQuery(this_tfslider).find('video').each(function() {
				if( typeof jQuery(this)[0].pause === "function" ) {
					jQuery(this)[0].pause();
				}
			});

			jQuery(this_tfslider).flexslider({
				animation: jQuery(this_tfslider).data('animation'),
				slideshow: jQuery(this_tfslider).data('autoplay'),
				slideshowSpeed: jQuery(this_tfslider).data('slideshow_speed'),
				animationSpeed: jQuery(this_tfslider).data('animation_speed'),
				controlNav: Boolean(Number(jQuery(this_tfslider).data('pagination_circles'))),
				directionNav: Boolean(Number(jQuery(this_tfslider).data('nav_arrows'))),
				animationLoop: Boolean(Number(jQuery(this_tfslider).data('loop'))),
				smoothHeight: true,
				pauseOnHover: false,
				useCSS: true,
				video: true,
				touch: true,
				prevText: '&#xe61e;',
				nextText: '&#xe620;',
				start: function(slider) {
					wpadminbarHeight = 0;
					if(jQuery('#wpadminbar').length >= 1) {
						var wpadminbarHeight = jQuery('#wpadminbar').height();
					}

					jQuery(slider.slides.eq(slider.currentSlide)).find('.slide-content-container').show();

					if(jQuery(this_tfslider).data('full_screen') == 1) {
						var sliderHeight = jQuery(window).height();
						if(jQuery(this_tfslider).parents('#sliders-container').next().hasClass('header-wrapper')) {
							sliderHeight = sliderHeight + (headerHeight - wpadminbarHeight);
						}
 						if(Modernizr.mq('only screen and (max-width: 1000px)')) {
							var sliderHeight = jQuery(window).height() - (headerHeight + wpadminbarHeight);
						}

						jQuery(this_tfslider).find('video').each(function() {
							var aspect_ratio = jQuery(this).width() / jQuery(this).height();
							var arc_sliderWidth = aspect_ratio * sliderHeight;
							var arc_sliderLeft = '-' + ((arc_sliderWidth - jQuery(this_tfslider).width()) / 2) + 'px';
							var compare_width = jQuery(window).width();
							if(jQuery(this_tfslider).parents('.post-content').length >= 1) {
								compare_width = jQuery(this_tfslider).width();
							}
							if(compare_width > arc_sliderWidth) {
								arc_sliderWidth = '100%';
								arc_sliderLeft = 0;
							}
							jQuery(this).width(arc_sliderWidth);
							jQuery(this).css('left', arc_sliderLeft);
						});
					} else {
						var sliderWidth = jQuery(this_tfslider).data('slider_width');

						if(sliderWidth.indexOf('%') != -1) {
							sliderWidth = jQuery(first_slide).find('.background-image').data('imgwidth');
							if( ! sliderWidth && ! cssua.ua.mobile ) {
								sliderWidth = jQuery(first_slide).find('video').width();
							}

							if( ! sliderWidth ) {
								sliderWidth = 940;
							}

							jQuery(this_tfslider).data('first_slide_width', sliderWidth);

							if(sliderWidth < jQuery(this_tfslider).data('slider_width')) {
								sliderWidth = jQuery(this_tfslider).data('slider_width');
							}

							var percentage_width = true;
						} else {
							sliderWidth = parseInt(jQuery(this_tfslider).data('slider_width'));
						}

						var sliderHeight = parseInt(jQuery(this_tfslider).data('slider_height'));
						var aspect_ratio = sliderHeight / sliderWidth;

						if(aspect_ratio < 0.5) {
							aspect_ratio = 0.5;
						}

						var compare_width = jQuery(window).width();
						if(jQuery(this_tfslider).parents('.post-content').length >= 1) {
							compare_width = jQuery(this_tfslider).width();
						}
						var sliderHeight = aspect_ratio * compare_width;

						if(sliderHeight > parseInt(jQuery(this_tfslider).data('slider_height'))) {
							sliderHeight = parseInt(jQuery(this_tfslider).data('slider_height'));
						}

						if(sliderHeight < 200) {
							sliderHeight = 300;
						}

						jQuery(this_tfslider).find('video').each(function() {
							var aspect_ratio = jQuery(this).width() / jQuery(this).height();
							var arc_sliderWidth = aspect_ratio * sliderHeight;

							if(arc_sliderWidth < sliderWidth && !jQuery(this_tfslider).hasClass('full-width-slider')) {
								arc_sliderWidth = sliderWidth;
							}

							var arc_sliderLeft = '-' + ((arc_sliderWidth - jQuery(this_tfslider).width()) / 2) + 'px';
							var compare_width = jQuery(window).width();
							if(jQuery(this_tfslider).parents('.post-content').length >= 1) {
								compare_width = jQuery(this_tfslider).width();
							}
							if(compare_width > arc_sliderWidth && percentage_width == true && jQuery(this_tfslider).data('full_screen') != 1) {
								arc_sliderWidth = '100%';
								arc_sliderLeft = 0;
							}
							jQuery(this).width(arc_sliderWidth);
							jQuery(this).css('left', arc_sliderLeft);
						});
					}

					jQuery(this_tfslider).parents('.aione-slider-container').css('max-height', sliderHeight);
					jQuery(this_tfslider).parents('.aione-slider-container').css('height', sliderHeight);
					jQuery(this_tfslider).css('height', sliderHeight);
					jQuery(this_tfslider).find('.background, .mobile_video_image').css('height', sliderHeight);

					if((cssua.ua.mobile && cssua.ua.mobile != 'ipad') || jQuery(this_tfslider).parents('.post-content').length >= 1) {
						jQuery(this_tfslider).parents('.aione-slider-container').css('height', 'auto');
						jQuery(this_tfslider).find('.mobile_video_image').each(function() {
							var img_url = jQuery('.mobile_video_image').css('background-image').replace('url(', '').replace(')', '');
							if(img_url) {
								var preview_image = new Image();
								preview_image.name = img_url;
								preview_image.src = img_url;
								preview_image.onload = function() {
									var ar = this.height / this.width;
									var compare_width = jQuery(window).width();
									if(jQuery(this_tfslider).parents('.post-content').length >= 1) {
										compare_width = jQuery(this_tfslider).width();
									}
									var mobile_preview_height = ar * compare_width;
									if(mobile_preview_height < sliderHeight) {
										jQuery(this_tfslider).find('.mobile_video_image').css('height', mobile_preview_height);
										jQuery(this_tfslider).find('.mobile_video_image').css('height', mobile_preview_height);
									}
								}
							}
						});
						if(jQuery(slider.slides.eq(slider.currentSlide)).find('video').length >= 1 && jQuery(slider.slides.eq(slider.currentSlide)).find('.mobile_video_image').length >= 1) {
							var img_url = jQuery(slider.slides.eq(slider.currentSlide)).find('.mobile_video_image').css('background-image').replace('url(', '').replace(')', '');
							if(img_url) {
								var preview_image = new Image();
								preview_image.name = img_url;
								preview_image.src = img_url;
								preview_image.onload = function() {
									var ar = this.height / this.width;
									var compare_width = jQuery(window).width();
									if(jQuery(this_tfslider).parents('.post-content').length >= 1) {
										compare_width = jQuery(this_tfslider).width();
									}
									var mobile_preview_height = ar * compare_width;
									if(mobile_preview_height < sliderHeight) {
										jQuery(this_tfslider).find('.mobile_video_image').css('height', mobile_preview_height);
										jQuery(this_tfslider).css('height', mobile_preview_height);
									}
								}
							}
						}
					}

					if(jQuery(this_tfslider).data('parallax') == 1 && ! Modernizr.mq('only screen and (max-width: 1000px)')) {
						jQuery(this_tfslider).css('position', 'fixed');
						if( jQuery( '.header-wrapper' ).css( 'position' ) != 'absolute' ) {
							jQuery('.header-wrapper').css('position', 'relative');
							jQuery(this_tfslider).parents('.aione-slider-container').css('margin-top', '-' + headerHeight + 'px');
						}
						jQuery('#main, .footer-area, #footer, .page-title-container').css('position', 'relative');
						jQuery('#main, .footer-area, #footer, .page-title-container').css('z-index', '3');
						jQuery('.header-wrapper').css('z-index', '5');
						jQuery('.header-wrapper').css('height', headerHeight);

						jQuery(this_tfslider).find('.flex-direction-nav li a').css('-webkit-transform', 'translate(0, ' + (headerHeight / 2) + 'px)');
						jQuery(this_tfslider).find('.flex-direction-nav li a').css('-ms-transform', 'translate(0, ' + (headerHeight / 2) + 'px)');
						jQuery(this_tfslider).find('.flex-direction-nav li a').css('-o-transform', 'translate(0, ' + (headerHeight / 2) + 'px)');
						jQuery(this_tfslider).find('.flex-direction-nav li a').css('-moz-transform', 'translate(0, ' + (headerHeight / 2) + 'px)');
						jQuery(this_tfslider).find('.flex-direction-nav li a').css('transform', 'translate(0, ' + (headerHeight / 2) + 'px)');

						if(jQuery(this_tfslider).data('full_screen') == 1) {
							jQuery(slider).find('.flex-control-nav').css('bottom', (headerHeight / 2));
						} else {
							jQuery(slider).find('.flex-control-nav').css('bottom', 0);
						}

						if(jQuery(this_tfslider).hasClass('fixed-width-slider')) {
							var fixed_width_center = '-' + (jQuery(this_tfslider).width() / 2) + 'px';
							jQuery(this_tfslider).css('left', '50%');
							jQuery(this_tfslider).css('margin-left', fixed_width_center);
						}
					} else if(jQuery(this_tfslider).data('parallax') == 1 && Modernizr.mq('only screen and (max-width: 1000px)')) {
						jQuery(slider).find('.flex-control-nav').css('bottom', 0);
					}

					if(Modernizr.mq('only screen and (max-width: 640px)')) {
						var slideContent = jQuery(this_tfslider).find('.slide-content-container');
						jQuery(slideContent).each(function() {
							var contentHeight = '-' + (jQuery(this).find('.slide-content').height() / 2) + 'px';
							var contentPadding = '0px';

							jQuery(this).css('margin-top', contentHeight);
							jQuery(this).css('padding-top', contentPadding);
						});
					} else if(Modernizr.mq('only screen and (max-width: 800px)')) {
						var slideContent = jQuery(this_tfslider).find('.slide-content-container');
						jQuery(slideContent).each(function() {
							var contentHeight = '-' + (jQuery(this).find('.slide-content').height() / 2) + 'px';
							var contentPadding = '0px';

							jQuery(this).css('margin-top', contentHeight);
							jQuery(this).css('padding-top', contentPadding);
						});
					} else {
						var slideContent = jQuery(this_tfslider).find('.slide-content-container');
						jQuery(slideContent).each(function() {
							jQuery(this).css('-webkit-transform', '');
							jQuery(this).css('-ms-transform', '');
							jQuery(this).css('-o-transform', '');
							jQuery(this).css('-moz-transform', '');
							jQuery(this).css('transform', '');

							var contentHeight = '-' + (jQuery(this).find('.slide-content').height() / 2) + 'px';
							if(jQuery(this_tfslider).data('parallax') == '1' && jQuery(this_tfslider).parents('.post-content').length == 0) {
								var contentPadding = headerHeight / 2;
							}

							jQuery(this).css('margin-top', contentHeight);
							jQuery(this).css('padding-top', contentPadding);
						});
					}

					jQuery(slider.slides.eq(slider.currentSlide)).find('video').each(function() {
						if(jQuery(this).parents('li').attr('data-autoplay') == 'yes') {
							if( typeof jQuery(this)[0].play === "function" ) {
								jQuery(this)[0].play();
							}
						}
					});

					jQuery(slider.slides.eq(slider.currentSlide)).find('iframe').each(function() {
						if(jQuery(this).parents('li').attr('data-autoplay') == 'yes') {
							jQuery(this_tfslider).flexslider('pause');
							var video = this;
							setTimeout(function() {
								video.contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*');
							}, 1000);
						}
					});

					aione_reanimate_slider();

					if(typeof(slider.slides) !== 'undefined' && slider.slides.eq(slider.currentSlide).find('iframe').length !== 0) {
						if(!Number(js_local_vars.status_yt) && window.yt_vid_exists == true) {
							YT_ready(function() {
								new YT.Player(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), {
									events: {
										'onReady': onPlayerReady(slider.slides.eq(slider.currentSlide)),
										'onStateChange': onPlayerStateChange(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), slider)
									}
								});
							});
						}
						if(!Number(js_local_vars.status_vimeo)) {
							$f(slider.slides.eq(slider.currentSlide).find('iframe')[0]).api('pause');

							if(jQuery(slider.slides.eq(slider.currentSlide)).data('autoplay') == 'yes') {
								$f(slider.slides.eq(slider.currentSlide).find('iframe')[0]).api('play');
							}
							if(jQuery(slider.slides.eq(slider.currentSlide)).data('mute') == 'yes') {
								$f(slider.slides.eq(slider.currentSlide).find('iframe')[0]).api('setVolume', 0);
							}
						}
					}

					jQuery(this_tfslider).find('.overlay-link').hide();
					jQuery(slider.slides.eq(slider.currentSlide)).find('.overlay-link').show();

					// Reinitialize waypoint
					jQuery.waypoints( 'viewportHeight' );
					jQuery.waypoints('refresh');

				},
				before: function(slider) {
					jQuery(this_tfslider).find('.slide-content-container').hide();

					if(slider.slides.eq(slider.currentSlide).find('iframe').length !== 0) {
						if(!Number(js_local_vars.status_vimeo)) {
							jQuery(this_tfslider).find('iframe').each(function() {
								$f(jQuery(this)[0]).api('pause');
							});

							if(jQuery(slider.slides.eq(slider.currentSlide)).data('autoplay') == 'yes') {
								$f(slider.slides.eq(slider.currentSlide).find('iframe')[0]).api('play');
							}
							if(jQuery(slider.slides.eq(slider.currentSlide)).data('mute') == 'yes') {
								$f(slider.slides.eq(slider.currentSlide).find('iframe')[0]).api('setVolume', 0);
							}
						}

						if(!Number(js_local_vars.status_yt) && window.yt_vid_exists == true) {
							YT_ready(function() {
								new YT.Player(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), {
									events: {
										'onReady': onPlayerReady(slider.slides.eq(slider.currentSlide)),
										'onStateChange': onPlayerStateChange(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), slider)
									}
								});
							});
						}
					}

					playVideoAndPauseOthers(slider);
				},
				after: function(slider) {
					jQuery(slider.slides.eq(slider.currentSlide)).find('.slide-content-container').show();

					if(Modernizr.mq('only screen and (max-width: 640px)')) {
						var slideContent = jQuery(this_tfslider).find('.slide-content-container');
						jQuery(slideContent).each(function() {
							var contentHeight = '-' + (jQuery(this).find('.slide-content').height() / 2) + 'px';
							var contentPadding = '0px';

							jQuery(this).css('margin-top', contentHeight);
							jQuery(this).css('padding-top', contentPadding);
						});
					} else if(Modernizr.mq('only screen and (max-width: 800px)')) {
						var slideContent = jQuery(this_tfslider).find('.slide-content-container');
						jQuery(slideContent).each(function() {
							var contentHeight = '-' + (jQuery(this).find('.slide-content').height() / 2) + 'px';
							var contentPadding = '0px';

							jQuery(this).css('margin-top', contentHeight);
							jQuery(this).css('padding-top', contentPadding);
						});
					} else {
						var slideContent = jQuery(this_tfslider).find('.slide-content-container');
						jQuery(slideContent).each(function() {
							jQuery(this).css('-webkit-transform', '');
							jQuery(this).css('-ms-transform', '');
							jQuery(this).css('-o-transform', '');
							jQuery(this).css('-moz-transform', '');
							jQuery(this).css('transform', '');

							var contentHeight = '-' + (jQuery(this).find('.slide-content').height() / 2) + 'px';
							if(jQuery(this_tfslider).data('parallax') == '1' && jQuery(this_tfslider).parents('.post-content').length == 0) {
								var contentPadding = headerHeight / 2;
							}

							jQuery(this).css('margin-top', contentHeight);
							jQuery(this).css('padding-top', contentPadding);
						});
					}

					aione_reanimate_slider();

					if(slider.slides.eq(slider.currentSlide).find('iframe').length !== 0) {
						if(!Number(js_local_vars.status_yt) && window.yt_vid_exists == true) {
							YT_ready(function() {
								new YT.Player(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), {
									events: {
										'onReady': onPlayerReady(slider.slides.eq(slider.currentSlide)),
										'onStateChange': onPlayerStateChange(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), slider)
									}
								});
							});
						}
						if(!Number(js_local_vars.status_vimeo)) {
							jQuery(this_tfslider).find('iframe').each(function() {
								$f(jQuery(this)[0]).api('pause');
							});

							if(jQuery(slider.slides.eq(slider.currentSlide)).data('autoplay') == 'yes') {
								$f(slider.slides.eq(slider.currentSlide).find('iframe')[0]).api('play');
							}
							if(jQuery(slider.slides.eq(slider.currentSlide)).data('mute') == 'yes') {
								$f(slider.slides.eq(slider.currentSlide).find('iframe')[0]).api('setVolume', 0);
							}
						}
					}

					jQuery(this_tfslider).find('.overlay-link').hide();
					jQuery(slider.slides.eq(slider.currentSlide)).find('.overlay-link').show();

					playVideoAndPauseOthers(slider);

					jQuery('[data-spy="scroll"]').each(function () {
					  var $spy = jQuery(this).scrollspy('refresh');
					});
				}
			});
		});

		if(js_local_vars.page_smoothHeight === 'false') {
			page_smoothHeight = false;
		} else {
			page_smoothHeight = true;
		}

		jQuery('.grid-layout .flexslider').flexslider({
			slideshow: Boolean(Number(js_local_vars.slideshow_autoplay)),
			slideshowSpeed: Number(js_local_vars.slideshow_speed),
			video: true,
			smoothHeight: page_smoothHeight,
			pauseOnHover: false,
			useCSS: false,
			prevText: '&#xf104;',
			nextText: '&#xf105;',
			start: function(slider) {
				if(typeof(slider.slides) !== 'undefined' && slider.slides.eq(slider.currentSlide).find('iframe').length !== 0) {
					if(Number(js_local_vars.pagination_video_slide)) {
						jQuery(slider).find('.flex-control-nav').css('bottom', '-30px');
					} else {
						jQuery(slider).find('.flex-control-nav').hide();
					}
					if(!Number(js_local_vars.status_yt) && window.yt_vid_exists == true) {
						YT_ready(function() {
							new YT.Player(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), {
								events: {
									'onStateChange': onPlayerStateChange(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), slider)
								}
							});
						});
					}
				} else {
					if(Number(js_local_vars.pagination_video_slide)) {
						jQuery(slider).find('.flex-control-nav').css('bottom', '0px');
					} else {
						jQuery(slider).find('.flex-control-nav').show();
					}
				}

				// Reinitialize waypoints
				jQuery.waypoints( 'viewportHeight' );
				jQuery.waypoints('refresh');
			},
			before: function(slider) {
				if(slider.slides.eq(slider.currentSlide).find('iframe').length !== 0) {
					if(!Number(js_local_vars.status_vimeo)) {
						$f(slider.slides.eq(slider.currentSlide).find('iframe')[0] ).api('pause');
					}

					if(!Number(js_local_vars.status_yt) && window.yt_vid_exists == true) {
						YT_ready(function() {
							new YT.Player(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), {
								events: {
									'onStateChange': onPlayerStateChange(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), slider)
								}
							});
						});
					}

					/* ------------------  YOUTUBE FOR AUTOSLIDER ------------------ */
					playVideoAndPauseOthers(slider);
				}
			},
			after: function(slider) {
				if(slider.slides.eq(slider.currentSlide).find('iframe').length !== 0) {
					if(Number(js_local_vars.pagination_video_slide)) {
						jQuery(slider).find('.flex-control-nav').css('bottom', '-30px');
					} else {
						jQuery(slider).find('.flex-control-nav').hide();
					}

					if(!Number(js_local_vars.status_yt) && window.yt_vid_exists == true) {
						YT_ready(function() {
							new YT.Player(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), {
								events: {
									'onStateChange': onPlayerStateChange(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), slider)
								}
							});
						});
					}
				} else {
					if(Number(js_local_vars.pagination_video_slide)) {
						jQuery(slider).find('.flex-control-nav').css('bottom', '0px');
					} else {
						jQuery(slider).find('.flex-control-nav').show();
					}
				}
				jQuery('[data-spy="scroll"]').each(function () {
				  var $spy = jQuery(this).scrollspy('refresh');
				});
			}
		});

		if(js_local_vars.flex_smoothHeight === 'false') {
			flex_smoothHeight = false;
		} else {
			flex_smoothHeight = true;
		}

		jQuery('.aione-flexslider').flexslider({
			slideshow: Boolean(Number(js_local_vars.slideshow_autoplay)),
			slideshowSpeed: js_local_vars.slideshow_speed,
			video: true,
			smoothHeight: flex_smoothHeight,
			pauseOnHover: false,
			useCSS: false,
			prevText: '&#xf104;',
			nextText: '&#xf105;',
			start: function(slider) {
				if(typeof(slider.slides) !== 'undefined' && slider.slides.eq(slider.currentSlide).find('iframe').length !== 0) {
					if(Number(js_local_vars.pagination_video_slide)) {
						jQuery(slider).find('.flex-control-nav').css('bottom', '-30px');
					} else {
						jQuery(slider).find('.flex-control-nav').hide();
					}
					if(!Number(js_local_vars.status_yt) && window.yt_vid_exists == true) {
						YT_ready(function() {
							new YT.Player(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), {
								events: {
									'onStateChange': onPlayerStateChange(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), slider)
								}
							});
						});
					}
				} else {
					if(Number(js_local_vars.pagination_video_slide)) {
						jQuery(slider).find('.flex-control-nav').css('bottom', '0px');
					} else {
						jQuery(slider).find('.flex-control-nav').show();
					}
				}

				// Reinitialize waypoint
				jQuery.waypoints( 'viewportHeight' );
				jQuery.waypoints( 'refresh' );
			},
			before: function(slider) {
				if(slider.slides.eq(slider.currentSlide).find('iframe').length !== 0) {
					if(!Number(js_local_vars.status_vimeo)) {
						$f( slider.slides.eq(slider.currentSlide).find('iframe')[0] ).api('pause');
					}

					if(!Number(js_local_vars.status_yt) && window.yt_vid_exists == true) {
						YT_ready(function() {
							new YT.Player(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), {
								events: {
									'onStateChange': onPlayerStateChange(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), slider)
								}
							});
						});
					}

					/* ------------------  YOUTUBE FOR AUTOSLIDER ------------------ */
					playVideoAndPauseOthers(slider);
				}
			},
			after: function(slider) {
				if(slider.slides.eq(slider.currentSlide).find('iframe').length !== 0) {
					if(Number(js_local_vars.pagination_video_slide)) {
						jQuery(slider).find('.flex-control-nav').css('bottom', '-30px');
					} else {
						jQuery(slider).find('.flex-control-nav').hide();
					}

					if(!Number(js_local_vars.status_yt) && window.yt_vid_exists == true) {
						YT_ready(function() {
							new YT.Player(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), {
								events: {
									'onStateChange': onPlayerStateChange(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), slider)
								}
							});
						});
					}
				} else {
					if(Number(js_local_vars.pagination_video_slide)) {
						jQuery(slider).find('.flex-control-nav').css('bottom', '0px');
					} else {
						jQuery(slider).find('.flex-control-nav').show();
					}
				}
				jQuery('[data-spy="scroll"]').each(function () {
				  var $spy = jQuery(this).scrollspy('refresh');
				});
			}
		});

		jQuery('.flexslider').flexslider({
			slideshow: Boolean(Number(js_local_vars.slideshow_autoplay)),
			slideshowSpeed: js_local_vars.slideshow_speed,
			video: true,
			smoothHeight: flex_smoothHeight,
			pauseOnHover: false,
			useCSS: false,
			prevText: '&#xf104;',
			nextText: '&#xf105;',
			start: function(slider) {
				if(typeof(slider.slides) !== 'undefined' && slider.slides.eq(slider.currentSlide).find('iframe').length !== 0) {
					if(Number(js_local_vars.pagination_video_slide)) {
						jQuery(slider).find('.flex-control-nav').css('bottom', '-30px');
					} else {
						jQuery(slider).find('.flex-control-nav').hide();
					}
					if(!Number(js_local_vars.status_yt) && window.yt_vid_exists == true) {
						YT_ready(function() {
							new YT.Player(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), {
								events: {
									'onStateChange': onPlayerStateChange(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), slider)
								}
							});
						});
					}
				} else {
					if(Number(js_local_vars.pagination_video_slide)) {
						jQuery(slider).find('.flex-control-nav').css('bottom', '0px');
					} else {
						jQuery(slider).find('.flex-control-nav').show();
					}
				}

				// Reinitialize waypoint
				jQuery.waypoints( 'viewportHeight' );
				jQuery.waypoints( 'refresh' );
			},
			before: function(slider) {
				if(slider.slides.eq(slider.currentSlide).find('iframe').length !== 0) {
					if(!Number(js_local_vars.status_vimeo)) {
						$f( slider.slides.eq(slider.currentSlide).find('iframe')[0] ).api('pause');
					}

					if(!Number(js_local_vars.status_yt) && window.yt_vid_exists == true) {
						YT_ready(function() {
							new YT.Player(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), {
								events: {
									'onStateChange': onPlayerStateChange(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), slider)
								}
							});
						});
					}

					/* ------------------  YOUTUBE FOR AUTOSLIDER ------------------ */
					playVideoAndPauseOthers(slider);
				}
			},
			after: function(slider) {
				if(slider.slides.eq(slider.currentSlide).find('iframe').length !== 0) {
					if(Number(js_local_vars.pagination_video_slide)) {
						jQuery(slider).find('.flex-control-nav').css('bottom', '-30px');
					} else {
						jQuery(slider).find('.flex-control-nav').hide();
					}

					if(!Number(js_local_vars.status_yt) && window.yt_vid_exists == true) {
						YT_ready(function() {
							new YT.Player(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), {
								events: {
									'onStateChange': onPlayerStateChange(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), slider)
								}
							});
						});
					}
				} else {
					if(Number(js_local_vars.pagination_video_slide)) {
						jQuery(slider).find('.flex-control-nav').css('bottom', '0px');
					} else {
						jQuery(slider).find('.flex-control-nav').show();
					}
				}
				jQuery('[data-spy="scroll"]').each(function () {
				  var $spy = jQuery(this).scrollspy('refresh');
				});
			}
		});

		function playVideoAndPauseOthers(slider) {
			jQuery(slider).find('iframe').each(function(i) {
				var func = 'stopVideo';
				this.contentWindow.postMessage('{"event":"command","func":"' + func + '","args":""}', '*');
				if(!jQuery(this).parents('li').hasClass('clone') && jQuery(this).parents('li').hasClass('flex-active-slide') && jQuery(this).parents('li').attr('data-autoplay') == 'yes') {
					jQuery(this).parents('.flexslider').flexslider('pause');
					this.contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*');

					if(jQuery(this).parents('li').attr('data-mute') == 'yes') {
						this.contentWindow.postMessage('{"event":"command","func":"' + 'mute' + '","args":""}', '*');
					}
				}
			});
			jQuery(slider).find('video').each(function(i) {
				if( typeof jQuery(this)[0].pause === "function" ) {
					jQuery(this)[0].pause();
				}
				if(!jQuery(this).parents('li').hasClass('clone') && jQuery(this).parents('li').hasClass('flex-active-slide') && jQuery(this).parents('li').attr('data-autoplay') == 'yes') {
					if( typeof jQuery(this)[0].play === "function" ) {
						jQuery(this)[0].play();
					}
				}
			});
		}

		/* ------------------ PREV & NEXT BUTTON FOR FLEXSLIDER (YOUTUBE) ------------------ */
		jQuery('.flex-next, .flex-prev').click(function() {
			//playVideoAndPauseOthers(jQuery(this).parents('.flexslider'));
		});
	}

	if(jQuery().isotope) {
		var gridwidth = (jQuery('.grid-layout').width() / 2) - 22;
		jQuery('.grid-layout .post').css('width', gridwidth);
		jQuery('.grid-layout').isotope({
			layoutMode: 'masonry',
			itemSelector: '.post',
			transformsEnabled: false,
			isOriginLeft: jQuery( '.rtl' ).length ? false : true,
			masonry: {
				columnWidth: gridwidth,
				gutter: 40
			},
		});

		var gridwidth = (jQuery('.grid-layout-3').width() / 3) - 30;
		jQuery('.grid-layout-3 .post').css('width', gridwidth);
		jQuery('.grid-layout-3').isotope({
			layoutMode: 'masonry',
			itemSelector: '.post',
			transformsEnabled: false,
			isOriginLeft: jQuery( '.rtl' ).length ? false : true,
			masonry: {
				columnWidth: gridwidth,
				gutter: 40
			}
		});

		var gridwidth = (jQuery('.grid-layout-4').width() / 4) - 35;
		jQuery('.grid-layout-4 .post').css('width', gridwidth);
		jQuery('.grid-layout-4').isotope({
			layoutMode: 'masonry',
			itemSelector: '.post',
			transformsEnabled: false,
			isOriginLeft: jQuery( '.rtl' ).length ? false : true,
			masonry: {
				columnWidth: gridwidth,
				gutter: 40
			}
		});

		var gridwidth = (jQuery('.grid-layout-5').width() / 5) - 32;
		jQuery('.grid-layout-5 .post').css('width', gridwidth);
		jQuery('.grid-layout-5').isotope({
			layoutMode: 'masonry',
			itemSelector: '.post',
			transformsEnabled: false,
			isOriginLeft: jQuery( '.rtl' ).length ? false : true,
			masonry: {
				columnWidth: gridwidth,
				gutter: 40
			}
		});

		var gridwidth = (jQuery('.grid-layout-6').width() / 6) - 34;
		jQuery('.grid-layout-6 .post').css('width', gridwidth);
		jQuery('.grid-layout-6').isotope({
			layoutMode: 'masonry',
			itemSelector: '.post',
			transformsEnabled: false,
			isOriginLeft: jQuery( '.rtl' ).length ? false : true,
			masonry: {
				columnWidth: gridwidth,
				gutter: 40
			}
		});

		if(Modernizr.mq('only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: portrait)')) {
			var gridwidth = (jQuery('.grid-layout-4, .grid-layout-5, .grid-layout-6').width() / 3) - 30;
			jQuery('.grid-layout-4 .post, .grid-layout-5 .post, .grid-layout-6 .post').css('width', gridwidth);
			jQuery('.grid-layout-4, .grid-layout-5, .grid-layout-6').isotope({
				layoutMode: 'masonry',
				itemSelector: '.post',
				transformsEnabled: false,
				isOriginLeft: jQuery( '.rtl' ).length ? false : true,
				masonry: {
					columnWidth: gridwidth,
					gutter: 40
				}
			});
		}
	}

	if(!Boolean(Number(js_local_vars.aione_rev_styles))) {
		jQuery('.rev_slider_wrapper').each(function() {
			var rev_slider_wrapper = jQuery(this);

			if(jQuery(this).length >=1 && jQuery(this).find('.tp-bannershadow').length == 0) {
				jQuery('<div class="shadow-left">').appendTo(this);
				jQuery('<div class="shadow-right">').appendTo(this);

				jQuery(this).addClass('aione-skin-rev');
			}

			if( ! jQuery(this).find( '.tp-leftarrow' ).hasClass( 'preview1' ) && ! jQuery(this).find( '.tp-leftarrow' ).hasClass( 'preview2' ) && ! jQuery(this).find( '.tp-leftarrow' ).hasClass( 'preview3' ) && ! jQuery(this).find( '.tp-leftarrow' ).hasClass( 'preview4' ) ) {
				jQuery(this).addClass('aione-skin-rev-nav');
			}


			if( rev_slider_wrapper.find( '.tp-leftarrow' ).height() > rev_slider_wrapper.height() / 4 ) {
				var rev_slider_id = rev_slider_wrapper.attr('id');
				var new_dimension = rev_slider_wrapper.height() / 4;
				if( rev_slider_wrapper.find( 'style' ).length ) {
					rev_slider_wrapper.find( 'style' ).replaceWith( '<style>#' + rev_slider_id + ' .tp-leftarrow, #' + rev_slider_id + ' .tp-rightarrow{margin-top:-' + new_dimension / 2 + 'px !important;width:' + new_dimension + 'px !important;height:' + new_dimension + 'px !important;}#' + rev_slider_id + ' .tp-leftarrow:before, #' + rev_slider_id + ' .tp-rightarrow:before{line-height:' + new_dimension  + 'px;font-size:' + new_dimension / 2 + 'px;}</style>' );
				} else {
					rev_slider_wrapper.prepend( '<style>#' + rev_slider_id + ' .tp-leftarrow, #' + rev_slider_id + ' .tp-rightarrow{margin-top:-' + new_dimension / 2 + 'px !important;width:' + new_dimension + 'px !important;height:' + new_dimension + 'px !important;}#' + rev_slider_id + ' .tp-leftarrow:before, #' + rev_slider_id + ' .tp-rightarrow:before{line-height:' + new_dimension  + 'px;font-size:' + new_dimension / 2 + 'px;}</style>' );
				}
			}

			jQuery(window).on('resize', function() {
				if( rev_slider_wrapper.find( '.tp-leftarrow' ).height() > rev_slider_wrapper.height() / 4 ) {

					var new_dimension = rev_slider_wrapper.height() / 4;
					if( rev_slider_wrapper.find( 'style' ).length ) {
						rev_slider_wrapper.find( 'style' ).replaceWith( '<style>.rev_slider_wrapper .tp-leftarrow, .rev_slider_wrapper .tp-rightarrow{margin-top:-' + new_dimension / 2 + 'px !important;width:' + new_dimension + 'px !important;height:' + new_dimension + 'px !important;}.rev_slider_wrapper .tp-leftarrow:before, .rev_slider_wrapper .tp-rightarrow:before{line-height:' + new_dimension  + 'px;font-size:' + new_dimension / 2 + 'px;}</style>' );
					} else {
						rev_slider_wrapper.prepend( '<style>.rev_slider_wrapper .tp-leftarrow, .rev_slider_wrapper .tp-rightarrow{margin-top:-' + new_dimension / 2 + 'px !important;width:' + new_dimension + 'px !important;height:' + new_dimension + 'px !important;}.rev_slider_wrapper .tp-leftarrow:before, .rev_slider_wrapper .tp-rightarrow:before{line-height:' + new_dimension  + 'px;font-size:' + new_dimension / 2 + 'px;}</style>' );
					}
				} else {
					rev_slider_wrapper.find( 'style' ).remove();
				}
			});

		});
	}
});

jQuery(window).load(function($) {
	var header_social_height;
	var other_content_alignment;

	if( ( jQuery( window ).width() >= 800 || ( js_local_vars.mobile_menu_design == 'modern' && Modernizr.mq('only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: portrait)') ) ) && js_local_vars.ipad_potrait == '0' ) {
		header_social_height = jQuery( '.header-social' ).height();

		jQuery( '.header-social .menu > li' ).css( {
			'height': header_social_height,
			'line-height': header_social_height + 'px'
		});
	}

	if( jQuery( '.header-social .alignleft .top-menu' ).length ) {
		other_content_alignment  = '.alignright';
	}

	if( jQuery( '.header-social .alignright .top-menu' ).length ) {
		other_content_alignment  = '.alignleft';
	}

	jQuery(window).on('resize', function() {
		if( jQuery( '.header-social' ).find( other_content_alignment ).height() > 43 ) {
			header_social_height = jQuery( '.header-social' ).find( other_content_alignment ).height();
		} else {
			header_social_height = 43;
		}

		jQuery( '.header-social .menu > li' ).css( {
			'height': header_social_height,
			'line-height': header_social_height + 'px'
		});
	});

	if(jQuery('.top-menu .cart').width() > 150) {
		new_width = jQuery('.top-menu .cart').outerWidth();
		jQuery('.top-menu .cart-contents').css("width", new_width+'px');
		new_width -= 2;
		jQuery('.top-menu .cart-content a').css("width", new_width+'px');
	};

	if(jQuery().prettyPhoto) {
		var ppArgs = {
			overlay_gallery: Boolean(Number(js_local_vars.lightbox_gallery)),
			autoplay_slideshow: Boolean(Number(js_local_vars.lightbox_autoplay)),
			show_title: Boolean(Number(js_local_vars.lightbox_title)),
			show_desc: Boolean(Number(js_local_vars.lightbox_desc))
		};
		if(js_local_vars.lightbox_animation_speed) {
			ppArgs.animation_speed = js_local_vars.lightbox_animation_speed.toLowerCase();
		}
		if(js_local_vars.lightbox_slideshow_speed) {
			ppArgs.slideshow = js_local_vars.lightbox_slideshow_speed;
		}
		if(js_local_vars.lightbox_opacity) {
			ppArgs.opacity = js_local_vars.lightbox_opacity;
		}
		if(!Boolean(Number(js_local_vars.lightbox_social))) {
			ppArgs.social_tools = '';
		}

		jQuery("a[rel^='prettyPhoto']").prettyPhoto(ppArgs);

		// Woocommerce lightbox
		var ppArgs_woo = ppArgs;
		ppArgs_woo.hook = 'data-rel';
		jQuery("a.zoom, a[data-rel^='prettyPhoto']").prettyPhoto(ppArgs_woo);

		if(Boolean(Number(js_local_vars.lightbox_post_images))) {
			jQuery('.single-post .post-content a').has('img').prettyPhoto(ppArgs);
			jQuery('#posts-container .post .post-content a').has('img').prettyPhoto(ppArgs);
			jQuery('.aione-blog-shortcode .post .post-content a').has('img').prettyPhoto(ppArgs);
		}

		if( Boolean( Number( js_local_vars.status_lightbox_mobile ) ) ) {

			var mediaQuery = 'desk';

			if (Modernizr.mq('only screen and (max-width: 600px)') || Modernizr.mq('only screen and (max-height: 520px)')) {

				mediaQuery = 'mobile';
				jQuery("a.zoom, a[data-rel^='prettyPhoto'], a[rel^='prettyPhoto']").unbind('click');
				if(Boolean(Number(js_local_vars.lightbox_post_images))) {
					jQuery('.single-post .post-content a').has('img').unbind('click');
					jQuery('#posts-container .post .post-content a').has('img').unbind('click');
					jQuery('.aione-blog-shortcode .post .post-content a').has('img').unbind('click');
				}
			}

			// Disables prettyPhoto if screen small
			jQuery(window).on('resize', function() {
				if ((Modernizr.mq('only screen and (max-width: 600px)') || Modernizr.mq('only screen and (max-height: 520px)')) && mediaQuery == 'desk') {
					jQuery("a.zoom, a[data-rel^='prettyPhoto'], a[rel^='prettyPhoto']").unbind('click.prettyphoto');
					if(Boolean(Number(js_local_vars.lightbox_post_images))) {
						jQuery('.single-post .post-content a').has('img').unbind('click.prettyphoto');
						jQuery('#posts-container .post .post-content a').has('img').unbind('click.prettyphoto');
						jQuery('.aione-blog-shortcode .post .post-content a').has('img').unbind('click.prettyphoto');
					}
					mediaQuery = 'mobile';
				} else if ( ! Modernizr.mq('only screen and (max-width: 600px)') && ! Modernizr.mq('only screen and (max-height: 520px)') && mediaQuery == 'mobile') {
					jQuery("a.zoom, a[data-rel^='prettyPhoto'], a[rel^='prettyPhoto']").prettyPhoto(ppArgs);
					if(Boolean(Number(js_local_vars.lightbox_post_images))) {
						jQuery('.single-post .post-content a').has('img').prettyPhoto(ppArgs);
						jQuery('#posts-container .post .post-content a').has('img').prettyPhoto(ppArgs);
						jQuery('.aione-blog-shortcode .post .post-content a').has('img').prettyPhoto(ppArgs);
					}
					mediaQuery = 'desk';
				}
			});
		}
	}

	if( js_local_vars.sidenav_behavior == 'Click' ) {
		jQuery('.side-nav li a').on('click', function(e) {
			if( jQuery(this).parent('.page_item_has_children').length ) {
				if(jQuery(this).parent().find('> .children').length  && ! jQuery(this).parent().find('> .children').is(':visible') ) {
					jQuery(this).parent().find('> .children').stop(true, true).slideDown('slow');
				} else {
					jQuery(this).parent().find('> .children').stop(true, true).slideUp('slow');
				}
			}

			if( jQuery(this).parent('.page_item_has_children.current_page_item').length ) {
				return false;
			}
		});
	} else {
		jQuery('.side-nav li').hoverIntent({
		over: function() {
			if( jQuery(this).find('> .children').length ) {
				jQuery(this).find('> .children').stop(true, true).slideDown('slow');
			}
		},
		out: function() {
			if(jQuery(this).find('.current_page_item').length == 0 && jQuery(this).hasClass('current_page_item') == false) {
				jQuery(this).find('.children').stop(true, true).slideUp('slow');
			}
		},
		timeout: 500
		});
	}

	if(jQuery().eislideshow) {
		var eislideshow_args = {
			autoplay: Boolean(Number(js_local_vars.tfes_autoplay))
		};

		if(js_local_vars.tfes_animation) {
			eislideshow_args.animation = js_local_vars.tfes_animation;
		}
		if(js_local_vars.tfes_interval) {
			eislideshow_args.slideshow_interval = js_local_vars.tfes_interval;
		}
		if(js_local_vars.tfes_speed) {
			eislideshow_args.speed = js_local_vars.tfes_speed;
		}
		if(js_local_vars.tfes_width) {
			eislideshow_args.thumbMaxWidth = js_local_vars.tfes_width;
		}

		jQuery('#ei-slider').eislideshow(eislideshow_args);
	}

	var retina = window.devicePixelRatio > 1 ? true : false;

	if(js_local_vars.custom_icon_image_retina && retina) {
		jQuery('.aione-social-networks a.custom').each(function() {
			jQuery(this).find('img').attr('src', js_local_vars.custom_icon_image_retina);
			jQuery(this).find('img').attr('width', js_local_vars.retina_icon_width);
			jQuery(this).find('img').attr('height', js_local_vars.retina_icon_height);
		})
	}

	/* wpml flag in center */
	var wpml_flag = jQuery('ul#navigation > li > a > .iclflag');
	var wpml_h = wpml_flag.height();
	wpml_flag.css('margin-top', +wpml_h / - 2 + "px");

	var wpml_flag = jQuery('.top-menu > ul > li > a > .iclflag');
	var wpml_h = wpml_flag.height();
	wpml_flag.css('margin-top', +wpml_h / - 2 + "px");

	if(js_local_vars.blog_pagination_type == 'Infinite Scroll') {
		jQuery('#posts-container').infinitescroll({
			navSelector  : "div.pagination",
						   // selector for the paged navigation (it will be hidden)
			nextSelector : "a.pagination-next",
						   // selector for the NEXT link (to page 2)
			itemSelector : "div.post, .timeline-date",
						   // selector for all items you'll retrieve
			loading	  : {
							finishedMsg: js_local_vars.infinite_blog_finished_msg,
							msgText: js_local_vars.infinite_blog_text,
			},
			errorCallback: function() {
				if(jQuery('#posts-container').hasClass('isotope')) {
					jQuery('#posts-container').isotope();
				}
			}
		}, function(posts) {
			if(jQuery().isotope) {
				jQuery(posts).hide();
				imagesLoaded(posts, function() {
					jQuery(posts).fadeIn();
					if(jQuery('#posts-container').hasClass('isotope')) {
						jQuery('#posts-container').isotope('appended', jQuery(posts));
						jQuery('#posts-container').isotope();
					}

					jQuery('[data-spy="scroll"]').each(function () {
						  var $spy = jQuery(this).scrollspy('refresh');
					});
				});

				var gridwidth = (jQuery('.grid-layout').width() / 2) - 22;
				jQuery('.grid-layout .post').css('width', gridwidth);

				var gridwidth = (jQuery('.grid-layout-3').width() / 3) - 30;
				jQuery('.grid-layout-3 .post').css('width', gridwidth);

				var gridwidth = (jQuery('.grid-layout-4').width() / 4) - 35;
				jQuery('.grid-layout-4 .post').css('width', gridwidth);

				var gridwidth = (jQuery('.grid-layout-5').width() / 5) - 32;
				jQuery('.grid-layout-5 .post').css('width', gridwidth);

				var gridwidth = (jQuery('.grid-layout-6').width() / 6) - 34;
				jQuery('.grid-layout-6 .post').css('width', gridwidth);

				if(jQuery('#posts-container').hasClass('isotope')) {
					jQuery('#posts-container').isotope();
				}
			}

			jQuery('.flexslider').flexslider({
				slideshow: Boolean(Number(js_local_vars.slideshow_autoplay)),
				slideshowSpeed: js_local_vars.slideshow_speed,
				video: true,
				pauseOnHover: false,
				useCSS: false,
				prevText: '&#xf104;',
				nextText: '&#xf105;',
				start: function(slider) {
					if(typeof(slider.slides) !== 'undefined' && slider.slides.eq(slider.currentSlide).find('iframe').length !== 0) {
						if(Number(js_local_vars.pagination_video_slide)) {
							jQuery(slider).find('.flex-control-nav').css('bottom', '-30px');
						} else {
							jQuery(slider).find('.flex-control-nav').hide();
						}
						if(!Number(js_local_vars.status_yt) && window.yt_vid_exists == true) {
							YT_ready(function() {
								new YT.Player(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), {
									events: {
										'onStateChange': onPlayerStateChange(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), slider)
									}
								});
							});
						}
					} else {
						if(Number(js_local_vars.pagination_video_slide)) {
							jQuery(slider).find('.flex-control-nav').css('bottom', '0px');
						} else {
							jQuery(slider).find('.flex-control-nav').show();
						}
					}

					// Reinitialize waypoints
					jQuery.waypoints( 'viewportHeight' );
					jQuery.waypoints('refresh');
				},
				before: function(slider) {
					if(slider.slides.eq(slider.currentSlide).find('iframe').length !== 0) {
						if(!Number(js_local_vars.status_vimeo)) {
							$f( slider.slides.eq(slider.currentSlide).find('iframe')[0] ).api('pause');
						}

						if(!Number(js_local_vars.status_yt) && window.yt_vid_exists == true) {
							YT_ready(function() {
								new YT.Player(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), {
									events: {
										'onStateChange': onPlayerStateChange(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), slider)
									}
								});
							});
						}

						/* ------------------  YOUTUBE FOR AUTOSLIDER ------------------ */
						//playVideoAndPauseOthers(slider);
					}
				},
				after: function(slider) {
					if(slider.slides.eq(slider.currentSlide).find('iframe').length !== 0) {
						if(Number(js_local_vars.pagination_video_slide)) {
							jQuery(slider).find('.flex-control-nav').css('bottom', '-30px');
						} else {
							jQuery(slider).find('.flex-control-nav').hide();
						}

						if(!Number(js_local_vars.status_yt) && window.yt_vid_exists == true) {
							YT_ready(function() {
								new YT.Player(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), {
									events: {
										'onStateChange': onPlayerStateChange(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), slider)
									}
								});
							});
						}
					} else {
						if(Number(js_local_vars.pagination_video_slide)) {
							jQuery(slider).find('.flex-control-nav').css('bottom', '0px');
						} else {
							jQuery(slider).find('.flex-control-nav').show();
						}
					}
					jQuery('[data-spy="scroll"]').each(function () {
					  var $spy = jQuery(this).scrollspy('refresh');
					});
				}
			});

			jQuery(posts).each(function() {
				jQuery(this).find('.full-video, .video-shortcode, .wooslider .slide-content').fitVids();
			});

			if(jQuery().isotope && jQuery('#posts-container').hasClass('isotope')) {
				//jQuery('#posts-container').isotope();
			}
		});
	}

	var blog_shortcode_infinite_container = '.posts-container-infinite';
	if( jQuery('.posts-container-infinite').find( '.blog-timeline-layout' ).length ) {
		blog_shortcode_infinite_container = '.posts-container-infinite .blog-timeline-layout';
	}

	jQuery( blog_shortcode_infinite_container ).infinitescroll({
		navSelector  : "div.pagination",
					   // selector for the paged navigation (it will be hidden)
		nextSelector : "a.pagination-next",
					   // selector for the NEXT link (to page 2)
		itemSelector : "div.post, .timeline-date",
					   // selector for all items you'll retrieve
		loading	  : {
						finishedMsg: js_local_vars.infinite_blog_finished_msg,
						msgText: js_local_vars.infinite_blog_text,
		},
		errorCallback: function() {
			if(jQuery('.posts-container-infinite').hasClass('isotope')) {
				jQuery('.posts-container-infinite').isotope();
			}
		}
	}, function(posts) {
		if(jQuery().isotope) {
			jQuery(posts).hide();
			imagesLoaded(posts, function() {
				jQuery(posts).fadeIn();
				if(jQuery('.posts-container-infinite').hasClass('isotope')) {
					jQuery('.posts-container-infinite').isotope('appended', jQuery(posts));
					jQuery('.posts-container-infinite').isotope();
				}

				jQuery('[data-spy="scroll"]').each(function () {
					  var $spy = jQuery(this).scrollspy('refresh');
				});
			});

			var gridwidth = (jQuery('.grid-layout').width() / 2) - 22;
			jQuery('.grid-layout .post').css('width', gridwidth);

			var gridwidth = (jQuery('.grid-layout-3').width() / 3) - 30;
			jQuery('.grid-layout-3 .post').css('width', gridwidth);

			var gridwidth = (jQuery('.grid-layout-4').width() / 4) - 35;
			jQuery('.grid-layout-4 .post').css('width', gridwidth);

			var gridwidth = (jQuery('.grid-layout-5').width() / 5) - 32;
			jQuery('.grid-layout-5 .post').css('width', gridwidth);

			var gridwidth = (jQuery('.grid-layout-6').width() / 6) - 34;
			jQuery('.grid-layout-6 .post').css('width', gridwidth);

			if(jQuery('.posts-container-infinite').hasClass('isotope')) {
				jQuery('.posts-container-infinite').isotope();
			}
		}

		jQuery('.flexslider').flexslider({
			slideshow: Boolean(Number(js_local_vars.slideshow_autoplay)),
			slideshowSpeed: js_local_vars.slideshow_speed,
			video: true,
			pauseOnHover: false,
			useCSS: false,
			prevText: '&#xf104;',
			nextText: '&#xf105;',
			start: function(slider) {
				if(typeof(slider.slides) !== 'undefined' && slider.slides.eq(slider.currentSlide).find('iframe').length !== 0) {
					if(Number(js_local_vars.pagination_video_slide)) {
						jQuery(slider).find('.flex-control-nav').css('bottom', '-30px');
					} else {
						jQuery(slider).find('.flex-control-nav').hide();
					}
					if(!Number(js_local_vars.status_yt) && window.yt_vid_exists == true) {
						YT_ready(function() {
							new YT.Player(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), {
								events: {
									'onStateChange': onPlayerStateChange(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), slider)
								}
							});
						});
					}
				} else {
					if(Number(js_local_vars.pagination_video_slide)) {
						jQuery(slider).find('.flex-control-nav').css('bottom', '0px');
					} else {
						jQuery(slider).find('.flex-control-nav').show();
					}
				}

				// Reinitialize waypoints
				jQuery.waypoints( 'viewportHeight' );
				jQuery.waypoints('refresh');
			},
			before: function(slider) {
				if(slider.slides.eq(slider.currentSlide).find('iframe').length !== 0) {
					if(!Number(js_local_vars.status_vimeo)) {
						$f( slider.slides.eq(slider.currentSlide).find('iframe')[0] ).api('pause');
					}

					if(!Number(js_local_vars.status_yt) && window.yt_vid_exists == true) {
						YT_ready(function() {
							new YT.Player(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), {
								events: {
									'onStateChange': onPlayerStateChange(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), slider)
								}
							});
						});
					}

					/* ------------------  YOUTUBE FOR AUTOSLIDER ------------------ */
					playVideoAndPauseOthers(slider);
				}
			},
			after: function(slider) {
				if(slider.slides.eq(slider.currentSlide).find('iframe').length !== 0) {
					if(Number(js_local_vars.pagination_video_slide)) {
						jQuery(slider).find('.flex-control-nav').css('bottom', '-30px');
					} else {
						jQuery(slider).find('.flex-control-nav').hide();
					}

					if(!Number(js_local_vars.status_yt) && window.yt_vid_exists == true) {
						YT_ready(function() {
							new YT.Player(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), {
								events: {
									'onStateChange': onPlayerStateChange(slider.slides.eq(slider.currentSlide).find('iframe').attr('id'), slider)
								}
							});
						});
					}
				} else {
					if(Number(js_local_vars.pagination_video_slide)) {
						jQuery(slider).find('.flex-control-nav').css('bottom', '0px');
					} else {
						jQuery(slider).find('.flex-control-nav').show();
					}
				}
				jQuery('[data-spy="scroll"]').each(function () {
				  var $spy = jQuery(this).scrollspy('refresh');
				});
			}
		});

		jQuery(posts).each(function() {
			jQuery(this).find('.full-video, .video-shortcode, .wooslider .slide-content').fitVids();
		});

		if(jQuery().isotope && jQuery('.posts-container-infinite').hasClass('isotope')) {
			jQuery('.posts-container-infinite').isotope();
		}
	});

	if(js_local_vars.grid_pagination_type == 'Infinite Scroll') {
		jQuery('.portfolio-masonry .portfolio-wrapper').infinitescroll({
		   	//behavior: 'local',
			//binder: jQuery('.portfolio-infinite .portfolio-wrapper'),
			navSelector  : "div.pagination",
						   // selector for the paged navigation (it will be hidden)
			nextSelector : "a.pagination-next",
						   // selector for the NEXT link (to page 2)
			itemSelector : "div.portfolio-item",
						   // selector for all items you'll retrieve
			loading	  : {
							finishedMsg: js_local_vars.infinite_finished_msg,
							msgText: js_local_vars.infinite_blog_text,
			},
			errorCallback: function() {
			},
			contentSelector: jQuery('.portfolio-masonry .portfolio-wrapper'),
		}, function(posts) {
			if(jQuery().isotope) {
				jQuery(posts).hide();

				imagesLoaded(jQuery(posts), function() {
					jQuery(posts).fadeIn();

					jQuery('.portfolio-masonry .portfolio-wrapper').isotope('appended', jQuery(posts));

					jQuery(posts).each(function() {
						jQuery(this).find('.full-video, .video-shortcode, .wooslider .slide-content').fitVids();
					});

					jQuery('.portfolio-masonry .portfolio-wrapper').isotope();

					jQuery('[data-spy="scroll"]').each(function () {
						  var $spy = jQuery(this).scrollspy('refresh');
					});
				});
			}


		});
	}

	// sticky header v1 - v5
	if( jQuery( '.sticky-header' ).length ) {
		jQuery('.sticky-header').init_sticky_header();
	}
});

// Reinitialize prettyPhoto after AJAX content loading
jQuery( document ).ajaxComplete( function() {

	jQuery( '.top-menu .cart' ).css({
		'height': jQuery( '.top-menu .cart' ).prev().css( 'height' ),
		'line-height': jQuery( '.top-menu .cart' ).prev().css( 'line-height' )
	});

	// prettyPhoto
	if( jQuery().prettyPhoto ) {
		var ppArgs = {
			overlay_gallery: Boolean(Number(js_local_vars.lightbox_gallery)),
			autoplay_slideshow: Boolean(Number(js_local_vars.lightbox_autoplay)),
			show_title: Boolean(Number(js_local_vars.lightbox_title)),
			show_desc: Boolean(Number(js_local_vars.lightbox_desc))
		};
		if(js_local_vars.lightbox_animation_speed) {
			ppArgs.animation_speed = js_local_vars.lightbox_animation_speed.toLowerCase();
		}
		if(js_local_vars.lightbox_slideshow_speed) {
			ppArgs.slideshow = js_local_vars.lightbox_slideshow_speed;
		}
		if(js_local_vars.lightbox_opacity) {
			ppArgs.opacity = js_local_vars.lightbox_opacity;
		}
		if(!Boolean(Number(js_local_vars.lightbox_social))) {
			ppArgs.social_tools = '';
		}

		jQuery("a[rel^='prettyPhoto']").prettyPhoto(ppArgs);
	}

});


// Smooth Scrolling with left Anchor One Page Menu
jQuery('ul.anchor_scroll li > a').click(function(e) {
    var menu_anchor = jQuery(this).attr('href');

    var sticky_height = 65;
    var adminbar_height = 0;
    adminbar_height = jQuery('#wpadminbar').outerHeight();

    if( menu_anchor &&
        menu_anchor.indexOf("#") == 0 &&
        menu_anchor.length > 1
        ) {

        e.preventDefault();

        jQuery('html, body').animate({
            scrollTop: jQuery(menu_anchor).offset().top - adminbar_height - sticky_height + 1
        }, 850, 'easeInOutExpo');
    }
});

