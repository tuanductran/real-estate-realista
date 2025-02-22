<?php
/**
 * Twenty Twenty-Two: Block Patterns
 *
 * @since Twenty Twenty-Two 1.0
 */

/**
 * Registers block patterns and categories.
 *
 * @since Twenty Twenty-Two 1.0
 *
 * @return void
 */
function real_estate_realista_register_block_patterns() {
	$block_pattern_categories = array(
		'featured' => array( 'label' => __( 'Featured', 'real-estate-realista' ) ),
		'footer'   => array( 'label' => __( 'Footers', 'real-estate-realista' ) ),
		'header'   => array( 'label' => __( 'Headers', 'real-estate-realista' ) ),
		'query'    => array( 'label' => __( 'Query', 'real-estate-realista' ) ),
		'pages'    => array( 'label' => __( 'Pages', 'real-estate-realista' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'real_estate_realista_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$block_patterns = array(
		'footer-about-title-logo',
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'real_estate_realista_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( '/blocks/patterns/' . $block_pattern . '.php' );

		register_block_pattern(
			'real_estate_realista/' . $block_pattern,
			require $pattern_file
		);
	}
}
add_action( 'init', 'real_estate_realista_register_block_patterns', 9 );
