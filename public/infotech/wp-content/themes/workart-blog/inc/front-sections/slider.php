<?php

if ( ! function_exists( 'workart_blog_add_slider_section' ) ) :

    function workart_blog_add_slider_section() {


        if ( get_theme_mod( 'featured_slider_section_enable', false ) == false ) {
            return false;
        }

        $section_details = array();
        $section_details = apply_filters( 'workart_filter_slider_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        workart_render_slider_section( $section_details );
}

endif;

if ( ! function_exists( 'workart_get_slider_section_details' ) ) :

    function workart_get_slider_section_details( $input ) {

        $featured_slider_count           = 3;
        
        $content = array();
      
        $page_ids = array();

        for ( $i = 1; $i <= $featured_slider_count; $i++ ) {
            if ( ! empty( get_theme_mod( 'featured_slider_content_page_' . $i, '' ) ) )
                $page_ids[] =  get_theme_mod( 'featured_slider_content_page_' . $i, '' );
        }

        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => absint( $featured_slider_count ),
            'orderby'           => 'post__in',
            );                    
           

        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 1;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = workart_trim_content(20);
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : '';

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

add_filter( 'workart_filter_slider_section_details', 'workart_get_slider_section_details' );


if ( ! function_exists( 'workart_render_featured_slider_section' ) ) :

   function workart_render_slider_section( $content_details = array() ) {

    ?>
        
        <div id="workart_featured_slider_section" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1500, "dots": true, "arrows": true, "autoplay": false, "draggable": true, "fade": true }'>
            <?php foreach ( $content_details as $content ) : ?>
                
                <article style="background-image:url('<?php echo esc_url($content['image']); ?>');">
                    <div class="overlay"></div>
                    <div class="wrapper">
                        <div class="featured-content-wrapper">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                            </header>

                            <div class="entry-content">
                                <p><?php echo wp_kses_post($content['excerpt']); ?></p>
                            </div>

                            
                            <div class="read-more">
                                <?php if ( !empty( get_theme_mod( 'featured_slider_btn_txt', '' ) ) ): ?>
                                    <a href="<?php echo esc_url($content['url']); ?>" class="btn"><?php echo esc_html(get_theme_mod( 'featured_slider_btn_txt', '' )); ?></a>
                                <?php endif ?>                             
                              

                                <?php if(!empty( get_theme_mod( 'featured_slider_btn_alt_txt', '' ) ) && !empty( get_theme_mod( 'featured_slider_btn_alt_url', '' ) ) ): ?>
                                    <a href="<?php echo esc_url(get_theme_mod( 'featured_slider_btn_alt_url', '' )); ?>" class="btn"><?php echo esc_html(get_theme_mod( 'featured_slider_btn_alt_txt', '' )); ?></a>
                                <?php endif; ?>
                            </div>

    
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>

        </div>
<?php
    }    
endif;
