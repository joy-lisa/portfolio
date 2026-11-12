<?php
$data = $args['data'];

// Alle Projekte laden
$projects = get_posts([
    'post_type'      => 'project',
    'posts_per_page' => -1,
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

// Kategorien der Projekte sammeln
$categories = [];
foreach ($projects as $project) {
    $terms = get_the_terms($project->ID, 'project_category');
    if ($terms && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            $categories[$term->term_id] = $term->name;
        }
    }
}
?>

<section data-module="all_projects">
    <?php if (!empty($data['title'])): ?>
        <h2 class="title"><?= esc_html($data['title']) ?></h2>
    <?php endif; ?>

    <!-- Kategorie-Filter (sticky) -->
    <nav class="projects-filter">
        <button class="filter-btn is-active" data-filter="all">
            <?= esc_html($data['filter_label'] ?? 'Alle') ?>
        </button>
        <?php foreach ($categories as $id => $name): ?>
            <button class="filter-btn" data-filter="<?= esc_attr($id) ?>">
                <?= esc_html($name) ?>
            </button>
        <?php endforeach; ?>
    </nav>

    <!-- Projekt-Karten -->
    <div class="projects-grid">
        <?php foreach ($projects as $project):
            // Bild über Carbon Fields-Bildfeld holen
            $image_id = carbon_get_post_meta($project->ID, 'image');
            $image = get_media_by_id($image_id);
            $terms = get_the_terms($project->ID, 'project_category');
            $catIds = $terms ? wp_list_pluck($terms, 'term_id') : [];
        ?>
            <article class="project-card"
                     data-categories="<?= esc_attr(implode(' ', $catIds)) ?>">
                <?php if (!empty($image['src'])): ?>
                    <img class="project-card__image"
                         src="<?= esc_url($image['src']) ?>"
                         alt="<?= esc_attr(get_the_title($project->ID)) ?>">
                <?php endif; ?>
                <h3 class="project-card__title"><?= esc_html(get_the_title($project->ID)) ?></h3>
                <?php if ($terms): ?>
                    <p class="project-card__category">
                        <?= esc_html(implode(', ', wp_list_pluck($terms, 'name'))) ?>
                    </p>
                <?php endif; ?>
                <a href="<?= esc_url(get_permalink($project->ID)) ?>"
                   class="project-card__link">Zum Projekt</a>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const filter = document.querySelector('[data-module="all_projects"] .projects-filter');
    const cards = document.querySelectorAll('[data-module="all_projects"] .project-card');

    filter.addEventListener('click', function (e) {
        const btn = e.target.closest('.filter-btn');
        if (!btn) return;

        filter.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('is-active'));
        btn.classList.add('is-active');

        const filterId = btn.dataset.filter;
        cards.forEach(function (card) {
            const cats = card.dataset.categories.split(' ').filter(Boolean);
            const show = filterId === 'all' || cats.includes(filterId);
            card.style.display = show ? '' : 'none';
        });
    });
});
</script>
