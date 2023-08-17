<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage  Workart
	 * @since  Workart 1.0.0
	 */

	/**
	 * workart_doctype hook
	 *
	 * @hooked workart_doctype -  10
	 *
	 */
	do_action( 'workart_doctype' );

?>
<head>
<?php
	/**
	 * workart_before_wp_head hook
	 *
	 * @hooked workart_head -  10
	 *
	 */
	do_action( 'workart_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>
<?php
	/**
	 * workart_page_start_action hook
	 *
	 * @hooked workart_page_start -  10
	 *
	 */
	do_action( 'workart_page_start_action' ); 

	/**
	 * workart_loader_action hook
	 *
	 * @hooked workart_loader -  10
	 *
	 */
	do_action( 'workart_before_header' );

	/**
	 * workart_header_action hook
	 *
	 * @hooked workart_site_branding -  10
	 * @hooked workart_header_start -  20
	 * @hooked workart_site_navigation -  30
	 * @hooked workart_header_end -  50
	 *
	 */
	do_action( 'workart_header_action' );

	/**
	 * workart_content_start_action hook
	 *
	 * @hooked workart_content_start -  10
	 *
	 */
	do_action( 'workart_content_start_action' );

    /**
     * workart_header_image_action hook
     *
     * @hooked workart_header_image -  10
     *
     */
    do_action( 'workart_header_image_action' );
	
