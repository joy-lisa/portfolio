<?php
$project = get_project_by_id(get_the_ID());
js_log($project);
?>

<main data-page="project" >
    <section class="hero">
        <div class="container" data-utility="wrap-page">
        <p class="preline">
            <?php foreach ($project['project_categories'] as $category) : ?>
                <span class="category-item"><?= $category?></span>
            <?php endforeach; ?>
        </p>
        <p class="preline">project</p>
        <h1 class="title"><?= $project['title'] ?></h1>
        </div>
    </section>

    <section class="content">
        <div class="container" data-utility="wrap-page">
            <img class="image" src="<?=$project['image']['src']?>" alt="<?=$project['image']['src']?>">
            <p class="lead"><?=$project ['lead']?></p>


            <div data-utility="wysiwyg" class="text">
                <?= wpautop($project['text']) ?>
            </div>
        </div>
    </section>

    <section class="gallery_bottom">
            <?php if (!empty($project['gallery'])) : ?>
        <div class="project-gallery">
            <?php foreach ($project['gallery'] as $bild) : ?>
                <img src="<?= $bild['src'] ?>" alt="<?= $bild['src'] ?>">
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    </section>
    
</main>
