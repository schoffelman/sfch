<?php /* CTA Banner Ad Widget */ ?>
<div class="banner_ad">
    <?php $ctaBanner = new WP_Query('name=cta-banner'); ?>
    <?php if ($ctaBanner->have_posts()) : while ($ctaBanner->have_posts()) : $ctaBanner->the_post(); ?>
        <div class="entry">
            <?php the_content(); ?>
        </div>
    <?php endwhile; endif; ?>
    <?php wp_reset_query(); ?>
</div>