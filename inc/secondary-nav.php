
		
		<img class="mobile child-nav-cntrl" alt="" src="<?php echo get_bloginfo('template_directory'); ?>/images/mobile-secondary-nav-icon.png" />
		<ul class="child-nav" style="display: none;">
			<?php wp_list_pages( array( 'child_of' => $post->post_parent, 'title_li' => '') ); ?>
		</ul>