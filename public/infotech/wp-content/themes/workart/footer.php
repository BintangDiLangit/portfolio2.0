<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 */

/**
 * workart_footer_primary_content hook
 *
 * @hooked workart_add_subscribe_section -  10
 *
 */
do_action( 'workart_footer_primary_content' );

/**
 * workart_content_end_action hook
 *
 * @hooked workart_content_end -  10
 *
 */
do_action( 'workart_content_end_action' );

/**
 * workart_content_end_action hook
 *
 * @hooked workart_footer_start -  10
 * @hooked Workart_Footer_Widgets->add_footer_widgets -  20
 * @hooked workart_footer_site_info -  40
 * @hooked workart_footer_end -  100
 *
 */
do_action( 'workart_footer' );

/**
 * workart_page_end_action hook
 *
 * @hooked workart_page_end -  10
 *
 */
do_action( 'workart_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
