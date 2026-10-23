<?php
$menu = get_menu_by_slug(slug: 'legals');
?>
<footer data-layout="footer">
    <nav class="nav-container">
        <ul class="nav">
            <?php foreach ($menu as $item) : ?>
                <li class="nav-item">
                    <a href="<?= $item['url'] ?>" target="<?= $item['target'] ?>"><?= $item['title'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
</footer>
