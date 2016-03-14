<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://www.liftoffllc.com
 * @since      1.0.0
 *
 * @package    Lo_Core
 * @subpackage Lo_Core/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Lo_Core
 * @subpackage Lo_Core/includes
 * @author     Abhishek Jain <abhishek@liftoffllc.com>
 */
class Lo_Core_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'lo-core',
			false,
			dirname( dirname( plugin_basename( LO_CORE__PLUGIN_FILE ) ) ) . '/languages/'
		);

	}



}
