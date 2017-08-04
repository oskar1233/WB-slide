<div id='wbslideSlider' class='carousel slide d-block' data-ride='carousel'>
  <?php if(isset($attrs['indicators'])): ?>
  <ol class='carousel-indicators'>
    <?php for($i = 0; $i < $slidesNo; ++$i): ?>
    <li data-target='#wbslideSlider' data-slide-to='<?= $i ?>' <?php if($i == 0) echo "class='active'"; ?>></li>
    <?php endfor; ?>
  </ol>
  <?php endif; ?>

  <div class='carousel-inner' role='listbox'>
    <?php foreach($posts as $i => $post): ?>

    <a href='<?= get_the_permalink($post); ?>' class='carousel-item <?php if($i == 0) echo 'active'; ?>'>
      <img class='img-fluid' src='<?= get_the_post_thumbnail_url($post); ?>' alt='Slide <?= $i ?>'/>

      <?php if(isset($attrs['title']) || isset($attrs['excerpt'])): ?>
      <div class='carousel-caption'>
        <?php if(isset($attrs['title'])): ?>
        <h1><?= get_the_title($post); ?></h1>
        <?php endif; ?>
        <?php if(isset($attrs['excerpt'])): ?>
        <p><?= get_the_excerpt($post); ?></p>
        <?php endif; ?>
      </div>
      <?php endif; ?>
    </a>

    <?php endforeach; ?>
  </div>

  <?php if(isset($attrs['arrows'])): ?>
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
