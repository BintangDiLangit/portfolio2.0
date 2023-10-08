<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function workart_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'workart' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function workart_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'workart' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    wp_reset_postdata();
    return  $choices;
}

/**
 * List of products for post choices.
 * @return Array Array of post ids and name.
 */
function workart_product_choices() {
    $posts = get_posts( array( 'numberposts' => -1, 'post_type' => 'product' ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'workart' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function workart_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'category',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'workart' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}

/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function workart_product_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'product_cat',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'workart' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}

if ( ! function_exists( 'workart_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function workart_site_layout() {
        $workart_site_layout = array(
            'wide'          => esc_url( get_template_directory_uri() . '/assets/images/full.png' ),
            'boxed-layout'  => esc_url( get_template_directory_uri() . '/assets/images/boxed.png' ),
        );

        $output = apply_filters( 'workart_site_layout', $workart_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'workart_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function workart_selected_sidebar() {
        $workart_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'workart' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'workart' ),
            'optional-sidebar-2'    => esc_html__( 'Optional Sidebar 2', 'workart' ),
        );

        $output = apply_filters( 'workart_selected_sidebar', $workart_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'workart_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function workart_global_sidebar_position() {
        $workart_global_sidebar_position = array(
            'right-sidebar' => esc_url( get_template_directory_uri() . '/assets/images/right.png' ),
            'no-sidebar'    => esc_url( get_template_directory_uri() . '/assets/images/full.png' ),
        );

        $output = apply_filters( 'workart_global_sidebar_position', $workart_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'workart_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function workart_sidebar_position() {
        $workart_sidebar_position = array(
            'right-sidebar'         => esc_url( get_template_directory_uri() . '/assets/images/right.png' ),
            'no-sidebar'            => esc_url( get_template_directory_uri() . '/assets/images/full.png' ),
        );

        $output = apply_filters( 'workart_sidebar_position', $workart_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'workart_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function workart_pagination_options() {
        $workart_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'workart' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'workart' ),
        );

        $output = apply_filters( 'workart_pagination_options', $workart_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'workart_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function workart_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'workart' ),
            'off'       => esc_html__( 'Disable', 'workart' )
        );
        return apply_filters( 'workart_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'workart_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function workart_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'workart' ),
            'off'       => esc_html__( 'No', 'workart' )
        );
        return apply_filters( 'workart_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'workart_sortable_sections' ) ) :
    /**
     * List of sections Control options
     * @return array List of Sections control options.
     */
    function workart_sortable_sections() {
        $options = workart_get_theme_options();
  
        $sections = array(
            'hero_slider'               => esc_html__( 'Hero Slider', 'workart' ),
            'featured_slider'           => esc_html__( 'Featured Slider', 'workart' ),
            'our_services'              => esc_html__( 'Our Service', 'workart' ),
            'featured_posts'            => esc_html__( 'Featured Post', 'workart' ),
            'popular_posts'             => esc_html__( 'Popular Post', 'workart' ),
            'about_us'                  => esc_html__( 'About us', 'workart' ),
            'recent_posts'              => esc_html__( 'Recent Posts', 'workart' ),
            'latest_posts'              => esc_html__( 'Latest Post', 'workart' ),
            'gallery'                   => esc_html__( 'Gallery', 'workart' ),
            'featured_artist'           => esc_html__( 'Featured Artist', 'workart' ),
            'call_to_action'            => esc_html__( 'Call To Action', 'workart' ),
            'subscribe'                 => esc_html__( 'Subscription', 'workart' ),
            'testimonial'               => esc_html__( 'Testimonial', 'workart' ),
            'our_partners'              => esc_html__( 'Our Partners', 'workart' ),
        );
      
         
        return apply_filters( 'workart_sortable_sections', $sections );
    }
endif;


if ( ! function_exists( 'workart_hero_slider_content_type' ) ) :
    /**
     * Product Options
     * @return array site product options
     */
    function workart_hero_slider_content_type() {
        $workart_hero_slider_content_type = array(
            'page' 		=> esc_html__( 'Page', 'workart' ),
        );

        if(class_exists('WooCommerce')){
            $workart_hero_slider_content_type = array_merge($workart_hero_slider_content_type, 
                array(
                    'product-category'   => esc_html__( 'Product Category', 'workart' ),
                )
            );
        }

        $output = apply_filters( 'workart_hero_slider_content_type', $workart_hero_slider_content_type );

        return $output;
    }
endif;
