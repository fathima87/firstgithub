

/*
 * AJAX search
 *
 * This takes a live query and passes it to the relevant post
 * type (e.g. cpt-project), where it is processed.
 *
 * Note: Uses Jquery's .post(), which takes the following params

    - url       A string containing the URL to which the request is sent.
    - data      A map or string that is sent to the server with the request.
    - success   (data, textStatus, jqXHR)A callback function that is executed if the request succeeds.
    - dataType  The type of data expected from the server. Default: Intelligent Guess (xml, json, script, text, html).
 *
 */
jQuery(function($){
    
    $('.SB_ajax_search').live('click',
    
        function () {
            $.post(
                //URL - WP provides this
                ajax_object.ajaxurl,
                //data - we define these
                {   action: 'ajax_action',
                    method: 'ajax_search',
                    post: $(this).siblings("input, select").serialize()
                },
                //Success callback
                function(data) {
                    console.log(data);
                      $('.SB_ajax .results').html(data);
                });

        }
    );
});

/**
 * Add related item
 *
 * Takes a related item produced in the search results and inserts it into
 * the DOM along with the other currently attached items. This means that it
 * will be added along with them when the post is updated.
 *
 * Makes use of JQuery's live() function because we are accessing behaviors
 * from elements which weren't necessarily there when the page was first
 * rendered.
 *
 */
jQuery(function($){

    $('#add_related_item').live('click',

        function () {
            //If any of the checkboxes are ticked
            if($(".add_related_item").children('input:checked').length !== 0){

                //get rid of the 'no related items' message
                $('#no_related_items').remove();
                //show the 'related items' message
                $('#update_items').show();


                $(".add_related_item").each(function(){

                    if($(this).children('input:checked')){

                        //get the post ID of the checked item
                        var val = $(this).children('input:checked').val();
                        //insert a text field so an order can be given
                        $(this).children('input:checked').
                            after('<label for="item_order_'+ val +'"> Order: </label><input type="text" name="item_order_'+ val +'" size="2" />');
                        //append the HTML to the 'attached' list
                        $('#currently_attached').append($(this));
                    }
                });
            }

        }
     );
});