<?php
$project = get_project_by_id(get_the_ID());
js_log($project);
?>

<main data-page="project" >
    <p class="preline">project</p>
    <h1 class="title"><?= $project['title'] ?></h1>
    <img class="image" src="<?=$project['image']['src']?>" alt="<?=$project['image']['src']?>">
    <p class="lead"><?=$project ['lead']?></p>
    <div class="text>
        <?= wpautop($project['text']) ?>
    </div>

    <?php if (!empty($project['gallery'])) : ?>
        <div class="project-gallery">
            <?php foreach ($project['gallery'] as $bild) : ?>
                <img src="<?= $bild['src'] ?>" alt="<?= $bild['src'] ?>">
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</main>
