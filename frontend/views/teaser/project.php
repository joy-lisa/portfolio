<?php 
$id = $args['id'];
$project = get_project_by_id($id); 
?>

<a href="<?= $project['link'] ?>" target="_self">
    <img src="<?= $project['image']['src'] ?>" alt="<?= $project['image']['alt'] ?>">
    <h3><?= $project['title'] ?></h3>
    <p><?= $project['description'] ?></p>
    <p><?= $project['project_category'] ?></p>
</a>