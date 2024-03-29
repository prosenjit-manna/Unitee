<?php

// Porto Toggles
add_shortcode('porto_toggles', 'porto_shortcode_toggles');
add_action('vc_after_init', 'porto_load_toggles_shortcode');

function porto_shortcode_toggles($atts, $content = null) {
    ob_start();
    if ($template = porto_shortcode_template('porto_toggles'))
        include $template;
    return ob_get_clean();
}

function porto_load_toggles_shortcode() {
    $animation_type = porto_vc_animation_type();
    $animation_duration = porto_vc_animation_duration();
    $animation_delay = porto_vc_animation_delay();
    $custom_class = porto_vc_custom_class();

    vc_map( array(
        "name" => "Porto " . __("Toggles", 'porto-shortcodes'),
        "base" => "porto_toggles",
        "category" => __("Porto", 'porto-shortcodes'),
        "icon" => "porto_vc_toggles",
        'is_container' => true,
        'weight' => - 50,
        'js_view' => 'VcColumnView',
        "as_parent" => array('only' => 'vc_toggle'),
        "params" => array(
            array(
                'type' => 'dropdown',
                'heading' => __('Type', 'porto-shortcodes'),
                'param_name' => 'type',
                'value' => porto_vc_commons('toggle_type'),
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Size', 'porto-shortcodes'),
                'param_name' => 'size',
                'value' => porto_vc_commons('toggle_size'),
            ),
            array(
                'type' => 'checkbox',
                'heading' => __('One toggle open at a time', 'porto-shortcodes'),
                'param_name' => 'one_toggle',
                'value' => array(__('Yes, please', 'js_composer') => 'yes'),
                'description' => ''
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Skin Color', 'porto-shortcodes'),
                'param_name' => 'skin',
                'std' => 'custom',
                'value' => porto_vc_commons('colors'),
                'admin_label' => true
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Color', 'porto-shortcodes'),
                'param_name' => 'color',
                'dependency' => array('element' => 'skin', 'value' => array( 'custom' )),
            ),
            $animation_type,
            $animation_duration,
            $animation_delay,
            $custom_class
        )
    ) );

    if (!class_exists('WPBakeryShortCode_Porto_Toggles')) {
        class WPBakeryShortCode_Porto_Toggles extends WPBakeryShortCodesContainer {
        }
    }
}