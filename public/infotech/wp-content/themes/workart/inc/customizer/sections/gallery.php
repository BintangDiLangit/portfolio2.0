<?php
/**
 * gallery Section options
 *
 * @package Theme Palace
 * @subpackage Workart
 * @since Workart 1.0.0
 */

// Add gallery section
$wp_customize->add_section( 'workart_gallery_section',
    array(
        'title'             => esc_html__( 'Gallery','workart' ),
        'description'       => esc_html__( 'Gallery Section options.', 'workart' ),
        'panel'             => 'workart_front_page_panel',
    )
);

// gallery content enable control and setting
$wp_customize->add_setting( 'workart_theme_options[gallery_section_enable]',
    array(
        'default'           =>  $options['gallery_section_enable'],
        'sanitize_callback' => 'workart_sanitize_switch_control',
    )
);

$wp_customize->add_control( new Workart_Switch_Control( $wp_customize,
    'workart_theme_options[gallery_section_enable]',
        array(
            'label'             => esc_html__( 'Gallery Section Enable', 'workart' ),
            'section'           => 'workart_gallery_section',
            'on_off_label'      => workart_switch_options(),
        )
    )
);

// gallery section sub title control and setting
$wp_customize->add_setting('workart_theme_options[gallery_sub_title]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
        'default'  => $options['gallery_sub_title'],
    )
);

$wp_customize->add_control('workart_theme_options[gallery_sub_title]',
    array(
        'label' => esc_html__('Section Sub Title', 'workart'),
        'section' => 'workart_gallery_section',
        'type' => 'text',
        'active_callback' => 'workart_is_gallery_section_enable',
    )
);

$wp_customize->selective_refresh->add_partial('workart_theme_options[gallery_sub_title]',
    array(
        'selector' => '#workart_gallery_section .section-subtitle',
        'render_callback' => 'workart_gallery_sub_title_partial',
    )
);

// gallery title setting and control
$wp_customize->add_setting( 'workart_theme_options[gallery_title]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => $options['gallery_title'],
        'transport'         => 'postMessage',
    )
);

$wp_customize->add_control( 'workart_theme_options[gallery_title]',
    array(
        'label'             => esc_html__( 'Section Title', 'workart' ),
        'section'           => 'workart_gallery_section',
        'active_callback'   => 'workart_is_gallery_section_enable',
        'type'              => 'text',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'workart_theme_options[gallery_title]',
        array(
            'selector'            => '#workart_gallery_section .section-header h2',
            'settings'            => 'workart_theme_options[gallery_title]',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
            'render_callback'     => 'workart_gallery_title_partial',
        )
    );
}

// Add dropdown category setting and control.
$wp_customize->add_setting(  'workart_theme_options[gallery_content_category]',
    array(
        'sanitize_callback' => 'workart_sanitize_single_category',
    )
);

$wp_customize->add_control( new Workart_Dropdown_Taxonomies_Control( $wp_customize,
    'workart_theme_options[gallery_content_category]',
        array(
            'label'             => esc_html__( 'Select Category', 'workart' ),
            'description'       => esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'workart' ),
            'section'           => 'workart_gallery_section',
            'type'              => 'dropdown-taxonomies',
            'active_callback'   => 'workart_is_gallery_section_enable'
        )
    )
);
