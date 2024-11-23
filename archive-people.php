<?php get_header(); ?>

<div class="content">
	
	<div class="page-title group">
		<div class="page-title-inner group">
			<h2>People</h2>
		</div>
	</div>
	
	<div id="category-description">
		<h2>Noteworthy individuals related to the phenomenon in different ways.</h2>
	</div>

	<?php if ( have_posts() ) : ?>
		
		<div class="type-entry-wrap">
		
			<div class="mixitup-controls">	
				<button type="button" class="control" data-filter="all">All</button>
				<button type="button" class="control" data-filter=".Past">Past</button>
				<button type="button" class="control" data-filter=".Present">Present</button>	
			</div>
			
			<div class="clear"></div>
	
			<div class="type-people-wrap mixitup-container" data-ref="mixitup-container">
			
				<?php while ( have_posts() ): the_post(); ?>
					<?php get_template_part('content-people'); ?>
				<?php endwhile; ?>
			
			</div>
			
			<div class="curve"></div>
		</div>
		
		<?php get_template_part('inc/pagination'); ?>
		
	<?php endif; ?>

</div><!--/.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>