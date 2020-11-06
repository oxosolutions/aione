/*!
 * jQuery Cookie Plugin v1.4.1
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2006, 2014 Klaus Hartl
 * Released under the MIT license
 */
(function (factory) {
	if (typeof define === 'function' && define.amd) {
		// AMD
		define(['jquery'], factory);
	} else if (typeof exports === 'object') {
		// CommonJS
		factory(require('jquery'));
	} else {
		// Browser globals
		factory(jQuery);
	}
}(function ($) {

	var pluses = /\+/g;

	function encode(s) {
		return config.raw ? s : encodeURIComponent(s);
	}

	function decode(s) {
		return config.raw ? s : decodeURIComponent(s);
	}

	function stringifyCookieValue(value) {
		return encode(config.json ? JSON.stringify(value) : String(value));
	}

	function parseCookieValue(s) {
		if (s.indexOf('"') === 0) {
			// This is a quoted cookie as according to RFC2068, unescape...
			s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
		}

		try {
			// Replace server-side written pluses with spaces.
			// If we can't decode the cookie, ignore it, it's unusable.
			// If we can't parse the cookie, ignore it, it's unusable.
			s = decodeURIComponent(s.replace(pluses, ' '));
			return config.json ? JSON.parse(s) : s;
		} catch(e) {}
	}

	function read(s, converter) {
		var value = config.raw ? s : parseCookieValue(s);
		return $.isFunction(converter) ? converter(value) : value;
	}

	var config = $.cookie = function (key, value, options) {

		// Write

		if (arguments.length > 1 && !$.isFunction(value)) {
			options = $.extend({}, config.defaults, options);

			if (typeof options.expires === 'number') {
				var days = options.expires, t = options.expires = new Date();
				t.setTime(+t + days * 864e+5);
			}

			return (document.cookie = [
				encode(key), '=', stringifyCookieValue(value),
				options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
				options.path    ? '; path=' + options.path : '',
				options.domain  ? '; domain=' + options.domain : '',
				options.secure  ? '; secure' : ''
			].join(''));
		}

		// Read

		var result = key ? undefined : {};

		// To prevent the for loop in the first place assign an empty array
		// in case there are no cookies at all. Also prevents odd result when
		// calling $.cookie().
		var cookies = document.cookie ? document.cookie.split('; ') : [];

		for (var i = 0, l = cookies.length; i < l; i++) {
			var parts = cookies[i].split('=');
			var name = decode(parts.shift());
			var cookie = parts.join('=');

			if (key && key === name) {
				// If second argument (value) is a function it's a converter...
				result = read(cookie, value);
				break;
			}

			// Prevent storing a cookie that we couldn't decode.
			if (!key && (cookie = read(cookie)) !== undefined) {
				result[name] = cookie;
			}
		}

		return result;
	};

	config.defaults = {};

	$.removeCookie = function (key, options) {
		if ($.cookie(key) === undefined) {
			return false;
		}

		// Must not alter options, thus extending a fresh object...
		$.cookie(key, '', $.extend({}, options, { expires: -1 }));
		return !$.cookie(key);
	};

}));

