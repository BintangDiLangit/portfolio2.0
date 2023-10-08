<?php

$wp_customize->add_section( 'workart_about_us_section',
	array(
		'title'             => esc_html__( 'About us','workart-blog' ),
		'description'       => esc_html__( 'About us  Section options.', 'workart-blog' ),
        'panel'             => 'workart_front_page_panel',
        'priority'  => 7,
	)
);


$wp_customize->add_setting( 'about_us_section_enable',
	array(
		'default'			=> 	false,
		'sanitize_callback' => 'workart_sanitize_switch_control',
	)
);

$wp_customize->add_control( new Workart_Blog_Switch_Control( $wp_customize,
	'about_us_section_enable',
		array(
			'label'             => esc_html__( 'About Section Enable', 'workart-blog' ),
			'section'           => 'workart_about_us_section',
			'on_off_label' 		=> workart_switch_options(),
		)
	)
);

$wp_customize->add_setting('about_us_custom_sub_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('about_us_custom_sub_title',
    array(
        'section'			=> 'workart_about_us_section',
        'label'				=> esc_html__( 'Section Sub Title:', 'workart-blog' ),
        'type'          	=>'text',
        'active_callback'   => 'workart_blog_is_about_section_enable',
    )
);


$wp_customize->add_setting( 'about_us_content_page',
	array(
		'sanitize_callback' => 'workart_sanitize_page',
	)
);

$wp_customize->add_control( new Workart_Blog_Dropdown_Chooser( $wp_customize,
	'about_us_content_page',
		array(
			'label'             => esc_html__( 'Select Page', 'workart-blog' ),
			'section'           => 'workart_about_us_section',
			'choices'			=> workart_page_choices(),
			'active_callback'   => 'workart_blog_is_about_section_enable',
		)
	)
);


$wp_customize->add_setting('about_us_btn_txt',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('about_us_btn_txt',
    array(
        'section'			=> 'workart_about_us_section',
        'label'				=> esc_html__( 'Button Text:', 'workart-blog' ),
        'type'          	=>'text',
        'active_callback'   => 'workart_blog_is_about_section_enable',
    )
);


for($i=2; $i<=3; $i++){
	$wp_customize->add_setting( 'about_us_custom_image' . $i,
		array(
			'sanitize_callback' => 'workart_sanitize_image',
		)
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		'about_us_custom_image' . $i,
			array(
				'label'       		=> esc_html__( 'Extra Image', 'workart-blog' ),
				'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'workart-blog' ), 550, 521 ),
				'section'     		=> 'workart_about_us_section',
				'active_callback'   => 'workart_blog_is_about_section_enable',
			)
		)
	);
}