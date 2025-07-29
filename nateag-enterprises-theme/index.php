<?php get_header(); ?>

<main class="main-content">
    
    <?php if (have_posts()) : ?>
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
                        
                        <div class="page-content">
                            <?php 
                            // Check if this is the blog page and has custom content
                            if (is_home() && get_option('page_for_posts')) {
                                $blog_page = get_post(get_option('page_for_posts'));
                                if ($blog_page && $blog_page->post_content) {
                                    echo apply_filters('the_content', $blog_page->post_content);
                                } else {
                                    echo '<p>' . esc_html__('Discover effective business strategies, operations insights, and marketing tips to help your business thrive in today\'s competitive landscape.', 'nateag-enterprises') . '</p>';
                                }
                            } elseif (is_category()) {
                                $category_desc = category_description();
                                if ($category_desc) {
                                    echo $category_desc;
                                } else {
                                    echo '<p>' . esc_html__('Explore articles in this category for focused business insights.', 'nateag-enterprises') . '</p>';
                                }
                            } elseif (is_tag()) {
                                $tag_desc = tag_description();
                                if ($tag_desc) {
                                    echo $tag_desc;
                                } else {
                                    echo '<p>' . esc_html__('Browse articles tagged with this topic.', 'nateag-enterprises') . '</p>';
                                }
                            } else {
                                echo '<p>' . esc_html__('Browse our latest articles and business insights.', 'nateag-enterprises') . '</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog Content -->
        <section class="blog-section section">
            <div class="container">
                <div class="blog-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="blog-card">
                            <div class="blog-card-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('nateag-blog'); ?>
                                    </a>
                                <?php else : ?>
                                    <div class="blog-placeholder">
                                        <a href="<?php the_permalink(); ?>">
                                            <span class="blog-icon">📄</span>
                                        </a>
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
                                
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
            </div>
        </section>
        
    <?php else : ?>
        <!-- No Posts Found -->
        <section class="hero-section">
            <div class="container">
                <div class="hero-content text-center">
                    <div class="hero-text">
                        <div class="hero-badge">
                            <span class="badge-icon">📝</span>
                            <?php esc_html_e('No Content', 'nateag-enterprises'); ?>
                        </div>
                        
                        <h1>
                            <span class="gradient-text"><?php esc_html_e('No Posts Found', 'nateag-enterprises'); ?></span>
                        </h1>
                        
                        <div class="page-content">
                            <?php 
                            // Allow custom content even when no posts exist
                            if (is_home() && get_option('page_for_posts')) {
                                $blog_page = get_post(get_option('page_for_posts'));
                                if ($blog_page && $blog_page->post_content) {
                                    echo apply_filters('the_content', $blog_page->post_content);
                                } else {
                                    echo '<p>' . esc_html__('We are currently working on new content. Please check back soon for the latest business insights and expert advice.', 'nateag-enterprises') . '</p>';
                                }
                            } else {
                                echo '<p>' . esc_html__('No content is currently available. Please check back later or contact us for more information.', 'nateag-enterprises') . '</p>';
                            }
                            ?>
                        </div>
                        
                        <div class="hero-buttons">
                            <a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>" class="btn-primary">
                                <?php esc_html_e('View Our Services', 'nateag-enterprises'); ?>
                            </a>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-secondary">
                                <?php esc_html_e('Contact Us', 'nateag-enterprises'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

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
.page-content {
    max-width: 3xl;
    margin: 0 auto;
    line-height: 1.6;
}

.page-content h2,
.page-content h3,
.page-content h4 {
    color: #111827;
    margin-top: 1.5rem;
    margin-bottom: 0.75rem;
}

.page-content p {
    margin-bottom: 1rem;
}

.page-content ul,
.page-content ol {
    margin-bottom: 1rem;
    padding-left: 1.5rem;
}

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
</style>

<?php get_footer(); ?>