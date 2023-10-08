<?php

// Add Topbar section
$wp_customize->add_section( 'workart_blog_topbar_section',
	array(
		'title'             => esc_html__( 'Topbar','workart-blog' ),
		'description'       => esc_html__( 'Topbar Section options.', 'workart-blog' ),
		'panel'             => 'workart_front_page_panel',
		'priority'  => 1,
	)
);

// topbar enable/disable control and setting
$wp_customize->add_setting( 'topbar_section_enable',
	array(
		'default'			=> 	false,
		'sanitize_callback' => 'workart_sanitize_switch_control',
	)
);

$wp_customize->add_control( new Workart_Blog_Switch_Control( $wp_customize,
	'topbar_section_enable',
		array(
			'label'             => esc_html__( 'Topbar Section Enable', 'workart-blog' ),
			'section'           => 'workart_blog_topbar_section',
			'on_off_label' 		=> workart_switch_options(),
		)
	)
);

$wp_customize->add_setting( 'topbar_contact_number',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control('topbar_contact_number',
	array(
		'label'             => esc_html__( 'Contact Number', 'workart-blog' ),
		'section'           => 'workart_blog_topbar_section',
		'type'              => 'text',
		'active_callback'   => 'workart_blog_is_topbar_section_enable',
	)
);

$wp_customize->add_setting( 'topbar_contact_email',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control('topbar_contact_email',
	array(
		'label'             => esc_html__( 'Contact Email', 'workart-blog' ),
		'section'           => 'workart_blog_topbar_section',
		'type'              => 'text',
		'active_callback'   => 'workart_blog_is_topbar_section_enable',
	)
);

$wp_customize->add_setting( 'topbar_contact_location',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control('topbar_contact_location',
	array(
		'label'             => esc_html__( 'Contact Location', 'workart-blog' ),
		'section'           => 'workart_blog_topbar_section',
		'type'              => 'text',
		'active_callback'   => 'workart_blog_is_topbar_section_enable',
	)
);
 

 
 // Topbar content enable control and setting
 $wp_customize->add_setting( 'social_menu_enable',
	array(
		'default'			=> 	false,
		'sanitize_callback' => 'workart_sanitize_switch_control',
	)
);
 
 $wp_customize->add_control( new Workart_Blog_Switch_Control( $wp_customize,
	'social_menu_enable',
		array(
			'label'             => esc_html__( 'Social Menu Enable', 'workart-blog' ),
			'description'       => sprintf( '%1$s <a class="topbar-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show secondary and social menu.', 'workart-blog' ), esc_html__( 'Click Here', 'workart-blog' ), esc_html__( 'to create menu', 'workart-blog' ) ),
			'section'           => 'workart_blog_topbar_section',
			'active_callback'   => 'workart_blog_is_topbar_section_enable',
			'on_off_label' 		=> workart_switch_options(),
		)
	)
);
