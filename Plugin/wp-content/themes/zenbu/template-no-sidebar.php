<?php 
/**
 * Template Name: Full Width
 * 
 * @package Zenbu
 */
 get_header(); ?>
 <?php while (have_posts()) : the_post(); ?>
 		<div id="content">
			<div class="page_title">
				<div class="container">
					<div class="gutter">
						<h2><span class="label"><?php the_title(); ?></span></h2>
					</div>
				</div>
			</div>
			<div class="sidebar_right container clearfix">
				<section class="pagesection fullwidthpage">
					<div class="gutter">
						<article class="singlepost clearfix">
							<?php the_content(); ?>
							<div class="clear"></div>
							<p><?php posts_nav_link(); ?></p>
							<?php comments_template(); ?>
							<?php zenbu_paginate_page(); ?> 
						</article>
						<div class="comments"> 
						    <?php comments_template(); ?>
						</div>
					</div>
				</section>
			</div>
		</div>
<?php endwhile; ?>		
<?php get_footer(); ?>