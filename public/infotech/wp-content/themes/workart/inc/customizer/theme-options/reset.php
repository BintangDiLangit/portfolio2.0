<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'workart_reset_section',
	array(
		'title'             => esc_html__('Reset all settings','workart'),
		'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'workart' ),
	)
);

// Add reset enable setting and control.
$wp_customize->add_setting( 'workart_theme_options[reset_options]',
	array(
		'default'           => $options['reset_options'],
		'sanitize_callback' => 'workart_sanitize_checkbox',
		'transport'			=> 'postMessage',
	)
);

$wp_customize->add_control( 'workart_theme_options[reset_options]',
	array(
		'label'             => esc_html__( 'Check to reset all settings', 'workart' ),
		'section'           => 'workart_reset_section',
		'type'              => 'checkbox',
	)
);
