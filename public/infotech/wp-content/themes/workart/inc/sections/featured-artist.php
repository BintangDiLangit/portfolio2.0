<?php
/**
 * Featured Artist section
 *
 * This is the template for the content of featured_artist section
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 */
if ( ! function_exists( 'workart_add_featured_artist_section' ) ) :
    /**
    * Add featured_artist section
    *
    *@since  Workart 1.0.0
    */
    function workart_add_featured_artist_section() {
    	$options = workart_get_theme_options();
        // Check if featured_artist is enabled on frontpage
        $featured_artist_enable = apply_filters( 'workart_section_status', true, 'featured_artist_section_enable' );

        if ( true !== $featured_artist_enable ) {
            return false;
        }
        // Get featured_artist section details
        $section_details = array();
        $section_details = apply_filters( 'workart_filter_featured_artist_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render featured_artist section now.
        workart_render_featured_artist_section( $section_details );
}

endif;

if ( ! function_exists( 'workart_get_featured_artist_section_details' ) ) :
    /**
    * featured_artist section details.
    *
    * @since  Workart 1.0.0
    * @param array $input featured_artist section details.
    */
    function workart_get_featured_artist_section_details( $input ) {
        $options = workart_get_theme_options();

        // Content type.
        $featured_artist_count           = ! empty( $options['featured_artist_count'] ) ? $options['featured_artist_count'] : 3;
        
        $content = array();
    
        $page_ids = array();

        for ( $i = 1; $i <= $featured_artist_count; $i++ ) {
            if ( ! empty( $options['featured_artist_content_page_' . $i] ) )
                $page_ids[] = $options['featured_artist_content_page_' . $i];
        }

        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => absint( $featured_artist_count ),
            'orderby'           => 'post__in',
        );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 1;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : get_template_directory_uri().'/assets/uploads/no-featured-image-600x450.jpg';
                $page_post['excerpt']   = workart_trim_content(40);

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
            $i++;
        endif;
        wp_reset_postdata();

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// featured_artist section content details.
add_filter( 'workart_filter_featured_artist_section_details', 'workart_get_featured_artist_section_details' );


if ( ! function_exists( 'workart_render_featured_artist_section' ) ) :
  /**
   * Start featured_artist section
   *
   * @return string featured_artist content
   * @since  Workart 1.0.0
   *
   */
   function workart_render_featured_artist_section( $content_details = array() ) {
        $options = workart_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        }
        $first_post = array_shift($content_details)?>

            <div id="workart_featured_artist_section" class="relative page-section">
                <div class="wrapper">
                    <div class="featured-artist-content">
                        <div class="featured-image" style="background-image: url('<?php echo esc_url( $first_post['image'] ); ?>');"></div><!-- .featured-image -->

                        <div class="section-container">
                            <div class="section-header">
                                <p class="section-subtitle"><?php echo esc_html($options['featured_artist_sub_title']); ?></p>
                                <h2 class="section-title"><?php echo esc_html( $first_post['title'] ); ?></h2>
                            </div><!-- .section-header -->

                            <div class="entry-content">
                                <p><?php echo wp_kses_post( $first_post['excerpt'] ); ?></p>
                            </div><!-- .entry-content -->
                        </div><!-- .section-container -->
                    </div><!-- #featured-artist-content -->

                    <div class="featured-artist-posts col-2 clear">
                        <?php foreach ( $content_details as $content ) : ?>

                        <article>
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="post-thumbnail-link" title="<?php echo esc_attr( $content['title'] ); ?>"></a>
                            </div><!-- .featured-image -->

                            <div class="entry-container">
                                <div class="entry-meta">
                                    <?php workart_posted_on($content['id']); ?>
                                </div><!-- .entry-meta -->

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>
                            </div><!-- .entry-container -->
                        </article>

                        <?php endforeach; ?>
                    </div><!-- .featured-artist-posts -->
                </div><!-- .wrapper -->
            </div><!-- #workart_featured_artist_section -->
    <?php
    }    
endif;

