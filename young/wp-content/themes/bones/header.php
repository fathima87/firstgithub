<!doctype html>  

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<head>
		<meta charset="utf-8">
		
		<title><?php wp_title(''); ?></title>
		
		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<!-- mobile meta (hooray!) -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
		<!-- icons & favicons (for more: http://themble.com/support/adding-icons-favicons/) -->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
				
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
			
		<!-- drop Google Analytics Here -->
		<!-- end analytics -->

		<!-- If local... -->
		<?php $baseurl = "http://localhost:8888/" ?>
		
	</head>
	
	<body <?php body_class(); ?>>
	
		<div id="container" class="wrap">
			
			<header class="header" role="banner">
                            
                            <div id="orientation" class="clearfix">
                                
                                <?php

                                get_search_form();

                                ?>
                            </div>
                            <div id="inner-header" class="clearfix">



                                    <!-- to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> -->
                                    <h1 id="logo" class="h1"><a href="<?php echo home_url(); ?>" rel="nofollow"><span></span><?php bloginfo('name'); ?></a></h1>

                                    <!-- if you'd like to use the site description you can un-comment it below -->
                                    <?php // bloginfo('description'); ?>



                                    <nav role="navigation">
                                            <?php bones_main_nav(); // Adjust using Menus in Wordpress Admin ?>
                                    </nav>

                                    <div id="subnav" >

                                        <?php
                                              if($post->post_parent) {
                                              $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0&depth=1");
                                       
                                              }

                                              else {
                                              $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&depth=1");

                                              }
                                              if ($children) { ?>


                                              <ul>
                                              <?php echo $children; ?>
                                            </ul>

                                                <?php } ?>

                                    </div>

                            </div> <!-- end #inner-header -->
			
			</header> <!-- end header -->
