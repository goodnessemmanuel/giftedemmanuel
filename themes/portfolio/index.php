<?php
    get_header();

    $portfolio_bio = new WP_Query(
        array(
            'post_type' => 'bio',
            'posts_per_page' => 1
        )
    );

    $about_me = ['tagline' => '', 'content' => ''];
    $phone = '(+234)76 000 0000';
    $contact_image_url = get_theme_file_uri('/assets/images/envelope.png');
    $contact_address = '#1 brutal determination, success unstoppable residence';

    if ($portfolio_bio->have_posts()):

        while ($portfolio_bio->have_posts()):

            $portfolio_bio->the_post();

            $about_me = get_field('about_me') ?? $about_me;

            $phone    = isset(get_field('basic_info')['phone']) && !empty(get_field('basic_info')['phone']) ?
                        get_field('basic_info')['phone'] : $phone;

            $contact_image_url  = get_field('basic_info')['contact_image'] ?? $contact_image_url;

            $contact_address  = isset(get_field('basic_info')['contact_address']) && !empty(get_field('basic_info')['contact_address']) ?
                                get_field('basic_info')['contact_address'] : $contact_address;

            $upload_cv  =   isset(get_field('basic_info')['upload_cv']) && !empty(get_field('basic_info')['upload_cv']) ?
                                get_field('basic_info')['upload_cv'] : '';

?><section class="banner" style="background-image:  url('<?php  the_post_thumbnail_url(); ?>')"> <!--===banner area===-->
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-lg-2">
                <div class="cv">           
                    <a class="download_cv" href="<?php echo $upload_cv; ?>" target="_blank"><span>Download CV</span></a>
                </div>
            </div> 
            <div class="col-md-10 col-lg-8 mx-2">
                <div class="banner_item">
                    <div class="profile_pic">
                        <img src=<?php echo get_field('basic_info')['profile_image'] ?> alt="">
                    </div>
                    <div class="banner_text">
                        <h2><b><?php echo (get_field('basic_info')['full_name']) ?></b></h2>
                        <h5><?php echo (get_field('basic_info')['occupation']) ?></h5>
                        <ul class="basic_info">
                            <li><b>BORN : </b><?php
                                $dob = new DateTime(get_field('basic_info')['birth_block']['date_of_birth']);
                                $show_birth_year = get_field('basic_info')['birth_block']['birth_year'];
                                echo !$show_birth_year ? $dob->format('M') . ' ' . $dob->format('d'):
                                    $dob->format('M') . ' ' . $dob->format('d') . ', ' . $dob->format('Y');
                                ?></li>
                            <li><b>EMAIL : </b><?php echo (get_field('basic_info')['email']) ?></li>
                            <li><b>MARITAL STATUS : </b><?php echo (get_field('basic_info' )['marital_status'])  ?></li>
                        </ul>
                        <ul class="social_info">
                            <li><a href="<?php echo get_field('social_media')['facebook'] ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo get_field('social_media')['twitter'] ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php echo get_field('social_media')['pinterest'] ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="<?php echo get_field('social_media')['linkedin'] ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="<?php echo get_field('social_media')['instagram'] ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div><!--end column-->
            <div class="col-md-1 col-lg-2"></div> 
        </div><!--end row-->
    <?php endwhile; ?>
    </div>
</section>

<?php endif; ?>

<?php
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