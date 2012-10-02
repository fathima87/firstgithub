<?php
/*
Template Name: Two column (has sidebar)
*/


get_header(); ?>

<div id="content" class="custom-2col">

    <header class="article-header clearfix">

        <?php

        get_template_part('temp/page-intro');

        ?>

    </header> <!-- end article header -->


    <div id="main" class="custom-2col" role="main">

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



        <div class="related-content">

        <?php

            get_template_part('temp/dock-1');

        ?>

        </div>

    </div> <!-- end #main -->

    <?php  get_sidebar(); ?>

</div> <!-- end #content -->

<?php get_footer(); ?>

