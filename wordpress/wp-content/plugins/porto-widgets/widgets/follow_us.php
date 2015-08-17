<?php
add_action('widgets_init', 'porto_follow_us_load_widgets');

function porto_follow_us_load_widgets() {
    register_widget('Porto_Follow_Us_Widget');
}

class Porto_Follow_Us_Widget extends WP_Widget {

    function Porto_Follow_Us_Widget() {

        $widget_ops = array('classname' => 'follow-us', 'description' => __('Add Social Links.', 'porto-widgets'));

        $control_ops = array('id_base' => 'follow-us-widget');

        $this->WP_Widget('follow-us-widget', __('Porto: Follow Us', 'porto-widgets'), $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $follow_before = $instance['follow_before'];
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $rss = $instance['rss'];
        $pinterest = $instance['pinterest'];
        $youtube = $instance['youtube'];
        $instagram = $instance['instagram'];
        $skype = $instance['skype'];
        $linkedin = $instance['linkedin'];
        $googleplus = $instance['googleplus'];
        $follow_after = $instance['follow_after'];

        echo $before_widget;

        if ($title) {
            echo $before_title . $title . $after_title;
        }
        ?>
        <div class="share-links">
            <?php if ($follow_before) : ?><p><?php echo force_balance_tags($follow_before) ?></p><?php endif; ?>
            <?php
            if ($facebook) :
                ?><a href="<?php echo esc_url($facebook) ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="<?php echo __('Facebook', 'porto-widgets') ?>" class="share-facebook"><?php echo __('Facebook', 'porto-widgets') ?></a><?php
            endif;

            if ($twitter) :
                ?><a href="<?php echo esc_url($twitter) ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="<?php echo __('Twitter', 'porto-widgets') ?>" class="share-twitter"><?php echo __('Twitter', 'porto-widgets') ?></a><?php
            endif;

            if ($rss) :
                ?><a href="<?php echo esc_url($rss) ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="<?php echo __('RSS', 'porto-widgets') ?>" class="share-rss"><?php echo __('RSS', 'porto-widgets') ?></a><?php
            endif;

            if ($pinterest) :
                ?><a href="<?php echo esc_url($pinterest) ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="<?php echo __('Pinterest', 'porto-widgets') ?>" class="share-pinterest"><?php echo __('Pinterest', 'porto-widgets') ?></a><?php
            endif;

            if ($youtube) :
                ?><a href="<?php echo esc_url($youtube) ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="<?php echo __('Youtube', 'porto-widgets') ?>" class="share-youtube"><?php echo __('Youtube', 'porto-widgets') ?></a><?php
            endif;

            if ($instagram) :
                ?><a href="<?php echo esc_url($instagram) ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="<?php echo __('Instagram', 'porto-widgets') ?>" class="share-instagram"><?php echo __('Instagram', 'porto-widgets') ?></a><?php
            endif;

            if ($skype) :
                ?><a href="<?php echo esc_url($skype) ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="<?php echo __('Skype', 'porto-widgets') ?>" class="share-skype"><?php echo __('Skype', 'porto-widgets') ?></a><?php
            endif;

            if ($linkedin) :
                ?><a href="<?php echo esc_url($linkedin) ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="<?php echo __('Linkedin', 'porto-widgets') ?>" class="share-linkedin"><?php echo __('Linkedin', 'porto-widgets') ?></a><?php
            endif;

            if ($googleplus) :
                ?><a href="<?php echo esc_url($googleplus) ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="<?php echo __('Google +', 'porto-widgets') ?>" class="share-googleplus"><?php echo __('Google +', 'porto-widgets') ?></a><?php
            endif;
            ?>
            <?php if ($follow_after) : ?><p><?php echo force_balance_tags($follow_after) ?></p><?php endif; ?>
        </div>

        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['follow_before'] = $new_instance['follow_before'];
        $instance['facebook'] = $new_instance['facebook'];
        $instance['twitter'] = $new_instance['twitter'];
        $instance['rss'] = $new_instance['rss'];
        $instance['pinterest'] = $new_instance['pinterest'];
        $instance['youtube'] = $new_instance['youtube'];
        $instance['instagram'] = $new_instance['instagram'];
        $instance['skype'] = $new_instance['skype'];
        $instance['linkedin'] = $new_instance['linkedin'];
        $instance['googleplus'] = $new_instance['googleplus'];
        $instance['follow_after'] = $new_instance['follow_after'];

        return $instance;
    }

    function form($instance) {
        $defaults = array('title' => __('Follow Us', 'porto-widgets'), 'follow_before' => '', 'facebook' => '', 'twitter' => '', 'rss' => '', 'pinterest' => '', 'youtube' => '', 'instagram' => '', 'skype' => '', 'linkedin' => '', 'googleplus' => '', 'follow_after' => '');
        $instance = wp_parse_args((array) $instance, $defaults); ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <strong><?php echo __('Title', 'porto-widgets') ?>:</strong>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php if (isset($instance['title'])) echo $instance['title']; ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('follow_before'); ?>">
                <strong><?php echo __('Before Description', 'porto-widgets') ?>:</strong>
                <textarea class="widefat" id="<?php echo $this->get_field_id('follow_before'); ?>" name="<?php echo $this->get_field_name('follow_before'); ?>"><?php if (isset($instance['follow_before'])) echo $instance['follow_before']; ?></textarea>
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>">
                <strong><?php echo __('Facebook', 'porto-widgets') ?>:</strong>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php if (isset($instance['facebook'])) echo $instance['facebook']; ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>">
                <strong><?php echo __('Twitter', 'porto-widgets') ?>:</strong>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php if (isset($instance['twitter'])) echo $instance['twitter']; ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('rss'); ?>">
                <strong><?php echo __('RSS', 'porto-widgets') ?>:</strong>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" value="<?php if (isset($instance['rss'])) echo $instance['rss']; ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('pinterest'); ?>">
                <strong><?php echo __('Pinterest', 'porto-widgets') ?>:</strong>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" value="<?php if (isset($instance['pinterest'])) echo $instance['pinterest']; ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('youtube'); ?>">
                <strong><?php echo __('Youtube', 'porto-widgets') ?>:</strong>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" value="<?php if (isset($instance['youtube'])) echo $instance['youtube']; ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('instagram'); ?>">
                <strong><?php echo __('Instagram', 'porto-widgets') ?>:</strong>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" value="<?php if (isset($instance['instagram'])) echo $instance['instagram']; ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('skype'); ?>">
                <strong><?php echo __('Skype', 'porto-widgets') ?>:</strong>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('skype'); ?>" name="<?php echo $this->get_field_name('skype'); ?>" value="<?php if (isset($instance['skype'])) echo $instance['skype']; ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('linkedin'); ?>">
                <strong><?php echo __('Linkedin', 'porto-widgets') ?>:</strong>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" value="<?php if (isset($instance['linkedin'])) echo $instance['linkedin']; ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('googleplus'); ?>">
                <strong><?php echo __('Google +', 'porto-widgets') ?>:</strong>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('googleplus'); ?>" name="<?php echo $this->get_field_name('googleplus'); ?>" value="<?php if (isset($instance['googleplus'])) echo $instance['googleplus']; ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('follow_after'); ?>">
                <strong><?php echo __('After Description', 'porto-widgets') ?>:</strong>
                <textarea class="widefat" id="<?php echo $this->get_field_id('follow_after'); ?>" name="<?php echo $this->get_field_name('follow_after'); ?>"><?php if (isset($instance['follow_after'])) echo $instance['follow_after']; ?></textarea>
            </label>
        </p>
    <?php
    }
}
?>