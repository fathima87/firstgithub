<?php
/*
Template Name: Event Single
*/
?>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">

					<div id="main-image">

				    		<img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder.gif" alt="" />
				    		
				    </div>
			
				    <div id="main" class="eightcol last clearfix" role="main">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						    <header class="article-header">
							
							    <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>							    
						
						    </header> <!-- end article header -->
					
						    <section class="post-content clearfix" itemprop="articleBody">

							    <?php the_content(); ?>
							</section> <!-- end article section -->

								<section class="related-content">

									<div class="fourcol" style="margin-left: 0">
										<a href="<?php echo home_url(); ?>/events/example-event/">
                                                                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder2.gif" /></a>
											<h4><a href="<?php echo home_url(); ?>/events/example-event/">Care 4 Care at the London Design Festival</a></h4>

												<hr/>

												<p><strong>
													14th September 2012,<br/>
													V&amp;A Museum
												</strong></p>
												<p>The team from Care4Care explore the process of designing social enterprises at the V&amp;A Museum as part of the London Design Festival.</p>
									</div>

									<div class="fourcol">
										<a href="<?php echo home_url(); ?>/events/example-event/">
                                                                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder2.gif" /></a>
											<h4><a href="<?php echo home_url(); ?>/events/example-event/">Interrogate!<br/> Happiness Festival</a></h4>

												<hr/>

												<p><strong>
													13th October 2012,<br/>
													Dartington Hall
												</strong></p>
												<p>Join the Young Foundation and Action for Happiness at Dartington for the Interrogate! Happiness Festival, your chance to spend a weekend looking at what makes us happy.</p>
									</div>

									<div class="fourcol">
										<a href="<?php echo home_url(); ?>/events/example-event/">
                                                                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder2.gif" /></a>
											<h4><a href="<?php echo home_url(); ?>/events/example-event/">An evening with<br/> Ruby Wax</a></h4>

												<hr/>

												<p><strong>
													15th October 2012,<br/>
													Conway Hall
												</strong></p>
												<p>Join Action for Happiness at a special preview of the new Ruby Wax show.</p>
									</div>


								</section>
						
						    <footer class="article-footer">
			
							    <?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>
							
						    </footer> <!-- end article footer -->
					
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
    					    	    <p><?php _e("This is the error message in the page.php template.", "bonestheme"); ?></p>
    					    	</footer>
    					    </article>
					
					    <?php endif; ?>
			
    				</div> <!-- end #main -->
    
				    <?php get_sidebar(); // sidebar 1 ?>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>