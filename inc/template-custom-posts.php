<?php
/*Register Custom post type*/
add_action('init', 'custom_post_register');
function custom_post_register() {
  $labels = array(
    'name' => 'Custom Posts',
    'singular_name' => 'Custom post',
    'add_new' => 'Add Custom post',
    'add_new_item' => 'Add Custom post',
    'edit_item' => 'Edit Custom posts',
    'new_item' => 'Custom posts',
    'view_item' => 'View Custom posts',
    'search_items' => 'Search Custom post',
    'not_found' =>  'Nothing found',
    'not_found_in_trash' => 'Nothing found in Trash',
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'has_archive' => true,
    'rewrite' => array( 'slug' => false, 'with_front' => true ),
    'capability_type' => 'post',
    'menu_position' => 6,
    'menu_icon' => 'dashicons-category',
    'supports' => array('title', 'excerpt', 'editor','thumbnail')
  );
  register_post_type( 'custom_post' , $args );
}
