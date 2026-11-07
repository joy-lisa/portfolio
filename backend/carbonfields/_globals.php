<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// -> Inhaltsfeld-Konfiguration der globalen Einstellungen des Themes
Container::make('theme_options', 'Globales')
    ->add_fields([
        Field::make('image', 'logo', 'logo'),
        Field::make('complex', 'socials', 'socials')
            ->add_fields([
                Field::make('text', 'title', 'titel'),
                Field::make('text', 'link', 'link')
                /* Field::make('image', 'icon', 'icon'), verwende ich nicht, weil ich keine icons möchte*/            
            ])
            ->set_header_template('<% if (title) { %> <%- title %><% }%>')
            ->set_layout ('tabbed-vertical'),

        Field::make('text', 'email', 'mail')
        // todo: Globale Inhaltsfelder hier ergänzen
    ]);
