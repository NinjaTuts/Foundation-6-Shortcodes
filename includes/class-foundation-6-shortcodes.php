<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://infiniteloop.co.in
 * @since      1.0.0
 *
 * @package    Foundation_6_Shortcodes
 * @subpackage Foundation_6_Shortcodes/includes
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
 * @package    Foundation_6_Shortcodes
 * @subpackage Foundation_6_Shortcodes/includes
 * @author     Abhishek Jain <abhi@infiniteloop.co.in>
 */
class Foundation_6_Shortcodes {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Foundation_6_Shortcodes_Loader    $loader    Maintains and registers all hooks for the plugin.
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

		$this->plugin_name = 'foundation-6-shortcodes';
		$this->version = '1.0.0';

		$this->load_dependencies();
		$this->load_shortcodes();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Foundation_6_Shortcodes_Loader. Orchestrates the hooks of the plugin.
	 * - Foundation_6_Shortcodes_i18n. Defines internationalization functionality.
	 * - Foundation_6_Shortcodes_Admin. Defines all hooks for the admin area.
	 * - Foundation_6_Shortcodes_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-foundation-6-shortcodes-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-foundation-6-shortcodes-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-foundation-6-shortcodes-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-foundation-6-shortcodes-public.php';

		$this->loader = new Foundation_6_Shortcodes_Loader();

	}

	private function load_shortcodes() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		foreach( glob( plugin_dir_path( dirname( __FILE__ ) ) . '/shortcodes/**/*.php' ) as $filename ) {
			require_once $filename;
		}

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Foundation_6_Shortcodes_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Foundation_6_Shortcodes_i18n();

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

		$plugin_admin = new Foundation_6_Shortcodes_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Foundation_6_Shortcodes_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {

		$this->loader->run();
		add_action( 'wp_footer', array( $this, 'intialize_foundation_js' ), 100 );
		add_filter( 'the_content', array( $this, 'shortcodes_cleanup' ) );

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
	 * @return    Foundation_6_Shortcodes_Loader    Orchestrates the hooks of the plugin.
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

	/**
	 * Initialize Foundation JavaScript
	 */
	public function intialize_foundation_js() {
		echo '<script>jQuery(document).foundation();</script>';
	}


	/**
	 * Remove extra <p> </p> and <br /> tags from the shortcodes added by TinyMCE
	 *
	 * @since     1.0.0
	 * @return    string    The content of the page/post
	 */
	public function shortcodes_cleanup( $content ) {

		// array of custom shortcodes requiring the fix 
		$block = join( '|', array(
			'fn_accordion',
			'fn_badge',
			'fn_btn',
			'fn_btn_group',
			'fn_callout',
			'fn_col',
			'fn_flex_video',
			'fn_label',
			'fn_lead',
			'fn_orbit',
			'fn_row',
			'fn_slide',
			'fn_slider',
			'fn_subheader',
			'fn_switch',
			'fn_tab',
			'fn_tabs',
			'fn_toggle',
			'fn_tooltip',
		) );

		// opening p tag and br tag
		$content = preg_replace( "/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/", "[$2$3]", $content );
			
		// closing p tag and br tag
		$content = preg_replace( "/(<p>)?\[\/($block)](<\/p>|<br \/>)?/", "[/$2]", $content );

		return $content;

	}

}
