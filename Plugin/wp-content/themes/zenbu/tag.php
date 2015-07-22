<?php
/**
 * The template for displaying tag
 *
 *
 * @paczenbu Zenbu
 */
get_header(); ?>
    	<div id="content">
			<div class="page_title">
				<div class="container">
					<div class="gutter">
						<h2><span class="label"><?php printf( __( 'Tag Archives: %s', 'zenbu' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></span></h2>
					</div>
				</div>
			</div>
			<div class="sidebar_right container clearfix">
				<section class="pagesection">
					<div class="gutter">
					    <?php while (have_posts()) : the_post(); ?>
							<?php get_template_part( 'content', 'posts');  ?>								
						<?php endwhile; ?>
						<p class="simplepag">
							<span class="prev"><?php next_posts_link(__('Previous Posts', 'zenbu')) ?></span>
							<span class="next"><?php previous_posts_link(__('Next posts', 'zenbu')) ?></span>
						</p>
					</div>
				</section>
                <?php  get_sidebar(); ?>
			</div>
		</div>
<?php get_footer(); ?>