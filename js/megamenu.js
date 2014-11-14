jQuery(document).ready(function($){
	var aione_megamenu_media_frame;

	$(document).on('click', '.aione-megamenu-upload-thumbnail', function(e) {
		e.preventDefault();

		var button = $(this);

		if ( aione_megamenu_media_frame ) {
			aione_megamenu_media_frame.open();
			return;
		}

		aione_megamenu_media_frame = wp.media.frames.aione_megamenu_media_frame = wp.media({

			className: 'media-frame aione-megamenu-media-frame',
			frame: 'select',
			multiple: false,
			//title: tgm_nmp_media.title,
			library: {
				type: 'image'
			}
			/*button: {
				text:  tgm_nmp_media.button
			}*/
		});

		aione_megamenu_media_frame.on('select', function(){
			var media_attachment = aione_megamenu_media_frame.state().get('selection').first().toJSON();

			$(button).closest('.menu-item-settings').find('.edit-menu-item-megamenu-thumbnail').val(media_attachment.url);

			$(button).closest('.menu-item-settings').find('.aione-megamenu-thumbnail-image').attr('src', media_attachment.url).show();

			$(button).closest('.menu-item-settings').find('.remove-aione-megamenu-thumbnail').show();
		});

		aione_megamenu_media_frame.open();
	});
	
	$(document).on('click', '.remove-aione-megamenu-thumbnail', function(e) {
		e.preventDefault();

		$(this).hide();

		$(this).closest('label').find('input').val('');
		$(this).closest('label').find('img').attr('src', '').hide()
	});
});