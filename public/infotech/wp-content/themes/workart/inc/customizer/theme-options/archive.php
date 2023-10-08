<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'workart_archive_section',
	array(
		'title'             => esc_html__( 'Blog/Archive','workart' ),
		'description'       => esc_html__( 'Archive section options.', 'workart' ),
		'panel'             => 'workart_theme_options_panel',
	)
);

// Your latest posts title setting and control.
$wp_customize->add_setting( 'workart_theme_options[your_latest_posts_title]',
	array(
		'default'           => $options['your_latest_posts_title'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control( 'workart_theme_options[your_latest_posts_title]',
	array(
		'label'             => esc_html__( 'Your Latest Posts Title', 'workart' ),
		'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'workart' ),
		'section'           => 'workart_archive_section',
		'type'				=> 'text',
		'active_callback'   => 'workart_is_latest_posts'
	)
);

// features content type control and setting
$wp_customize->add_setting( 'workart_theme_options[blog_column]',
	array(
		'default'          	=> $options['blog_column'],
		'sanitize_callback' => 'workart_sanitize_select',
	)
);

$wp_customize->add_control( 'workart_theme_options[blog_column]',
	array(
		'label'             => esc_html__( 'Column Layout', 'workart' ),
		'section'           => 'workart_archive_section',
		'type'				=> 'select',
		'choices'			=> array( 
			'col-1'		=> esc_html__( 'One Column', 'workart' ),
			'col-2'		=> esc_html__( 'Two Column', 'workart' ),
			'col-3'		=> esc_html__( 'Three Column', 'workart' ),
		),
	)
);


// Archive tag category setting and control.
$wp_customize->add_setting( 'workart_theme_options[hide_author]',
	array(
		'default'           => $options['hide_author'],
		'sanitize_callback' => 'workart_sanitize_switch_control',
	)
);

$wp_customize->add_control( new  Workart_Switch_Control( $wp_customize,
	'workart_theme_options[hide_author]',
		array(
			'label'             => esc_html__( 'Hide Author', 'workart' ),
			'section'           => 'workart_archive_section',
			'on_off_label' 		=> workart_hide_options(),
		)
	)
);

// Archive tag category setting and control.
$wp_customize->add_setting( 'workart_theme_options[hide_date]',
	array(
		'default'           => $options['hide_date'],
		'sanitize_callback' => 'workart_sanitize_switch_control',
	)
);

$wp_customize->add_control( new  Workart_Switch_Control( $wp_customize,
	'workart_theme_options[hide_date]',
		array(
			'label'             => esc_html__( 'Hide Date', 'workart' ),
			'section'           => 'workart_archive_section',
			'on_off_label' 		=> workart_hide_options(),
		)
	)
);
