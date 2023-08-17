<?php
/**
 * Banner section
 *
 * This is the template for the content of hero slider section
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 */
if ( ! function_exists( 'workart_add_hero_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since  Workart 1.0.0
    */
    function workart_add_hero_slider_section() {
    	$options = workart_get_theme_options();
        // Check if slider is enabled on frontpage
        $hero_slider_enable = apply_filters( 'workart_section_status', true, 'hero_slider_section_enable' );

        if ( true !== $hero_slider_enable ) {
            return false;
        }
        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'workart_filter_hero_slider_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render slider section now.
        workart_render_hero_slider_section( $section_details );
}

endif;

if ( ! function_exists( 'workart_get_hero_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since  Workart 1.0.0
    * @param array $input slider section details.
    */
    function workart_get_hero_slider_section_details( $input ) {
        $options = workart_get_theme_options();

        // Content type.
        $hero_slider_content_type    = $options['hero_slider_content_type'];
        $hero_slider_count           = ! empty( $options['hero_slider_count'] ) ? $options['hero_slider_count'] : 3;
        
        $content = array();
        switch ( $hero_slider_content_type ) {
            
            case 'page':
                $page_ids = array();

                for ( $i = 1; $i <= $hero_slider_count; $i++ ) {
                    if ( ! empty( $options['hero_slider_content_page_' . $i] ) )
                        $page_ids[] = $options['hero_slider_content_page_' . $i];
                }

                $args = array(
                    'post_type'         => 'page',
                    'post__in'          => ( array ) $page_ids,
                    'posts_per_page'    => absint( $hero_slider_count ),
                    'orderby'           => 'post__in',
                    );                    
            break;

            case 'product-category':
                $cat_id = ! empty( $options['hero_slider_product_category'] ) ? $options['hero_slider_product_category'] : '';

                $args = array(
                    'post_type'         => 'product',
                    'posts_per_page'    => absint( $hero_slider_count ),
                    'tax_query'         => array(
                        array(
                            'taxonomy'  => 'product_cat',
                            'field'     => 'id',
                            'terms'     => $cat_id
                        )
                    )
                );

            break;

            default:
            break;
        }

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 1;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = workart_trim_content($options['hero_slider_excerpt_length']);
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'medium_large' ) : get_template_directory_uri().'/assets/uploads/no-featured-image-600x450.jpg';

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
// slider section content details.
add_filter( 'workart_filter_hero_slider_section_details', 'workart_get_hero_slider_section_details' );


if ( ! function_exists( 'workart_render_hero_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since  Workart 1.0.0
   *
   */
   function workart_render_hero_slider_section( $content_details = array() ) {
        $options = workart_get_theme_options();
        $hero_slider_content_type    = $options['hero_slider_content_type'];
        $hero_slider_btn_alt_url = (!empty($options['hero_slider_btn_alt_url'])) ? $options['hero_slider_btn_alt_url'] : '';

        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="workart_hero_slider_section" class="relative same-background">
            <div class="wrapper">
                <div class="section-header">
                    <p class="section-subtitle"><?php echo esc_html( $options['hero_slider_section_sub_title'] );?></p>
                    <h2 class="section-title"><?php echo esc_html( $options['hero_slider_section_title'] );?></h2>
                </div><!-- .section-header -->

                <div class="section-content">
                    <div class="hero-image-wrapper slider-nav">
                    <?php foreach ( $content_details as $content ) : ?>

                        <article>
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                <a href="<?php echo esc_url( $content['image'] ); ?>" class="more-link" title="<?php echo esc_attr( $content['image'] ); ?>"><i class="fa fa-plus"></i></a>

                                <?php if(!empty($options['hero_slider_btn_txt']) ) : ?>
                                    <div class="buttons-wrapper">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>" class="purchase-now"><?php echo esc_html( $options['hero_slider_btn_txt'] ); ?></a>
                                    </div><!-- .buttons-wrapper -->
                                <?php endif; ?>
                            </div><!-- .featured-image -->
                        </article>
                        
                        <?php endforeach; ?>

                    </div><!-- .hero-image-wrapper -->

                    <div class="hero-content-wrapper slider-for">
                        <?php foreach ( $content_details as $content ) : ?>

                        <article>
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                            </header>

                            <div class="entry-content">
                                <p><?php echo wp_kses_post($content['excerpt']); ?></p>
                            </div><!-- .entry-content -->
                            
                            <?php if( class_exists( 'WooCommerce' ) && $hero_slider_content_type == 'product-category' ) :
                                $product = new WC_Product( $content['id'] ); ?>
                                <span class="product-price">
                                    <span class="price-label"><?php echo esc_html( $options['hero_slider_price_title'] ); ?></span>
                                    <?php  echo $product->get_price_html(); ?>
                                </span><!-- .price -->
                            <?php endif; ?>
                        </article>

                        <?php endforeach; ?>

                    </div><!-- .hero-content-wrapper -->
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #workart_hero_slider_section -->

<?php
    }    
endif;