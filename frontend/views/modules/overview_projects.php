<?php
$data = $args['data'];
js_log($data);
?>

<section data-module="overview_projects">
  <h2 class="title"><?= $data['title'] ?></h2>
  <a href="<?= $data['all_projects_link'] ?>" class="all-projects-link">Alle Projekte</a>
  <div class="projects">
    <?php foreach ($data['selection'] as $project_id) : ?>
        <?php
        get_template_part (
            'frontend/views/teaser/project',
            null,
            [
                'id' => $project_id            
            ]
        );
        ?>
    <?php endforeach; ?>
  </div>
</section>
