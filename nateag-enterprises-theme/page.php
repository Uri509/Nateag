<?php get_header(); ?>

<main class="main-content">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <!-- Page Header -->
            <section class="hero-section">
                <div class="container">
                    <div class="hero-content text-center">
                        <div class="hero-text">
                            <div class="hero-badge">
                                <span class="badge-icon">📄</span>
                                <?php esc_html_e('Page', 'nateag-enterprises'); ?>
                            </div>
                            
                            <h1 class="page-title"><?php the_title(); ?></h1>
                            
                            <?php if (get_the_excerpt()) : ?>
                                <p class="page-excerpt"><?php the_excerpt(); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Page Content -->
            <section class="section">
                <div class="container">
                    <div class="page-content-wrapper">
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
                </div>
            </section>
            
        </article>
    <?php endwhile; ?>
</main>

<style>
.page-content-wrapper {
    max-width: 4xl;
    margin: 0 auto;
}

.page-content {
    font-size: 1.125rem;
    line-height: 1.8;
    color: #374151;
}

.page-content h1,
.page-content h2,
.page-content h3,
.page-content h4,
.page-content h5,
.page-content h6 {
    margin-top: 2rem;
    margin-bottom: 1rem;
    color: #111827;
    font-weight: 700;
}

.page-content h2 {
    font-size: 2rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #e5e7eb;
}

.page-content h3 {
    font-size: 1.5rem;
}

.page-content p {
    margin-bottom: 1.5rem;
}

.page-content ul,
.page-content ol {
    margin-bottom: 1.5rem;
    padding-left: 2rem;
}

.page-content li {
    margin-bottom: 0.5rem;
}

.page-content blockquote {
    border-left: 4px solid #9333ea;
    padding: 1rem 2rem;
    margin: 2rem 0;
    background: rgba(147, 51, 234, 0.05);
    border-radius: 0 0.5rem 0.5rem 0;
    font-style: italic;
}

.page-content img {
    max-width: 100%;
    height: auto;
    border-radius: 0.5rem;
    margin: 2rem 0;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.page-content .wp-block-image {
    text-align: center;
    margin: 2rem 0;
}

.page-content .wp-block-quote {
    border-left: 4px solid #9333ea;
    padding: 1rem 2rem;
    margin: 2rem 0;
    background: rgba(147, 51, 234, 0.05);
    border-radius: 0 0.5rem 0.5rem 0;
}

.page-links {
    margin: 2rem 0;
    text-align: center;
}

.page-links a {
    display: inline-block;
    padding: 0.5rem 1rem;
    margin: 0.25rem;
    background: #9333ea;
    color: white;
    text-decoration: none;
    border-radius: 0.5rem;
    transition: background 0.3s ease;
}

.page-links a:hover {
    background: #7c3aed;
}

.page-links > span {
    display: inline-block;
    padding: 0.5rem 1rem;
    margin: 0.25rem;
    background: #f3f4f6;
    border-radius: 0.5rem;
}

.page-excerpt {
    font-size: 1.25rem;
    color: #6b7280;
    margin-bottom: 2rem;
    line-height: 1.6;
    max-width: 3xl;
    margin-left: auto;
    margin-right: auto;
}
</style>

<?php get_footer(); ?>