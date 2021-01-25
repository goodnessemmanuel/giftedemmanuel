<?php
    get_header();

    $portfolio_bio = new WP_Query(
        array(
            'post_type' => 'biography',
            'posts_per_page' => 1
        )
    );

    if ($portfolio_bio->have_posts()){
        while ($portfolio_bio->have_posts()){
            $portfolio_bio->the_post();
            the_content();
        }
    }
    
    get_footer();