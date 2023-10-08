<?php

if ( ! function_exists( 'workart_blog_add_about_section' ) ) :

    function workart_blog_add_about_section() {


        if ( get_theme_mod( 'about_us_section_enable', false ) == false ) {
            return false;
        }

        $section_details = array();
        $section_details = apply_filters( 'workart_filter_about_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        workart_render_about_section( $section_details );
}

endif;

if ( ! function_exists( 'workart_get_about_section_details' ) ) :

    function workart_get_about_section_details( $input ) {

        $about_us_count           = 3;
        
        $content = array();

        $page_ids[] =  get_theme_mod( 'about_us_content_page' );


        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => absint( $about_us_count ),
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
                $page_post['excerpt']   = workart_trim_content(50);
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : '';

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

add_filter( 'workart_filter_about_section_details', 'workart_get_about_section_details' );


if ( ! function_exists( 'workart_render_about_us_section' ) ) :

   function workart_render_about_section( $content_details = array() ) {

    ?>
        

            <?php foreach ( $content_details as $content ) : ?>
                <div id="workart_about_us_section" class="relative page-section">
                    <div class="wrapper">
                        <article class="has-post-thumbnail">
                            <div class="featured-image clear">
                                <div class="featured-image-1" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');"></div>
                                <?php for ($i=2; $i < 4 ; $i++) { ?>
                                    <?php if ( !empty( get_theme_mod( 'about_us_custom_image' . $i, '' ) ) ): ?>
                                        <div class="featured-image-<?php echo $i; ?>" style="background-image: url('<?php echo esc_url( get_theme_mod( 'about_us_custom_image' . $i, '' ) ); ?>');"></div>
                                    <?php endif ?>
                                    
                                <?php } ?>
                            </div>

                            <div class="entry-container">
                                <div class="section-header">
                                    <?php if ( get_theme_mod( 'about_us_custom_sub_title', '' ) ): ?>
                                        <p class="section-subtitle"><?php echo esc_html( get_theme_mod( 'about_us_custom_sub_title', '' ) ); ?></p>
                                    <?php endif ?>
                                    
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </div>

                                <div class="entry-content">
                                    <p><?php echo wp_kses_post($content['excerpt']); ?></p>
                                </div>

                                <?php if ( !empty( get_theme_mod( 'about_us_btn_txt', '' ) ) ): ?>
                                    <div class="read-more">                                        
                                        <a href="<?php echo esc_url($content['url']); ?>" class="btn"><?php echo esc_html(get_theme_mod( 'about_us_btn_txt', '' )); ?></a>
                                    </div>
                                <?php endif ?>    
                            </div>
                        </article>
                    </div>
                </div>
                
            <?php endforeach; ?>

<?php   }    
endif;

