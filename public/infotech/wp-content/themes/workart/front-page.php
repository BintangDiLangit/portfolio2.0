<?php
/**
 * The template for displaying al pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 */

get_header(); 
		// Call home if Homepage setting is set to latest posts.

	if ( workart_is_latest_posts() ) {
		get_template_part( 'template-parts/content', 'home' );

	} elseif ( workart_is_frontpage() ) {
		
		$options = workart_get_theme_options();

		$sorted = explode( ',' , workart_get_homepage_sections() );
		
		foreach ( $sorted as $section ) {
			add_action( 'workart_primary_content', 'workart_add_'. $section .'_section' );
		}
		do_action( 'workart_primary_content' );

		if (true === apply_filters( 'workart_filter_frontpage_content_enable', true ) ) {
			get_template_part( 'page' );
		}
	}
get_footer();