<?php if ( post_password_required() ) { return; } ?>

<div id="comments" class="themeform">
	
	<?php if ( have_comments() ) : global $wp_query; ?>
	
		<h3 class="heading"><?php comments_number( esc_html__( 'No Comments', 'ufotimeline' ), esc_html__( '1 Comment', 'ufotimeline' ), esc_html__( '% Comments', 'ufotimeline' ) ); ?></h3>
	
		<?php if ( ! empty( $comments_by_type['comment'] ) ) { ?>
		<div id="commentlist-container" class="comment-tab">
			
			<ol class="commentlist">
				<?php wp_list_comments( 'avatar_size=96&type=comment' ); ?>	
			</ol><!--/.commentlist-->
			
			<?php if ( get_comment_pages_count() > 1 && get_option('page_comments') ) : ?>
			<nav class="comments-nav group">
				<div class="nav-previous"><?php previous_comments_link(); ?></div>
				<div class="nav-next"><?php next_comments_link(); ?></div>
			</nav><!--/.comments-nav-->
			<?php endif; ?>
			
		</div>	
		<?php } ?>
		
		<?php if ( ! empty( $comments_by_type['pings'] ) ) { ?>
		<div id="pinglist-container" class="comment-tab">
			
			<ol class="pinglist">
				<?php // not calling wp_list_comments twice, as it breaks pagination
				$pings = $comments_by_type['pings'];
				foreach ($pings as $comment) { ?>
					<li class="ping">
						<div class="ping-link"><?php comment_author_link($comment); ?></div>
						<div class="ping-meta"><?php comment_date( get_option( 'date_format' ), $comment ); ?></div>
						<div class="ping-content"><?php comment_text($comment); ?></div>
					</li>
				<?php } ?>
			</ol><!--/.pinglist-->
			
		</div>
		<?php } ?>

	<?php else: // if there are no comments yet ?>

		<?php if (comments_open()) : ?>
			<!-- comments open, no comments -->
		<?php else : ?>
			<!-- comments closed, no comments -->
		<?php endif; ?>
	
	<?php endif; ?>
	
	<?php if ( comments_open() ) { comment_form(); } ?>

</div><!--/#comments-->