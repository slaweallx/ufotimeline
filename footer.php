		</div><!--/.main-inner-->
	</div><!--/.main-->
	
</div><!--/#wrapper-->

<?php get_template_part('inc/featured'); ?>

<div id="footer-wrap" class="group">
	<footer id="footer">
			
		<div id="footer-bottom">
				
				<div id="footer-categories">
					<ul>
						<li class="foot-news">
							<a href="<?php echo get_site_url(); ?>/category/news/" title="News">
								<span><i class="fas fa-newspaper"></i></span>
							</a>
						</li>
						<li class="foot-documentaries">
							<a href="<?php echo get_site_url(); ?>/category/documentaries/" title="Documentaries">
								<span><i class="fas fa-film"></i></span>
							</a>
						</li>
						<li class="foot-famous-cases">
							<a href="<?php echo get_site_url(); ?>/category/famous-cases/" title="Famous Cases">
								<span><i class="fas fa-star"></i></span>
							</a>
						</li>
						<li class="foot-sightings">
							<a href="<?php echo get_site_url(); ?>/category/sightings/" title="Sightings">
								<span><i class="fas fa-eye"></i></span>
							</a>
						</li>
						<li class="foot-books-documents">
							<a href="<?php echo get_site_url(); ?>/category/books-documents/" title="Books &amp; Documents">
								<span><i class="fas fa-book"></i></span>
							</a>
						</li>
						<li class="foot-spotlight">
							<a href="<?php echo get_site_url(); ?>/category/spotlight/" title="Spotlight">
								<span><i class="fas fa-fire"></i></span>
							</a>
						</li>
						<li class="foot-quotes">
							<a href="<?php echo get_site_url(); ?>/category/quotes/" title="Quotes">
								<span><i class="fas fa-quote-left"></i></span>
							</a>
						</li>
					</ul>
				</div>
			
			<div class="pad group">
				
				<div class="grid one-full">
					
					<div id="entries"><strong><?php ufotimeline_total_posts(); ?> Entries</strong></div>
					<div id="created">
						<strong>Since</strong><span>Dec 26, 2021</span>
					</div>
					
					<div id="footer-logo">
						<div class="footer-radar-outer"></div>
						<div class="footer-radar-inner"></div>
					</div>
					
					<div id="copyright">
						<p><?php bloginfo(); ?> &copy; <?php echo esc_html( date_i18n( esc_html__( 'Y', 'ufotimeline' ) ) ); ?>. <?php esc_html_e( 'All Rights Reserved.', 'ufotimeline' ); ?></p>
					</div><!--/#copyright-->
					
					<div id="credit">
						<p><?php esc_html_e('Powered by','ufotimeline'); ?> <a href="<?php esc_url( _e( 'https://wordpress.org', 'ufotimeline' ) ); ?>" rel="nofollow">WordPress</a>. <?php esc_html_e('Made by','ufotimeline'); ?> <a href="https://x.com/AlxMedia" rel="nofollow">Alx</a>.</p>
					</div><!--/#credit-->
					
				</div>
				
			</div><!--/.pad-->
			
			<div id="site-nav" class="group">
				<a href="<?php echo get_site_url(); ?>/contact/"><i class="fas fa-heart"></i> Contribute</a>
				<a href="https://ufoquotes.com"><i class="fas fa-globe"></i> UFO Quotes</a>
			</div>

		</div><!--/#footer-bottom-->

	</footer><!--/#footer-->

	<a id="back-to-top" href="#" aria-label="Back To Top"><i class="fas fa-angle-up"></i></a>
</div>

<?php wp_footer(); ?>
</body>
</html>