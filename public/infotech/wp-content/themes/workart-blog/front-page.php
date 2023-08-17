<?php

get_header(); 

	if ( workart_is_latest_posts() ) {
		get_template_part( 'template-parts/content', 'home' );

	} elseif ( workart_is_frontpage() ) {
		
		$options = workart_get_theme_options();

		$sorted = array( 'slider', 'about', 'cta', 'recent_posts' );
		
		foreach ( $sorted as $section ) {
			if ( $section == 'slider' || $section == 'about' || $section == 'cta' || $section == 'recent_posts' || $section == 'featured_posts' ) {
				add_action( 'workart_blog_primary_content', 'workart_blog_add_'. $section .'_section' );
			}else{
				add_action( 'workart_blog_primary_content', 'workart_add_'. $section .'_section' );
			}			
		}
		do_action( 'workart_blog_primary_content' );

		if (true === apply_filters( 'workart_filter_frontpage_content_enable', true ) ) {
			get_template_part( 'page' );
		}
	}
get_footer();