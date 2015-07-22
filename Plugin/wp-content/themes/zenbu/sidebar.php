<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @paczenbu Zenbu
 */
?>
<div class="sidebar">
	<div class="gutter">
		<?php if ( is_active_sidebar('sidebar-widget-area') ) : ?>
			<?php dynamic_sidebar('sidebar-widget-area'); ?>
		<?php else : ?>	
			<aside class="widget">
				<h3 class="widget-title"><?php _e( 'Recent Posts', "zenbu" ); ?></h3><hr />
				<ul>
					<?php wp_get_archives('type=postbypost&limit=10'); ?>
				</ul>
			</aside>
			<aside class="widget">
				<h3 class="widget-title"><?php _e( 'Pages', "zenbu" ); ?></h3><hr />
				<ul>
					<?php wp_list_pages('title_li='); ?>
				</ul>
			</aside>
			<aside class="widget">
				<h3 class="widget-title"><?php _e( 'Tag Cloud', "zenbu" ); ?></h3><hr />
				<div class="tagcloud">
					<?php wp_tag_cloud(); ?>
				</div>
			</aside>
			<aside class="widget">
				<h3 class="widget-title"><?php _e( 'Categories', "zenbu" ); ?></h3><hr />
				<ul>
					<?php wp_list_categories('title_li='); ?>
				</ul>
			</aside>		
		<?php endif; ?>
	</div>
</div>