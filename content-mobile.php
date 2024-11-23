<div class="content-mobile">
	
	<h3 class="content-mobile-title">Select Filter <i class="fas fa-arrow-down"></i></h3>
	
	<ul class="content-mobile-categories group">
		<li class="content-mobile-home">
			<a href="<?php echo get_site_url(); ?>/" title="Home">
				<i class="fas fa-home"></i>
				<span>Home</span>
				<strong><?php ufotimeline_total_posts(); ?></strong>				
			</a>
		</li>
		<li class="content-mobile-news">
			<a href="<?php echo get_site_url(); ?>/category/news/" title="News">
				<i class="fas fa-newspaper"></i>
				<span>News</span>
				<strong><?php echo count_cat_post('News'); ?></strong>				
			</a>
		</li>
		<li class="content-mobile-documentaries">
			<a href="<?php echo get_site_url(); ?>/category/documentaries/" title="Documentaries">
				<i class="fas fa-film"></i>
				<span>Documentaries</span>
				<strong><?php echo count_cat_post('Documentaries'); ?></strong>
			</a>
		</li>
		<li class="content-mobile-famous-cases">
			<a href="<?php echo get_site_url(); ?>/category/famous-cases/" title="Famous Cases">
				<i class="fas fa-star"></i>
				<span>Famous Cases</span>
				<strong><?php echo count_cat_post('Famous Cases'); ?></strong>
			</a>
		</li>
		<li class="content-mobile-sightings">
			<a href="<?php echo get_site_url(); ?>/category/sightings/" title="Sightings">
				<i class="fas fa-eye"></i>
				<span>Sightings</span>
				<strong><?php echo count_cat_post('Sightings'); ?></strong>
			</a>
		</li>
		<li class="content-mobile-books-documents">
			<a href="<?php echo get_site_url(); ?>/category/books-documents/" title="Books &amp; Documents">
				<i class="fas fa-book"></i>
				<span>Books &amp; Docs</span>
				<strong><?php echo count_cat_post('Books & Documents'); ?></strong>
			</a>
		</li>
		<li class="content-mobile-spotlight">
			<a href="<?php echo get_site_url(); ?>/category/spotlight/" title="Spotlight">
				<i class="fas fa-fire"></i>
				<span>Spotlight</span>
				<strong><?php echo count_cat_post('Spotlight'); ?></strong>
			</a>
		</li>
		<li class="content-mobile-quotes">
			<a href="<?php echo get_site_url(); ?>/category/quotes/" title="Quotes">
				<i class="fas fa-quote-left"></i>
				<span>Quotes</span>
				<strong><?php echo count_cat_post('Quotes'); ?></strong>
			</a>
		</li>
	</ul>

</div>