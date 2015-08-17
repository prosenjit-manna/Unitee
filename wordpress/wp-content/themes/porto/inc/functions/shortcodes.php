<?php

add_action('vc_after_init', 'porto_load_shortcodes');

function porto_load_shortcodes() {

    if ( function_exists('vc_map') ) {
        global $porto_settings;
        $dark = (isset($porto_settings['css-type']) && $porto_settings['css-type'] == 'dark') ? true : false;

        /* ---------------------------- */
        /* Customize Row
        /* ---------------------------- */
        $section_group = __('Section', 'porto');
        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'heading' => __('Section & Parallax Text Color', 'porto'),
            'param_name' => 'section_text_color',
            'value' => porto_vc_commons('section_text_color'),
        ));
        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'heading' => __('Text Align', 'porto'),
            'param_name' => 'text_align',
            'value' => porto_vc_commons('align')
        ));
        vc_add_param('vc_row', array(
            'type' => 'checkbox',
            'heading' => __('Is Section?', 'porto'),
            'param_name' => 'is_section',
            'value' => array(__('Yes, please', 'js_composer') => 'yes'),
            'group' => $section_group,
            'admin_label' => true,
        ));
        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'heading' => __('Section Skin Color', 'porto'),
            'param_name' => 'section_skin',
            'value' => porto_vc_commons('section_skin'),
            'dependency' => array('element' => 'parallax', 'value' => array('')),
            'group' => $section_group
        ));
        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'heading' => __('Section Default Color Scale', 'porto'),
            'param_name' => 'section_color_scale',
            'value' => porto_vc_commons('section_color_scale'),
            'dependency' => array('element' => 'section_skin', 'value' => array('default')),
            'group' => $section_group
        ));
        vc_add_param('vc_row', array(
            'type' => 'checkbox',
            'heading' => __('Remove Margin Top', 'porto'),
            'param_name' => 'remove_margin_top',
            'value' => array(__('Yes, please', 'js_composer') => 'yes'),
            'group' => $section_group
        ));
        vc_add_param('vc_row', array(
            'type' => 'checkbox',
            'heading' => __('Remove Margin Bottom', 'porto'),
            'param_name' => 'remove_margin_bottom',
            'value' => array(__('Yes, please', 'js_composer') => 'yes'),
            'group' => $section_group
        ));
        vc_add_param('vc_row', array(
            'type' => 'checkbox',
            'heading' => __('Show Divider', 'porto'),
            'param_name' => 'show_divider',
            'value' => array(__('Yes, please', 'js_composer') => 'yes'),
            'dependency' => array('element' => 'is_section', 'not_empty' => true),
            'group' => $section_group
        ));
        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'heading' => __('Divider Position', 'porto'),
            'param_name' => 'divider_pos',
            'value' => array(
                __('Top', 'porto') => '',
                __('Bottom', 'porto') => 'bottom',
            ),
            'group' => $section_group
        ));
        vc_add_param('vc_row', array(
            'type' => 'colorpicker',
            'heading' => __( 'Divider Color', 'porto' ),
            'param_name' => 'divider_color',
            'dependency' => array('element' => 'show_divider', 'not_empty' => true),
            'group' => $section_group
        ));
        vc_add_param('vc_row', array(
            'type' => 'textfield',
            'heading' => __('Divider Height', 'porto'),
            'param_name' => 'divider_height',
            'dependency' => array('element' => 'show_divider', 'not_empty' => true),
            'group' => $section_group
        ));
        vc_add_param('vc_row', array(
            'type' => 'checkbox',
            'heading' => __('Show FontAwesome Icon', 'porto'),
            'param_name' => 'show_divider_icon',
            'value' => array(__('Yes, please', 'js_composer') => 'yes'),
            'dependency' => array('element' => 'show_divider', 'not_empty' => true),
            'group' => $section_group
        ));
        vc_add_param('vc_row', array(
            'type' => 'iconpicker',
            'heading' => __('Select FontAwesome Icon', 'porto'),
            'param_name' => 'divider_icon',
            'dependency' => array('element' => 'show_divider_icon', 'not_empty' => true),
            'group' => $section_group
        ));
        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'heading' => __('Icon Skin Color', 'porto'),
            'param_name' => 'divider_icon_skin',
            'std' => 'custom',
            'value' => porto_vc_commons('colors'),
            'dependency' => array('element' => 'show_divider_icon', 'not_empty' => true),
            'group' => $section_group
        ));
        vc_add_param('vc_row', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Color', 'porto'),
            'param_name' => 'divider_icon_color',
            'dependency' => array('element' => 'divider_icon_skin', 'value' => array('custom')),
            'group' => $section_group
        ));
        vc_add_param('vc_row', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Background Color', 'porto'),
            'param_name' => 'divider_icon_bg_color',
            'dependency' => array('element' => 'divider_icon_skin', 'value' => array('custom')),
            'group' => $section_group
        ));
        vc_add_param('vc_row', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Border Color', 'porto'),
            'param_name' => 'divider_icon_border_color',
            'dependency' => array('element' => 'divider_icon_skin', 'value' => array('custom')),
            'group' => $section_group
        ));
        vc_add_param('vc_row', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Wrap Border Color', 'porto'),
            'param_name' => 'divider_icon_wrap_border_color',
            'dependency' => array('element' => 'divider_icon_skin', 'value' => array('custom')),
            'group' => $section_group
        ));
        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'heading' => __('Icon Style', 'porto'),
            'param_name' => 'divider_icon_style',
            'value' => porto_vc_commons('separator_icon_style'),
            'dependency' => array('element' => 'show_divider_icon', 'not_empty' => true),
            'group' => $section_group
        ));
        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'heading' => __('Icon Position', 'porto'),
            'param_name' => 'divider_icon_pos',
            'value' => porto_vc_commons('separator_icon_pos'),
            'dependency' => array('element' => 'show_divider_icon', 'not_empty' => true),
            'group' => $section_group
        ));
        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'heading' => __('Icon Size', 'porto'),
            'param_name' => 'divider_icon_size',
            'value' => porto_vc_commons('separator_icon_size'),
            'dependency' => array('element' => 'show_divider_icon', 'not_empty' => true),
            'group' => $section_group
        ));

        /* ---------------------------- */
        /* Customize Column
        /* ---------------------------- */
        vc_add_param('vc_column', array(
            'type' => 'dropdown',
            'heading' => __('Section & Parallax Text Color', 'porto'),
            'param_name' => 'section_text_color',
            'value' => porto_vc_commons('section_text_color')
        ));
        vc_add_param('vc_column', array(
            'type' => 'dropdown',
            'heading' => __('Text Align', 'porto'),
            'param_name' => 'text_align',
            'value' => porto_vc_commons('align')
        ));
        vc_add_param('vc_column', array(
            'type' => 'checkbox',
            'heading' => __('Is Section?', 'porto'),
            'param_name' => 'is_section',
            'value' => array(__('Yes, please', 'js_composer') => 'yes'),
            'group' => $section_group,
            'admin_label' => true,
        ));
        vc_add_param('vc_column', array(
            'type' => 'dropdown',
            'heading' => __('Section Skin Color', 'porto'),
            'param_name' => 'section_skin',
            'value' => porto_vc_commons('section_skin'),
            'dependency' => array('element' => 'parallax', 'value' => array('')),
            'group' => $section_group
        ));
        vc_add_param('vc_column', array(
            'type' => 'dropdown',
            'heading' => __('Section Default Scale Color', 'porto'),
            'param_name' => 'section_color_scale',
            'value' => porto_vc_commons('section_color_scale'),
            'dependency' => array('element' => 'section_skin', 'value' => array('default')),
            'group' => $section_group
        ));
        vc_add_param('vc_column', array(
            'type' => 'checkbox',
            'heading' => __('Remove Margin Top', 'porto'),
            'param_name' => 'remove_margin_top',
            'value' => array(__('Yes, please', 'js_composer') => 'yes'),
            'group' => $section_group
        ));
        vc_add_param('vc_column', array(
            'type' => 'checkbox',
            'heading' => __('Remove Margin Bottom', 'porto'),
            'param_name' => 'remove_margin_bottom',
            'value' => array(__('Yes, please', 'js_composer') => 'yes'),
            'group' => $section_group
        ));
        vc_add_param('vc_column', array(
            'type' => 'checkbox',
            'heading' => __('Show Divider', 'porto'),
            'param_name' => 'show_divider',
            'value' => array(__('Yes, please', 'js_composer') => 'yes'),
            'dependency' => array('element' => 'is_section', 'not_empty' => true),
            'group' => $section_group
        ));
        vc_add_param('vc_column', array(
            'type' => 'dropdown',
            'heading' => __('Divider Position', 'porto'),
            'param_name' => 'divider_pos',
            'value' => array(
                __('Top', 'porto') => '',
                __('Bottom', 'porto') => 'bottom',
            ),
            'group' => $section_group
        ));
        vc_add_param('vc_column', array(
            'type' => 'colorpicker',
            'heading' => __( 'Divider Color', 'porto' ),
            'param_name' => 'divider_color',
            'dependency' => array('element' => 'show_divider', 'not_empty' => true),
            'group' => $section_group
        ));
        vc_add_param('vc_column', array(
            'type' => 'textfield',
            'heading' => __('Divider Height', 'porto'),
            'param_name' => 'divider_height',
            'dependency' => array('element' => 'show_divider', 'not_empty' => true),
            'group' => $section_group
        ));
        vc_add_param('vc_column', array(
            'type' => 'checkbox',
            'heading' => __('Show FontAwesome Icon', 'porto'),
            'param_name' => 'show_divider_icon',
            'value' => array(__('Yes, please', 'js_composer') => 'yes'),
            'dependency' => array('element' => 'show_divider', 'not_empty' => true),
            'group' => $section_group
        ));
        vc_add_param('vc_column', array(
            'type' => 'iconpicker',
            'heading' => __('Select FontAwesome Icon', 'porto'),
            'param_name' => 'divider_icon',
            'dependency' => array('element' => 'show_divider_icon', 'not_empty' => true),
            'group' => $section_group
        ));
        vc_add_param('vc_column', array(
            'type' => 'dropdown',
            'heading' => __('Icon Skin Color', 'porto'),
            'param_name' => 'divider_icon_skin',
            'std' => 'custom',
            'value' => porto_vc_commons('colors'),
            'dependency' => array('element' => 'show_divider_icon', 'not_empty' => true),
            'group' => $section_group
        ));
        vc_add_param('vc_column', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Color', 'porto'),
            'param_name' => 'divider_icon_color',
            'dependency' => array('element' => 'divider_icon_skin', 'value' => array('custom')),
            'group' => $section_group
        ));
        vc_add_param('vc_column', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Background Color', 'porto'),
            'param_name' => 'divider_icon_bg_color',
            'dependency' => array('element' => 'divider_icon_skin', 'value' => array('custom')),
            'group' => $section_group
        ));
        vc_add_param('vc_column', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Border Color', 'porto'),
            'param_name' => 'divider_icon_border_color',
            'dependency' => array('element' => 'divider_icon_skin', 'value' => array('custom')),
            'group' => $section_group
        ));
        vc_add_param('vc_column', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Wrap Border Color', 'porto'),
            'param_name' => 'divider_icon_wrap_border_color',
            'dependency' => array('element' => 'divider_icon_skin', 'value' => array('custom')),
            'group' => $section_group
        ));
        vc_add_param('vc_column', array(
            'type' => 'dropdown',
            'heading' => __('Icon Style', 'porto'),
            'param_name' => 'divider_icon_style',
            'value' => porto_vc_commons('separator_icon_style'),
            'dependency' => array('element' => 'show_divider_icon', 'not_empty' => true),
            'group' => $section_group
        ));
        vc_add_param('vc_column', array(
            'type' => 'dropdown',
            'heading' => __('Icon Position', 'porto'),
            'param_name' => 'divider_icon_pos',
            'value' => porto_vc_commons('separator_icon_pos'),
            'dependency' => array('element' => 'show_divider_icon', 'not_empty' => true),
            'group' => $section_group
        ));
        vc_add_param('vc_column', array(
            'type' => 'dropdown',
            'heading' => __('Icon Size', 'porto'),
            'param_name' => 'divider_icon_size',
            'value' => porto_vc_commons('separator_icon_size'),
            'dependency' => array('element' => 'show_divider_icon', 'not_empty' => true),
            'group' => $section_group
        ));

        /* ---------------------------- */
        /* Customize Custom Heading
        /* ---------------------------- */
        vc_add_param('vc_custom_heading', array(
            'type' => 'dropdown',
            'heading' => __('Skin Color', 'porto'),
            'param_name' => 'skin',
            'std' => 'custom',
            'value' => porto_vc_commons('colors'),
        ));
        vc_add_param('vc_custom_heading', array(
            'type' => 'checkbox',
            'heading' => __('Show Border', 'porto'),
            'param_name' => 'show_border',
            'value' => array(__('Yes, please', 'js_composer') => 'yes'),
        ));
        vc_add_param('vc_custom_heading', array(
            'type' => 'dropdown',
            'heading' => __('Border Skin Color', 'porto'),
            'param_name' => 'border_skin',
            'std' => 'custom',
            'value' => porto_vc_commons('colors'),
            'dependency' => array('element' => 'show_border', 'not_empty' => true),
        ));
        vc_add_param('vc_custom_heading', array(
            'type' => 'colorpicker',
            'heading' => __('Border Color', 'porto'),
            'param_name' => 'border_color',
            'dependency' => array('element' => 'border_skin', 'value' => array('custom')),
        ));
        vc_add_param('vc_custom_heading', array(
            'type' => 'dropdown',
            'heading' => __('Border Type', 'porto'),
            'param_name' => 'border_type',
            'value' => porto_vc_commons('heading_border_type'),
            'dependency' => array('element' => 'show_border', 'not_empty' => true),
        ));
        vc_add_param('vc_custom_heading', array(
            'type' => 'dropdown',
            'heading' => __('Border Size', 'porto'),
            'param_name' => 'border_size',
            'value' => porto_vc_commons('heading_border_size'),
            'dependency' => array('element' => 'show_border', 'not_empty' => true),
        ));

        /* ---------------------------- */
        /* Customize Tabs, Tab
        /* ---------------------------- */
        vc_remove_param('vc_tabs', 'interval');
        vc_add_param('vc_tabs', array(
            'type' => 'dropdown',
            'heading' => __('Position', 'porto'),
            'param_name' => 'position',
            'value' => porto_vc_commons('tabs'),
            'description' => __('Select the position of the tab header.', 'porto'),
            'admin_label' => true
        ));
        vc_add_param('vc_tabs', array(
            'type' => 'dropdown',
            'heading' => __('Skin Color', 'porto'),
            'param_name' => 'skin',
            'std' => 'custom',
            'value' => porto_vc_commons('colors'),
            'admin_label' => true
        ));
        vc_add_param('vc_tabs', array(
            'type' => 'colorpicker',
            'heading' => __('Color', 'porto'),
            'param_name' => 'color',
            'dependency' => array('element' => 'skin', 'value' => array( 'custom' )),
        ));
        vc_add_param('vc_tabs', array(
            'type' => 'dropdown',
            'heading' => __('Type', 'porto'),
            'param_name' => 'type',
            'value' => porto_vc_commons('tabs_type'),
            'admin_label' => true
        ));
        vc_add_param('vc_tabs', array(
            'type' => 'dropdown',
            'heading' => __('Icon Style', 'porto'),
            'param_name' => 'icon_style',
            'value' => porto_vc_commons('tabs_icon_style'),
            'admin_label' => true,
            'dependency' => array('element' => 'type', 'value' => array( 'tabs-simple' )),
        ));
        vc_add_param('vc_tabs', array(
            'type' => 'dropdown',
            'heading' => __('Icon Effect', 'porto'),
            'param_name' => 'icon_effect',
            'value' => porto_vc_commons('tabs_icon_effect'),
            'admin_label' => true,
            'dependency' => array('element' => 'type', 'value' => array( 'tabs-simple' )),
        ));
        vc_add_param('vc_tab', array(
            'type' => 'checkbox',
            'heading' => __('Show FontAwesome Icon', 'porto'),
            'param_name' => 'show_icon',
            'value' => array(__('Yes, please', 'js_composer') => 'yes'),
        ));
        vc_add_param('vc_tab', array(
            'type' => 'iconpicker',
            'heading' => __('Select FontAwesome Icon', 'porto'),
            'param_name' => 'icon',
            'dependency' => array('element' => 'show_icon', 'not_empty' => true)
        ));
        vc_add_param('vc_tab', array(
            'type' => 'label',
            'heading' => __('Please configure the following options when Tabs Type is Simple.', 'porto'),
            'param_name' => 'label'
        ));
        vc_add_param('vc_tab', array(
            'type' => 'dropdown',
            'heading' => __('Icon Skin Color', 'porto'),
            'param_name' => 'icon_skin',
            'std' => 'custom',
            'value' => porto_vc_commons('colors'),
            'dependency' => array('element' => 'show_icon', 'not_empty' => true)
        ));
        vc_add_param('vc_tab', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Color', 'porto'),
            'param_name' => 'icon_color',
            'dependency' => array('element' => 'icon_skin', 'value' => array( 'custom' )),
        ));
        vc_add_param('vc_tab', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Background Color', 'porto'),
            'param_name' => 'icon_bg_color',
            'dependency' => array('element' => 'icon_skin', 'value' => array( 'custom' )),
        ));
        vc_add_param('vc_tab', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Border Color', 'porto'),
            'param_name' => 'icon_border_color',
            'dependency' => array('element' => 'icon_skin', 'value' => array( 'custom' )),
        ));
        vc_add_param('vc_tab', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Wrap Border Color', 'porto'),
            'param_name' => 'icon_wrap_border_color',
            'dependency' => array('element' => 'icon_skin', 'value' => array( 'custom' )),
        ));
        vc_add_param('vc_tab', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Box Shadow Color', 'porto'),
            'param_name' => 'icon_shadow_color',
            'dependency' => array('element' => 'icon_skin', 'value' => array( 'custom' )),
        ));
        vc_add_param('vc_tab', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Hover Color', 'porto'),
            'param_name' => 'icon_hcolor',
            'dependency' => array('element' => 'icon_skin', 'value' => array( 'custom' )),
        ));
        vc_add_param('vc_tab', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Hover Background Color', 'porto'),
            'param_name' => 'icon_hbg_color',
            'dependency' => array('element' => 'icon_skin', 'value' => array( 'custom' )),
        ));
        vc_add_param('vc_tab', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Hover Border Color', 'porto'),
            'param_name' => 'icon_hborder_color',
            'dependency' => array('element' => 'icon_skin', 'value' => array( 'custom' )),
        ));
        vc_add_param('vc_tab', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Wrap Hover Border Color', 'porto'),
            'param_name' => 'icon_wrap_hborder_color',
            'dependency' => array('element' => 'icon_skin', 'value' => array( 'custom' )),
        ));
        vc_add_param('vc_tab', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Hover Box Shadow Color', 'porto'),
            'param_name' => 'icon_hshadow_color',
            'dependency' => array('element' => 'icon_skin', 'value' => array( 'custom' )),
        ));


        /* ---------------------------- */
        /* Customize Tour
        /* ---------------------------- */
        vc_remove_param('vc_tour', 'interval');
        vc_add_param('vc_tour', array(
            'type' => 'dropdown',
            'heading' => __('Position', 'porto'),
            'param_name' => 'position',
            'value' => porto_vc_commons('tour'),
            'description' => __('Select the position of the tab header.', 'porto'),
            'admin_label' => true
        ));
        vc_add_param('vc_tour', array(
            'type' => 'dropdown',
            'heading' => __('Skin Color', 'porto'),
            'param_name' => 'skin',
            'std' => 'custom',
            'value' => porto_vc_commons('colors'),
            'admin_label' => true
        ));
        vc_add_param('vc_tour', array(
            'type' => 'colorpicker',
            'heading' => __('Color', 'porto'),
            'param_name' => 'color',
            'dependency' => array(
                'element' => 'skin',
                'value' => array( 'custom' )
            ),
        ));
        vc_add_param('vc_tour', array(
            'type' => 'dropdown',
            'heading' => __('Type', 'porto'),
            'param_name' => 'type',
            'value' => porto_vc_commons('tour_type'),
            'admin_label' => true
        ));

        /* ---------------------------- */
        /* Customize Separator
        /* ---------------------------- */
        vc_remove_param('vc_separator', 'style');
        vc_add_param('vc_separator', array(
            'type' => 'dropdown',
            'heading' => __('Type', 'porto'),
            'param_name' => 'type',
            'value' => porto_vc_commons('separator_type'),
        ));
        vc_add_param('vc_separator', array(
            'type' => 'dropdown',
            'heading' => __('Style', 'porto'),
            'param_name' => 'style',
            'value' => porto_vc_commons('separator_style'),
            'dependency' => array('element' => 'type', 'value' => array(''))
        ));
        vc_add_param('vc_separator', array(
            'type' => 'attach_image',
            'heading' => __('Pattern', 'porto'),
            'param_name' => 'pattern',
            'dependency' => array('element' => 'style', 'value' => array('pattern'))
        ));
        vc_add_param('vc_separator', array(
            'type' => 'checkbox',
            'heading' => __('Show FontAwesome Icon', 'porto'),
            'param_name' => 'show_icon',
            'value' => array(__('Yes, please', 'js_composer') => 'yes'),
            'dependency' => array('element' => 'type', 'value' => array(''))
        ));
        vc_add_param('vc_separator', array(
            'type' => 'iconpicker',
            'heading' => __('Select FontAwesome Icon', 'porto'),
            'param_name' => 'icon',
            'dependency' => array('element' => 'show_icon', 'not_empty' => true)
        ));
        vc_add_param('vc_separator', array(
            'type' => 'dropdown',
            'heading' => __('Icon Skin Color', 'porto'),
            'param_name' => 'icon_skin',
            'std' => 'custom',
            'value' => porto_vc_commons('colors'),
            'dependency' => array('element' => 'show_icon', 'not_empty' => true)
        ));
        vc_add_param('vc_separator', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Color', 'porto'),
            'param_name' => 'icon_color',
            'dependency' => array('element' => 'icon_skin', 'value' => array('custom'))
        ));
        vc_add_param('vc_separator', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Background Color', 'porto'),
            'param_name' => 'icon_bg_color',
            'dependency' => array('element' => 'icon_skin', 'value' => array('custom'))
        ));
        vc_add_param('vc_separator', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Border Color', 'porto'),
            'param_name' => 'icon_border_color',
            'dependency' => array('element' => 'icon_skin', 'value' => array('custom'))
        ));
        vc_add_param('vc_separator', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Wrap Border Color', 'porto'),
            'param_name' => 'icon_wrap_border_color',
            'dependency' => array('element' => 'icon_skin', 'value' => array('custom'))
        ));
        vc_add_param('vc_separator', array(
            'type' => 'dropdown',
            'heading' => __('Icon Style', 'porto'),
            'param_name' => 'icon_style',
            'value' => porto_vc_commons('separator_icon_style'),
            'dependency' => array('element' => 'show_icon', 'not_empty' => true)
        ));
        vc_add_param('vc_separator', array(
            'type' => 'dropdown',
            'heading' => __('Icon Position', 'porto'),
            'param_name' => 'icon_pos',
            'value' => porto_vc_commons('separator_icon_pos'),
            'dependency' => array('element' => 'show_icon', 'not_empty' => true)
        ));
        vc_add_param('vc_separator', array(
            'type' => 'dropdown',
            'heading' => __('Icon Size', 'porto'),
            'param_name' => 'icon_size',
            'value' => porto_vc_commons('separator_icon_size'),
            'dependency' => array('element' => 'show_icon', 'not_empty' => true)
        ));
        vc_add_param('vc_separator', array(
            'type' => 'dropdown',
            'heading' => __('Gap Size', 'porto'),
            'param_name' => 'gap',
            'value' => porto_vc_commons('separator')
        ));

        /* ---------------------------- */
        /* Customize Text Separator
        /* ---------------------------- */
        vc_remove_param('vc_text_separator', 'style');
        vc_add_param('vc_text_separator', array(
            'type' => 'dropdown',
            'heading' => __('Style', 'porto'),
            'param_name' => 'style',
            'value' => porto_vc_commons('separator_style')
        ));
        vc_add_param('vc_text_separator', array(
            'type' => 'attach_image',
            'heading' => __('Pattern', 'porto'),
            'param_name' => 'pattern',
            'dependency' => array('element' => 'style', 'value' => array('pattern'))
        ));
        vc_add_param('vc_text_separator', array(
            'type' => 'dropdown',
            'heading' => __('Element Tag', 'porto'),
            'param_name' => 'element',
            'std' => 'h4',
            'value' => porto_vc_commons('separator_elements'),
        ));

        /* ---------------------------- */
        /* Customize Accordion, Accordion Tab
        /* ---------------------------- */
        vc_remove_param('vc_accordion', 'disable_keyboard');
        vc_add_param('vc_accordion', array(
            'type' => 'dropdown',
            'heading' => __('Type', 'porto'),
            'param_name' => 'type',
            'value' => porto_vc_commons('accordion'),
        ));
        vc_add_param('vc_accordion', array(
            'type' => 'dropdown',
            'heading' => __('Size', 'porto'),
            'param_name' => 'size',
            'value' => porto_vc_commons('accordion_size'),
        ));
        vc_add_param('vc_accordion', array(
            'type' => 'dropdown',
            'heading' => __('Skin Color', 'porto'),
            'param_name' => 'skin',
            'std' => 'custom',
            'value' => porto_vc_commons('colors'),
            'admin_label' => true,
            'dependency' => array('element' => 'type', 'value' => array( 'custom' )),
        ));
        vc_add_param('vc_accordion', array(
            'type' => 'colorpicker',
            'heading' => __('Heading Color', 'porto'),
            'param_name' => 'heading_color',
            'dependency' => array('element' => 'skin', 'value' => array( 'custom' )),
        ));
        vc_add_param('vc_accordion', array(
            'type' => 'colorpicker',
            'heading' => __('Heading Background Color', 'porto'),
            'param_name' => 'heading_bg_color',
            'dependency' => array('element' => 'skin', 'value' => array( 'custom' )),
        ));
        vc_add_param('vc_accordion_tab', array(
            'type' => 'checkbox',
            'heading' => __('Show FontAwesome Icon', 'porto'),
            'param_name' => 'show_icon',
            'value' => array(__('Yes, please', 'js_composer') => 'yes'),
        ));
        vc_add_param('vc_accordion_tab', array(
            'type' => 'iconpicker',
            'heading' => __('Select FontAwesome Icon', 'porto'),
            'param_name' => 'icon',
            'dependency' => array('element' => 'show_icon', 'not_empty' => true)
        ));

        /* ---------------------------- */
        /* Customize Toggle
        /* ---------------------------- */
        vc_remove_param('vc_toggle', 'style');
        vc_remove_param('vc_toggle', 'color');
        vc_remove_param('vc_toggle', 'size');
        vc_add_param('vc_toggle', array(
            'type' => 'checkbox',
            'heading' => __('Show FontAwesome Icon', 'porto'),
            'param_name' => 'show_icon',
            'value' => array(__('Yes, please', 'js_composer') => 'yes'),
        ));
        vc_add_param('vc_toggle', array(
            'type' => 'iconpicker',
            'heading' => __('Select FontAwesome Icon', 'porto'),
            'param_name' => 'icon',
            'dependency' => array('element' => 'show_icon', 'not_empty' => true)
        ));

        /* ---------------------------- */
        /* Customize Buttons
        /* ---------------------------- */
        vc_add_param('vc_button', array(
            'type' => 'checkbox',
            'heading' => __('Disable', 'porto'),
            'param_name' => 'disabled',
            'value' => array(__('Disable button.', 'porto') => 'yes')
        ));
        vc_add_param('vc_button', array(
            'type' => 'checkbox',
            'heading' => __('Show as Label', 'porto'),
            'param_name' => 'label',
            'value' => array( __( 'Yes, please', 'js_composer' ) => 'yes' )
        ));
        vc_add_param('vc_btn', array(
            'type' => 'dropdown',
            'heading' => __('Skin Color', 'porto'),
            'param_name' => 'skin',
            'std' => 'custom',
            'value' => porto_vc_commons('colors'),
        ));
        vc_add_param('vc_btn', array(
            'type' => 'dropdown',
            'heading' => __('Contextual Classes', 'porto'),
            'param_name' => 'contextual',
            'value' => porto_vc_commons('contextual'),
        ));
        vc_add_param('vc_btn', array(
            'type' => 'checkbox',
            'heading' => __('Show as Label', 'porto'),
            'param_name' => 'label',
            'value' => array( __( 'Yes, please', 'js_composer' ) => 'yes' )
        ));

        /* ---------------------------- */
        /* Add Single Image Parameters
        /* ---------------------------- */
        vc_add_param('vc_single_image', array(
            'type' => 'checkbox',
            'heading' => __('LightBox', 'porto'),
            'param_name' => 'lightbox',
            'value' => array( __( 'Yes, please', 'js_composer' ) => 'yes' ),
            'dependency' => array('element' => 'img_link_large', 'not_empty' => true),
            'description' => __('Check it if you want to link to the lightbox with the large image.', 'porto')
        ));
        vc_add_param('vc_single_image', array(
            'type' => 'checkbox',
            'heading' => __('Show as Image Gallery', 'porto'),
            'param_name' => 'image_gallery',
            'description' => __('Show all the images inside of same row.', 'porto'),
            'value' => array( __( 'Yes, please', 'js_composer' ) => 'yes' ),
            'dependency' => array('element' => 'img_link_large', 'not_empty' => true)
        ));
        vc_add_param('vc_single_image', array(
            'type' => 'checkbox',
            'heading' => __('Show Zoom Icon', 'porto'),
            'param_name' => 'zoom_icon',
            'value' => array( __( 'Yes, please', 'js_composer' ) => 'yes' ),
            'dependency' => array('element' => 'img_link_large', 'not_empty' => true)
        ));
        vc_add_param('vc_single_image', array(
            'type' => 'checkbox',
            'heading' => __('Show Hover Effect', 'porto'),
            'param_name' => 'hover_effect',
            'value' => array( __( 'Yes, please', 'js_composer' ) => 'yes' ),
            'dependency' => array('element' => 'img_link_large', 'not_empty' => true)
        ));

        /* ---------------------------- */
        /* Customize Progress Bar
        /* ---------------------------- */
        vc_add_param('vc_progress_bar', array(
            'type' => 'dropdown',
            'heading' => __('Contextual Classes', 'porto'),
            'param_name' => 'contextual',
            'value' => porto_vc_commons('contextual'),
            'admin_label' => true
        ));
        vc_add_param('vc_progress_bar', array(
            'type' => 'checkbox',
            'heading' => __('Enable Waypoints Animation', 'porto'),
            'param_name' => 'animation',
            'std' => 'yes',
            'value' => array( __( 'Yes, please', 'js_composer' ) => 'yes' )
        ));
        vc_add_param('vc_progress_bar', array(
            'type' => 'checkbox',
            'heading' => __('Show Percentage as Tooltip', 'porto'),
            'param_name' => 'tooltip',
            'std' => 'yes',
            'value' => array( __( 'Yes, please', 'js_composer' ) => 'yes' )
        ));
        vc_add_param('vc_progress_bar', array(
            'type' => 'dropdown',
            'heading' => __('Border Radius', 'porto'),
            'param_name' => 'border_radius',
            'value' => porto_vc_commons('progress_border_radius')
        ));
        vc_add_param('vc_progress_bar', array(
            'type' => 'dropdown',
            'heading' => __('Size', 'porto'),
            'param_name' => 'size',
            'value' => porto_vc_commons('progress_size')
        ));
        vc_add_param('vc_progress_bar', array(
            'type' => 'textfield',
            'heading' => __('Min Width', 'porto'),
            'description' => 'ex: 2em or 30px, etc',
            'param_name' => 'min_width'
        ));

        /* ---------------------------- */
        /* Customize Pie Chart
        /* ---------------------------- */
        vc_remove_param('vc_pie', 'color');

        // Used in 'Button', 'Call __( 'Blue', 'js_composer' )to Action', 'Pie chart' blocks
        $colors_arr = array(
            __( 'Grey', 'js_composer' ) => 'wpb_button',
            __( 'Blue', 'js_composer' ) => 'btn-primary',
            __( 'Turquoise', 'js_composer' ) => 'btn-info',
            __( 'Green', 'js_composer' ) => 'btn-success',
            __( 'Orange', 'js_composer' ) => 'btn-warning',
            __( 'Red', 'js_composer' ) => 'btn-danger',
            __( 'Black', 'js_composer' ) => 'btn-inverse'
        );

        vc_add_param('vc_pie', array(
            'type' => 'dropdown',
            'heading' => __('Type', 'porto'),
            'param_name' => 'type',
            'std' => 'custom',
            'value' => array(
                __('Porto Circular Bar', 'porto') => 'custom',
                __('VC Pie Chart', 'porto') => 'default',
            ),
            'description' => __( 'Select pie chart type.', 'porto' ),
            'admin_label' => true
        ));
        vc_add_param('vc_pie', array(
            'type' => 'dropdown',
            'heading' => __( 'Bar color', 'porto' ),
            'param_name' => 'color',
            'value' => $colors_arr, //$pie_colors,
            'description' => __( 'Select pie chart color.', 'js_composer' ),
            'dependency' => array('element' => 'type', 'value' => array( 'default' )),
            'param_holder_class' => 'vc_colored-dropdown'
        ));
        vc_add_param('vc_pie', array(
            'type' => 'dropdown',
            'heading' => __('View Type', 'porto'),
            'param_name' => 'view',
            'dependency' => array('element' => 'type', 'value' => array( 'custom' )),
            'value' => porto_vc_commons('circular_view_type')
        ));
        vc_add_param('vc_pie', array(
            'type' => 'iconpicker',
            'heading' => __('Select FontAwesome Icon', 'porto'),
            'param_name' => 'icon',
            'dependency' => array('element' => 'view', 'value' => array('only-icon'))
        ));
        vc_add_param('vc_pie', array(
            'type' => 'colorpicker',
            'heading' => __('Icon Color', 'porto'),
            'param_name' => 'icon_color',
            'dependency' => array('element' => 'view', 'value' => array('only-icon'))
        ));
        vc_add_param('vc_pie', array(
            'type' => 'dropdown',
            'heading' => __('View Size', 'porto'),
            'param_name' => 'view_size',
            'dependency' => array('element' => 'type', 'value' => array( 'custom' )),
            'value' => porto_vc_commons('circular_view_size')
        ));
        vc_add_param('vc_pie', array(
            'type' => 'textfield',
            'heading' => __('Bar Size', 'porto'),
            'param_name' => 'size',
            'std' => 175,
            'dependency' => array('element' => 'type', 'value' => array( 'custom' )),
            'description' => __('Enter the size of the chart in px.', 'porto')
        ));
        vc_add_param('vc_pie', array(
            'type' => 'colorpicker',
            'heading' => __('Track Color', 'porto'),
            'param_name' => 'trackcolor',
            'std' => $dark ? '#2e353e' : '#eeeeee',
            'dependency' => array('element' => 'type', 'value' => array( 'custom' )),
            'description' => __('Choose the color of the track. Please clear this if you want to use the default color.', 'porto')
        ));
        vc_add_param('vc_pie', array(
            'type' => 'colorpicker',
            'heading' => __('Bar color', 'porto'),
            'param_name' => 'barcolor',
            'dependency' => array('element' => 'type', 'value' => array( 'custom' )),
            'description' => __('Select pie chart color. Please clear this if you want to use the default color.', 'porto')
        ));
        vc_add_param('vc_pie', array(
            'type' => 'colorpicker',
            'heading' => __('Scale color', 'porto'),
            'param_name' => 'scalecolor',
            'dependency' => array('element' => 'type', 'value' => array( 'custom' )),
            'description' => __('Choose the color of the scale. Please clear this if you want to hide the scale.', 'porto')
        ));
        vc_add_param('vc_pie', array(
            'type' => 'textfield',
            'heading' => __('Animation Speed', 'porto'),
            'param_name' => 'speed',
            'std' => 2500,
            'dependency' => array('element' => 'type', 'value' => array( 'custom' )),
            'description' => __('Enter the animation speed in milliseconds.', 'porto')
        ));
        vc_add_param('vc_pie', array(
            'type' => 'textfield',
            'heading' => __('Line Width', 'porto'),
            'param_name' => 'line',
            'std' => 14,
            'dependency' => array('element' => 'type', 'value' => array( 'custom' )),
            'description' => __('Enter the width of the line bar in px.', 'porto')
        ));
        vc_add_param('vc_pie', array(
            'type' => 'dropdown',
            'heading' => __('Line Cap', 'porto'),
            'param_name' => 'linecap',
            'std' => 'round',
            'value' => array(__('Round', 'porto') => 'round', __('Square', 'porto') => 'square'),
            'dependency' => array('element' => 'type', 'value' => array( 'custom' )),
            'description' => __('Choose how the ending of the bar line looks like.', 'porto')
        ));
    }
}

