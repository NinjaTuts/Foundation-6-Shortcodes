<?php

/**
 * The plugin bootstrap file
 *
 * @link              http://www.liftoffllc.com
 * @since             1.0.0
 * @package           Lo_Core
 *
 * Plugin Name:       LO Core
 * Plugin URI:        http://www.liftoffllc.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Abhishek Jain
 * Author URI:        http://www.liftoffllc.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       lo-core
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


define( 'LO_CORE__VERSION', '3.9.4' );

define( 'LO_CORE__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

define( 'LO_CORE__PLUGIN_FILE', __FILE__ );


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-lo-core-activator.php
 */
function activate_lo_core() {
	require_once LO_CORE__PLUGIN_DIR . 'includes/class-lo-core-activator.php';
	Lo_Core_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-lo-core-deactivator.php
 */
function deactivate_lo_core() {
	require_once LO_CORE__PLUGIN_DIR . 'includes/class-lo-core-deactivator.php';
	Lo_Core_Deactivator::deactivate();
}

register_activation_hook( LO_CORE__PLUGIN_FILE, 'activate_lo_core' );
register_deactivation_hook( LO_CORE__PLUGIN_FILE, 'deactivate_lo_core' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require LO_CORE__PLUGIN_DIR . 'includes/class-lo-core.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_lo_core() {

	$plugin = new Lo_Core();
	$plugin->run();

}
run_lo_core();
