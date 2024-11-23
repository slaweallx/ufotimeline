<?php
/*
Template Name: Contact
*/
?>
<?php get_header(); ?>

<?php
 
if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
  wpcf7_enqueue_scripts();
}
 
if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
  wpcf7_enqueue_styles();
}
 
?>

<div class="content">
	
	<?php get_template_part('inc/page-title'); ?>
	
	<?php while ( have_posts() ): the_post(); ?>
	
	<article <?php post_class(); ?>>	
		
		<div class="type-entry-wrap">
			
			<div class="type-entry-single">
			
				<div class="entry-content">
					<div class="entry themeform">
						<?php the_content(); ?>
						<div class="clear"></div>
					</div><!--/.entry-->
				</div>
				<div class="entry-footer group">
					<?php if ( comments_open() || get_comments_number() ) :	comments_template( '/comments.php', true ); endif; ?>
				</div>
			
			</div>
			<div class="curve"></div>
		</div>

	</article><!--/.post-->	
	
	<?php endwhile; ?>

</div><!--/.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>