(function(doc){
  var scriptElm = doc.scripts[doc.scripts.length - 1];
  var warn = ['[ionicons] Deprecated script, please remove: ' + scriptElm.outerHTML];

  warn.push('To improve performance it is recommended to set the differential scripts in the head as follows:')

  var parts = scriptElm.src.split('/');
  parts.pop();
  parts.pop();
  parts.pop();
  parts.push('icons');
  var url = parts.join('/');

  var scriptElm = doc.createElement('script');
  scriptElm.setAttribute('type', 'module');
  scriptElm.src = url + '/ionicons.esm.js';
  warn.push(scriptElm.outerHTML);
  scriptElm.setAttribute('data-stencil-namespace', 'ionicons');
  doc.head.appendChild(scriptElm);

  scriptElm = doc.createElement('script');
  scriptElm.setAttribute('nomodule', '');
  scriptElm.src = url + '/ionicons.js';
  warn.push(scriptElm.outerHTML);
  scriptElm.setAttribute('data-stencil-namespace', 'ionicons');
  doc.head.appendChild(scriptElm);

  console.warn(warn.join('\n'));

})(document);
jQuery(document).ready(function($){
	/*if($('.oxo_upload_button').length ) {
		window.aione_uploadfield = '';

		$('.oxo_upload_button').live('click', function() {
			window.aione_uploadfield = $('.upload_field', $(this).parents( '.pyre_upload' ));
			tb_show('Upload', 'media-upload.php?type=image&TB_iframe=true', false);

			return false;
		});

		window.aione_send_to_editor_backup = window.send_to_editor;
		window.send_to_editor = function( $html ) {
			if ( window.aione_uploadfield ) {
				if ( $( $html ).is( 'img' ) ) {
					var $image_url = $( $html ).attr( 'src' );
				} else if ( $( 'img', $html ).length ) {
					var $image_url = $( 'img', $html ).attr( 'src' );
				} else {
					var $image_url = $ ( $( $html )[0] ).attr( 'href' );
				}
				$( window.aione_uploadfield ).val( $image_url );
				window.aione_uploadfield = '';

				tb_remove();
			} else {
				window.aione_send_to_editor_backup( $html );
			}
		}
	}*/

	if($.cookie('oxo_metabox_tab_' + jQuery('#post_ID').val())) {
		var id = $.cookie('oxo_metabox_tab_' + jQuery('#post_ID').val());

		jQuery('.pyre_metabox_tabs li').removeClass('active');
		jQuery('.pyre_metabox_tabs li a[href=' + id + ']').parent().addClass('active');

		jQuery('.pyre_metabox_tabs li a[href=' + id + ']').parents('.inside').find('.pyre_metabox_tab').removeClass('active').hide();
		jQuery('.pyre_metabox_tabs li a[href=' + id + ']').parents('.inside').find('#pyre_tab_' + id).addClass('active').fadeIn();

		calc_element_heights();
	} else {
		jQuery('.pyre_metabox_tabs li:first-child').addClass('active');
		jQuery('.pyre_metabox .pyre_metabox_tab:first-child').addClass('active').fadeIn();
	}

	jQuery('.pyre_metabox_tabs li a').click(function(e) {
		e.preventDefault(); 

		var id = jQuery(this).attr('href');

		$.cookie('oxo_metabox_tab_' + jQuery('#post_ID').val(), id, { expires: 7 });

		jQuery(this).parents('ul').find('li').removeClass('active');
		jQuery(this).parent().addClass('active');

		jQuery(this).parents('.inside').find('.pyre_metabox_tab').removeClass('active').hide();
		jQuery(this).parents('.inside').find('#pyre_tab_' + id).addClass('active').fadeIn();

		calc_element_heights();
	});

	// calc height if the whole panel toggle is closed on load and opened later
	jQuery( '#post-body #advanced-sortables #pyre_page_options .handlediv, #post-body #advanced-sortables #pyre_page_options .hndle' ).click(function(e) {
		setTimeout( function() {
			calc_element_heights();
		}, 250 );

	});

	// initialize heights on load
	calc_element_heights();

	// set the page options to same width as other boxes (this is builder specific)
	/*if( jQuery( '#post-body #normal-sortables' ).length && jQuery( '#post-body #normal-sortables' ).css( 'width' ) != '0px' ) {
		jQuery( '#post-body #advanced-sortables' ).css( 'width', jQuery( '#post-body #normal-sortables' ).css( 'width' ) );
	}

	jQuery( window ).on( 'resize', function() {
		if( jQuery( '#post-body #normal-sortables' ).length && jQuery( '#post-body #normal-sortables' ).css( 'width' ) != '0px' ) {
			jQuery( '#post-body #advanced-sortables' ).css( 'width', jQuery( '#post-body #normal-sortables' ).css( 'width' ) );
		}
	});*/
});

function calc_element_heights() {

	// set tabs pane height same as the tab content height
	jQuery( '.pyre_metabox_tabs' ).removeAttr( 'style' );
	var tab_content_height = jQuery( '.pyre_metabox' ).outerHeight();
	var tabs_height = jQuery( '.pyre_metabox_tabs' ).height();
	if( tab_content_height > tabs_height ) {
		jQuery( '.pyre_metabox_tabs' ).css( 'height', tab_content_height );
	}


	// set heights of select arrows correctly
	jQuery( '.pyre_field .oxo-shortcodes-arrow' ).each( function() {
		if( jQuery( this ).next().innerHeight() > 0 ) {
			jQuery( this ).css( {
				height: jQuery( this ).next().innerHeight(),
				width: jQuery( this ).next().innerHeight(),
				'line-height': jQuery( this ).next().innerHeight() + 'px'
			});
		}
	});

	// set height of upload buttons to correspond with text field height
	jQuery( '.pyre_field .oxo_upload_button' ).each( function() {
		var field_height = jQuery( this ).parents( '.pyre_upload' ).find( 'input' ).outerHeight();
		if( field_height > 0 ) {
			jQuery( this ).css( 'height', field_height );
		}
	});
}