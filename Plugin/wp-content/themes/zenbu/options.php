<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// If using image radio buttons, define a directory path
	$set_year = date('Y');
	$options = array();

	/* General Settings */	
	
	$options[] = array(
		'name' => __('General Settings', 'zenbu'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Header Logo Text', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'header_logo_text1',
		'std' => '',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Header Logo Text 2', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'header_logo_text2',
		'std' => '',
		'type' => 'text');			
		
	$options[] = array(
		'name' => __('Header Logo Image', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'logo_image',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('Fav Icon URL', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'fav_icon',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Web Clip Icon URL', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'web_clip',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('Footer copyright text left', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'footer_text_left',
		'std' => 'Copyright &copy; '.$set_year.' '.get_bloginfo('name'),
		'type' => 'text');
			
	$options[] = array(
		'name' => __('Enter your custom CSS styles.', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'custom_css_styles',
		'std' => '',
		'type' => 'textarea');		

	$options[] = array(
		'name' => __('Home Page', 'zenbu'),
		'type' => 'heading');
		
	/* Top Box*/		
		
	$options[] = array(
		'name' => __('Top Title 1', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'top_title1',
		'std' => 'Responsive',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Top Title 2', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'top_title2',
		'std' => 'WordPress Theme',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Top Subtitle', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'top_subtitle',
		'std' => 'Text of the printing and typesetting',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Top Box 1 Title', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'top_box_1_title',
		'std' => 'Guarantee',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Top Box 1 Link', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'top_box_1_link',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Top Box 1 Icon', 'zenbu'),
		'desc' => __('Recommended image sizes 50 X 50', 'zenbu'),
		'id' => 'top_box_1_icon',
		'type' => 'upload');	
		
	$options[] = array(
		'name' => __('Top Box 1 Icon Hover', 'zenbu'),
		'desc' => __('Recommended image sizes 50 X 50', 'zenbu'),
		'id' => 'top_box_1_icon_hover',
		'type' => 'upload');	
		
	$options[] = array(
		'name' => __('Top Box 2 Title', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'top_box_2_title',
		'std' => 'ip secure',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Top Box 2 Link', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'top_box_2_link',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Top Box 2 Icon', 'zenbu'),
		'desc' => __('Recommended image sizes 50 X 50', 'zenbu'),
		'id' => 'top_box_2_icon',
		'type' => 'upload');	
		
	$options[] = array(
		'name' => __('Top Box 2 Icon Hover', 'zenbu'),
		'desc' => __('Recommended image sizes 50 X 50', 'zenbu'),
		'id' => 'top_box_2_icon_hover',
		'type' => 'upload');		

	$options[] = array(
		'name' => __('Top Box 3 Title', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'top_box_3_title',
		'std' => 'Top Quality',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Top Box 3 Link', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'top_box_3_link',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Top Box 3 Icon', 'zenbu'),
		'desc' => __('Recommended image sizes 50 X 50', 'zenbu'),
		'id' => 'top_box_3_icon',
		'type' => 'upload');	
		
	$options[] = array(
		'name' => __('Top Box 3 Icon Hover', 'zenbu'),
		'desc' => __('Recommended image sizes 50 X 50', 'zenbu'),
		'id' => 'top_box_3_icon_hover',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('Top Box 4 Title', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'top_box_4_title',
		'std' => 'Support',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Top Box 4 Link', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'top_box_4_link',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Top Box 4 Icon', 'zenbu'),
		'desc' => __('Recommended image sizes 50 X 50', 'zenbu'),
		'id' => 'top_box_4_icon',
		'type' => 'upload');	
		
	$options[] = array(
		'name' => __('Top Box 4 Icon Hover', 'zenbu'),
		'desc' => __('Recommended image sizes 50 X 50', 'zenbu'),
		'id' => 'top_box_4_icon_hover',
		'type' => 'upload');	

	/* Service Box*/	
		
	$options[] = array(
		'name' => __('Service Title 1', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'service_title1',
		'std' => 'Our',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Service Title 2', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'service_title2',
		'std' => 'Services',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Service Subtitle', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'service_subtitle',
		'std' => 'Lorem Ipsum is simply dummy text',
		'type' => 'text');		

	$options[] = array(
		'name' => __('Service Box 1 Title', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'service_box_1_title',
		'std' => 'Lorem Ipsum is Simply Dummy',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Service Box 1 Description', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'service_box_1_description',
		'std' => 'Lorem Ipsum is Simply Dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of',
		'type' => 'textarea');	
		
	$options[] = array(
		'name' => __('Service Box 1 Link', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'service_box_1_link',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Service Box 1 Image', 'zenbu'),
		'desc' => __('Recommended image sizes 320 X 231', 'zenbu'),
		'id' => 'service_box_1_image',
		'type' => 'upload');			
		
	$options[] = array(
		'name' => __('Service Box 1 Icon', 'zenbu'),
		'desc' => __('Recommended image sizes 46 X 46', 'zenbu'),
		'id' => 'service_box_1_icon',
		'type' => 'upload');	
		
	$options[] = array(
		'name' => __('Service Box 1 Icon Hover', 'zenbu'),
		'desc' => __('Recommended image sizes 46 X 46', 'zenbu'),
		'id' => 'service_box_1_icon_hover',
		'type' => 'upload');	

	$options[] = array(
		'name' => __('Service Box 2 Title', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'service_box_2_title',
		'std' => 'Lorem Ipsum is Simply Dummy',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Service Box 2 Description', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'service_box_2_description',
		'std' => 'Lorem Ipsum is Simply Dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of',
		'type' => 'textarea');	
		
	$options[] = array(
		'name' => __('Service Box 2 Link', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'service_box_2_link',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Service Box 2 Image', 'zenbu'),
		'desc' => __('Recommended image sizes 320 X 231', 'zenbu'),
		'id' => 'service_box_2_image',
		'type' => 'upload');			
		
	$options[] = array(
		'name' => __('Service Box 2 Icon', 'zenbu'),
		'desc' => __('Recommended image sizes 46 X 46', 'zenbu'),
		'id' => 'service_box_2_icon',
		'type' => 'upload');	
		
	$options[] = array(
		'name' => __('Service Box 2 Icon Hover', 'zenbu'),
		'desc' => __('Recommended image sizes 46 X 46', 'zenbu'),
		'id' => 'service_box_2_icon_hover',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Service Box 3 Title', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'service_box_3_title',
		'std' => 'Lorem Ipsum is Simply Dummy',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Service Box 3 Description', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'service_box_3_description',
		'std' => 'Lorem Ipsum is Simply Dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of',
		'type' => 'textarea');	
		
	$options[] = array(
		'name' => __('Service Box 3 Link', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'service_box_3_link',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Service Box 3 Image', 'zenbu'),
		'desc' => __('Recommended image sizes 320 X 231', 'zenbu'),
		'id' => 'service_box_3_image',
		'type' => 'upload');			
		
	$options[] = array(
		'name' => __('Service Box 3 Icon', 'zenbu'),
		'desc' => __('Recommended image sizes 46 X 46', 'zenbu'),
		'id' => 'service_box_3_icon',
		'type' => 'upload');	
		
	$options[] = array(
		'name' => __('Service Box 3 Icon Hover', 'zenbu'),
		'desc' => __('Recommended image sizes 46 X 46', 'zenbu'),
		'id' => 'service_box_3_icon_hover',
		'type' => 'upload');	

	/* Post Box*/	
		
	$options[] = array(
		'name' => __('Post Title 1', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'post_title1',
		'std' => 'recent',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Post Title 2', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'post_title2',
		'std' => 'post',
		'type' => 'text');			
	
	/* Testimonials Box*/
	
	$options[] = array(
		'name' => __('Title Box Testimonials', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'title_box_testimonials',
		'std' => 'What others say about us',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Testimonial Box Name', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'testimonial_box_name',
		'std' => 'Testimonial',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Testimonial Box Text', 'zenbu'),
		'desc' => __('', 'zenbu'),
		'id' => 'testimonial_box_text',
		'std' => 'It is a long established fact that a reader will be distracted by the readable content',
		'type' => 'textarea');
		
	return $options;
}