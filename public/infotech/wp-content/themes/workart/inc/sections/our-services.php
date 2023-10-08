<?php
/**
 * Services section
 *
 * This is the template for the content of service section
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 */
if ( ! function_exists( 'workart_add_our_services_section' ) ) :
    /**
    * Add service section
    *
    *@since  Workart 1.0.0
    */
    function workart_add_our_services_section() {
    	$options = workart_get_theme_options();
        // Check if service is enabled on frontpage
        $our_services_enable = apply_filters( 'workart_section_status', true, 'our_services_section_enable' );

        if ( true !== $our_services_enable ) {
            return false;
        }
        // Get service section details
        $section_details = array();
        $section_details = apply_filters( 'workart_filter_our_services_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render service section now.
        workart_render_our_services_section( $section_details );
    }
endif;

if ( ! function_exists( 'workart_get_our_services_section_details' ) ) :
    /**
    * service section details.
    *
    * @since  Workart 1.0.0
    * @param array $input service section details.
    */
    function workart_get_our_services_section_details( $input ) {
        $options = workart_get_theme_options();

        // Content type.
        $our_services_posts_count = ! empty( $options['our_services_posts_count'] ) ? $options['our_services_posts_count'] : 3;
        
        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= $our_services_posts_count; $i++ ) {
            if ( ! empty( $options['our_services_content_page_' . $i] ) )
                $page_ids[] = $options['our_services_content_page_' . $i];
        }

        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => absint( $our_services_posts_count ),
            'orderby'           => 'post__in',
        );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['content']   = workart_trim_content($options['our_services_excerpt_length']);
                $page_post['url']       = get_the_permalink();

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// service section content details.
add_filter( 'workart_filter_our_services_section_details', 'workart_get_our_services_section_details' );


if ( ! function_exists( 'workart_render_our_services_section' ) ) :
  /**
   * Start service section
   *
   * @return string service content
   * @since  Workart 1.0.0
   *
   */
   function workart_render_our_services_section( $content_details = array() ) {
        $options    = workart_get_theme_options();
        $our_services_sub_title  = $options['our_services_section_sub_title'];
        $our_services_title      = isset($options['our_services_section_title']) ? $options['our_services_section_title']: '';

        if ( empty( $content_details ) ) {
            return;
        } ?>
            <div id="workart_our_services_section" class="relative page-section same-background">
                <div class="wrapper">
                    <div class="section-header">
                        <p class="section-subtitle"><?php echo esc_html($our_services_sub_title); ?></p>
                        <h2 class="section-title"><?php echo esc_html($our_services_title); ?></h2>
                    </div><!-- .section-header -->

                    <div class="section-content col-3 clear">
                    <?php foreach ( $content_details as $i=>$content ) : ?>

                        <article>
                            <div class="service-item-wrapper">
                                <div class="entry-container">
                                    <div class="icon-container">
                                        <a href="<?php echo esc_url($content['url']); ?>" title="<?php echo esc_attr( $content['title'] ); ?>">
                                            <i class="fa <?php echo esc_attr( !empty( $options['our_services_icon_' . (absint($i)+1)] ) ? $options['our_services_icon_' . (absint($i)+1)] : 'fa-edit' ); ?>"></i>
                                        </a>
                                    </div><!-- .icon-container -->

                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url($content['url']); ?>"><?php echo esc_html($content['title']); ?></a></h2>
                                    </header>

                                    <div class="entry-content">
                                        <p><?php echo wp_kses_post($content['content']); ?></p>
                                    </div><!-- .entry-content -->
                                </div><!-- .entry-container -->
                            </div><!-- .service-item-wrapper -->
                        </article>
                    <?php endforeach; ?>

                    </div><!-- .col-3 -->
                </div><!-- .wrapper -->
            </div><!-- #workart_our_services_section -->

    <?php
    }    
endif; ?>
