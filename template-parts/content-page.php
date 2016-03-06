<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sfch
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
	
		<?php the_content(); ?>
			
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php get_sidebar('single-page'); ?>
	</footer><!-- .entry-footer -->
	
	<div class="clear"></div>
	
</article><!-- #post-## -->
