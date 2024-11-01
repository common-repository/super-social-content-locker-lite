<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.codetides.com/
 * @since      1.1.0
 *
 * @package    Super Social Content Locker
 * @subpackage /admin/functions
 */
 
 		
	function sscl_get_text_value($id, $input_name, $default_value='')
	{
		if(get_post_meta( $id, $input_name, true )!="")
			return get_post_meta( $id, $input_name, true );
		else
			return $default_value;
	}	
	function sscl_get_checkbox_value($id, $input_name)
	{
		if(get_post_meta( $id, $input_name, true )=="on")
			return 'checked="checked"';
		else
			return "";
	}
	function sscl_get_checkbox_enable($id, $input_name)
	{
		if(get_post_meta( $id, $input_name, true )=="on")
			return '1';
		else
			return "";
	}
	
	function sscl_generate_social_buttons($status,$theme,$btntype,$cls,$txt,$icon=null){
		$themes =  array('Basic Slim'=>'1','Common Grey'=>'2','Stylish Grey'=>'3','Stylish Dark'=>'4' );
		if($status==1){
			switch ($themes[$theme]){				
				case 3;
				return '
					<div class="button-out'.$themes[$theme].'"><i class="fa fa-'.$icon.'" aria-hidden="true"></i>
				  <div class="btn btn'.$themes[$theme].' '.$cls.'">
					<div class="button-inner inner'.$themes[$theme].'">'.$txt.'</div>
					<div>
				  <a href="javascript:void(0);"><img src="'.plugin_dir_url( __FILE__ ).'images/'.$btntype.'.png" alt="" style="vertical-align: middle;"></a> 
				  </div>
				  </div>
				</div>				
				';
				break;				
			}
			
		}
	}
?>