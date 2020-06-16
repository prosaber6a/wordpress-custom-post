<?php
/**
 * Plugin Name: Custom Post
 * Author: SaberHR
 * Plugin URI: http://saberhr.com
 * Author URI: http://saberhr.com
 * Description:
 * Version: 1.0.0
 * Licence: GPLv2 or later
 * Text Domain: custom-post
 * Domain Path: /languages/
 */

function custom_post_load_text_domain() {
	load_plugin_textdomain( 'custom-post', false, plugin_dir_url( __FILE__ ) . '/languages' );
}

add_action( 'plugins_loaded', 'custom_post_load_text_domain' );


function custom_post_register() {
	$labels = array(
		'name'          => __( 'Recipes', 'custom-post' ),
		'singular_name' => __( 'Recipe', 'custom-post' ),
		'all_items'     => __( 'My Recipes', 'custom-post' ),
		'add_new'       => __( 'New Recipe', 'custom-post' )
	);

	$args = array(
		'label'               => __( 'Recipes', 'custom-post' ),
		'labels'              => $labels,
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_rest'        => false,
		'rest_base'           => '',
		'has_archive'         => 'recipes',
		'show_in_menu'        => true,
		'show_in_nav_menu'    => true,
		'exclude_from_search' => false,
		'capability_type'     => 'post',
		'map_meta_cap'        => true,
		'hierarchical'        => false,
		'query_var'           => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-images-alt',
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'taxonomies'          => array( 'category' )
	);

	register_post_type( 'recipe', $args );
}

add_action( 'init', 'custom_post_register' );



function custom_post_recipe_template( $file ) {
	global $post;
	if ( 'recipe' == $post->post_type ) {
		$file = plugin_dir_path( __FILE__ ) . '/cpt-template/single-recipe.php';
	}

	return $file;
}

add_filter( 'single_template', 'custom_post_recipe_template' );

