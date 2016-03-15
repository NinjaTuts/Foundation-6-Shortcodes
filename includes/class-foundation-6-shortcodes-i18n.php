<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://infiniteloop.co.in
 * @since      1.0.0
 *
 * @package    Foundation_6_Shortcodes
 * @subpackage Foundation_6_Shortcodes/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Foundation_6_Shortcodes
 * @subpackage Foundation_6_Shortcodes/includes
 * @author     Abhishek Jain <abhi@infiniteloop.co.in>
 */
class Foundation_6_Shortcodes_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'foundation-6-shortcodes',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
