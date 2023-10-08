<?php

$wp_customize->add_section( 'workart_recent_posts_section',
	array(
		'title'             => esc_html__( 'Recent Posts','workart-blog' ),
		'description'       => esc_html__( 'Recent Posts Section options.', 'workart-blog' ),
		'panel'             => 'workart_front_page_panel',
		'priority'  => 45,
	)
);

$wp_customize->add_setting( 'recent_posts_section_enable', 
	array(
		'default'			=> 	false,
		'sanitize_callback' => 'workart_sanitize_switch_control',
	) 
);

$wp_customize->add_control( new  workart_blog_Switch_Control( $wp_customize,
	'recent_posts_section_enable',
		array(
			'label'             => esc_html__( 'Recent Post Section Enable', 'workart-blog' ),
			'section'           => 'workart_recent_posts_section',
			'on_off_label' 		=> workart_switch_options(),
		)
	)
);

$wp_customize->add_setting('recent_posts_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('recent_posts_title',
    array(
        'section'			=> 'workart_recent_posts_section',
        'label'				=> esc_html__( 'Section Title:', 'workart-blog' ),
        'type'          	=>'text',
        'active_callback'   => 'workart_blog_is_recent_posts_enable',
    )
);

$wp_customize->add_setting('recent_posts_sub_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('recent_posts_sub_title',
    array(
        'section'			=> 'workart_recent_posts_section',
        'label'				=> esc_html__( 'Section Sub Title:', 'workart-blog' ),
        'type'          	=>'text',
        'active_callback'   => 'workart_blog_is_recent_posts_enable',
    )
);

for ( $i = 1; $i <= 6; $i++ ) :

	$wp_customize->add_setting( 'recent_posts_content_post_'. $i .'', 
		array(
			'sanitize_callback' => 'workart_sanitize_page',
		)
	);

	$wp_customize->add_control( new  workart_blog_Dropdown_Chooser( $wp_customize,
		'recent_posts_content_post_'. $i .'', 
			array(
				'label'             => sprintf(esc_html__( 'Select Post: %d', 'workart-blog'), $i ),
				'section'           => 'workart_recent_posts_section',
				'choices'			=> workart_post_choices(),
				'active_callback'   => 'workart_blog_is_recent_posts_enable',
			)
		)
	);

endfor;



