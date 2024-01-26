<?php
	/**
	 * Enqueue scripts and styles
	 *
	 * @link https://developer.wordpress.org/themes/basics/theme-functions/
	 *
	 * @package Langate Test
	 */
	
	function langate_test_scripts() { 
		wp_enqueue_style( 'langate_test-style-css', get_template_directory_uri() . '/assets/css/style.css', array(), null );

		if( !is_admin() ) {
		    wp_deregister_script('jquery');
			wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), null, true);
			wp_enqueue_script('jquery');
		}

//		wp_enqueue_script( 'langate_test-js-main', get_template_directory_uri() . '/assets/bundle.js', array(), null, true );

		wp_localize_script( 'langate_test-js-main', 'admin_ajax',
			array(
				'url' => admin_url('admin-ajax.php')
			)
		); // Use in js admin_ajax['url']

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'langate_test_scripts' );  