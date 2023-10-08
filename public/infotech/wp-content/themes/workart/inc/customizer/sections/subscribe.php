<?php
/**
 * Subscription Section options
 *
 * @package Theme Palace
 * @subpackage Workart
 * @since Workart 1.0.0
 */

// Subscription section
$wp_customize->add_section('workart_subscribe_section',
    array(
        'title'         => esc_html__( 'Subscription', 'workart' ),
        'description'   => sprintf( esc_html__( '%1$sJetpack%2$s should be active and site should be connected to WordPress.com for this section to work.', 'workart' ), '<a target="_blank" href="https://wordpress.org/plugins/jetpack">', '</a>' ),
        'panel'         => 'workart_front_page_panel',
    )
);

// Subscription enable setting
$wp_customize->add_setting('workart_theme_options[subscribe_section_enable]',
    array(
        'sanitize_callback' => 'workart_sanitize_switch_control',
        'default'           => $options['subscribe_section_enable'],
    )
);

$wp_customize->add_control(new Workart_Switch_Control($wp_customize,
    'workart_theme_options[subscribe_section_enable]',
        array(
            'section'		=> 'workart_subscribe_section',
            'label'			=> esc_html__( 'Enable subscribe.', 'workart' ),
            'on_off_label'  => workart_switch_options(),
        )
    )
);

// Subscription Background image setting
$wp_customize->add_setting('workart_theme_options[subscribe_bg_image]',
    array(
        'sanitize_callback' => 'workart_sanitize_image',
    )
);

$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize,
    'workart_theme_options[subscribe_bg_image]',
        array(
            'section'			=> 'workart_subscribe_section',
            'label'				=> esc_html__( 'Background Image:', 'workart' ),
            'active_callback' 	=> 'workart_is_subscribe_section_enable',
        )
    )
);

// Subscribe title setting
$wp_customize->add_setting('workart_theme_options[subscribe_section_subtitle]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => $options['subscribe_section_subtitle'],
        'transport'	        => 'postMessage',
    )
);

$wp_customize->add_control('workart_theme_options[subscribe_section_subtitle]',
    array(
        'section'		    => 'workart_subscribe_section',
        'label'			    => esc_html__( 'Section Sub Title:', 'workart' ),
        'active_callback'   => 'workart_is_subscribe_section_enable',
        'type'              =>'text'
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'workart_theme_options[subscribe_section_subtitle]',
		array(
			'selector'            => '#workart_subscribe_section header.entry-header p.section-subtitle',
			'settings'            => 'workart_theme_options[subscribe_section_subtitle]',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'workart_subscribe_section_subtitle_partial',
		) 
	);
}

// Subscribe title setting
$wp_customize->add_setting('workart_theme_options[subscribe_section_title]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => $options['subscribe_section_title'],
        'transport'	        => 'postMessage',
    )
);

$wp_customize->add_control('workart_theme_options[subscribe_section_title]',
    array(
        'section'		    => 'workart_subscribe_section',
        'label'			    => esc_html__( 'Section Title:', 'workart' ),
        'active_callback'   => 'workart_is_subscribe_section_enable',
        'type'              =>'text'
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'workart_theme_options[subscribe_section_title]',
		array(
			'selector'            => '#workart_subscribe_section header.entry-header h2.entry-title',
			'settings'            => 'workart_theme_options[subscribe_section_title]',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'workart_subscribe_section_title_partial',
		) 
	);
}

// Subscribe title setting
$wp_customize->add_setting('workart_theme_options[subscribe_section_description]',
    array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => $options['subscribe_section_description'],
        'transport'	        => 'postMessage',
    )
);

$wp_customize->add_control('workart_theme_options[subscribe_section_description]',
    array(
        'section'		    => 'workart_subscribe_section',
        'label'			    => esc_html__( 'Section Description:', 'workart' ),
        'active_callback'   => 'workart_is_subscribe_section_enable',
        'type'              =>'textarea'
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'workart_theme_options[subscribe_section_description]',
		array(
			'selector'            => '#workart_subscribe_section div.entry-content p',
			'settings'            => 'workart_theme_options[subscribe_section_description]',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'workart_subscribe_section_description_partial',
		) 
	);
}

// Subscribe button text setting
$wp_customize->add_setting('workart_theme_options[subscribe_section_btn_txt]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => $options['subscribe_section_btn_txt'],
    )
);

$wp_customize->add_control('workart_theme_options[subscribe_section_btn_txt]',
    array(
        'section'		    => 'workart_subscribe_section',
        'label'			    => esc_html__( 'Button text:', 'workart' ),
        'active_callback'   => 'workart_is_subscribe_section_enable'
    )
);
    
// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'workart_theme_options[subscribe_section_btn_txt]',
        array(
            'selector'            => '#workart_subscribe_section div.subscribe-form-wrapper #subscribe-submit button',
            'settings'            => 'workart_theme_options[subscribe_section_btn_txt]',
            'fallback_refresh'    => true,
            'container_inclusive' => false,
            'render_callback'     => 'workart_subscribe_section_btn_txt_partial',
        ) 
    );
}