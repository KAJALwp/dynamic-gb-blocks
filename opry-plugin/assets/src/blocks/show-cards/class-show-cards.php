<?php
/**
 * Registers the opry-plugin/show-cards block.
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
 *  Class for the opry-plugin/show-cards block.
 */
class Show_Cards extends Block_Base {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->_block = 'show-cards';
	}
}
