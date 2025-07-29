<?php get_header(); ?>

<main class="main-content">
    
    <!-- Services Archive Hero -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content text-center">
                <div class="hero-text">
                    <div class="hero-badge">
                        <span class="badge-icon">🎯</span>
                        <?php esc_html_e('Professional Services', 'nateag-enterprises'); ?>
                    </div>
                    
                    <h1>
                        <?php esc_html_e('Our', 'nateag-enterprises'); ?>
                        <span class="gradient-text"><?php esc_html_e('Business Solutions', 'nateag-enterprises'); ?></span>
                    </h1>
                    
                    <div class="page-content">
                        <?php 
                        // Check if Services archive page has custom content
                        $services_page = get_post_type_archive_link('services');
                        if ($services_page) {
                            // Try to get page content if set as a page
                            $page_id = get_option('services_archive_page');
                            if ($page_id) {
                                $page = get_post($page_id);
                                if ($page && $page->post_content) {
                                    echo apply_filters('the_content', $page->post_content);
                                } else {
                                    echo '<p>' . esc_html__('Comprehensive consulting, marketing, and logistics services designed to empower entrepreneurs and drive business growth in today\'s competitive landscape.', 'nateag-enterprises') . '</p>';
                                }
                            } else {
                                echo '<p>' . esc_html__('Comprehensive consulting, marketing, and logistics services designed to empower entrepreneurs and drive business growth in today\'s competitive landscape.', 'nateag-enterprises') . '</p>';
                            }
                        }
                        ?>
                    </div>
                    
                    <!-- Quick Stats -->
                    <div class="stats-grid" style="margin-top: 3rem; max-width: none;">
                        <div class="stat-card">
                            <span class="stat-number">150+</span>
                            <span class="stat-label"><?php esc_html_e('Clients Served', 'nateag-enterprises'); ?></span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">2+</span>
                            <span class="stat-label"><?php esc_html_e('Years Experience', 'nateag-enterprises'); ?></span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">95%</span>
                            <span class="stat-label"><?php esc_html_e('Success Rate', 'nateag-enterprises'); ?></span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">12</span>
                            <span class="stat-label"><?php esc_html_e('Countries Reached', 'nateag-enterprises'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="services-section section">
        <div class="container">
            
            <?php if (have_posts()) : ?>
                <div class="services-grid">
                    <?php 
                    $icon_map = array(
                        'consulting' => '👥',
                        'marketing' => '📈', 
                        'logistics' => '🚚'
                    );
                    
                    while (have_posts()) : the_post(); 
                        $service_icon = get_post_meta(get_the_ID(), '_service_icon', true) ?: 'consulting';
                        $service_color = get_post_meta(get_the_ID(), '_service_color', true) ?: 'purple';
                        $service_features = nateag_get_service_features(get_the_ID());
                        $service_price = get_post_meta(get_the_ID(), '_service_price', true);
                        $icon = $icon_map[$service_icon] ?: '👥';
                    ?>
                        <div class="service-card">
                            <div class="service-icon <?php echo esc_attr($service_color); ?>">
                                <?php echo $icon; ?>
                            </div>
                            
                            <?php if ($service_price) : ?>
                                <div class="service-price">
                                    <?php echo esc_html($service_price); ?>
                                </div>
                            <?php endif; ?>
                            
                            <h3><?php the_title(); ?></h3>
                            <p><?php echo esc_html(get_the_excerpt() ?: wp_trim_words(get_the_content(), 25)); ?></p>
                            
                            <div class="service-features">
                                <?php foreach (array_slice($service_features, 0, 4) as $feature) : ?>
                                    <div class="feature-item">• <?php echo esc_html($feature); ?></div>
                                <?php endforeach; ?>
                            </div>
                            
                            <div class="service-actions">
                                <a href="<?php the_permalink(); ?>" class="service-link">
                                    <?php esc_html_e('Learn More', 'nateag-enterprises'); ?> →
                                </a>
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>?service=<?php echo urlencode(get_the_title()); ?>" class="cta-button">
                                    <?php esc_html_e('Get Started', 'nateag-enterprises'); ?>
                                </a>
                            </div>
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
                <div class="no-services text-center">
                    <h3><?php esc_html_e('No Services Found', 'nateag-enterprises'); ?></h3>
                    <p><?php esc_html_e('We are currently updating our services. Please check back soon or contact us directly for more information.', 'nateag-enterprises'); ?></p>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-primary">
                        <?php esc_html_e('Contact Us', 'nateag-enterprises'); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-content">
                <div class="newsletter-icon">💼</div>
                
                <h2><?php esc_html_e('Ready to Transform Your Business?', 'nateag-enterprises'); ?></h2>
                
                <p><?php esc_html_e('Get a free consultation to discuss how our services can help you achieve your business goals and drive sustainable growth.', 'nateag-enterprises'); ?></p>
                
                <!-- Benefits -->
                <div class="newsletter-benefits">
                    <div class="benefit-item">
                        <span class="benefit-icon">✓</span>
                        <?php esc_html_e('Free Consultation', 'nateag-enterprises'); ?>
                    </div>
                    <div class="benefit-item">
                        <span class="benefit-icon">✓</span>
                        <?php esc_html_e('Custom Solutions', 'nateag-enterprises'); ?>
                    </div>
                    <div class="benefit-item">
                        <span class="benefit-icon">✓</span>
                        <?php esc_html_e('Expert Guidance', 'nateag-enterprises'); ?>
                    </div>
                </div>
                
                <!-- CTA Buttons -->
                <div class="hero-buttons">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-primary">
                        <?php esc_html_e('Get Free Consultation', 'nateag-enterprises'); ?> →
                    </a>
                    
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>" class="btn-secondary">
                        <?php esc_html_e('Learn About Us', 'nateag-enterprises'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<style>
.service-price {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: 600;
}

.service-card {
    position: relative;
}

.service-actions {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    margin-top: 1.5rem;
}

.service-actions .cta-button {
    text-align: center;
    text-decoration: none;
}

.no-services {
    padding: 4rem 2rem;
    background: white;
    border-radius: 1rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.no-services h3 {
    color: #111827;
    margin-bottom: 1rem;
}

.no-services p {
    color: #6b7280;
    margin-bottom: 2rem;
}

.pagination-wrapper {
    margin-top: 3rem;
}

.pagination ul {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    list-style: none;
    padding: 0;
    margin: 0;
}

.pagination a,
.pagination span {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 0.5rem;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.pagination a {
    background: white;
    color: #6b7280;
    border: 1px solid #d1d5db;
}

.pagination a:hover {
    background: #9333ea;
    color: white;
    border-color: #9333ea;
}

.pagination .current {
    background: #9333ea;
    color: white;
    border: 1px solid #9333ea;
}
</style>

<?php get_footer(); ?>