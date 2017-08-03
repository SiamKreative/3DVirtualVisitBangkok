<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://siamkreative.com/
 * @since             1.0.0
 * @package           Vvb
 *
 * @wordpress-plugin
 * Plugin Name:       3D Virtual Visit Bangkok
 * Plugin URI:        https://github.com/SiamKreative/3DVirtualVisitBangkok
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Julien Vernet
 * Author URI:        https://siamkreative.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       vvb
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-vvb-activator.php
 */
function activate_vvb() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vvb-activator.php';
	Vvb_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-vvb-deactivator.php
 */
function deactivate_vvb() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vvb-deactivator.php';
	Vvb_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_vvb' );
register_deactivation_hook( __FILE__, 'deactivate_vvb' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-vvb.php';

/**
 * The external libraries which provide extended functionality
 * to WordPress custom post types and taxonomies.
 */
require plugin_dir_path( __FILE__ ) . 'vendor/extended-cpts.php';
require plugin_dir_path( __FILE__ ) . 'vendor/extended-taxos.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_vvb() {

	$plugin = new Vvb();
	$plugin->run();

}
run_vvb();
