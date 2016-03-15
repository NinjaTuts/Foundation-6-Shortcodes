<?php

/**
 * The plugin bootstrap file
 *
 * @link              http://infiniteloop.co.in
 * @since             1.0.0
 * @package           Foundation_6_Shortcodes
 *
 * @wordpress-plugin
 * Plugin Name:       Foundation 6 Shortcodes
 * Plugin URI:        http://infiniteloop.co.in
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Abhishek Jain
 * Author URI:        http://infiniteloop.co.in
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       foundation-6-shortcodes
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'FOUNDATION__VERSION', '6.2.0' );
define( 'FN6S__VERSION', '1.0.0' );
define( 'FN6S__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'FN6S__PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-foundation-6-shortcodes-activator.php
 */
function activate_foundation_6_shortcodes() {
	require_once FN6S__PLUGIN_DIR . 'includes/class-foundation-6-shortcodes-activator.php';
	Foundation_6_Shortcodes_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-foundation-6-shortcodes-deactivator.php
 */
function deactivate_foundation_6_shortcodes() {
	require_once FN6S__PLUGIN_DIR . 'includes/class-foundation-6-shortcodes-deactivator.php';
	Foundation_6_Shortcodes_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_foundation_6_shortcodes' );
register_deactivation_hook( __FILE__, 'deactivate_foundation_6_shortcodes' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require FN6S__PLUGIN_DIR . 'includes/class-foundation-6-shortcodes.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_foundation_6_shortcodes() {

	$plugin = new Foundation_6_Shortcodes();
	$plugin->run();

}
run_foundation_6_shortcodes();
