<?php
/**
 * Featured Artist Section options
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 */

// Add Featured Artist section
$wp_customize->add_section( 'workart_featured_artist_section',
	array(
		'title'             => esc_html__( 'Featured Artist','workart' ),
		'description'       => esc_html__( 'Featured Artist Section options.', 'workart' ),
		'panel'             => 'workart_front_page_panel',
	) 
);

// Featured Artist content enable control and setting
$wp_customize->add_setting( 'workart_theme_options[featured_artist_section_enable]', 
	array(
		'default'			=> 	$options['featured_artist_section_enable'],
		'sanitize_callback' => 'workart_sanitize_switch_control',
	) 
);

$wp_customize->add_control( new  Workart_Switch_Control( $wp_customize,
	'workart_theme_options[featured_artist_section_enable]',
		array(
			'label'             => esc_html__( 'Featured Artist Section Enable', 'workart' ),
			'section'           => 'workart_featured_artist_section',
			'on_off_label' 		=> workart_switch_options(),
		)
	)
);

// Featured artist sub title setting
$wp_customize->add_setting('workart_theme_options[featured_artist_sub_title]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['featured_artist_sub_title']
    )
);

$wp_customize->add_control('workart_theme_options[featured_artist_sub_title]',
    array(
        'section'			=> 'workart_featured_artist_section', 
        'label'				=> esc_html__( 'Section Sub Title:', 'workart' ),
        'type'          	=>'text',
        'active_callback' 	=> 'workart_is_featured_artist_section_enable'
    )
);

$wp_customize->selective_refresh->add_partial('workart_theme_options[featured_artist_sub_title]',
    array(
        'selector'            => '#workart_featured_artist_section div.section-header p.section-subtitle',
        'render_callback'     => 'workart_featured_artist_sub_title_partial',
    )
);

for ( $i = 1; $i <= $options['featured_artist_count']; $i++ ) :

	// featured_artist pages drop down chooser control and setting
	$wp_customize->add_setting( 'workart_theme_options[featured_artist_content_page_'. $i .']', 
		array(
			'sanitize_callback' => 'workart_sanitize_page',
		)
	);

	$wp_customize->add_control( new  Workart_Dropdown_Chooser( $wp_customize,
		'workart_theme_options[featured_artist_content_page_'. $i .']', 
			array(
				'label'             => sprintf(esc_html__( 'Select Page: %d', 'workart'), $i ),
				'section'           => 'workart_featured_artist_section',
				'choices'			=> workart_page_choices(),
				'active_callback'	=> 'workart_is_featured_artist_section_enable',
			)
		)
	);
	
    // Workart_Customize_Horizontal_Line
    $wp_customize->add_setting('workart_theme_options[featured_artist_separator'. $i .']',
		array(
			'sanitize_callback'      => 'workart_sanitize_html',
		)
	);

    $wp_customize->add_control(new  Workart_Customize_Horizontal_Line($wp_customize,
		'workart_theme_options[featured_artist_separator'. $i .']',
			array(
				'active_callback'       => 'workart_is_featured_artist_section_enable',
				'type'                  =>'hr',
				'section'               =>'workart_featured_artist_section',
			)
		)
	);

endfor;
