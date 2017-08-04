<?php

add_shortcode('wbslide_slider', 'wbslide_echo_slider');

/**
 * Echoes slider
 */
function wbslide_echo_slider($attrs) { 
  $posts = get_posts([
    'meta_key' => '_wbslide_slide',
    'meta_value' => '1'
  ]);

  $slidesNo = count($posts);

  $attrs = shortcode_atts(get_option('wbslide_option'), $posts);

  include('tpl/slide.php');
}
