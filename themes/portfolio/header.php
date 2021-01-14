<?php
/**
 * theme header
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php wp_head(); ?>
    </head>
    <body data-scroll-animation="true">
        <!--===========================Preloader==========================-->
        <div id="preloader">
            <div class="loader">                
            </div>
        </div>
        <!--===========================end preloader==========================-->

        <!--===========================header area==========================-->
        <header class="header_area">
            <?php if ( has_nav_menu( 'main-menu' ) ) : ?>
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                <?php if(has_custom_logo()): ?>
                    <?php the_custom_logo(); //if user uploaded site logo use it otherwise use the default logo ?>
                <?php else: ?>    
                    <a class="navbar-brand" href=<?php echo site_url(); ?>>
                        <img src="<?php echo get_theme_file_uri('/assets/images/logo.png'); ?>" alt="giftedemmanuel">
                    </a>
                <?php endif; ?>

                    <!--collect list items for toggle-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navContent" aria-controls="navContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                            <span></span> 
                    </button>
                    <div class ="collapse navbar-collapse justify-content-end align-items-center" id="navContent">
                        <?php 
                            wp_nav_menu( 
                                array(
                                'menu_class' => 'nav navbar-nav',
                                'theme_location' => 'main-menu',
                                'container' => false
                                ) 
                            );
                        ?>
                    </div>
                </div><!--end container-->
            </nav>
            <?php endif; ?>            
        </header>