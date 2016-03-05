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
		<?php
		
			if ( has_post_thumbnail() ) {
				echo '<div class="featured-image">';
			    	the_post_thumbnail();
			    echo '</div>';
			}
				
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sfch' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php get_sidebar('single-page'); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
