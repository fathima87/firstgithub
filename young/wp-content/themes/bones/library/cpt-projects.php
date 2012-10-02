<?php
/**
 * Projects custom post type
 *
 *
 * @author John Phillips September 2012
 */

/*
 *  The callback which will create our custom post type
 */
add_action( 'init', 'projects');

/*
 * The Custom post type
 *
 * Note the meta box callback (register_meta_box_cb)
 */
function projects() {
	// creating (registering) the custom type
	register_post_type( 'projects', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array(
                        'labels' => array(
                            'name' => __('Projects', 'post type general name'), /* This is the Title of the Group */
                            'singular_name' => __('Project', 'post type singular name'), /* This is the individual type */
                            'add_new' => __('Add New', 'Publication type item'), /* The add new menu item */
                            'add_new_item' => __('Add New Project'), /* Add New Display Title */
                            'edit' => __( 'Edit' ), /* Edit Dialog */
                            'edit_item' => __('Edit Post Types'), /* Edit Display Title */
                            'new_item' => __('New Post Type'), /* New Display Title */
                            'view_item' => __('View Post Type'), /* View Display Title */
                            'search_items' => __('Search Post Type'), /* Search Custom Type Title */
                            'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */
                            'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
                            'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example Project type' ), /* Custom Type Description */
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
                        //Meta box callback
			'register_meta_box_cb' => 'add_project_metaboxes',
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */

}

/*
 * This is the callback to create the meta
 * boxes for this custom post type.
 *
 * It calls the dock meta box functions below
 */
function add_project_metaboxes() {

  add_meta_box(
      'project_meta', //String for use in the 'id' attribute of HTML.
      'Dock 1', //Title of the meta box
      'dock_1_meta_box', //Function that fills the box with the desired content. The function should echo its output.
      'projects', //Optional. The screen on which to show the box (post, page, link). Defaults to current screen.
      'normal', //Optional. The context within the page where the boxes should show ('normal', 'advanced').
      'high' //Optional. The priority within the context where the boxes should show ('high', 'low').
  );
  
}
/*
 * Specify which function to call when the post is saved
 *
 * The function called here will save the meta box data along with the post
 *
 */
add_action('save_post', 'wpt_save_project_meta', 1, 2);

/**
 * This creates the meta box for the first dock
 *
 */
function dock_1_meta_box(){

    //The global post object
    global $post;

    //print out the AJAX search form
    echo SB_search_related_items_form();

    //see if this post has any related items already
    $meta_values = get_post_meta($post->ID, 'SB_related_items');

    //print_r($meta_values);

    echo  '<h4>Currently attached</h4>
                <ul id="currently_attached">';

    if(is_array($meta_values) AND !empty($meta_values[0])){

        global $wpdb;
        
        $number_of_docks = count($meta_values[0]);

        foreach($meta_values[0] as $dock => $items){


            //split ID array into a string
            $IDs = implode(',', $items);

            //query database
            
            $results = $wpdb->get_results("SELECT * from {$wpdb->posts} where ID in ($IDs)");

            //Determine number of results
            $number_of_results = count($results);

            //If there are some, print them out
            if(count($results) != 0){

                for($i = 0; $i <$number_of_results; $i++){
                    ?>

                    <li class="add_related_item"><?php echo $results[$i]->post_title ?>
                        (<em><?php
                            //they come out pluralized, so make them single
                            echo SB_get_type_single_or_plural($results[$i]->post_type)
                        ?></em>) -
                        <input type="checkbox" name="add_related_item[]" value="<?php echo $results[$i]->ID ?>" />
                        <label for="item_order_'+ val +'"> Order: </label>
                        <input type="text" name="item_order_<?php echo $results[$i]->ID ?>" size="2" value ="<?php echo $i+1 ?>"/>

                        <?php for ($n = 1; $n <= $number_of_docks;$n++) :?>
                            
                            <label><?php echo "Dock $n"?></label>
                            <input type="radio"
                                   name="<?php echo $results[$i]->ID."_".$dock ?>"
                                   value ="<?php echo $dock.'_'.$results[$i]->ID ?>"
                                   <?php echo $dock == "dock_$n"? "checked='checked'" : null;?> />

                        <?php endfor;?>

                    </li>

                    <?php

                }

            }

        }

        
    }else{
         echo "<li id='no_related_items'>There are currently no related items</li>";
    }

    echo "</ul>";//Close the <ul>

    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="projectmeta_noncename" id="projectmeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

}


function wpt_save_project_meta($post_id, $post){

    /*

    $data = array(
        'dock_1' =>array('155,194),
        'dock_2' =>array(155,194), 
    );

     a:2:
     {
      s:6:"dock_1";
          a:2:{i:0;s:3:"155";i:1;s:3:"194";}
      s:6:"dock_2";
          a:2:{i:0;s:3:"155";i:1;s:3:"194";}
      }

    */
    update_post_meta($post_id, 'SB_related_items',$data);
    /*
     $_POST will contain something like this

     * 1. An array of the IDs to be attached
        [add_related_item] => Array
            (
                [0] => 155
            )

     * 2. Some item order values with a reference to the ID
        [item_order_155] => int
     */

   // print_r($_POST);exit;
}

/*
 * AJAX
 */
wp_enqueue_script( 'ajax-script', get_template_directory_uri() .'/library/js/admin_scripts.js', array('jquery'), 1.0 ); // jQuery will be included automatically
wp_localize_script( 'ajax-script', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ); // setting ajaxurl

add_action( 'wp_ajax_ajax_action', 'SB_ajax_action' ); // ajax for logged in users


/**
 * Helper funtion which instantiates a SB_related_items class object
 * and operates it based on the AJAX call
 */
function SB_ajax_action() {

        //instantiate class
	$SB_ajax = new SB_related_items();

        //perforn the search
        $results = $SB_ajax->ajax_search($_POST['post']);

        //Determine number of results
        $number_of_results = count($results);

        if($number_of_results != 0){


            echo  '<ul>';

            for($i = 0; $i <$number_of_results; $i++){
                ?>

                <li class="add_related_item"><?php echo $results[$i]->post_title ?> -
                    <input type="checkbox" name="add_related_item[]" value="<?php echo $results[$i]->ID ?>" />
                </li>

                <?php
            }

            echo
            '</ul>
            <p id="add_related_item">Add</p>';



        }else{//no results

            ?>
                <p class="update-nag">No results... are you sure?</p>
            <?php
        }

	die(); // stop executing script
}





