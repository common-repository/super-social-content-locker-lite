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
	<div class="sscl-panel-div">
		<label for="width"><?php _e('Locker Type','super-social-content-locker')?></label>
        <div class="control-radio">
         <?php
				$disabled_opt = array(1,2);				
                $options = array(
                    '1'=>'Popup Overlay <div class="dragicon"><div class="tooltip">Display locker as popup in any page inside your website</div>?</div><br><span class="locker_type_pro"><a href="https://bit.ly/2YN2W8i" target="_blank">(Pro Feature)</a></span>',
                    '2'=>'Premium Content Locker <div class="dragicon"><div class="tooltip">Display some text paragraph and rest of the text will visible after using unlock feature as premium content</div>?</div><br><span class="locker_type_pro"><a href="https://bit.ly/2YN2W8i" target="_blank">(Pro Feature)</a></span>',
					'3'=>'Exchange Locker <div class="dragicon"><div class="tooltip">Offer something as give and take in order to use unlock feature</div>?</div>',
                );
                foreach($options as $key => $value) {
						
                ?>                
				<label><input type="radio" name="<?php echo $prefix;?>locker_type" value="<?php echo $key;?>" <?php if ($key==sscl_get_text_value(get_the_ID(), $prefix.'locker_type' ,'3')) {?> checked="checked" <?php } ?> <?php if(in_array($key, $disabled_opt)) { ?> disabled <?php } ?> /><?php echo $value;?></label>
				
                <?php } ?>
				
        </div>
		<i><?php _e('(Set a locker type to load as)','super-social-content-locker')?></i>
	
	 </div>
	 
	 <div class="sscl-panel-div">
		<label for="width"><?php _e('Locker Feature','super-social-content-locker')?></label>
        <div class="control-radio">
         <?php
				$disabled_opt = array(1);	
                $options = array(
                    '1'=>'Social Share / Follow <div class="dragicon"><div class="tooltip">Helps to increase social media presense with following or sharing</div>?</div>',
                    '2'=>'Form Submission <div class="dragicon"><div class="tooltip">Helps to build email list with couple of other options as form submission</div>?</div> <span class="locker_feature_pro"><a href="https://bit.ly/2YN2W8i" target="_blank">(Pro Feature)</a></span>',
					'3'=>'Video Ads <div class="dragicon"><div class="tooltip">Helps to promote by forcing vistors to watch your video ads</div>?</div> <span class="locker_feature_pro"><a href="https://bit.ly/2YN2W8i" target="_blank">(Pro Feature)</a></span>',
					'4'=>'X Times Vote Gamifications <div class="dragicon"><div class="tooltip">Helps to Engage vistors by xxx times voting</div>?</div> <span class="locker_feature_pro"><a href="https://bit.ly/2YN2W8i" target="_blank">(Pro Feature)</a></span>',
					'5'=>'Rating Widget <div class="dragicon"><div class="tooltip">Helps to authenticate your product with posting review</div>?</div> <span class="locker_feature_pro"><a href="https://bit.ly/2YN2W8i" target="_blank">(Pro Feature)</a></span>',					
					'6'=>'Member Subscription <div class="dragicon"><div class="tooltip">Helps to increase your website members by registering member</div>?</div> <span class="locker_feature_pro"><a href="https://bit.ly/2YN2W8i" target="_blank">(Pro Feature)</a></span>',
                );
                foreach($options as $key => $value) { 
                ?>
				<div class="2col">
                <label><input type="radio" name="<?php echo $prefix;?>locker_feature" value="<?php echo $key;?>" <?php if ($key==1) {?> checked="checked" <?php } ?> <?php if(!in_array($key, $disabled_opt)) { ?> disabled <?php } ?> /><?php echo $value;?></label>
                </div>
				<?php } ?>
        </div>
		<i><?php _e('(offer some thing as reward to unlock content)','super-social-content-locker')?></i>
	
	 </div>
	
</div>
<div id="super-social-content-locker-meta-box-nonce" class="hidden">
	<input type="hidden" id="<?php echo $prefix;?>locker_id" name="<?php echo $prefix;?>locker_id" value="<?php echo get_the_ID();?>" />
  <?php wp_nonce_field( 'super_social_content_locker_save', 'super_social_content_locker_nonce' ); ?>
</div>