<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage  Workart
* @since  Workart 1.0.0
*/

// blog btn title
if ( ! function_exists( 'workart_copyright_text_partial' ) ) :
    function workart_copyright_text_partial() {
        $options = workart_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;

//service section sub title selective refresh
if ( ! function_exists( 'workart_our_services_section_partial_sub_title' ) ) :
    function workart_our_services_section_partial_sub_title() {
        $options = workart_get_theme_options();
        return esc_html( $options['our_services_section_sub_title'] );
    }
endif;

//service section title selective refresh
if ( ! function_exists( 'workart_our_services_section_partial_title' ) ) :
    function workart_our_services_section_partial_title() {
        $options = workart_get_theme_options();
        return esc_html( $options['our_services_section_title'] );
    }
endif;

// gallery_title selective refresh
if ( ! function_exists( 'workart_gallery_title_partial' ) ) :
    function workart_gallery_title_partial() {
        $options = workart_get_theme_options();
        return esc_html( $options['gallery_title'] );
    }
endif;

// gallery_sub_title selective refresh
if ( ! function_exists( 'workart_gallery_sub_title_partial' ) ) :
    function workart_gallery_sub_title_partial() {
        $options = workart_get_theme_options();
        return esc_html( $options['gallery_sub_title'] );
    }
endif;

// latest_posts_title selective refresh
if ( ! function_exists( 'workart_latest_posts_title_partial' ) ) :
    function workart_latest_posts_title_partial() {
        $options = workart_get_theme_options();
        return esc_html( $options['latest_posts_title'] );
    }
endif;

// latest_posts_sub_title selective refresh
if ( ! function_exists( 'workart_latest_posts_sub_title_partial' ) ) :
    function workart_latest_posts_sub_title_partial() {
        $options = workart_get_theme_options();
        return esc_html( $options['latest_posts_sub_title'] );
    }
endif;

// latest_posts_read_more_btn_label selective refresh
if ( ! function_exists( 'workart_latest_posts_read_more_btn_label_partial' ) ) :
    function workart_latest_posts_read_more_btn_label_partial() {
        $options = workart_get_theme_options();
        return esc_html( $options['latest_posts_read_more_btn_label'] );
    }
endif;

// featured_artist_sub_title selective refresh
if ( ! function_exists( 'workart_featured_artist_sub_title_partial' ) ) :
    function workart_featured_artist_sub_title_partial() {
        $options = workart_get_theme_options();
        return esc_html( $options['featured_artist_sub_title'] );
    }
endif;

// subscribe_section_description selective refresh
if ( ! function_exists( 'workart_subscribe_section_description_partial' ) ) :
    function workart_subscribe_section_description_partial() {
        $options = workart_get_theme_options();
        return esc_html( $options['subscribe_section_description'] );
    }
endif;

// subscribe_section_title selective refresh
if ( ! function_exists( 'workart_subscribe_section_title_partial' ) ) :
    function workart_subscribe_section_title_partial() {
        $options = workart_get_theme_options();
        return esc_html( $options['subscribe_section_title'] );
    }
endif;

// subscribe_section_subtitle selective refresh
if ( ! function_exists( 'workart_subscribe_section_subtitle_partial' ) ) :
    function workart_subscribe_section_subtitle_partial() {
        $options = workart_get_theme_options();
        return esc_html( $options['subscribe_section_subtitle'] );
    }
endif;

// subscribe_section_btn_txt selective refresh
if ( ! function_exists( 'workart_subscribe_section_btn_txt_partial' ) ) :
    function workart_subscribe_section_btn_txt_partial() {
        $options = workart_get_theme_options();
        return esc_html( $options['subscribe_section_btn_txt'] );
    }
endif;

// hero_slider_section_sub_title selective refresh
if ( ! function_exists( 'workart_hero_slider_section_sub_title_partial' ) ) :
    function workart_hero_slider_section_sub_title_partial() {
        $options = workart_get_theme_options();
        return esc_html( $options['hero_slider_section_sub_title'] );
    }
endif;

// hero_slider_section_title selective refresh
if ( ! function_exists( 'workart_hero_slider_section_title_partial' ) ) :
    function workart_hero_slider_section_title_partial() {
        $options = workart_get_theme_options();
        return esc_html( $options['hero_slider_section_title'] );
    }
endif;

// hero_slider_btn_txt selective refresh
if ( ! function_exists( 'workart_hero_slider_btn_txt_partial' ) ) :
    function workart_hero_slider_btn_txt_partial() {
        $options = workart_get_theme_options();
        return esc_html( $options['hero_slider_btn_txt'] );
    }
endif;
