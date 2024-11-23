<?php
/*
Template Name: About
*/
?>
<?php get_header(); ?>

<div class="content">
	
	<?php get_template_part('inc/page-title'); ?>
	
	<?php while ( have_posts() ): the_post(); ?>
	
	<article <?php post_class(); ?>>	
		
		<div class="type-entry-wrap">
			
			<div class="type-entry-single">
			
				<div class="about-block">
					
					<h1>Summary</h1>
					<h2>Of the UFO Timeline</h2>
					
					<div class="text-block">
						<p>A collection of the best evidence of the UFO Phenomenon, listed in a userfriendly time-based format to make it easy for everyone to dig deeper into the subject on their own. Compared to other websites, this site's approach is quality over quantity. Not as frequently updated, but when it is - it is worth reading.</p>
						<p>This site has been shaped by the community of Twitter and Reddit. Feedback on several occasions led to changes of both content and design in 2022 and 2023 to what it is today. Happy researching!</p>
					</div>
					
					<h1><?php ufotimeline_total_posts(); ?> Entries</h1>
					<h2>On the UFO Timeline</h2>
					
					<div class="stats-block">
						
						<div class="stats-block-list group">
							<ul>
								<li class="stats-block-news">
									<a class="tooltip" href="/category/news/">
										<strong class="tooltip-bubble">News</strong>
										<span>
											<i class="fas fa-newspaper"></i>
											<strong><?php echo count_cat_post('News'); ?></strong>
										</span>
									</a>
								</li>
								<li class="stats-block-documentaries">
									<a class="tooltip" href="/category/documentaries/">
										<strong class="tooltip-bubble">Documentaries</strong>
										<span>
											<i class="fas fa-film"></i>
											<strong><?php echo count_cat_post('Documentaries'); ?></strong>
										</span>
									</a>
								</li>
								<li class="stats-block-famous-cases">
									<a class="tooltip" href="/category/famous-cases/">
										<strong class="tooltip-bubble">Famous Cases</strong>
										<span>
											<i class="fas fa-star"></i>
											<strong><?php echo count_cat_post('Famous Cases'); ?></strong>
										</span>
									</a>
								</li>
								<li class="stats-block-sightings">
									<a class="tooltip" href="/category/sightings/">
										<strong class="tooltip-bubble">Sightings</strong>
										<span>
											<i class="fas fa-eye"></i>
											<strong><?php echo count_cat_post('Sightings'); ?></strong>
										</span>
									</a>
								</li>
								<li class="stats-block-books-documents">
									<a class="tooltip" href="/category/books-documents/">
										<strong class="tooltip-bubble">Books &amp; Documents</strong>
										<span>
											<i class="fas fa-book"></i>
											<strong><?php echo count_cat_post('Books & Documents'); ?></strong>
										</span>
									</a>
								</li>
								<li class="stats-block-spotlight">
									<a class="tooltip" href="/category/spotlight/">
										<strong class="tooltip-bubble">Spotlight</strong>
										<span>
											<i class="fas fa-fire"></i>
											<strong><?php echo count_cat_post('Spotlight'); ?></strong>
										</span>
									</a>
								</li>
								<li class="stats-block-quotes">
									<a class="tooltip" href="/category/quotes/">
										<strong class="tooltip-bubble">Quotes</strong>
										<span>
											<i class="fas fa-quote-left"></i>
											<strong><?php echo count_cat_post('Quotes'); ?></strong>
										</span>
									</a>
								</li>
							</ul>
						</div>
						
					</div>
					
					<div class="faq-block-wrap">
					
						<h1>FAQ</h1>
						<h2>Frequently asked questions</h2>
						
						<div class="faq-block">
							<h4 class="faq-block-click">Why did you create this website?</h4>
							<div class="faq-block-arrow"><i class="fas fa-chevron-down"></i></div>
							<div class="faq-content">
								<p>Back in late 2021 I was surprised to find that the ufotimeline.com domain was available. Since I personally missed a website that made a time-based list of only important UFO/UAP data, I thought I would do something about that. Since then the website has improved in stages over time, thanks to several feedback posts mainly on Reddit.</p>
								<p>I also wanted a place I could link to people new to the phenomenon, who were eager to learn from the very best data.</p>
							</div>
						</div>
						<div class="faq-block">
							<h4 class="faq-block-click">How do you select what content to include?</h4>
							<div class="faq-block-arrow"><i class="fas fa-chevron-down"></i></div>
							<div class="faq-content">
								<p>I don't have a special process when I decide what to include. When it comes to news from mainstream media, popularity on social media and quality of the news source could be two important aspects. Other times I could simply follow gut feeling and my experience of following the phenomenon for several years.</p>
								<p>Compared to other websites, my focus has been "quality over quantity". Not as frequent updates, but when it's posted here it's usually worth reading or viewing if you are interested in UFOs/UAP.</p>
							</div>
						</div>
						<div class="faq-block">
							<h4 class="faq-block-click">How often do you update the site?</h4>
							<div class="faq-block-arrow"><i class="fas fa-chevron-down"></i></div>
							<div class="faq-content">
								<p>That obviously depends entirely on what happens in the world and if new "worthy" content that would fit the timeline comes up. I monitor social media and news, and usually add important stuff with less than a 24 hour delay.</p>
							</div>
						</div>
						<div class="faq-block">
							<h4 class="faq-block-click">Why haven't you included X?</h4>
							<div class="faq-block-arrow"><i class="fas fa-chevron-down"></i></div>
							<div class="faq-content">
								<p>The purpose of this website is not to include everything in ufology, but rather only the best news, documentaries, cases, sightings, books and quotes. It is not a complete list of everything - and is so intentionally.</p>
								<p>It is also made so to make it easier for people new to the phenomenon to directly find the best evidence.</p>
							</div>
						</div>
						<div class="faq-block">
							<h4 class="faq-block-click">Who has contributed to this site?</h4>
							<div class="faq-block-arrow"><i class="fas fa-chevron-down"></i></div>
							<div class="faq-content">
								<p>This website has been shared for additional feedback several times on both Twitter and Reddit in 2022 and 2023. A lot of different people have contributed indirectly by sharing their thoughts on both design and content.</p>
								<p>It has been a solo initiative otherwise, that has been worked on as a fun side-project for over a year.</p>
							</div>
						</div>
						<div class="faq-block">
							<h4 class="faq-block-click">How can I help and contribute?</h4>
							<div class="faq-block-arrow"><i class="fas fa-chevron-down"></i></div>
							<div class="faq-content">
								<p>You can help by giving feedback on both design and content. Do you have content you think should be on the timeline? Do you feel the design could be improved in some part? Do you know that a case that has been included has been debunked? And so on. If so, feel free to contact me via the <a href="/contact/">contact</a> page.</p>
							</div>
						</div>
					
					</div>
					
					<h1>Made By</h1>
					<h2>One person, with love</h2>
					
					<div class="madeby-block group">

						<img src="<?php echo get_template_directory_uri(); ?>/thumbs/alexander-agnarson.jpg" />
						<div class="madeby-content">
							<h3>Alexander Agnarson</h3>
							<p>Web Designer &amp; Developer from Sweden</p>
							<a class="madeby-icon-link" href="https://agnarson.com"><i class="fas fa-globe"></i></a><a class="madeby-icon-link" href="https://x.com/AlxMedia"><i class="fab fa-x-twitter"></i></a><a class="madeby-icon-link" href="https://dribbble.com/AlxMedia"><i class="fab fa-dribbble"></i></a>
						</div>

					</div>
					
					<div class="clear"></div>
					
				</div>
			
			</div>
			<div class="curve"></div>
		</div>

	</article><!--/.post-->	
	
	<?php endwhile; ?>

</div><!--/.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>