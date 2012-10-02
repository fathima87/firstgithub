<?php
/**
 * Related items class
 * -------------------
 *
 * Simple getter-setter class designed to work with the following table:

    CREATE TABLE `sb_related_items` (

        `item_id`       bigint(20)  unsigned    NOT NULL    AUTO_INCREMENT,
        `post_id`       bigint(20)  unsigned    NOT NULL    DEFAULT '0',
        `item_key`      varchar(255)                        DEFAULT NULL,
        `item_value`    longtext,
        `type`          varchar(255)                        DEFAULT NULL,
        `order`         bigint(20)  unsigned    NOT NULL    DEFAULT '0',

        PRIMARY KEY (`item_id`)

    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

 */
class SB_related_items {    
    /**
     * Returns a search query from posts table
     *
     * This is required in the admin area meta boxes.
     *
     * @param   string   $post   The [post] array from $_POST
     * @return  mixed    Results array or false
     * @todo    Need to make the search query exclude items that are already attached.
     */
    public function ajax_search($post){

        //we need to extract the $_POST variables from the string sent by AJAX.
        $vars = array();

        if(is_string($post))
            parse_str($post, $vars);
        else
            return false;

        //Query WP global database connection
        global $wpdb;

        $q = "SELECT * from {$wpdb->posts} where post_title like '%{$vars['post_title']}%' and post_type = '{$vars['post_type']}'";

        return $wpdb->get_results($q);
    }
    /**
     * Set related item meta data
     *
     * @param   int     $post_ID    The ID of the post you are adding meta to
     * @param   array   $items      The items which are being added to the post meta
     * @param   array   $options
     */
    public function set_related_items($post_ID, $items, $options = array()){

    }
    /**
     * Get items from table
     *
     * @param int   $post_ID
     * @param array $options
     */
    public function get_related_items($post_ID, $options = array()){
        
    }
   

}//End class


/**
 * Useful function which tells you the plural/single term for
 * one of the custom post types
 *
 * @param string $string
 * @param bool $capitalize
 * @return mixed
 */
function SB_get_type_single_or_plural($string, $capitalize = false){

    $pluralize = array(
        'person'=>'people',
        'publication'=>'publications',
        'project'=>'projects',
        'event'=>'events',
        'post'=>'posts',
    );

    $ensingleify = array_flip($pluralize);


    if(array_key_exists($string, $pluralize)){

        return $capitalize == false?
            $pluralize[$string] : ucfirst($pluralize[$string]);

    }elseif(array_key_exists($string, $ensingleify)){

        return $capitalize == false?
            $ensingleify[$string] : ucfirst($ensingleify[$string]);

    }else{
        //No idea
        return false;
    }
}


/**
 * Produces the admin ajax form for use in the meta boxes
 *
 * @return string
 */
function SB_search_related_items_form(){


    ob_start();
    ?>
        <div class="SB_ajax">
            <h4>Attach an item</h4>

            <div class="SB_search_query">
                <label for="post_title">Search for a related item:</label>
                <input type="text" name="post_title" value="test" />

                <label for="post_type"> ...of type: </label>
                <select name="post_type">
                    <option value="publications">Publication</option>
                    <option value="projects">Project</option>
                    <option value="people">Person</option>
                    <option value="post">post</option>
                </select>
                <p class="SB_ajax_search">Go</p>

            </div>

            <div class="results"></div>

            <input type="hidden" value="<?php echo $post->ID?>" name="post_id" id="SB_post_id" />

        </div>

    <?php

    return ob_get_clean();

}