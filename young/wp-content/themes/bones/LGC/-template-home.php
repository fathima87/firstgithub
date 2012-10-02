<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">

					<?php get_sidebar(); // sidebar 1 ?>

					<div id="main-image">

				    		
				    		
				    </div>
			
				    <div id="main" class="ninecol last clearfix" role="main">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
					
						    <section class="post-content clearfix">

							    <?php the_content(); ?>

								<section class="related-content">

									<div class="heading3-container">
										<div class="heading3">
											<h3>Highlights</h3>
										</div>
									</div>

									<div class="clearfix"></div>

									<div class="fourcol" style="margin-left: 0">
										<img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder2.gif" />
											<h4>Highlight 1</h4>

												<hr/>

												<p>Maecenas egestas fringilla nibh eget vehicula. Etiam lacinia sagittis orci, ut ultrices dolor venenatis et. Vestibulum sed mauris nec est condimentum vehicula ut sed ipsum.</p>
									</div>

									<div class="fourcol">
										<img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder2.gif" />
											<h4>Highlight 2</h4>

												<hr/>

												<p>Maecenas egestas fringilla nibh eget vehicula. Etiam lacinia sagittis orci, ut ultrices dolor venenatis et. Vestibulum sed mauris nec est condimentum vehicula ut sed ipsum.</p>
									</div>

									<div class="fourcol">
										<img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder2.gif" />
											<h4>Highlight 3</h4>

												<hr/>

												<p>Maecenas egestas fringilla nibh eget vehicula. Etiam lacinia sagittis orci, ut ultrices dolor venenatis et. Vestibulum sed mauris nec est condimentum vehicula ut sed ipsum.</p>
									</div>


								</section>

								<section class="related-content">

									<div class="fourcol" style="margin-left: 0">
										<a href="<?php echo home_url(); ?>/events/example-event/"><img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder2.gif" /></a>
											<a href="<?php echo home_url(); ?>/events/example-event/"><h4>Care 4 Care at the London Design Festival</h4></a>

												<hr/>

												<p><strong>
													14th September 2012,<br/>
													V&amp;A Museum
												</strong></p>
												<p>The team from Care4Care explore the process of designing social enterprises at the V&amp;A Museum as part of the London Design Festival.</p>
									</div>

									<div class="fourcol">
										<a href="<?php echo home_url(); ?>/events/example-event/"><img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder2.gif" /></a>
											<a href="<?php echo home_url(); ?>/events/example-event/"><h4>Interrogate!<br/> Happiness Festival</h4></a>

												<hr/>

												<p><strong>
													13th October 2012,<br/>
													Dartington Hall
												</strong></p>
												<p>Join the Young Foundation and Action for Happiness at Dartington for the Interrogate! Happiness Festival, your chance to spend a weekend looking at what makes us happy.</p>
									</div>

									<div class="fourcol">
										<img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder2.gif" />
											<h4>Our Ventures</h4>

												<hr/>

												<p>Maecenas egestas fringilla nibh eget vehicula. Etiam lacinia sagittis orci, ut ultrices dolor venenatis et. Vestibulum sed mauris nec est condimentum vehicula ut sed ipsum.</p>
									</div>


								</section>
						    </section> <!-- end article section -->
						
						    <footer class="article-footer">

    							<p class="tags"><?php the_tags('<span class="tags-title">Tags:</span> ', ', ', ''); ?></p>

						    </footer> <!-- end article footer -->
						    
						    <?php // comments_template(); // uncomment if you want to use them ?>
					
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
        						    <p><?php _e("This is the error message in the page-custom.php template.", "bonestheme"); ?></p>
        						</footer>
        					</article>
					
					    <?php endif; ?>
			
				    </div> <!-- end #main -->
    
				    <?php get_sidebar(); // sidebar 1 ?>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>