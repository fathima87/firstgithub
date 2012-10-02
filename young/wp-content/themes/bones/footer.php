			<footer class="footer clearfix" role="contentinfo" style="border: 1px solid black;">
			
                            <div id="inner-footer">
                                <?php
                                /*
                                 * No time to do this properly
                                 */
                                $links = array(
                                    get_page_by_title( 'About us' ),get_page_by_title( 'Our Approach' ),get_page_by_title( 'Our Work' )
                                );

                                $n = 0;
                                foreach($links as $object){

                                    $class  = $n==0? " first": null;

                                    echo "<div class='fourcol$class'>",
                                            "<h3><a href='".get_permalink( $object->ID )."'>$object->post_title</a></h3>",
                                            "<ul>";

                                            wp_list_pages("title_li=&child_of=$object->ID&depth=1");

                                    echo "</ul></div>";

                                    $n ++;
                                }

                                ?>


                                            <?php //bones_footer_links(); // Adjust using Menus in Wordpress Admin 
                                            /*
                                            <!-- AddThis Button BEGIN 
                                            <div class="addthis_toolbox addthis_default_style ">
                                            <a class="addthis_button_preferred_1"></a>
                                            <a class="addthis_button_preferred_2"></a>
                                            <a class="addthis_button_preferred_3"></a>
                                            <a class="addthis_button_preferred_4"></a>
                                            <a class="addthis_button_compact"></a>
                                            <a class="addthis_counter addthis_bubble_style"></a>
                                            </div>
                                            <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-50335e4549a2215b"></script>
                                            <!-- AddThis Button END 
                                            </nav>-->
                                            */
                                            ?>
                            </div>
				
			</footer> <!-- end footer -->
		
		</div> <!-- end #container -->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>