if (!function_exists('porto_vc_commons')) {
    function porto_vc_commons($asset = '') {
        switch ($asset) {
            case 'accordion':         return Porto_VcSharedLibrary::getAccordionType();
            case 'accordion_size':    return Porto_VcSharedLibrary::getAccordionSize();
            case 'toggle_type':       return Porto_VcSharedLibrary::getToggleType();
            case 'toggle_size':       return Porto_VcSharedLibrary::getToggleSize();
            case 'align':             return Porto_VcSharedLibrary::getTextAlign();
            case 'tabs':              return Porto_VcSharedLibrary::getTabsPositions();
            case 'tabs_type':         return Porto_VcSharedLibrary::getTabsType();
            case 'tabs_icon_style':   return Porto_VcSharedLibrary::getTabsIconStyle();
            case 'tabs_icon_effect':  return Porto_VcSharedLibrary::getTabsIconEffect();
            case 'tour':              return Porto_VcSharedLibrary::getTourPositions();
            case 'tour_type':         return Porto_VcSharedLibrary::getTourType();
            case 'separator':         return Porto_VcSharedLibrary::getSeparator();
            case 'separator_type':    return Porto_VcSharedLibrary::getSeparatorType();
            case 'separator_style':   return Porto_VcSharedLibrary::getSeparatorStyle();
            case 'separator_icon_style':   return Porto_VcSharedLibrary::getSeparatorIconStyle();
            case 'separator_icon_size':    return Porto_VcSharedLibrary::getSeparatorIconSize();
            case 'separator_icon_pos':     return Porto_VcSharedLibrary::getSeparatorIconPosition();
            case 'separator_elements':     return Porto_VcSharedLibrary::getSeparatorElements();
            case 'blog_layout':            return Porto_VcSharedLibrary::getBlogLayout();
            case 'blog_grid_columns':      return Porto_VcSharedLibrary::getBlogGridColumns();
            case 'portfolio_layout':       return Porto_VcSharedLibrary::getPortfolioLayout();
            case 'portfolio_grid_columns': return Porto_VcSharedLibrary::getPortfolioGridColumns();
            case 'portfolio_grid_view':    return Porto_VcSharedLibrary::getPortfolioGridView();
            case 'products_view_mode':     return Porto_VcSharedLibrary::getProductsViewMode();
            case 'products_columns':       return Porto_VcSharedLibrary::getProductsColumns();
            case 'products_column_width':  return Porto_VcSharedLibrary::getProductsColumnWidth();
            case 'products_addlinks_pos':  return Porto_VcSharedLibrary::getProductsAddlinksPos();
            case 'product_view_mode':      return Porto_VcSharedLibrary::getProductViewMode();
            case 'content_boxes_bg_type':  return Porto_VcSharedLibrary::getContentBoxesBgType();
            case 'content_boxes_style':    return Porto_VcSharedLibrary::getContentBoxesStyle();
            case 'content_box_effect':     return Porto_VcSharedLibrary::getContentBoxEffect();
            case 'colors':                 return Porto_VcSharedLibrary::getColors();
            case 'testimonial_styles':     return Porto_VcSharedLibrary::getTestimonialStyles();
            case 'contextual':             return Porto_VcSharedLibrary::getContextual();
            case 'progress_border_radius': return Porto_VcSharedLibrary::getProgressBorderRadius();
            case 'progress_size':          return Porto_VcSharedLibrary::getProgressSize();
            case 'circular_view_type':     return Porto_VcSharedLibrary::getCircularViewType();
            case 'circular_view_size':     return Porto_VcSharedLibrary::getCircularViewSize();
            case 'section_skin':           return Porto_VcSharedLibrary::getSectionSkin();
            case 'section_color_scale':    return Porto_VcSharedLibrary::getSectionColorScale();
            case 'section_text_color':     return Porto_VcSharedLibrary::getSectionTextColor();
            case 'position':               return Porto_VcSharedLibrary::getPosition();
            case 'size':                   return Porto_VcSharedLibrary::getSize();
            case 'trigger':                return Porto_VcSharedLibrary::getTrigger();
            case 'heading_border_type':    return Porto_VcSharedLibrary::getHeadingBorderType();
            case 'heading_border_size':    return Porto_VcSharedLibrary::getHeadingBorderSize();
            default: return array();
        }
    }
}

