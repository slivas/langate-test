<?php
	/**
	 * Functions which enhance the theme by hooking into WordPress
	 *
	 * @package Langate Test
	 */
  
	function langate_test_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
	add_action( 'wp_head', 'langate_test_pingback_header' );

    function remove_type_grom_link() {
        add_theme_support( 'html5', [ 'script', 'style' ] );
    }
	add_action( 'after_setup_theme', 'remove_type_grom_link' );

//Load more
function load_more_scripts() {
  wp_enqueue_script('load-more', get_template_directory_uri() . '/assets/js/load-more.js', array('jquery'), '', true);
  wp_localize_script('load-more', 'loadmore', array(
    'ajaxurl' => admin_url('admin-ajax.php'),
  ));
}
add_action('wp_enqueue_scripts', 'load_more_scripts');

function load_more_posts() {
  $args = json_decode(stripslashes($_POST['posts']), true);
  $args['paged'] = $_POST['page'];
  $args['post_status'] = 'publish';
  $args['posts_per_page'] = $_POST['posts_per_page'];
  $args['post_type'] = $_POST['ajax_post_type'];

  $query = new WP_Query($args);

  if ($query->have_posts()) :

    while ($query->have_posts()) : $query->the_post();
      get_template_part( 'template-parts/content','card');
    endwhile;
  endif;
  wp_die();
}
add_action('wp_ajax_load_more', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more', 'load_more_posts');



