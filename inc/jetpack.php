<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package meta_s2
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function meta_s2_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
		'footer_widgets' => 'footer-widgets',
	) );
}
add_action( 'after_setup_theme', 'meta_s2_jetpack_setup' );