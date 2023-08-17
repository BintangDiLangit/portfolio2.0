<?php

$wp_customize->add_section( 'workart_featured_slider_section',
	array(
		'title'             => esc_html__( 'Featured Slider','workart-blog' ),
		'description'       => esc_html__( 'Featured Slider Section options.', 'workart-blog' ),
		'panel'             => 'workart_front_page_panel',
		'priority'  => 5,
	)
);

$wp_customize->add_setting( 'featured_slider_section_enable', 
	array(
		'default'			=> 	false,
		'sanitize_callback' => 'workart_sanitize_switch_control',
	) 
);

$wp_customize->add_control( new  workart_blog_Switch_Control( $wp_customize,
	'featured_slider_section_enable',
		array(
			'label'             => esc_html__( 'Featured Slider Section Enable', 'workart-blog' ),
			'section'           => 'workart_featured_slider_section',
			'on_off_label' 		=> workart_switch_options(),
		)
	)
);

for ( $i = 1; $i <= 3; $i++ ) :

	$wp_customize->add_setting( 'featured_slider_content_page_'. $i .'', 
		array(
			'sanitize_callback' => 'workart_sanitize_page',
			'priority'	=> 50,
		)
	);

	$wp_customize->add_control( new  workart_blog_Dropdown_Chooser( $wp_customize,
		'featured_slider_content_page_'. $i .'', 
			array(
				'label'             => sprintf(esc_html__( 'Select Page: %d', 'workart-blog'), $i ),
				'section'           => 'workart_featured_slider_section',
				'choices'			=> workart_page_choices(),
				'active_callback'   => 'workart_blog_is_slider_section_enable',
			)
		)
	);
	

endfor;

$wp_customize->add_setting('featured_slider_btn_txt',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('featured_slider_btn_txt',
    array(
        'section'			=> 'workart_featured_slider_section',
        'label'				=> esc_html__( 'Button Text:', 'workart-blog' ),
        'type'          	=>'text',
        'active_callback'   => 'workart_blog_is_slider_section_enable',
    )
);


$wp_customize->add_setting( 'featured_slider_btn_alt_txt', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'featured_slider_btn_alt_txt', array(
	'label'           	=> esc_html__( 'Alt Btn Label', 'workart-blog' ),
	'section'        	=> 'workart_featured_slider_section',
	'active_callback'   => 'workart_blog_is_slider_section_enable',
	'type'				=> 'text',
) );

$wp_customize->add_setting( 'featured_slider_btn_alt_url', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'featured_slider_btn_alt_url', array(
	'label'           	=> esc_html__( 'Alt Btn Url', 'workart-blog' ),
	'section'        	=> 'workart_featured_slider_section',
	'active_callback'   => 'workart_blog_is_slider_section_enable',
	'type'				=> 'url',
) );