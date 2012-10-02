<?php
/**
 * Single
 *
 * This page displays a single blog post
 */


get_header();
?>


<div id="content" class="custom-2col">

       <div id="main" class="eightcol first clearfix" role="main">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                                <header class="article-header">

                                        <h2 class="single-title" itemprop="headline"><?php the_title(); ?></h2>

                                        <p class="meta"><?php _e("Posted", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("by", "bonestheme"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "bonestheme"); ?> <?php the_category(', '); ?>.</p>

                                </header> <!-- end article header -->

                                <section class="post-content clearfix" itemprop="articleBody">
                                        <?php the_content(); ?>
                                </section> <!-- end article section -->

                                <footer class="article-footer">

                                        <?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>

                                </footer> <!-- end article footer -->

                                <?php comments_template(); // comments should go inside the article element ?>

                        </article> <!-- end article -->

                <?php endwhile;


                else :

                    get_template_part('temp/post-not-found');

                 endif; ?>


    </div> <!-- end #main -->

    <?php  get_sidebar(); ?>

</div> <!-- end #content -->

<?php get_footer(); ?>
