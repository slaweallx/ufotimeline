<?php get_header(); ?>

<div class="content">
	
	<div class="page-title group">
		<div class="page-title-inner group">
			<h2>Added <?php the_time( get_option('date_format') ); ?></h2>
		</div>
	</div>
	
	<?php while ( have_posts() ): the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
			
			<div class="type-entry-wrap">
			
				<div class="type-entry-single">

					<div class="type-websites-single-header group">
					
						<div class="type-websites-single-header-top">
							
							<header class="entry-header group">
								<h1 class="entry-title"><?php the_title(); ?></h1>
								<?php if ( rwmb_get_value( 'websites-filter-type' ) ): ?>
									<h4 class="type-websites-single-type"><?php rwmb_the_value( 'websites-filter-type' ) ?></h4>
								<?php endif; ?>
							</header>
							
						</div>
						
						<div class="type-websites-single-header-bottom">
						
							<?php if ( has_post_thumbnail() ): ?>
								<div class="type-websites-single-thumbnail">
									<?php if ( rwmb_get_value( 'website-link' ) ): ?>
										<a class="type-websites-single-clickable" href="<?php rwmb_the_value( 'website-link' ) ?>"></a>
									<?php endif; ?>
									<?php the_post_thumbnail('ufotimeline-large-hd'); ?>
								</div>
							<?php else: ?>	
								<div class="type-websites-single-thumbnail-empty">
									<?php if ( rwmb_get_value( 'website-link' ) ): ?>
										<a class="type-websites-single-clickable" href="<?php rwmb_the_value( 'website-link' ) ?>"></a>
									<?php endif; ?>
									<i class="fas fa-image"></i>
								</div>
							<?php endif; ?>
						
						</div>
						
						<?php if ( rwmb_get_value( 'website-link' ) ): ?>
							<a class="type-websites-single-btn" href="<?php rwmb_the_value( 'website-link' ) ?>"><i class="fas fa-globe"></i><span>View Now</span></a>
						<?php endif; ?>
						
					</div>

					<div class="entry-content">
						<div class="entry themeform">
							<?php the_content(); ?>
							<div class="clear"></div>
						</div><!--/.entry-->
					</div>
					<div class="entry-footer group">
						
						<ul class="entry-share group">
							<li class="entry-share-x"><a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?> - UFO Timeline" title="Share on X"><i class="fab fa-x-twitter"></i></a></li>
							<li class="entry-share-facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" title="Share on Facebook"><i class="fab fa-facebook"></i></a></li>
							<li class="entry-share-reddit"><a href="https://reddit.com/submit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" title="Share on Reddit"><i class="fab fa-reddit"></i></a></li>
							<li class="entry-share-pinterest"><a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=&description=<?php the_title(); ?>" title="Share on Pinterest"><i class="fab fa-pinterest"></i></a></li>
							<li class="entry-share-linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" title="Share on Linkedin"><i class="fab fa-linkedin"></i></a></li>
						</ul>
						
						<?php if ( comments_open() || get_comments_number() ) :	comments_template( '/comments.php', true ); endif; ?>
						
					</div>

					<div class="curve"></div>
				</div>
			
			</div>

		</article><!--/.post-->

	<?php endwhile; ?>
	
</div><!--/.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>