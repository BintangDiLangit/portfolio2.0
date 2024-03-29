<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'workart_single_post_section',
	array(
		'title'             => esc_html__( 'Single Post','workart' ),
		'description'       => esc_html__( 'Options to change the single posts globally.', 'workart' ),
		'panel'             => 'workart_theme_options_panel',
	)
);

// Archive date meta setting and control.
$wp_customize->add_setting( 'workart_theme_options[single_post_hide_date]',
	array(
		'default'           => $options['single_post_hide_date'],
		'sanitize_callback' => 'workart_sanitize_switch_control',
	)
);

$wp_customize->add_control( new  Workart_Switch_Control( $wp_customize,
	'workart_theme_options[single_post_hide_date]',
		array(
			'label'             => esc_html__( 'Hide Date', 'workart' ),
			'section'           => 'workart_single_post_section',
			'on_off_label' 		=> workart_hide_options(),
		)
	)
);

// Archive author meta setting and control.
$wp_customize->add_setting( 'workart_theme_options[single_post_hide_author]',
	array(
		'default'           => $options['single_post_hide_author'],
		'sanitize_callback' => 'workart_sanitize_switch_control',
	)
);

$wp_customize->add_control( new  Workart_Switch_Control( $wp_customize,
	'workart_theme_options[single_post_hide_author]',
		array(
			'label'             => esc_html__( 'Hide Author', 'workart' ),
			'section'           => 'workart_single_post_section',
			'on_off_label' 		=> workart_hide_options(),
		)
	)
);
