<?php
// CUSTOM POST TYPES
// EVENTS
function eventsType_postType(){
    register_post_type('eventsType', array(
        'public' => true,
        // 'hierarchical' =>false,
        'labels' => array(
            'name'=>'events type',
            'add_new_item'=> 'Add new events type',
            'edit_item'=> 'Edit events type',
            'all_items' => 'All events types',
            'singular_name' => 'eventsType',
        ),
        'menu_icon' =>'dashicons-welcome-write-blog',
        'show_in_rest' => true,
        // 'rewrite' => array('slug' => 'events'),
        'supports' => array('title','thumbnail',"editor",'page-attributes','excerpt'),
        'taxonomies'          => array( 'category', 'post_tag' )
    ));
   
}
add_action('init', "eventsType_postType");

// OPTIONS
function options_postType(){
    register_post_type('options', array(
        'public' => true,
        // 'hierarchical' =>false,
        'labels' => array(
            'name'=>'options type',
            'add_new_item'=> 'Add new option',
            'edit_item'=> 'Edit option',
            'all_items' => 'All options',
            'singular_name' => 'options',
        ),
        'menu_icon' =>'dashicons-camera',
        'show_in_rest' => true,
        // 'rewrite' => array('slug' => 'events'),
        'supports' => array('title','thumbnail',"editor",'page-attributes','excerpt'),
        'taxonomies'          => array( 'category', 'post_tag')
    ));
   
}
add_action('init', "options_postType");

function faq_postType(){
    register_post_type('faq', array(
        'public' => true,
        // 'hierarchical' =>false,
        'labels' => array(
            'name'=>'faq type',
            'add_new_item'=> 'Add new faq',
            'edit_item'=> 'Edit faq',
            'all_items' => 'All faq',
            'singular_name' => 'faq',
        ),
        'menu_icon' =>'dashicons-pets',
        'show_in_rest' => true,
        // 'rewrite' => array('slug' => 'events'),
        'supports' => array('title','thumbnail',"editor",'page-attributes','excerpt'),
        'taxonomies'          => array( 'category', 'post_tag' )
    ));
   

}
add_action('init', "faq_postType");
function kabinaPosts(){
    register_post_type('kabina', array(
        'public' => true,
        // 'hierarchical' =>false,
        'labels' => array(
            'name'=>'kabina type',
            'add_new_item'=> 'Add new kabina',
            'edit_item'=> 'Edit kabina',
            'all_items' => 'All kabina',
            'singular_name' => 'kabina',
        ),
        'menu_icon' =>'dashicons-awards',
        'show_in_rest' => true,
        // 'rewrite' => array('slug' => 'events'),
        'supports' => array('title','thumbnail',"editor",'page-attributes','excerpt'),
        'taxonomies'          => array( 'category', 'post_tag' )
    ));
   
}
add_action('init', "kabinaPosts");


// CUSTOM POST TYPE - NOVOSTI
function novosti_postType(){
    register_post_type('novosti', array(
        'public' => true,
        'labels' => array(
            'name'          => 'Novosti',
            'singular_name' => 'Novost',
            'add_new_item'  => 'Dodaj novu novost',
            'edit_item'     => 'Izmeni novost',
            'all_items'     => 'Sve novosti',
        ),
        'menu_icon'    => 'dashicons-megaphone',
        'show_in_rest' => true,
        'has_archive'  => true,
        'rewrite'      => array('slug' => 'novosti'),
        'supports'     => array('title', 'thumbnail', 'editor', 'page-attributes', 'excerpt'),
        'taxonomies'   => array('post_tag')
    ));
}
add_action('init', 'novosti_postType');

// TAXONOMY - TIP DOGADJAJA
function novosti_tip_taxonomy(){
    register_taxonomy('novosti_tip', array('novosti'), array(
        'public'            => true,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'labels' => array(
            'name'          => 'Tip događaja',
            'singular_name' => 'Tip događaja',
            'add_new_item'  => 'Dodaj novi tip',
            'edit_item'     => 'Izmeni tip',
            'all_items'     => 'Svi tipovi',
            'search_items'  => 'Pretraži tipove',
        ),
        'rewrite' => array('slug' => 'novosti-tip'),
    ));
}
add_action('init', 'novosti_tip_taxonomy');

// TAXONOMY - LOKACIJA
function novosti_lokacija_taxonomy(){
    register_taxonomy('novosti_lokacija', array('novosti'), array(
        'public'            => true,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'labels' => array(
            'name'          => 'Lokacije',
            'singular_name' => 'Lokacija',
            'add_new_item'  => 'Dodaj novu lokaciju',
            'edit_item'     => 'Izmeni lokaciju',
            'all_items'     => 'Sve lokacije',
            'search_items'  => 'Pretraži lokacije',
        ),
        'rewrite' => array('slug' => 'novosti-lokacija'),
    ));
}
add_action('init', 'novosti_lokacija_taxonomy');



?>
