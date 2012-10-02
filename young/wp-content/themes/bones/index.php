<?php
/**
 * Blog page
 *
 * this page lists blog posts
 */


get_header();

?>
			

<div id="content" class="custom-2col">

     <header class="article-header clearfix">

        <?php
        
        $title = "Blog";

        include('temp/page-intro.php');

        ?>

    </header> <!-- end article header -->


    <div id="main" class="item-list" role="main">



   

            <?php


            if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

                    <header class="article-header">

                            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

                            <p class="meta">
                                <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time(get_option('date_format')); ?></time>                             
                            </p>

                    </header> <!-- end article header -->

                    <section class="post-content clearfix">

                        <?php 
                        
                        if ( has_post_thumbnail() )     the_post_thumbnail();

                        the_excerpt();

                        ?>
                    </section> <!-- end article section -->

                    <footer class="article-footer">

                        <p class="tags"><?php the_tags('<span class="tags-title">Tags:</span> ', ', ', ''); ?></p>

                    </footer> <!-- end article footer -->



            </article> <!-- end article -->

            <?php endwhile; 
            
            
                if (function_exists('bones_page_navi')) { // if experimental feature is active

                    bones_page_navi(); // use the page navi function

                } else { // if it is disabled, display regular wp prev & next links ?>
                            <nav class="wp-prev-next">
                                    <ul class="clearfix">
                                            <li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', 'bonestheme')) ?></li>
                                            <li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', 'bonestheme')) ?></li>
                                    </ul>
                            </nav>
                    <?php

                }



            else :

                    get_template_part('temp/post-not-found');

             endif; ?>


    </div> <!-- end #main -->

    <?php  get_sidebar(); ?>

</div> <!-- end #content -->

<?php get_footer(); ?>