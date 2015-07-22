<?php 
/**
 * 
 * @paczenbu Zenbu 
 */
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		   <a class="article_img" href="<?php the_permalink() ?>"><?php the_post_thumbnail($post->ID, 'featured'); ?> </a>	
		<?php endif; ?>
		<div class="article_txt <?php if ( !(has_post_thumbnail() && ! post_password_required()) ) : ?> article_no_img <?php endif; ?>">
			<h2><a href="<?php the_permalink() ?>"><?php if(get_the_title($post->ID)) { the_title(); } else { the_time( get_option( 'date_format' ) ); } ?></a></h2>
			<?php the_excerpt(); ?><a href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'zenbu' ); ?></a>
		</div>
		<p class="meta">
		   <span class="meta_date"><?php _e( 'Date', 'zenbu' ); ?> <?php the_time( get_option( 'date_format' ) ); ?></span> 
		   <span class="meta_author"><?php _e( 'Author', 'zenbu' ); ?> <?php the_author(); ?></span> 
		   <span class="meta_category"><?php _e( 'Category', 'zenbu' ); ?> <?php the_category(', '); ?></span>
		</p>
</article>