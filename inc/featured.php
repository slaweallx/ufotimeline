<?php
// Query featured entries
$featured = new WP_Query(
	array(
		'no_found_rows'				=> false,
		'update_post_meta_cache'	=> false,
		'update_post_term_cache'	=> false,
		'ignore_sticky_posts'		=> 1,
		'posts_per_page'			=> 7,
		'category_name'				=> 'x'
	)
);
?>

<?php if ( is_home() || is_archive() || is_single() && $featured->have_posts() ): ?>

<div id="featured-wrap">

	<div id="featured-footer">
		<div id="featured-footer-inner">Featured</div>
	</div>

	<div class="slick-featured-wrap-outer">	
		<div class="slick-featured-wrap">
			<div class="slick-featured">
				<?php while ( $featured->have_posts() ): $featured->the_post(); ?>
					<div>	
						<?php get_template_part('content-featured'); ?>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="slick-featured-nav"></div>
		</div>
	</div>
	
</div>

<?php endif; ?>

<?php wp_reset_postdata(); ?>
