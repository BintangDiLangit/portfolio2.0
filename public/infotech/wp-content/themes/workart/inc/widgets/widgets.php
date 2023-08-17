<?php
/**
 * Theme Palace widgets inclusion
 *
 * This is the template that includes all custom widgets of Workart
 *
 * @package Theme Palace
 * @subpackage Workart
 * @since Workart 1.0.0
 */

/*

/*
 * Add popular post widget
 */
require get_template_directory() . '/inc/widgets/social-link-widget.php';
/*

/**
 * Register widgets
 */
function workart_register_widgets() {

	register_widget( 'Workart_Social_Link' );

}
add_action( 'widgets_init', 'workart_register_widgets' );