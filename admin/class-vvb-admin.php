<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://siamkreative.com/
 * @since      1.0.0
 *
 * @package    Vvb
 * @subpackage Vvb/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Vvb
 * @subpackage Vvb/admin
 * @author     Julien Vernet <julien@vernet.me>
 */
class Vvb_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->register_cpt();
		$this->register_taxonomy();

	}

	/**
	 * Register Custom Post Type
	 *
	 * @since    1.0.0
	 */
	public static function register_cpt() {

		register_extended_post_type( 'client', array(

			# Override menu icon
			'menu_icon' => 'dashicons-images-alt2',

			# Add the post type to the site's main RSS feed:
			'show_in_feed' => true,

			# Add some custom columns to the admin screen:
			'admin_cols' => array(
				'added_date' => array(
				    'title' => 'Published',
				    'post_field' => 'post_date',
				),
				'type' => array(
					'taxonomy' => 'category'
				)
			),

			# Add a dropdown filter to the admin screen:
			'admin_filters' => array(
				'type' => array(
					'taxonomy' => 'category'
				)
			)

		), array(

			# Override the base names used for labels:
			'singular' => 'Client',
			'plural'   => 'Clients',
			'slug'     => 'clients'

		) );

	}

	/**
	 * Register Custom Taxonomy
	 *
	 * @since    1.0.0
	 */
	public static function register_taxonomy() {

		register_extended_taxonomy( 'category', 'client', array(

			# Show this taxonomy in the 'At a Glance' dashboard widget:
			'dashboard_glance' => true,

		), array(

			# Override the base names used for labels:
			'singular' => 'Category',
			'plural'   => 'Categories',
			'slug'     => 'categories'

		) );

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
		 * defined in Vvb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Vvb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/vvb-admin.css', array(), $this->version, 'all' );

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
		 * defined in Vvb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Vvb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/vvb-admin.js', array( 'jquery' ), $this->version, false );

	}

}
