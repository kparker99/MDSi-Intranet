<?php
/**
 * Plugin Name:       Mdsi Custom Blocks
 * Description:       Custom Gutenberg blocks for editing MDSi intranet site
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Kevin Parker
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       mdsi-custom-blocks
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/how-to-guides/block-tutorial/writing-your-first-block-type/
 */
function create_block_mdsi_custom_blocks_block_init() {
	register_block_type( __DIR__ );
}
add_action( 'init', 'create_block_mdsi_custom_blocks_block_init' );
