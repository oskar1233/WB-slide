<div class="wrap">
  <h1><?php _e('Settings') ?></h1>
  <form method="post" action="options.php">

<?php
settings_fields('wbslide_option_group');
do_settings_sections('wbslide-admin');
submit_button();
?>

</form>
</div>
