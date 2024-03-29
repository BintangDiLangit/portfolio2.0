<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Workart
* @since Workart 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'workart_theme_options[enable_frontpage_content]',
	array(
		'sanitize_callback'   => 'workart_sanitize_checkbox',
		'default'             => $options['enable_frontpage_content'],
	)
);

$wp_customize->add_control( 'workart_theme_options[enable_frontpage_content]',
	array(
		'label'       	=> esc_html__( 'Enable Content', 'workart' ),
		'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'workart' ),
		'section'     	=> 'static_front_page',
		'type'        	=> 'checkbox',
		'active_callback' => 'workart_is_static_homepage_enable',
	)
);