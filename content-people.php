<div class="type-people-item mixitup-item <?php rwmb_the_value( 'people-filter-type' ) ?>" data-ref="mixitup-target">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<a href="<?php the_permalink(); ?>" class="type-people-clickable"></a>
		
		<div class="type-people">
			
			<?php if ( has_post_thumbnail() ): ?>
				<div class="type-people-thumbnail">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('ufotimeline-small'); ?>
					</a>
					<?php if ( comments_open() ): ?>
						<?php $number = get_comments_number( $post->ID ); if ( $number > 0 ) { ?>
							<a class="type-people-comments" href="<?php comments_link(); ?>"><i class="fas fa-comment"></i><span><?php comments_number( '0', '1', '%' ); ?></span></a>
						<?php } ?>
					<?php endif; ?>	
				</div>
			<?php else: ?>	
				<div class="type-people-thumbnail-empty">
					<a class="type-people-thumbnail-empty-link" href="<?php the_permalink(); ?>">
						<i class="fas fa-user"></i>
					</a>
					<?php if ( comments_open() ): ?>
						<?php $number = get_comments_number( $post->ID ); if ( $number > 0 ) { ?>
							<a class="type-people-comments" href="<?php comments_link(); ?>"><i class="fas fa-comment"></i><span><?php comments_number( '0', '1', '%' ); ?></span></a>
						<?php } ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_old_post(4) ): ?>	
			<?php else: ?>
				<div class="ribbon ribbon-right"><span>New</span></div>
			<?php endif; ?>

			<h3 class="type-people-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h3>
			
			<?php if ( rwmb_get_value( 'years' ) ): ?>
				<div class="type-people-years"><i class="fas fa-calendar-alt"></i><?php rwmb_the_value( 'years' ) ?></div><div class="clear"></div>
			<?php endif; ?>
			
			<?php if ( rwmb_get_value( 'job' ) ): ?>
				<h4 class="type-people-job"><?php rwmb_the_value( 'job' ) ?></h4>
			<?php endif; ?>
			
			<?php if ( rwmb_get_value( 'website' ) ): ?>
				<a class="type-people-social-btn" title="Website" href="<?php rwmb_the_value( 'website' ) ?>"><i class="fas fa-globe"></i></a>
			<?php endif; ?>
			
			<?php if ( rwmb_get_value( 'twitter' ) ): ?>
				<a class="type-people-social-btn" title="X" href="<?php rwmb_the_value( 'twitter' ) ?>"><i class="fab fa-x-twitter"></i></a>
			<?php endif; ?>
			
			<div class="type-people-middle">			
				<div class="type-people-excerpt"><?php the_excerpt(); ?></div>		
			</div>
			
			<div class="type-people-bottom">
				<button class="type-people-expand-btn" title="Share"><i class="fas fa-share"></i></button>
				<a class="type-people-more-btn" href="<?php the_permalink(); ?>">Read More</a>
			</div>
			
			<div class="type-people-expand group">
					
				<ul class="type-people-share group">
					<li class="entry-share-x"><a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?> - UFO Timeline" title="Share on X"><i class="fab fa-x-twitter"></i></a></li>
					<li class="entry-share-facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" title="Share on Facebook"><i class="fab fa-facebook"></i></a></li>
					<li class="entry-share-reddit"><a href="https://reddit.com/submit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" title="Share on Reddit"><i class="fab fa-reddit"></i></a></li>
					<li class="entry-share-pinterest"><a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=&description=<?php the_title(); ?>" title="Share on Pinterest"><i class="fab fa-pinterest"></i></a></li>
					<li class="entry-share-linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" title="Share on Linkedin"><i class="fab fa-linkedin"></i></a></li>
				</ul>
				
			</div>
			
		</div>

	</article>
</div>