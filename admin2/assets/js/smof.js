/**
 * SMOF js
 *
 * contains the core functionalities to be used
 * inside SMOF
 */

jQuery.noConflict();

/** Fire up jQuery - let's dance!
 */
jQuery(document).ready(function($){

	//(un)fold options in a checkbox-group
  	jQuery('.fld').click(function() {
		var $fold='.f_'+this.id;
		$($fold).slideToggle('normal', "swing");
  	});

  	//Color picker
  	$('.of-color').wpColorPicker();

	//hides warning if js is enabled
	$('#js-warning').hide();

	//Tabify Options
	$('.group').hide();

	// Display last current tab
	if ($.cookie("of_current_opt") === null) {
		$('.group:first').fadeIn('fast');
		$('#of-nav li:first').addClass('current');
	} else {

		var hooks = $('#hooks').html();
		hooks = jQuery.parseJSON(hooks);

		$.each(hooks, function(key, value) {

			if ($.cookie("of_current_opt") == '#of-option-'+ value) {
				$('.group#of-option-' + value).fadeIn();
				$('#of-nav li.' + value).addClass('current');
			}

		});

	}

	//Current Menu Class
	$('#of-nav li a').click(function(evt){
	// event.preventDefault();

		$('#of-nav li').removeClass('current');
		$(this).parent().addClass('current');

		var clicked_group = $(this).attr('href');

		$.cookie('of_current_opt', clicked_group, { expires: 7, path: '/' });

		$('.group').hide();

		$(clicked_group).fadeIn('fast');
		return false;

	});

	//Expand Options
	var flip = 0;

	$('#expand_options').click(function(){
		if(flip == 0){
			flip = 1;
			$('#of_container #of-nav').hide();
			$('#of_container #content').width(755);
			$('#of_container .group').add('#of_container .group h2').show();

			$(this).removeClass('expand');
			$(this).addClass('close');
			$(this).text('Close');

		} else {
			flip = 0;
			$('#of_container #of-nav').show();
			$('#of_container #content').width(595);
			$('#of_container .group').add('#of_container .group h2').hide();
			$('#of_container .group:first').show();
			$('#of_container #of-nav li').removeClass('current');
			$('#of_container #of-nav li:first').addClass('current');

			$(this).removeClass('close');
			$(this).addClass('expand');
			$(this).text('Expand');

		}

	});

	//Update Message popup
	$.fn.center = function () {
		this.animate({"top":( $(window).height() - this.height() - 200 ) / 2+$(window).scrollTop() + "px"},100);
		this.css("left", 250 );
		return this;
	}


	$('#of-popup-save').center();
	$('#of-popup-reset').center();
	$('#of-popup-fail').center();

	$(window).scroll(function() {
		$('#of-popup-save').center();
		$('#of-popup-reset').center();
		$('#of-popup-fail').center();
	});


	//Masked Inputs (images as radio buttons)
	$('.of-radio-img-img').click(function(){
		$(this).parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
		$(this).addClass('of-radio-img-selected');
	});
	$('.of-radio-img-label').hide();
	$('.of-radio-img-img').show();
	$('.of-radio-img-radio').hide();

	//Masked Inputs (background images as radio buttons)
	$('.of-radio-tile-img').click(function(){
		$(this).parent().parent().find('.of-radio-tile-img').removeClass('of-radio-tile-selected');
		$(this).addClass('of-radio-tile-selected');
	});
	$('.of-radio-tile-label').hide();
	$('.of-radio-tile-img').show();
	$('.of-radio-tile-radio').hide();

	// Style Select
	(function ($) {
	styleSelect = {
		init: function () {
		$('.select_wrapper').each(function () {
			$(this).prepend('<span>' + $(this).find('option:selected').text() + '</span>');
		});
		$('.select').live('change', function () {
			$(this).prev('span').replaceWith('<span>' + $(this).find('option:selected').text() + '</span>');
		});
		$('.select').bind($.browser.msie ? 'click' : 'change', function(event) {
			$(this).prev('span').replaceWith('<span>' + $(this).find('option:selected').text() + '</span>');
		});
		}
	};
	$(document).ready(function () {
		styleSelect.init()
	})
	})(jQuery);


	/** Aquagraphite Slider MOD */

	//Hide (Collapse) the toggle containers on load
	$(".slide_body").hide();

	//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
	$(".slide_edit_button").live( 'click', function(){
		/*
		//display as an accordion
		$(".slide_header").removeClass("active");
		$(".slide_body").slideUp("fast");
		*/
		//toggle for each
		$(this).parent().toggleClass("active").next().slideToggle("fast");
		return false; //Prevent the browser jump to the link anchor
	});

	// Update slide title upon typing
	function update_slider_title(e) {
		var element = e;
		if ( this.timer ) {
			clearTimeout( element.timer );
		}
		this.timer = setTimeout( function() {
			$(element).parent().prev().find('strong').text( element.value );
		}, 100);
		return true;
	}

	$('.of-slider-title').live('keyup', function(){
		update_slider_title(this);
	});


	//Remove individual slide
	$('.slide_delete_button').live('click', function(){
	// event.preventDefault();
	var agree = confirm("Are you sure you wish to delete this slide?");
		if (agree) {
			var $trash = $(this).parents('li');
			//$trash.slideUp('slow', function(){ $trash.remove(); }); //chrome + confirm bug made slideUp not working...
			$trash.animate({
					opacity: 0.25,
					height: 0,
				}, 500, function() {
					$(this).remove();
			});
			return false; //Prevent the browser jump to the link anchor
		} else {
		return false;
		}
	});

	//Add new slide
	$(".slide_add_button").live('click', function(){
		var slidesContainer = $(this).prev();
		var sliderId = slidesContainer.attr('id');

		var numArr = $('#'+sliderId +' li').find('.order').map(function() {
			var str = this.id;
			str = str.replace(/\D/g,'');
			str = parseFloat(str);
			return str;
		}).get();

		var maxNum = Math.max.apply(Math, numArr);
		if (maxNum < 1 ) { maxNum = 0};
		var newNum = maxNum + 1;

		var newSlide = '<li class="temphide"><div class="slide_header"><strong>Slide ' + newNum + '</strong><input type="hidden" class="slide of-input order" name="' + sliderId + '[' + newNum + '][order]" id="' + sliderId + '_slide_order-' + newNum + '" value="' + newNum + '"><a class="slide_edit_button" href="#">Edit</a></div><div class="slide_body" style="display: none; "><label>Title</label><input class="slide of-input of-slider-title" name="' + sliderId + '[' + newNum + '][title]" id="' + sliderId + '_' + newNum + '_slide_title" value=""><label>Image URL</label><input class="upload slide of-input" name="' + sliderId + '[' + newNum + '][url]" id="' + sliderId + '_' + newNum + '_slide_url" value=""><div class="upload_button_div"><span class="button media_upload_button" id="' + sliderId + '_' + newNum + '">Upload</span><span class="button remove-image hide" id="reset_' + sliderId + '_' + newNum + '" title="' + sliderId + '_' + newNum + '">Remove</span></div><div class="screenshot"></div><label>Link URL (optional)</label><input class="slide of-input" name="' + sliderId + '[' + newNum + '][link]" id="' + sliderId + '_' + newNum + '_slide_link" value=""><label>Description (optional)</label><textarea class="slide of-input" name="' + sliderId + '[' + newNum + '][description]" id="' + sliderId + '_' + newNum + '_slide_description" cols="8" rows="8"></textarea><a class="slide_delete_button" href="#">Delete</a><div class="clear"></div></div></li>';

		slidesContainer.append(newSlide);
		var nSlide = slidesContainer.find('.temphide');
		nSlide.fadeIn('fast', function() {
			$(this).removeClass('temphide');
		});

		optionsframework_file_bindings(); // re-initialise upload image..

		return false; //prevent jumps, as always..
	});

	//Sort slides
	jQuery('.slider').find('ul').each( function() {
		var id = jQuery(this).attr('id');
		$('#'+ id).sortable({
			placeholder: "placeholder",
			opacity: 0.6,
			handle: ".slide_header",
			cancel: "a"
		});
	});


	/**	Sorter (Layout Manager) */
	jQuery('.sorter').each( function() {
		var id = jQuery(this).attr('id');
		$('#'+ id).find('ul').sortable({
			items: 'li',
			placeholder: "placeholder",
			connectWith: '.sortlist_' + id,
			opacity: 0.6,
			update: function() {
				$(this).find('.position').each( function() {

					var listID = $(this).parent().attr('id');
					var parentID = $(this).parent().parent().attr('id');
					parentID = parentID.replace(id + '_', '')
					var optionID = $(this).parent().parent().parent().attr('id');
					$(this).prop("name", optionID + '[' + parentID + '][' + listID + ']');

				});
			}
		});
	});


	/**	Ajax Backup & Restore MOD */
	//backup button
	$('#of_backup_button').live('click', function(){

		var answer = confirm("Click OK to backup your current saved options.")

		if (answer){

			var clickedObject = $(this);
			var clickedID = $(this).attr('id');

			var nonce = $('#security').val();

			var data = {
				action: 'of_ajax_post_action',
				type: 'backup_options',
				security: nonce
			};

			if( typeof(smof_wpml) != 'undefined' && smof_wpml.wpml_custom_current_lang ) {
				data.wpml = smof_wpml.wpml_custom_current_lang;
			}

			$.post(ajaxurl, data, function(response) {

				//check nonce
				if(response==-1){ //failed

					var fail_popup = $('#of-popup-fail');
					fail_popup.fadeIn();
					window.setTimeout(function(){
						fail_popup.fadeOut();
					}, 2000);
				}

				else {

					var success_popup = $('#of-popup-save');
					success_popup.fadeIn();
					window.setTimeout(function(){
						location.reload();
					}, 1000);
				}

			});

		}

	return false;

	});

	//restore button
	$('#of_restore_button').live('click', function(){

		var answer = confirm("'Warning: All of your current options will be replaced with the data from your last backup! Proceed?")

		if (answer){

			var clickedObject = $(this);
			var clickedID = $(this).attr('id');

			var nonce = $('#security').val();

			var data = {
				action: 'of_ajax_post_action',
				type: 'restore_options',
				security: nonce
			};

			if( typeof(smof_wpml) != 'undefined' && smof_wpml.wpml_custom_current_lang ) {
				data.wpml = smof_wpml.wpml_custom_current_lang;
			}

			$.post(ajaxurl, data, function(response) {

				//check nonce
				if(response==-1){ //failed

					var fail_popup = $('#of-popup-fail');
					fail_popup.fadeIn();
					window.setTimeout(function(){
						fail_popup.fadeOut();
					}, 2000);
				}

				else {

					var success_popup = $('#of-popup-save');
					success_popup.fadeIn();
					window.setTimeout(function(){
						location.reload();
					}, 1000);
				}

			});

		}

	return false;

	});

	/**	Ajax Transfer (Import/Export) Option */
	$('#of_import_button').live('click', function(){

		var answer = confirm("Click OK to import options.")

		if (answer){

			var clickedObject = $(this);
			var clickedID = $(this).attr('id');

			var nonce = $('#security').val();

			var import_data = $('#export_data').val();

			var data = {
				action: 'of_ajax_post_action',
				type: 'import_options',
				security: nonce,
				data: import_data
			};

			if( typeof(smof_wpml) != 'undefined' && smof_wpml.wpml_custom_current_lang ) {
				data.wpml = smof_wpml.wpml_custom_current_lang;
			}

			$.post(ajaxurl, data, function(response) {
				var fail_popup = $('#of-popup-fail');
				var success_popup = $('#of-popup-save');

				//check nonce
				if(response==-1){ //failed
					fail_popup.fadeIn();
					window.setTimeout(function(){
						fail_popup.fadeOut();
					}, 2000);
				}
				else
				{
					success_popup.fadeIn();
					window.setTimeout(function(){
						location.reload();
					}, 1000);
				}

			});

		}

	return false;

	});

	/** AJAX Save Options */
	$('#of_save').live('click',function() {

		var nonce = $('#security').val();

		$('.ajax-loading-img').fadeIn();

		//get serialized data from all our option fields
		// Aione edit
		$('#of_form :input[name][name!="security"][name!="of_reset"][name!="google_analytics"][name!="space_head"][name!="space_body"][name!="custom_css"]').val().replace(/\%22/g, "'");

		var serializedReturn = $('#of_form :input[name][name!="security"][name!="of_reset"]').serialize();
		// End Aione edit

		var data = {
			type: 'save',
			action: 'of_ajax_post_action',
			security: nonce,
			data: serializedReturn
		};

		if( typeof(smof_wpml) != 'undefined' && smof_wpml.wpml_custom_current_lang ) {
			data.wpml = smof_wpml.wpml_custom_current_lang;
		}

		$.post(ajaxurl, data, function(response) {
			var success = $('#of-popup-save');
			var fail = $('#of-popup-fail');
			var loading = $('.ajax-loading-img');
			loading.fadeOut();

			if (response==1) {
				success.fadeIn();
			} else {
				fail.fadeIn();
			}

			window.setTimeout(function(){
				success.fadeOut();
				fail.fadeOut();
			}, 2000);
		});

	return false;

	});


	/* AJAX Options Reset */
	$('#of_reset').click(function() {

		//confirm reset
		var answer = confirm("Click OK to reset. All settings will be lost and replaced with default settings!");

		//ajax reset
		if (answer){

			var nonce = $('#security').val();

			$('.ajax-reset-loading-img').fadeIn();

			var data = {

				type: 'reset',
				action: 'of_ajax_post_action',
				security: nonce,
			};

			if( typeof(smof_wpml) != 'undefined' && smof_wpml.wpml_custom_current_lang ) {
				data.wpml = smof_wpml.wpml_custom_current_lang;
			}

			$.post(ajaxurl, data, function(response) {
				var success = $('#of-popup-reset');
				var fail = $('#of-popup-fail');
				var loading = $('.ajax-reset-loading-img');
				loading.fadeOut();

				if (response==1)
				{
					success.fadeIn();
					window.setTimeout(function(){
						location.reload();
					}, 1000);
				}
				else
				{
					fail.fadeIn();
					window.setTimeout(function(){
						fail.fadeOut();
					}, 2000);
				}


			});

		}

	return false;

	});


	/**	Tipsy @since v1.3 */
	if (jQuery().tipsy) {
		$('.typography-size, .typography-height, .typography-face, .typography-style, .of-typography-color').tipsy({
			fade: true,
			gravity: 's',
			opacity: 0.7,
		});
	}


	/**
	  * JQuery UI Slider function
	  * Dependencies 	 : jquery, jquery-ui-slider
	  * Feature added by : Smartik - http://smartik.ws/
	  * Date 			 : 03.17.2013
	  */
	jQuery('.smof_sliderui').each(function() {

		var obj   = jQuery(this);
		var sId   = "#" + obj.data('id');
		var val   = parseInt(obj.data('val'));
		var min   = parseInt(obj.data('min'));
		var max   = parseInt(obj.data('max'));
		var step  = parseInt(obj.data('step'));

		//slider init
		obj.slider({
			value: val,
			min: min,
			max: max,
			step: step,
			range: "min",
			slide: function( event, ui ) {
				jQuery(sId).val( ui.value );
			}
		});

	});


	/**
	  * Switch
	  * Dependencies 	 : jquery
	  * Feature added by : Smartik - http://smartik.ws/
	  * Date 			 : 03.17.2013
	  */
	jQuery(".cb-enable").click(function(){
		var parent = $(this).parents('.switch-options');
		jQuery('.cb-disable',parent).removeClass('selected');
		jQuery(this).addClass('selected');
		jQuery('.main_checkbox',parent).attr('checked', true);

		//fold/unfold related options
		var obj = jQuery(this);
		var $fold='.f_'+obj.data('id');
		jQuery($fold).slideDown('normal', "swing");
	});
	jQuery(".cb-disable").click(function(){
		var parent = $(this).parents('.switch-options');
		jQuery('.cb-enable',parent).removeClass('selected');
		jQuery(this).addClass('selected');
		jQuery('.main_checkbox',parent).attr('checked', false);

		//fold/unfold related options
		var obj = jQuery(this);
		var $fold='.f_'+obj.data('id');
		jQuery($fold).slideUp('normal', "swing");
	});
	//disable text select(for modern chrome, safari and firefox is done via CSS)
	if (($.browser.msie && $.browser.version < 10) || $.browser.opera) {
		$('.cb-enable span, .cb-disable span').find().attr('unselectable', 'on');
	}


	/**
	  * Google Fonts
	  * Dependencies 	 : google.com, jquery
	  * Feature added by : Smartik - http://smartik.ws/
	  * Date 			 : 03.17.2013
	  */
	function GoogleFontSelect( slctr, mainID ){

		var _selected = $(slctr).val(); 						//get current value - selected and saved
		var _linkclass = 'style_link_'+ mainID;
		var _previewer = mainID +'_ggf_previewer';

		if( _selected ){ //if var exists and isset

			//Check if selected is not equal with "Select a font" and execute the script.
			if ( _selected !== 'none' && _selected !== 'Select a font' ) {

				//remove other elements crested in <head>
				$( '.'+ _linkclass ).remove();

				//replace spaces with "+" sign
				var the_font = _selected.replace(/\s+/g, '+');

				//add reference to google font family
				$('head').append('<link href="http://fonts.googleapis.com/css?family='+ the_font +'" rel="stylesheet" type="text/css" class="'+ _linkclass +'">');

				//show in the preview box the font
				$('.'+ _previewer ).css('font-family', _selected +', sans-serif' );

			}else{

				//if selected is not a font remove style "font-family" at preview box
				$('.'+ _previewer ).css('font-family', '' );

			}

		}

	}

	//init for each element
	jQuery( '.google_font_select' ).each(function(){
		var mainID = jQuery(this).attr('id');
		GoogleFontSelect( this, mainID );
	});

	//init when value is changed
	jQuery( '.google_font_select' ).change(function(){
		var mainID = jQuery(this).attr('id');
		GoogleFontSelect( this, mainID );
	});


	/**
	  * Media Uploader
	  * Dependencies 	 : jquery, wp media uploader
	  * Feature added by : Smartik - http://smartik.ws/
	  * Date 			 : 05.28.2013
	  */
	function optionsframework_add_file(event, selector) {

		var upload = $(".uploaded-file"), frame;
		var $el = $(this);

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( frame ) {
			frame.open();
			return;
		}

		// Create the media frame.
		frame = wp.media({
			// Set the title of the modal.
			title: $el.data('choose'),

			// Customize the submit button.
			button: {
				// Set the text of the button.
				text: $el.data('update'),
				// Tell the button not to close the modal, since we're
				// going to refresh the page when the image is selected.
				close: false
			}
		});

		// When an image is selected, run a callback.
		frame.on( 'select', function() {
			// Grab the selected attachment.
			var attachment = frame.state().get('selection').first();
			frame.close();
			selector.find('.upload').val(attachment.attributes.url);
			if ( attachment.attributes.type == 'image' ) {
				selector.find('.screenshot').empty().hide().append('<img class="of-option-image" src="' + attachment.attributes.url + '">').slideDown('fast');
			}
			selector.find('.media_upload_button').unbind();
			selector.find('.remove-image').show().removeClass('hide');//show "Remove" button
			selector.find('.remove-image').css( 'display', 'inline-block' );
			selector.find('.of-background-properties').slideDown();
			optionsframework_file_bindings();
		});

		// Finally, open the modal.
		frame.open();
	}

	function optionsframework_remove_file(selector) {
		selector.find('.remove-image').hide().addClass('hide');//hide "Remove" button
		selector.find('.upload').val('');
		selector.find('.of-background-properties').hide();
		selector.find('.screenshot').slideUp();
		selector.find('.remove-file').unbind();
		// We don't display the upload button if .upload-notice is present
		// This means the user doesn't have the WordPress 3.5 Media Library Support
		if ( $('.section-upload .upload-notice').length > 0 ) {
			$('.media_upload_button').remove();
		}
		optionsframework_file_bindings();
	}

	function optionsframework_file_bindings() {
		$('.remove-image, .remove-file').on('click', function() {
			optionsframework_remove_file( $(this).parents('.section-upload, .section-media, .slide_body') );
		});

		$('.media_upload_button').unbind('click').click( function( event ) {
			optionsframework_add_file(event, $(this).parents('.section-upload, .section-media, .slide_body'));
		});
	}

	optionsframework_file_bindings();

}); //end doc ready


