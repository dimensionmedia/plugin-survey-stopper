;(function ( $, window, document ) {

	/* WP plugin page */
	$(document).ready(function() { 

		$('#the-list').find('tr.active span.deactivate a').each(function() {
			var deactivate_link = this;
		  	var $events = $._data($(deactivate_link)[0], "events" );
			// validate if the element has an event attached
			if( typeof $events != "undefined" ) {
			    //iteration to get each one of the handlers
			    jQuery.each($events, function(i, event){
			        jQuery.each(event, function(i, handler){
			        	if ( handler.type == 'click' ) {
			        		$(deactivate_link).off( 'click ');
							$(deactivate_link).closest('tr').find('td.column-description .plugin-version-author-uri').append(' | <span class="ps-stopper-detected">Disabled Deactivation Script</span>');
			        	}
			        });
			    });
			}
		});

	});

})( jQuery , window, document );