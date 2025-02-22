<?php
/**
 * Plugin Name: My Custom Block
 * Description: A custom Gutenberg block for WordPress.
 * Version: 1.0
 * Author: Your Name
 *
 * @package my-custom-block
 */

defined( 'ABSPATH' ) || exit;

add_action( 'enqueue_block_editor_assets', function () {
    wp_enqueue_script(
        'my-custom-block-editor-script',
		get_stylesheet_directory_uri() . '/blocks/gutenbergs/rer-block.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n', 'wp-url' ),
        1.0
    );
} );
