/**
 * AIONE Framework
 *
 * WARNING: This file is part of the AIONE Core Framework.
 * Do not edit the core files.
 * Add any modifications necessary under a child theme.
 *
 * @version: 1.0.0
 * @package  AIONE/Admin Interface
 * @author   OXOSolutions
 * @link	 http://oxosolutions.com
 */

( function( $ ) {

	"use strict";

	$( document ).ready( function() {

		// show or hide megamenu fields on parent and child list items
		aione_megamenu.menu_item_mouseup();
		aione_megamenu.megamenu_status_update();
		//$( '.edit-menu-item-megamenu-status' ).status_update();
		aione_megamenu.update_megamenu_fields();

		// setup automatic thumbnail handling
		$( '.remove-aione-megamenu-thumbnail' ).manage_thumbnail_display();
		$( '.aione-megamenu-thumbnail-image' ).css( 'display', 'block' );
		$( ".aione-megamenu-thumbnail-image[src='']" ).css( 'display', 'none' );

		// setup new media uploader frame
		aione_media_frame_setup();

	});

	// "extending" wpNavMenu
	var aione_megamenu = {

		menu_item_mouseup: function() {
			$( document ).on( 'mouseup', '.menu-item-bar', function( event, ui ) {
				if( ! $( event.target ).is( 'a' )) {
					setTimeout( aione_megamenu.update_megamenu_fields, 300 );
				}
			});
		},

		megamenu_status_update: function() {

			$( document ).on( 'click', '.edit-menu-item-megamenu-status', function() {
				var parent_li_item = $( this ).parents( '.menu-item:eq( 0 )' );

				if( $( this ).is( ':checked' ) ) {
					parent_li_item.addClass( 'aione-megamenu' );
				} else 	{
					parent_li_item.removeClass( 'aione-megamenu' );
				}

				aione_megamenu.update_megamenu_fields();
			});
		},

		update_megamenu_fields: function() {
			var menu_li_items = $( '.menu-item');

			menu_li_items.each( function( i ) 	{

				var megamenu_status = $( '.edit-menu-item-megamenu-status', this );

				if( ! $( this ).is( '.menu-item-depth-0' ) ) {
					var check_against = menu_li_items.filter( ':eq(' + (i-1) + ')' );


					if( check_against.is( '.aione-megamenu' ) ) {

						megamenu_status.attr( 'checked', 'checked' );
						$( this ).addClass( 'aione-megamenu' );
					} else {
						megamenu_status.attr( 'checked', '' );
						$( this ).removeClass( 'aione-megamenu' );
					}
				} else {
					if( megamenu_status.attr( 'checked' ) ) {
						$( this ).addClass( 'aione-megamenu' );
					}
				}
			});
		}

	};

	$.fn.manage_thumbnail_display = function( variables ) {
		var button_id;

		return this.click( function( e ){
			e.preventDefault();

			button_id = this.id.replace( 'aione-media-remove-', '' );
			$( '#edit-menu-item-megamenu-thumbnail-'+button_id ).val( '' );
			$( '#aione-media-img-'+button_id ).attr( 'src', '' ).css( 'display', 'none' );
		});
	}

	function aione_media_frame_setup() {
		var aione_media_frame;
		var item_id;

		$( document.body ).on( 'click.aioneOpenMediaManager', '.aione-open-media', function(e){

			e.preventDefault();

			item_id = this.id.replace('aione-media-upload-', '');

			if ( aione_media_frame ) {
				aione_media_frame.open();
				return;
			}

			aione_media_frame = wp.media.frames.aione_media_frame = wp.media({

				className: 'media-frame aione-media-frame',
				frame: 'select',
				multiple: false,
				library: {
					type: 'image'
				}
			});

			aione_media_frame.on('select', function(){

				var media_attachment = aione_media_frame.state().get('selection').first().toJSON();

				$( '#edit-menu-item-megamenu-thumbnail-'+item_id ).val( media_attachment.url );
				$( '#aione-media-img-'+item_id ).attr( 'src', media_attachment.url ).css( 'display', 'block' );

			});

			aione_media_frame.open();
		});

	}
})( jQuery );