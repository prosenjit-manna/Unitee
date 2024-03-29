<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $style
 * @var $shape
 * @var $color
 * @var $custom_background
 * @var $custom_text
 * @var $size
 * @var $align
 * @var $link
 * @var $title
 * @var $button_block
 * @var $el_class
 * @var $outline_custom_color
 * @var $outline_custom_hover_background
 * @var $outline_custom_hover_text
 * @var $add_icon
 * @var $i_align
 * @var $i_type
 * @var $i_icon_fontawesome
 * @var $i_icon_openiconic
 * @var $i_icon_typicons
 * @var $i_icon_entypo
 * @var $i_icon_linecons
 * @var $i_icon_pixelicons
 * @var $css_animation
 *
 * Extra Params
 * @var $skin
 * @var $contextual
 * @var $label
 *
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Btn
 */
$a_href = $a_title = $a_target = '';
$styles = array();
$icon_wrapper = false;
$icon_html = false;
$attributes = array();

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
//parse link
$link = ( '||' === $link ) ? '' : $link;
$link = vc_build_link( $link );
$use_link = false;
if ( strlen( $link['url'] ) > 0 ) {
    $use_link = true;
    $a_href = $link['url'];
    $a_title = $link['title'];
    $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
}

$wrapper_classes = array(
    'vc_btn3-container',
    $this->getExtraClass( $el_class ),
    $this->getCSSAnimation( $css_animation ),
    'vc_btn3-' . $align
);

if ($contextual || 'custom' !== $skin) {
    $button_classes = array(
        'vc_btn3',
        'vc_btn3-shape-' . $shape
    );
} else {
    $button_classes = array(
        'vc_general',
        'vc_btn3',
        'vc_btn3-size-' . $size,
        'vc_btn3-shape-' . $shape,
        'vc_btn3-style-' . $style
    );
}

$button_html = $title;

if ( '' === trim( $title ) ) {
    $button_classes[] = 'vc_btn3-o-empty';
    $button_html = '<span class="vc_btn3-placeholder">&nbsp;</span>';
}
if ( 'true' == $button_block && 'inline' !== $align ) {
    $button_classes[] = 'vc_btn3-block';
}
if ( 'true' === $add_icon ) {
    $button_classes[] = 'vc_btn3-icon-' . $i_align;
    vc_icon_element_fonts_enqueue( $i_type );

    if ( isset( ${"i_icon_" . $i_type} ) ) {
        if ( 'pixelicons' === $i_type ) {
            $icon_wrapper = true;
        }
        $icon_class = ${"i_icon_" . $i_type};
    } else {
        $icon_class = 'fa fa-adjust';
    }

    if ( $icon_wrapper ) {
        $icon_html = '<i class="vc_btn3-icon"><span class="vc_btn3-icon-inner ' . esc_attr( $icon_class ) . '"></span></i>';
    } else {
        $icon_html = '<i class="vc_btn3-icon ' . esc_attr( $icon_class ) . '"></i>';
    }

    if ( 'left' === $i_align ) {
        $button_html = $icon_html . ' ' . $button_html;
    } else {
        $button_html .= ' ' . $icon_html;
    }
}

if (!($contextual || 'custom' !== $skin)) {
    if ( 'custom' === $style ) {
        if ( $custom_background ) {
            $styles[] = vc_get_css_color( 'background-color', $custom_background );
        }

        if ( $custom_text ) {
            $styles[] = vc_get_css_color( 'color', $custom_text );
        }

        if ( ! $custom_background && ! $custom_text ) {
            $button_classes[] = 'vc_btn3-color-grey';
        }
    } else if ( 'outline-custom' === $style ) {
        if ( $outline_custom_color ) {
            $styles[] = vc_get_css_color( 'border-color', $outline_custom_color );
            $styles[] = vc_get_css_color( 'color', $outline_custom_color );
            $attributes[] = 'onmouseleave="this.style.borderColor=\'' . $outline_custom_color . '\'; this.style.backgroundColor=\'transparent\'; this.style.color=\'' . $outline_custom_color . '\'"';
        } else {
            $attributes[] = 'onmouseleave="this.style.borderColor=\'\'; this.style.backgroundColor=\'transparent\'; this.style.color=\'\'"';
        }

        $onmouseenter = array();
        if ( $outline_custom_hover_background ) {
            $onmouseenter[] = 'this.style.borderColor=\'' . $outline_custom_hover_background . '\';';
            $onmouseenter[] = 'this.style.backgroundColor=\'' . $outline_custom_hover_background . '\';';
        }
        if ( $outline_custom_hover_text ) {
            $onmouseenter[] = 'this.style.color=\'' . $outline_custom_hover_text . '\';';
        }
        if ( $onmouseenter ) {
            $attributes[] = 'onmouseenter="' . implode( ' ', $onmouseenter ) . '"';
        }

        if ( ! $outline_custom_color && ! $outline_custom_hover_background && ! $outline_custom_hover_text ) {
            $button_classes[] = 'vc_btn3-color-inverse';

            foreach ( $button_classes as $k => $v ) {
                if ( 'vc_btn3-style-outline-custom' === $v ) {
                    unset( $button_classes[ $k ] );
                    break;
                }
            }
            $button_classes[] = 'vc_btn3-style-outline';
        }
    } else {
        $button_classes[] = 'vc_btn3-color-' . $color;
    }
}

if ($label)
    $button_classes[] = 'vc_label';

if ( $styles ) {
    $attributes[] = 'style="' . implode( ' ', $styles ) . '"';
}

$wrapper_classes = esc_attr( apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $wrapper_classes ) ), $this->settings['base'], $atts ) );

if ( $button_classes ) {
    if ($contextual || 'custom' !== $skin) {
        if ($label) {
            $button_classes[] = 'label';
            $button_classes[] = 'label-' . $size;
        } else {
            $button_classes[] = 'btn';
            switch ($style) {
                case 'outline':
                    $button_classes[] = 'btn-borders';
                    break;
                case '3d':
                    $button_classes[] = 'btn-3d';
                    break;
            }
            switch ($style) {
                case 'outline':
                    $button_classes[] = 'btn-borders';
                    break;
                case '3d':
                    $button_classes[] = 'btn-3d';
                    break;
            }
            $button_classes[] = 'btn-' . $size;
        }
        if ($contextual) {
            if ($label) {
                $button_classes[] = 'label-' . $contextual;
            } else {
                $button_classes[] = 'btn-' . $contextual;
            }
        }
        else if ('custom' !== $skin) {
            if ($label) {
                $button_classes[] = 'label-' . $skin;
            } else {
                $button_classes[] = 'btn-' . $skin;
            }
        }
    }
    $button_classes = esc_attr( apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $button_classes ) ), $this->settings['base'], $atts ) );
    $attributes[] = 'class="' . trim( $button_classes ) . '"';
}

if ( $use_link ) {
    $attributes[] = 'href="' . esc_url( trim( $a_href ) ) . '"';
    $attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
    $attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
}

$attributes = implode( ' ', $attributes );

?>
    <div class="<?php echo trim( $wrapper_classes ); ?>"><?php if ( $use_link ) {
    echo '<a ' . $attributes . '>' . $button_html . '</a>';
} else {
    echo '<button ' . $attributes . '>' . $button_html . '</button>';
} ?></div><?php echo $this->endBlockComment( $this->getShortcode() );