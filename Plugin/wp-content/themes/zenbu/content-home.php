<?php 
/**
 * 
 * @package Zenbu 
 */
get_header(); ?>
		<div id="content">
			<?php 
			if (of_get_option('top_title1') == '') { ?>	
			<div id="content">
				<div class="container clearfix">
					<section class="pagesection">
						<div class="gutter noticeerror">
							 <h3><?php do_action( 'zenbu_display_notice' ); ?></h3>   
						</div>
					</section>
				</div>
			</div>
			<?php } else {  ?>		
			<div class="support_section">
				<div class="container">
					<div class="gutter">
						<h2>
						   <span class="label"><?php if(of_get_option('top_title1')) {  echo esc_html(of_get_option('top_title1')); }  ?></span>  
						   <?php if(of_get_option('top_title2')) {  echo esc_html(of_get_option('top_title2')); }  ?>
						   <span class="legend"><?php if(of_get_option('top_subtitle')) {  echo esc_html(of_get_option('top_subtitle')); }  ?></span></h2>
					</div>
					<div class="columnwrapp clearfix">
						<div class="column4">
							<div class="gutter">
								<a class="supportlink" href="<?php echo esc_url(of_get_option('top_box_1_link')); ?>">
								    <?php if ( of_get_option('top_box_1_icon') ) { ?> 
										<img class="default fullwidth" src="<?php echo esc_url(of_get_option('top_box_1_icon')); ?>" alt="" />
										<img class="hover fullwidth" src="<?php echo esc_url(of_get_option('top_box_1_icon_hover')); ?>" alt="" />
									<?php } ?>	
									<span><?php if(of_get_option('top_box_1_title')) {  echo esc_html(of_get_option('top_box_1_title')); } ?></span>
								</a>
							</div>
						</div>
						<div class="column4">
							<div class="gutter">
								<a class="supportlink" href="<?php echo esc_url(of_get_option('top_box_2_link')); ?>">
								    <?php if ( of_get_option('top_box_2_icon') ) { ?> 
										<img class="default fullwidth" src="<?php echo esc_url(of_get_option('top_box_2_icon')); ?>" alt="" />
										<img class="hover fullwidth" src="<?php echo esc_url(of_get_option('top_box_2_icon_hover')); ?>" alt="" />
									<?php } ?>	
									<span><?php if(of_get_option('top_box_2_title')) {  echo esc_html(of_get_option('top_box_2_title')); } ?></span>
								</a>
							</div>
						</div>
						<div class="column4">
							<div class="gutter">
								<a class="supportlink" href="<?php echo esc_url(of_get_option('top_box_3_link')); ?>">
								    <?php if ( of_get_option('top_box_3_icon') ) { ?> 
										<img class="default fullwidth" src="<?php echo esc_url(of_get_option('top_box_3_icon')); ?>" alt="" />
										<img class="hover fullwidth" src="<?php echo esc_url(of_get_option('top_box_3_icon_hover')); ?>" alt="" />
									<?php } ?>	
									<span><?php if(of_get_option('top_box_3_title')) {  echo esc_html(of_get_option('top_box_3_title')); }  ?></span>
								</a>
							</div>
						</div>
						<div class="column4">
							<div class="gutter">
								<a class="supportlink" href="<?php echo esc_url(of_get_option('top_box_4_link')); ?>">
								    <?php if ( of_get_option('top_box_4_icon') ) { ?> 
										<img class="default fullwidth" src="<?php echo esc_url(of_get_option('top_box_4_icon')); ?>" alt="" />
										<img class="hover fullwidth" src="<?php echo esc_url(of_get_option('top_box_4_icon_hover')); ?>" alt="" />
									<?php } ?>	
									<span><?php if(of_get_option('top_box_4_title')) {  echo esc_html(of_get_option('top_box_4_title')); }  ?></span>
								</a>
							</div>
						</div>					
					</div>
				</div>
			</div>
			<div class="ourservices_section">
				<div class="container">
					<div class="gutter">
						<h2>
						  <span class="label"><?php if(of_get_option('service_title1')) {  echo esc_html(of_get_option('service_title1')); } ?>
						  </span>  <?php if(of_get_option('service_title2')) {  echo esc_html(of_get_option('service_title2')); } ?>
						  <span class="legend"><?php if(of_get_option('service_subtitle')) {  echo esc_html(of_get_option('service_subtitle')); }  ?></span></h2>
					</div>
					<div class="services_slider">
						<ul class="slides">
							<li>
								<div class="gutter">
									<div class="service_single">
									    <?php if ( of_get_option('service_box_1_image') ) { ?>
										<a class="service_img" href="<?php echo esc_url(of_get_option('service_box_1_link')); ?>">
											<img class="fullwidth" src="<?php echo esc_url(of_get_option('service_box_1_image')); ?>" alt="">
											<span class="overlay">&#160;</span>
											<?php if ( of_get_option('service_box_1_icon') ) { ?>
											<span class="icon_styled">
												<img class="default fullwidth" src="<?php echo esc_url(of_get_option('service_box_1_icon')); ?>" alt="" />
												<img class="hover fullwidth" src="<?php echo esc_url(of_get_option('service_box_1_icon_hover')); ?>" alt="" />
											</span>
											<?php } ?>	
										</a>
										<?php } ?>	
										<h2><a href="<?php echo esc_url(of_get_option('service_box_1_link')); ?>"><?php if(of_get_option('service_box_1_title')) {  echo esc_html(of_get_option('service_box_1_title')); } ?></a></h2>
										<p><?php if(of_get_option('service_box_1_description')) {  echo esc_html(of_get_option('service_box_1_description')); } ?></p>
									</div>
								</div>
							</li>
							<li>
								<div class="gutter">
									<div class="service_single">
									    <?php if ( of_get_option('service_box_2_image') ) { ?>
										<a class="service_img" href="<?php echo esc_url(of_get_option('service_box_2_link')); ?>">
											<img class="fullwidth" src="<?php echo esc_url(of_get_option('service_box_2_image')); ?>" alt="">
											<span class="overlay">&#260;</span>
											<?php if ( of_get_option('service_box_2_icon') ) { ?>
											<span class="icon_styled">
												<img class="default fullwidth" src="<?php echo esc_url(of_get_option('service_box_2_icon')); ?>" alt="" />
												<img class="hover fullwidth" src="<?php echo esc_url(of_get_option('service_box_2_icon_hover')); ?>" alt="" />
											</span>
											<?php } ?>	
										</a>
										<?php } ?>
										<h2><a href="<?php echo esc_url(of_get_option('service_box_2_link')); ?>"><?php if(of_get_option('service_box_2_title')) {  echo esc_html(of_get_option('service_box_2_title')); }  ?></a></h2>
										<p><?php if(of_get_option('service_box_2_description')) {  echo esc_html(of_get_option('service_box_2_description')); } ?></p>
									</div>
								</div>
							</li>
							<li>
								<div class="gutter">
									<div class="service_single service_single_last">
									    <?php if ( of_get_option('service_box_3_image') ) { ?>
										<a class="service_img" href="<?php echo esc_url(of_get_option('service_box_3_link')); ?>">
											<img class="fullwidth" src="<?php echo esc_url(of_get_option('service_box_3_image')); ?>" alt="">
											<span class="overlay">&#360;</span>
											<?php if ( of_get_option('service_box_3_icon') ) { ?>
											<span class="icon_styled">
												<img class="default fullwidth" src="<?php echo esc_url(of_get_option('service_box_3_icon')); ?>" alt="" />
												<img class="hover fullwidth" src="<?php echo esc_url(of_get_option('service_box_3_icon_hover')); ?>" alt="" />
											</span>
											<?php } ?>	
										</a>
										<?php } ?>	
										<h2><a href="<?php echo esc_url(of_get_option('service_box_3_link')); ?>"><?php if(of_get_option('service_box_3_title')) {  echo esc_html(of_get_option('service_box_3_title')); } ?></a></h2>
										<p><?php if(of_get_option('service_box_3_description')) {  echo esc_html(of_get_option('service_box_3_description')); } ?></p>
									</div>
								</div>
							</li>
							<div class="clear"></div>
						</ul>
					</div>
				</div>
			</div>	
			<?php } ?>	
			<div class="recentpost_section">
				<div class="container">
					<div class="gutter">
						<h2>
						   <span class="label"><?php if(of_get_option('post_title1')) {  echo esc_html(of_get_option('post_title1')); } ?></span> 
						  <?php if(of_get_option('post_title2')) {  echo esc_html(of_get_option('post_title2')); } ?>
						</h2>
					</div>
					<div class="columnwrapp clearfix">
						<?php 
						$list_posts = zenbu_get_list_posts(3);
						while ( $list_posts->have_posts() ) {
						$list_posts->the_post();
						?>
						<div class="column2">
							<div class="gutter">
								<article class="recentpost clearfix">
									<div class="post_meta">
										<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
										<a href="<?php the_permalink() ?>" class="icon_rounded">
											<?php the_post_thumbnail('thumbnail'); ?> 
										</a>	
										<?php endif; ?>
										<p class="post_date"><?php the_time( get_option( 'date_format' ) ); ?></p>
									</div>
									<div class="inner">
										<h2><a href="<?php the_permalink() ?>"><?php echo the_title(); ?></a></h2>
										<?php the_excerpt(); ?>
										<a class="more" href="<?php the_permalink() ?>"><?php _e( 'Read More', 'zenbu' ); ?></a>
									</div>
								</article>
							</div>
						</div>
						<?php	} ?>
					</div>
				</div>
			</div>
		</div>
<?php get_footer(); ?>