<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $tab_id
 * @var $title
 * @var $content - shortcode content
 *
 * Extra Params (will be use vc_tabs.php)
 * @var show_icon
 * @var icon
 * @var label
 * @var icon_skin
 * @var icon_color
 * @var icon_bg_color
 * @var icon_border_color
 * @var icon_wrap_border_color
 * @var icon_shadow_color
 * @var icon_hcolor
 * @var icon_hbg_color
 * @var icon_hborder_color
 * @var icon_wrap_hborder_color
 * @var icon_hshadow_color
 *
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Tab
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tab-pane', $this->settings['base']);
$output .= "\n\t\t\t" . '<div id="tab-'. (empty($tab_id) ? sanitize_title( $title ) : esc_attr( $tab_id )) .'" class="' . esc_attr( $css_class ) . '">';
$output .= ('' === trim( $content )) ? __("Empty section. Edit page to add content here.", "js_composer") : "\n\t\t\t\t" . wpb_js_remove_wpautop($content);
$output .= "\n\t\t\t" . '</div> ' . $this->endBlockComment( $this->getShortcode() );

echo $output;