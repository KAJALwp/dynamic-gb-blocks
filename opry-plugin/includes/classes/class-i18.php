<?php
/**
 * The localization functionality of the plugin.
 *
 * @package    opry-plugin
 * @author     Kajal Gohel
 */

declare( strict_types = 1 );

namespace OPRY_PLUGIN\Includes;

use OPRY_PLUGIN\Includes\Traits\Singleton;

/**
 * I18 class file.
 */
class I18 {

	use Singleton;

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
	 */
	public function __construct() {
		$this->setup_local_hooks();
	}

	/**
	 * Function is used to setup local hooks.
	 *
	 * @return void
	 * @since    1.0.0
	 */
	public function setup_local_hooks(): void {
		add_action( 'plugins_loaded', array( $this, 'set_locale' ) );
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Opry_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @return void
	 * @since    1.0.0
	 * @access   private
	 */
	public function set_locale(): void {

		$locale = apply_filters( 'plugin_locale', get_locale(), 'opry-plugin' );
		load_textdomain( 'opry-plugin', sprintf( '%s/%s.mo', OPRY_PLUGIN_LANGUAGE_DIR_PATH, $locale ) );
		load_plugin_textdomain(
			'opry-plugin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}
}
