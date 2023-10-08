<?php

if ( ! function_exists( 'workart_blog_add_cta_section' ) ) :

    function workart_blog_add_cta_section() {


        if ( get_theme_mod( 'call_to_action_section_enable', false ) == false ) {
            return false;
        }

        $section_details = array();
        $section_details = apply_filters( 'workart_filter_cta_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        workart_render_cta_section( $section_details );
}

endif;

if ( ! function_exists( 'workart_get_cta_section_details' ) ) :

    function workart_get_cta_section_details( $input ) {

        $call_to_action_count           = 3;
        
        $content = array();

        $page_ids[] =  get_theme_mod( 'call_to_action_content_page' );


        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => absint( $call_to_action_count ),
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

add_filter( 'workart_filter_cta_section_details', 'workart_get_cta_section_details' );


if ( ! function_exists( 'workart_render_call_to_action_section' ) ) :

   function workart_render_cta_section( $content_details = array() ) {

    ?>
    <?php foreach ( $content_details as $content ) : ?>
        <div id="workart_call_to_action_section" class="relative page-section">
            <div class="wrapper">
                <article>
                    <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                        <a href="<?php echo esc_url( $content['url'] ); ?>" class="post-thumbnail-link"></a>
                    </div><!-- .featured-image -->

                    <div class="section-container">
                        <div class="section-header">
                            <?php if ( get_theme_mod( 'call_to_action_custom_sub_title', '' ) ): ?>
                                <p class="section-subtitle"><?php echo esc_html( get_theme_mod( 'call_to_action_custom_sub_title', '' ) ); ?></p>
                            <?php endif ?>
                            <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                        </div><!-- .section-header -->

                        <div class="section-content">
                            <p><?php echo wp_kses_post($content['excerpt']); ?></p>
                        </div><!-- .section-content -->

                        <?php if ( !empty( get_theme_mod( 'call_to_action_btn_txt', '' ) ) ): ?>
                            <div class="read-more">                                        
                                <a href="<?php echo esc_url($content['url']); ?>" class="btn"><?php echo esc_html(get_theme_mod( 'call_to_action_btn_txt', '' )); ?></a>
                            </div>
                        <?php endif ?> 
                    </div><!-- .section-container -->
                </article>
            </div><!-- .wrapper -->
        </div>        
    <?php endforeach; ?>

<?php   }    
endif;

