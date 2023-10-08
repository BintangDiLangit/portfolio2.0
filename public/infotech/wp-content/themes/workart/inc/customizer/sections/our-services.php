<?php
/**
 * Service Section options
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 */

// Add Service section
$wp_customize->add_section( 'workart_our_services_section', 
	array(
		'title'             => esc_html__( 'Our Services','workart' ),
		'description'       => esc_html__( 'Our Services Section options.', 'workart' ),
		'panel'             => 'workart_front_page_panel',
	) 
);

// Service content enable control and setting
$wp_customize->add_setting( 'workart_theme_options[our_services_section_enable]', 
	array(
		'default'			=> 	$options['our_services_section_enable'],
		'sanitize_callback' => 'workart_sanitize_switch_control',
	) 
);

$wp_customize->add_control( new  Workart_Switch_Control( $wp_customize,
	'workart_theme_options[our_services_section_enable]', 
		array(
			'label'             => esc_html__( 'Our Services Section Enable', 'workart' ),
			'section'           => 'workart_our_services_section',
			'on_off_label' 		=> workart_switch_options(),
		) 
	)
);


// Service section sub title control and setting
$wp_customize->add_setting( 'workart_theme_options[our_services_section_sub_title]', 
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'			=>'postMessage',
		'default'           => $options['our_services_section_sub_title'],
	) 
);

$wp_customize->add_control('workart_theme_options[our_services_section_sub_title]', 
	array(
		'label'             => esc_html__( 'Section Sub Title', 'workart' ),
		'section'           => 'workart_our_services_section',
		'type'              => 'text',
		'active_callback'	=> 'workart_is_our_services_section_enable',
	)
);

$wp_customize->selective_refresh->add_partial('workart_theme_options[our_services_section_sub_title]',
    array(
        'selector'            => '#workart_our_services_section .section-subtitle',
        'render_callback'     => 'workart_our_services_section_partial_sub_title',
    )
);

// Service section title control and setting
$wp_customize->add_setting( 'workart_theme_options[our_services_section_title]', 
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'			=> 'postMessage',
		'default'           => $options['our_services_section_title'],
	) 
);

$wp_customize->add_control('workart_theme_options[our_services_section_title]', 
	array(
		'label'             => esc_html__( 'Section Title', 'workart' ),
		'section'           => 'workart_our_services_section',
		'type'              =>'text',
		'active_callback'	=> 'workart_is_our_services_section_enable',
	)
);
$wp_customize->selective_refresh->add_partial(
    'workart_theme_options[our_services_section_title]',
    array(
        'selector'            => '#workart_our_services_section .section-title',
        'render_callback'     => 'workart_our_services_section_partial_title',
    )
);


for($i = 1; $i <= $options['our_services_posts_count']; $i ++):
		
    $wp_customize->add_setting( 'workart_theme_options[our_services_icon_' . $i . ']', 
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

	$wp_customize->add_control( new Workart_Icon_Picker( $wp_customize,
		'workart_theme_options[our_services_icon_' . $i . ']',
			array(
				'label'             => sprintf( esc_html__( 'Service Icon %d', 'workart' ), $i ),
				'section'           => 'workart_our_services_section',
				'active_callback'	=> 'workart_is_our_services_section_enable',
			)
		)
	);

    // service pages drop down chooser control and setting
	$wp_customize->add_setting( 'workart_theme_options[our_services_content_page_'.$i.']',
		array(
			'sanitize_callback' => 'workart_sanitize_page',
		) 
	);

	$wp_customize->add_control( new  Workart_Dropdown_Chooser( $wp_customize,
		'workart_theme_options[our_services_content_page_'.$i.']',
			array(
				'label'             => sprintf(esc_html__( 'Select Page : %d', 'workart'), $i ),
				'section'           => 'workart_our_services_section',
				'choices'			=> workart_page_choices(),
				'active_callback'	=> 'workart_is_our_services_section_enable',
			) 
		)
	);

    // Workart_Customize_Horizontal_Line
    $wp_customize->add_setting('workart_theme_options[our_services_separator'. $i .']',
		array(
			'sanitize_callback'      => 'workart_sanitize_html',
		)
	);

    $wp_customize->add_control(new  Workart_Customize_Horizontal_Line($wp_customize,
		'workart_theme_options[our_services_separator'. $i .']',
			array(
				'active_callback'       => 'workart_is_our_services_section_enable',
				'type'                  =>'hr',
				'section'               =>'workart_our_services_section',
			)
		)
	);

endfor;

// Service Excerpt length setting and control.
$wp_customize->add_setting( 'workart_theme_options[our_services_excerpt_length]',
	array(
		'sanitize_callback' => 'workart_sanitize_number_range',
		'default'			=> $options['our_services_excerpt_length'],
	)
);

$wp_customize->add_control( 'workart_theme_options[our_services_excerpt_length]',
	array(
		'label'       		=> esc_html__( 'Excerpt Length', 'workart' ),
		'description' 		=> esc_html__( 'Total words to be displayed in Service section', 'workart' ),
		'section'     		=> 'workart_our_services_section',
		'type'        		=> 'number',
		'active_callback' 	=> 'workart_is_our_services_section_enable',
	)
);
