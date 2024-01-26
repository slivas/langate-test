<?php
	/**
	 * Template part for displaying page content in page.php
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Langate Test
	 */
?>

<article data-page-id="<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><

	<?php langate_test_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			the_content(); 
		?>
	</div>

</article>