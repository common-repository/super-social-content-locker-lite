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
		<?php esc_html_e('Hint: Update or save content locker to see the preivew.','super-social-content-locker')?>
	</div>	

    <!-- Box 3 -->
    <div class="box-three" id="theme1" style="<?php if (1==sscl_get_text_value(get_the_ID(),$prefix.'locker_theme','1')) {?> display:block; <?php } ?>">
      <div class="three"> </div>
      <h3><i class="fa fa-lock" aria-hidden="true"></i> <?php echo sscl_get_text_value(get_the_ID(),$prefix.'locker_heading','')?> <i class="fa fa-lock" aria-hidden="true"></i></h3>
      <p><?php echo sscl_get_text_value(get_the_ID(),$prefix.'locker_description','')?></p>
      <div class="button-holder"> 
        
		<?php 
			$codetides_locker_feature = sscl_get_text_value(get_the_ID(),$prefix.'locker_feature','');
			switch($codetides_locker_feature){
				case 1;
					echo sscl_generate_social_buttons(sscl_get_checkbox_enable(get_the_ID(),$prefix.'fb_like_locker',''), 'Stylish Grey','fblike', 'fb',sscl_get_text_value(get_the_ID(),$prefix.'locker_fb_button_text','') );
					echo sscl_generate_social_buttons(sscl_get_checkbox_enable(get_the_ID(),$prefix.'fb_share_locker',''), 'Stylish Grey','fbshare', 'fb',sscl_get_text_value(get_the_ID(),$prefix.'locker_fb_share_text','') );
					echo sscl_generate_social_buttons(sscl_get_checkbox_enable(get_the_ID(),$prefix.'tw_follow_locker',''), 'Stylish Grey','twfollow', 'tw',sscl_get_text_value(get_the_ID(),$prefix.'locker_tw_follow_button_text','') );
					echo sscl_generate_social_buttons(sscl_get_checkbox_enable(get_the_ID(),$prefix.'tw_tweet_locker',''), 'Stylish Grey','twtweet', 'tw',sscl_get_text_value(get_the_ID(),$prefix.'locker_tw_tweet_button_text','') );
					echo sscl_generate_social_buttons(sscl_get_checkbox_enable(get_the_ID(),$prefix.'gshare_locker',''), 'Stylish Grey','gshare', 'gp',sscl_get_text_value(get_the_ID(),$prefix.'locker_gshare_button_text','') );
				break;				
				default;
                    esc_html_e('Please select social feature to display social view','super-social-content-locker');					
					break;
			}							
	  ?>	
		
		
      </div>
    </div>
    <!-- /End Box 3 --> 
</div>