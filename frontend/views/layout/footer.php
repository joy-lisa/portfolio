<?php
$menu = get_menu_by_slug(slug: 'legals');
$logo = get_globals_logo();
$socials = get_globals_socials();
$email = get_globals_email();

?>
<footer data-layout="footer">
    <img class="logo" src="<?= $logo['src'] ?>" alt="<?= $logo['alt'] ?>" />
    <div class="socials">
        <?php foreach ($socials as $item) : ?>
            <a href="<?= $item['link'] ?>" target="_blank"><?= $item['title'] ?>
        </a>
        <?php endforeach; ?>
    </div>  
    <div class="email">
        <a href="mailto:<?= $email ?>"><?= $email ?></a>
    </div>
    <nav class="nav-container">
        <ul class="nav">
            <?php foreach ($menu as $item) : ?>
                <li class="nav-item">
                    <a href="<?= $item['url'] ?>" target="<?= $item['target'] ?>"><?= $item['title'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
</footer>
