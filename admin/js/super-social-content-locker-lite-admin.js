(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
   
	
	$( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
	
	
	var tabs = $( "#tabs" ).tabs();
    tabs.find( ".ui-tabs-nav" ).sortable({
		
		   axis: 'y',
		  create: function (event, ui) {			
			var ordr = jQuery(this).sortable('serialize');
			$("#codetides_social_tabs_sort_order").val(ordr);
		},
		  update: function (event, ui) {			
			var ordr = jQuery(this).sortable('serialize');
			$("#codetides_social_tabs_sort_order").val(ordr);
		}
    });
	
	
	$( "#tabsform" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $( "#tabsform li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
	
	
	var tabsform = $( "#tabsform" ).tabs();
    tabsform.find( ".ui-tabs-nav" ).sortable({
      
    });
	
	
	jQuery("#remind_later_buy").click(function(e){			
            e.preventDefault();        
            var data = {
                'action': 'update_remind_later_buy',
                'remind_later': 1
            };            
            jQuery.ajax({
                type: "POST",               
                dataType:"json",
                data    : data,
                url: ajaxurl,
                //This fires when the ajax 'comes back' and it is valid json
                success: function (response) {                    
                    location.reload();

                }
                //This fires when the ajax 'comes back' and it isn't valid json
            }).fail(function (data) {               
                console.log(data);
                location.reload();
            });
        
        
		});
	jQuery("#already_bought").click(function(e){
            e.preventDefault();       
       
            var data = {
                'action': 'update_already_bought',
                'bought': 1
            };
            jQuery.ajax({
                type: "POST",               
                dataType:"json",
                data    : data,
                url: ajaxurl,
                //This fires when the ajax 'comes back' and it is valid json
                success: function (response) {    
                    console.log(response);
                    location.reload();

                }
                //This fires when the ajax 'comes back' and it isn't valid json
            }).fail(function (data) {               
                console.log(data);
                location.reload();
            });
        
        
		});
		
})( jQuery );
