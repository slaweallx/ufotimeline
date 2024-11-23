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

					<div class="type-people-single-header group">
					
						<div class="type-people-single-header-left">
						
							<?php if ( has_post_thumbnail() ): ?>
								<div class="type-people-single-thumbnail">
									<?php the_post_thumbnail('ufotimeline-medium'); ?>
								</div>
							<?php else: ?>	
								<div class="type-people-single-thumbnail-empty">
									<i class="fas fa-user"></i>
								</div>
							<?php endif; ?>
							
							<?php if ( rwmb_get_value( 'years' ) ): ?>
								<div class="type-people-single-years"><i class="fas fa-calendar-alt"></i><?php rwmb_the_value( 'years' ) ?></div>
							<?php endif; ?>
						
						</div>
						
						<div class="type-people-single-header-right">
							
							<header class="entry-header group">
								<h1 class="entry-title"><?php the_title(); ?></h1>
							</header>
							
							<?php if ( rwmb_get_value( 'job' ) ): ?>
								<h4 class="type-people-single-job"><?php rwmb_the_value( 'job' ) ?></h4>
							<?php endif; ?>
							
							<?php if ( rwmb_get_value( 'website' ) ): ?>
								<a class="type-people-single-social-btn" title="Website" href="<?php rwmb_the_value( 'website' ) ?>"><i class="fas fa-globe"></i></a>
							<?php endif; ?>
							
							<?php if ( rwmb_get_value( 'twitter' ) ): ?>
								<a class="type-people-single-social-btn" title="X" href="<?php rwmb_the_value( 'twitter' ) ?>"><i class="fab fa-x-twitter"></i></a>
							<?php endif; ?>
							
							<?php if ( rwmb_get_value( 'source' ) ): ?>
								<a class="type-people-single-social-btn" title="Text Source" href="<?php rwmb_the_value( 'source' ) ?>"><i class="fas fa-pen"></i> <span>Source</span></a>
							<?php endif; ?>
						
						</div>
						
					</div>

					<div class="entry-content">
						<div class="entry themeform">
							<?php the_content(); ?>
							<div class="clear"></div>
							<p><i class="fas fa-info-circle"></i> This is a work in progess. Want to contribute? <a href="/contact/">Suggest</a> a change.</p>
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