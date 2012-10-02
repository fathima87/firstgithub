<?php
/* Bones Event Type Example
This page walks you through creating 
a Event type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a seperate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/


// let's create the function for the Event
function event() { 
	// creating (registering) the Event 
	register_post_type( 'events', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Events', 'post type general name'), /* This is the Title of the Group */
			'singular_name' => __('Event', 'post type singular name'), /* This is the individual type */
			'add_new' => __('Add New', 'Event type item'), /* The add new menu item */
			'add_new_item' => __('Add New Event'), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __('Edit Event'), /* Edit Display Title */
			'new_item' => __('New Event'), /* New Display Title */
			'view_item' => __('View Event'), /* View Display Title */
			'search_items' => __('Search Event'), /* Search Event Title */ 
			'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example Event type' ), /* Event Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the Event type menu */
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'has_archive' => true,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this ads your post categories to your Event type */
	register_taxonomy_for_object_type('category', 'events');
	/* this ads your post tags to your Event type */
	register_taxonomy_for_object_type('post_tag', 'events');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'event');
	
  // 4. Show Meta-Box
  
  add_action( 'admin_init', 'events_create' );
  
  function events_create() {
      add_meta_box('events_meta', 'Events', 'events_meta', 'events');
      add_meta_box('young_venue', 'Venue', 'young_venue', 'events', 'side', 'default');
  }
  
  function events_meta () {
  
      // - grab data -
  
      global $post;
      $custom = get_post_custom($post->ID);
      $meta_sd = $custom["events_startdate"][0];
      $meta_ed = $custom["events_enddate"][0];
      $meta_st = $meta_sd;
      $meta_et = $meta_ed;
  
      // - grab wp time format -
  
      $date_format = get_option('date_format'); // Not required in my code
      $time_format = get_option('time_format');
  
      // - populate today if empty, 00:00 for time -
  
      if ($meta_sd == null) { $meta_sd = time(); $meta_ed = $meta_sd; $meta_st = 0; $meta_et = 0;}
  
      // - convert to pretty formats -
  
      $clean_sd = date("D, M d, Y", $meta_sd);
      $clean_ed = date("D, M d, Y", $meta_ed);
      $clean_st = date($time_format, $meta_st);
      $clean_et = date($time_format, $meta_et);
  
      // - security -
  
      echo '<input type="hidden" name="tf-events-nonce" id="tf-events-nonce" value="' .
      wp_create_nonce( 'tf-events-nonce' ) . '" />';
  
      // - output -
  
      ?>
      <div class="tf-meta">
          <ul>
              <li><label>Start Date</label><input name="events_startdate" class="tfdate" value="<?php echo $clean_sd; ?>" /></li>
              <li><label>Start Time</label><input name="events_starttime" value="<?php echo $clean_st; ?>" /><em>Use 24h format (7pm = 19:00)</em></li>
              <li><label>End Date</label><input name="events_enddate" class="tfdate" value="<?php echo $clean_ed; ?>" /></li>
              <li><label>End Time</label><input name="events_endtime" value="<?php echo $clean_et; ?>" /><em>Use 24h format (7pm = 19:00)</em></li>
          </ul>
      </div>
      <?php
  }
  
  // 5. Save Data
  
  add_action ('save_post', 'save_events');
  
  function save_events(){
  
      global $post;
  
      // - still require nonce
  
      if ( !wp_verify_nonce( $_POST['tf-events-nonce'], 'tf-events-nonce' )) {
          return $post->ID;
      }
  
      if ( !current_user_can( 'edit_post', $post->ID ))
          return $post->ID;
  
      // - convert back to unix & update post
  
      if(!isset($_POST["events_startdate"])):
          return $post;
          endif;
          $updatestartd = strtotime ( $_POST["events_startdate"] . $_POST["events_starttime"] );
          update_post_meta($post->ID, "events_startdate", $updatestartd );
  
      if(!isset($_POST["events_enddate"])):
          return $post;
          endif;
          $updateendd = strtotime ( $_POST["events_enddate"] . $_POST["events_endtime"]);
          update_post_meta($post->ID, "events_enddate", $updateendd );
  
  }
  
  // 7. JS Datepicker UI
  
  function events_styles() {
      global $post_type;
      if( 'events' != $post_type )
          return;
      wp_enqueue_style('ui-datepicker', get_bloginfo('template_url') . '/library/css/jquery-ui-1.8.9.custom.css');
  }
  
  //Event meta box - venue
    
    // The Event Location Metabox
    function fab_venue() {
      global $post;
      // Noncename needed to verify where the data originated
      echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
      wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
      // Get the location data if its already been entered
      $venue = get_post_meta($post->ID, '_venue', true);
      // Echo out the field
      echo '<input type="text" name="_venue" value="' . $venue  . '" class="widefat" />';
    }
    
    // Save the Metabox Data
    function wpt_save_events_meta($post_id, $post) {
        
        // verify this came from the our screen and with proper authorization,
        // because save_post can be triggered at other times
        if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
        return $post->ID;
        }
        
        // Is the user allowed to edit the post or page?
        if ( !current_user_can( 'edit_post', $post->ID ))
            return $post->ID;
        // OK, we're authenticated: we need to find and save the data
        // We'll put it into an array to make it easier to loop though.
        $events_meta['_venue'] = $_POST['_venue'];
        // Add values of $events_meta as custom fields
        foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
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
    add_action('save_post', 'wpt_save_events_meta', 1, 2); // save the custom fields    
    
    function get_event_venue() {
      global $post;
      
      $venue = get_post_meta( $post->ID, '_venue', true );
      
      return $venue;
    }
    
    function get_event_date() {
      global $post;
      
      $date = get_post_meta( $post->ID, 'events_startdate', true );
      
      return $date;
    }    
  
  
  
  function events_scripts() {
      global $post_type;
      if( 'events' != $post_type )
      return;
      wp_enqueue_script('jquery-ui', get_bloginfo('template_url') . '/library/js/libs/admin/jquery-ui-1.8.9.custom.min.js', array('jquery'));
      wp_enqueue_script('ui-datepicker', get_bloginfo('template_url') . '/library/js/libs/admin/jquery.ui.datepicker.min.js');
      wp_enqueue_script('custom_script', get_bloginfo('template_url').'/library/js/libs/admin/pubforce-admin.js', array('jquery'));
  }
  
  add_action( 'admin_print_styles-post.php', 'events_styles', 1000 );
  add_action( 'admin_print_styles-post-new.php', 'events_styles', 1000 );
  
  add_action( 'admin_print_scripts-post.php', 'events_scripts', 1000 );
  add_action( 'admin_print_scripts-post-new.php', 'events_scripts', 1000 );    

?>