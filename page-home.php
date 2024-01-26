<?php /* Template Name: Home page */
get_header();
?>
  <main class="grow">
    <section class="container mx-auto px-4">
      <?php
      $args = array(
        'post_type' => 'custom_post',
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'paged' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
      );

      $query = new WP_Query( $args );
      if ( $query->have_posts() ) { ?>
        <div id="posts" class="grid mb-8 gap-4 md:gap-8 md:grid-cols-3">
          <?php
          while ( $query->have_posts() ) {
            $query->the_post();
            get_template_part( 'template-parts/content','card');
          }
        }
        wp_reset_query();
        ?>
      </div>
      <?php
      if (  $query->max_num_pages > 1 )
        echo '<div class="flex justify-center"><button data-ajax-post-type="custom_post" data-max-post="'. $query->found_posts .'" type="button" class="load-more-btn px-6 py-2 rounded bg-amber-400 hover:bg-amber-500 duration-200">Show more</button></div>';
      ?>
    </section>
  </main>
<?php
get_footer();


