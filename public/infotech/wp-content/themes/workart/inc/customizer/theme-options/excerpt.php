<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'workart_excerpt_section',
	array(
		'title'             => esc_html__( 'Excerpt','workart' ),
		'description'       => esc_html__( 'Excerpt section options.', 'workart' ),
		'panel'             => 'workart_theme_options_panel',
	)
);


// long Excerpt length setting and control.
$wp_customize->add_setting( 'workart_theme_options[long_excerpt_length]',
	array(
		'sanitize_callback' => 'workart_sanitize_number_range',
		'validate_callback' => 'workart_validate_long_excerpt',
		'default'			=> $options['long_excerpt_length'],
	)
);

$wp_customize->add_control( 'workart_theme_options[long_excerpt_length]',
	array(
		'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'workart' ),
		'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'workart' ),
		'section'     		=> 'workart_excerpt_section',
		'type'        		=> 'number',
		'input_attrs' 		=> array(
			'style'       => 'width: 80px;',
			'max'         => 100,
			'min'         => 5,
		),
	)
);
