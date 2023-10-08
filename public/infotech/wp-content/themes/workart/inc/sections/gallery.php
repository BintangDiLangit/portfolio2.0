<?php
/**
 * Gallery section
 *
 * This is the template for the content of Gallery section
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 */
if ( ! function_exists( 'workart_add_gallery_section' ) ) :
    /**
    * Add Gallery section
    *
    *@since  Workart 1.0.0
    */
    function workart_add_gallery_section() {
        $options = workart_get_theme_options();
        // Check if Gallery is enabled on frontpage
        $gallery_enable = apply_filters( 'workart_section_status', true, 'gallery_section_enable' );

        if ( true !== $gallery_enable ) {
            return false;
        }
        // Get Gallery section details
        $section_details = array();
        $section_details = apply_filters( 'workart_filter_gallery_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }
        // Render Gallery section now.
        workart_render_gallery_section( $section_details );
    }
endif;

if ( ! function_exists( 'workart_get_gallery_section_details' ) ) :
    /**
    * Gallery section details.
    *
    * @since  Workart 1.0.0
    * @param array $input Gallery section details.
    */
    function workart_get_gallery_section_details( $input ) {
        $options = workart_get_theme_options();

        // Content type.
        $gallery_count = ! empty( $options['gallery_count'] ) ? $options['gallery_count'] : 6;
        
        
        $content = array();
        $cat_id = ! empty( $options['gallery_content_category'] ) ? $options['gallery_content_category'] : '';
        $args = array(
            'post_type'             => 'post',
            'posts_per_page'        => absint( $gallery_count ),
            'cat'                   => absint( $cat_id ),
            'ignore_sticky_posts'   => true,
        );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'medium_large' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';
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
// gallery section content details.
add_filter( 'workart_filter_gallery_section_details', 'workart_get_gallery_section_details' );


if ( ! function_exists( 'workart_render_gallery_section' ) ) :
  /**
   * Start gallery section
   *
   * @return string gallery content
   * @since  Workart 1.0.0
   *
   */
   function workart_render_gallery_section( $content_details = array() ) {
        $options                = workart_get_theme_options();
        $gallery_btn_url = (!empty($options['gallery_btn_url'])) ? $options['gallery_btn_url'] : '';

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="workart_gallery_section" class="relative page-section">
            <div class="wrapper">
                <div class="section-header">
                    <p class="section-subtitle"><?php echo esc_html($options['gallery_sub_title'])?></p>
                    <h2 class="section-title"><?php echo esc_html($options['gallery_title'])?></h2>
                </div><!-- .section-header -->

                <div class="section-content grid gallery-popup col-3">
                <?php foreach($content_details as $content) : ?>

                    <article class="grid-item">
                        <div class="gallery-item-wrapper">
                            <div class="overlay"></div>
                            <div class="featured-image">
                                <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url($content['image']); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                            </div><!-- .featured-image -->

                            <header class="entry-header">
                                <a href="<?php echo esc_url( $content['image'] ); ?>" class="more-link popup" title="<?php echo esc_attr( $content['title'] ); ?>"><i class="fa fa-search-plus"></i></a>
                                <h2 class="entry-title"><a href="<?php echo esc_url($content['url']);?>" tabindex="0"><?php echo esc_html($content['title']) ?></a></h2>
                            </header>
                        </div><!-- .gallery-item-wrapper -->
                    </article>
                    <?php endforeach; ?>

                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #workart_gallery_section -->

    <?php }
endif;  ?>
