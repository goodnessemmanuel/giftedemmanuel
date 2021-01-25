<?php
    get_header();

    $portfolio_bio = new WP_Query(
        array(
            'post_type' => 'biography',
            'posts_per_page' => 1
        )
    );

    $about_me = [ 'tagline' => 'A brief history of my professional life', 
                            'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
                        ];
    $phone = '(+234)76 000 0000';
    $contact_image_url = get_theme_file_uri('/assets/images/envelope.png');
    $contact_address = '#1 brutal determination, success unstoppable residence';

    if ($portfolio_bio->have_posts()){
        while ($portfolio_bio->have_posts()){
            $portfolio_bio->the_post();
            the_content();
        }
    }

       
    $portfolioProjects = new WP_Query(
        array(
            'post_type' => 'project',
            'posts_per_page' => 6
        )
    );
?>
<?php if ($portfolioProjects->have_posts()): ?>
<!--==========================portfolio area========================-->
<section class="port_area" id="portfolio">
    <div class="section_title">
        <h2>Portfolio</h2>
    </div>
    <div class="port_menu">
        <ul>
            <li class="active" data-filter="*"><a href="">All Projects</a></li>
        <?php while ($portfolioProjects->have_posts()):
            $portfolioProjects->the_post();
            $projectCategory = get_field('project_category');
        ?>
            <li data-filter="<?php echo '.' . $projectCategory ?>"><a href=""><?php echo $projectCategory ?></a></li>
        <?php endwhile; ?>
        </ul>
    </div>

    <div class="row">
        <div class="container port_item_wrapper">
            <?php while ($portfolioProjects->have_posts()): $portfolioProjects->the_post(); ?>
            <div class="col-md-6 col-lg-4 <?php the_field('project_category') ?>">
                <div class="port_item">
                    <div class="port_img">
                    <?php
                        if (has_post_thumbnail($portfolioProjects->post)):
                            the_post_thumbnail();
                        else:  ?>
                        <img src="<?php echo get_theme_file_uri('/assets/images/portfolio/aga.PNG')?>" alt="">
                    <?php endif;  ?>
                    </div>
                    <div class="port_text">
                        <a href=<?php the_permalink() ?>><h4><?php the_title(); ?></h4></a>
                        <p><?php echo wp_trim_words(get_the_content(), 15, ''); ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<!--=======================end portfolio area========================-->
<?php endif;

    $portfolioSkills = new WP_Query(
        array(
            'post_type' => 'skill',
            'posts_per_page' => 4
        )
    );
?>
<!--=======================About me========================-->
<section class="about" id="about">
    <div class="container">
        <div class="section_title">
            <h2><b>About Me</b></h2>
            <p><i><?php echo $about_me['tagline']; ?></i></p>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 wow fadeInUp animated">
                <p> <?php echo $about_me['content']; ?> </p>
            </div><!--end column-->
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="row"><?php if($portfolioSkills->have_posts()): ?>
                    <?php while($portfolioSkills->have_posts()): $portfolioSkills->the_post(); ?>
                    <div class="col-sm-6 col-md-3 col-lg-6">
                        <div class="radial-prog-area">
                            <div class="radial-progress wow fadeInLeft animated"
                                 data-prog-percent="<?php the_field('proficiency'); ?>">
                                <div></div>
                                <h6 class="progress-title"><?php the_title(); ?></h6>
                            </div>
                        </div><!-- radial-prog-area-->
                    </div><!-- col-sm-6-->
                    <?php endwhile; ?>
                </div><?php endif; ?><!--end inner row-->
            </div><!--end column-->
        </div><!--end row-->
    </div>
</section>
<!--=======================End About me========================-->
<?php
    $portfolio_education = new WP_Query(
        array(
            'post_type' => 'education',
            'posts_per_page' => 4
        )
    );

    if ( $portfolio_education->have_posts() ) :
    ?>
<!--=======================Education========================-->
<section class="edu_area" id="education">
    <div class="container">
        <div class="section_title">
            <h2><b>Education</b></h2>
            <p><i>Academic background/Institutions attended</i></p>
        </div>
        <div class="education-content"><?php 
             while( $portfolio_education->have_posts() ) {
                $portfolio_education->the_post(); 
                the_content();
            }?>             
        </div>
    </div>
</section>
<!--=======================End Education========================-->
<?php endif; ?>

<!--=========================Services==========================-->
<?php
    $portfolio_services = new WP_Query(
        array(
             'post_type'      => 'service',
             'posts_per_page'  => 4
        )
    );
    if ($portfolio_services->have_posts()):
?><section class="service_area" id="service">
    <div class="container">
        <div class="section_title">
            <h2><b>Services</b></h2>
            <p><i>Have a look at my services</i></p>
        </div>
        <div class="row"><?php
            while ($portfolio_services->have_posts()):
                $portfolio_services->the_post();
                $service_type = get_field('service_type');
                $font_icon  = $service_type == 'web' ? 'fa-laptop' :
                    ($service_type == 'database' ? 'fa-database' :
                        ($service_type == 'consultant' ? 'fa-comments' :
                            ($service_type == 'troubleshoot' ? 'fa-cogs' : '')));
         ?>
            <div class="col-md-6">
                <div class="service_item wow fadeInDown animated">
                    <div class="font_effect">
                        <i class="fa <?php echo $font_icon?>" aria-hidden="true"></i>
                    </div>                           
                    <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                    <p><?php echo wp_trim_words(get_field('description'), 12, '...'); ?> </p>

                </div>
            </div><!--end column-->
        <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!--=======================End Services========================-->


<!--=======================Contact area========================-->
<section class="contact_area" id="contact">
    <div class="container">
        <div class="section_title">
            <h2>Contact</h2>
            <p>Get in touch, if you need.</p>
        </div>
        <div class="contact_item">
            <div class="row">
                <div class="col-md-6 contact_left">
                    <div class="contact_pic data-tilt">
                        <img src="<?php echo $contact_image_url ?>" alt="Contact Us">
                    </div>
                    <div class="contact_detail">
                        <div class="contact_text">
                            <p> <i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $contact_address ?></p>
                            <p> <i class="fa fa-phone" aria-hidden="true"></i><?php echo $phone ?>
                            </p>
                        </div>
                    </div>                                                        
                </div>
                <div class="col-md-6">
                    <div class="contact_info">
                        <?php echo do_shortcode( '[contact-form-7 id="132" title="Testing"]');  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>