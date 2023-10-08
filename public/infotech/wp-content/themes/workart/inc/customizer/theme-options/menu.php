<?php
/**
 * Menu options
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'workart_menu',
	array(
		'title'             => esc_html__('Header Menu','workart'),
		'description'       => esc_html__( 'Header Menu options.', 'workart' ),
		'panel'             => 'nav_menus',
	)
);

// Menu sticky setting and control.
$wp_customize->add_setting( 'workart_theme_options[menu_sticky]',
	array(
		'sanitize_callback' => 'workart_sanitize_switch_control',
		'default'           => $options['menu_sticky'],
	)
);

$wp_customize->add_control( new  Workart_Switch_Control( $wp_customize,
	'workart_theme_options[menu_sticky]',
		array(
			'label'             => esc_html__( 'Make Menu Sticky', 'workart' ),
			'section'           => 'workart_menu',
			'on_off_label' 		=> workart_switch_options(),
		)
	)
);

$wp_customize->add_setting( 'workart_theme_options[search_icon_in_primary_menu_enable]',
	array(
		'sanitize_callback' => 'workart_sanitize_switch_control',
		'default'           => $options['search_icon_in_primary_menu_enable'],
	)
);

$wp_customize->add_control( new  Workart_Switch_Control( $wp_customize,
	'workart_theme_options[search_icon_in_primary_menu_enable]',
		array(
			'label'             => esc_html__( 'Show Search Icon', 'workart' ),
			'description'       => esc_html__( 'Show Search Icon in Primary menu', 'workart' ),
			'section'           => 'workart_menu',
			'on_off_label' 		=> workart_switch_options(),
		)
	)
);
