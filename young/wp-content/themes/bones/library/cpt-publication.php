<?php
/* Bones Publication Type Example
This page walks you through creating 
a Publication type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a seperate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/


// let's create the function for the custom type
function publication() { 
	// creating (registering) the custom type 
	register_post_type( 'publications', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Publications', 'post type general name'), /* This is the Title of the Group */
			'singular_name' => __('Publication', 'post type singular name'), /* This is the individual type */
			'add_new' => __('Add New', 'Publication type item'), /* The add new menu item */
			'add_new_item' => __('Add New Publication'), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __('Edit Post Types'), /* Edit Display Title */
			'new_item' => __('New Post Type'), /* New Display Title */
			'view_item' => __('View Post Type'), /* View Display Title */
			'search_items' => __('Search Post Type'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example Publication type' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the Publication type menu */
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'has_archive' => true,
			'register_meta_box_cb' => 'add_pub_metaboxes',
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this ads your post categories to your Publication type */
	register_taxonomy_for_object_type('category', 'publications');
	/* this ads your post tags to your Publication type */
	register_taxonomy_for_object_type('post_tag', 'publications');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'publication');

  // now let's add custom categories (these act like categories)
  
    /*
     * Date - these will be years
     */
  
    register_taxonomy( 'publicationdate', 
      array('publications'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
      array('hierarchical' => true,     /* if this is true it acts like categories  */             
        'labels' => array(
          'name' => __( 'Date ranges' ), /* name of the custom taxonomy */
          'singular_name' => __( 'Custom date range' ), /* single taxonomy name */
          'search_items' =>  __( 'Search date ranges' ), /* search title for taxomony */
          'all_items' => __( 'All date ranges' ), /* all title for taxonomies */
          'parent_item' => __( 'Parent date range' ), /* parent title for taxonomy */
          'parent_item_colon' => __( 'Parent date range:' ), /* parent taxonomy title */
          'edit_item' => __( 'Edit date range' ), /* edit custom taxonomy title */
          'update_item' => __( 'Update date range' ), /* update title for taxonomy */
          'add_new_item' => __( 'Add New date range' ), /* add new title for taxonomy */
          'new_item_name' => __( 'New date range Name' ) /* name title for taxonomy */
        ),
        'show_ui' => true,
        'query_var' => true,
      )
    );  
    
    /*
     * Date - these will be years
     */
  
    register_taxonomy( 'publication-type', 
      array('publications'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
      array('hierarchical' => true,     /* if this is true it acts like categories  */             
        'labels' => array(
          'name' => __( 'Publication type' ), /* name of the custom taxonomy */
          'singular_name' => __( 'Custom publication type' ), /* single taxonomy name */
          'search_items' =>  __( 'Search publication type' ), /* search title for taxomony */
          'all_items' => __( 'All publication types' ), /* all title for taxonomies */
          'parent_item' => __( 'Parent publication type' ), /* parent title for taxonomy */
          'parent_item_colon' => __( 'Parent publication type:' ), /* parent taxonomy title */
          'edit_item' => __( 'Edit publication type' ), /* edit custom taxonomy title */
          'update_item' => __( 'Update publication type' ), /* update title for taxonomy */
          'add_new_item' => __( 'Add New publication type' ), /* add new title for taxonomy */
          'new_item_name' => __( 'New publication type Name' ) /* name title for taxonomy */
        ),
        'show_ui' => true,
        'query_var' => true,
      )
    );      
    
    /*
     * Authors
     */
     
    register_taxonomy( 'author', 
      array('publications', 'post'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
      array('hierarchical' => true,     /* if this is true it acts like categories  */             
        'labels' => array(
          'name' => __( 'Author' ), /* name of the custom taxonomy */
          'singular_name' => __( 'Custom author' ), /* single taxonomy name */
          'search_items' =>  __( 'Search authors' ), /* search title for taxomony */
          'all_items' => __( 'All authors' ), /* all title for taxonomies */
          'parent_item' => __( 'Parent author' ), /* parent title for taxonomy */
          'parent_item_colon' => __( 'Parent author:' ), /* parent taxonomy title */
          'edit_item' => __( 'Edit author' ), /* edit custom taxonomy title */
          'update_item' => __( 'Update author' ), /* update title for taxonomy */
          'add_new_item' => __( 'Add New Author' ), /* add new title for taxonomy */
          'new_item_name' => __( 'New authorname' ) /* name title for taxonomy */
        ),
        'show_ui' => true,
        'query_var' => true,
      )
    );
    
    // Add the Price Meta Boxes
    function add_pub_metaboxes() {
      add_meta_box('fab_price', 'Price', 'fab_price', 'publications', 'side', 'default');
    }    





    // The Event Location Metabox
    function fab_price() {
      global $post;
      // Noncename needed to verify where the data originated
      echo '<input type="hidden" name="publicationmeta_noncename" id="publicationmeta_noncename" value="' .
      wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
      // Get the location data if its already been entered
      $price = get_post_meta($post->ID, '_price', true);
      // Echo out the field
      echo '<input type="text" name="_price" value="' . $price  . '" class="widefat" />';

    }
    
    // Save the Metabox Data
    function wpt_save_publications_meta($post_id, $post) {
        // verify this came from the our screen and with proper authorization,
        // because save_post can be triggered at other times
        if ( !wp_verify_nonce( $_POST['publicationmeta_noncename'], plugin_basename(__FILE__) )) {
        return $post->ID;
        }
        // Is the user allowed to edit the post or page?
        if ( !current_user_can( 'edit_post', $post->ID ))
            return $post->ID;
        // OK, we're authenticated: we need to find and save the data
        // We'll put it into an array to make it easier to loop though.
        $publications_meta['_price'] = $_POST['_price'];
        // Add values of $events_meta as custom fields
        foreach ($publications_meta as $key => $value) { // Cycle through the $events_meta array!
            if( $post->post_type == 'revision' ) return; // Don't store custom data twice
            $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
            if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
                update_post_meta($post->ID, $key, $value);
            } else { // If the custom field doesn't have a value
                add_post_meta($post->ID, $key, $value);
            }
            if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
        }
    }
    add_action('save_post', 'wpt_save_publications_meta', 1, 2); // save the custom fields    
    
    /**
     * Get and return the values for the URL and description
     */
    function get_publication_price() {
      global $post;
      $price = get_post_meta( $post->ID, '_price', true );
    
      return $price;
    }    
    
    /*
     * Adding custom columns for our new taxonomies
     */
    
    add_filter( 'manage_publications_posts_columns', 'cpt_columns' );
    add_action('manage_publications_posts_custom_column', 'cpt_custom_column', 10, 2);
    
    function cpt_columns($defaults) {      
        $defaults['year'] = 'Year';
        $defaults['authors'] = 'Authors';
        return $defaults;
    }    
    
    function cpt_custom_column($column_name, $post_id) {
        if($column_name == 'year') {
          $taxonomy = 'publicationdate';
        } else if($column_name == 'authors') {
          $taxonomy = 'author';
        }
        
        $post_type = get_post_type($post_id);
        $terms = get_the_terms($post_id, $taxonomy);
     
        if ( !empty($terms) ) {
            foreach ( $terms as $term )
                $post_terms[] = "<a href='edit.php?post_type={$post_type}&{$taxonomy}={$term->slug}'> " . esc_html(sanitize_term_field('name', $term->name, $term->term_id, $taxonomy, 'edit')) . "</a>";
            echo join( ', ', $post_terms );
        }
        else echo '<i>No terms.</i>';
    }   


