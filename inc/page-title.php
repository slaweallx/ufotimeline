<div class="page-title group">
	<div class="page-title-inner group">
	
		<?php if ( is_home() ) : ?>
			<h2>The Timeline</h2>
			
		<?php elseif ( is_single() ): ?>
			<h2><?php exclude_post_categories('11'); ?> &middot; <?php the_time('M d'); ?></h2>	
			
		<?php elseif ( is_page() ): ?>
			<h2><?php the_title(); ?></h2>

		<?php elseif ( is_search() ): ?>
			<h1>
				<?php if ( have_posts() ): ?><?php endif; ?>
				<?php if ( !have_posts() ): ?><?php endif; ?>
				<?php $search_results=$wp_query->found_posts;
					if ($search_results==1) {
						echo $search_results.' '.esc_html__('Search result','ufotimeline');
					} else {
						echo $search_results.' '.esc_html__('Search results','ufotimeline');
					}
				?>
			</h1>
			<div class="type-entry-wrap">
				<div class="notebox">
					<?php esc_html_e('For the term','ufotimeline'); ?> "<span><?php echo get_search_query(); ?></span>".
					<?php if ( !have_posts() ): ?>
						<?php esc_html_e('Please try another search:','ufotimeline'); ?>
					<?php endif; ?>
					<div class="search-again">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		<?php elseif ( is_404() ): ?>
			<h1><?php esc_html_e('Error 404.','ufotimeline'); ?> <span><?php esc_html_e('Page not found!','ufotimeline'); ?></span></h1>
			<div class="type-entry-wrap">
				<div class="notebox">	
					<p><?php esc_html_e( 'The page you are trying to reach does not exist, or has been moved. Please use the menus or the search box to find what you are looking for.', 'ufotimeline' ); ?></p>
					<?php get_search_form(); ?>
				</div>
				<div class="curve"></div>
			</div>
			
		<?php elseif ( is_author() ): ?>
			<?php $author = get_userdata( get_query_var('author') );?>
			<h1><?php echo $author->display_name;?></h1>
			
		<?php elseif ( is_category() ): ?>
			<h1><?php echo single_cat_title('', false); ?></h1>

		<?php elseif ( is_tag() ): ?>
			<h1><?php echo single_tag_title('', false); ?></h1>
			
		<?php elseif ( is_day() ): ?>
			<h1></i><?php echo esc_html( get_the_time('F j, Y') ); ?></h1>
			
		<?php elseif ( is_month() ): ?>
			<h1><?php echo esc_html( get_the_time('F Y') ); ?></h1>
				
		<?php elseif ( is_year() ): ?>
			<h1><?php echo esc_html( get_the_time('Y') ); ?></h1>
		
		<?php else: ?>
			<h2><?php the_title(); ?></h2>

		<?php endif; ?>

		<?php if ( ! is_paged() ) : ?>
			<?php the_archive_description( '<div class="notebox">', '</div>' ); ?>
		<?php endif; ?>
	
	</div><!--/.page-title-inner-->
</div><!--/.page-title-->