<?php get_header(); ?>

<div class="content">
	
	<div class="page-title group">
		<div class="page-title-inner group">
			<h2>Websites</h2>
		</div>
	</div>
	
	<div id="category-description">
		<h2>A collection of great websites made by the community.</h2>
	</div>
	
	<?php if ( have_posts() ) : ?>
		
		<div class="type-entry-wrap">
		
			<div class="mixitup-controls">	
				<button type="button" class="control" data-filter="all">All</button>
				<button type="button" class="control" data-filter=".Recommended">Recommended</button>
				<button type="button" class="control" data-filter=".Organization">Organization</button>
				<button type="button" class="control" data-filter=".Inactive">Inactive</button>
			</div>
			
			<div class="clear"></div>
		
			<div class="type-people-wrap mixitup-container" data-ref="mixitup-container">
			
				<?php while ( have_posts() ): the_post(); ?>
					<?php get_template_part('content-websites'); ?>
				<?php endwhile; ?>
			
			</div>
			
			<div class="curve"></div>
		</div>
		
		<?php get_template_part('inc/pagination'); ?>
		
	<?php endif; ?>

</div><!--/.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>