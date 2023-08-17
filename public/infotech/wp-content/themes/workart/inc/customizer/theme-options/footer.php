<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'workart_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'workart' ),
		'priority'   			=> 900,
		'panel'      			=> 'workart_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'workart_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'workart_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);

$wp_customize->add_control( 'workart_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'workart' ),
		'section'    			=> 'workart_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'workart_theme_options[copyright_text]',
		array(
			'selector'            => '.site-info .wrapper',
			'settings'            => 'workart_theme_options[copyright_text]',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'workart_copyright_text_partial',
		)
	);
}

// scroll top visible
$wp_customize->add_setting( 'workart_theme_options[scroll_top_visible]',
	array(
		'default'       	=> $options['scroll_top_visible'],
		'sanitize_callback' => 'workart_sanitize_switch_control',
	)
);

$wp_customize->add_control( new  Workart_Switch_Control( $wp_customize,
	'workart_theme_options[scroll_top_visible]',
		array(
			'label'      		=> esc_html__( 'Display Scroll Top Button', 'workart' ),
			'section'    		=> 'workart_section_footer',
			'on_off_label' 		=> workart_switch_options(),
		)
	)
);
