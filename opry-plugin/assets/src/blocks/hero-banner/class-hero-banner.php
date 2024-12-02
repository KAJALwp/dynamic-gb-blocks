<?php
/**
 * Registers the opry-plugin/hero-banner block.
 *
 * @global array    $attrs   Block attributes passed to the render callback.
 * @global string   $content Block content from InnerBlocks passed to the render callback.
 * @global WP_Block $block   Block registration object.
 *
 * @package opry-plugin
 */

namespace OPRY_PLUGIN\Blocks;

use OPRY_PLUGIN\Includes\Block_Base;

/**
 * hero-banner class.
 */
class Hero_Banner extends Block_Base {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->_block = 'hero-banner';

	}
}
