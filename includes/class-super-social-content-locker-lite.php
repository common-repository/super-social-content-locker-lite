<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://www.codetides.com/
 * @since      1.0.0
 *
 * @package    Super_Social_Content_Locker_Lite
 * @subpackage Super_Social_Content_Locker_Lite/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Super_Social_Content_Locker_Lite
 * @subpackage Super_Social_Content_Locker_Lite/includes
 * @author     CodeTides <codetides@gmail.com>
 */
class Super_Social_Content_Locker_Lite {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Super_Social_Content_Locker_Lite_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'SUPER_SOCIAL_CONTENT_LOCKER_LITE_VERSION' ) ) {
			$this->version = SUPER_SOCIAL_CONTENT_LOCKER_LITE_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'super-social-content-locker-lite';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Super_Social_Content_Locker_Lite_Loader. Orchestrates the hooks of the plugin.
	 * - Super_Social_Content_Locker_Lite_i18n. Defines internationalization functionality.
	 * - Super_Social_Content_Locker_Lite_Admin. Defines all hooks for the admin area.
	 * - Super_Social_Content_Locker_Lite_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-super-social-content-locker-lite-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-super-social-content-locker-lite-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-super-social-content-locker-lite-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/function-super-social-content-locker-lite-admin.php';
		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-super-social-content-locker-lite-public.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/function-super-social-content-locker-lite-public.php';

		$this->loader = new Super_Social_Content_Locker_Lite_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Super_Social_Content_Locker_Lite_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Super_Social_Content_Locker_Lite_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Super_Social_Content_Locker_Lite_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		
		$this->loader->add_action( 'init', $plugin_admin, 'register_cpt_sscl' );
		$this->loader->add_action( 'add_meta_boxes', $plugin_admin,  'add_cpt_sscl_meta_box' );
		$this->loader->add_action( 'save_post',$plugin_admin, 'save_cpt_sscl_meta_box' );
        $this->loader->add_action('admin_menu', $plugin_admin, 'replace_submit_meta_box');
		$this->loader->add_filter('admin_footer_text', $plugin_admin, 'sscl_footer_admin_text');
		$this->loader->add_filter('manage_edit-ct_sscl_columns',  $plugin_admin, 'super_social_content_locker_columns');
		$this->loader->add_action( 'manage_ct_sscl_posts_custom_column',  $plugin_admin,'super_social_content_locker_columns_data', 10, 2 );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'add_submenu_pages' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'initialize_sscl_options' );
		$this->loader->add_action( 'admin_notices',$plugin_admin, 'codetides_ask_to_buy_admin_notice' );
		$this->loader->add_action( 'wp_ajax_update_remind_later_buy',  $plugin_admin, 'update_remind_later_buy' );
        $this->loader->add_action( 'wp_ajax_nopriv_update_remind_later_buy', $plugin_admin, 'update_remind_later_buy' );
		$this->loader->add_action( 'wp_ajax_update_already_bought',  $plugin_admin, 'update_already_bought' );
        $this->loader->add_action( 'wp_ajax_nopriv_update_already_bought', $plugin_admin, 'update_already_bought' );		
		
		

		
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Super_Social_Content_Locker_Lite_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		
		
		$this->loader->add_action( 'init', $plugin_public, 'display_content_locker_shortcodes' );
		
		$this->loader->add_action('wp_ajax_getFacebookLikeUnlockContent',$plugin_public, 'getFacebookLikeUnlockContent' );
		$this->loader->add_action( 'wp_ajax_nopriv_getFacebookLikeUnlockContent', $plugin_public,'getFacebookLikeUnlockContent' );
		
        $this->loader->add_action('wp_ajax_getFacebookShareUnlockContent',$plugin_public, 'getFacebookShareUnlockContent' );
		$this->loader->add_action( 'wp_ajax_nopriv_getFacebookShareUnlockContent', $plugin_public,'getFacebookShareUnlockContent' );
		
        $this->loader->add_action('wp_ajax_getTwitterShareUnlockContent',$plugin_public, 'getTwitterShareUnlockContent' );
		$this->loader->add_action( 'wp_ajax_nopriv_getTwitterShareUnlockContent', $plugin_public,'getTwitterShareUnlockContent' );
		
		$this->loader->add_action('wp_ajax_getTwitterFollowUnlockContent',$plugin_public, 'getTwitterFollowUnlockContent' );
		$this->loader->add_action( 'wp_ajax_nopriv_getTwitterFollowUnlockContent', $plugin_public,'getTwitterFollowUnlockContent' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Super_Social_Content_Locker_Lite_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
