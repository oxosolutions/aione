/*global jQuery, document, redux_change */
(function($){
	'use strict';

	$.redux = $.redux || {};

	$(document).ready(function(){
		$.redux.edd();
	});

	$.redux.edd = function(){
		jQuery('.redux-verifyEDD').click(function() {

			var parent = jQuery(this).parents('.redux-container-edd:first');
			var id = parent.attr('id');
			var data = new Array();
			jQuery(this).parents('.redux-container-edd:first').find('.redux-edd').each(function() {
				data[jQuery(this).attr('id').replace(id+'-', '')] = jQuery(this).val();
			});
			console.log(data);
		


			jQuery.post(
			    ajaxurl, {
			        'action': 'redux_edd_'+redux_opts.opt_name+'_verify_license',
			        'data':   JSON.stringify(data)
			    },
			    function(response){
			        alert('The server responded: ' + response);
			    }
			);			
		});
				
	}

})(jQuery);
