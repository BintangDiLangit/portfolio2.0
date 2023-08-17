<?php
/**
 * Subscription section
 *
 * This is the template for the content of subscribe section
 *
 * @package Theme Palace
 * @subpackage Workart
 * @since Workart 1.0.0
 */
if ( ! function_exists( 'workart_add_subscribe_section' ) ) :
    /**
    * Add subscribe section
    *
    *@since Workart 1.0.0
    */
    function workart_add_subscribe_section() {
        $options = workart_get_theme_options();
        if ( ! class_exists( 'Jetpack' ) ) {
            return;
        } elseif ( class_exists( 'Jetpack' ) ) {
            if ( ! Jetpack::is_module_active( 'subscriptions' ) )
                return;
        }

        // Check if subscribe is enabled on frontpage
        $subscribe_enable = apply_filters( 'workart_section_status', true, 'subscribe_section_enable' );

        if ( true !== $subscribe_enable ) {
            return false;
        }
        // Render subscribe section now.
        workart_render_subscribe_section();
    }
endif;

if ( ! function_exists( 'workart_render_subscribe_section' ) ) :
  /**
   * Start subscribe section
   *
   * @return string subscribe content
   * @since Workart 1.0.0
   *
   */
   function workart_render_subscribe_section() {
        $options = workart_get_theme_options(); 
        $subscribe_bg_image = !empty($options['subscribe_bg_image']) ? $options['subscribe_bg_image'] : ''; ?>

            <div id="workart_subscribe_section" class="relative page-section" style="background-image: url('<?php echo esc_url( $subscribe_bg_image ); ?>');">
                <div class="wrapper">
                    <div class="subscribe-content-wrapper">
                        <header class="entry-header">
                            <p class="section-subtitle"><?php echo esc_html( $options['subscribe_section_subtitle'] ); ?></p>
                            <h2 class="entry-title"><?php echo esc_html( $options['subscribe_section_title'] ); ?></h2>
                        </header>

                        <div class="entry-content">
                            <p><?php echo esc_html( $options['subscribe_section_description'] ); ?></p>
                        </div><!-- .entry-content -->
                    </div><!-- .subscribe-content-wrapper -->

                    <div class="subscribe-form-wrapper">

                    <?php 
                        $subscribe_shortcode = '[jetpack_subscription_form title="" subscribe_text="" subscribe_button="' . esc_html( $options['subscribe_section_btn_txt'] ) . '" show_subscribers_total="0"]';
                        echo do_shortcode( wp_kses_post( $subscribe_shortcode ) );  ?>

                    </div><!-- .subscribe-form-wrapper -->
                </div><!-- .wrapper -->
            </div><!-- #workart_subscribe_section -->    
        
    <?php
    }
endif; ?>
