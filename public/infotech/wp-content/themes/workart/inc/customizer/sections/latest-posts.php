<?php
/**
 * Latest Post Section options
 *
 * @package Theme Palace
 * @subpackage Workart
 * @since Workart 1.0.0
 */

// Add Latest Post section
$wp_customize->add_section( 'workart_latest_posts_section',
    array(
        'title'             => esc_html__( 'Latest Post','workart' ),
        'description'       => esc_html__( 'Latest Post Section options.', 'workart' ),
        'panel'             => 'workart_front_page_panel',
    )
);

// Latest Post content enable control and setting
$wp_customize->add_setting( 'workart_theme_options[latest_posts_section_enable]',
    array(
        'default'           =>  $options['latest_posts_section_enable'],
        'sanitize_callback' => 'workart_sanitize_switch_control',
    )
);

$wp_customize->add_control( new Workart_Switch_Control( $wp_customize,
    'workart_theme_options[latest_posts_section_enable]',
        array(
            'label'             => esc_html__( 'Latest Post Section Enable', 'workart' ),
            'section'           => 'workart_latest_posts_section',
            'on_off_label'      => workart_switch_options(),
        ) 
    )
);

// latest_post section sub title control and setting
$wp_customize->add_setting('workart_theme_options[latest_posts_sub_title]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
        'default'  => $options['latest_posts_sub_title'],
    )
);

$wp_customize->add_control('workart_theme_options[latest_posts_sub_title]',
    array(
        'label' => esc_html__('Section Sub Title', 'workart'),
        'section' => 'workart_latest_posts_section',
        'type' => 'text',
        'active_callback' => 'workart_is_latest_posts_section_enable',
    )
);

$wp_customize->selective_refresh->add_partial('workart_theme_options[latest_posts_sub_title]',
    array(
        'selector' => '#workart_latest_posts_section .section-subtitle',
        'render_callback' => 'workart_latest_posts_sub_title_partial',
    )
);

// latest_post title setting and control
$wp_customize->add_setting( 'workart_theme_options[latest_posts_title]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => $options['latest_posts_title'],
        'transport'         => 'postMessage',
    )
);

$wp_customize->add_control( 'workart_theme_options[latest_posts_title]',
    array(
        'label'             => esc_html__( 'Section Title', 'workart' ),
        'section'           => 'workart_latest_posts_section',
        'active_callback'   => 'workart_is_latest_posts_section_enable',
        'type'              => 'text',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'workart_theme_options[latest_posts_title]',
        array(
            'selector'            => '#workart_latest_posts_section .section-header h2',
            'settings'            => 'workart_theme_options[latest_posts_title]',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
            'render_callback'     => 'workart_latest_posts_title_partial',
        )
    );
}

// Add dropdown category setting and control.
$wp_customize->add_setting(  'workart_theme_options[latest_posts_content_category]',
    array(
        'sanitize_callback' => 'workart_sanitize_single_category',
    )
);

$wp_customize->add_control( new Workart_Dropdown_Taxonomies_Control( $wp_customize,
    'workart_theme_options[latest_posts_content_category]',
        array(
            'label'             => esc_html__( 'Select Category', 'workart' ),
            'description'       => esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'workart' ),
            'section'           => 'workart_latest_posts_section',
            'type'              => 'dropdown-taxonomies',
            'active_callback'   => 'workart_is_latest_posts_section_enable'
        )
    )
);

// Popular Post Read More content setting
$wp_customize->add_setting('workart_theme_options[latest_posts_read_more_btn_label]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['latest_posts_read_more_btn_label']

    )
);

$wp_customize->add_control('workart_theme_options[latest_posts_read_more_btn_label]',
    array(
        'section'			=> 'workart_latest_posts_section',
        'label'				=> esc_html__( 'Read More Button Label', 'workart' ),
        'type'          	=>'text',
        'active_callback'	=> 'workart_is_latest_posts_section_enable'
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'workart_theme_options[latest_posts_read_more_btn_label]',
        array(
            'selector'            => '#workart_latest_posts_section div.read-more a',
            'settings'            => 'workart_theme_options[latest_posts_read_more_btn_label]',
            'fallback_refresh'    => true,
            'container_inclusive' => false,
            'render_callback'     => 'workart_latest_posts_read_more_btn_label_partial',
        ) 
    );
}
