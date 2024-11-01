(function() {
    tinymce.PluginManager.add('sscl_mce_button', function(editor, url) {
        editor.addButton( 'sscl_mce_button', {
				text: '',
				image : url+'/lockericon.png',
				icon: 'sscl-icon',
				tooltip: 'Insert Super Social Content Locker Shortcode',
				cmd: 'plugin_command'
			});
		


		// Called when we click the Insert Gistpen button
			editor.addCommand( 'plugin_command', function() {
				// Calls the pop-up modal
				editor.windowManager.open({
					// Modal settings
					title: 'Insert Super Social Content Locker Shortcode',
					width: 280,
					// minus head and foot of dialog box
					height: 100,
					
					inline: 1,
					id: 'sscl-insert-dialog',
					buttons: [{
						text: 'Insert',
						id: 'sscl-button-insert',
						class: 'insert',
						onclick: function( e ) {
							editor.insertContent(
								insertShortcode ()
							);
							editor.windowManager.close();
						},
					},
					{
						text: 'Cancel',
						id: 'sscl-button-cancel',
						onclick: 'close'
					}],					
				});

				appendInsertDialog();

			});		
			
			
			
			
			
			
			
			
			
    });
	function insertShortcode () {	
		var ids = [];		
		jQuery('#ct_sscl_list :selected').each(function(i, sel){ 	 		    
				ids[i] = jQuery(sel).val();
		});		
		return '[sscl id="'+ids+'"][/sscl]';
	}
	function appendInsertDialog () {
		var dialogBody = jQuery( '#sscl-insert-dialog-body' ).append( '<div class="loading">Please wait form is loading</div>' );
		//alert(ajaxurl);
		// Get the form template from WordPress
		jQuery.post( ajaxurl, {
			action: 'get_sscl_posts_list'
		}, function( response ) {
			//alert(response);
			template = response;

			dialogBody.children( '.loading' ).remove();
			dialogBody.append( template );
			jQuery( '.spinner' ).hide();
		});
	}
	
})();