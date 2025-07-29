<?php get_header(); ?>

<main class="main-content">
    
    <!-- Testimonials Archive Hero -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content text-center">
                <div class="hero-text">
                    <div class="hero-badge">
                        <span class="badge-icon">⭐</span>
                        <?php esc_html_e('Client Success Stories', 'nateag-enterprises'); ?>
                    </div>
                    
                    <h1>
                        <?php esc_html_e('What Our', 'nateag-enterprises'); ?>
                        <span class="gradient-text"><?php esc_html_e('Clients Say', 'nateag-enterprises'); ?></span>
                    </h1>
                    
                    <div class="page-content">
                        <?php 
                        // Check if Testimonials archive page has custom content
                        $testimonials_page = get_post_type_archive_link('testimonials');
                        if ($testimonials_page) {
                            // Try to get page content if set as a page
                            $page_id = get_option('testimonials_archive_page');
                            if ($page_id) {
                                $page = get_post($page_id);
                                if ($page && $page->post_content) {
                                    echo apply_filters('the_content', $page->post_content);
                                } else {
                                    echo '<p>' . esc_html__('Discover how NATEAG Enterprises has helped entrepreneurs and businesses achieve remarkable growth through our comprehensive consulting, marketing, and logistics solutions.', 'nateag-enterprises') . '</p>';
                                }
                            } else {
                                echo '<p>' . esc_html__('Discover how NATEAG Enterprises has helped entrepreneurs and businesses achieve remarkable growth through our comprehensive consulting, marketing, and logistics solutions.', 'nateag-enterprises') . '</p>';
                            }
                        }
                        ?>
                    </div>
                    
                    <!-- Trust Indicators -->
                    <div class="stats-grid" style="margin-top: 3rem; max-width: none;">
                        <div class="stat-card">
                            <span class="stat-number">150+</span>
                            <span class="stat-label"><?php esc_html_e('Happy Clients', 'nateag-enterprises'); ?></span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">95%</span>
                            <span class="stat-label"><?php esc_html_e('Success Rate', 'nateag-enterprises'); ?></span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">4.9</span>
                            <span class="stat-label"><?php esc_html_e('Average Rating', 'nateag-enterprises'); ?></span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">12</span>
                            <span class="stat-label"><?php esc_html_e('Countries Served', 'nateag-enterprises'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Grid -->
    <section class="testimonials-section section">
        <div class="container">
            
            <?php if (have_posts()) : ?>
                <div class="testimonials-grid">
                    <?php while (have_posts()) : the_post(); 
                        $client_name = get_post_meta(get_the_ID(), '_client_name', true);
                        $client_title = get_post_meta(get_the_ID(), '_client_title', true);
                        $client_company = get_post_meta(get_the_ID(), '_client_company', true);
                        $rating = get_post_meta(get_the_ID(), '_rating', true) ?: 5;
                        $featured = get_post_meta(get_the_ID(), '_featured', true);
                    ?>
                        <div class="testimonial-card-grid <?php echo $featured ? 'featured' : ''; ?>">
                            <?php if ($featured) : ?>
                                <div class="featured-badge">
                                    <span>⭐ <?php esc_html_e('Featured', 'nateag-enterprises'); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <div class="testimonial-stars">
                                <?php for ($i = 0; $i < $rating; $i++) : ?>
                                    <span class="star">⭐</span>
                                <?php endfor; ?>
                            </div>
                            
                            <blockquote class="testimonial-quote">
                                "<?php 
                                $content = get_the_content();
                                echo esc_html(strlen($content) > 150 ? wp_trim_words($content, 25) . '...' : $content);
                                ?>"
                            </blockquote>
                            
                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    <?php echo esc_html(substr($client_name ?: 'C', 0, 1)); ?>
                                </div>
                                <div class="author-info">
                                    <h4><?php echo esc_html($client_name ?: 'Anonymous Client'); ?></h4>
                                    <p>
                                        <?php 
                                        $title_company = array();
                                        if ($client_title) $title_company[] = $client_title;
                                        if ($client_company) $title_company[] = $client_company;
                                        echo esc_html(implode(', ', $title_company) ?: 'Valued Client');
                                        ?>
                                    </p>
                                </div>
                            </div>
                            
                            <?php if (strlen(get_the_content()) > 150) : ?>
                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    <?php esc_html_e('Read Full Story', 'nateag-enterprises'); ?> →
                                </a>
                            <?php endif; ?>
                        </div>
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
                <div class="no-testimonials text-center">
                    <div class="empty-state">
                        <div class="empty-icon">💬</div>
                        <h3><?php esc_html_e('No Testimonials Yet', 'nateag-enterprises'); ?></h3>
                        <p><?php esc_html_e('We are building our testimonials collection. Check back soon to see what our clients are saying about our services.', 'nateag-enterprises'); ?></p>
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

    <!-- Services Preview -->
    <section class="services-section section">
        <div class="container">
            <div class="section-header text-center">
                <h2><?php esc_html_e('Ready for Your Success Story?', 'nateag-enterprises'); ?></h2>
                <p><?php esc_html_e('Join our satisfied clients and transform your business with our proven solutions', 'nateag-enterprises'); ?></p>
            </div>

            <div class="services-grid">
                <?php
                $services = nateag_get_services(3);
                if ($services) :
                    $colors = array('purple', 'blue', 'indigo');
                    $icon_map = array(
                        'consulting' => '👥',
                        'marketing' => '📈', 
                        'logistics' => '🚚'
                    );
                    
                    foreach ($services as $index => $service) :
                        $service_icon = get_post_meta($service->ID, '_service_icon', true) ?: 'consulting';
                        $service_color = get_post_meta($service->ID, '_service_color', true) ?: $colors[$index % 3];
                        $icon = $icon_map[$service_icon] ?: '👥';
                        $features = nateag_get_service_features($service->ID);
                ?>
                    <div class="service-card">
                        <div class="service-icon <?php echo esc_attr($service_color); ?>">
                            <?php echo $icon; ?>
                        </div>
                        <h3><?php echo esc_html(get_the_title($service)); ?></h3>
                        <p><?php echo esc_html(get_the_excerpt($service)); ?></p>
                        
                        <div class="service-features">
                            <?php foreach (array_slice($features, 0, 3) as $feature) : ?>
                                <div class="feature-item">• <?php echo esc_html($feature); ?></div>
                            <?php endforeach; ?>
                        </div>
                        
                        <a href="<?php echo esc_url(get_permalink($service)); ?>" class="service-link">
                            <?php esc_html_e('Learn More', 'nateag-enterprises'); ?> →
                        </a>
                    </div>
                <?php 
                    endforeach;
                endif;
                ?>
            </div>

            <div class="text-center">
                <a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>" class="btn-primary">
                    <?php esc_html_e('View All Services', 'nateag-enterprises'); ?> →
                </a>
            </div>
        </div>
    </section>

</main>

<style>
.testimonials-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2rem;
    margin-top: 3rem;
}

