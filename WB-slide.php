<?php

/*
 * Plugin Name: WB-slide
 * Author: oskar1233
 * Text Domain: wb-slide
 * Description: Bootstrap slider with per-post checkbox
 */

if(is_admin()) {
  require_once(dirname(__FILE__) . "/admin.php");
  require_once(dirname(__FILE__) . "/options.php");
}

require_once(dirname(__FILE__) . "/front.php");

add_action('wp_enqueue_scripts', 'wbslide_enqueue_styles');

function wbslide_enqueue_styles() {
  wp_enqueue_style('wbslide-carousel-fix', plugins_url('/styles/main.min.css', __FILE__));
}
