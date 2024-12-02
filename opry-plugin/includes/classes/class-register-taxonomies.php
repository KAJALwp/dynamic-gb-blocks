<?php
/**
 * Register Custom Taxonomies
 *
 * @package opry-plugin
 */

namespace OPRY_PLUGIN\Includes;

use OPRY_PLUGIN\Includes\Traits\Singleton;

/**
 * Class for register taxonomies.
 */
class Register_Taxonomies {
	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	/**
	 * To register action/filter.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'init', array( $this, 'register_year_taxonomy' ) );
		add_action( 'init', array( $this, 'register_artist_taxonomy' ) );
	}

	/**
	 * Register Taxonomy Year.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function register_year_taxonomy() {

		$labels = array(
			'name'              => _x( 'Years', 'taxonomy general name', 'opry-plugin' ),
			'singular_name'     => _x( 'Year', 'taxonomy singular name', 'opry-plugin' ),
			'search_items'      => __( 'Search Years', 'opry-plugin' ),
			'all_items'         => __( 'All Years', 'opry-plugin' ),
			'parent_item'       => __( 'Parent Year', 'opry-plugin' ),
			'parent_item_colon' => __( 'Parent Year:', 'opry-plugin' ),
			'edit_item'         => __( 'Edit Year', 'opry-plugin' ),
			'update_item'       => __( 'Update Year', 'opry-plugin' ),
			'add_new_item'      => __( 'Add New Year', 'opry-plugin' ),
			'new_item_name'     => __( 'New Year Name', 'opry-plugin' ),
			'menu_name'         => __( 'Year', 'opry-plugin' ),
		);
		$args   = array(
			'labels'             => $labels,
			'description'        => __( 'Movie Release Year', 'opry-plugin' ),
			'hierarchical'       => false,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_nav_menus'  => true,
			'show_tagcloud'      => true,
			'show_in_quick_edit' => true,
			'show_admin_column'  => true,
			'show_in_rest'       => true,
		);
		register_taxonomy( 'movie-year', array( 'movies' ), $args );
	}

	/**
	 * Register Taxonomy Artist.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function register_artist_taxonomy() {

		$labels = array(
			'name'              => _x( 'Artists', 'taxonomy general name', 'opry-plugin' ),
			'singular_name'     => _x( 'Artist', 'taxonomy singular name', 'opry-plugin' ),
			'search_items'      => __( 'Search Artists', 'opry-plugin' ),
			'all_items'         => __( 'All Artists', 'opry-plugin' ),
			'parent_item'       => __( 'Parent Artist', 'opry-plugin' ),
			'parent_item_colon' => __( 'Parent Artist:', 'opry-plugin' ),
			'edit_item'         => __( 'Edit Artist', 'opry-plugin' ),
			'update_item'       => __( 'Update Artist', 'opry-plugin' ),
			'add_new_item'      => __( 'Add New Artist', 'opry-plugin' ),
			'new_item_name'     => __( 'New Artist Name', 'opry-plugin' ),
			'menu_name'         => __( 'Artist', 'opry-plugin' ),
		);
		$args   = array(
			'labels'             => $labels,
			'description'        => __( 'Event Artist', 'opry-plugin' ),
			'hierarchical'       => false,
			'public'             => false,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_nav_menus'  => true,
			'show_tagcloud'      => true,
			'show_in_quick_edit' => true,
			'show_admin_column'  => true,
			'show_in_rest'       => true,
			'rewrite'            => array(
				'with_front' => false,
				'slug'       => ( 'event-artist' ),
			),
		);
		register_taxonomy( 'event-artist', array( 'events' ), $args );
	}
}
