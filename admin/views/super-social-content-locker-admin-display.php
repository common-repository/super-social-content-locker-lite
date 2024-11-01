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
        <label for="width"><?php _e('Locker Heading','super-social-content-locker')?></label>
        <div class="control-input">            
        	<input type="text" class="textfield" name="<?php echo $prefix;?>locker_heading" id="<?php echo $prefix;?>locker_heading" value="<?php echo sscl_get_text_value(get_the_ID(),$prefix.'locker_heading','')?>" />
            <i><?php _e('Add some Heading to your locker which attracts attention or calls to action. You can leave this field empty.','super-social-content-locker')?></i>
        </div>
    </div>
    <div class="sscl-panel-div">
        <label for="width"><?php _e('Locker Description','super-social-content-locker')?></label>
        <div class="control-input">           
            <?php      
				$args = array('textarea_rows' => 22,'teeny' => true,'quicktags' => true,'media_buttons' => true,);
                wp_editor( sscl_get_text_value(get_the_ID(),$prefix.'locker_description','') , $prefix.'locker_description', $args );
            ?>
            <i><?php _e('Add some description about your content locker','super-social-content-locker')?></i>
        </div>
    </div>
    <div class="sscl-panel-div">
        <label for="width"><?php _e('Locker Theme','super-social-content-locker')?></label>
        <div class="control-radio" style="display: block;">
			<?php
				$disabled_opt = array(1);	
                $options = array(
                    '1'=>'Basic Slim',
                    '2'=>'Common Grey <span class="locker_type_pro"><a href="https://bit.ly/2YN2W8i" target="_blank">(Pro Feature)</a></span>',
					'3'=>'Stylish Grey <span class="locker_type_pro"><a href="https://bit.ly/2YN2W8i" target="_blank">(Pro Feature)</a></span>',
					'4'=>'Stylish Dark <span class="locker_type_pro"><a href="https://bit.ly/2YN2W8i" target="_blank">(Pro Feature)</a></span>',
                );
                foreach($options as $key => $value) { 
                ?>
				<div class="4col">
                <label><input type="radio" name="<?php echo $prefix;?>locker_theme" value="<?php echo $key;?>" <?php if ($key==1) {?> checked="checked" <?php } ?> <?php if(!in_array($key, $disabled_opt)) { ?> disabled <?php } ?> /><?php echo $value;?></label>
                </div>
				<?php } ?>						
        </div>
        <i style="display: block;overflow: auto;clear: both;margin-left: 22%;"><?php _e('Select theme for your locker','super-social-content-locker')?></i>
    </div>	
</div>