if (!class_exists('Porto_VcSharedLibrary')) {

    class Porto_VcSharedLibrary {

        public static function getTextAlign() {
            return array(
                __('None', 'porto') => '',
                __('Left', 'porto' ) => 'left',
                __('Right', 'porto' ) => 'right',
                __('Center', 'porto' ) => 'center',
                __('Justify', 'porto' ) => 'justify'
            );
        }

        public static function getTabsPositions() {
            return array(
                __('Top left', 'porto' ) => '',
                __('Top right', 'porto' ) => 'top-right',
                __('Bottom left', 'porto' ) => 'bottom-left',
                __('Bottom right', 'porto' ) => 'bottom-right',
                __('Top justify', 'porto' ) => 'top-justify',
                __('Bottom justify', 'porto' ) => 'bottom-justify',
                __('Top center', 'porto' ) => 'top-center',
                __('Bottom center', 'porto' ) => 'bottom-center',
            );
        }

        public static function getTabsType() {
            return array(
                __('Default', 'porto' ) => '',
                __('Simple', 'porto' ) => 'tabs-simple'
            );
        }

        public static function getTabsIconStyle() {
            return array(
                __('Default', 'porto' ) => '',
                __('Style 1', 'porto' ) => 'featured-boxes-style-1',
                __('Style 2', 'porto' ) => 'featured-boxes-style-2',
                __('Style 3', 'porto' ) => 'featured-boxes-style-3',
                __('Style 4', 'porto' ) => 'featured-boxes-style-4',
                __('Style 5', 'porto' ) => 'featured-boxes-style-5',
                __('Style 6', 'porto' ) => 'featured-boxes-style-6',
                __('Style 7', 'porto' ) => 'featured-boxes-style-7',
                __('Style 8', 'porto' ) => 'featured-boxes-style-8',
            );
        }

        public static function getTabsIconEffect() {
            return array(
                __('Default', 'porto' ) => '',
                __('Effect 1', 'porto' ) => 'featured-box-effect-1',
                __('Effect 2', 'porto' ) => 'featured-box-effect-2',
                __('Effect 3', 'porto' ) => 'featured-box-effect-3',
                __('Effect 4', 'porto' ) => 'featured-box-effect-4',
                __('Effect 5', 'porto' ) => 'featured-box-effect-5',
                __('Effect 6', 'porto' ) => 'featured-box-effect-6',
                __('Effect 7', 'porto' ) => 'featured-box-effect-7',
            );
        }

        public static function getTourPositions() {
            return array(
                __('Left', 'porto' ) => 'vertical-left',
                __('Right', 'porto' ) => 'vertical-right',
            );
        }

        public static function getTourType() {
            return array(
                __('Default', 'porto' ) => '',
                __('Navigation', 'porto' ) => 'tabs-navigation',
            );
        }

        public static function getSeparator() {
            return array(
                __('Normal', 'porto' ) => '',
                __('Short', 'porto' ) => 'short',
                __('Tall', 'porto' ) => 'tall',
                __('Taller', 'porto' ) => 'taller',
            );
        }

        public static function getSeparatorType() {
            return array(
                __('Normal', 'porto' ) => '',
                __('Small', 'porto' ) => 'small',
            );
        }

        public static function getSeparatorStyle() {
            return array(
                __('Gradient', 'porto' ) => '',
                __('Solid', 'porto' ) => 'solid',
                __('Dashed', 'porto' ) => 'dashed',
                __('Pattern', 'porto' ) => 'pattern',
            );
        }

        public static function getSeparatorIconStyle() {
            return array(
                __('Style 1', 'porto' ) => '',
                __('Style 2', 'porto' ) => 'style-2',
                __('Style 3', 'porto' ) => 'style-3',
                __('Style 4', 'porto' ) => 'style-4',
            );
        }

        public static function getSeparatorIconSize() {
            return array(
                __('Normal', 'porto' ) => '',
                __('Small', 'porto' )  => 'sm',
                __('Large', 'porto' )  => 'lg'
            );
        }

        public static function getSeparatorIconPosition() {
            return array(
                __('Center', 'porto' ) => '',
                __('Left', 'porto' )  => 'left',
                __('Right', 'porto' )  => 'right'
            );
        }

        public static function getSeparatorElements() {
            return array(
                __('h1', 'porto' ) => 'h1',
                __('h2', 'porto' ) => 'h2',
                __('h3', 'porto' ) => 'h3',
                __('h4', 'porto' ) => 'h4',
                __('h5', 'porto' ) => 'h5',
                __('h6', 'porto' ) => 'h6',
                __('p', 'porto' )  => 'p',
                __('div', 'porto' ) => 'div',
            );
        }

        public static function getAccordionType() {
            return array(
                __('Default', 'porto' ) => 'panel-default',
                __('Secondary', 'porto' ) => 'secondary',
                __('Without Background', 'porto' ) => 'without-bg',
                __('Without Borders and Background', 'porto' ) => 'without-bg without-borders',
                __('Custom', 'porto' ) => 'custom',
            );
        }

        public static function getAccordionSize() {
            return array(
                __('Default', 'porto' ) => '',
                __('Small', 'porto' ) => 'panel-group-sm',
                __('Large', 'porto' ) => 'panel-group-lg',
            );
        }

        public static function getToggleType() {
            return array(
                __('Default', 'porto' ) => '',
                __('Simple', 'porto' ) => 'toggle-simple'
            );
        }

        public static function getToggleSize() {
            return array(
                __('Default', 'porto' ) => '',
                __('Small', 'porto' ) => 'toggle-sm',
                __('Large', 'porto' ) => 'toggle-lg',
            );
        }

        public static function getBlogLayout() {
            return array(
                __('Full', 'porto' ) => 'full',
                __('Large', 'porto' ) => 'large',
                __('Large Alt', 'porto' ) => 'large-alt',
                __('Medium', 'porto' ) => 'medium',
                __('Grid', 'porto' ) => 'grid',
                __('Timeline', 'porto' ) => 'timeline'
            );
        }

        public static function getBlogGridColumns() {
            return array(
                __('2', 'porto' ) => '2',
                __('3', 'porto' ) => '3',
                __('4', 'porto' ) => '4'
            );
        }

        public static function getPortfolioLayout() {
            return array(
                __('Grid', 'porto' ) => 'grid',
                __('Timeline', 'porto' ) => 'timeline',
                __('Medium', 'porto' ) => 'medium',
                __('Large', 'porto' ) => 'large',
                __('Full', 'porto' ) => 'full'
            );
        }

        public static function getPortfolioGridColumns() {
            return array(
                __('2', 'porto' ) => '2',
                __('3', 'porto' ) => '3',
                __('4', 'porto' ) => '4',
                __('5', 'porto' ) => '5',
                __('6', 'porto' ) => '6'
            );
        }

        public static function getPortfolioGridView() {
            return array(
                __('Classic', 'porto' ) => '',
                __('Full', 'porto' ) => 'full'
            );
        }

        public static function getProductsViewMode() {
            return array(
                __( 'Grid', 'porto' )=> 'grid',
                __( 'List', 'porto' ) => 'list',
                __( 'Slider', 'porto' )  => 'products-slider',
            );
        }

        public static function getProductsColumns() {
            return array(
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7 ' . __( '(without sidebar)', 'porto' ) => 7,
                '8 ' . __( '(without sidebar)', 'porto' ) => 8
            );
        }

        public static function getProductsColumnWidth() {
            return array(
                __( 'Default', 'porto' ) => '',
                '1/1' . __( ' of content width', 'porto' ) => 1,
                '1/2' . __( ' of content width', 'porto' ) => 2,
                '1/3' . __( ' of content width', 'porto' ) => 3,
                '1/4' . __( ' of content width', 'porto' ) => 4,
                '1/5' . __( ' of content width', 'porto' ) => 5,
                '1/6' . __( ' of content width', 'porto' ) => 6,
                '1/7' . __( ' of content width (without sidebar)', 'porto' ) => 7,
                '1/8' . __( ' of content width (without sidebar)', 'porto' ) => 8
            );
        }

        public static function getProductsAddlinksPos() {
            return array(
                __( 'Default', 'porto' ) => '',
                __( 'Out of Image', 'porto' ) => 'outimage',
                __( 'On Image', 'porto' ) => 'onimage'
            );
        }

        public static function getProductViewMode() {
            return array(
                __( 'Grid', 'porto' )=> 'grid',
                __( 'List', 'porto' ) => 'list',
            );
        }

        public static function getColors() {
            return array(
                '' => 'custom',
                __( 'Primary', 'porto' ) => 'primary',
                __( 'Secondary', 'porto' ) => 'secondary',
                __( 'Tertiary', 'porto' ) => 'tertiary',
                __( 'Quaternary', 'porto' ) => 'quaternary',
                __( 'Dark', 'porto' ) => 'dark',
                __( 'Light', 'porto' ) => 'light',
            );
        }

        public static function getContentBoxesBgType() {
            return array(
                __( 'Default', 'porto' )=> '',
                __( 'Flat', 'porto' ) => 'featured-boxes-flat',
                __( 'Custom', 'porto' ) => 'featured-boxes-custom',
            );
        }

        public static function getContentBoxesStyle() {
            return array(
                __('Default', 'porto' ) => '',
                __('Style 1', 'porto' ) => 'featured-boxes-style-1',
                __('Style 2', 'porto' ) => 'featured-boxes-style-2',
                __('Style 3', 'porto' ) => 'featured-boxes-style-3',
                __('Style 4', 'porto' ) => 'featured-boxes-style-4',
                __('Style 5', 'porto' ) => 'featured-boxes-style-5',
                __('Style 6', 'porto' ) => 'featured-boxes-style-6',
                __('Style 7', 'porto' ) => 'featured-boxes-style-7',
                __('Style 8', 'porto' ) => 'featured-boxes-style-8',
            );
        }

        public static function getContentBoxEffect() {
            return array(
                __('Default', 'porto' ) => '',
                __('Effect 1', 'porto' ) => 'featured-box-effect-1',
                __('Effect 2', 'porto' ) => 'featured-box-effect-2',
                __('Effect 3', 'porto' ) => 'featured-box-effect-3',
                __('Effect 4', 'porto' ) => 'featured-box-effect-4',
                __('Effect 5', 'porto' ) => 'featured-box-effect-5',
                __('Effect 6', 'porto' ) => 'featured-box-effect-6',
                __('Effect 7', 'porto' ) => 'featured-box-effect-7',
            );
        }

        public static function getTestimonialStyles() {
            return array(
                __('Style 1', 'porto' ) => '',
                __('Style 2', 'porto' ) => 'testimonial-style-2',
                __('Style 3', 'porto' ) => 'testimonial-style-3',
                __('Style 4', 'porto' ) => 'testimonial-style-4',
                __('Style 5', 'porto' ) => 'testimonial-style-5',
                __('Style 6', 'porto' ) => 'testimonial-style-6',
            );
        }

        public static function getContextual() {
            return array(
                __('None', 'porto' )    => '',
                __('Success', 'porto' ) => 'success',
                __('Info', 'porto' )    => 'info',
                __('Warning', 'porto' ) => 'warning',
                __('Danger', 'porto' )  => 'danger',
            );
        }

        public static function getProgressBorderRadius() {
            return array(
                __('Default', 'porto' )               => '',
                __('No Border Radius', 'porto' )      => 'no-border-radius',
                __('Rounded Border Radius', 'porto' ) => 'border-radius',
                __('Circled Border Radius', 'porto' ) => 'circled-border-radius',
            );
        }

        public static function getProgressSize() {
            return array(
                __('Normal', 'porto' ) => '',
                __('Small', 'porto' )  => 'sm',
                __('Large', 'porto' )  => 'lg'
            );
        }

        public static function getCircularViewType() {
            return array(
                __('Show Title and Value', 'porto' ) => '',
                __('Show Only Icon', 'porto' )  => 'only-icon',
                __('Show Only Title', 'porto' )  => 'single-line'
            );
        }

        public static function getCircularViewSize() {
            return array(
                __('Normal', 'porto' ) => '',
                __('Small', 'porto' )  => 'sm',
                __('Large', 'porto' )  => 'lg'
            );
        }

        public static function getSectionSkin() {
            return array(
                __('Default', 'porto')    => 'default',
                __('Transparent', 'porto')    => 'parallax',
                __('Primary', 'porto')    => 'primary',
                __('Secondary', 'porto')  => 'secondary',
                __('Tertiary', 'porto')   => 'tertiary',
                __('Quaternary', 'porto') => 'quaternary',
                __('Dark', 'porto')       => 'dark',
                __('Light', 'porto')      => 'light',
            );
        }

        public static function getSectionColorScale() {
            return array(
                __('Default', 'porto') => '',
                __('Scale 1', 'porto') => 'scale-1',
                __('Scale 2', 'porto') => 'scale-2',
                __('Scale 3', 'porto') => 'scale-3',
                __('Scale 4', 'porto') => 'scale-4',
                __('Scale 5', 'porto') => 'scale-5',
                __('Scale 6', 'porto') => 'scale-6',
                __('Scale 7', 'porto') => 'scale-7',
                __('Scale 8', 'porto') => 'scale-8',
                __('Scale 9', 'porto') => 'scale-9',
            );
        }

        public static function getSectionTextColor() {
            return array(
                __('Default', 'porto') => '',
                __('Dark', 'porto')    => 'dark',
                __('Light', 'porto')   => 'light',
            );
        }

        public static function getPosition() {
            return array(
                __('Top', 'porto')     => 'top',
                __('Right', 'porto')   => 'right',
                __('Bottom', 'porto')  => 'bottom',
                __('Left', 'porto')    => 'left',
            );
        }

        public static function getSize() {
            return array(
                __('Normal', 'porto')      => '',
                __('Large', 'porto')       => 'lg',
                __('Small', 'porto')       => 'sm',
                __('Extra Small', 'porto') => 'xs',
            );
        }

        public static function getTrigger() {
            return array(
                __('Click', 'porto')      => 'click',
                __('Hover', 'porto')      => 'hover',
                __('Focus', 'porto')      => 'focus',
            );
        }

        public static function getHeadingBorderType() {
            return array(
                __('Bottom Border', 'porto')          => 'bottom-border',
                __('Bottom Double Border', 'porto')   => 'bottom-double-border',
                __('Middle Border', 'porto')          => 'middle-border',
                __('Middle Border Reverse', 'porto')  => 'middle-border-reverse',
                __('Middle Border Center', 'porto')   => 'middle-border-center',
            );
        }

        public static function getHeadingBorderSize() {
            return array(
                __('Normal', 'porto')       => '',
                __('Extra Small', 'porto')  => 'xs',
                __('Small', 'porto')        => 'sm',
                __('Large', 'porto')        => 'lg',
                __('Extra Large', 'porto')  => 'xl',
            );
        }
    }
}