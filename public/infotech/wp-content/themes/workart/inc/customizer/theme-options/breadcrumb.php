<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 */

$wp_customize->add_section( 'workart_breadcrumb',
	array(
		'title'             => esc_html__( 'Breadcrumb','workart' ),
		'description'       => esc_html__( 'Breadcrumb section options.', 'workart' ),
		'panel'             => 'workart_theme_options_panel',
	)
);

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'workart_theme_options[breadcrumb_enable]',
	array(
		'sanitize_callback' => 'workart_sanitize_switch_control',
		'default'          	=> $options['breadcrumb_enable'],
	)
);

$wp_customize->add_control( new  Workart_Switch_Control( $wp_customize,
	'workart_theme_options[breadcrumb_enable]',
		array(
			'label'            	=> esc_html__( 'Enable Breadcrumb', 'workart' ),
			'section'          	=> 'workart_breadcrumb',
			'on_off_label' 		=> workart_switch_options(),
		)
	)
);

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'workart_theme_options[breadcrumb_separator]',
	array(
		'sanitize_callback'	=> 'sanitize_text_field',
		'default'          	=> $options['breadcrumb_separator'],
	)
);

$wp_customize->add_control( 'workart_theme_options[breadcrumb_separator]',
	array(
		'label'            	=> esc_html__( 'Separator', 'workart' ),
		'active_callback' 	=> 'workart_is_breadcrumb_enable',
		'section'          	=> 'workart_breadcrumb',
	)
);
