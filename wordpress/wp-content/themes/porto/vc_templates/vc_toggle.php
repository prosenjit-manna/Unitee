<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $el_class
 * @var $style : removed
 * @var $color : removed
 * @var $size : removed
 * @var $open
 * @var $css_animation
 * @var $el_id
 * @var $content - shortcode content
 *
 * Extra Params
 * @var $show_icon
 * @var $icon
 *
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Toggle
 */
$output = '';

$inverted = false;
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass($el_class);
$el_class .= ( $open == 'true' ) ? ' active' : '';

$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'toggle '.$el_class, $this->settings['base']);
$css_class .= $this->getCSSAnimation($css_animation);

$output .= "\n" . '<section class="' . esc_attr( $css_class ) . '">';
$output .= "\n\t" . '<label>' . ( $show_icon && $icon ? '<i class="' . esc_attr( $icon ) . '"></i>' : '' ) . $title . '</label>';
$output .= "\n\t" . '<div class="toggle-content">' . wpb_js_remove_wpautop($content, true) . '</div>';
$output .= "\n" . '</section>' . $this->endBlockComment( $this->getShortcode() );

echo $output;