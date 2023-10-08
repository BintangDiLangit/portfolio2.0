<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'workart_layout',
	array(
		'title'               => esc_html__('Layout','workart'),
		'description'         => esc_html__( 'Layout section options.', 'workart' ),
		'panel'               => 'workart_theme_options_panel',
	)
);

// Site layout setting and control.
$wp_customize->add_setting( 'workart_theme_options[site_layout]',
	array(
		'sanitize_callback'   => 'workart_sanitize_select',
		'default'             => $options['site_layout'],
	)
);

$wp_customize->add_control(  new  Workart_Custom_Radio_Image_Control ( $wp_customize,
	'workart_theme_options[site_layout]',
		array(
			'label'               => esc_html__( 'Site Layout', 'workart' ),
			'section'             => 'workart_layout',
			'choices'			  => workart_site_layout(),
		)
	)
);

// Sidebar position setting and control.
$wp_customize->add_setting( 'workart_theme_options[sidebar_position]',
	array(
		'sanitize_callback'   => 'workart_sanitize_select',
		'default'             => $options['sidebar_position'],
	)
);

$wp_customize->add_control(  new  Workart_Custom_Radio_Image_Control ( $wp_customize,
	'workart_theme_options[sidebar_position]',
		array(
			'label'               => esc_html__( 'Global Sidebar Position', 'workart' ),
			'section'             => 'workart_layout',
			'choices'			  => workart_global_sidebar_position(),
		)
	)
);

// Post sidebar position setting and control.
$wp_customize->add_setting( 'workart_theme_options[post_sidebar_position]',
	array(
		'sanitize_callback'   => 'workart_sanitize_select',
		'default'             => $options['post_sidebar_position'],
	)
);

$wp_customize->add_control(  new  Workart_Custom_Radio_Image_Control ( $wp_customize,
	'workart_theme_options[post_sidebar_position]',
		array(
			'label'               => esc_html__( 'Posts Sidebar Position', 'workart' ),
			'section'             => 'workart_layout',
			'choices'			  => workart_sidebar_position(),
		)
	)
);

// Post sidebar position setting and control.
$wp_customize->add_setting( 'workart_theme_options[page_sidebar_position]',
	array(
		'sanitize_callback'   => 'workart_sanitize_select',
		'default'             => $options['page_sidebar_position'],
	)
);

$wp_customize->add_control( new  Workart_Custom_Radio_Image_Control( $wp_customize,
	'workart_theme_options[page_sidebar_position]',
		array(
			'label'               => esc_html__( 'Pages Sidebar Position', 'workart' ),
			'section'             => 'workart_layout',
			'choices'			  => workart_sidebar_position(),
		)
	)
);