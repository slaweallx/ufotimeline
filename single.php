<?php get_header(); ?>

<div class="content">
	
	<?php get_template_part('inc/page-title'); ?>
	
	<?php while ( have_posts() ): the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
			
			<div class="type-entry-wrap">
				
				<?php
					 // Assign the year to a variable
					 $year = get_the_date('Y', '', '', FALSE);
					 $year_link = get_year_link($year);
					 
					 // If your year hasn't been echoed earlier in the loop, echo it now
					 if ($year !== $year_check) {
					 echo "<h3 class='type-entry-year'><span class='type-entry-year-circle'></span><i><a href='" . $year_link . "'>" . $year . "</a></i></h3>";
					 }

					 // Now that your year has been printed, assign it to the $year_check variable
					 $year_check = $year;
				?>
				
				<div class="type-entry-single">
				
					<header class="entry-header group">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>
					
					<?php if ( has_post_thumbnail() ): ?>
						<div class="type-entry-thumbnail">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('ufotimeline-small'); ?>
							</a>
						</div>
					<?php endif; ?>
					
					<div class="entry-content">
						<div class="entry themeform">
							<?php if ( has_excerpt() ) : ?>
								<p class="entry-custom-excerpt"><?php if ( has_category('quotes')) : ?> <i class="fas fa-briefcase"></i><?php elseif ( has_category('books-documents')) : ?> <i class="fas fa-book"></i><?php else: ?><i class="fas fa-external-link-alt"></i><?php endif; ?><?php echo get_the_excerpt(); ?></p>
							<?php endif; ?>
							<?php the_content(); ?>
							<?php wp_link_pages(array('before'=>'<div class="post-pages">'.esc_html__('Pages:','ufotimeline'),'after'=>'</div>')); ?>
							<div class="clear"></div>
						</div><!--/.entry-->
					</div>
					<div class="entry-footer group">
						
						<?php the_tags('<p class="post-tags"><span>'.esc_html__('Tags:','ufotimeline').'</span> ','','</p>'); ?>
						
						<?php if ( rwmb_get_value( 'extra' ) ): ?>
							<div class="type-entry-extra-single">
								<div class="type-entry-extra-icon" title="Additional Information"><div class="type-entry-extra-icon-curve"></div><i class="fas fa-info-circle"></i></div>
								<div class="type-entry-extra-single-inner">
									<p><?php rwmb_the_value( 'extra' ) ?></p>
								</div>
							</div>
							<div class="clear"></div>
						<?php endif; ?>
						
						<ul class="entry-share group">
							<li class="entry-share-x"><a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?> - UFO Timeline" title="Share on X"><i class="fab fa-x-twitter"></i></a></li>
							<li class="entry-share-facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" title="Share on Facebook"><i class="fab fa-facebook"></i></a></li>
							<li class="entry-share-reddit"><a href="https://reddit.com/submit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" title="Share on Reddit"><i class="fab fa-reddit"></i></a></li>
							<li class="entry-share-pinterest"><a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=&description=<?php the_title(); ?>" title="Share on Pinterest"><i class="fab fa-pinterest"></i></a></li>
							<li class="entry-share-linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" title="Share on Linkedin"><i class="fab fa-linkedin"></i></a></li>
						</ul>
						
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