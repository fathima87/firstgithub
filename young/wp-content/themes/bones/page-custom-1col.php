<?php
/*
 * Template Name: One column (no sidebar)
 *
 * This template shows single-column pages.
 *
 * If it is the home page being requested, the 'home' template is called in.
 */

get_header();


if(is_front_page ()){

    /*
     * Get the home page template
     */
    get_template_part('home-page');


}else{

    /*
     * Show the normal one-column layout
     */

    ?>

    <div id="content">

        <header class="article-header clearfix">

            <?php

            get_template_part('temp/page-intro');

            ?>

        </header> <!-- end article header -->


        <div id="main" class="clearfix" role="main">

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">



                            <section class="post-content clearfix" itemprop="articleBody">

                                    <?php the_content(); ?>
                             </section> <!-- end article section -->

                             <footer class="article-footer">

                                    <?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>

                            </footer> <!-- end article footer -->





                    </article> <!-- end article -->

                    <?php endwhile;


                    else :

                        get_template_part('temp/post-not-found');

                     endif; ?>


            <section class="related-content">

            <?php

                get_template_part('temp/dock-1');

            ?>


            </section>

        </div> <!-- end #main -->

    </div> <!-- end #content -->

<?php

}//endif

get_footer(); ?>

