<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.com/
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/responsive-videos/
 */
function workart_jetpack_setup() {
	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'workart_jetpack_setup' );
