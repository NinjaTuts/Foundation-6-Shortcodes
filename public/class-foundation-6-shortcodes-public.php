<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://infiniteloop.co.in
 * @since      1.0.0
 *
 * @package    Foundation_6_Shortcodes
 * @subpackage Foundation_6_Shortcodes/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Foundation_6_Shortcodes
 * @subpackage Foundation_6_Shortcodes/public
 * @author     Abhishek Jain <abhi@infiniteloop.co.in>
 */
class Foundation_6_Shortcodes_Public {

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
		 * defined in Foundation_6_Shortcodes_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Foundation_6_Shortcodes_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// wp_enqueue_style( $this->plugin_name, FN__PLUGIN_DIR_URL . 'css/foundation-6-shortcodes-public.css', array(), $this->version, 'all' );


		wp_enqueue_style( 'foundation-6', FN__PLUGIN_DIR_URL . 'public/css/foundation.min.css', array(), FOUNDATION__VERSION );

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
		 * defined in Foundation_6_Shortcodes_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Foundation_6_Shortcodes_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// wp_enqueue_script( $this->plugin_name, FN__PLUGIN_DIR_URL . 'js/foundation-6-shortcodes-public.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( 'foundation-6', FN__PLUGIN_DIR_URL . 'public/js/foundation.min.js', array( 'jquery' ), FOUNDATION__VERSION, true );

	}

}
