<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://www.codetides.com/
 * @since      1.0.0
 *
 * @package    Super_Social_Content_Locker_Lite
 * @subpackage Super_Social_Content_Locker_Lite/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Super_Social_Content_Locker_Lite
 * @subpackage Super_Social_Content_Locker_Lite/includes
 * @author     CodeTides <codetides@gmail.com>
 */
class Super_Social_Content_Locker_Lite_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'super-social-content-locker-lite',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
