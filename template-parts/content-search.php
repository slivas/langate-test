<?php
	/**
	 * Template part for displaying results in search pages
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Langate Test
	 */
?>

<article <?php post_class(); ?>>

	<header class="entry-header">

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		
	</header>

	<?php if ( get_post_type() ===  'post' ) : ?>

		<div class="entry-meta">
			<?php
				langate_test_posted_on();
				langate_test_posted_by();
			?>
		</div>

	<?php endif; ?>

	<?php langate_test_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer">
		<?php langate_test_entry_footer(); ?>
	</footer>

</article>
