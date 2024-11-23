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
				<?php $count++; ?>
				<?php if ($count == 6) : ?>
					<?php get_template_part('content'); ?>
					<?php get_template_part('content-mobile'); ?>
				<?php else : ?>
					<?php get_template_part('content'); ?>
				<?php endif; ?>
			<?php endwhile; ?>
			</div>
			
			<div class="curve"></div>
		</div>
		
		<div class="type-entry-wrap recent-comments">
			
			<div class="curve-top"></div>
			
			<article class="type-entry">
				<div class="has-thumb">	
					<h3 class="type-entry-title">Recent Comments</h3>
					<div class="type-entry-thumbnail-empty">
						<a href="#" aria-label="Read More">
							<i class="fas fa-comments"></i>
						</a>
					</div>
					<ul class="recent-comments">
						<?php $comments = get_comments(array('number'=>3,'status'=>'approve','post_status'=>'publish')); ?>
						<?php foreach ($comments as $comment): ?>		
						<?php $str=explode(' ',get_comment_excerpt($comment->comment_ID)); $comment_excerpt=implode(' ',array_slice($str,0,11)); if(count($str) > 11 && substr($comment_excerpt,-1)!='.') $comment_excerpt.='...' ?>
						<li>
							<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>" class="rc-wrap">
								<span class="rc-avatar"><?php echo get_avatar($comment->comment_author_email,$size='64'); ?></span>
								<span class="rc-author"><i class="fas fa-comment"></i> <?php echo esc_attr( $comment->comment_author ); ?></span>
								<span class="rc-excerpt">in <?php echo get_the_title($comment->comment_post_ID); ?></span>
								<span class="rc-post">"<?php echo esc_attr( $comment_excerpt ); ?>"</span>
								<span class="rc-icon"></span>
							</a>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>	
			</article>
			
			<article class="type-entry">
				<div class="has-thumb">	
					<h3 class="type-entry-title">Liked By</h3>
					<div class="type-entry-thumbnail-empty">
						<a href="#" aria-label="Read More">
							<i class="fas fa-star"></i>
						</a>
					</div>
					<ul class="recent-comments">
						<li>
							<a href="https://x.com/GarryPNolan/status/1634916922063216640" class="rc-wrap">
								<span class="rc-avatar"><img src="<?php echo get_template_directory_uri(); ?>/thumbs/garry-nolan.jpg" alt="Garry Nolan" loading="lazy" /></span>
								<span class="rc-author"><i class="fab fa-x-twitter"></i> Garry P. Nolan</span>
								<span class="rc-excerpt"> - Stanford University Professor</span>
								<span class="rc-post">"Very nicely done."</span>
								<span class="rc-icon"></span>
							</a>
						</li>
						<li>
							<a href="https://x.com/uncertainvector/status/1532434009472516096" class="rc-wrap">
								<span class="rc-avatar"><img src="<?php echo get_template_directory_uri(); ?>/thumbs/ryan-graves.jpg" alt="Ryan Graves" loading="lazy" /></span>
								<span class="rc-author"><i class="fab fa-x-twitter"></i> Ryan Graves</span>
								<span class="rc-excerpt"> - Navy Fighter Pilot, Chairman AIAA, Founder ASA</span>
								<span class="rc-post">"I remember seeing it when it came out - great stuff!"</span>
								<span class="rc-icon"></span>
							</a>
						</li>
						<li>
							<a href="https://x.com/JeremyCorbell/status/1520483644640403456" class="rc-wrap">
								<span class="rc-avatar"><img src="<?php echo get_template_directory_uri(); ?>/thumbs/jeremy-corbell.jpg" alt="Jeremy Corbell" loading="lazy" /></span>
								<span class="rc-author"><i class="fab fa-x-twitter"></i> Jeremy Corbell</span>
								<span class="rc-excerpt"> - Film Director</span>
								<span class="rc-post">"It’s an excellent educational concept."</span>
								<span class="rc-icon"></span>
							</a>
						</li>
					</ul>
				</div>	
			</article>
			
			<article class="type-entry">
				<div class="has-thumb">	
					<h3 class="type-entry-title">Contribute</h3>
					<div class="type-entry-thumbnail-empty">
						<a href="#" aria-label="Read More">
							<i class="fas fa-heart"></i>
						</a>
					</div>
					<ul class="recent-comments">
						<li>
							<a href="<?php echo get_site_url(); ?>/contact/" class="rc-wrap">
								<span class="rc-avatar"><img src="<?php echo get_template_directory_uri(); ?>/thumbs/ufotimeline-logo.jpg" alt="UFO Timeline" loading="lazy" /></span>
								<span class="rc-author"><i class="fas fa-pen"></i> Got a suggestion?</span>
								<span class="rc-excerpt"> - Help making this website better</span>
								<span class="rc-post">Do you have content you think would fit the timeline? Share!</span>
								<span class="rc-icon"></span>
							</a>
						</li>
					</ul>
				</div>	
			</article>
			
			<article class="type-entry">
				<div class="has-thumb">	
					<h3 class="type-entry-title">Also See</h3>
					<div class="type-entry-thumbnail-empty">
						<a href="#" aria-label="Read More">
							<i class="fas fa-external-link-alt"></i>
						</a>
					</div>
					<ul class="recent-comments">
						<li>
							<a href="https://ufoquotes.com" class="rc-wrap">
								<span class="rc-avatar"><img src="<?php echo get_template_directory_uri(); ?>/thumbs/ufoquotes-logo.jpg" alt="UFO Quotes" loading="lazy" /></span>
								<span class="rc-author"><i class="fas fa-map-marker-alt"></i> UFO Quotes</span>
								<span class="rc-excerpt"> - The UFO quote collection</span>
								<span class="rc-post">Authorative quotes from high-ranking officials.</span>
								<span class="rc-icon"></span>
							</a>
						</li>
					</ul>
				</div>
			</article>
			
			<a class="more-links-btn" href="<?php echo get_site_url(); ?>/websites/"><i class="fas fa-link"></i> More Websites</a>
			
			<div class="curve"></div>
		</div>
		
		<?php get_template_part('inc/pagination'); ?>
		
	<?php endif; ?>
	
</div><!--/.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>