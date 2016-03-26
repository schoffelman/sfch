<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sfch
 */


if ( has_post_thumbnail() ) {
	echo '<div class="featured-image">';
    	the_post_thumbnail();
    echo '</div>';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
	
		<?php the_content(); ?>
		
	</div><!-- .entry-content -->

	<footer class="entry-footer mobile_hide">
		<?php get_sidebar('parent-page'); ?>
	</footer><!-- .entry-footer -->
	
	<div class="clear"></div>
	
</article><!-- #post-## -->
