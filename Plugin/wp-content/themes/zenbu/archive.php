<?php
/**
 * The template for displaying archive
 *
 *
 * @paczenbu Zenbu
 */
get_header(); ?>
    	<div id="content">
			<div class="page_title">
				<div class="container">
					<div class="gutter">
						<h2><span class="label"><?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'zenbu' ), '<span>' . get_the_date() . '</span>' );
						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'zenbu' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'zenbu' ) ) . '</span>' );
						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'zenbu' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'zenbu' ) ) . '</span>' );
						else :
							_e( 'Archives', 'zenbu' );
						endif;
						?></span></h2>
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