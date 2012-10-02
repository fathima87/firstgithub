<?php
/*
Template Name: People
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

					    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

						    <header class="article-header">

							    <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

						    </header> <!-- end article header -->

						    <section class="post-content clearfix">

							    <?php the_content(); ?>

								<section class="related-content">

									<div class="fourcol" style="margin-left: 0">
                                                                            <a href="<?php echo home_url(); ?>/our-library/publication-example/">
                                                                                <img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder2.gif" />
                                                                            </a>
                                                                            <a href="<?php echo home_url(); ?>/our-library/publication-example/">
                                                                                <h4>Publication Title</h4>
                                                                            </a>

                                                                                <hr/>

                                                                                <p><strong>Author</strong></p>
                                                                                <p>Praesent tincidunt gravida eros sit amet dapibus. Curabitur mattis nibh sed purus elementum ac porttitor magna dictum. Sed facilisis pretium nulla a pellentesque.</p>
									</div>

									<div class="fourcol">
										<a href="<?php echo home_url(); ?>/our-library/publication-example/">
                                                                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder2.gif" />
                                                                                </a>
                                                                                <a href="<?php echo home_url(); ?>/our-library/publication-example/"><h4>Publication Title</h4></a>

                                                                                        <hr/>

                                                                                        <p><strong>Author</strong></p>
                                                                                        <p>Donec et sapien augue, feugiat iaculis justo. Maecenas vulputate arcu ac quam vulputate molestie. Vivamus elementum faucibus faucibus.</p>
									</div>

									<div class="fourcol">
										<a href="<?php echo home_url(); ?>/our-library/publication-example/">
                                                                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder2.gif" />
                                                                                </a>
											<a href="<?php echo home_url(); ?>/our-library/publication-example/"><h4>Publication Title</h4></a>

												<hr/>

												<p><strong>Author</strong></p>
												<p>Donec auctor orci non orci vehicula sed congue mi pellentesque. Duis quis neque a tortor gravida porta sit amet sed nibh. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
									</div>


								</section>
								<section class="related-content">

									<div class="fourcol" style="margin-left: 0">
                                                                            <a href="<?php echo home_url(); ?>/our-library/publication-example/">
                                                                                <img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder2.gif" />
                                                                            </a>
                                                                            <a href="<?php echo home_url(); ?>/our-library/publication-example/"><h4>Publication Title</h4></a>

                                                                            <hr/>

                                                                            <p><strong>Author</strong></p>
                                                                            <p>Praesent tincidunt gravida eros sit amet dapibus. Curabitur mattis nibh sed purus elementum ac porttitor magna dictum. Sed facilisis pretium nulla a pellentesque.</p>
									</div>

									<div class="fourcol">
										<a href="<?php echo home_url(); ?>/our-library/publication-example/">
                                                                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder2.gif" /></a>
											<a href="<?php echo home_url(); ?>/our-library/publication-example/"><h4>Publication Title</h4></a>

												<hr/>

												<p><strong>Author</strong></p>
												<p>Donec et sapien augue, feugiat iaculis justo. Maecenas vulputate arcu ac quam vulputate molestie. Vivamus elementum faucibus faucibus.</p>
									</div>

									<div class="fourcol">
										<a href="<?php echo home_url(); ?>/our-library/publication-example/">
                                                                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder2.gif" /></a>
											<a href="<?php echo home_url(); ?>/our-library/publication-example/"><h4>Publication Title</h4></a>

												<hr/>

												<p><strong>Author</strong></p>
												<p>Donec auctor orci non orci vehicula sed congue mi pellentesque. Duis quis neque a tortor gravida porta sit amet sed nibh. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
									</div>


								</section>
								<section class="related-content">

									<div class="fourcol" style="margin-left: 0">
										<a href="<?php echo home_url(); ?>/our-library/publication-example/">
                                                                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder2.gif" /></a>
											<a href="<?php echo home_url(); ?>/our-library/publication-example/"><h4>Publication Title</h4></a>

												<hr/>

												<p><strong>Author</strong></p>
												<p>Praesent tincidunt gravida eros sit amet dapibus. Curabitur mattis nibh sed purus elementum ac porttitor magna dictum. Sed facilisis pretium nulla a pellentesque.</p>
									</div>

									<div class="fourcol">
										<a href="<?php echo home_url(); ?>/our-library/publication-example/">
                                                                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder2.gif" /></a>
											<a href="<?php echo home_url(); ?>/our-library/publication-example/"><h4>Publication Title</h4></a>

												<hr/>

												<p><strong>Author</strong></p>
												<p>Donec et sapien augue, feugiat iaculis justo. Maecenas vulputate arcu ac quam vulputate molestie. Vivamus elementum faucibus faucibus.</p>
									</div>

									<div class="fourcol">
										<a href="<?php echo home_url(); ?>/our-library/publication-example/">
                                                                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2012/08/placeholder2.gif" /></a>
											<a href="<?php echo home_url(); ?>/our-library/publication-example/"><h4>Publication Title</h4></a>

												<hr/>

												<p><strong>Author</strong></p>
												<p>Donec auctor orci non orci vehicula sed congue mi pellentesque. Duis quis neque a tortor gravida porta sit amet sed nibh. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
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