<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sfch
 */

get_header(); 

while ( have_posts() ) : the_post(); ?>
		
	<header class="page-header">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

<?php endwhile; // End of the loop. ?>

	<div id="primary" class="content-area">
			
		<main id="main" class="site-main" role="main">
		
		<?php

			while ( have_posts() ) : the_post();

				
				if ( is_page() && $post->post_parent ) {

					get_template_part( 'template-parts/content', 'page' );
				
				} else {
					
					get_template_part( 'template-parts/content', 'parent-page' );
					
				}

			endwhile; // End of the loop.
			
			?>
			

		</main><!-- #main -->
		
		<?php 
		
		if ( is_page() && $post->post_parent ) {
			
			get_sidebar(); 
		
		} else {
		
			get_template_part( 'template-parts/content', 'child-page-list' );
			
		}
		
		?>
		
	</div><!-- #primary -->

<script type="text/javascript">
$(document).ready(function(){
  $('.page-title').click(function(){
  	$('.advanced-sidebar-menu').addClass('show');
  });
});
</script>
<?php
get_footer();
