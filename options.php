<?php

add_action('admin_menu', 'wbslide_add_plugin_page');
add_action('admin_init', 'wbslide_page_init');

function wbslide_add_plugin_page() {
  add_options_page(
    'Settings Admin',
    __('WB-Slide settings', 'wb-slide'),
    'manage_options',
    'wbslide-admin',
    'wbslide_create_admin_page'
  );
}

function wbslide_page_init() {
  register_setting(
    'wbslide_option_group',
    'wbslide_option',
    'wbslide_sanitize',
    'wbslide-admin'
  );

  add_settings_section(
    'wbslide_section_id',
    __('WB-Slide settings', 'wb-slide'),
    'wbslide_section_info',
    'wbslide-admin'
  );

  add_settings_field(
    'indicators',
    __('Indicators', 'wb-slide'),
    'wbslide_indicators_callback',
    'wbslide-admin',
    'wbslide_section_id'
  );

  add_settings_field(
    'arrows',
    __('Arrows', 'wb-slide'),
    'wbslide_arrows_callback',
    'wbslide-admin',
    'wbslide_section_id'
  );

  add_settings_field(
    'title',
    __('Title', 'wb-slide'),
    'wbslide_title_callback',
    'wbslide-admin',
    'wbslide_section_id'
  );

  add_settings_field(
    'excerpt',
    __('Excerpt', 'wb-slide'),
    'wbslide_excerpt_callback',
    'wbslide-admin',
    'wbslide_section_id'
  );
}

function wbslide_create_admin_page() {
  $wbslide_options = get_option('wbslide_option');

  include('tpl/admin_page.php');
}

function wbslide_sanitize($input) {
  $new_input = [];
  if(isset($input['indicators'])) {
    $new_input['indicators'] = $input['indicators'];
  }
  if(isset($input['arrows'])) {
    $new_input['arrows'] = $input['arrows'];
  }
  if(isset($input['title'])) {
    $new_input['title'] = $input['title'];
  }
  if(isset($input['excerpt'])) {
    $new_input['excerpt'] = $input['excerpt'];
  }

  return $new_input;
}

function wbslide_section_info() {
  _e("Adjust WB-Slide parameters to your needs.");
}

function wbslide_indicators_callback() {
  $wbslide_options = get_option('wbslide_option');

  $checked = isset($wbslide_options['indicators']) ? ' checked' : '';
  echo '<input type="checkbox" id="wbslide_indicators" name="wbslide_option[indicators]"' . $checked . '/>';
}

function wbslide_arrows_callback() {
  $wbslide_options = get_option('wbslide_option');

  $checked = isset($wbslide_options['arrows']) ? ' checked' : '';
  echo '<input type="checkbox" id="wbslide_arrows" name="wbslide_option[arrows]"' . $checked . '/>';
}

function wbslide_title_callback() {
  $wbslide_options = get_option('wbslide_option');

  $checked = isset($wbslide_options['title']) ? ' checked' : '';
  echo '<input type="checkbox" id="wbslide_title" name="wbslide_option[title]"' . $checked . '/>';
}

function wbslide_excerpt_callback() {
  $wbslide_options = get_option('wbslide_option');

  $checked = isset($wbslide_options['excerpt']) ? ' checked' : '';
  echo '<input type="checkbox" id="wbslide_excerpt" name="wbslide_option[excerpt]"' . $checked . '/>';
}
