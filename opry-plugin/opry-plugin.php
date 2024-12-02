<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://profiles.wordpress.org/kajalgohel/
 * @since             1.0.0
 * @package           opry-plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Opry
 * Plugin URI:        https://profiles.wordpress.org/kajalgohel/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           2.0
 * Author:            Kajal Gohel
 * Author URI:        https://profiles.wordpress.org/kajalgohel/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       opry-plugin
 * Domain Path:       /languages
 */

namespace OPRY_PLUGIN;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'OPRY_PLUGIN_VERSION', '2.0' );
define( 'OPRY_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'OPRY_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'OPRY_PLUGIN_BASEPATH', plugin_basename( __FILE__ ) );
define( 'OPRY_PLUGIN_SRC_BLOCK_DIR_PATH', untrailingslashit( OPRY_PLUGIN_DIR . 'assets/build/blocks' ) );
define( 'OPRY_PLUGIN_LANGUAGE_DIR_PATH', untrailingslashit( OPRY_PLUGIN_DIR . '/languages' ) );
define( 'OPRY_PLUGIN_BUILD_LIBRARY_URI', untrailingslashit( OPRY_PLUGIN_URL . 'assets/library' ) );


if ( ! defined( 'OPRY_PLUGIN_BUILD_URI' ) ) {
	define( 'OPRY_PLUGIN_BUILD_URI', untrailingslashit( OPRY_PLUGIN_DIR . '/assets/build' ) );
}

if ( ! defined( 'OPRY_PLUGIN_DIR_PATH' ) ) {
	define( 'OPRY_PLUGIN_DIR_PATH', __DIR__ );
}

// Load the autoloader.
require_once plugin_dir_path( __FILE__ ) . '/includes/helpers/autoloader.php';


register_activation_hook( __FILE__, array( \OPRY_PLUGIN\Includes\Activator::class, 'activate' ) );
register_deactivation_hook( __FILE__, array( \OPRY_PLUGIN\Includes\Deactivator::class, 'deactivate' ) );

/**
 * Begins execution of the plugin.
 *
 * @return void
 * @since    1.0.0
 */
function run_kg_scaffold(): void {
	new \OPRY_PLUGIN\Includes\Opry_Plugin();
}
run_kg_scaffold();
