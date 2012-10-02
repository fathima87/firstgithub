<?php
/*
Template Name: Sub-page
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
									<img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder2.gif" />
										<h4>Optional Module 1</h4>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque feugiat ipsum et libero auctor ac tempus neque porta. Suspendisse quam enim, ultrices eget mollis quis, volutpat eget purus.</p>
								</div>

								<div class="fourcol">
									<img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder2.gif" />
										<h4>Optional Module 2</h4>
											<p>Nulla eget sapien ligula, in porttitor turpis. Proin ut massa ante. Etiam aliquet suscipit turpis eu semper. Sed luctus facilisis turpis eget aliquet.</p>
								</div>

								<div class="fourcol">
									<img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder2.gif" />
										<h4>Optional Module 3</h4>
											<p>Morbi tristique, mi et mattis dapibus, purus dolor sagittis leo, eu convallis lorem urna non urna. In auctor lacus sed nibh aliquet eget lobortis tortor fringilla. Morbi ac dui in metus posuere consequat eu quis nulla.</p>
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