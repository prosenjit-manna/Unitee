<?php
/**
 * The template for displaying all pages.
 *
 * @pacZenbu Zenbu
 */
 get_header(); ?>
 <?php while (have_posts()) : the_post(); ?>
  		<div id="content">
			<div class="page_title">
				<div class="container">
					<div class="gutter">
						<h2><span class="label"><?php _e( 'Blog', 'zenbu' ); ?></span></h2>
					</div>
				</div>
			</div>
			<div class="sidebar_right container clearfix">
				<section class="pagesection">
					<div class="gutter">
						<article class="singlepost clearfix">
						    <h2><?php if(get_the_title($post->ID)) { the_title(); } else { the_time( get_option( 'date_format' ) ); } ?></h2>
							<p class="meta">
							   <span class="meta_date"><?php _e( 'Date', 'zenbu' ); ?> <?php the_time( get_option( 'date_format' ) ); ?></span> 
							   <span class="meta_author"><?php _e( 'Author', 'zenbu' ); ?> <?php the_author(); ?></span> 
							   <span class="meta_category"><?php _e( 'Category', 'zenbu' ); ?> <?php the_category(', '); ?></span>
							</p>
							<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
							     	<?php the_post_thumbnail($post->ID, 'featured'); ?>
							<?php endif; ?>
							<?php the_content(); ?>
							<p class="meta_tags"><?php the_tags(); ?></p>
							<p><?php posts_nav_link(); ?></p>
							<?php zenbu_paginate_page(); ?> 
							<div class="comments"> 
								<?php comments_template(); ?>
							</div>
						</article>

					</div>
				</section>
                <?php  get_sidebar(); ?>
			</div>
		</div>
<?php endwhile; ?>
<?php get_footer(); ?>