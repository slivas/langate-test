<?php
	/**
	 * The template for displaying the footer
	 *
	 * Contains the closing of the #content div and all content after.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Langate Test
	 */
?>
<footer class="footer">
	<div class="container mx-auto px-4 py-8">
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'langate_test' ) ); ?>">
			<?php 
				printf( esc_html__( 'Proudly powered by %s', 'langate_test' ), 'WordPress' );
			?>
		</a> 
	</div>
</footer> 

<?php wp_footer(); ?>
</body>
</html>
