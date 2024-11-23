<div class="type-websites-item mixitup-item <?php rwmb_the_value( 'websites-filter-type' ) ?>" data-ref="mixitup-target">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<a href="<?php the_permalink(); ?>" class="type-websites-clickable"></a>
		
		<div class="type-websites">
			
			<?php if ( has_post_thumbnail() ): ?>
				<div class="type-websites-thumbnail">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('ufotimeline-medium-hd'); ?>
					</a>
					<?php if ( comments_open() ): ?>
						<?php $number = get_comments_number( $post->ID ); if ( $number > 0 ) { ?>
							<a class="type-websites-comments" href="<?php comments_link(); ?>"><i class="fas fa-comment"></i><span><?php comments_number( '0', '1', '%' ); ?></span></a>
						<?php } ?>
					<?php endif; ?>	
				</div>
			<?php else: ?>	
				<div class="type-websites-thumbnail-empty">
					<a class="type-websites-thumbnail-empty-link" href="<?php the_permalink(); ?>">
						<i class="fas fa-image"></i>
					</a>
					<?php if ( comments_open() ): ?>
						<?php $number = get_comments_number( $post->ID ); if ( $number > 0 ) { ?>
							<a class="type-websites-comments" href="<?php comments_link(); ?>"><i class="fas fa-comment"></i><span><?php comments_number( '0', '1', '%' ); ?></span></a>
						<?php } ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_old_post(4) ): ?>	
			<?php else: ?>
				<div class="ribbon ribbon-right"><span>New</span></div>
			<?php endif; ?>

			<h3 class="type-websites-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h3>
			
			<?php if ( rwmb_get_value( 'websites-filter-type' ) ): ?>
				<h4 class="type-websites-type"><?php rwmb_the_value( 'websites-filter-type' ) ?></h4>
			<?php endif; ?>

			<div class="type-websites-middle">			
				<div class="type-websites-excerpt"><?php the_excerpt(); ?></div>		
			</div>
			
			<div class="type-websites-bottom">
				<button class="type-websites-expand-btn" title="Share"><i class="fas fa-share"></i></button>	
				<?php if ( rwmb_get_value( 'website-link' ) ): ?>
					<a class="type-websites-more-btn" href="<?php rwmb_the_value( 'website-link' ) ?>">View Now</a>
				<?php endif; ?>
			</div>
			
			<div class="type-websites-expand group">
					
				<ul class="type-websites-share group">
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