<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage  Workart
 * @since  Workart 1.0.0
 */

$options = workart_get_theme_options();
?>
<article id="post-<?php the_ID(); ?>">
    <div class="post-item-wrapper">
        <div class="featured-image" style="background-image: url('<?php echo (has_post_thumbnail( )) ? the_post_thumbnail_url( 'medium_large' ) : get_template_directory_uri().'/assets/uploads/no-featured-image-600x450.jpg' ?>');">
            <div class="read-more">
                <a href="<?php the_permalink(); ?>" class="btn">Read More</a>
            </div><!-- .read-more -->
        </div>

       <div class="entry-container">
            <div class="entry-meta"><?php echo workart_author(); workart_posted_on(); ?></div><!-- .entry-meta -->

            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>

            <div class="entry-content"><?php the_excerpt(); ?></div>
            
        </div><!-- .entry-container -->
    </div>
</article>
