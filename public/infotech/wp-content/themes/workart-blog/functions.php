<?php

function workart_blog_setup() {
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'social' 	=> esc_html__( 'Social', 'workart-blog' ),
		) );

	}
add_action( 'after_setup_theme', 'workart_blog_setup' );

if ( ! function_exists( 'workart_blog_enqueue_styles' ) ) :

	function workart_blog_enqueue_styles() {
		wp_enqueue_style( 'workart-blog-style-parent', get_template_directory_uri() . '/style.css' );

		wp_enqueue_style( 'workart-blog-style', get_stylesheet_directory_uri() . '/style.css', array( 'workart-blog-style-parent' ), '1.0.0' );

		wp_enqueue_script( 'workart-blog-custom', get_theme_file_uri() . '/custom.js', array(), '1.0', true );

		wp_enqueue_style( 'workart-blog-fonts', wptt_get_webfont_url( workart_blog_fonts_url() ), array(), null );

	}
endif;
add_action( 'wp_enqueue_scripts', 'workart_blog_enqueue_styles', 99 );

function workart_blog_customize_control_js() {

	wp_enqueue_style( 'workart-blog-customize-controls-css', get_theme_file_uri() . '/customizer-control.css' );

}
add_action( 'customize_controls_enqueue_scripts', 'workart_blog_customize_control_js' );



if ( !function_exists( 'workart_blog_block_editor_styles' ) ):

	function workart_blog_block_editor_styles() {
		wp_enqueue_style( 'workart-blog-fonts', wptt_get_webfont_url( workart_blog_fonts_url() ), array(), null );
	}

endif;

add_action( 'enqueue_block_editor_assets', 'workart_blog_block_editor_styles' );


if ( ! function_exists( 'workart_blog_fonts_url' ) ) :

function workart_blog_fonts_url() {
	
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'workart-blog' ) ) {
		$fonts[] = 'Poppins:400,500,600,700';
	}

	$query_args = array(
		'family' => urlencode( implode( '|', $fonts ) ),
		'subset' => urlencode( $subsets ),
	);

	if ( $fonts ) {
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

endif;



require get_theme_file_path() . '/inc/customizer.php';

require get_theme_file_path() . '/inc/front-sections/slider.php';

require get_theme_file_path() . '/inc/front-sections/about.php';

require get_theme_file_path() . '/inc/front-sections/cta.php';

require get_theme_file_path() . '/inc/front-sections/recent-posts.php';

