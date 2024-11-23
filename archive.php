<?php get_header(); ?>

<div class="content">
	
	<?php get_template_part('inc/page-title'); ?>
	<?php get_template_part('inc/category-descriptions'); ?>
	
	<?php if ( have_posts() ) : ?>
		
		<div class="type-entry-wrap">
			
			<div class="type-entry-stickywrap">
			<?php while ( have_posts() ): the_post(); ?>
				<?php
					 // Assign the year to a variable
					 $year = get_the_date('Y', '', '', FALSE);
					 $year_link = get_year_link($year);
					 
					 // If your year hasn't been echoed earlier in the loop, echo it now
					 if (! isset($year_check) || $year !== $year_check) {
					 echo "</div><div class='type-entry-stickywrap'><h3 class='type-entry-year'><span class='type-entry-year-circle'></span><i><a href='" . $year_link . "'>" . $year . "</a></i></h3>";
					 }

					 // Now that your year has been printed, assign it to the $year_check variable
					 $year_check = $year;
				?>
				<?php get_template_part('content'); ?>
			<?php endwhile; ?>
			</div>
			
			<div class="curve"></div>
		</div>
		
		<?php get_template_part('inc/pagination'); ?>
		
	<?php endif; ?>

</div><!--/.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>