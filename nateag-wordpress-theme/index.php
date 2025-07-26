<?php get_header(); ?>

<main class="main-content">
    
    <!-- Blog Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content text-center">
                <div class="hero-text">
                    <div class="hero-badge">
                        <span class="badge-icon">📚</span>
                        <?php esc_html_e('Business Insights', 'nateag-enterprises'); ?>
                    </div>
                    
                    <h1>
                        <?php esc_html_e('Expert', 'nateag-enterprises'); ?>
                        <span class="gradient-text"><?php esc_html_e('Business Blog', 'nateag-enterprises'); ?></span>
                    </h1>
                    
                    <p><?php esc_html_e('Discover effective business strategies, operations insights, and marketing tips to help your business thrive in today\'s competitive landscape.', 'nateag-enterprises'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Content -->
    <section class="blog-section section">
        <div class="container">
            
            <?php if (have_posts()) : ?>
                <div class="blog-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="blog-card">
                            <div class="blog-card-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('nateag-blog'); ?>
                                <?php else : ?>
                                    <div class="blog-placeholder">
                                        <span class="blog-icon">📄</span>
                                    </div>
                                <?php endif; ?>
                                <div class="blog-category">
                                    <?php 
                                    $categories = get_the_category();
                                    echo esc_html($categories[0]->name ?? 'Business');
                                    ?>
                                </div>
                            </div>
                            
                            <div class="blog-card-content">
                                <div class="blog-meta">
                                    <span class="blog-date">📅 <?php echo get_the_date('M j, Y'); ?></span>
                                    <span class="blog-time">⏰ <?php echo esc_html(rand(5, 10)); ?> min read</span>
                                </div>
                                
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo esc_html(get_the_excerpt()); ?></p>
                                
                                <div class="blog-author">
                                    <span class="author-name">👤 <?php the_author(); ?></span>
                                    <a href="<?php the_permalink(); ?>" class="read-more">
                                        <?php esc_html_e('Read More', 'nateag-enterprises'); ?> →
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                
                <!-- Pagination -->
                <?php if (get_next_posts_link() || get_previous_posts_link()) : ?>
                    <div class="pagination-wrapper text-center" style="margin-top: 3rem;">
                        <div class="pagination">
                            <?php
                            echo paginate_links(array(
                                'prev_text' => '← ' . __('Previous', 'nateag-enterprises'),
                                'next_text' => __('Next', 'nateag-enterprises') . ' →',
                                'type' => 'list',
                            ));
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
                
            <?php else : ?>
                <div class="no-posts text-center">
                    <div class="empty-state">
                        <div class="empty-icon">📝</div>
                        <h3><?php esc_html_e('No Posts Found', 'nateag-enterprises'); ?></h3>
                        <p><?php esc_html_e('We are currently working on new content. Please check back soon for the latest business insights and expert advice.', 'nateag-enterprises'); ?></p>
                        <div class="empty-actions">
                            <a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>" class="btn-primary">
                                <?php esc_html_e('View Our Services', 'nateag-enterprises'); ?>
                            </a>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-secondary">
                                <?php esc_html_e('Contact Us', 'nateag-enterprises'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-content">
                <div class="newsletter-icon">📬</div>
                
                <h2><?php esc_html_e('Never Miss an Update', 'nateag-enterprises'); ?></h2>
                
                <p><?php esc_html_e('Subscribe to our newsletter and get the latest business insights, expert tips, and industry trends delivered directly to your inbox.', 'nateag-enterprises'); ?></p>
                
                <!-- Benefits -->
                <div class="newsletter-benefits">
                    <div class="benefit-item">
                        <span class="benefit-icon">✓</span>
                        <?php esc_html_e('Weekly Business Tips', 'nateag-enterprises'); ?>
                    </div>
                    <div class="benefit-item">
                        <span class="benefit-icon">✓</span>
                        <?php esc_html_e('Industry Insights', 'nateag-enterprises'); ?>
                    </div>
                    <div class="benefit-item">
                        <span class="benefit-icon">✓</span>
                        <?php esc_html_e('Exclusive Content', 'nateag-enterprises'); ?>
                    </div>
                </div>
                
                <!-- Form -->
                <form class="newsletter-form" id="blog-newsletter-form">
                    <input type="text" name="newsletter_name" placeholder="<?php esc_attr_e('Your Name', 'nateag-enterprises'); ?>" required>
                    <input type="email" name="newsletter_email" placeholder="<?php esc_attr_e('Your Email Address', 'nateag-enterprises'); ?>" required>
                    <button type="submit"><?php esc_html_e('Subscribe Now', 'nateag-enterprises'); ?></button>
                </form>
            </div>
        </div>
    </section>

</main>

<style>
.blog-placeholder {
    height: 12rem;
    background: linear-gradient(135deg, #9333ea 0%, #3b82f6 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}

.blog-icon {
    font-size: 3rem;
    color: white;
}

.empty-state {
    padding: 4rem 2rem;
    max-width: 500px;
    margin: 0 auto;
}

.empty-icon {
    font-size: 4rem;
    margin-bottom: 2rem;
}

.empty-state h3 {
    color: #111827;
    margin-bottom: 1rem;
    font-size: 2rem;
}

.empty-state p {
    color: #6b7280;
    margin-bottom: 2rem;
    font-size: 1.125rem;
    line-height: 1.6;
}

.empty-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}
</style>

<?php get_footer(); ?>