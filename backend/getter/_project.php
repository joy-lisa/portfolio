<?php

function get_project_by_id(int $id): array
 {

// collect data
    $title = get_the_title($id);
    $image_id = carbon_get_post_meta($id, 'image');
    $image = get_media_by_id($image_id);
    $lead = carbon_get_post_meta($id, 'lead');
    $description = carbon_get_post_meta($id, 'description');
    $text = carbon_get_post_meta($id, 'text');

    $gallery_ids = carbon_get_post_meta($id, 'gallery');
    $gallery = [];

    if (!empty($gallery_ids)) {
        foreach ($gallery_ids as $gallery_id) {
            $gallery[] = get_media_by_id($gallery_id);
        }
    }

// return data
    return [
        'title' => $title,
        'image' => $image,
        'lead' => $lead,
        'description' => $description,
        'text' => $text,
        'gallery' => $gallery,
    ];
    //js_log('soll infos zu einem projekt geben mit ID' . $id);
}



?>