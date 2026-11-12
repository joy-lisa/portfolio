<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// -> Konfiguration der verschiedenen Module
Container::make('post_meta', 'Module')
    ->where('post_type', '=', 'page')
    ->add_fields([
        Field::make('complex', 'modules', 'Module')
            // -> example
            ->add_fields('example', 'Beispiel', [
                Field::make('text', 'title', 'Titel')->set_required(),
                Field::make('image', 'image', 'Bild')->set_required(),
            ])

            // hero_front

              ->add_fields('hero_front', 'hero startseite', [
               Field::make('text', 'title', 'titel')->set_required(),
               Field::make ('textarea', 'subline', 'subline')->set_required(),
               Field::make ('image', 'image', 'bild'),
            ])

            // hero standard

            -> add_fields('hero_default', 'hero standard', [
                Field::make('text', 'title', 'titel')->set_required(),
                Field::make ('textarea', 'subline', 'subline')->set_required(),
            ])

            // teaser page

            ->add_fields('teaser_page', 'teaser page', [
                Field::make('text', 'title', 'titel')->set_required(),
                Field::make ('textarea', 'subline', 'subline')->set_required(),
                Field::make ('image', 'image', 'bild'),
                Field::make ('text', 'link_to_page', 'link zur seite')->set_required(),
            ])

            // overview_projects

              ->add_fields('overview_projects', 'übersicht projekte', [
               Field::make('text', 'title', 'titel')->set_required(),
               Field::make ('text', 'all_projects_link', 'link zu allen projekten')->set_required(),
               Field::make ('association', 'selection', 'auswahl projekte')
               ->set_types([
               [
                'type' => 'post',
                'post_type' => 'project',
               ]
            ])

            ])

            // alle projekte

            ->add_fields('all_projects', 'alle projekte', [
             Field::make('text', 'title', 'titel'),
             Field::make('text', 'filter_label', 'label für "alle"'),
            ])

            // todo: add new modules here
            // -> SETTINGS
            ->set_layout('tabbed-vertical')
    ]);

// -> Funktion, um die Module und die entsprechenden Templates auf der Seite zu laden
function render_modules (): void {
    $modules = carbon_get_the_post_meta('modules');
    if (empty($modules)) {
        return;
    }
    foreach ($modules as $module) {
        // -> Modifiziere die Daten des Moduls, falls nötig, basierend auf dem Modultyp
        switch ($module['_type']) {
            case 'example':
                $module['image'] = get_media_by_id($module['image']);
                break;
            case 'hero_front':
                $module['image'] = get_media_by_id($module['image']);
                break;

            case 'hero_default':
                break;

            case 'teaser_page':
                $module['image'] = get_media_by_id($module['image']);
                break;

            case 'overview_projects':
                $module['selection'] = array_map(function ($item) {
                    return (int) $item['id'];
                }, $module['selection']);
                break;

            case 'all_projects':
                $module['projects'] = get_posts([
                 'post_type'      => 'project',
                 'posts_per_page' => -1,
                 'orderby'        => 'date',
                 'order'          => 'DESC',
                    ]);
                break;


                // todo: add data modifications for modules here as a new case
        }
        // -> Laden des Templates basierend auf dem Modultyp und weitergeben der Daten
        get_template_part(
            'frontend/views/modules/' . $module['_type'],
            null,
            [
                'data' => $module
            ]
        );
    }
}
