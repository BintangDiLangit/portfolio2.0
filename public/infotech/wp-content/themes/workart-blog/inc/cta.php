<?php

$wp_customize->add_section( 'workart_call_to_action_section',
	array(
		'title'             => esc_html__( 'CTA','workart-blog' ),
		'description'       => esc_html__( 'CTA  Section options.', 'workart-blog' ),
        'panel'             => 'workart_front_page_panel',
        'priority'  => 46,
	)
);


$wp_customize->add_setting( 'call_to_action_section_enable',
	array(
		'default'			=> 	false,
		'sanitize_callback' => 'workart_sanitize_switch_control',
	)
);

$wp_customize->add_control( new Workart_Blog_Switch_Control( $wp_customize,
	'call_to_action_section_enable',
		array(
			'label'             => esc_html__( 'CTA Section Enable', 'workart-blog' ),
			'section'           => 'workart_call_to_action_section',
			'on_off_label' 		=> workart_switch_options(),
		)
	)
);

$wp_customize->add_setting('call_to_action_custom_sub_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('call_to_action_custom_sub_title',
    array(
        'section'			=> 'workart_call_to_action_section',
        'label'				=> esc_html__( 'Section Sub Title:', 'workart-blog' ),
        'type'          	=>'text',
        'active_callback'   => 'workart_blog_is_cta_section_enable',
    )
);


$wp_customize->add_setting( 'call_to_action_content_page',
	array(
		'sanitize_callback' => 'workart_sanitize_page',
	)
);

$wp_customize->add_control( new Workart_Blog_Dropdown_Chooser( $wp_customize,
	'call_to_action_content_page',
		array(
			'label'             => esc_html__( 'Select Page', 'workart-blog' ),
			'section'           => 'workart_call_to_action_section',
			'choices'			=> workart_page_choices(),
			'active_callback'   => 'workart_blog_is_cta_section_enable',
		)
	)
);


$wp_customize->add_setting('call_to_action_btn_txt',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('call_to_action_btn_txt',
    array(
        'section'			=> 'workart_call_to_action_section',
        'label'				=> esc_html__( 'Button Text:', 'workart-blog' ),
        'type'          	=>'text',
        'active_callback'   => 'workart_blog_is_cta_section_enable',
    )
);
