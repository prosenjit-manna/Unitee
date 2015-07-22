<?php
/**
 * The template for displaying page NOT FOUND.
 *
 * @paczenbu Zenbu
 */
 get_header(); ?>
  		<div id="content">
			<div class="page_title">
				<div class="container">
					<div class="gutter">
						<h2><span class="label"><?php _e( 'Not found', 'zenbu' ); ?></span></h2>
					</div>
				</div>
			</div>
			<div class="sidebar_right container clearfix">
				<section class="pagesection">
					<div class="gutter">
						<article class="singlepost clearfix">
							<p><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'zenbu' ); ?></p>
						</article>
					</div>
				</section>
                <?php  get_sidebar(); ?>
			</div>
		</div>
<?php get_footer(); ?>