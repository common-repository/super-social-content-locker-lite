<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.codetides.com/
 * @since      1.0.0
 *
 * @package    Super_Social_Content_Locker_Lite
 * @subpackage Super_Social_Content_Locker_Lite/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Super_Social_Content_Locker_Lite
 * @subpackage Super_Social_Content_Locker_Lite/public
 * @author     CodeTides <codetides@gmail.com>
 */
class Super_Social_Content_Locker_Lite_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Super_Social_Content_Locker_Lite_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Super_Social_Content_Locker_Lite_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/super-social-content-locker-lite-public.css', array(), $this->version, 'all' );
		wp_enqueue_style('fontawesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',array(),$this->version, 'all');		
		wp_enqueue_style('theme-style',plugin_dir_url( __FILE__ ) .'css/theme-style.css',array(),$this->version, 'all');

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Super_Social_Content_Locker_Lite_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Super_Social_Content_Locker_Lite_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_register_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/super-social-content-locker-lite-public.js', array( 'jquery' ), $this->version, false );
		$data = array( 'ajax_url' => admin_url('admin-ajax.php') );
		wp_localize_script( $this->plugin_name, 'my_ajax_object', $data );
		wp_enqueue_script( $this->plugin_name );
		
	}
	
	public function display_content_locker_shortcodes(){        
        
        add_shortcode("sscl", array( $this,"display_sscl_shortcode") );
		
    }
	
	public function display_sscl_shortcode($atts){
		extract( shortcode_atts( array(
				//your options
		), $atts ) );
		
		$sscl_id = $atts['id']; 
	   
	   $sscl_post_type = get_post_type( $sscl_id );
	   $sscl_post_status = get_post_status( $sscl_id );
	   if($sscl_post_type !="ct_sscl")
			return;
	   if($sscl_post_status !="publish")
			return;
		
	   $sscl_theme = get_post_meta( $sscl_id, 'codetides_locker_theme', true );
		
		$themes = array(
		   '1'=>'Basic Slim'
		);
		
		$theme_name = isset($themes[$sscl_theme]) ? $themes[$sscl_theme] : null;
		$theme_file = get_theme_path($theme_name);
		
		$locker_type = get_post_meta( $sscl_id, 'codetides_locker_type', true );
		if($locker_type==3){
			return $this->codetides_generate_theme($sscl_theme,$sscl_id,$locker_type);
			exit;
		}
	}
	public function codetides_generate_theme($theme_id,$locker_id, $locker_type){		
		
		$chk_key_locker_views_count = get_post_meta($locker_id, 'codetides_locker_views', TRUE);
		if($chk_key_locker_views_count == '') {
				add_post_meta($locker_id, 'codetides_locker_views', 1);
		}
		else{
			update_post_meta($locker_id, 'codetides_locker_views', $chk_key_locker_views_count+1);
		}
		
		
		$post_ip = $_SERVER['REMOTE_ADDR'];
		$key_locker = 'codetides_sscl_locker_'.$post_ip;
		$chk_key_locker = get_post_meta(get_the_ID(), $key_locker, TRUE);		
		
		$unlocker_css = (isset($chk_key_locker) && $chk_key_locker==1) ? 'style="display:block;"' : 'style="display:none;"';
		$locker_css = (isset($chk_key_locker) && $chk_key_locker==1) ? 'style="display:none;"' : 'style="display:block;"';
		
		$output_theme = '<div class="codetides_sscl_container" id="theme'.$theme_id.'-locker'.$locker_id.'" '.$locker_css.'>';		
			$output_theme .= '<div class="'.$this->codetides_get_theme_box_class($theme_id).'">';
				$output_theme .= '<div class="'.$this->codetides_get_theme_no_name($theme_id).'"></div>';
				$output_theme .= '<h3><i class="fa fa-lock" aria-hidden="true"></i> '.$this->codetides_get_locker_heading($locker_id).' <i class="fa fa-lock" aria-hidden="true"></i></h3>';				
				$output_theme .= '<div class="desc">'.$this->codetides_get_locker_description($locker_id).'</div>';
				$output_theme .= '<div class="content-holder">';
					$output_theme .= $this->codetides_sscl_generate_locker_content($locker_id,$theme_id);
				$output_theme .= '</div>';
			$output_theme .= '</div>';
		$output_theme .= '</div>';
		
		$output_unlock_content = '<div class="codetides_sscl_container_unlock" id="unlock_theme'.$theme_id.'-locker'.$locker_id.'" '.$unlocker_css.'>';
			$output_unlock_content .= $this->codetides_sscl_generate_locker_unlock_content($locker_id,$theme_id,$locker_type);
		$output_unlock_content .= '</div>';
		if($chk_key_locker == '') {
			return $output_theme.$output_unlock_content;
		}
		else{
			return $output_theme.$output_unlock_content;
		}
	}
	public function codetides_get_theme_box_class($theme_id){
		
		switch($theme_id){
			case 1;
				return "box-basic-slim";
				break;
			case 2;
				return "box-common-grey";
				break;
			case 3;
				return "box-stylish-grey";
				break;
			case 4;
				return "box-stylish-dark dark";
				break;		
			default:
				return "box-basic-slim";
				break;		
		}
		
	}
	public function codetides_get_theme_no_name($theme_id){
		
		switch($theme_id){
			case 1;
				return "basic-slim";
				break;
			case 2;
				return "common-grey";
				break;
			case 3;
				return "stylish-grey";
				break;
			case 4;
				return "stylish-dark";
				break;		
			default:
				return "basic-slim";
				break;		
		}
		
	}
	public function codetides_get_locker_heading($post_id){
		return get_post_meta($post_id,'codetides_locker_heading',true);
	}
	
	public function codetides_get_locker_description($post_id){
		return get_post_meta($post_id,'codetides_locker_description',true);
	}
	public function codetides_sscl_generate_locker_unlock_content($post_id,$theme_id,$locker_type){
	
		if($locker_type==3){
			$key = "codetides_locker_unlock_content";
		}
		return $this->codetides_sscl_get_text_value($post_id, $key, '');
	}
	public function codetides_sscl_generate_locker_content($post_id,$theme_id){
		$locker_feature = $this->codetides_sscl_get_text_value($post_id, 'codetides_locker_feature');
		
		switch($locker_feature){
			case 1;
				return $this->codetides_generate_buttons($post_id,$theme_id);
				break;
			default:
				return "basic-slim";
				break;		
		}
		
	}
	public function codetides_generate_buttons($post_id,$theme_id){
		//echo $theme_id;
		$buttons_active = $this->codetides_get_buttons_with_order($post_id);
		
		$btns_output = '<div class="button-holder">';
		foreach($buttons_active as $btnvalues){
			$btns_output .= $this->codetides_get_social_buttons($post_id,$theme_id,$btnvalues);
			//echo $btnvalues;		
		}		
		$btns_output .= '</div>';
		return $btns_output;
		
	}
	public function codetides_get_buttons_with_order($locker_id){
		$sorted_array = array();
		$social_tabs_order = get_post_meta( $locker_id, "codetides_social_tabs_sort_order", true );
		
		$social_default_tabs_id = array(
			'fblike'=>'codetides_fb_like_locker',
            'fbshare'=>'codetides_fb_share_locker',				
			'twfollow'=>'codetides_tw_follow_locker',
			'twtweet'=>'codetides_tw_tweet_locker',			
		);
		if(!empty($social_tabs_order)){
			$social_tabs_order = str_replace('tab[]=','',$social_tabs_order);
			$social_tabs_order_array = explode('&',$social_tabs_order);
			
			foreach($social_tabs_order_array as $tabsorder)
			{
				foreach($social_default_tabs_id as $key => $tabs)
				{
					if($tabsorder == $key)
					{
						if(get_post_meta( $locker_id, $tabs, true )=="on"){
							$sorted_array[] = $key;
						}
						
					}
				}
			}
		}
		return $sorted_array;
		
		
	}
	public function codetides_get_social_buttons($locker_id,$theme_id,$btnvalues){
		
		switch ($btnvalues){
				case 'fblike';
					return $this->sscl_generate_social_buttons($this->codetides_sscl_get_checkbox_enable($locker_id,'codetides_fb_like_locker',''), $theme_id, $locker_id ,'fblike', 'fb',$this->codetides_sscl_get_text_value($locker_id,'codetides_locker_fb_button_text','') );
					break;
                case 'fbshare';
					return $this->sscl_generate_social_buttons($this->codetides_sscl_get_checkbox_enable($locker_id,'codetides_fb_share_locker',''), $theme_id, $locker_id ,'fbshare', 'fb',$this->codetides_sscl_get_text_value($locker_id,'codetides_locker_fb_share_text','') );
					break;    
				case 'twfollow';
					return $this->sscl_generate_social_buttons($this->codetides_sscl_get_checkbox_enable($locker_id,'codetides_tw_follow_locker',''), $theme_id, $locker_id ,'twfollow', 'tw',$this->codetides_sscl_get_text_value($locker_id,'codetides_locker_tw_follow_button_text','') );
					break;
				case 'twtweet';
					return $this->sscl_generate_social_buttons($this->codetides_sscl_get_checkbox_enable($locker_id,'codetides_tw_tweet_locker',''), $theme_id, $locker_id ,'twtweet', 'tw',$this->codetides_sscl_get_text_value($locker_id,'codetides_locker_tw_tweet_button_text','') );
					break;					
			}
	}
	public	function sscl_generate_social_buttons($status,$theme, $locker_id,$btntype,$cls,$txt,$icon=null){		
		$themes =  array('Basic Slim'=>'1','Common Grey'=>'2','Stylish Grey'=>'3','Stylish Dark'=>'4' );
		
		
		
		$social_icons = array(
			'fb'=>'facebook',
			'tw'=>'twitter',
			
		);
		if($status==1){
			
			switch ($theme){
				case 1;
				return '
					<div class="button-out'.$theme.'">'.( ($theme==1) ? '<i class="fa fa-'.$social_icons[$cls].'" aria-hidden="true"></i>' : '' ).'
					  <div class="sscl_btn_sn btn'.$theme.' '.$cls.'">
						<div class="button-inner inner'.$theme.'">'.$txt.'</div>
						<div>'.$this->codetides_load_social_button($btntype,$theme,$locker_id).'</div></div>
					</div>
				';
				break;
			}
			
		}
		
		
		
		
	}
		public function codetides_sscl_get_text_value($id, $input_name, $default_value='')
	{
		if(get_post_meta( $id, $input_name, true )!="")
			return get_post_meta( $id, $input_name, true );
		else
			return $default_value;
	}	
	public function codetides_sscl_get_checkbox_value($id, $input_name)
	{
		if(get_post_meta( $id, $input_name, true )=="on")
			return 'checked="checked"';
		else
			return "";
	}
	public function codetides_sscl_get_checkbox_enable($id, $input_name)
	{
		if(get_post_meta( $id, $input_name, true )=="on")
			return '1';
		else
			return "";
	}
	public function codetides_load_social_button($btntype, $theme_id=NULL, $locker_id=NULL){
		
		switch ($btntype){
			case 'fblike';
				return $this->codetides_get_fb_like_button($locker_id);
				break;
			case 'fbshare';
				return $this->codetides_get_fb_share_button($locker_id);
				break;
			case 'twfollow';
				return $this->codetides_get_tw_follow_button($locker_id);
				break;	
			case 'twtweet';
				return $this->codetides_get_tw_tweet_button($locker_id);
				break;
			case 'gshare';
				return '';
				break;
			case 'yt';
				return $this->codetides_get_yt_subscribe_button($locker_id);
				break;
			case 'ln';
				//return '';
				return $this->codetides_get_ln_share_button($theme_id,$locker_id);
				break;		
		}
		
	}
	public function codetides_get_fb_like_button($locker_id){
		$facebook_like_url = $this->codetides_sscl_get_text_value($locker_id,'codetides_locker_fb_url_to_like');
		return '<div id="fb-root"></div>
<script>  

window.fbAsyncInit = function () {
            FB.init({
                appId: "'.$this->options_app_settings['ct_sscl_facebook_app_id'].'", 
                status: false,
                cookie: false, 
                xfbml: true
            });			
            //Additional
            FB.Event.subscribe("edge.create",
                        function (response) {
                            var plg_ajax_admin_url = my_ajax_object.ajax_url;
				var user_ip = "'.$_SERVER['REMOTE_ADDR'].'";
		var post_id = "'.get_the_ID().'";
		var post_locker_id =  "'.$locker_id.'";
							jQuery.post(
											plg_ajax_admin_url, 
											{
												action:"getFacebookLikeUnlockContent",
												data:{post_id: post_id, post_locker_id: post_locker_id}
											}, 
												function(jsontext){
													var json = JSON.parse(jsontext);
													//alert(json.unlock);
													if(json.unlock==1){
				jQuery(".codetides_sscl_container").hide();
				jQuery(".codetides_sscl_container_unlock").fadeIn();
				return false;
				}
												});
							
							
                        }
                 );
        };
        // Asynchronously
        (function (d) {
            var js, id = "facebook-jssdk", ref = d.getElementsByTagName("script")[0];
            if (d.getElementById(id)) { return; }
            js = d.createElement("script"); js.id = id; js.async = true;
            js.src = "https://connect.facebook.net/en_US/all.js";
            ref.parentNode.insertBefore(js, ref);
        } (document));

    </script>
<div class="fb-like" data-href="'.$facebook_like_url.'" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>';
	}
    
    public function codetides_get_fb_share_button($locker_id){
		
		return '<img onclick="shareonfacebook_'.get_the_ID().'();" style="cursor:pointer" src="'.plugins_url('images/fbshare.png', __FILE__).'">
			<div id="fb-root"></div>
			<script src="https://connect.facebook.net/en_US/all.js"></script>
			<script type="text/javascript">
							FB.init({appId: "'.$this->options_app_settings['ct_sscl_facebook_app_id'].'", status: true, cookie: true});
							function shareonfacebook_'.get_the_ID().'() {
								
								FB.ui(
							   {  
								 method: "feed",
								 name: "",
								 link: "'.get_permalink(get_the_ID()).'",								
								 caption: "'.get_the_title(get_the_ID()).'",
								 description: ""
							   },
							   function(response) {
								 if (response) {
								  
								   var user_ip = "'.$_SERVER['REMOTE_ADDR'].'";
		var post_id = "'.get_the_ID().'";
		var post_locker_id =  "'.$locker_id.'";
									jQuery.post(
											"'.site_url().'/wp-admin/admin-ajax.php", 
											{
												action:"getFacebookShareUnlockContent",
												data:{post_id: post_id, post_locker_id: post_locker_id}
											}, 
												function(jsontext){
													var json = JSON.parse(jsontext);
													
													if(json.unlock==1){
													if(typeof ssclpopup !== "undefined" && ssclpopup==true){
														jQuery(".mfp-close").trigger("click");
													}
				window.parent.document.getElementsByClassName("codetides_sscl_container")[0].style.display = "none";
							window.parent.document.getElementsByClassName("codetides_sscl_container_unlock")[0].style.display = "block";
				return false;
				}
												});
								 } else {								   
								 }
							   }
							 );
								
								
								}
							</script>
		';
		
	}
    
	public function codetides_get_tw_follow_button($locker_id){
		$twitter_follow_url = $this->codetides_sscl_get_text_value($locker_id,'codetides_locker_tw_url_to_follow');
		return '<a class="twitter-follow-button" href="'.$twitter_follow_url.'" data-show-count="true" data-show-screen-name="false" target="_newwin">Follow</a>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>

<script type="text/javascript">
twttr.ready(function (twttr) {
	var plg_ajax_admin_url = my_ajax_object.ajax_url;
    twttr.events.bind(\'follow\', function (event) {
       
	   var user_ip = "'.$_SERVER['REMOTE_ADDR'].'";
		var post_id = "'.get_the_ID().'";
		var post_locker_id =  "'.$locker_id.'";
		jQuery.post(
		plg_ajax_admin_url, 
		{
			action:"getTwitterFollowUnlockContent",
			data:{post_id: post_id, post_locker_id: post_locker_id}
		}, 
		function(jsontext){
			var json = JSON.parse(jsontext);
			if(json.unlock==1){
				jQuery(".codetides_sscl_container").hide();
				jQuery(".codetides_sscl_container_unlock").fadeIn();
				return false;
			}
		});
	   
    });
});
</script>';
	}
	public function codetides_get_tw_tweet_button($locker_id){
		$twitter_tweet_url = $this->codetides_sscl_get_text_value($locker_id,'codetides_locker_tw_url_to_tweet');
		$twitter_tweet_url = ( isset($twitter_tweet_url) ? $twitter_tweet_url : get_the_permalink(get_the_ID()) );
		
		$twitter_tweet_via = $this->codetides_sscl_get_text_value($locker_id,'codetides_locker_tw_tweet_via');
		$twitter_tweet_via = ( isset($twitter_tweet_via) ? "&via=". $twitter_tweet_via : "");
		$twitter_tweet_text = $this->codetides_sscl_get_text_value($locker_id,'codetides_locker_tw_tweet_text');
		
		if($twitter_tweet_text=="" || $twitter_tweet_text=="[post_title]"){
			$twitter_tweet_text = "url=".$twitter_tweet_url."&text=".get_the_title(get_the_ID()) . $twitter_tweet_via;
		}
		else{
			$twitter_tweet_text = "url=".$twitter_tweet_url."&text=".$twitter_tweet_text . $twitter_tweet_via;
		}
		
		
		return '
		<a href="https://twitter.com/intent/tweet?'.$twitter_tweet_text.'" class="twitter-share-button" target="_newwin">Tweet</a>
<script type="text/javascript" src="https://platform.twitter.com/widgets.js"></script>


<script type="text/javascript">
twttr.ready(function(twttr) {
   var plg_ajax_admin_url = my_ajax_object.ajax_url;
    twttr.events.bind("tweet", function(event) {
        //add ur post tweet stuff here 
        console.log("tweet");
		var user_ip = "'.$_SERVER['REMOTE_ADDR'].'";
		var post_id = "'.get_the_ID().'";
		var post_locker_id =  "'.$locker_id.'";
		jQuery.post(
		plg_ajax_admin_url,
		{
			action:"getTwitterShareUnlockContent",
			data:{post_id: post_id, post_locker_id: post_locker_id}
		}, 
		function(jsontext){
			var json = JSON.parse(jsontext);
			if(json.unlock==1){
				jQuery(".codetides_sscl_container").hide();
				jQuery(".codetides_sscl_container_unlock").fadeIn();
				return false;
			}
		});
    });

});


</script>
		';
	}
	public function getFacebookLikeUnlockContent() {
		extract($_POST);
		$post_ip = $_SERVER['REMOTE_ADDR'];
		$key = 'codetides_sscl_facebook_like_'.$post_ip;
		
		$chk_key = get_post_meta($data['post_id'], $key, TRUE);
		if($chk_key == '') {
				add_post_meta($data['post_id'], $key, 1);
		}
		$key_locker = 'codetides_sscl_locker_'.$post_ip;
		$chk_key_locker = get_post_meta($data['post_id'], $key_locker, TRUE);		
		if($chk_key_locker == '') {
			add_post_meta($data['post_id'], $key_locker, 1);
		}
		if($chk_key == '') {
			$arr = array('unlock' => 0);
		}
		else{
			$arr = array('unlock' => 1);
		}
		$this->codetides_total_locker_convert($data['post_locker_id']);
		echo json_encode($arr);				
		die;
	}
    public function getFacebookShareUnlockContent() {
		extract($_POST);
		$post_ip = $_SERVER['REMOTE_ADDR'];
		$key = 'codetides_sscl_facebook_share_'.$post_ip;
		$chk_key = get_post_meta($data['post_id'], $key, TRUE);
		if($chk_key == '') {
				add_post_meta($data['post_id'], $key, 1);
				$chk_key = 1;
		}
		$key_locker = 'codetides_sscl_locker_'.$post_ip;
		$chk_key_locker = get_post_meta($data['post_id'], $key_locker, TRUE);		
		if($chk_key_locker == '') {
			add_post_meta($data['post_id'], $key_locker, 1);
		}
		if($chk_key == '') {
			$arr = array('unlock' => 0);
		}
		else{
			$arr = array('unlock' => 1);
		}
		$this->codetides_total_locker_convert($data['post_locker_id']);
		echo json_encode($arr);				
		die;
	}
	public function getTwitterFollowUnlockContent() {
		extract($_POST);
		$post_ip = $_SERVER['REMOTE_ADDR'];
		$key = 'codetides_sscl_twitter_follow_'.$post_ip;
		$chk_key = get_post_meta($data['post_id'], $key, TRUE);
		if($chk_key == '') {
				add_post_meta($data['post_id'], $key, 1);
		}
		$key_locker = 'codetides_sscl_locker_'.$post_ip;
		$chk_key_locker = get_post_meta($data['post_id'], $key_locker, TRUE);		
		if($chk_key_locker == '') {
			add_post_meta($data['post_id'], $key_locker, 1);
		}
		if($chk_key == '') {
			$arr = array('unlock' => 0);
		}
		else{
			$arr = array('unlock' => 1);
		}
		$this->codetides_total_locker_convert($data['post_locker_id']);
		echo json_encode($arr);				
		die;
	}
	public function getTwitterShareUnlockContent() {
		extract($_POST);
		$post_ip = $_SERVER['REMOTE_ADDR'];
		$key = 'codetides_sscl_twitter_share_'.$post_ip;
		$chk_key = get_post_meta($data['post_id'], $key, TRUE);
		if($chk_key == '') {
				add_post_meta($data['post_id'], $key, 1);
		}
		$key_locker = 'codetides_sscl_locker_'.$post_ip;
		$chk_key_locker = get_post_meta($data['post_id'], $key_locker, TRUE);		
		if($chk_key_locker == '') {
			add_post_meta($data['post_id'], $key_locker, 1);
		}
		if($chk_key == '') {
			$arr = array('unlock' => 0);
		}
		else{
			$arr = array('unlock' => 1);
		}
		$this->codetides_total_locker_convert($data['post_locker_id']);
		echo json_encode($arr);				
		die;
	}
	public function codetides_total_locker_convert($locker_id){
		$chk_key_locker_count = get_post_meta($locker_id, 'codetides_sscl_total_convert', TRUE);
		if($chk_key_locker_count == '') {
				add_post_meta($locker_id, 'codetides_sscl_total_convert', 1);
		}
		else{
			update_post_meta($locker_id, 'codetides_sscl_total_convert', $chk_key_locker_count+1);
		}
	}
}