@media (min-width: 768px) {
    .testimonials-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .testimonials-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.testimonial-card-grid {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border-radius: 1rem;
    padding: 2rem;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
    position: relative;
}

.testimonial-card-grid:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.testimonial-card-grid.featured {
    border: 2px solid #9333ea;
    transform: scale(1.02);
}

.testimonial-card-grid.featured:hover {
    transform: scale(1.02) translateY(-5px);
}

.featured-badge {
    position: absolute;
    top: -10px;
    left: 50%;
    transform: translateX(-50%);
    background: linear-gradient(135deg, #9333ea 0%, #3b82f6 100%);
    color: white;
    padding: 0.25rem 1rem;
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: 600;
}

.testimonial-card-grid .testimonial-stars {
    margin-bottom: 1rem;
}

.testimonial-card-grid .testimonial-quote {
    font-size: 1rem;
    line-height: 1.6;
    color: #374151;
    font-style: italic;
    margin-bottom: 1.5rem;
    min-height: 4rem;
}

.testimonial-card-grid .testimonial-author {
    margin-bottom: 1rem;
}

.testimonial-card-grid .author-avatar {
    width: 3rem;
    height: 3rem;
    font-size: 1rem;
    margin-bottom: 0.5rem;
}

.testimonial-card-grid .author-info h4 {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 0.25rem;
    color: #111827;
}

.testimonial-card-grid .author-info p {
    font-size: 0.875rem;
    color: #9333ea;
    font-weight: 500;
}

.testimonial-card-grid .read-more {
    color: #9333ea;
    font-weight: 600;
    text-decoration: none;
    font-size: 0.875rem;
    transition: color 0.3s ease;
}

.testimonial-card-grid .read-more:hover {
    color: #7c3aed;
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