<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.codetides.com/
 * @since             1.2.1
 * @package           Super_Social_Content_Locker_Lite
 *
 * @wordpress-plugin
 * Plugin Name:       Super Social Content Locker
 * Plugin URI:        https://1.envato.market/k2zvn
 * Description:       Super Social Content Locker is all in one social locker plugin with most popular features. Every feature can be used as a sidebar widget or anywhere in the website using its shortcode. Features Are: Follow to unlock content, Share to unlock Content, Rates us to unlock content, vote x times to unlock content, Fill the form to unlock content and play an advertisement video to unlock content and become an member to unlock content.
 * Version:           1.2.1
 * Author:            CodeTides
 * Author URI:        https://goo.gl/wnt0kK
 * Company URI:       https://goo.gl/wnt0kK
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       super-social-content-locker-lite
 * Domain Path:       /languages
 */



// Create a helper function for easy SDK access.
function sscll_fs() {
    global $sscll_fs;

    if ( ! isset( $sscll_fs ) ) {
        // Include Freemius SDK.
        require_once dirname(__FILE__) . '/freemius/start.php';

        $sscll_fs = fs_dynamic_init( array(
            'id'                  => '940',
            'slug'                => 'super-social-content-locker-lite',
            'type'                => 'plugin',
            'public_key'          => 'pk_df27157b1ed36760931f96c28ff95',
            'is_premium'          => false,
            'has_addons'          => false,
            'has_paid_plans'      => false,
            'menu'                => array(
                'first-path'     => 'edit.php?post_type=ct_sscl',
                'account'        => false,
                'contact'        => false,
                'support'        => false,
            ),
        ) );
    }

    return $sscll_fs;
}

// Init Freemius.
sscll_fs();
// Signal that SDK was initiated.
do_action( 'sscll_fs_loaded' );


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SUPER_SOCIAL_CONTENT_LOCKER_LITE_VERSION', '1.2.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-super-social-content-locker-lite-activator.php
 */
function activate_super_social_content_locker_lite() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-super-social-content-locker-lite-activator.php';
	Super_Social_Content_Locker_Lite_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-super-social-content-locker-lite-deactivator.php
 */
function deactivate_super_social_content_locker_lite() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-super-social-content-locker-lite-deactivator.php';
	Super_Social_Content_Locker_Lite_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_super_social_content_locker_lite' );
register_deactivation_hook( __FILE__, 'deactivate_super_social_content_locker_lite' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-super-social-content-locker-lite.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_super_social_content_locker_lite() {

	$plugin = new Super_Social_Content_Locker_Lite();
	$plugin->run();

}
run_super_social_content_locker_lite();
