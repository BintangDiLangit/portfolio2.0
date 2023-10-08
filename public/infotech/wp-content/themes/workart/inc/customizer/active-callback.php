<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 */

if ( ! function_exists( 'workart_is_static_homepage_enable' ) ) :
	/**
	 * Check if static homepage is enabled.
	 *
	 * @since Workart 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function workart_is_static_homepage_enable( $control ) {
		return ( 'page' == $control->manager->get_setting( 'show_on_front' )->value() );
	}
endif;

if ( ! function_exists( 'workart_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since  Workart 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function workart_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'workart_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'workart_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since  Workart 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function workart_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'workart_theme_options[pagination_enable]' )->value();
	}
endif;

/**
 * Check if hero slider section is enabled.
 *
 * @since  Workart 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function workart_is_hero_slider_section_enable( $control ) {
	return ( $control->manager->get_setting( 'workart_theme_options[hero_slider_section_enable]' )->value() );
}

/**
 * Check if hero slider section content type is page.
 *
 * @since  Workart 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function workart_is_hero_slider_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'workart_theme_options[hero_slider_content_type]' )->value();
	return workart_is_hero_slider_section_enable( $control ) && ( 'page' == $content_type );
}

/**
 * Check if hero slider section content type is product category.
 *
 * @since  Workart 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function workart_is_hero_slider_section_content_product_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'workart_theme_options[hero_slider_content_type]' )->value();
	return workart_is_hero_slider_section_enable( $control ) && ( 'product-category' == $content_type );
}

/**
 * Check if service section is enabled.
 *
 * @since  Workart 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function workart_is_our_services_section_enable( $control ) {
	return ( $control->manager->get_setting( 'workart_theme_options[our_services_section_enable]' )->value() );
}

/**
 * Check if gallery section is enabled.
 *
 * @since  Workart 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function workart_is_gallery_section_enable( $control ) {
	return ( $control->manager->get_setting( 'workart_theme_options[gallery_section_enable]' )->value() );
}

/**
 * Check if featured_post section is enabled.
 *
 * @since  Workart 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function workart_is_featured_posts_section_enable( $control ) {
	return ( $control->manager->get_setting( 'workart_theme_options[featured_posts_section_enable]' )->value() );
}

/**
 * Check if recent_posts section is enabled.
 *
 * @since  Workart 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function workart_is_recent_posts_section_enable( $control ) {
	return ( $control->manager->get_setting( 'workart_theme_options[recent_posts_section_enable]' )->value() );
}

/**
 * Check if subscribe section is enabled.
 *
 * @since  Workart 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function workart_is_subscribe_section_enable( $control ) {
	return ( $control->manager->get_setting( 'workart_theme_options[subscribe_section_enable]' )->value() );
}

/**
 * Check if featured_artist section is enabled.
 *
 * @since  Workart 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function workart_is_featured_artist_section_enable( $control ) {
	return ( $control->manager->get_setting( 'workart_theme_options[featured_artist_section_enable]' )->value() );
}

/**
 * Check if latest_post section is enabled.
 *
 * @since  Workart 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function workart_is_latest_posts_section_enable( $control ) {
	return ( $control->manager->get_setting( 'workart_theme_options[latest_posts_section_enable]' )->value() );
}

/**
 * Check if latest_post section content type is recent.
 *
 * @since  Workart 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function workart_is_latest_posts_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'workart_theme_options[latest_posts_content_type]' )->value();
	return workart_is_latest_posts_section_enable( $control ) && ( 'recent' == $content_type );
}
/**
 * Check if latest_post separator section is enabled.
 *
 * @since  Workart 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function workart_is_latest_posts_section_separator_enable( $control ) {
    $content_type = $control->manager->get_setting( 'workart_theme_options[latest_posts_content_type]' )->value();
    return workart_is_latest_posts_section_enable( $control ) && !( 'recent' == $content_type || 'category' == $content_type ) ;
}
