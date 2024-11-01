<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.codetides.com/
 * @since      1.1.0
 *
 * @package    Super_Social_Content_Locker_Lite
 * @subpackage Super_Social_Content_Locker_Lite/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Super_Social_Content_Locker_Lite
 * @subpackage Super_Social_Content_Locker_Lite/admin
 * @author     CodeTides <codetides@gmail.com>
 */
class Super_Social_Content_Locker_Lite_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.1.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.1.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.1.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->prefix = "codetides_";
		$this->options = get_option( 'ct_sscl_options' );
        $this->options_app_settings = get_option( 'ct_sscl_options_app_settings' );
        $this->options_header = get_option( 'ct_sscl_options_header' );
        $this->options_reviews = get_option( 'ct_sscl_options_reviews' );
	}

	/**
	 * Register the stylesheets for the admin area.
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

		
		wp_enqueue_style( $this->plugin_name.'-jqueryui', plugin_dir_url( __FILE__ ).'css/jquery-ui.css', array(), $this->version, 'all' );		
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/super-social-content-locker-lite-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'themes-style', plugin_dir_url( __FILE__ ) . 'css/theme-style-admin.css', array(), $this->version, 'all' );		
		wp_enqueue_style( $this->plugin_name.'font-awesome', plugin_dir_url( __FILE__ ) . '../public/css/font-awesome.min.css', array(), $this->version, 'all' );		

		

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name.'jquery-ui', plugin_dir_url( __FILE__ ) .'js/jquery-ui.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/super-social-content-locker-lite-admin.js', array( 'jquery' ), $this->version, true );
		$translation_array = array( 'site_url' => site_url() );
		wp_localize_script( $this->plugin_name, 'sscl_obj', $translation_array );
		
		wp_enqueue_script( $this->plugin_name.'touchHover', plugin_dir_url( __FILE__ ) . 'js/touchHover.js', array( 'jquery' ), $this->version, true );		
	}
	
	public function register_cpt_sscl()
	{
		$labels = array(
            'name'                => _x( 'Super Social Content Locker', 'Post Type General Name', 'super-social-content-locker' ),
            'singular_name'       => _x( 'Super Social Content Locker', 'Post Type Singular Name', 'super-social-content-locker' ),
            'menu_name'           => __( 'Super Social Content Locker', 'super-social-content-locker' ),
            'name_admin_bar'      => __( 'Super Social Content Locker', 'super-social-content-locker' ),
            'parent_item_colon'   => __( 'Parent Super Social Content Locker:', 'super-social-content-locker' ),
            'all_items'           => __( 'All Content Locker', 'super-social-content-locker' ),
            'add_new_item'        => __( 'Add New Super Social Content Locker', 'super-social-content-locker' ),
            'add_new'             => __( 'Add New', 'super-social-content-locker' ),
            'new_item'            => __( 'New Super Social Content Locker', 'super-social-content-locker' ),
            'edit_item'           => __( 'Edit Super Social Content Locker', 'super-social-content-locker' ),
            'update_item'         => __( 'Update Super Social Content Locker', 'super-social-content-locker' ),
            'view_item'           => __( 'View Super Social Content Locker', 'super-social-content-locker' ),
            'search_items'        => __( 'Search Super Social Content Locker', 'super-social-content-locker' ),
            'not_found'           => __( 'Not found', 'super-social-content-locker' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'super-social-content-locker' ),
        );
        $args = array(
            'label'               => __( 'Super Social Content Locker', 'super-social-content-locker' ),
            'description'         => __( 'Flexible Content Locker', 'super-social-content-locker' ),      
			'labels'              => $labels,     
            'supports'            => array('title'),
            'hierarchical'        => false,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 10,
            'menu_icon'           => 'dashicons-admin-site',
            'show_in_admin_bar'   => false,
            'show_in_nav_menus'   => false,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => false,
            'capability_type'     => 'post',
        );
        register_post_type( 'ct_sscl', apply_filters( 'ct_sscl_register_arguments', $args) );
        
	}
	
	 /*
 	* Adds a options details.
	*/
	public function add_cpt_sscl_meta_box() {
		add_meta_box(
			'super_social_content_locker_type',
			__( 'Locker Settings', 'super-social-content-locker' ),
			array($this,'meta_box_print_locker_settings'),
			'ct_sscl'
		);		
		add_meta_box(
			'super_social_content_locker_basic_options',
			__( 'Basic Options', 'super-social-content-locker' ),
			array($this,'meta_box_print_options'),
			'ct_sscl'
		); 
		add_meta_box(
			'super_social_content_locker_advanced_options',
			__( 'Advanced Options - Exchange Locker', 'super-social-content-locker' ),
			array($this,'meta_box_print_advanced_options'),
			'ct_sscl'
		); 
		

		add_meta_box(
			'super_social_content_locker_social_options',
			__( 'Social Options', 'super-social-content-locker' ),
			array($this,'meta_box_print_social_options'),
			'ct_sscl'
		); 
		
		
		add_meta_box(
			'super_social_content_locker_preview',
			__( 'Preview', 'super-social-content-locker' ),
			array($this,'meta_box_print_preview'),
			'ct_sscl'
		); 
		
        add_meta_box(
			'super_social_content_locker_shortcode',
			__( 'Locker Shortcode', 'super-social-content-locker' ),
			array($this,'meta_box_print_shortcode'),
			'ct_sscl','side','core'
		); 
	}
	
	
	/*
	* Prints the box content.
	*/
    
	
	public function meta_box_print_locker_settings( $post ) {
	
		require_once plugin_dir_path( __FILE__ ). 'views/super-social-content-locker-admin-locker-type.php';
	}
	
	public function meta_box_print_options( $post ) {
	
		require_once plugin_dir_path( __FILE__ ). 'views/super-social-content-locker-admin-display.php';
	}
	
	
	
	public function meta_box_print_advanced_options( $post ) {
	
		require_once plugin_dir_path( __FILE__ ). 'views/super-social-content-locker-admin-advanced-options.php';
	}
	
	
	public function meta_box_print_social_options( $post ) {
	
		require_once plugin_dir_path( __FILE__ ). 'views/super-social-content-locker-admin-social-options.php';
	}
	
	
	
	public function meta_box_print_preview( $post ) {
	
		require_once plugin_dir_path( __FILE__ ). 'views/super-social-content-locker-admin-preview.php';
	}
	
	
    public function meta_box_print_shortcode( $post ) {
        
		echo '<input type="text" name="sscl_shortcode" class="sscl_shortcode" value="[sscl ID='.$post->ID.']" readonly />';
	}
    
	public function codetides_generate_social_tab_with_order($id_post){
		$output_tabs = "";
		$social_tabs_order = get_post_meta( $id_post, $this->prefix."social_tabs_sort_order", true );
		$social_default_tabs = array(
			'fblike'=>'<li id="tab_fblike"><a href="#tabs-1" class="fblike"><span>'.__('Facebook Like','super-social-content-locker').'</span></a></li>',
			'fbshare'=>'<li id="tab_fbshare"><a href="#tabs-2" class="fbshare"><span>'.__('Facebook Share','super-social-content-locker').'</span></a></li>',
			'twfollow'=>'<li id="tab_twfollow"><a href="#tabs-3" class="twfollow"><span>'.__('Twitter Follow','super-social-content-locker').'</span></a></li>',
			'twtweet'=>'<li id="tab_twtweet"><a href="#tabs-4" class="twshare"><span>'.__('Twitter Like','super-social-content-locker').'</span></a></li>',
			'gshare'=>'<li id="tab_gshare"><a href="#tabs-5" class="gshare"><span>'.__('G+1 Share','super-social-content-locker').'</span></a></li>',
			'yt'=>'<li id="tab_yt"><a href="#tabs-6" class="ytsubscribe"><span>'.__('Youtube','super-social-content-locker').'</span></a></li>',
			'ln'=>'<li id="tab_ln"><a href="#tabs-7" class="lnshare"><span>'.__('Linkedin Share','super-social-content-locker').'</span></a></li>',
		);
		
		if(!empty($social_tabs_order)){
			$social_tabs_order = str_replace('tab[]=','',$social_tabs_order);
			$social_tabs_order_array = explode('&',$social_tabs_order);
			foreach($social_tabs_order_array as $tabsorder)
			{
				foreach($social_default_tabs as $key => $tabs)
				{
					if($tabsorder == $key)
						$output_tabs .= $tabs;
				}
			}
		}
		else{			
			foreach($social_default_tabs as $tabs)
			{
				$output_tabs .= $tabs;
			}
		}
		return $output_tabs;
	}
	
	 /*
	*	Save the post content
	*/
	
	public function save_cpt_sscl_meta_box( $post_id ) {
 
    /* If we're not working with a 'post' post type or the user doesn't have permission to save,
     * then we exit the function.
     */
	 	
		if ( ! $this->is_valid_post_type() || ! $this->user_can_save( $post_id, 'super_social_content_locker_nonce', 'super_social_content_locker_save' ) ) {
			return;
		}	
		
		foreach($_POST as $key => $value)
		{
            
			
            if(!isset($_POST['codetides_fb_like_locker']))
                update_post_meta( $post_id, 'codetides_fb_like_locker', '' );
            if(!isset($_POST['codetides_fb_share_locker']))
                update_post_meta( $post_id, 'codetides_fb_share_locker', '' );
			
            if(!isset($_POST['codetides_tw_follow_locker']))
                update_post_meta( $post_id, 'codetides_tw_follow_locker', '' );              
            if(!isset($_POST['codetides_tw_tweet_locker']))
                update_post_meta( $post_id, 'codetides_tw_tweet_locker', '' );
			
            if(!isset($_POST['codetides_gshare_locker']))
                update_post_meta( $post_id, 'codetides_gshare_locker', '' );
            if(!isset($_POST['codetides_yt_locker']))
                update_post_meta( $post_id, 'codetides_yt_locker', '' );  
            if(!isset($_POST['codetides_ln_locker']))
                update_post_meta( $post_id, 'codetides_ln_locker', '' );  
            
			
            
			if (0 === strpos($key, $this->prefix)) {               
				update_post_meta( $post_id, $key, $value );
			}
            
		}
 
	}
	
	private function is_valid_post_type() {
		
		return ! empty( $_POST['post_type'] ) && ( ('ct_sscl' == $_POST['post_type']) || ('page' == $_POST['post_type']) || ('post' == $_POST['post_type']) );
	}
	
	private function user_can_save( $post_id, $nonce_action, $nonce_id ) {
 
		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );
		$is_valid_nonce = ( isset( $_POST[ $nonce_action ] ) && wp_verify_nonce( $_POST[ $nonce_action ], $nonce_id ) );
	 
		// Return true if the user is able to save; otherwise, false.
		return ! ( $is_autosave || $is_revision ) && $is_valid_nonce;
	 
	}
	
    
    /*
	* Hide quick edit in Social Content Locker the box content.
	*/
	public function replace_submit_meta_box() 
      {

          remove_meta_box('submitdiv', 'ct_sscl', 'core'); // $item represents post_type
          add_meta_box('submitdiv', 'Super Social Content Locker' , array($this,'submit_meta_box'), 'ct_sscl', 'side', 'low');
		  add_meta_box('ct_information', 'Code Tides' , array($this,'ct_meta_box'), 'ct_sscl', 'side', 'low');
      }
	  
	  public function ct_meta_box()
	  {
			echo '<div class="ct_info" style="margin-left:-20px;"><iframe frameborder="0" width="300" height="970" src="http://www.codetides.com/paid_plugin_right_side.php"></iframe></div>'; 
	   }
    
     public function submit_meta_box() {
        global $action, $post;
       
        $post_type = $post->post_type; // get current post_type
        $post_type_object = get_post_type_object($post_type);
        $can_publish = current_user_can($post_type_object->cap->publish_posts);
       
        ?>
        <div class="submitbox" id="submitpost">
         <div id="major-publishing-actions">
         <?php
         do_action( 'post_submitbox_start' );
         ?>
         <div id="delete-action">
         <?php
         if ( current_user_can( "delete_post", $post->ID ) ) {
           if ( !EMPTY_TRASH_DAYS )
                $delete_text = __('Delete Permanently','super-social-content-locker');
           else
                $delete_text = __('Move to Trash','super-social-content-locker');
         ?>
         <a class="submitdelete deletion" href="<?php echo get_delete_post_link($post->ID); ?>"><?php echo $delete_text; ?></a><?php
         } //if ?>
        </div>
         <div id="publishing-action">
         <span class="spinner"></span>
         <?php
         if ( !in_array( $post->post_status, array('publish', 'future', 'private') ) || 0 == $post->ID ) {
              if ( $can_publish ) : ?>
                <input name="original_publish" type="hidden" id="original_publish" value="<?php esc_attr_e('Add Tab') ?>" />
                <input name="publish" type="submit" class="button button-primary button-large" id="publish" accesskey="p" value="<?php esc_html_e('Add ', 'super-social-content-locker'); ?>" />
                
         <?php   
              endif; 
         } else { ?>
                <input name="original_publish" type="hidden" id="original_publish" value="<?php esc_attr_e('Update ') . $item; ?>" />
                <input name="save" type="submit" class="button button-primary button-large" id="publish" accesskey="p" value="<?php esc_attr_e('Update ') . 'super-social-content-locker'; ?>" />
         <?php
         } //if ?>
         </div>
         <div class="clear"></div>
         </div>
         </div>
        <?php
      } 
	  function sscl_footer_admin_text($text) {
        $post_type = filter_input(INPUT_GET, 'post_type');
        if (! $post_type)
            $post_type = get_post_type(filter_input(INPUT_GET, 'post'));

        if ('ct_sscl' == $post_type)
            return 'If you like Super Social Content Locker <a href="https://bit.ly/3gEM8Xp" target="_blank" target="_blank">please leave us a ★★★★★ rating</a>. Many thanks from the CodeTides team in advance :)';

        return $text;
    }
	public function super_social_content_locker_columns($columns) {		
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Title','super-social-content-locker' ),
			'type' => __( 'Locker Type','super-social-content-locker' ),
			'features' => __( 'Locker Feature','super-social-content-locker' ),
			'shortcode' => __( 'Shortcode','super-social-content-locker' ),
            'views' => __( 'Views','super-social-content-locker' ),
			'convert' => __( 'Convert','super-social-content-locker' ),
			'ratio' => __( 'Ratio','super-social-content-locker' ),
			'date' => __( 'Date','super-social-content-locker' )
		);	
		return $columns;
	}
    
    public function super_social_content_locker_columns_data( $column, $post_id ) {
		global $post;
	
		switch( $column ) {
	
			/* If displaying the 'shortcode' column. */
			case 'shortcode' :
				
                echo __( '[sscl ID="'.$post_id.'"]','super-social-content-locker' );	

            break;
            
            case 'type' :
				
                echo __( '<span class="sscl_type">'.$this->codetides_get_locker_type($post_id).'</span>','super-social-content-locker' );	
				break;
			case 'features' :
				
                echo __( '<span class="sscl_feature">'.$this->codetides_get_locker_feature($post_id).'</span>','super-social-content-locker' );	
				break;
			
			case 'views' :
				
                echo __( '<span class="sscl_stats_imp">'.$this->codetides_get_locker_views($post_id).' </span>','super-social-content-locker' );	

            break;    
			case 'convert' :
				
                echo __( '<span class="sscl_stats_con">'.$this->codetides_get_locker_convert($post_id).' </span>','super-social-content-locker' );	

            break;    
			case 'ratio' :
				
                echo __( '<span class="sscl_stats_rate">'.$this->codetides_get_locker_ratio($post_id).'% </span>','super-social-content-locker' );	

            break;    
	
			/* Just break out of the switch statement for everything else. */
			default :
				break;
		}
	}
	public function codetides_get_locker_type($id_post){
		$locker_type = get_post_meta( $id_post, $this->prefix."locker_type", true );
		$locker_type_text = array(
			'1'=>'Popup Overlay',
			'2'=>'Text / Content Locker',
			'3'=>'Exchange Locker'
		);
		
		return $locker_type_text[$locker_type];
	}
	
	public function codetides_get_locker_feature($id_post){
		$locker_feature = get_post_meta( $id_post, $this->prefix."locker_feature", true );
		$locker_feature_text = array(
			'1'=>'Social Share / Follow',
			'2'=>'Form Submission',
			'3'=>'Video Ads',
			'4'=>'X Times Vote Gamifications',
			'5'=>'Rating Widget',
			'6'=>'Member Subscription',
		);
		
		return $locker_feature_text[$locker_feature];
	}
	
	public function codetides_get_locker_views($id_post){
		$locker_views = get_post_meta( $id_post, $this->prefix."locker_views", true );
        if(!empty($locker_views))
            return $locker_views;
        else
            return 0;
	}
	public function codetides_get_locker_convert($id_post){
		$locker_convert = get_post_meta( $id_post, $this->prefix."sscl_total_convert", true );
         if(!empty($locker_convert))
            return $locker_convert;
        else
            return 0;		
	}
	public function codetides_get_locker_ratio($id_post){
        
		$converted_ratio = $this->codetides_get_locker_convert($id_post) / $this->codetides_get_locker_views($id_post) * 100;
		$locker_ratio = round($converted_ratio);
		return ( $locker_ratio ? $locker_ratio : '0' ) ;
	}
	public function codetides_get_total_locker_views(){
		$args = array(
			'post_type' => 'ct_sscl', // Your post type
			'status'    => 'publish',
		);

		$total = 0;
		$views = new WP_Query( $args );
		if ( $views->have_posts() ) {
			while ( $views->have_posts() ) {
			$views->the_post();
				$total += get_post_meta( get_the_ID(), $this->prefix."locker_views", true );
			}
		}

		return $total;
		
	}
	public function add_submenu_pages() {        
        add_submenu_page(
			'edit.php?post_type=ct_sscl',			
			__( 'Settings Panel', 'super-social-content-locker' ),
			__( 'Settings Panel', 'super-social-content-locker' ),
			'manage_options',
            'sscl_settings_panel',
			array($this,'display_settings_page')
		);
		
        add_submenu_page(
			'edit.php?post_type=ct_sscl',			
			__( 'About Pro', 'super-social-content-locker' ),
			__( 'About Pro', 'super-social-content-locker' ),
			'manage_options',
            'sscl_about_pro_page',
			array($this,'display_about_pro_page')
		);		
    }
	public function display_about_pro_page(){
		if (!empty($_SERVER['HTTPS']))
				$ssl='https';
			else
				$ssl='http';
		$url_redirect = admin_url( 'edit.php?post_type=ct_sscl&page=sscl_settings_panel&tab=about_pro', $ssl );		
		echo "<script type='text/javascript'>window.location.replace('$url_redirect');</script>";
		exit();
	}
	public function display_settings_page() {
        ?>
        <!-- Create a header in the default WordPress 'wrap' container -->
        <div class="wrap codetides-dashboard-wapper">			
            <h2><?php _e( '', 'super-social-content-locker' ); ?></h2>			
            <!-- Make a call to the WordPress function for rendering errors when settings are saved. -->
            <?php  settings_errors(); ?>
            <?php 
            
            ?>
            <!-- Create the form that will be used to render our options -->
            <form method="post" action="options.php">
               
                <?php 
                    settings_fields( 'ct_sscl_options_header' );
                    do_settings_sections( 'ct_sscl_options_header' );
        
            $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'sscl_plugin_license';  
            if( $active_tab == 'sscl_plugin_license' ) { 
              
                settings_fields( 'ct_sscl_options' );
                do_settings_sections( 'ct_sscl_options' );
                submit_button();
            } else if( $active_tab == 'app_settings' ) {
                                
                settings_fields( 'ct_sscl_options_app_settings' );
                do_settings_sections( 'ct_sscl_options_app_settings' );
                submit_button();
            }   
			else if( $active_tab == 'about_pro' ) {
                                
                settings_fields( 'ct_sscl_options_about_pro' );
                do_settings_sections( 'ct_sscl_options_about_pro' );
            }   	
            else if( $active_tab == 'change_log' ) {
                settings_fields( 'ct_sscl_options_change_log' );
                do_settings_sections( 'ct_sscl_options_change_log' );
            }
        
            ?>
            </form>
			<h3 class="codetides-title-more-items"><?php esc_html_e('More items by CodeTides','super-social-content-locker')?></h3>
			
			<div class="feature-section-sscl more-products three-column">
				<?php echo $this->rest_plugin_more_items(); ?>
				
			</div>
        </div><!-- /.wrap -->
        <?php
    }
	public function rest_plugin_more_items()
	 {
	 
	 	$unparsed_json = file_get_contents("http://codetides.com/wp-json/wp/v2/codetides_items");
		$json_object = json_decode($unparsed_json);
		//print_r($json_object);
		foreach($json_object as $key => $codetides_item){
			$codetides_item_meta  = $codetides_item->meta->codetides_items_url[0];
			$codetides_item_meta_data = unserialize($codetides_item_meta);
			
			//echo $item-url;
			//print_r(json_decode(json_decode($codetides_item_meta), TRUE));
			//print_r($codetides_item_meta_data);
			if($codetides_item->title->rendered!="Super Social Content Locker"){
				$codetides_items_output .='
				<div class="column product">
						<a target="_blank" rel="nofollow" href="'.$codetides_item_meta_data[0]['item-url'].'" title="'.$codetides_item->title->rendered.'">
							<img class="product_image" src="'.$codetides_item_meta_data[0]['item-image-url'].'" alt="" width="300" height="150">
						</a>
						<div class="product_body">
							<h3 class="product_title">
								<a target="_blank" rel="nofollow" href="'.$codetides_item_meta_data[0]['item-url'].'" title="'.$codetides_item->title->rendered.'">'.$codetides_item->title->rendered.'</a>
							</h3>
						</div>
					</div>
				';
			}
			
		}
		return $codetides_items_output;
	 }
	 public function initialize_sscl_options(){

        // create plugin options if not exist
        if( false == $this->options ) {                        
            add_option( 'ct_sscl_options' );
            add_option( 'ct_sscl_options_header' );
            
            add_option( 'ct_sscl_options_app_settings' );            
            add_option( 'ct_sscl_options_help_guides' );
            add_option( 'ct_sscl_options_change_log' );            
            add_option('ct_sscl_verified_purchase', '1');
            add_option('ct_sscl_remind_later', '0');
            add_option('ct_sscl_no_thanks', '0');            
            add_option('ct_sscl_install_date', current_time( 'mysql' ));
            $ct_support_expire_date = strtotime("+6 month" .current_time( 'mysql' ));
            add_option('ct_sscl_support_expire_date', date("Y-m-d", $ct_support_expire_date) );
            
            add_option('ct_sscl_rating_remind_later','0');
            add_option('ct_sscl_reviewed','0');
            
        }
		if(get_option( 'ct_sscl_verified_purchase' )){
            add_option('ct_sscl_verified_purchase', '1');
            add_option('ct_sscl_remind_later', '0');
            add_option('ct_sscl_no_thanks', '0');
            add_option('ct_sscl_install_date', current_time( 'mysql' ));
            $ct_support_expire_date = strtotime("+6 month" .current_time( 'mysql' ));
            add_option('ct_sscl_support_expire_date', date("Y-m-d", $ct_support_expire_date) );
            add_option('ct_sscl_rating_remind_later','0');
            add_option('ct_sscl_reviewed','0');
        }
        if( false == $this->options_app_settings ) {  
           add_option( 'ct_sscl_options_app_settings' ); 
        }
		
        /**
         * Section
         */
		 
		 
        add_settings_section(
            'ct_sscl_section_about',                                                       // ID used to identify this section and with which to register options
            __( '', 'super-social-content-locker'),                           // Title to be displayed on the administration page
            array( $this, 'ct_option_section_about'),                            // Callback used to render the description of the section
            'ct_sscl_options_header'                                               // Page on which to add this section of options            
        );
        add_settings_section(
            'ct_sscl_section_about_tabs',                                                       // ID used to identify this section and with which to register options
            __( '', 'super-social-content-locker'),                           // Title to be displayed on the administration page
            array( $this, 'ct_option_section_tabs'),                            // Callback used to render the description of the section
            'ct_sscl_options_header'                                               // Page on which to add this section of options            
        );
        
        
        
        add_settings_section(
            'ct_sscl_license_fields',                                                       // ID used to identify this section and with which to register options
            __( 'Plugin License Key', 'super-social-content-locker'),                           // Title to be displayed on the administration page
            array( $this, 'ct_plugin_description'),                            // Callback used to render the description of the section
            'ct_sscl_options'                                               // Page on which to add this section of options
        );
		
		/**
         * Fields
         */
        
        add_settings_field(
            'ct_sscl_email',
            __( 'Email ID', 'super-social-content-locker' ),
            array( $this, 'text_option_field' ),
            'ct_sscl_options',
            'ct_sscl_license_fields',
            array(
				'id' => 'ct_sscl_email',				
				'description' => __( 'Please enter your email id', 'super-social-content-locker' ),
				'class' =>'regular-text',
				'default'=>get_option( 'admin_email' )
			)			
        );
		add_settings_field(
            'ct_sscl_user_name',
            __( 'Envato User Name', 'super-social-content-locker' ),
            array( $this, 'text_option_field' ),
            'ct_sscl_options',
            'ct_sscl_license_fields',
            array(
				'id' => 'ct_sscl_user_name',				
				'description' => __( 'Please enter your envato username', 'super-social-content-locker' ),
				'class' =>'regular-text',
				'default'=>''
			)			
        ); 
		add_settings_field(
            'ct_sscl_key',
            __( 'License key', 'super-social-content-locker' ),
            array( $this, 'text_option_field' ),
            'ct_sscl_options',
            'ct_sscl_license_fields',
            array(
				'id' => 'ct_sscl_key',				
				'description' => __( 'Please enter your license key to validate', 'super-social-content-locker' ),
				'class' =>'regular-text',
				'default'=>''
			)
			
        );        
		add_settings_field(
            'ct_sscl_get_key',
            __( 'Get Your License key', 'super-social-content-locker' ),
            array( $this, 'label_option_field' ),
            'ct_sscl_options',
            'ct_sscl_license_fields',
            array(
				'id' => 'ct_sscl_get_key',				
				'description' => __( '<a href="https://bit.ly/2YN2W8i" target="_blank" class="sscl_ancher">Click here to get your license key</a>', 'super-social-content-locker' ),
				'class' =>'regular-text',
				'default'=>''
			)
			
        );
        
        add_settings_field(
            'ct_sscl_item_id',
            __( '', 'super-social-content-locker' ),
            array( $this, 'hidden_option_field' ),
            'ct_sscl_options',
            'ct_sscl_license_fields',
            array(
				'id' => 'ct_sscl_item_id',				
				'description' => '',
				'class' =>'regular-text',
				'default'=>'10458363'
			)
			
        );
        
        
        add_settings_section(
            'ct_sscl_section_app_settings',                                                       // ID used to identify this section and with which to register options
            __( 'Social Media App IDs', 'super-social-content-locker'),                           // Title to be displayed on the administration page
            array( $this, 'ct_option_section_app_settings'),                            // Callback used to render the description of the section
            'ct_sscl_options_app_settings'                                               // Page on which to add this section of options            
        );
        
       add_settings_section(
            'ct_sscl_section_facebook_app_settings',                                                       // ID used to identify this section and with which to register options
            __( 'Facebook', 'super-social-content-locker'),                           // Title to be displayed on the administration page
            array( $this, 'ct_option_section_app_settings_facebook'),                            // Callback used to render the description of the section
            'ct_sscl_options_app_settings'                                               // Page on which to add this section of options            
        );
        add_settings_field(
            'ct_sscl_facebook_app_id',
            __( 'Facebook App ID', 'super-social-content-locker' ),
            array( $this, 'text_option_field_app_settings' ),
            'ct_sscl_options_app_settings',
            'ct_sscl_section_facebook_app_settings',
            array(
				'id' => 'ct_sscl_facebook_app_id',				
				'description' => __( 'Please enter your facebook app id (<a href="http://www.codetides.com/tutorials/how-to-get-facebook-app-id-and-app-secret/" target="_blank">How Do I Get This!</a>)', 'super-social-content-locker' ),
				'class' =>'regular-text full-width',
				'default'=>''
			)			
        );
		
		add_settings_section(
            'ct_sscl_section_youtube_app_settings',                                                       // ID used to identify this section and with which to register options
            __( 'Youtube', 'super-social-content-locker'),                           // Title to be displayed on the administration page
            array( $this, 'ct_option_section_app_settings_facebook'),                            // Callback used to render the description of the section
            'ct_sscl_options_app_settings'                                               // Page on which to add this section of options            
        );
        add_settings_field(
            'ct_sscl_youtube_api_key',
            __( 'Youtube Api Key', 'super-social-content-locker' ),
            array( $this, 'text_option_field_app_settings' ),
            'ct_sscl_options_app_settings',
            'ct_sscl_section_youtube_app_settings',
            array(
				'id' => 'ct_sscl_youtube_api_key',				
				'description' => __( 'Please enter your youtube api key (<a href="http://www.codetides.com/tutorials/how-to-create-youtube-api-key-and-client-id/" target="_blank">How Do I Get This!</a>) <span class="app_settings_pro"><a href="https://bit.ly/2YN2W8i" target="_blank">(Pro Feature)</a></span>', 'super-social-content-locker' ),
				'class' =>'regular-text full-width',
				'default'=>'',
				'editable'=>'disabled'
			)			
        );
		add_settings_field(
            'ct_sscl_youtube_client_id',
            __( 'Youtube Client ID', 'super-social-content-locker' ),
            array( $this, 'text_option_field_app_settings' ),
            'ct_sscl_options_app_settings',
            'ct_sscl_section_youtube_app_settings',
            array(
				'id' => 'ct_sscl_youtube_client_id',				
				'description' => __( 'Please enter your youtube client id (<a href="http://www.codetides.com/tutorials/how-to-create-youtube-api-key-and-client-id/" target="_blank">How Do I Get This!</a>) <span class="app_settings_pro"><a href="https://bit.ly/2YN2W8i" target="_blank">(Pro Feature)</a></span>', 'super-social-content-locker' ),
				'class' =>'regular-text full-width',
				'default'=>'',
				'editable'=>'disabled'
			)			
        );
		
		add_settings_field(
            'ct_sscl_youtube_channel_id',
            __( 'Youtube Channel ID', 'super-social-content-locker' ),
            array( $this, 'text_option_field_app_settings' ),
            'ct_sscl_options_app_settings',
            'ct_sscl_section_youtube_app_settings',
            array(
				'id' => 'ct_sscl_youtube_channel_id',				
				'description' => __( 'Please enter your youtube channel ID (<a href="http://www.codetides.com/tutorials/how-to-create-youtube-api-key-and-client-id/" target="_blank">How Do I Get This!</a>) <span class="app_settings_pro"><a href="https://bit.ly/2YN2W8i" target="_blank">(Pro Feature)</a></span>', 'super-social-content-locker' ),
				'class' =>'regular-text full-width',
				'default'=>'',
				'editable'=>'disabled'
			)			
        );
		
        add_settings_section(
            'ct_sscl_section_linkedin_app_settings',                                                       // ID used to identify this section and with which to register options
            __( 'Linkedin', 'super-social-content-locker'),                           // Title to be displayed on the administration page
            array( $this, 'ct_option_section_app_settings_facebook'),                            // Callback used to render the description of the section
            'ct_sscl_options_app_settings'                                               // Page on which to add this section of options            
        );
		add_settings_field(
            'ct_sscl_linkedin_client_id',
            __( 'Client ID', 'super-social-content-locker' ),
            array( $this, 'text_option_field_app_settings' ),
            'ct_sscl_options_app_settings',
            'ct_sscl_section_linkedin_app_settings',
            array(
				'id' => 'ct_sscl_linkedin_client_id',				
				'description' => __( 'Please enter your linkedin client id (<a href="http://www.codetides.com/tutorials/how-to-create-linkedin-app-client-id-and-client-secret/" target="_blank">How Do I Get This!</a>) <span class="app_settings_pro"><a href="https://bit.ly/2YN2W8i" target="_blank">(Pro Feature)</a></span>', 'super-social-content-locker' ),
				'class' =>'regular-text full-width',
				'default'=>'',
				'editable'=>'disabled'
			)			
        );
        
		add_settings_field(
            'ct_sscl_linkedin_client_secret',
            __( 'Client Secret', 'super-social-content-locker' ),
            array( $this, 'text_option_field_app_settings' ),
            'ct_sscl_options_app_settings',
            'ct_sscl_section_linkedin_app_settings',
            array(
				'id' => 'ct_sscl_linkedin_client_secret',				
				'description' => __( 'Please enter your linkedin client secret (<a href="http://www.codetides.com/tutorials/how-to-create-linkedin-app-client-id-and-client-secret/" target="_blank">How Do I Get This!</a>) <span class="app_settings_pro"><a href="https://bit.ly/2YN2W8i" target="_blank">(Pro Feature)</a></span>', 'super-social-content-locker' ),
				'class' =>'regular-text full-width',
				'default'=>'',
				'editable'=>'disabled'
			)			
        );
		
		
		
		add_settings_field(
            'ct_sscl_mailchimp_app_id',
            __( 'Mailchimp App ID', 'super-social-content-locker' ),
            array( $this, 'text_option_field_app_settings' ),
            'ct_sscl_options_app_settings',
            'ct_sscl_section_app_settings',
            array(
				'id' => 'ct_sscl_mailchimp_app_id',				
				'description' => __( 'Please enter your Mailchimp app id (<a href="http://www.codetides.com/tutorials/how-to-get-mailchimp-api-key-and-audience-id-for-mailchimp-integration/" target="_blank">How Do I Get This!</a>) <span class="app_settings_pro"><a href="https://bit.ly/2YN2W8i" target="_blank">(Pro Feature)</a></span>', 'super-social-content-locker' ),
				'class' =>'regular-text full-width',
				'default'=>'',
				'editable'=>'disabled'
			)			
        );
		add_settings_field(
            'ct_sscl_mailchimp_audience_id',
            __( 'Mailchimp Audience / List ID', 'super-social-content-locker' ),
            array( $this, 'text_option_field_app_settings' ),
            'ct_sscl_options_app_settings',
            'ct_sscl_section_app_settings',
            array(
				'id' => 'ct_sscl_mailchimp_audience_id',				
				'description' => __( 'Please enter your Mailchimp audience/list id (<a href="http://www.codetides.com/tutorials/how-to-get-mailchimp-api-key-and-audience-id-for-mailchimp-integration/" target="_blank">How Do I Get This!</a>) <span class="app_settings_pro"><a href="https://bit.ly/2YN2W8i" target="_blank">(Pro Feature)</a></span>', 'super-social-content-locker' ),
				'class' =>'regular-text full-width',
				'default'=>'',
				'editable'=>'disabled'
			)			
        );
        
        add_settings_section(
            'ct_sscl_section_about_pro',                                                       // ID used to identify this section and with which to register options
            __( '', 'super-social-content-locker'),                           // Title to be displayed on the administration page
            array( $this, 'ct_sscl_section_about_pro'),                            // Callback used to render the description of the section
            'ct_sscl_options_about_pro'                                               // Page on which to add this section of options            
        );
        
          
        
        
        add_settings_section(
            'ct_sscl_section_change_log',                                                       // ID used to identify this section and with which to register options
            __( '', 'super-social-content-locker'),                           // Title to be displayed on the administration page
            array( $this, 'ct_sscl_section_change_log'),                            // Callback used to render the description of the section
            'ct_sscl_options_change_log'                                               // Page on which to add this section of options            
        );
        
        
        
        
        /**
         * Register Settings
         */
        register_setting( 'ct_sscl_options', 'ct_sscl_options' );
        register_setting( 'ct_sscl_options_app_settings', 'ct_sscl_options_app_settings' );
    }
	public function ct_plugin_description() {
        echo '<p>'. __( 'A purchase code (license) is only valid for One Domain. Are you using this plugin on a new domain? Purchase a <a href="https://bit.ly/2YN2W8i" target="_blank">new license here</a> to get a new purchase code. To remove a purchase code simply remove the license key and click update.', 'super-social-content-locker' ) . '</p>';
    }
    
    
	
    public function ct_option_section_about() {
       
        echo '<div class="wrap about-wrap"><h1><strong>'.  __( 'Welcome to Super Social Content Locker (Lite)', 'super-social-content-locker' ) . '</strong></h1><div class="about-text">'. __( 'Thanks for Choosing Super Social Content Locker - The worlds most powerful Multi-Purpose Advertising / Marketing Plugin. This page will help you quickly get up and running with Super Social Content Locker.', 'super-social-content-locker' ) . '</div><div class="wp-badge fl-badge">'.__( 'Version 1.2.0', 'super-social-content-locker' ).'</div></div>';
    }
    
    public function ct_option_section_tabs() {
                $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'sscl_plugin_license';  
        
        
        echo '<h2 class="nav-tab-wrapper">
        <a href="edit.php?post_type=ct_sscl&page=sscl_settings_panel&tab=sscl_plugin_license" class="nav-tab '.($active_tab == 'sscl_plugin_license' ? 'nav-tab-active' : '').'">'.__( 'Plugin License', 'super-social-content-locker' ).'</a>
        <a href="edit.php?post_type=ct_sscl&page=sscl_settings_panel&tab=app_settings" class="nav-tab '.($active_tab == 'app_settings' ? 'nav-tab-active' : '').'">'.__( 'Social App Settings', 'super-social-content-locker' ).'</a>
		<a href="edit.php?post_type=ct_sscl&page=sscl_settings_panel&tab=about_pro" class="nav-tab '.($active_tab == 'about_pro' ? 'nav-tab-active' : '').'">'.__( 'About Pro Features', 'super-social-content-locker' ).'</a>
        <a href="edit.php?post_type=ct_sscl&page=sscl_settings_panel&tab=change_log" class="nav-tab '.($active_tab == 'change_log' ? 'nav-tab-active' : '').'">'.__( 'Change log', 'super-social-content-locker' ).'</a>
        </h2>';
    }
    
    
	public function ct_sscl_section_about_pro() {
       
       echo '<div class="section_pro_features_block">
			<div class="intro">'.__('Super Social Content Locker is an WordPress Advertising Plugin used to increase your website worth by many ways. Social Media Content Locker increased you social fan following by liking, sharing and subscribing to your social media channels. This handy plugin comes with more amazing features which has worth to its customers such as', 'super-social-content-locker').'
				<ul>
					<li>'.__('Build your own subscriber list and used them to promote your products.', 'super-social-content-locker').'</li>
					<li>'.__('Increased your website members by using become a member feature', 'super-social-content-locker').'</li>
					<li>'.__('Increased your video views by forcing them to watch video and then display their content', 'super-social-content-locker').'</li>
					<li>'.__('Engage your audience by voting to their pics best for quizzes like Pic of the week.', 'super-social-content-locker').'</li>
					<li>'.__('Many More...', 'super-social-content-locker').'</li>
				</ul>				
			</div>
			<p class="comparision_text">'.__('Here are brief comparision with pro version you will get when you upgrade to premium. <a href="https://bit.ly/32wAnNA" class="upgrade_sscl">Upgrade Now</a>', 'super-social-content-locker').'</p>
			<h3>'.__('Locker Types', 'super-social-content-locker').'</h3>
			<div class="pro_features_block">
				<img src="'.plugin_dir_url( __FILE__ ).'images/preview_popup_overlay.png" width="350" height="200" />
				<h4>'.__('Popup Overlay', 'super-social-content-locker').'</h4>
				<p>'.__('Display locker as popup overlay on page loads in anywhere inside your website, will be removed after using unlock feature.', 'super-social-content-locker').'</p>
				<p><a href="https://bit.ly/3bDAyLg"><i class="fa fa-check" aria-hidden="true"></i> '.__('See in Action', 'super-social-content-locker').'</a></p>
			</div>
			<div class="pro_features_block">
				<img src="'.plugin_dir_url( __FILE__ ).'images/preview_premium_content.png" width="350" height="200" />
				<h4>'.__('Premium Content', 'super-social-content-locker').'</h4>
				<p>'.__('Display some text paragraph and rest of the text will visible after using unlock feature as premium content.', 'super-social-content-locker').'</p>
				<p><a href="https://bit.ly/32hEnmp"><i class="fa fa-check" aria-hidden="true"></i> '.__('See in Action', 'super-social-content-locker').'</a></p>
			</div>
		</div>
		<div class="section_pro_features_block">
			<h3>'.__('Locker Themes', 'super-social-content-locker').'</h3>
			<div class="pro_features_block">
				<img src="'.plugin_dir_url( __FILE__ ).'images/common-grey-theme.png" width="350" height="200" />
				<h4>'.__('Common Grey', 'super-social-content-locker').'</h4>
				<p>'.__('Simple but elegent grey theme made for super social content locker, All locker features are customized and ready to use in common grey theme.', 'super-social-content-locker').'</p>
				<p><a href="https://bit.ly/3m3opEb"><i class="fa fa-check" aria-hidden="true"></i> '.__('See in Action', 'super-social-content-locker').'</a></p>
			</div>
			<div class="pro_features_block">
				<img src="'.plugin_dir_url( __FILE__ ).'images/stylish-grey-theme.png" width="350" height="200" />
				<h4>'.__('Stylish Grey', 'super-social-content-locker').'</h4>
				<p>'.__('Stylish Grey is an mesmerising influencer theme made for super social content locker , All locker features are customized and ready to use in stylish grey theme.', 'super-social-content-locker').'</p>
				<p><a href="https://bit.ly/3k0RXR4"><i class="fa fa-check" aria-hidden="true"></i> '.__('See in Action', 'super-social-content-locker').'</a></p>
			</div>
			<div class="pro_features_block">
				<img src="'.plugin_dir_url( __FILE__ ).'images/stylish-dark-theme.png" width="350" height="200" />
				<h4>'.__('Stylish Dark', 'super-social-content-locker').'</h4>
				<p>'.__('Stylish Dark is an spectacular theme of dark layouts made for super social content locker , All locker features are customized and ready to use in stylish grey theme.', 'super-social-content-locker').'</p>
				<p><a href="https://bit.ly/3bExQVP"><i class="fa fa-check" aria-hidden="true"></i> '.__('See in Action', 'super-social-content-locker').'</a></p>
			</div>
		</div>
		<div class="section_pro_features_block">
			<h3>'.__('Locker Features', 'super-social-content-locker').'</h3>
			<div class="pro_features_block">
				<img src="'.plugin_dir_url( __FILE__ ).'images/feature_form_submission.png" width="350" height="200" />
				<h4>'.__('Form Submission', 'super-social-content-locker').'</h4>
				<p>'.__('Helps to build email list with couple of other options as form submission', 'super-social-content-locker').'</p>
				<p><a href="https://bit.ly/3m6I0TO"><i class="fa fa-check" aria-hidden="true"></i> '.__('See in Action', 'super-social-content-locker').'</a></p>
			</div>
			<div class="pro_features_block">
				<img src="'.plugin_dir_url( __FILE__ ).'images/feature_video_ad.png" width="350" height="200" />
				<h4>'.__('Video Ads', 'super-social-content-locker').'</h4>
				<p>'.__('Helps to promote by forcing vistors to watch your video ads', 'super-social-content-locker').'</p>
				<p><a href="https://bit.ly/3jYyKiO"><i class="fa fa-check" aria-hidden="true"></i> '.__('See in Action', 'super-social-content-locker').'</a></p>
			</div>
			<div class="pro_features_block">
				<img src="'.plugin_dir_url( __FILE__ ).'images/feature_xxx_gamification.png" width="350" height="200" />
				<h4>'.__('X Times Vote Gamifications', 'super-social-content-locker').'</h4>
				<p>'.__('Helps to Engage vistors by voting xxx times best for quizzes i.e picture of the week', 'super-social-content-locker').'</p>
				<p><a href="https://bit.ly/3m4Xrfh"><i class="fa fa-check" aria-hidden="true"></i> '.__('See in Action', 'super-social-content-locker').'</a></p>
			</div>
			<div class="pro_features_block">
				<img src="'.plugin_dir_url( __FILE__ ).'images/feature_rating.png" width="350" height="200" />
				<h4>'.__('Rating Widget', 'super-social-content-locker').'</h4>
				<p>'.__('Helps to authenticate your product with posting review', 'super-social-content-locker').'</p>
				<p><a href="https://bit.ly/2F3BhcR"><i class="fa fa-check" aria-hidden="true"></i> '.__('See in Action', 'super-social-content-locker').'</a></p>
			</div>
			<div class="pro_features_block">
				<img src="'.plugin_dir_url( __FILE__ ).'images/feature_member_subscription.png" width="350" height="200" />
				<h4>'.__('Member Subscription', 'super-social-content-locker').'</h4>
				<p>'.__('Helps to increase your website members by registering member', 'super-social-content-locker').'</p>
				<p><a href="https://bit.ly/3hernBS"><i class="fa fa-check" aria-hidden="true"></i> '.__('See in Action', 'super-social-content-locker').'</a></p>
			</div>
			<div class="pro_features_block">
				<img src="'.plugin_dir_url( __FILE__ ).'images/mailchimp.png" width="350" height="200" style="width:350px; height:200px;" />
				<h4>'.__('Mailchimp Integration', 'super-social-content-locker').'</h4>
				<p>'.__('Super social content locker is compatible with mailchimp to export list of emails saved form submission and member subscription features to mailchimp directly.', 'super-social-content-locker').'</p>
				
			</div>
			
			<div class="pro_features_block">
				<img src="'.plugin_dir_url( __FILE__ ).'images/csv_export.png" width="350" height="200" style="width:350px; height:200px;" />
				<h4>'.__('Export Emails CSV', 'super-social-content-locker').'</h4>
				<p>'.__('Export all emails from member subscription and form submission to csv file for newsletter purpose.', 'super-social-content-locker').'</p>
				
			</div>

		</div>';
    }
    public function ct_sscl_section_change_log() {
        $path = plugin_dir_path( dirname( __FILE__ ) ) . 'admin/views/changelog.txt';
       echo '<div class="wrap about-wrap">'.$this->get_robots($path,'1').'</div>';
    }
    /**
     * Re-usable text options field for settings
     *
     * @param $args array   field arguments
     */
    public function text_option_field( $args ) {
        $field_id = $args['id'];
        if( $field_id ) {
            $val = ( isset( $this->options[ $field_id ] ) ) ? $this->options[ $field_id ] : $args['default'];
            echo '<input type="text" name="ct_sscl_options['.$field_id.']" value="' . $val . '" class="'.$args['class'].'" >
			<br/>
            <label>'.$args['description'].'</label>';
        } else {
            _e( 'Field id is missing!', 'super-social-content-locker' );
        }
    }
	
	/**
     * Re-usable label field for settings
     *
     * @param $args array   field arguments
     */
    
    public function label_option_field( $args ) {
        $field_id = $args['id'];
        if( $field_id ) {
            echo '<label>'.$args['description'].'</label>';
        } else {
            _e( 'Field id is missing!', 'super-social-content-locker' );
        }
    }
	
	/**
     * Re-usable hidden options field for settings
     *
     * @param $args array   field arguments
     */
    public function hidden_option_field( $args ) {
        
        $field_id = $args['id'];
        if( $field_id ) {
            $val = ( isset( $this->options[ $field_id ] ) ) ? $this->options[ $field_id ] : $args['default'];
            echo '<input type="hidden" name="ct_sscl_options['.$field_id.']" value="' . $val . '" class="'.$args['class'].'" >
			<br/>
            <label>'.$args['description'].'</label>';
        } else {
            _e( 'Field id is missing!', 'super-social-content-locker' );
        }
    }
    
	
	
	public function text_option_field_app_settings( $args ) {
        $field_id = $args['id'];
		$disabled = $args['editable'];
        if( $field_id ) {
            $val = ( isset( $this->options_app_settings[ $field_id ] ) ) ? $this->options_app_settings[ $field_id ] : $args['default'];
			$readonly = ( isset($args['editable']) ) ? 'disabled="disabled"' : '';
			$val = ( isset($args['editable']) ) ? '' : $val;
            echo '<input type="text" name="ct_sscl_options_app_settings['.$field_id.']" value="' . $val . '" class="'.$args['class'].'"'. $readonly.'  >
			<br/>
            <label>'.$args['description'].'</label>';
        } else {
            _e( 'Field id is missing!', 'super-social-content-locker' );
        }
    }
	/**
     * Re-usable text file read function
     *
     * @param $path    file path
     */
    
   public function get_robots($path,$newline)
	{
		$robots_file = $path; //The robots file.
		
		if(file_exists($robots_file)){
			$fileContent = file_get_contents($robots_file);
				if($newline==1){return nl2br($fileContent);}
				else{return $fileContent;}
				

		} else {
			$default_content = "User-agent: *\nDisallow:";
			file_put_contents($robots_file, $default_content);
			return $default_content;
		}
	}
	public function codetides_ask_to_buy_admin_notice(){
		$tdate = date('Y-m-d');
		$remind_later_buy_date = get_option('ct_sscl_buy_remind_later');
		$next_remind_later_buy_date = date('Y-m-d', strtotime($remind_later_buy_date. ' + 15 days'));
		if(get_option( 'ct_sscl_already_bought' )==1) 
			return;
		if($tdate < $next_remind_later_buy_date)
			return;
		if($this->codetides_get_total_locker_views() < 1000)
			return;
		
		echo '
			<blockquote class="ask_to_upgrade">
            <p>'.__('Hey, We noticed you just crossed the <b>('.$this->codetides_get_total_locker_views().')</b> Impressions using Super Social Content Locker (Lite) – that’s awesome! Would you like to upgrade from Lite to Premium version of <a href="https://bit.ly/2YN2W8i" target="_blank"><b>Super Social Content Locker</b></a> to get all amazing features. ', 'super-social-content-locker').' </p>
            <p><em>'.__('~ The Super Social Content Locker team', 'super-social-content-locker').'</em></p>
            <p>
            <a class="btn_notification" href="https://bit.ly/32wAnNA" id="buy_now">'.__('– Yes! Definitely', 'super-social-content-locker').'</a>
            <a class="btn_notification" href="javascript:void()" id="remind_later_buy">'.__('– Please Remind Later', 'super-social-content-locker').'</a>
            <a class="btn_notification" href="javascript:void()" id="already_bought">'.__('– I already bought', 'super-social-content-locker').'</a> 
            </p>
        </blockquote>
		';
	}
	public function update_remind_later_buy(){
        
       $cur_remind_later_date = date('Y-m-d');
       if(get_option('ct_sscl_buy_remind_later')){
         update_option('ct_sscl_buy_remind_later', $cur_remind_later_date);
		}
		else {
		  add_option('ct_sscl_buy_remind_later', $cur_remind_later_date);
		}
        die(0);
    }
	public function update_already_bought(){
        
        if(update_option('ct_sscl_already_bought', '1'))
            die(1);
        else
            die(0);
    }

	
}
