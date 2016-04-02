<?php
/**
 * Template Name: Team
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sfch
 */

get_header(); 

while ( have_posts() ) : the_post(); ?>
		
	<header class="page-header">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		<img class="mobile child-nav-cntrl" alt="" src="<?php echo get_bloginfo('template_directory'); ?>/images/mobile-secondary-nav-icon.png" />
		<ul class="child-nav" style="display: none;">
			<?php wp_list_pages( array( 'child_of' => $post->post_parent, 'title_li' => '') ); ?>
		</ul>
	</header><!-- .entry-header -->

<?php endwhile; // End of the loop. ?>

	<div id="primary" class="content-area">
			
		<main id="main" class="site-main" role="main">
		
		<?php
		
		if ( have_posts() ) :
		
			while ( have_posts() ) : the_post();
					
				get_template_part( 'template-parts/content', 'team' );

			endwhile; // End of the loop.

		endif;
			
		?>

		</main><!-- #main -->
		
		<?php get_sidebar(); ?>
		
	</div><!-- #primary -->
<script type="text/javascript">
$(document).ready(function(){
	$('.page-title').click(function(){
	  	$('.advanced-sidebar-menu').toggleClass('show');
	});
	$('.child-nav-cntrl').click(function(){
	  $('.child-nav').toggleClass('show');
	});
});
</script>
<?php
get_footer();
