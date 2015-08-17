<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $values
 * @var $units
 * @var $bgcolor
 * @var $custombgcolor
 * @var $options
 * @var $el_class
 *
 * Extra Params
 * @var $contextual
 * @var $tooltip
 * @var $animation
 * @var $border_radius
 * @var $size
 * @var $min_width
 *
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Progress_Bar
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$bar_options = '';
$options = explode( ",", $options );
if ( in_array( "animated", $options ) ) $bar_options .= " animated";
if ( in_array( "striped", $options ) ) $bar_options .= " striped";

if ($contextual) {
    $bar_options .= ' progress-bar-'.$contextual;
}

if ( 'custom' === $bgcolor && '' !== $custombgcolor ) {
	$custombgcolor = vc_get_css_color( 'background-color', $custombgcolor );
	$bgcolor = "";
} else {
    $custombgcolor = '';
}
if ( '' !== $bgcolor ) {
    $bgcolor = " " . $bgcolor;
}

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_progress_bar wpb_content_element' . $el_class, $this->settings['base'], $atts );
$output = '<div class="' . $css_class . '">';
$output .= wpb_widget_title( array( 'title' => $title, 'extraclass' => 'wpb_progress_bar_heading' ) );

$graph_lines = explode( ",", $values );
$max_value = 0.0;
$graph_lines_data = array();
foreach ( $graph_lines as $line ) {
	$new_line = array();
	$color_index = 2;
	$data = explode( "|", $line );
	$new_line['value'] = isset( $data[0] ) ? $data[0] : 0;
	$new_line['percentage_value'] = isset( $data[1] ) && preg_match( '/^\d{1,2}\%$/', $data[1] ) ? (float)str_replace( '%', '', $data[1] ) : false;
	if ( false !== $new_line['percentage_value'] ) {
		$color_index += 1;
		$new_line['label'] = isset( $data[2] ) ? $data[2] : '';
	} else {
		$new_line['label'] = isset( $data[1] ) ? $data[1] : '';
	}
	$new_line['bgcolor'] = ( isset( $data[$color_index] ) ) ? 'background-color: ' . $data[$color_index] . ';' : $custombgcolor;

	if ( false === $new_line['percentage_value'] && $max_value < (float) $new_line['value'] ) {
		$max_value = $new_line['value'];
	}

	$graph_lines_data[] = $new_line;
}

foreach ( $graph_lines_data as $line ) {
    $output .= '<div class="progress-label"><span>'.$line['label'].'</span></div>';

    $unit = ( '' !== $units ) ? ' <span class="vc_label_units">' . $line['value'] . $units . '</span>' : '';
	$output .= '<div class="vc_single_bar progress' . $bgcolor . ($border_radius ? ' progress-'.$border_radius : '') . ($size ? ' progress-'.$size : '') . '">';
	if ( false !== $line['percentage_value'] ) {
		$percentage_value = $line['percentage_value'];
	} elseif ( $max_value > 100.00 ) {
		$percentage_value = (float)$line['value'] > 0 && $max_value > 100.00 ? round( (float)$line['value'] / $max_value * 100, 4 ) : 0;
	} else {
		$percentage_value = $line['value'];
	}
    $style = '';
    if ($line['bgcolor'] || $min_width || !$animation) {
        $style = ' style="';
        if ($line['bgcolor'])
            $style .= $line['bgcolor'];
        if ($min_width) {
            $style .= 'min-width:'.$min_width.';';
        } else if (!$animation) {
            $style .= 'min-width:'.$percentage_value.'%';
        }
        $style .= '"';
    }
    $output .= '<span class="vc_bar progress-bar' . esc_attr( $bar_options ) . '" data-percentage-value="' . ( $percentage_value ) . '" data-value="' . $line['value'] . '"' . $style . '>';
    if ($unit) {
        if ($tooltip) {
            $output .= '<span class="progress-bar-tooltip">' . $unit . '</span>';
        } else {
            $output .= $unit;
        }
    }
	$output .= '</span></div>';
}

$output .= '</div>';

echo $output . $this->endBlockComment( $this->getShortcode() ) . "\n";