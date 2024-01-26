<?php  
   /**
    * Default post pagination function
    *
    * @link https://developer.wordpress.org/themes/basics/theme-functions/
    *
    * @package Langate Test
    */
   if ( !function_exists( 'post_pagination' ) ) :
      function post_pagination() {
         global $wp_query;
         $pager = 999999999;
         echo paginate_links( 
            array(
               'base' => str_replace( $pager, '%#%', esc_url( get_pagenum_link( $pager ) ) ),
               'format' => '?paged=%#%',
               'current' => max( 1, get_query_var('paged') ),
               'total' => $wp_query->max_num_pages, 
               'prev_text' => __('«'),
               'next_text' => __('»'),
            )
         );
      }
   endif;
?>