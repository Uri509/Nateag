<?php get_header(); ?>

<main id="primary" class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="container">
                <div class="page-header">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                </div>
                
                <div class="page-content">
                    <?php
                    the_content();
                    
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'nateag-enterprises'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>