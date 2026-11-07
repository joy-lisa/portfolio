<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'project')
    ->where('post_type', '=', 'project')
    ->add_fields([
        Field::make('image', 'image', 'bild')->set_required(),
        Field::make('textarea', 'description', 'beschreibung')->set_required()->set_help_text('wird für den teaser auf der startseite verwendet'),
        Field::make('textarea', 'lead', 'lead')->set_required(),
        Field::make('rich_text', 'text', 'text')->set_required(),
        Field::make('media_gallery', 'gallery', 'gallery')->set_required(),
    ]);