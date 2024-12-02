<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    opry-plugin
 * @subpackage opry-plugin/admin
 * @author     Kajal Gohel
 */

declare( strict_types = 1 );

namespace OPRY_PLUGIN\Includes;

use OPRY_PLUGIN\Includes\Traits\Singleton;

/**
 * Main class file.
 */
class Admin {

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
	 * The options of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array    $opry_options    The options of this plugin.
	 */
	private $opry_options;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'OPRY_PLUGIN_VERSION' ) ) {
			$this->version = OPRY_PLUGIN_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->setup_admin_hooks();
	}
	/**
	 * Function is used to define admin hooks.
	 *
	 * @return void
	 * @since   1.0.0
	 */
	public function setup_admin_hooks(): void {
		add_action( 'init', array( $this, 'kg_register_custom_posttype' ) );
		add_action( 'init', array( $this, 'kg_register_custom_taxonomy' ) );
		add_action( 'admin_menu', array( $this, 'opry_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'opry_page_init' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}


	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @return void
	 * @since    1.0.0
	 */
	public function enqueue_styles(): void {
		wp_enqueue_style( 'opry-plugin', OPRY_PLUGIN_URL . 'assets/build/admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @return void
	 * @since    1.0.0
	 */
	public function enqueue_scripts(): void {
		wp_enqueue_script( 'opry-plugin', OPRY_PLUGIN_URL . 'assets/build/admin.js', array( 'jquery' ), $this->version, false );

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
	 * Function is used to register custom post type
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function kg_register_custom_posttype(): void {
		$labels = array(
			'name'                  => _x( 'News', 'News General Name', 'opry-plugin' ),
			'singular_name'         => _x( 'News', 'News Singular Name', 'opry-plugin' ),
			'menu_name'             => __( 'News', 'opry-plugin' ),
			'name_admin_bar'        => __( 'News', 'opry-plugin' ),
			'archives'              => __( 'Item Archives', 'opry-plugin' ),
			'attributes'            => __( 'Item Attributes', 'opry-plugin' ),
			'parent_item_colon'     => __( 'Parent Item:', 'opry-plugin' ),
			'all_items'             => __( 'All Items', 'opry-plugin' ),
			'add_new_item'          => __( 'Add New Item', 'opry-plugin' ),
			'add_new'               => __( 'Add New', 'opry-plugin' ),
			'new_item'              => __( 'New Item', 'opry-plugin' ),
			'edit_item'             => __( 'Edit Item', 'opry-plugin' ),
			'update_item'           => __( 'Update Item', 'opry-plugin' ),
			'view_item'             => __( 'View Item', 'opry-plugin' ),
			'view_items'            => __( 'View Items', 'opry-plugin' ),
			'search_items'          => __( 'Search Item', 'opry-plugin' ),
			'not_found'             => __( 'Not found', 'opry-plugin' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'opry-plugin' ),
			'featured_image'        => __( 'Featured Image', 'opry-plugin' ),
			'set_featured_image'    => __( 'Set featured image', 'opry-plugin' ),
			'remove_featured_image' => __( 'Remove featured image', 'opry-plugin' ),
			'use_featured_image'    => __( 'Use as featured image', 'opry-plugin' ),
			'insert_into_item'      => __( 'Insert into item', 'opry-plugin' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'opry-plugin' ),
			'items_list'            => __( 'Items list', 'opry-plugin' ),
			'items_list_navigation' => __( 'Items list navigation', 'opry-plugin' ),
			'filter_items_list'     => __( 'Filter items list', 'opry-plugin' ),
		);
		$args   = array(
			'label'               => __( 'News', 'opry-plugin' ),
			'description'         => __( 'Sample News', 'opry-plugin' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		register_post_type( 'news', $args );
	}

	/**
	 * Function is used register custom taxonomy
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function kg_register_custom_taxonomy(): void {

		$labels = array(
			'name'                       => _x( 'News Categories', 'Taxonomy General Name', 'opry-plugin' ),
			'singular_name'              => _x( 'News Category', 'Taxonomy Singular Name', 'opry-plugin' ),
			'menu_name'                  => __( 'Taxonomy', 'opry-plugin' ),
			'all_items'                  => __( 'All Items', 'opry-plugin' ),
			'parent_item'                => __( 'Parent Item', 'opry-plugin' ),
			'parent_item_colon'          => __( 'Parent Item:', 'opry-plugin' ),
			'new_item_name'              => __( 'New Item Name', 'opry-plugin' ),
			'add_new_item'               => __( 'Add New Item', 'opry-plugin' ),
			'edit_item'                  => __( 'Edit Item', 'opry-plugin' ),
			'update_item'                => __( 'Update Item', 'opry-plugin' ),
			'view_item'                  => __( 'View Item', 'opry-plugin' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'opry-plugin' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'opry-plugin' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'opry-plugin' ),
			'popular_items'              => __( 'Popular Items', 'opry-plugin' ),
			'search_items'               => __( 'Search Items', 'opry-plugin' ),
			'not_found'                  => __( 'Not Found', 'opry-plugin' ),
			'no_terms'                   => __( 'No items', 'opry-plugin' ),
			'items_list'                 => __( 'Items list', 'opry-plugin' ),
			'items_list_navigation'      => __( 'Items list navigation', 'opry-plugin' ),
		);
		$args   = array(
			'labels'            => $labels,
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
		);
		register_taxonomy( 'kgnews', array( 'news' ), $args );
	}

	/**
	 * Function is used to create plugin page
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function opry_add_plugin_page(): void {
		add_menu_page(
			__( 'Opry', 'opry-plugin' ), // page_title.
			__( 'Opry', 'opry-plugin' ), // menu_title.
			'manage_options', // capability.
			'opry-plugin', // menu_slug.
			array( $this, 'opry_create_admin_page' ), // function.
			'dashicons-admin-generic', // icon_url.
			2 // position.
		);
	}

	/**
	 * Function is used to create admin page
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function opry_create_admin_page(): void {
		$this->opry_options = get_option( 'opry_option_name' ); ?>

		<div class="wrap">
			<h2><?php esc_html_e( 'Opry', 'opry-plugin' ); ?></h2>
			<p></p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'opry_option_group' );
					do_settings_sections( 'opry-plugin-admin' );
					submit_button();
				?>
			</form>
		</div>
		<?php
	}

	/**
	 * Function is used register settings.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function opry_page_init(): void {
		register_setting(
			'opry_option_group', // option_group.
			'opry_option_name', // option_name.
			array( $this, 'opry_sanitize' ) // sanitize_callback.
		);

		add_settings_section(
			'opry_setting_section', // id.
			__( 'Settings', 'opry-plugin' ), // title.
			array( $this, 'opry_section_info' ), // callback.
			'opry-plugin-admin' // page.
		);

		add_settings_field(
			'sample_0', // id.
			__( 'Sample', 'opry-plugin' ), // title.
			array( $this, 'sample_0_callback' ), // callback.
			'opry-plugin-admin', // page.
			'opry_setting_section' // section.
		);
	}

	/**
	 * Function is used to sanitise inputs.
	 *
	 * @param array $input Input array.
	 * @return array
	 */
	public function opry_sanitize( array $input ): array {
		$sanitary_values = array();
		if ( isset( $input['sample_0'] ) ) {
			$sanitary_values['sample_0'] = sanitize_text_field( $input['sample_0'] );
		}

		return $sanitary_values;
	}

	/**
	 * Used to show section info.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function opry_section_info(): void {
	}

	/**
	 * Settings field callback function.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function sample_0_callback(): void {
		printf(
			'<input class="regular-text" type="text" name="opry_option_name[sample_0]" id="sample_0" value="%s">',
			isset( $this->opry_options['sample_0'] ) ? esc_attr( $this->opry_options['sample_0'] ) : ''
		);
	}
}
