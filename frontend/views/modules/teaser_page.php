<?php
$data = $args['data'];
js_log($data);
?>

<section data-module="teaser_page">
  <h2 class="title"><?= $data['title'] ?></h2>
  <p class="subline"><?= $data['subline'] ?></p>
  <a href="<?= $data['link_to_page'] ?>" class="link-to-page">Zur Seite</a>
  <img class="image" src="<?= esc_url($data['image']['src']) ?>" alt="<?= esc_attr($data['image']['alt'] ?? '') ?>">
</section>