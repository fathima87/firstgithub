<?php
/**
 * People custom post type
 * 
 * 
 * Author: John Phillips
 *
 */


// let's create the function for the custom type
function people() {
	// creating (registering) the custom type
	register_post_type( 'people', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('People', 'post type general name'), /* This is the Title of the Group */
			'singular_name' => __('Person', 'post type singular name'), /* This is the individual type */
			'add_new' => __('Add New', 'Publication type item'), /* The add new menu item */
			'add_new_item' => __('Add New Person'), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __('Edit Post Types'), /* Edit Display Title */
			'new_item' => __('New Post Type'), /* New Display Title */
			'view_item' => __('View Post Type'), /* View Display Title */
			'search_items' => __('Search Post Type'), /* Search Custom Type Title */
			'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */
			'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example Person type' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 7, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the Publication type menu */
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'has_archive' => true,
			'register_meta_box_cb' => null,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */

	/* this ads your post categories to your Publication type */
	//register_taxonomy_for_object_type('category', 'people');
	/* this ads your post tags to your Publication type */
	//register_taxonomy_for_object_type('post_tag', 'people');

}

	// adding the function to the Wordpress init
	add_action( 'init', 'people');


        
/*
 * Here is where we define the custom metaboxes
 * associated with the People post type
 *
 */

add_filter( 'cmb_meta_boxes', 'cmb_people_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_people_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';

        //Grab IDs of all publications
        $var = SB_get_related_post_types('publications');

	$meta_boxes[] = array(
		'id'         => 'test_metabox',
		'title'      => 'Related publications',
		'pages'      => array( 'people'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(

                    array(
				'name' => 'Author Image',
				'desc' => 'Upload an image or enter an URL.',
				'id'   => $prefix . 'author_image',
				'type' => 'file',
			),
			
			array(
				'name'    => 'Publications',
				'desc'    => 'Tick the publications this person has worked on',
				'id'      => $prefix . 'test_multicheckbox',
				'type'    => 'multicheck',
				'options' => $var
			),
			
			
		),
	);


	return $meta_boxes;
}

