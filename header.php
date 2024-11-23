<!DOCTYPE html> 
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif; ?>
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<script>
	document.body.classList.add(localStorage.getItem('theme') || 'dark');
</script>

<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>

<a class="skip-link screen-reader-text" href="#page"><?php _e( 'Skip to content', 'ufotimeline' ); ?></a>

<header id="header">
	<div id="header-inner">
		<div class="group">
						
			<?php echo ufotimeline_site_title(); ?>
			<?php if ( display_header_text() == true ): ?>
				<p class="site-description"><?php bloginfo( 'description' ); ?></p>
			<?php endif; ?>
			
			<?php get_template_part('inc/progress'); ?>
			
			<?php if ( has_nav_menu('header') ): ?>
				<div id="wrap-nav-header" class="wrap-nav">
					<?php \Ufotimeline\Nav::nav_menu(array('theme_location'=>'header','menu_id' => 'nav-header','fallback_cb'=> false)); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( has_nav_menu('mobile') ): ?>
				<div id="wrap-nav-mobile" class="wrap-nav">
					<?php \Ufotimeline\Nav::nav_menu(array('theme_location'=>'mobile','menu_id' => 'nav-mobile','fallback_cb'=> false)); ?>
				</div>
			<?php endif; ?>
			
			<div class="search-trap-focus">
				<button class="toggle-search" aria-label="Search">
					<svg class="svg-icon" id="svg-search" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23"><path d="M38.710696,48.0601792 L43,52.3494831 L41.3494831,54 L37.0601792,49.710696 C35.2632422,51.1481185 32.9839107,52.0076499 30.5038249,52.0076499 C24.7027226,52.0076499 20,47.3049272 20,41.5038249 C20,35.7027226 24.7027226,31 30.5038249,31 C36.3049272,31 41.0076499,35.7027226 41.0076499,41.5038249 C41.0076499,43.9839107 40.1481185,46.2632422 38.710696,48.0601792 Z M36.3875844,47.1716785 C37.8030221,45.7026647 38.6734666,43.7048964 38.6734666,41.5038249 C38.6734666,36.9918565 35.0157934,33.3341833 30.5038249,33.3341833 C25.9918565,33.3341833 22.3341833,36.9918565 22.3341833,41.5038249 C22.3341833,46.0157934 25.9918565,49.6734666 30.5038249,49.6734666 C32.7048964,49.6734666 34.7026647,48.8030221 36.1716785,47.3875844 C36.2023931,47.347638 36.2360451,47.3092237 36.2726343,47.2726343 C36.3092237,47.2360451 36.347638,47.2023931 36.3875844,47.1716785 Z" transform="translate(-20 -31)"></path></svg>
					<svg class="svg-icon" id="svg-close" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 16 16"><polygon fill="" fill-rule="evenodd" points="6.852 7.649 .399 1.195 1.445 .149 7.899 6.602 14.352 .149 15.399 1.195 8.945 7.649 15.399 14.102 14.352 15.149 7.899 8.695 1.445 15.149 .399 14.102"></polygon></svg>
				</button>
				<div class="search-expand">
					<div class="search-expand-inner">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
				
		</div>
	</div>
</header><!--/#header-->

<?php if ( is_home() ) : ?>
	
	<?php get_template_part('inc/intro'); ?>
	
<?php endif; ?>

<?php if ( is_404() ) : ?>
	
	<?php get_template_part('inc/404'); ?>
	
<?php endif; ?>

