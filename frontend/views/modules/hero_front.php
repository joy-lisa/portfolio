<?php
$data = $args['data'];
$image = $data['image'] ?? null;
?>

<section data-module="hero_front">
    <h1 class="title"><?= $data['title'] ?></h1>
    <p class="subline"><?= $data['subline'] ?></p>
    <?php if (!empty($image['src'])) : ?>
        <img class="image" src="<?= esc_url($image['src']) ?>" alt="<?= esc_attr($image['alt'] ?? '') ?>">
    <?php endif; ?>
</section>
