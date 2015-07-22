<?php
/**
 * Zenbu functions and definitions
 *
 * @package Zenbu
 */
 
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', esc_url(get_template_directory_uri() . '/inc/') );
	require( get_template_directory() . '/inc/options-framework.php' );
}
if ( ! function_exists( 'zenbu_setup' ) ) :
function zenbu_setup() {
    global $content_width;
	if ( ! isset( $content_width ) ) { $content_width = 1000; }
	load_theme_textdomain( 'zenbu', get_template_directory() . '/languages' );
	register_nav_menu( 'primary', __( 'Top Menu', "zenbu" ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );	
	add_theme_support( 'custom-background' );	
	$custom_header_support = array(
		'default-text-color' => '000',
		'flex-height' => true,
	);
	set_post_thumbnail_size( 150, 150, true );
	add_image_size( 'large-feature-zenbu', 600, 480, true );
	add_image_size( 'small-feature-zenbu', 500, 300 );

}
endif; 
add_action( 'after_setup_theme', 'zenbu_setup' );


if ( ! function_exists( 'zenbu_of_register_js' ) ) :
function zenbu_of_register_js() {
	wp_enqueue_script('main-zenbu', esc_url(get_template_directory_uri() . '/js/main.js'), array('jquery'),'1.0', true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
endif; 
add_action('wp_enqueue_scripts', 'zenbu_of_register_js');

function zenbu_ie_support_header() {
    echo '<!--[if lt IE 9]>'. "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5.js' ) . '"></script>'. "\n";
    echo '<![endif]-->'. "\n";
}
add_action( 'wp_head', 'zenbu_ie_support_header', 1 );

if ( ! function_exists( 'zenbu_widgets_init' ) ) :
function zenbu_widgets_init() {
	register_sidebar(array(
		'name' => __( 'Sidebar Widget Area', "zenbu"),
		'id' => 'sidebar-widget-area',
		'description' => __( 'The sidebar widget area', "zenbu"),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"> ', 
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><hr>',
	));		
	register_sidebar(array(
		'name' => __( 'Footer Widget Area 1', "zenbu"),
		'id' => 'footer-widget-area-1',
		'description' => __( 'The footer widget area 1', "zenbu"),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"> ',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));	
	register_sidebar(array(
		'name' => __( 'Footer Widget Area 2', "zenbu"),
		'id' => 'footer-widget-area-2',
		'description' => __( 'The footer widget area 2', "zenbu"),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"> ',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));	
	register_sidebar(array(
		'name' => __( 'Footer Widget Area 3', "zenbu"),
		'id' => 'footer-widget-area-3',
		'description' => __( 'The footer widget area 3', "zenbu"),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"> ',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));	
	register_sidebar(array(
		'name' => __( 'Footer Widget Area 4', "zenbu"),
		'id' => 'footer-widget-area-4',
		'description' => __( 'The footer widget area 4', "zenbu"),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"> ',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));		
}
endif;
add_action( 'widgets_init', 'zenbu_widgets_init' );

if ( ! function_exists( 'zenbu_head_css' ) ) :
function zenbu_head_css() {
        $meta = '';
		$output = '';
		
		$fav_icon = of_get_option('fav_icon');
		if ($fav_icon <> '') {
			$meta .= "<link rel=\"shortcut icon\" href=\"".esc_url($fav_icon)."\" type=\"image/x-icon\" />\n";
		}
		$web_clip = of_get_option('web_clip');
		if ($web_clip <> '') {
			$meta .= "<link rel=\"apple-touch-icon-precomposed\" href=\"".esc_url($web_clip)."\" />\n";
		}		
		$custom_css = of_get_option('custom_css_styles');
		if ($custom_css <> '') {
			$output .= $custom_css . "\n";
		}
		if ($meta <> '') {
			echo $meta;
		}														
		if ($output <> '') {
			$output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . esc_html($output) . "</style>\n";
			echo $output;
		}
}
endif;
add_action('wp_head', 'zenbu_head_css');

function zenbu_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}
	
	$title .= get_bloginfo( 'name', 'display' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'zenbu' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'zenbu_wp_title', 10, 2 );

if ( ! function_exists( 'zenbu_get_list_posts' ) ) :
function zenbu_get_list_posts($n) {
    global $wp_query;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
    $args = array(
        'post_type' => 'post',
        'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' => $n
    );
	$wp_query->query( $args );
    return new WP_Query( $args );
}
endif; 

if ( ! function_exists( 'zenbu_paginate_page' ) ) :
function zenbu_paginate_page() {
	wp_link_pages( array( 'before' => '<div class="pagination">', 'after' => '</div><div class="clear"></div>', 'link_before' => '<span class="current_pag">','link_after' => '</span>' ) );
}
endif; 

if ( ! function_exists( 'zenbu_credits' ) ) :
function zenbu_credits() {
	$text = 'Theme created by <a href="'.esc_url('http://www.pwtthemes.com/').'">PWT</a>. Powered by <a href="'.esc_url('http://wordpress.org/').'">WordPress.org</a>';
	echo apply_filters( 'zenbu_credits_text', $text) ;
}
endif; 
add_action( 'zenbu_display_credits', 'zenbu_credits' );

if ( ! function_exists( 'zenbu_notice' ) ) :
function zenbu_notice() {
	$text = 'To complete this page go here: <a href="'.esc_url(home_url('/')).'wp-admin/themes.php?page=options-framework">Appearance -> Theme Options</a>';
	echo apply_filters( 'zenbu_notice_text', $text) ;
}
endif; 
add_action( 'zenbu_display_notice', 'zenbu_notice' );
?>