<div id="wrapper">
	
	<div id="subheader" class="group">
			
		<div id="subheader-inner">
		
			<?php if (is_singular('websites') ) : ?>
			
			<?php elseif (is_singular('people') ) : ?>
			
			<?php elseif ( is_single() ) : ?>
				
				<div class="single-post-nav-wrap">
				
					<div class="single-post-nav group">
						<?php next_post_link( '<div class="back">%link</div>', '<i class="fas fa-chevron-left"></i>', true ); ?>
						<?php previous_post_link( '<div class="next">%link</div>', '<i class="fas fa-chevron-right"></i>', true ); ?>
					</div><!--.page-nav-->
					
					<div class="single-post-nav-count">
						<?php
							// Fetch all posts in the current post's (main) category
							$args = array(
								'post_type' => 'post',
								'posts_per_page' => -1,
								'cat' => array_shift(get_the_category())->cat_ID,
							);
							$query = new WP_Query($args);

							// The index of the current post in its (main) category
							$X = 1;
							$id = get_the_ID();
							foreach ($query->posts as $cat_post)
								if ($id != $cat_post->ID)
									$X++;
								else
									break;

							// The number of posts in the current post's (main) category
							$Y = $query->found_posts;

							// Now, display what we got...
							echo $X.' / '.$Y;
						?>
					</div>
				
				</div>
				
			<?php endif; ?>
			
			<?php if ( is_home() || is_search() || is_archive() || is_page() || is_singular('people') || is_singular('websites') ) : ?>
				<div id="header-more-btn-wrap">
				
					<button id="header-more-btn" aria-label="More Links">
						<i class="fas fa-ellipsis"></i>
					</button>
					<ul id="header-more-btn-list">
						<li><a href="<?php echo get_site_url(); ?>/contact/"><i class="fas fa-heart"></i> Contribute</a></li>
						<li><a href="<?php echo get_site_url(); ?>/contact/"><i class="fas fa-flag"></i>Report broken link</a></li>
						<li><a href="https://x.com/AlxMedia" target="_blank"><i class="fab fa-x-twitter"></i>Follow on X</a></li>
						<li id="header-more-btn-list-inner">Share this site:
							<ul>
								<li class="entry-share-x"><a href="https://twitter.com/intent/tweet?url=https://ufotimeline.com/&text=UFO Timeline" title="Share on X"><i class="fab fa-x-twitter"></i></a></li>
								<li class="entry-share-facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=https://ufotimeline.com/" title="Share on Facebook"><i class="fab fa-facebook"></i></a></li>
								<li class="entry-share-pinterest"><a href="https://pinterest.com/pin/create/button/?url=https://ufotimeline.com/&media=&description=UFO Timeline" title="Share on Pinterest"><i class="fab fa-pinterest"></i></a></li>
								<li class="entry-share-linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=https://ufotimeline.com/" title="Share on Linkedin"><i class="fab fa-linkedin"></i></a></li>
							</ul>
						</li>
					</ul>
			
				</div>
			<?php endif; ?>
		
			<button id="theme-toggle" aria-label="Toggle Website Color">
				<i class="fas fa-sun"></i>
				<i class="fas fa-moon"></i>
				<span id="theme-toggle-btn"></span>
			</button>
			
			<div id="header-categories" class="group">
				<ul class="group">
					<li class="head-home">
						<a href="<?php echo get_site_url(); ?>/" class="tooltip">
							<strong class="tooltip-bubble">Home<div><?php ufotimeline_total_posts(); ?></div></strong>
							<span><i class="fas fa-home"></i></span>
						</a>
					</li>
					<li class="head-news">
						<a href="<?php echo get_site_url(); ?>/category/news/" class="tooltip">
							<strong class="tooltip-bubble">News<div><?php echo count_cat_post('News'); ?></div></strong>
							<span><i class="fas fa-newspaper"></i></span>
						</a>
					</li>
					<li class="head-documentaries">
						<a href="<?php echo get_site_url(); ?>/category/documentaries/" class="tooltip">
							<strong class="tooltip-bubble">Documentaries<div><?php echo count_cat_post('Documentaries'); ?></div></strong>
							<span><i class="fas fa-film"></i></span>
						</a>
					</li>
					<li class="head-famous-cases">
						<a href="<?php echo get_site_url(); ?>/category/famous-cases/" class="tooltip">
							<strong class="tooltip-bubble">Famous Cases<div><?php echo count_cat_post('Famous Cases'); ?></div></strong>
							<span><i class="fas fa-star"></i></span>
						</a>
					</li>
					<li class="head-sightings">
						<a href="<?php echo get_site_url(); ?>/category/sightings/" class="tooltip">
							<strong class="tooltip-bubble">Sightings<div><?php echo count_cat_post('Sightings'); ?></div></strong>
							<span><i class="fas fa-eye"></i></span>
						</a>
					</li>
					<li class="head-books-documents">
						<a href="<?php echo get_site_url(); ?>/category/books-documents/" class="tooltip">
							<strong class="tooltip-bubble">Books &amp; Documents<div><?php echo count_cat_post('Books & Documents'); ?></div></strong>
							<span><i class="fas fa-book"></i></span>
						</a>
					</li>
					<li class="head-spotlight">
						<a href="<?php echo get_site_url(); ?>/category/spotlight/" class="tooltip">
							<strong class="tooltip-bubble">Spotlight<div><?php echo count_cat_post('Spotlight'); ?></div></strong>
							<span><i class="fas fa-fire"></i></span>
						</a>
					</li>
					<li class="head-quotes">
						<a href="<?php echo get_site_url(); ?>/category/quotes/" class="tooltip">
							<strong class="tooltip-bubble">Quotes<div><?php echo count_cat_post('Quotes'); ?></div></strong>
							<span><i class="fas fa-quote-left"></i></span>
						</a>
					</li>
				</ul>
				
				<ul id="header-categories-bottom" class="group">
					<li class="head-people">
						<a href="<?php echo get_site_url(); ?>/people/" class="tooltip">
							<strong class="tooltip-bubble">People<div><?php ufotimeline_total_people(); ?></div></strong>
							<span><i class="fas fa-user"></i></span>
						</a>
					</li>
					<li class="head-websites">
						<a href="<?php echo get_site_url(); ?>/websites/" class="tooltip">
							<strong class="tooltip-bubble">Websites<div><?php ufotimeline_total_websites(); ?></div></strong>
							<span><i class="fas fa-globe"></i></span>
						</a>
					</li>
				</ul>
				
			</div>
			
			<div id="header-mobile-categories-notice">Select Filter <i class="fas fa-arrow-down"></i></div>
			
			<div id="header-mobile-categories" class="group">
				<ul>
					<!--<li class="head-mobile-home">
						<a href="/" title="Home">
							<span><i class="fas fa-home"></i></span>
						</a>
					</li>-->
					<li class="head-mobile-news">
						<a href="<?php echo get_site_url(); ?>/category/news/" title="News">
							<span>
								<i class="fas fa-newspaper"></i>
								<strong><?php echo count_cat_post('News'); ?></strong>
							</span>
						</a>
					</li>
					<li class="head-mobile-documentaries">
						<a href="<?php echo get_site_url(); ?>/category/documentaries/" title="Documentaries">
							<span>
								<i class="fas fa-film"></i>
								<strong><?php echo count_cat_post('Documentaries'); ?></strong>
							</span>
						</a>
					</li>
					<li class="head-mobile-famous-cases">
						<a href="<?php echo get_site_url(); ?>/category/famous-cases/" title="Famous Cases">
							<span>
								<i class="fas fa-star"></i>
								<strong><?php echo count_cat_post('Famous Cases'); ?></strong>
							</span>
						</a>
					</li>
					<li class="head-mobile-sightings">
						<a href="<?php echo get_site_url(); ?>/category/sightings/" title="Sightings">
							<span>
								<i class="fas fa-eye"></i>
								<strong><?php echo count_cat_post('Sightings'); ?></strong>
							</span>
						</a>
					</li>
					<li class="head-mobile-books-documents">
						<a href="<?php echo get_site_url(); ?>/category/books-documents/" title="Books &amp; Documents">
							<span>
								<i class="fas fa-book"></i>
								<strong><?php echo count_cat_post('Books & Documents'); ?></strong>
							</span>
						</a>
					</li>
					<li class="head-mobile-spotlight">
						<a href="<?php echo get_site_url(); ?>/category/spotlight/" title="Spotlight">
							<span>
								<i class="fas fa-fire"></i>
								<strong><?php echo count_cat_post('Spotlight'); ?></strong>
							</span>
						</a>
					</li>
					<li class="head-mobile-quotes">
						<a href="<?php echo get_site_url(); ?>/category/quotes/" title="Quotes">
							<span>
								<i class="fas fa-quote-left"></i>
								<strong><?php echo count_cat_post('Quotes'); ?></strong>
							</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="main container-inner" id="page">
		<div class="main-inner group">