<?php
/**
 * Hero Slider Section options
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 */

// Add Hero Slider section
$wp_customize->add_section( 'workart_hero_slider_section',
	array(
		'title'             => esc_html__( 'Hero Slider','workart' ),
		'description'       => esc_html__( 'Hero Slider Section options.', 'workart' ),
		'panel'             => 'workart_front_page_panel',
	)
);

// Hero Slider content enable control and setting
$wp_customize->add_setting( 'workart_theme_options[hero_slider_section_enable]', 
	array(
		'default'			=> 	$options['hero_slider_section_enable'],
		'sanitize_callback' => 'workart_sanitize_switch_control',
	) 
);

$wp_customize->add_control( new  Workart_Switch_Control( $wp_customize,
	'workart_theme_options[hero_slider_section_enable]',
		array(
			'label'             => esc_html__( 'Hero Slider Section Enable', 'workart' ),
			'section'           => 'workart_hero_slider_section',
			'on_off_label' 		=> workart_switch_options(),
		)
	)
);

// hero slider section sub title control and setting
$wp_customize->add_setting( 'workart_theme_options[hero_slider_section_sub_title]', 
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'			=>'postMessage',
		'default'           => $options['hero_slider_section_sub_title'],
	) 
);

$wp_customize->add_control('workart_theme_options[hero_slider_section_sub_title]', 
	array(
		'label'             => esc_html__( 'Section Sub Title', 'workart' ),
		'section'           => 'workart_hero_slider_section',
		'type'              =>'text',
		'active_callback'	=> 'workart_is_hero_slider_section_enable',
	)
);

$wp_customize->selective_refresh->add_partial('workart_theme_options[hero_slider_section_sub_title]',
    array(
        'selector'            => '#workart_hero_slider_section .section-subtitle',
        'render_callback'     => 'workart_hero_slider_section_sub_title_partial',
    )
);

// hero slider section title control and setting
$wp_customize->add_setting( 'workart_theme_options[hero_slider_section_title]', 
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'			=>'postMessage',
		'default'           => $options['hero_slider_section_title'],
		
	) 
);

$wp_customize->add_control('workart_theme_options[hero_slider_section_title]', 
	array(
		'label'             => esc_html__( 'Section Title', 'workart' ),
		'section'           => 'workart_hero_slider_section',
		'type'              =>'text',
		'active_callback'	=> 'workart_is_hero_slider_section_enable',
	)
);

$wp_customize->selective_refresh->add_partial(
    'workart_theme_options[hero_slider_section_title]',
    array(
        'selector'            => '#workart_hero_slider_section .section-title',
        'render_callback'     => 'workart_hero_slider_section_title_partial',
    )
);

// Hero Slider content type control and setting
$wp_customize->add_setting( 'workart_theme_options[hero_slider_content_type]',
	array(
		'default'          	=> $options['hero_slider_content_type'],
		'sanitize_callback' => 'workart_sanitize_select',
	)
);

$wp_customize->add_control( 'workart_theme_options[hero_slider_content_type]',
	array(
		'label'             => esc_html__( 'Content Type', 'workart' ),
		'section'           => 'workart_hero_slider_section',
		'type'				=> 'select',
		'active_callback' 	=> 'workart_is_hero_slider_section_enable',
		'choices'			=> workart_hero_slider_content_type(),
	)
);


for ( $i = 1; $i <= $options['hero_slider_count']; $i++ ) :

	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'workart_theme_options[hero_slider_content_page_'. $i .']', 
		array(
			'sanitize_callback' => 'workart_sanitize_page',
		)
	);

	$wp_customize->add_control( new  Workart_Dropdown_Chooser( $wp_customize,
		'workart_theme_options[hero_slider_content_page_'. $i .']', 
			array(
				'label'             => sprintf(esc_html__( 'Select Page: %d', 'workart'), $i ),
				'section'           => 'workart_hero_slider_section',
				'choices'			=> workart_page_choices(),
				'active_callback'	=> 'workart_is_hero_slider_section_content_page_enable',
			)
		)
	);
	
    // Workart_Customize_Horizontal_Line
    $wp_customize->add_setting('workart_theme_options[hero_slider_separator'. $i .']',
		array(
			'sanitize_callback'      => 'workart_sanitize_html',
		)
	);

    $wp_customize->add_control(new  Workart_Customize_Horizontal_Line($wp_customize,
		'workart_theme_options[hero_slider_separator'. $i .']',
			array(
				'active_callback'       => 'workart_is_hero_slider_section_content_page_enable',
				'type'                  =>'hr',
				'section'               =>'workart_hero_slider_section',
			)
		)
	);

endfor;

$wp_customize->add_setting(  'workart_theme_options[hero_slider_product_category]',
    array(
        'sanitize_callback' => 'absint',
    )
);

$wp_customize->add_control( new Workart_Dropdown_Taxonomies_Control( $wp_customize,
    'workart_theme_options[hero_slider_product_category]',
        array(
            'label'             => esc_html__( 'Select Product Categories', 'workart' ),
			'description'       => esc_html__( 'Note: Latest product will be shown from selected category', 'workart' ),
            'section'           => 'workart_hero_slider_section',
            'taxonomy'          => 'product_cat',
            'type'              => 'dropdown-taxonomies',
            'active_callback'   => 'workart_is_hero_slider_section_content_product_category_enable',
        )
    )
);

//hero_slider_btn_alt_txt
$wp_customize->add_setting('workart_theme_options[hero_slider_btn_alt_txt]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['hero_slider_btn_alt_txt'],
    )
);

//hero_slider_btn_txt
$wp_customize->add_setting('workart_theme_options[hero_slider_btn_txt]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['hero_slider_btn_txt'],
    )
);

$wp_customize->add_control('workart_theme_options[hero_slider_btn_txt]',
    array(
        'section'			=> 'workart_hero_slider_section',
        'label'				=> esc_html__( 'Button Text:', 'workart' ),
        'type'          	=>'text',
        'active_callback' 	=> 'workart_is_hero_slider_section_enable'
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'workart_theme_options[hero_slider_btn_txt]',
		array(
			'selector'            => '#workart_hero_slider_section article div.buttons-wrapper a:nth-child(1)',
			'settings'            => 'workart_theme_options[hero_slider_btn_txt]',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'workart_hero_slider_btn_txt_partial',
		) 
	);
}