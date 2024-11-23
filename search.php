<?php get_header(); ?>

<div class="content">
	
	<?php get_template_part('inc/page-title'); ?>
	
	<?php if ( have_posts() ) : ?>
		
		<div class="type-entry-wrap">
			<?php while ( have_posts() ): the_post(); ?>
				<?php get_template_part('content'); ?>
			<?php endwhile; ?>
			<div class="curve"></div>
		</div>
		
		<?php get_template_part('inc/pagination'); ?>
		
	<?php endif; ?>
		
</div><!--/.content-->

<?php get_sidebar(); ?>
	
<?php get_footer(); ?>