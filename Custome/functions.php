<?php
	/*Add Site-Identity option to the theme*/
	function custom_theme_support(){
		add_theme_support( 'title-tag' );
		add_theme_support('custom-logo');
		add_theme_support('post-thumbnails');
	}
	add_action( 'after_setup_theme', 'custom_theme_support' );

	/*The function 'custome_register_style' is for the css link*/
	function custom_register_style(){
		$version = wp_get_theme()->get('Version'); //Getting the theme version
		wp_enqueue_style( 'custome-style', get_template_directory_uri() . '/style.css', array('custome-bootstrap'), $version, 'all' );
		wp_enqueue_style( 'custome-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), '4.4.1', 'all' );
		wp_enqueue_style( 'custome-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css', array(), '5.13.0', 'all' );
	}
	add_action( 'wp_enqueue_scripts', 'custom_register_style' );

	/*The function 'custome_register_script' is for the JS link*/
	function custom_register_script(){
		wp_enqueue_script( 'custome-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true );
		wp_enqueue_script( 'custome-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true );
		wp_enqueue_script( 'custome-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true );
		wp_enqueue_script( 'custome-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true );
	}
	add_action( 'wp_enqueue_scripts', 'custom_register_script' );

	/*Active the menus*/
	function custom_menu(){
		$location = array(
			'primary' => 'Left Side Menu',
			'footer' => 'Footer Menu'
		);
		register_nav_menus($location);
	}
	add_action('init', 'custom_menu');

	/*Adding dragable widget*/
	function custom_widget_area(){
		register_sidebar(
			array(
				'before_title' => '<h2>',
				'after_title' => '</h2>',
				'before_widget' => '',
				'after_widget' => '',
				'name' => 'Top Sidebar Area',
				'id' => 'sidebar-1',
				'description' => 'Sidebar Widget Area'
			)
		);
	}

	add_action('widgets_init', 'custom_widget_area');