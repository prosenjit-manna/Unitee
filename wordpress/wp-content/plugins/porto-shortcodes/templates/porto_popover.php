<?php
$output = $prefix = $text = $suffix = $display = $type = $link = $btn_size = $btn_skin = $btn_context = $popover_title = $popover_text = $popover_position = $popover_trigger = $popover_skin = $animation_type = $animation_duration = $animation_delay = $el_class = '';
extract(shortcode_atts(array(
    'prefix' => '',
    'text' => '',
    'suffix' => '',
    'display' => '',
    'type' => '',
    'link' => '',
    'btn_size' => '',
    'btn_skin' => 'custom',
    'btn_context' => '',
    'popover_title' => '',
    'popover_text' => '',
    'popover_position' => 'top',
    'popover_trigger' => 'click',
    'popover_skin' => 'custom',
    'animation_type' => '',
    'animation_duration' => '',
    'animation_delay' => '',
    'el_class' => '',
), $atts));

$el_class = porto_shortcode_extract_class( $el_class );

if ($display == 'block')
    $el_class .= ' wpb_content_element';
else
    $el_class .= ' inline';

if ($popover_skin != 'custom')
    $el_class .= ' popover-' . $popover_skin;

$output = '<div class="porto-popover ' . $el_class . '"';
if ($animation_type)
    $output .= ' data-appear-animation="'.$animation_type.'"';
if ($animation_delay)
    $output .= ' data-appear-animation-delay="'.$animation_delay.'"';
if ($animation_duration && $animation_duration != 1000)
    $output .= ' data-appear-animation-duration="'.$animation_duration.'"';
$output .= '>';

$output .= $prefix;

if ($type == 'btn') {
    $btn_class = 'btn';
    if ($btn_size)
        $btn_class .= ' btn-'.$btn_size;
    if ($btn_skin != 'custom')
        $btn_class .= ' btn-'.$btn_skin;
    if ($btn_context)
        $btn_class .= ' btn-'.$btn_context;
    if ($btn_skin == 'custom' && !$btn_context)
        $btn_class .= ' btn-default';
    if ($type == 'btn') {
        $output .= ' <button type="button" data-toggle="popover" title="' . $popover_title . '" data-content="' . $popover_text . '" data-placement="' . $popover_position . '" class="' . $btn_class . '" data-trigger="' . $popover_trigger . '">';
        $output .= $text;
        $output .= '</button> ';
    } else {
        $output .= ' <a href="' . ($link ? $link : 'javascript:;') . '" data-toggle="popover" title="' . $popover_title . '" data-content="' . $popover_text . '" data-placement="' . $popover_position . '" class="' . $btn_class . '" data-trigger="' . $popover_trigger . '">';
        $output .= $text;
        $output .= '</a> ';
    }
} else {
    $output .= ' <a href="' . ($link ? $link : 'javascript:;') . '" data-toggle="popover" title="' . $popover_title . '" data-content="' . $popover_text . '" data-placement="' . $popover_position . '" data-trigger="' . $popover_trigger . '">';
    $output .= $text;
    $output .= '</a> ';
}

$output .= $suffix;

$output .= '</div>' . porto_shortcode_end_block_comment( 'porto_popover' ) . "\n";;

echo $output;