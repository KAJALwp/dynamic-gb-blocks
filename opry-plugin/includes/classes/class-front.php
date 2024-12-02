<?php
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    opry-plugin
 * @subpackage opry-plugin/public
 * @author     Kajal Gohel
 */

declare( strict_types = 1 );

namespace OPRY_PLUGIN\Includes;

use OPRY_PLUGIN\Includes\Traits\Singleton;

/**
 * Frontend main class.
 */
class Front {


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
		if ( defined( 'OPRY_PLUGIN_VERSION' ) ) {
			$this->version = OPRY_PLUGIN_VERSION;
		} else {
			$this->version = '2.0.0';
		}
		$this->setup_front_hooks();
	}

	/**
	 * All public facing hook will be placed under this function.
	 *
	 * @return void
	 */
	public function setup_front_hooks(): void {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		add_action( 'enqueue_block_assets', array( $this, 'enqueue_editor_assets' ) );
		add_filter( 'script_loader_tag', array( $this, 'script_additional_attrs' ), 10, 2 );
		add_filter( 'should_load_separate_core_block_assets', '__return_true' );
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @return void
	 * @since    1.0.0
	 */
	public function enqueue_styles(): void {
		wp_enqueue_style( 'opry-plugin-front', OPRY_PLUGIN_URL . 'assets/build/main.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @return void
	 * @since    1.0.0
	 */
	public function enqueue_scripts(): void {
		wp_enqueue_script( 'opry-plugin', OPRY_PLUGIN_URL . 'assets/build/main.js', array( 'jquery' ), $this->version, false );

		wp_localize_script(
			'opry-plugin',
			'siteConfig',
			array(
				'ajaxUrl'    => admin_url( 'admin-ajax.php' ),
				'ajax_nonce' => wp_create_nonce( 'loadmore_post_nonce' ),
			)
		);
	}

	/**
	 * Function for checking Slick Block
	 *
	 * @return boolean
	 * @since 1.0.0
	 */
	protected function is_slick_block() {
		if ( has_block( 'opry-plugin/image-slider' ) || has_block( 'opry-plugin/upcoming-event' ) || has_block( 'opry-plugin/insta-blog' ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Enqueue editor scripts and styles.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function enqueue_editor_assets(): void {

		wp_enqueue_style(
			'opry-font-awesome',
			OPRY_PLUGIN_BUILD_LIBRARY_URI . '/css/fontawesome.min.css',
			array(),
			'1.0.0',
			'all'
		);

		if ( is_admin() || $this->is_slick_block() ) {

			wp_enqueue_script(
				'opry-slick',
				OPRY_PLUGIN_BUILD_LIBRARY_URI . '/js/slick.min.js',
				array( 'jquery' ),
				'1.0.0',
				true
			);
		}
		if ( is_admin() || $this->is_slick_block() ) {
			wp_enqueue_style(
				'opry-slick',
				OPRY_PLUGIN_BUILD_LIBRARY_URI . '/css/slick.min.css',
				array(),
				'1.0.0',
				'all'
			);
		}

		// Change block Priority to head.
		$blocks = \WP_Block_Type_Registry::get_instance()->get_all_registered();
		foreach ( $blocks as $block ) {
			if ( has_block( $block->name ) ) {
				wp_enqueue_style( $block->style );
			}
		}
	}

	/**
	 * Identify script and do the lazy load.
	 *
	 * @param string $tag Tags string.
	 * @param string $handle Handle name.
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function script_additional_attrs( string $tag, string $handle ): string {
		if ( 'grs-ad' === $handle ) {
			return str_replace( ' src', ' data-type="lazy" data-src', $tag );
		}

		return $tag;
	}
}
