<?php

/*
Plugin Name: Sitex
Plugin URI: http://www.creativepulse.gr/en/appstore/sitex
Version: 1.0
Description: Outputs simple text, HTML, JavaScript etc.
License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
Author: Creative Pulse
Author URI: http://www.creativepulse.gr
*/


class Sitex extends WP_Widget {

    function __construct() {
        $options = array('classname' => 'Sitex', 'description' => 'Sitex outputs simple text, HTML, JavaScript content');
        $this->WP_Widget('Sitex', 'Sitex', $options);
    }

    function widget($args, $instance) {
        echo $args['before_widget'];
        echo empty($instance['title']) ? '' : $args['before_title']. $instance['title'] . $args['after_title'] . "\n";
        echo $instance['input'];
        echo $args['after_widget'];
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['input'] = $new_instance['input'];
        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => '', 'input' => ''));
        echo
'<p><label for="' . $this->get_field_id('title') . '">' . __('Title') . ':</label>
    <input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . attribute_escape($instance['title']) . '" />
</p>
<p><label for="' . $this->get_field_id('input') . '">' . __('Input') . ':</label>
    <textarea class="widefat" id="' . $this->get_field_id('input') . '" name="' . $this->get_field_name('input') . '">' . attribute_escape($instance['input']) . '</textarea>
</p>
';
    }

}

function Sitex_register_widgets() {
    register_widget('Sitex');
}

add_action('widgets_init', 'Sitex_register_widgets');

?>