<?php

function wbslide_echo_slider() { 
  $posts = get_posts([
    'meta_key' => '_wbslide_slide',
    'meta_value' => '1'
  ]);

  $indicators = true;
  $arrows = true;

  $title = true;
  $excerpt = false;

  $slidesNo = count($posts);
?>

<div id='wbslideSlider' class='carousel slide d-block' data-ride='carousel'>
  <?php if($indicators): ?>
  <ol class='carousel-indicators'>
    <?php for($i = 0; $i < $slidesNo; ++$i): ?>
    <li data-target='#wbslideSlider' data-slide-to='<?= $i ?>' <?php if($i == 0) echo "class='active'"; ?>></li>
    <?php endfor; ?>
  </ol>
  <?php endif; ?>

  <div class='carousel-inner' role='listbox'>
    <?php foreach($posts as $i => $post): ?>

    <div class='carousel-item <?php if($i == 0) echo 'active'; ?>'>
      <img class='img-fluid' src='<?= get_the_post_thumbnail_url($post); ?>' alt='Slide <?= $i ?>'/>

      <?php if($title || $excerpt): ?>
      <div class='carousel-caption'>
        <?php if($title): ?>
        <h2><?= get_the_title($post); ?></h2>
        <?php endif; ?>
        <?php if($excerpt): ?>
        <p><?= get_the_excerpt($post); ?></p>
        <?php endif; ?>
      </div>
      <?php endif; ?>
    </div>

    <?php endforeach; ?>
  </div>

  <?php if($arrows): ?>
  <a class="carousel-control-prev" href="#wbslideSlider" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only"><?php _e('Previous', 'wb-slide'); ?></span>
  </a>
  <a class="carousel-control-next" href="#wbslideSlider" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only"><?php _e('Next', 'wb-slide'); ?></span>
  </a>
  <?php endif; ?>
</div>

<?php
}
