<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://goo.gl/wnt0kK
 * @since      1.1.0
 *
 * @package    Super_Social_Content_Locker
 * @subpackage Super_Social_Content_Locker/admin/partials
 */
 $prefix = "codetides_";
?>
<div class="sscl-panel">
	<div class="infobox">
		<?php _e('Hint: Drag and drop the tabs to change the order of the buttons.','super-social-content-locker')?>
	</div>	
	<div id="tabs">
		<ul>
			<?php echo $this->codetides_generate_social_tab_with_order(get_the_ID());?>			
		</ul>
		<div id="tabs-1">
            <div class="infobox critical">
				<?php esc_html_e('Note: Facebook had disable this feature so this feature might not work properly.','super-social-content-locker')?>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('Available','super-social-content-locker')?></label>
				<div class="control-input"> 
					<label class="switch">
						<input type="checkbox" name="<?php echo $prefix;?>fb_like_locker" id="<?php echo $prefix;?>fb_like_locker" <?php echo sscl_get_checkbox_value(get_the_ID(),$prefix.'fb_like_locker','')?>>
						<span class="slider round"></span>
					</label>
				</div>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('URL to like','super-social-content-locker')?></label>
				<div class="control-input">            
					<input type="text" class="textfield" name="<?php echo $prefix;?>locker_fb_url_to_like" id="<?php echo $prefix;?>locker_fb_url_to_like" value="<?php echo sscl_get_text_value(get_the_ID(),$prefix.'locker_fb_url_to_like','')?>" />
					<i><?php _e('Set an URL (a facebook page or website page) which the user has to like in order to unlock your content. Leave this field empty to use an URL of the page where the locker will be located.','super-social-content-locker')?></i>
				</div>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('Button Text','super-social-content-locker')?></label>
				<div class="control-input">            
					<input type="text" class="textfield" name="<?php echo $prefix;?>locker_fb_button_text" id="<?php echo $prefix;?>locker_fb_button_text" value="<?php echo sscl_get_text_value(get_the_ID(),$prefix.'locker_fb_button_text','')?>" />
					<i><?php _e('Optional. A title of the button that is situated on the covers in the themes.','super-social-content-locker')?></i>
				</div>
			</div>
		</div>
		<div id="tabs-2">
            <div class="infobox success">
				<?php esc_html_e('Note: Facebook Shares Works Perfectly.','super-social-content-locker')?>
			</div>
			<div class="sscl-panel-div">
			<label for="width"><?php _e('Available','super-social-content-locker')?></label>
				<div class="control-input"> 
					<label class="switch">
						<input type="checkbox" name="<?php echo $prefix;?>fb_share_locker" id="<?php echo $prefix;?>fb_share_locker" <?php echo sscl_get_checkbox_value(get_the_ID(),$prefix.'fb_share_locker','')?>>
						<span class="slider round"></span>
					</label>
				</div>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('URL to share','super-social-content-locker')?></label>
				<div class="control-input">            
					<input type="text" class="textfield" name="<?php echo $prefix;?>locker_fb_url_to_share" id="<?php echo $prefix;?>locker_fb_url_to_share" value="<?php echo sscl_get_text_value(get_the_ID(),$prefix.'locker_fb_url_to_share','')?>"/>
					<i><?php _e('Set an URL which the user has to share in order to unlock your content. Leave this field empty to use an URL of the page where the locker will be located.','super-social-content-locker')?></i>
				</div>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('Button title','super-social-content-locker')?></label>
				<div class="control-input">            
					<input type="text" class="textfield" name="<?php echo $prefix;?>locker_fb_share_text" id="<?php echo $prefix;?>locker_fb_share_text" value="<?php echo sscl_get_text_value(get_the_ID(),$prefix.'locker_fb_share_text','')?>" />
					<i><?php _e('Optional. A title of the button that is situated on the covers in the themes.','super-social-content-locker')?></i>
				</div>
			</div>
		</div>
		<div id="tabs-3">
            <div class="infobox critical">
				<?php esc_html_e('Note: Twitter had disable this feature so this feature might not work properly.','super-social-content-locker')?>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('Available','super-social-content-locker')?></label>
				<div class="control-input"> 
					<label class="switch">
					<input type="checkbox" name="<?php echo $prefix;?>tw_follow_locker" id="<?php echo $prefix;?>tw_follow_locker" <?php echo sscl_get_checkbox_value(get_the_ID(),$prefix.'tw_follow_locker','')?>>
					<span class="slider round"></span>
				</label>
				</div>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('User to follow','super-social-content-locker')?></label>
				<div class="control-input">            
					<input type="text" class="textfield" name="<?php echo $prefix;?>locker_tw_url_to_follow" id="<?php echo $prefix;?>locker_tw_url_to_follow" value="<?php echo sscl_get_text_value(get_the_ID(),$prefix.'locker_tw_url_to_follow','')?>" />
					<i><?php _e('Set an URL of your Twitter profile (for example, https://twitter.com/codetides)','super-social-content-locker')?></i>
				</div>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('Button title','super-social-content-locker')?></label>
				<div class="control-input">            
					<input type="text" class="textfield" name="<?php echo $prefix;?>locker_tw_follow_button_text" id="<?php echo $prefix;?>locker_tw_follow_button_text" value="<?php echo sscl_get_text_value(get_the_ID(),$prefix.'locker_tw_follow_button_text','')?>" />
					<i><?php _e('Optional. A title of the button that is situated on the covers in the themes.','super-social-content-locker')?></i>
				</div>
			</div>
		</div>
		<div id="tabs-4">
            <div class="infobox critical">
				<?php esc_html_e('Note: Twitter had disable this feature so this feature might not work properly.','super-social-content-locker')?>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('Available','super-social-content-locker')?></label>
				<div class="control-input"> 
					<label class="switch">
						<input type="checkbox" name="<?php echo $prefix;?>tw_tweet_locker" id="<?php echo $prefix;?>tw_tweet_locker" <?php echo sscl_get_checkbox_value(get_the_ID(),$prefix.'tw_tweet_locker','')?>>
						<span class="slider round"></span>
					</label>
				</div>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('URL to tweet','super-social-content-locker')?></label>
				<div class="control-input">            
					<input type="text" class="textfield" name="<?php echo $prefix;?>locker_tw_url_to_tweet" id="<?php echo $prefix;?>locker_tw_url_to_tweet" value="<?php echo sscl_get_text_value(get_the_ID(),$prefix.'locker_tw_url_to_tweet','')?>" />
					<i><?php _e('Set an URL which the user has to tweet in order to unlock your content. Leave this field empty to use an URL of the page where the locker will be located.','super-social-content-locker')?></i>
				</div>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('Tweet','super-social-content-locker')?></label>
				<div class="control-input">            
					<input type="text" class="textfield" name="<?php echo $prefix;?>locker_tw_tweet_text" id="<?php echo $prefix;?>locker_tw_tweet_text" value="<?php echo sscl_get_text_value(get_the_ID(),$prefix.'locker_tw_tweet_text','')?>" />
					<i><?php _e('Type a message to tweet. Leave this field empty to use default tweet (page title + URL). Also you can use the shortcode [post_title] in order to insert automatically a post title into the tweet.','super-social-content-locker')?></i>
				</div>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('Via','super-social-content-locker')?></label>
				<div class="control-input">            
					<input type="text" class="textfield" name="<?php echo $prefix;?>locker_tw_tweet_via" id="<?php echo $prefix;?>locker_tw_tweet_via" value="<?php echo sscl_get_text_value(get_the_ID(),$prefix.'locker_tw_tweet_via','')?>" />
					<i><?php _e('Optional. Screen name of the user to attribute the Tweet to (without @).','super-social-content-locker')?></i>
				</div>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('Button title','super-social-content-locker')?></label>
				<div class="control-input">            
					<input type="text" class="textfield" name="<?php echo $prefix;?>locker_tw_tweet_button_text" id="<?php echo $prefix;?>locker_tw_tweet_button_text" value="<?php echo sscl_get_text_value(get_the_ID(),$prefix.'locker_tw_tweet_button_text','')?>" />
					<i><?php _e('Optional. A title of the button that is situated on the covers in the themes.','super-social-content-locker')?></i>
				</div>
			</div>
		</div>
		<div id="tabs-5">
            <div class="infobox critical">
				<?php esc_html_e('Note: Google had disable this feature so this feature might not work properly.','super-social-content-locker')?>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('Available','super-social-content-locker')?></label>
				<div class="control-input"> 
					<label class="switch">
						<input type="checkbox" name="<?php echo $prefix;?>gshare_locker" id="<?php echo $prefix;?>gshare_locker" <?php echo sscl_get_checkbox_value(get_the_ID(),$prefix.'gshare_locker','')?>>
						<span class="slider round"></span>
					</label>
				</div>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('URL to share','super-social-content-locker')?></label>
				<div class="control-input">            
					<input type="text" class="textfield" name="<?php echo $prefix;?>locker_gshare_url" id="<?php echo $prefix;?>locker_gshare_url" value="<?php echo sscl_get_text_value(get_the_ID(),$prefix.'locker_gshare_url','')?>" />
					<i><?php _e('Set an URL which the user has to share in order to unlock your content. Leave this field empty to use an URL of the page where the locker will be located.','super-social-content-locker')?></i>
				</div>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('Button title','super-social-content-locker')?></label>
				<div class="control-input">            
					<input type="text" class="textfield" name="<?php echo $prefix;?>locker_gshare_button_text" id="<?php echo $prefix;?>locker_gshare_button_text" value="<?php echo sscl_get_text_value(get_the_ID(),$prefix.'locker_gshare_button_text','')?>" />
					<i><?php _e('Optional. A title of the button that is situated on the covers in the themes.','super-social-content-locker')?></i>
				</div>
			</div>
		</div>
		<div id="tabs-6">
            <div class="infobox success">
				<?php esc_html_e('Note: Youtube Subscribes Works Perfectly.','super-social-content-locker')?>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('Available','super-social-content-locker')?></label>
				<div class="control-input"> 
					<label class="switch">
						<input type="checkbox" name="<?php echo $prefix;?>yt_locker" id="<?php echo $prefix;?>yt_locker" disabled>
						<span class="slider round"></span>
					</label>
				</div>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('Channel ID','super-social-content-locker')?></label>
				<div class="control-input">            
					<input type="text" class="textfield" name="<?php echo $prefix;?>locker_yt_channel_id" id="<?php echo $prefix;?>locker_yt_channel_id" value="<?php echo sscl_get_text_value(get_the_ID(),$prefix.'locker_yt_channel_id','')?>" disabled="disabled" />
					<i><?php _e('Set a channel ID to subscribe (for example, UCzgHknhVZ_4COC5xPAB8Iww). <span class="locker_social_pro"><a href="https://bit.ly/2YN2W8i" target="_blank">(Pro Feature)</a></span>','super-social-content-locker')?></i>
				</div>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('Button title','super-social-content-locker')?></label>
				<div class="control-input">            
					<input type="text" class="textfield" name="<?php echo $prefix;?>locker_yt_button_text" id="<?php echo $prefix;?>locker_yt_button_text" value="<?php echo sscl_get_text_value(get_the_ID(),$prefix.'locker_yt_button_text','')?>" disabled="disabled" />
					<i><?php _e('Optional. A title of the button that is situated on the covers in the themes. <span class="locker_social_pro"><a href="https://bit.ly/2YN2W8i" target="_blank">(Pro Feature)</a></span>','super-social-content-locker')?></i>
				</div>
			</div>
		</div>
		<div id="tabs-7">
            <div class="infobox success">
				<?php esc_html_e('Note: Linkedin Shares Works Perfectly.','super-social-content-locker')?>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('Available','super-social-content-locker')?></label>
				<div class="control-input"> 
					<label class="switch"> 
						<input type="checkbox" name="<?php echo $prefix;?>ln_locker" id="<?php echo $prefix;?>ln_locker" disabled>
						<span class="slider round"></span>
					</label>
				</div>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('URL to share','super-social-content-locker')?></label>
				<div class="control-input">            
					<input type="text" class="textfield" name="<?php echo $prefix;?>locker_ln_url" id="<?php echo $prefix;?>locker_ln_url" value="<?php echo sscl_get_text_value(get_the_ID(),$prefix.'locker_ln_url','')?>" disabled="disabled" />
					<i><?php _e('Set an URL which the user has to share in order to unlock your content. Leave this field empty to use an URL of the page where the locker will be located. <span class="locker_social_pro"><a href="https://bit.ly/2YN2W8i" target="_blank">(Pro Feature)</a></span>','super-social-content-locker')?></i>
				</div>
			</div>
			<div class="sscl-panel-div">
				<label for="width"><?php _e('Button title','super-social-content-locker')?></label>
				<div class="control-input">            
					<input type="text" class="textfield" name="<?php echo $prefix;?>locker_ln_button_text" id="<?php echo $prefix;?>locker_ln_button_text" value="<?php echo sscl_get_text_value(get_the_ID(),$prefix.'locker_ln_button_text','')?>" disabled="disabled" />
					<i><?php _e('Optional. A title of the button that is situated on the covers in the themes. <span class="locker_social_pro"><a href="https://bit.ly/2YN2W8i" target="_blank">(Pro Feature)</a></span>','super-social-content-locker')?></i>
				</div>
			</div>
		</div>	
	</div>
		<input type="hidden" name="codetides_social_tabs_sort_order" id="codetides_social_tabs_sort_order" value="" />
</div>