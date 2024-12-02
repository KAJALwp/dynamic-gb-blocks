<?php
/**
 * The core plugin class.
 *
 * @since      1.0.0
 * @package    opry-plugin
 * @subpackage opry-plugin/includes
 * @author     Kajal Gohel
 */

declare( strict_types = 1 );

namespace OPRY_PLUGIN\Includes;

use OPRY_PLUGIN\Includes\Blocks;
use OPRY_PLUGIN\Includes\Traits\Singleton;

/**
 * Main class File.
 */
class Opry_Plugin {

	use Singleton;

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Opry_Loader    $loader    Maintains and registers all hooks for the plugin.
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
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'OPRY_PLUGIN_VERSION' ) ) {
			$this->version = OPRY_PLUGIN_VERSION;
		} else {
			$this->version = '2.0.0';
		}
		$this->plugin_name = 'opry-plugin';

		Front::get_instance();
		Admin::get_instance();
		Activator::get_instance();
		Deactivator::get_instance();
		I18::get_instance();
		Blocks::get_instance();
		Register_Post_Types::get_instance();
		Register_Taxonomies::get_instance();
	}
}
