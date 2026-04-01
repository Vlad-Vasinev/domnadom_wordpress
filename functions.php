<?php

function domnadom_assets()
{
    wp_enqueue_style(
        'domnadom-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [],
        '1.0'
    );

    wp_enqueue_script(
        'domnadom-script',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        '1.0',
        true
    );
}

add_action('wp_enqueue_scripts', 'domnadom_assets');

function force_house_thumbnail_support()
{
    add_post_type_support('house', 'thumbnail');
}
function force_benefits_thumbnail_support()
{
    add_post_type_support('benefits-people', 'thumbnail');
}
function force_exhibition_thumbnail_support()
{
    add_post_type_support('exhibition-item', 'thumbnail');
}
function force_companies_grid_thumbnail_support()
{
    add_post_type_support('companies-grid', 'thumbnail');
}


function register_map_houses_post_type()
{
    register_post_type(
        'map-house',
        array(
            'labels' => array(
                'name' => 'House on map',
                'singular_name' => 'House on map'
            ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'supports' => array('title', 'thumbnail'),
            'menu_icon' => 'dashicons-location-alt',
        )
    );
}
add_action('init', 'register_map_houses_post_type');

function map_houses_api()
{
    register_rest_route('map/v1', '/houses', array(
        'methods' => 'GET',
        'callback' => 'get_map_houses_data',
    ));
}
add_action('rest_api_init', 'map_houses_api');


function get_map_houses_data()
{
    $houses = get_posts(array(
        'post_type' => 'map-house',
        'posts_per_page' => -1,
        'meta_key' => 'id',
        'orderby' => 'meta_value_num',
        'order' => 'ASC'
    ));

    $data = array();
    foreach ($houses as $house) {

        $id = get_field('id', $house->ID);

        if (empty($id)) continue;

        $active = get_field('active', $house->ID);
        $number = get_field('number', $house->ID);
        $link = get_field('link', $house->ID);
        $imgLink = get_field('imglink', $house->ID);
        $title = get_field('title', $house->ID);
        $size = get_field('size', $house->ID);
        $descriptionIcon = get_field('descriptionicon', $house->ID);
        $descriptionTitle = get_field('descriptiontitle', $house->ID);
        $review = get_field('review', $house->ID);
        $reviewCount = get_field('reviewcount', $house->ID);
        $reviewText = get_field('reviewtext', $house->ID);

        $data[] = array(
            'id' => (string) $id ?: '58',
            'active' => (bool) $active ?: false,
            'number' => (string) $number ?: '58',
            'link' => (string) $link ?: 'https://www.apple.com/',
            'imgLink' => $imgLink,
            'title' => $title ?: 'New house on map',
            'size' => $size ?: '256 m²',
            'descriptionIcon' => $descriptionIcon,
            'descriptionTitle' => $descriptionTitle ?: 'RUSS-HOUSE',
            'review' => $review ?: '5.0',
            'reviewCount' => (int) $reviewCount ?: 68,
            'reviewText' => $reviewText ?: 'reviews'
        );
    }

    return $data;
}


add_action('rest_api_init', function () {
    error_log('=== REST API INIT ===');
    $routes = rest_get_server()->get_routes();
    error_log('Доступные маршруты: ' . print_r(array_keys($routes), true));
});

add_action('init', 'force_house_thumbnail_support');
add_action('init', 'force_benefits_thumbnail_support');
add_action('init', 'force_exhibition_thumbnail_support');
add_action('init', 'force_companies_grid_thumbnail_support');

add_theme_support('post-thumbnails', array('house'));
add_theme_support('post-thumbnails', array('benefits-people'));
add_theme_support('post-thumbnails', array('exhibition-item'));
add_theme_support('post-thumbnails', array('companies-grid'));
