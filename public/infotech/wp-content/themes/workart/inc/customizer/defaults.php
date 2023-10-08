<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 * @return array An array of default values
 */

function workart_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$workart_default_options = array(
		// Color Options
		'header_title_color'			    => '#000',
		'header_tagline_color'			    => '#000',
		'header_txt_logo_extra'			    => 'show-all',
		'theme_version'						=> 'lite-version',
		'home_layout'						=> 'pro-design',

		// breadcrumb
		'breadcrumb_enable'				    => (bool) true,
		'breadcrumb_separator'			    => '/',
				
		// homepage options
		'enable_frontpage_content' 			=> false,

		// layout 
		'site_layout'         			    => 'wide',
		'sidebar_position'         		    => 'right-sidebar',
		'post_sidebar_position' 		    => 'right-sidebar',
		'page_sidebar_position' 		    => 'right-sidebar',
		'menu_sticky'					    => (bool) false,
		'search_icon_in_primary_menu_enable'=> (bool) true,

		// excerpt options
		'long_excerpt_length'               => 25,

		// pagination options
		'pagination_enable'         	    => (bool) true,
		'pagination_type'         		    => 'default',

		// footer options
		'copyright_text'           		    => sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s. ', '1: Year, 2: Site Title with home URL', 'workart' ), '[the-year]', '[site-link]' ),
		'scroll_top_visible'        	    => (bool) true,

		// reset options
		'reset_options'      			    => (bool) false,
		
		// homepage sections sortable
		'pro_sortable' 						=> 'hero_slider,our_services,featured_artist,gallery,latest_posts,subscribe',

		// blog/archive options
		'your_latest_posts_title' 		    => esc_html__( 'Blogs', 'workart' ),
		'blog_column'						=> 'col-2',


		// single post theme options
		'single_post_hide_date' 		    => (bool) false,
		'single_post_hide_author'		    => (bool) false,
		'hide_author'			   			=> (bool) false,
		'hide_date'			   				=> (bool) false,

		/* Front Page */

		// hero slider
		'hero_slider_section_enable'			=> (bool) false,
		'hero_slider_content_type'				=> 'page',
		'hero_slider_count'						=> 3,
		'hero_slider_excerpt_length'			=> 25,
		'hero_slider_section_sub_title'	        => esc_html__('Contemporary Abstract Artist','workart'),
		'hero_slider_section_title'             => esc_html__('Sean Kernan','workart'),
		'hero_slider_btn_txt'                   => esc_html__('Purchase Now','workart'),
		'hero_slider_btn_alt_txt'               => esc_html__('Add to Wishlist','workart'),
		'hero_slider_price_title'               => esc_html__('Price','workart'),

		//latest_post 
		'latest_posts_section_enable'		   => (bool) false,
		'latest_posts_content_type'			   => 'post',
		'latest_posts_sub_title'               => esc_html__('Our Blogs','workart'),
		'latest_posts_title'    			   => esc_html__('Stories Around Arts','workart'),
		'latest_posts_count'				   => 3,
		'latest_posts_column'				   => 'col-3',
		'latest_posts_read_more_btn_label'     => esc_html__('Read More','workart'),
		
		// featured_artist
		'featured_artist_section_enable'		=> (bool) false,
		'featured_artist_content_type'			=> 'post',
		'featured_artist_sub_title'				=> esc_html__( 'Featured Artist', 'workart' ),
		'featured_artist_count'					=> 3,
						
		//our service
		'our_services_section_enable'		    => (bool) false,
		'our_services_content_type'			    =>'post',
		'our_services_section_sub_title'		=> esc_html__( 'Why choose us?', 'workart' ),
		'our_services_posts_count'			    => 3,
		'our_services_excerpt_length'			=> 20,
		'our_services_section_title'			=> esc_html__( 'WorkArt Services', 'workart' ),

		// gallery
		'gallery_section_enable'		=> (bool) false,
		'gallery_sub_title'         	=> esc_html__('Projects','workart'),
		'gallery_content_type'			=> 'recent',
		'gallery_count'					=> 6,
		'gallery_title'					=> esc_html__( 'Our Art Gallery', 'workart' ),

		//subscribe
		'subscribe_section_enable' 			=> false,
		'subscribe_section_title'			=>	esc_html__('Get More News.', 'workart'),
		'subscribe_section_subtitle'		=>	esc_html__('Subscribe Now!', 'workart'),
		'subscribe_section_description'		=>	esc_html__('Enter your email address to get more information about our art gallery and artists. We are more than original.', 'workart'),
		'subscribe_section_btn_txt'			=>	esc_html__('Subscribe Now', 'workart'),
	
	);

	$output = apply_filters( 'workart_default_theme_options', $workart_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}