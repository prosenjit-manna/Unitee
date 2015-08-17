<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $el_class
 * @var $value
 * @var $units
 * @var $color
 * @var $label_value
 *
 * Extra Params
 * @var $type : custom
 * @var $view
 * @var $view_size
 * @var $icon
 * @var $icon_color
 * @var $size
 * @var $trackcolor
 * @var $barcolor
 * @var $scalecolor
 * @var $speed
 * @var $line
 * @var $linecap
 *
 * Shortcode class
 * @var $this WPBakeryShortCode_Vc_Pie
 */
$title = $output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if ($type == 'default') {

    wp_enqueue_script('vc_pie');

    $el_class = $this->getExtraClass( $el_class );
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_pie_chart wpb_content_element' . $el_class, $this->settings['base'], $atts );
    $output = "\n\t".'<div class= "' . esc_attr( $css_class ) .'" data-pie-value="' . esc_attr( $value ) . '" data-pie-label-value="' . esc_attr( $label_value ) . '" data-pie-units="' . esc_attr( $units ) . '" data-pie-color="' . htmlspecialchars($color) . '">';
        $output .= "\n\t\t".'<div class="wpb_wrapper">';
            $output .= "\n\t\t\t".'<div class="vc_pie_wrapper">';
                $output .= "\n\t\t\t".'<span class="vc_pie_chart_back"></span>';
                $output .= "\n\t\t\t".'<span class="vc_pie_chart_value"></span>';
                $output .= "\n\t\t\t".'<canvas width="101" height="101"></canvas>';
            $output .= "\n\t\t\t".'</div>';
            if ( '' !== $title ) {
                $output .= '<h4 class="wpb_heading wpb_pie_chart_heading">'.$title.'</h4>';
            }
            //wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_pie_chart_heading'));
            $output .= "\n\t\t".'</div>'.$this->endBlockComment('.wpb_wrapper');
        $output .= "\n\t".'</div>'.$this->endBlockComment( $this->getShortcode() )."\n";
    echo $output;
} else {
    global $porto_settings;
    if (empty($barcolor))
        $barcolor = $porto_settings['skin-color'];

    $el_class = $this->getExtraClass( $el_class );
    if ($view) $el_class .= ' '.$view;
    if ($view_size) $el_class .= ' circular-bar-'.$view_size;
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'circular-bar center ' . $el_class, $this->settings['base'], $atts );
    $output = "\n\t".'<div class= "' . esc_attr( $css_class ) . '">';
        $output .= "\n\t\t".'<div class="circular-bar-chart" data-trackcolor="' . esc_attr( $trackcolor ) . '" data-barcolor="' . esc_attr( $barcolor ) . '" data-scalecolor="' . esc_attr( $scalecolor ) . '" data-percent="' . esc_attr( $value ) . '" data-size="' . esc_attr( $size ) . '" data-speed="' . esc_attr( $speed ) . '" data-linewidth="' . esc_attr( $line ) . '" data-label-value="' . esc_attr( $label_value ) . '" data-linecap="' . esc_attr( $linecap ) . '" style="height:' . esc_attr( $size ) . 'px">';
            if ($view == 'only-icon' && $icon) {
                $output .= "\n\t\t\t".'<i class="' . esc_attr( $icon ) . '"'.($icon_color?' style="color:' . esc_attr( $icon_color ) . '"':'').'></i>';
            } else if ($view == 'single-line') {
                if ($title!='') {
                    $output .= "\n\t\t\t".'<strong>'.$title.'</strong>';
                }
            } else {
                if ($title!='') {
                    $output .= "\n\t\t\t".'<strong>'.$title.'</strong>';
                }
                $output .= "\n\t\t\t".'<label><span class="percent">0</span>'.$units.'</label>';
            }
	    $output .= "\n\t".'</div>'.$this->endBlockComment('.chart')."\n";

	$output .= "\n\t".'</div>'.$this->endBlockComment( $this->getShortcode() )."\n";
	echo $output;
}