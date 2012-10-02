<?php
/**
 * Single Project post type
 *
 * @author  John Phillips
 * 
 */
?>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">

					<?php get_sidebar(); // sidebar 1 ?>
			
				    <div id="main" class="eightcol last clearfix" role="main">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						    <header class="article-header">
							
							    <h2><?php the_title(); ?></h2>
							
                                                        <p class="meta"><?php _e("Posted", "bonestheme"); ?>
                                                            <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time>
                                                            <?php _e("by", "bonestheme"); ?>
                                                            <?php the_author_posts_link(); ?>
                                                            <span class="amp">&</span>
                                                            <?php _e("filed under", "bonestheme"); ?>
                                                            <?php //echo get_the_term_list( get_the_ID(), 'custom_cat', "" ) ?>.
                                                        </p>
						
						    </header> <!-- end article header -->
					
						    <section class="post-content clearfix">
							
							    <?php the_content(); ?>
					
						    </section> <!-- end article section -->
						
						    <footer class="article-header">
			
							    <p class="tags"><?php //echo get_the_term_list( get_the_ID(), 'custom_tag', '<span class="tags-title">Custom Tags:</span> ', ', ' ) ?></p>
							
						    </footer> <!-- end article footer -->
						
						    <?php comments_template(); // you may not need this ?>
					
					    </article> <!-- end article -->
					
					    <?php endwhile; ?>			
					
					    <?php else : ?>
					
        					<article id="post-not-found" class="hentry clearfix">
        						<header class="article-header">
        							<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
        						</header>
        						<section class="post-content">
        							<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
        						</section>
        						<footer class="article-footer">
        						    <p><?php _e("This is the error message in the single-custom_type.php template.", "bonestheme"); ?></p>
        						</footer>
        					</article>
					
					    <?php endif; ?>
			
				    </div> <!-- end #main -->
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>