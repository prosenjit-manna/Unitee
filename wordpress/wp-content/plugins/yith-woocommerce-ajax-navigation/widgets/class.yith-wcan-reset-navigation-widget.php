<?php
/**
 * Main class
 *
 * @author  Your Inspiration Themes
 * @package YITH WooCommerce Ajax Navigation
 * @version 1.3.2
 */

if ( ! defined( 'YITH_WCAN' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'YITH_WCAN_Reset_Navigation_Widget' ) ) {
    /**
     * YITH WooCommerce Ajax Navigation Widget
     *
     * @since 1.0.0
     */
    class YITH_WCAN_Reset_Navigation_Widget extends WP_Widget {

        function __construct() {
            $widget_ops  = array( 'classname' => 'yith-woo-ajax-reset-navigation yith-woo-ajax-navigation woocommerce widget_layered_nav', 'description' => __( 'Reset all filters set by YITH WooCommerce Ajax Product Filter', 'yith_wc_ajxnav' ) );
            $control_ops = array( 'width' => 400, 'height' => 350 );
            parent::__construct( 'yith-woo-ajax-reset-navigation', __( 'YITH WooCommerce Ajax Reset Filter', 'yith_wc_ajxnav' ), $widget_ops, $control_ops );
        }


        function widget( $args, $instance ) {
            global $_chosen_attributes, $woocommerce, $_attributes_array;

            extract( $args );

            $attributes_array = ! empty( $_attributes_array ) ? $_attributes_array : array();

            if ( ! is_post_type_archive( 'product' ) && ! is_tax( array_merge( $attributes_array, apply_filters( 'yith_wcan_product_taxonomy_type', array( 'product_cat', 'product_tag' ) ) ) ) ) {
                return;
            }

            // Price
            $min_price = isset( $_GET['min_price'] ) ? esc_attr( $_GET['min_price'] ) : 0;
            $max_price = isset( $_GET['max_price'] ) ? esc_attr( $_GET['max_price'] ) : 0;

            ob_start();

            if ( count( $_chosen_attributes ) > 0 || $min_price > 0 || $max_price > 0 || apply_filters( 'yith_woocommerce_reset_filters_attributes', false ) ) {
                $title = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) : '';
                $label = isset( $instance['label'] ) ? apply_filters( 'yith-wcan-reset-navigation-label', $instance['label'], $instance, $this->id_base ) : '';

                //clean the url
                $link = yit_curPageURL();
                foreach ( (array) $_chosen_attributes as $taxonomy => $data ) {
                    $taxonomy_filter = str_replace( 'pa_', '', $taxonomy );
                    $link            = remove_query_arg( 'filter_' . $taxonomy_filter, $link );
                }

                $link = remove_query_arg( array( 'min_price', 'max_price', 'product_tag' ), $link );

                $link = apply_filters( 'yith_woocommerce_reset_filter_link', $link );

                echo $before_widget;
                if ( $title ) {
                    echo $before_title . $title . $after_title;
                }
                $button_class = apply_filters( 'yith-wcan-reset-navigation-button-class', "yith-wcan-reset-navigation button" );
                echo "<div class='yith-wcan'><a class='{$button_class}' href='{$link}'>" . __( $label, 'yith_wc_ajxnav' ) . "</a></div>";
                echo $after_widget;
                echo ob_get_clean();
            }
            else {
                ob_end_clean();
                echo substr( $before_widget, 0, strlen( $before_widget ) - 1 ) . ' style="display:none">' . $after_widget;
            }
        }


        function form( $instance ) {
            global $woocommerce;

            $defaults = array(
                'title' => '',
                'label' => __( 'Reset All Filters', 'yith_wc_ajxnav' )
            );

            $instance = wp_parse_args( (array) $instance, $defaults ); ?>

            <p>
                <label>
                    <strong><?php _e( 'Title', 'yith_wc_ajxnav' ) ?>:</strong><br />
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
                </label>
            </p>
            <p>
                <label>
                    <strong><?php _e( 'Button Label', 'yith_wc_ajxnav' ) ?>:</strong><br />
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'label' ); ?>" name="<?php echo $this->get_field_name( 'label' ); ?>" value="<?php echo $instance['label']; ?>" />
                </label>
            </p>

        <?php
        }

        function update( $new_instance, $old_instance ) { var_dump( $new_instance );
            $instance = $old_instance;
            $instance['title'] = strip_tags( $new_instance['title'] );
            $instance['label'] = strip_tags( $new_instance['label'] );

            return $instance;
        }

    }
}