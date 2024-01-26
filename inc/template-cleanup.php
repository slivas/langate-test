<?php
/* Remove block-library */
function remove_wp_block_library_css(){
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
  wp_dequeue_style( 'wc-block-style' );
}
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );

/* Remove wlwmanifest_link и wp_generator */
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );

/* Hide admin bar in front */
add_filter('show_admin_bar', '__return_false');

/* Remove emojis */
function disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
function disable_emojis_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
add_action( 'init', 'disable_emojis' );

/* Remove wp-embed-js */
function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

/* Remove Edit link */
function remove_edit_post_link( $link ) {
  return '';
}
add_filter('edit_post_link', 'remove_edit_post_link');

/* Remove global svg */
add_action('init', function() {
  remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
});

/* Remove global styles */
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );

/* Disable comments feed */
add_filter( 'feed_links_show_comments_feed', '__return_false' );

/* Remove Width and Height Attributes From Inserted Images */
function remove_width_attribute( $html ) {
  $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
  return $html;
}
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

/* Remove category from url */
function remove_category( $string, $type )  {
  if ( $type != 'single' && $type == 'category' && ( strpos( $string, 'category' ) !== false ) ) {
    $url_without_category = str_replace( "/category/", "/", $string );
    return trailingslashit( $url_without_category );
  }
  return $string;
}
add_filter( 'user_trailingslashit', 'remove_category', 100, 2);