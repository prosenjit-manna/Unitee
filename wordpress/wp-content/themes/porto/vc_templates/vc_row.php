<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $content - shortcode content
 *
 * Extra Params
 * @var $is_section
 * @var $section_skin
 * @var $section_color_scale
 * @var $section_text_color
 * @var $text_align
 * @var $remove_margin_top
 * @var $remove_margin_bottom
 * @var $show_divider
 * @var $divider_pos
 * @var $divider_color
 * @var $divider_height
 * @var $show_divider_icon
 * @var $divider_icon
 * @var $divider_icon_skin
 * @var $divider_icon_style
 * @var $divider_icon_pos
 * @var $divider_icon_size
 * @var $divider_icon_color
 * @var $divider_icon_bg_color
 * @var $divider_icon_border_color
 * @var $divider_icon_wrap_border_color
 *
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$output = $after_output = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class );

$css_classes = array(
    'vc_row',
    'wpb_row', //deprecated
    'vc_row-fluid',
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);

if ($parallax && $parallax_image) {
    if ($is_section) {
        $css_classes[] .= 'section';
        $css_classes[] .= 'section-parallax';
    }
    if ($section_text_color) {
        $css_classes[] .= 'section-text-' . $section_text_color;
    }
} else if ($is_section) {
    $css_classes[] .= ' section';
    if ($section_skin) {
        $css_classes[] .= 'section-' . $section_skin;
    }
    if ($section_skin == 'default' && $section_color_scale) {
        $css_classes[] .= 'section-default-' . $section_color_scale;
    }
    if ($section_text_color) {
        $css_classes[] .= 'section-text-' . $section_text_color;
    }
}

if ($remove_margin_top)
    $css_classes[] .= 'm-t-none';

if ($remove_margin_bottom)
    $css_classes[] .= 'm-b-none';

$divider_output = '';
if ($is_section && $show_divider) {
    if ( 'bottom' === $divider_pos)
        $css_classes[] .= 'section-with-divider-footer';
    else
        $css_classes[] .= 'section-with-divider';

    $divider_classes = array('divider', 'divider-solid');
    if ($divider_icon_skin != 'custom') $divider_classes[] = 'divider-' . $divider_icon_skin;
    if ($divider_icon_style) $divider_classes[] = 'divider-' . $divider_icon_style;
    if ($divider_icon_size) $divider_classes[] = 'divider-icon-' . $divider_icon_size;
    if ($divider_icon_pos) $divider_classes[] = 'divider-' . $divider_icon_pos;

    $divider_inline_style = '';
    if ($divider_color)
        $divider_inline_style .= 'background-color:' . $divider_color . ';';
    if ($divider_height)
        $divider_inline_style .= 'height:' . (int)$divider_height . 'px;';

    if ($divider_inline_style)
        $divider_inline_style = 'style="' . esc_attr( $divider_inline_style ) . '"';

    $divider_class = 'divider' . rand();
    if ($divider_icon_skin == 'custom' && ($divider_icon_color || $divider_icon_bg_color || $divider_icon_border_color || $divider_icon_wrap_border_color)) :
        $divider_classes[] = $divider_class;
        ?>
        <style type="text/css" data-type="vc_shortcodes-custom-css"><?php
            if ($divider_icon_color || $divider_icon_bg_color || $divider_icon_border_color) : ?>
            .<?php echo $divider_class ?> .fa {
                <?php
                if ($divider_icon_color) : ?>color: <?php echo $divider_icon_color ?> !important;<?php endif;
                if ($divider_icon_bg_color) : ?>background-color: <?php echo $divider_icon_bg_color ?> !important;<?php endif;
                if ($divider_icon_border_color) : ?>border-color: <?php echo $divider_icon_border_color ?> !important;<?php endif;
                ?>
            }<?php endif;
            if ($divider_icon_wrap_border_color) : ?>
            .<?php echo $divider_class ?> .fa:after {
                <?php
                if ($divider_icon_wrap_border_color) : ?>border-color: <?php echo $divider_icon_wrap_border_color ?> !important;<?php endif;
                ?>
            }<?php endif;
            ?></style>
    <?php
    endif;

    $divider_output = '<div class="' . implode( ' ', $divider_classes ) . '"' . $divider_inline_style . '><i class="' . esc_attr( $divider_icon ) . '"></i></div>';
}

if ($text_align)
    $css_classes[] .= 'text-' . $text_align;

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
    $wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
if ( ! empty( $full_width ) ) {
    $wrapper_attributes[] = 'data-vc-full-width="true"';
    $wrapper_attributes[] = 'data-vc-full-width-init="false"';
    if ( 'stretch_row_content' === $full_width ) {
        $wrapper_attributes[] = 'data-vc-stretch-content="true"';
    } elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
        $wrapper_attributes[] = 'data-vc-stretch-content="true"';
        $css_classes[] = 'vc_row-no-padding';
    }
    $after_output .= '<div class="vc_row-full-width"></div>';
}

if ( ! empty( $full_height ) ) {
    $css_classes[] = ' vc_row-o-full-height';
    if ( ! empty( $content_placement ) ) {
        $css_classes[] = ' vc_row-o-content-' . $content_placement;
    }
}

// use default video if user checked video, but didn't chose url
if ( ! empty( $video_bg ) && empty( $video_bg_url ) ) {
    $video_bg_url = 'https://www.youtube.com/watch?v=lMJXxhRFO1k';
}

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

if ( $has_video_bg ) {
    $parallax = $video_bg_parallax;
    $parallax_image = $video_bg_url;
    $css_classes[] = ' vc_video-bg-container';
    wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
    wp_enqueue_script( 'vc_jquery_skrollr_js' );
    $wrapper_attributes[] = 'data-vc-parallax="1.5"'; // parallax speed
    $css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
    if ( strpos( $parallax, 'fade' ) !== false ) {
        $css_classes[] = 'js-vc_parallax-o-fade';
        $wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
    } elseif ( strpos( $parallax, 'fixed' ) !== false ) {
        $css_classes[] = 'js-vc_parallax-o-fixed';
    }
}

if ( ! empty ( $parallax_image ) ) {
    if ( $has_video_bg ) {
        $parallax_image_src = $parallax_image;
    } else {
        $parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
        $parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
        if ( ! empty( $parallax_image_src[0] ) ) {
            $parallax_image_src = $parallax_image_src[0];
        }
    }
    $wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
    $wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

if ($show_divider && !$divider_pos) {
    $output .= $divider_output;
}

$output .= wpb_js_remove_wpautop( $content );

if ($show_divider && 'bottom' === $divider_pos) {
    $output .= $divider_output;
}

$output .= '</div>';
$output .= $after_output;
$output .= $this->endBlockComment( $this->getShortcode() );

echo $output;