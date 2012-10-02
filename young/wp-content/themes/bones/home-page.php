<?php
/* 
 * Home page template
 */

?>
<div id="content">

        <header class="article-header clearfix">

            <?php

            get_template_part('temp/home-intro');

            ?>

        </header> <!-- end article header -->


        <div id="main" class="clearfix" role="main">

            <?php

            /*
             * No time to do anything clever here.
             *
             */
            $pages = array(
                "Research",
                "Advisory",
                "Ventures",

                "Community & housing",
                "Education & employment",
                "Health & ageing",
                "Social innovation & investment",


                "People",
                "Partners",
                "Network"
                );

            $links = array();

            foreach($pages as $page){
                $p = get_page_by_title($page);
                $links[$page] = get_permalink($p->ID);
            }

            get_page_link($id, $leavename, $sample);

            ?>
          
            <div class="fourcol first home-page-item">
                <h2>We do this</h2>
                <img style="width:100%" src="<?php echo  get_template_directory_uri(); ?>/library/images/ball-of-wool.jpg" alt="" />
                <h3><a href="<?php echo $links['Research'] ?>">Research</a></h3>
                <h3><a href="<?php echo $links['Advisory'] ?>">Applied innovation</a></h3>
                <h3><a href="<?php echo $links['Ventures'] ?>">Ventures</a></h3>
                
            </div>
            <div class="fourcol home-page-item">
                <h2>In these areas</h2>
                <img style="width:100%"  src="<?php echo  get_template_directory_uri(); ?>/library/images/old-lady.jpg" alt="" />
                <h3><a href="<?php echo $links['Community & housing'] ?>">Community & housing</a></h3>
                <h3><a href="<?php echo $links['Education & employment'] ?>">Education & employment</a></h3>
                <h3><a href="<?php echo $links['Health & ageing'] ?>">Health & ageing</a></h3>
                <h3><a href="<?php echo $links['Social innovation & investment'] ?>">Social innovation & investment</a></h3>

            </div>
            <div class="fourcol last home-page-item">
                <h2>With these people</h2>
                <img  style="width:100%" src="<?php echo  get_template_directory_uri(); ?>/library/images/young-lady.jpg" alt="" />
                <h3><a href="<?php echo $links['People'] ?>">Overview</a></h3>
                <h3><a href="<?php echo $links['Partners'] ?>">Partners</a></h3>
                <h3><a href="<?php echo $links['Network'] ?>">Network</a></h3>

            </div>
      
            

        

        </div> <!-- end #main -->

    </div> <!-- end #content -->