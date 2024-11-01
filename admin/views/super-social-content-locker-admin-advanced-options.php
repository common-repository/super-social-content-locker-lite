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
        <label for="width"><?php _e('UnLock Content','super-social-content-locker')?><br><?php _e('(offer some thing as reward to unlock content)','super-social-content-locker')?></label>
        <div class="control-input" style="margin-left:10px;">           
            <?php      
				$args = array('textarea_rows' => 25, 'editor_height' => 425,'teeny' => true,'quicktags' => true,'media_buttons' => true,);
                wp_editor( sscl_get_text_value(get_the_ID(), $prefix.'locker_unlock_content','Congrats you did it, Please download pdf from link below.<br>http://www.google.com') , $prefix.'locker_unlock_content', $args );
            ?>
            <i><?php _e('Unlock Content can be anything, text message or string, pdf document or software download link','super-social-content-locker')?></i>
        </div>
    </div>   
</div>