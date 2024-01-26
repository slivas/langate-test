<?php
	/**
	 * Template part for displaying posts
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Langate Test
	 */
?>

<article data-content-id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		?>

	</header>

	<?php if ( get_post_type() === 'post' ) : ?>


	<?php endif; ?>

	<div class="entry-content">
		<?php
			the_content(
				sprintf(
					wp_kses( 
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'langate_test' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'langate_test' ),
					'after'  => '</div>',
				)
			);
		?>
	</div>

</article>
