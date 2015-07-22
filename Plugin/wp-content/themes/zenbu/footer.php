<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package Zenbu
 */
?>
		<footer id="footer">
		    <?php if(of_get_option('testimonial_box_text')){ ?>
			<div class="section_blue">
				<div class="container">
					<div class="gutter">
						<aside class="widget">
							<h3 class="widget-title"><?php  echo esc_html(of_get_option('title_box_testimonials')); ?></h3>	
							<div class="testimonial_slider">
								<ul class="slides">
									<li><p class="quotes"><span><?php  echo esc_html(of_get_option('testimonial_box_name')); ?></span>: <?php  echo esc_html(of_get_option('testimonial_box_text')); ?></p></li>
								</ul>
							</div>
						</aside>
					</div>
				</div>
			</div>
			<?php } ?>
			<div class="container">
				<div class="section_widgets columnwrapp clearfix">
					<div class="column4">
						<div class="gutter">
							<?php if ( is_active_sidebar('footer-widget-area-1') ) : ?>
							<?php dynamic_sidebar('footer-widget-area-1'); ?>
							<?php else : ?>	
								<aside class="widget">
									<h3 class="widget-title"><?php _e( 'Recent Posts', "zenbu" ); ?></h3>
									<ul>
										<?php wp_get_archives('type=postbypost&limit=10'); ?>
									</ul>
								</aside>
							<?php endif; ?>
						</div>
					</div>
					<div class="column4">
						<div class="gutter">
							<?php if ( is_active_sidebar('footer-widget-area-2') ) : ?>
							<?php dynamic_sidebar('footer-widget-area-2'); ?>
							<?php else : ?>	
								<aside class="widget">
									<h3 class="widget-title"><?php _e( 'Tag Cloud', "zenbu" ); ?></h3>
									<div class="tagcloud">
										<?php wp_tag_cloud(); ?>
									</div>
								</aside>
							<?php endif; ?>
						</div>
					</div>
					<div class="column4">
						<div class="gutter">
							<?php if ( is_active_sidebar('footer-widget-area-3') ) : ?>
							<?php dynamic_sidebar('footer-widget-area-3'); ?>
							<?php else : ?>	
								<aside class="widget">
									<h3 class="widget-title"><?php _e( 'Pages', "zenbu" ); ?></h3>
									<ul>
										<?php wp_list_pages('title_li='); ?>
									</ul>
								</aside>
							<?php endif; ?>
						</div>
					</div>
					<div class="column4">
						<div class="gutter">
							<?php if ( is_active_sidebar('footer-widget-area-4') ) : ?>
							<?php dynamic_sidebar('footer-widget-area-4'); ?>
							<?php else : ?>	
								<aside class="widget">
									<h3 class="widget-title"><?php _e( 'Categories', "zenbu" ); ?></h3>
									<ul>
										<?php wp_list_categories('title_li='); ?>
									</ul>
								</aside>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="copyrightbar">
				<div class="container">
					<div class="gutter clearfix">
						<p class="copyright"><?php  echo esc_html(of_get_option('footer_text_left')); ?></p>
						<p class="footercredit"><?php do_action( 'zenbu_display_credits' ); ?></a>
					</div>
				</div>
			</div>
		</footer>
	</div>
<?php wp_footer(); ?>		
</body>
</html>