// Aione edit
jQuery(document).ready(function($) {
	var green = new Array();
	green['primary_color']='#a0ce4e';
	green['pricing_box_color']='#92C563';
	green['image_gradient_top_color']='#D1E990';
	green['image_gradient_bottom_color']='#AAD75B';
	green['button_gradient_top_color']='#D1E990';
	green['button_gradient_bottom_color']='#AAD75B';
	green['button_gradient_top_color_hover']='#AAD75B';
	green['button_gradient_bottom_color_hover']='#D1E990';
	green['button_accent_color']='#6e9a1f';
	green['button_accent_hover_color']='#638e1a';
	green['button_bevel_color']='#54770f';
	green['checklist_circle_color']='#a0ce4e';
	green['counter_box_color']='#a0ce4e';
	green['dropcap_color']='#a0ce4e';
	green['flip_boxes_back_bg']='#a0ce4e';
	green['progressbar_filled_color']='#a0ce4e';

	var darkgreen = new Array();
	darkgreen['primary_color']='#9db668';
	darkgreen['pricing_box_color']='#a5c462';
	darkgreen['image_gradient_top_color']='#cce890';
	darkgreen['image_gradient_bottom_color']='#afd65a';
	darkgreen['button_gradient_top_color']='#cce890';
	darkgreen['button_gradient_bottom_color']='#AAD75B';
	darkgreen['button_gradient_top_color_hover']='#AAD75B';
	darkgreen['button_gradient_bottom_color_hover']='#cce890';
	darkgreen['button_accent_color']='#577810';
	darkgreen['button_accent_hover_color']='#577810';
	darkgreen['button_bevel_color']='#577810';
	darkgreen['checklist_circle_color']='#9db668';
	darkgreen['counter_box_color']='#9db668';
	darkgreen['dropcap_color']='#9db668';
	darkgreen['flip_boxes_back_bg']='#9db668';
	darkgreen['progressbar_filled_color']='#9db668';

	var orange = new Array();
	orange['primary_color']='#e9a825';
	orange['pricing_box_color']='#c4a362';
	orange['image_gradient_top_color']='#e8cb90';
	orange['image_gradient_bottom_color']='#d6ad5a';
	orange['button_gradient_top_color']='#e8cb90';
	orange['button_gradient_bottom_color']='#d6ad5a';
	orange['button_gradient_top_color_hover']='#d6ad5a';
	orange['button_gradient_bottom_color_hover']='#e8cb90';
	orange['button_accent_color']='#785510';
	orange['button_accent_hover_color']='#785510';
	orange['button_bevel_color']='#785510';
	orange['checklist_circle_color']='#e9a825';
	orange['counter_box_color']='#e9a825';
	orange['dropcap_color']='#e9a825';
	orange['flip_boxes_back_bg']='#e9a825';
	orange['progressbar_filled_color']='#e9a825';

	var lightblue = new Array();
	lightblue['primary_color']='#67b7e1';
	lightblue['pricing_box_color']='#62a2c4';
	lightblue['image_gradient_top_color']='#90c9e8';
	lightblue['image_gradient_bottom_color']='#5aabd6';
	lightblue['button_gradient_top_color']='#90c9e8';
	lightblue['button_gradient_bottom_color']='#5aabd6';
	lightblue['button_gradient_top_color_hover']='#5aabd6';
	lightblue['button_gradient_bottom_color_hover']='#90c9e8';
	lightblue['button_accent_color']='#105378';
	lightblue['button_accent_hover_color']='#105378';
	lightblue['button_bevel_color']='#105378';
	lightblue['checklist_circle_color']='#67b7e1';
	lightblue['counter_box_color']='#67b7e1';
	lightblue['dropcap_color']='#67b7e1';
	lightblue['flip_boxes_back_bg']='#67b7e1';
	lightblue['progressbar_filled_color']='#67b7e1';

	var lightred = new Array();
	lightred['primary_color']='#f05858';
	lightred['pricing_box_color']='#c46262';
	lightred['image_gradient_top_color']='#e89090';
	lightred['image_gradient_bottom_color']='#d65a5a';
	lightred['button_gradient_top_color']='#e89090';
	lightred['button_gradient_bottom_color']='#d65a5a';
	lightred['button_gradient_top_color_hover']='#d65a5a';
	lightred['button_gradient_bottom_color_hover']='#e89090';
	lightred['button_accent_color']='#781010';
	lightred['button_accent_hover_color']='#781010';
	lightred['button_bevel_color']='#781010';
	lightred['checklist_circle_color']='#f05858';
	lightred['counter_box_color']='#f05858';
	lightred['dropcap_color']='#f05858';
	lightred['flip_boxes_back_bg']='#f05858';
	lightred['progressbar_filled_color']='#f05858';

	var pink = new Array();
	pink['primary_color']='#e67fb9';
	pink['pricing_box_color']='#c46299';
	pink['image_gradient_top_color']='#e890c2';
	pink['image_gradient_bottom_color']='#d65aa0';
	pink['button_gradient_top_color']='#e890c2';
	pink['button_gradient_bottom_color']='#d65aa0';
	pink['button_gradient_top_color_hover']='#d65aa0';
	pink['button_gradient_bottom_color_hover']='#e890c2';
	pink['button_accent_color']='#78104b';
	pink['button_accent_hover_color']='#78104b';
	pink['button_bevel_color']='#78104b';
	pink['checklist_circle_color']='#e67fb9';
	pink['counter_box_color']='#e67fb9';
	pink['dropcap_color']='#e67fb9';
	pink['flip_boxes_back_bg']='#e67fb9';
	pink['progressbar_filled_color']='#e67fb9';

	var lightgrey = new Array();
	lightgrey['primary_color']='#9e9e9e';
	lightgrey['pricing_box_color']='#c4c4c4';
	lightgrey['image_gradient_top_color']='#e8e8e8';
	lightgrey['image_gradient_bottom_color']='#d6d6d6';
	lightgrey['button_gradient_top_color']='#e8e8e8';
	lightgrey['button_gradient_bottom_color']='#d6d6d6';
	lightgrey['button_gradient_top_color_hover']='#d6d6d6';
	lightgrey['button_gradient_bottom_color_hover']='#e8e8e8';
	lightgrey['button_accent_color']='#787878';
	lightgrey['button_accent_hover_color']='#787878';
	lightgrey['button_bevel_color']='#787878';
	lightgrey['checklist_circle_color']='#9e9e9e';
	lightgrey['counter_box_color']='#9e9e9e';
	lightgrey['dropcap_color']='#9e9e9e';
	lightgrey['flip_boxes_back_bg']='#9e9e9e';
	lightgrey['progressbar_filled_color']='#9e9e9e';

	var brown = new Array();
	brown['primary_color']='#ab8b65';
	brown['pricing_box_color']='#c49862';
	brown['image_gradient_top_color']='#e8c090';
	brown['image_gradient_bottom_color']='#d69e5a';
	brown['button_gradient_top_color']='#e8c090';
	brown['button_gradient_bottom_color']='#d69e5a';
	brown['button_gradient_top_color_hover']='#d69e5a';
	brown['button_gradient_bottom_color_hover']='#e8c090';
	brown['button_accent_color']='#784910';
	brown['button_accent_hover_color']='#784910';
	brown['button_bevel_color']='#784910';
	brown['checklist_circle_color']='#ab8b65';
	brown['counter_box_color']='#ab8b65';
	brown['dropcap_color']='#ab8b65';
	brown['flip_boxes_back_bg']='#ab8b65';
	brown['progressbar_filled_color']='#ab8b65';

	var red = new Array();
	red['primary_color']='#e10707';
	red['pricing_box_color']='#c40606';
	red['image_gradient_top_color']='#e80707';
	red['image_gradient_bottom_color']='#d60707';
	red['button_gradient_top_color']='#e80707';
	red['button_gradient_bottom_color']='#d60707';
	red['button_gradient_top_color_hover']='#d60707';
	red['button_gradient_bottom_color_hover']='#e80707';
	red['button_accent_color']='#780404';
	red['button_accent_hover_color']='#780404';
	red['button_bevel_color']='#780404';
	red['checklist_circle_color']='#e10707';
	red['counter_box_color']='#e10707';
	red['dropcap_color']='#e10707';
	red['flip_boxes_back_bg']='#e10707';
	red['progressbar_filled_color']='#e10707';

	var blue = new Array();
	blue['primary_color']='#1a80b6';
	blue['pricing_box_color']='#62a2c4';
	blue['image_gradient_top_color']='#90c9e8';
	blue['image_gradient_bottom_color']='#5aabd6';
	blue['button_gradient_top_color']='#90c9e8';
	blue['button_gradient_bottom_color']='#5aabd6';
	blue['button_gradient_top_color_hover']='#5aabd6';
	blue['button_gradient_bottom_color_hover']='#90c9e8';
	blue['button_accent_color']='#105378';
	blue['button_accent_hover_color']='#105378';
	blue['button_bevel_color']='#105378';
	blue['checklist_circle_color']='#1a80b6';
	blue['counter_box_color']='#1a80b6';
	blue['dropcap_color']='#1a80b6';
	blue['flip_boxes_back_bg']='#1a80b6';
	blue['progressbar_filled_color']='#1a80b6';

	var light = new Array();
	light['header_bg_color'] = '#ffffff';
	light['header_border_color'] = '#e5e5e5';
	light['content_bg_color'] = '#ffffff';
	light['slidingbar_bg_color'] = '#363839';
	light['header_sticky_bg_color'] = '#ffffff';
	light['slidingbar_border_color'] = '#e9eaee';
	light['footer_bg_color'] = '#363839';
	light['footer_border_color'] = '#e9eaee';
	light['copyright_border_color'] = '#4B4C4D';
	light['title_border_color'] = '#e7e6e6';
	light['testimonial_bg_color'] = '#f6f3f3';
	light['testimonial_text_color'] = '#747474';
	light['sep_color'] = '#e0dede';
	light['slidingbar_divider_color'] = '#505152';
	light['footer_divider_color'] = '#505152';
	light['form_bg_color'] = '#ffffff';
	light['form_text_color'] = '#aaa9a9';
	light['form_border_color'] = '#d2d2d2';
	light['tagline_font_color'] = '#747474';
	light['page_title_color'] = '#333333';
	light['h1_color'] = '#333333';
	light['h2_color'] = '#333333';
	light['h3_color'] = '#333333';
	light['h4_color'] = '#333333';
	light['h5_color'] = '#333333';
	light['h6_color'] = '#333333';
	light['body_text_color'] = '#747474';
	light['link_color'] = '#333333';
	light['menu_h45_bg_color'] = '#FFFFFF';
	light['menu_first_color'] = '#333333';
	light['menu_sub_bg_color'] = '#f2efef';
	light['menu_sub_color'] = '#333333';
	light['menu_bg_hover_color'] = '#f8f8f8';
	light['menu_sub_sep_color'] = '#dcdadb';
	light['snav_color'] = '#ffffff';
	light['header_social_links_icon_color'] = '#ffffff';
	light['header_top_first_border_color'] = '#e5e5e5';
	light['header_top_sub_bg_color'] = '#ffffff';
	light['header_top_menu_sub_color'] = '#747474';
	light['header_top_menu_bg_hover_color'] = '#fafafa';
	light['header_top_menu_sub_hover_color'] = '#333333';
	light['header_top_menu_sub_sep_color'] = '#e5e5e5';
	light['sidebar_bg_color'] = '#ffffff';
	light['page_title_bg_color'] = '#F6F6F6';
	light['page_title_border_color'] = '#d2d3d4';
	light['breadcrumbs_text_color'] = '#333333';
	light['sidebar_heading_color'] = '#333333';
	light['accordian_inactive_color'] = '#333333';
	light['counter_filled_color'] = '#a0ce4e';
	light['counter_unfilled_color'] = '#f6f6f6';
	light['arrow_color'] = '#333333';
	light['dates_box_color'] = '#eef0f2';
	light['carousel_nav_color'] = '#999999';
	light['carousel_hover_color'] = '#808080';
	light['content_box_bg_color'] = 'transparent';
	light['title_border_color'] = '#e0dede';
	light['icon_circle_color'] = '#333333';
	light['icon_border_color'] = '#333333';
	light['icon_color'] = '#ffffff';
	light['imgframe_border_color'] = '#f6f6f6';
	light['imgframe_style_color'] = '#000000';
	light['sep_pricing_box_heading_color'] = '#333333';
	light['full_boxed_pricing_box_heading_color'] = '#333333';
	light['pricing_bg_color'] = '#ffffff';
	light['pricing_border_color'] = '#f8f8f8';
	light['pricing_divider_color'] = '#ededed';
	light['social_bg_color'] = '#f6f6f6';
	light['tabs_bg_color'] = '#ffffff';
	light['tabs_inactive_color'] = '#f1f2f2';
	light['tagline_bg'] = '#f6f6f6';
	light['tagline_border_color'] = '#f6f6f6';
	light['timeline_bg_color'] = 'transparent';
	light['timeline_color'] = '#ebeaea';
	light['woo_cart_bg_color'] = '#fafafa';
	light['qty_bg_color'] = '#fbfaf9';
	light['qty_bg_hover_color'] = '#ffffff';
	light['bbp_forum_header_bg'] = '#ebeaea';
	light['bbp_forum_border_color'] = '#ebeaea';
	light['checklist_icons_color'] = '#ffffff';
	light['flip_boxes_front_bg'] = '#f6f6f6';
	light['flip_boxes_front_heading'] = '#333333';
	light['flip_boxes_front_text'] = '#747474';
	light['full_width_bg_color'] = '#ffffff';
	light['full_width_border_color'] = '#eae9e9';
	light['modal_bg_color'] = '#f6f6f6';
	light['modal_border_color'] = '#ebebeb';
	light['person_border_color'] = '#f6f6f6';
	light['popover_heading_bg_color'] = '#f6f6f6';
	light['popover_content_bg_color'] = '#ffffff';
	light['popover_border_color'] = '#ebebeb';
	light['popover_text_color'] = '#747474';
	light['progressbar_unfilled_color']='#f6f6f6';
	light['section_sep_bg']='#f6f6f6';
	light['section_sep_border_color']='#f6f6f6';
	light['sharing_box_bg_color']='#f6f6f6';
	light['sharing_box_tagline_text_color']='#333333';
	light['header_social_links_icon_color']='#bebdbd';
	light['header_social_links_box_color']='#e8e8e8';
	light['bg_color']='#d7d6d6';
	light['mobile_menu_background_color']='#f9f9f9';
	light['mobile_menu_border_color']='#dadada';
	light['mobile_menu_hover_color']='#f6f6f6';
   	light['social_links_icon_color']='#bebdbd';
	light['social_links_box_color']='#e8e8e8';
	light['sharing_social_links_icon_color']='#bebdbd';
	light['sharing_social_links_box_color']='#e8e8e8';

	var dark = new Array()
	dark['header_bg_color'] = '#29292a';
	dark['header_border_color'] = '#3e3e3e';
	dark['header_top_bg_color'] = '#29292a';
	dark['content_bg_color'] = '#29292a';
	dark['slidingbar_bg_color'] = '#363839';
	dark['header_sticky_bg_color'] = '#29292a';
	dark['slidingbar_border_color'] = '#484747';
	dark['footer_bg_color'] = '#2d2d2d';
	dark['footer_border_color'] = '#403f3f';
	dark['copyright_border_color'] = '#4B4C4D';
	dark['title_border_color'] = '#3e3e3e';
	dark['testimonial_bg_color'] = '#3e3e3e';
	dark['testimonial_text_color'] = '#aaa9a9';
	dark['sep_color'] = '#3e3e3e';
	dark['slidingbar_divider_color'] = '#505152';
	dark['footer_divider_color'] = '#505152';
	dark['form_bg_color'] = '#3e3e3e';
	dark['form_text_color'] = '#cccccc';
	dark['form_border_color'] = '#212122';
	dark['tagline_font_color'] = '#ffffff';
	dark['page_title_color'] = '#ffffff';
	dark['h1_color'] = '#ffffff';
	dark['h2_color'] = '#ffffff';
	dark['h3_color'] = '#ffffff';
	dark['h4_color'] = '#ffffff';
	dark['h5_color'] = '#ffffff';
	dark['h6_color'] = '#ffffff';
	dark['body_text_color'] = '#aaa9a9';
	dark['link_color'] = '#ffffff';
	dark['menu_h45_bg_color'] = '#29292A';
	dark['menu_first_color'] = '#ffffff';
	dark['menu_sub_bg_color'] = '#3e3e3e';
	dark['menu_sub_color'] = '#d6d6d6';
	dark['menu_bg_hover_color'] = '#383838';
	dark['menu_sub_sep_color'] = '#313030';
	dark['snav_color'] = '#747474';
	dark['header_social_links_icon_color'] = '#747474';
	dark['header_top_first_border_color'] = '#3e3e3e';
	dark['header_top_sub_bg_color'] = '#29292a';
	dark['header_top_menu_sub_color'] = '#d6d6d6';
	dark['header_top_menu_bg_hover_color'] = '#333333';
	dark['header_top_menu_sub_hover_color'] = '#d6d6d6';
	dark['header_top_menu_sub_sep_color'] = '#3e3e3e';
	dark['sidebar_bg_color'] = '#29292a';
	dark['page_title_bg_color'] = '#353535';
	dark['page_title_border_color'] = '#464646';
	dark['breadcrumbs_text_color'] = '#ffffff';
	dark['sidebar_heading_color'] = '#ffffff';
	dark['accordian_inactive_color'] = '#3e3e3e';
	dark['counter_filled_color'] = '#a0ce4e';
	dark['counter_unfilled_color'] = '#3e3e3e';
	dark['arrow_color'] = '#ffffff';
	dark['dates_box_color'] = '#3e3e3e';
	dark['carousel_nav_color'] = '#3a3a3a';
	dark['carousel_hover_color'] = '#333333';
	dark['content_box_bg_color'] = 'transparent';
	dark['title_border_color'] = '#3e3e3e';
	dark['icon_circle_color'] = '#3e3e3e';
	dark['icon_border_color'] = '#3e3e3e';
	dark['icon_color'] = '#ffffff';
	dark['imgframe_border_color'] = '#494848';
	dark['imgframe_style_color'] = '#000000';
	dark['sep_pricing_box_heading_color'] = '#ffffff';
	dark['full_boxed_pricing_box_heading_color'] = '#AAA9A9';
	dark['pricing_bg_color'] = '#3e3e3e';
	dark['pricing_border_color'] = '#353535';
	dark['pricing_divider_color'] = '#29292a';
	dark['social_bg_color'] = '#3e3e3e';
	dark['tabs_bg_color'] = '#3e3e3e';
	dark['tabs_inactive_color'] = '#313132';
	dark['tagline_bg'] = '#3e3e3e';
	dark['tagline_border_color'] = '#3e3e3e';
	dark['timeline_bg_color'] = 'transparent';
	dark['timeline_color'] = '#3e3e3e';
	dark['woo_cart_bg_color'] = '#333333';
	dark['qty_bg_color'] = '#29292a';
	dark['qty_bg_hover_color'] = '#383838';
	dark['bbp_forum_header_bg'] = '#383838';
	dark['bbp_forum_border_color'] = '#212121';
	dark['checklist_icons_color'] = '#ffffff';
	dark['flip_boxes_front_bg'] = '#3e3e3e';
	dark['flip_boxes_front_heading'] = '#ffffff';
	dark['flip_boxes_front_text'] = '#aaa9a9';
	dark['full_width_bg_color'] = '#242424';
	dark['full_width_border_color'] = '#3e3e3e';
	dark['modal_bg_color'] = '#29292a';
	dark['modal_border_color'] = '#242424';
	dark['person_border_color'] = '#494848';
	dark['popover_heading_bg_color'] = '#29292a';
	dark['popover_content_bg_color'] = '#3e3e3e';
	dark['popover_border_color'] = '#242424';
	dark['popover_text_color'] = '#ffffff';
	dark['progressbar_unfilled_color']='#3e3e3e';
	dark['section_sep_bg']='#3e3e3e';
	dark['section_sep_border_color']='#3e3e3e';
	dark['sharing_box_bg_color']='#3e3e3e';
	dark['sharing_box_tagline_text_color']='#ffffff';
	dark['header_social_links_icon_color']='#545455';
	dark['header_social_links_box_color']='#383838';
	dark['bg_color']='#1e1e1e';
	dark['mobile_menu_background_color']='#3e3e3e';
	dark['mobile_menu_border_color']='#212122';
	dark['mobile_menu_hover_color']='#383737';
   	dark['social_links_icon_color']='#3e3e3e';
	dark['social_links_box_color']='#383838';
	dark['sharing_social_links_icon_color']='#919191';
	dark['sharing_social_links_box_color']='#4b4e4f';

	$('#scheme_type').change(function() {
		colorscheme = $(this).val();

		if (colorscheme == 'Dark') { colorscheme = dark; }
		if (colorscheme == 'Light') { colorscheme = light; }

		for (id in colorscheme) {
			of_update_color(id,colorscheme[id]);
		}

		var name = $('#section-header_layout input:checked').val();
		if($(this).val() == 'Light') {
			jQuery('#social_links_color option:selected,#socialbox_icons_color option:selected').removeAttr('selected');
			jQuery('#social_links_color,#socialbox_icons_color').val('Dark');
			jQuery('#section-social_links_color .select_wrapper span,#section-socialbox_icons_color .select_wrapper span').html('Dark');
			if(name == 'v2') {
				of_update_color('header_top_bg_color', '#ffffff');
				of_update_color('header_top_first_border_color', '#efefef');
				of_update_color('snav_color', '#747474');
				of_update_color('header_social_links_icon_color', '#bebdbd');
				jQuery('#header_icons_color option:selected').removeAttr('selected');
				jQuery('#header_icons_color').val('Dark');
				jQuery('#section-header_icons_color .select_wrapper span').html('Dark');
			} else if(name == 'v3' || name == 'v4' || name == 'v5') {
				of_update_color('header_top_bg_color', $('#primary_color').val());
				of_update_color('header_top_first_border_color', '#ffffff');
				of_update_color('snav_color', '#ffffff');
				of_update_color('header_social_links_icon_color', '#ffffff');
				jQuery('#header_icons_color option:selected').removeAttr('selected');
				jQuery('#header_icons_color').val('Light');
				jQuery('#section-header_icons_color .select_wrapper span').html('Light');
			}
		} else if($(this).val() == 'Dark') {
			jQuery('#social_links_color option:selected,#socialbox_icons_color option:selected').removeAttr('selected');
			jQuery('#social_links_color,#socialbox_icons_color').val('Light');
			jQuery('#section-social_links_color .select_wrapper span,#section-socialbox_icons_color .select_wrapper span').html('Light');
			if(name == 'v2') {
				of_update_color('header_top_bg_color', '#29292a');
				of_update_color('header_top_first_border_color', '#3e3e3e');
				of_update_color('snav_color', '#ffffff');
				of_update_color('header_social_links_icon_color', '#ffffff');
				jQuery('#header_icons_color option:selected').removeAttr('selected');
				jQuery('#header_icons_color').val('Light');
				jQuery('#section-header_icons_color .select_wrapper span').html('Light');
			} else if(name == 'v3' || name == 'v4' || name == 'v5') {
				of_update_color('header_top_bg_color', $('#primary_color').val());
				of_update_color('header_top_first_border_color', '#ffffff');
				of_update_color('snav_color', '#ffffff');
				of_update_color('header_social_links_icon_color', '#ffffff');
				jQuery('#header_icons_color option:selected').removeAttr('selected');
				jQuery('#header_icons_color').val('Light');
				jQuery('#section-header_icons_color .select_wrapper span').html('Light');
			}
		}
	});

	$('#color_scheme').change(function() {
		colorscheme = $(this).val();
		if (colorscheme == 'Green') { colorscheme = green; }
		if (colorscheme == 'Dark Green') { colorscheme = darkgreen; }
		if (colorscheme == 'Orange') { colorscheme = orange; }
		if (colorscheme == 'Light Blue') { colorscheme = lightblue; }
		if (colorscheme == 'Light Red') { colorscheme = lightred; }
		if (colorscheme == 'Pink') { colorscheme = pink; }
		if (colorscheme == 'Light Grey') { colorscheme = lightgrey; }
		if (colorscheme == 'Brown') { colorscheme = brown; }
		if (colorscheme == 'Red') { colorscheme = red; }
		if (colorscheme == 'Blue') { colorscheme = blue; }

		for (id in colorscheme) {
			of_update_color(id,colorscheme[id]);
		}

		var name = $('#section-header_layout input:checked').val();
		if($('#scheme_type').val() == 'Light') {
			if(name == 'v2') {
				of_update_color('header_top_bg_color', '#ffffff');
				of_update_color('header_top_first_border_color', '#efefef');
				of_update_color('snav_color', '#747474');
				of_update_color('header_social_links_icon_color', '#bebdbd');
				jQuery('#header_icons_color option:selected').removeAttr('selected');
				jQuery('#header_icons_color').val('Dark');
				jQuery('#section-header_icons_color .select_wrapper span').html('Dark');
			} else if(name == 'v3' || name == 'v4' || name == 'v5') {
				of_update_color('header_top_bg_color', $('#primary_color').val());
				of_update_color('header_top_first_border_color', '#ffffff');
				of_update_color('snav_color', '#ffffff');
				of_update_color('header_social_links_icon_color', '#ffffff');
				jQuery('#header_icons_color option:selected').removeAttr('selected');
				jQuery('#header_icons_color').val('Light');
				jQuery('#section-header_icons_color .select_wrapper span').html('Light');
			}
		} else if($('#scheme_type').val() == 'Dark') {
			if(name == 'v2') {
				of_update_color('header_top_bg_color', '#29292a');
				of_update_color('header_top_first_border_color', '#3e3e3e');
				of_update_color('snav_color', '#ffffff');
				of_update_color('header_social_links_icon_color', '#ffffff');
				jQuery('#header_icons_color option:selected').removeAttr('selected');
				jQuery('#header_icons_color').val('Light');
				jQuery('#section-header_icons_color .select_wrapper span').html('Light');
			} else if(name == 'v3' || name == 'v4' || name == 'v5') {
				of_update_color('header_top_bg_color', $('#primary_color').val());
				of_update_color('header_top_first_border_color', '#ffffff');
				of_update_color('snav_color', '#ffffff');
				of_update_color('header_social_links_icon_color', '#ffffff');
				jQuery('#header_icons_color option:selected').removeAttr('selected');
				jQuery('#header_icons_color').val('Light');
				jQuery('#section-header_icons_color .select_wrapper span').html('Light');
			}
		}

		of_update_color('counter_filled_color', $('#primary_color').val());
		of_update_color('menu_hover_first_color', $('#primary_color').val());
	});

	// This does the heavy lifting of updating all the colorpickers and text
	function of_update_color(id,hex) {
		//$('#section-' + id + ' .of-color').css({backgroundColor:hex});
		//$('#section-' + id + ' .wp-color-result').ColorPickerSetColor(hex);
		$('#section-' + id + ' .wp-color-result').css('background-color', hex);
		$('#section-' + id + ' .wp-color-result').css('font-weight', 'normal');
		$('#section-' + id + ' .of-color').val(hex);
		//$('#section-' + id + ' .of-color').animate({backgroundColor:'#ffffff'}, 600);
	}

	$('#section-header_layout img').click(function(e) {
		e.preventDefault();

		var name = $(this).parent().find('input[type=radio]').attr('value');

		if($('#scheme_type').val() == 'Light') {
			if(name == 'v2') {
				of_update_color('header_top_bg_color', '#ffffff');
				of_update_color('header_top_first_border_color', '#efefef');
				of_update_color('snav_color', '#747474');
				of_update_color('header_social_links_icon_color', '#bebdbd');
				jQuery('#header_icons_color option:selected').removeAttr('selected');
				jQuery('#header_icons_color').val('Dark');
				jQuery('#section-header_icons_color .select_wrapper span').html('Dark');
			} else if(name == 'v3' || name == 'v4' || name == 'v5') {
				of_update_color('header_top_bg_color', $('#primary_color').val());
				of_update_color('header_top_first_border_color', '#ffffff');
				of_update_color('snav_color', '#ffffff');
				of_update_color('header_social_links_icon_color', '#ffffff');
				jQuery('#header_icons_color option:selected').removeAttr('selected');
				jQuery('#header_icons_color').val('Light');
				jQuery('#section-header_icons_color .select_wrapper span').html('Light');
			}
		} else if($('#scheme_type').val() == 'Dark') {
			if(name == 'v2') {
				of_update_color('header_top_bg_color', '#29292a');
				of_update_color('header_top_first_border_color', '#3e3e3e');
				of_update_color('snav_color', '#ffffff');
				of_update_color('header_social_links_icon_color', '#ffffff');
				jQuery('#header_icons_color option:selected').removeAttr('selected');
				jQuery('#header_icons_color').val('Light');
				jQuery('#section-header_icons_color .select_wrapper span').html('Light');
			} else if(name == 'v3' || name == 'v4' || name == 'v5') {
				of_update_color('header_top_bg_color', $('#primary_color').val());
				of_update_color('header_top_first_border_color', '#ffffff');
				of_update_color('snav_color', '#ffffff');
				of_update_color('header_social_links_icon_color', '#ffffff');
				jQuery('#header_icons_color option:selected').removeAttr('selected');
				jQuery('#header_icons_color').val('Light');
				jQuery('#section-header_icons_color .select_wrapper span').html('Light');
			}
		}

		if(name == 'v4' || name == 'v5') {
			$('#nav_height').attr('value', '40');
		} else {
			$('#nav_height').attr('value', '83');
		}

		if(name == 'v4') {
			$('#margin_logo_top, #margin_logo_bottom').attr('value', '0px');
		} else {
			$('#margin_logo_top, #margin_logo_bottom').attr('value', '31px');
		}
	});

	// if clicked on import data button
	$('#section-demo_data .button-primary').live('click', function(e) {
		var confirm = window.confirm('WARNING: Clicking this button will replace your current theme options, sliders and widgets.  It can also take a minute to complete. Importing data is recommended on fresh installs only once. Importing on sites with content or importing twice will duplicate menus, pages and all posts.');
		var loading_img = jQuery(this).parent().find('img');

		if(confirm == true) {
			loading_img.show();

			var data = {
				action: 'aione_import_demo_data'
			};

			jQuery('.importer-notice').hide();

			$.post(ajaxurl, data, function(response) {
				if( jQuery.trim(response) !== 'imported' ) {
					jQuery('.importer-notice-1').show();
				} else {
					jQuery('.importer-notice-2').show();
				}
				loading_img.hide();
			}).fail(function() {
				jQuery('.importer-notice-3').show();
				loading_img.hide();
			});
		}

		e.preventDefault();
	});

	// AIONE Sorter
	$('.aione-sortable').each(function() {
		var array = [];
		$(this).find('li').each(function() {
			array.push($(this).attr('id'));
		});
		$(this).closest('.section-aione_sorter').find('.aione-sorter-positions').val(array);
	});
	$('.aione-sortable' ).sortable({
		axis: 'y',
		cursor: 'move',
		placeholder: "ui-state-highlight",
		helper: "ui-state-highlight",
		handle: ".drag",
		stop: function(event, ui) {
			var array = [];
			$(this).find('li').each(function() {
				array.push($(this).attr('id'));
			});
			$(this).closest('.section-aione_sorter').find('.aione-sorter-positions').val(array);
		}
	});

	$('.accordion').each(function() {
		$(this).find('.section-accordion:last').remove();
		$(this).find('.section').not('.section-accordion').hide();
	});

	$('.section-accordion').toggle(function(e) {
		e.preventDefault();
		$(this).parents('.accordion').find('.section-accordion .fa').removeClass('fa-plus').addClass('fa-minus');
		$(this).parents('.accordion').find('.section').slideDown();
	}, function(e) {
		e.preventDefault();
		$(this).parents('.accordion').find('.section-accordion .fa').removeClass('fa-minus').addClass('fa-plus');
		$(this).parents('.accordion').find('.section').not('.section-accordion').slideUp();
	});
});
// End Aione edit