<?php get_header(); ?>

<main class="main-content">
    
    <!-- 404 Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content text-center">
                <div class="hero-text">
                    <div class="error-icon">🔍</div>
                    
                    <h1>
                        <span class="gradient-text"><?php esc_html_e('404', 'nateag-enterprises'); ?></span>
                        <br>
                        <?php esc_html_e('Page Not Found', 'nateag-enterprises'); ?>
                    </h1>
                    
                    <p><?php esc_html_e('Sorry, the page you are looking for doesn\'t exist or has been moved. Let\'s get you back on track with our business solutions and expert guidance.', 'nateag-enterprises'); ?></p>
                    
                    <!-- Navigation Options -->
                    <div class="error-navigation">
                        <div class="nav-grid">
                            <div class="nav-item">
                                <div class="nav-icon purple">🏠</div>
                                <h4><?php esc_html_e('Homepage', 'nateag-enterprises'); ?></h4>
                                <p><?php esc_html_e('Return to our homepage', 'nateag-enterprises'); ?></p>
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-link">
                                    <?php esc_html_e('Go Home', 'nateag-enterprises'); ?> →
                                </a>
                            </div>
                            
                            <div class="nav-item">
                                <div class="nav-icon blue">💼</div>
                                <h4><?php esc_html_e('Our Services', 'nateag-enterprises'); ?></h4>
                                <p><?php esc_html_e('Explore our business solutions', 'nateag-enterprises'); ?></p>
                                <a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>" class="nav-link">
                                    <?php esc_html_e('View Services', 'nateag-enterprises'); ?> →
                                </a>
                            </div>
                            
                            <div class="nav-item">
                                <div class="nav-icon indigo">📚</div>
                                <h4><?php esc_html_e('Business Blog', 'nateag-enterprises'); ?></h4>
                                <p><?php esc_html_e('Read expert business insights', 'nateag-enterprises'); ?></p>
                                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="nav-link">
                                    <?php esc_html_e('Read Articles', 'nateag-enterprises'); ?> →
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Primary Actions -->
                    <div class="hero-buttons" style="margin-top: 3rem;">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-primary">
                            <?php esc_html_e('Contact Us', 'nateag-enterprises'); ?> →
                        </a>
                        
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-secondary">
                            <?php esc_html_e('Back to Homepage', 'nateag-enterprises'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="section">
        <div class="container">
            <div class="search-section">
                <div class="search-content">
                    <h2><?php esc_html_e('Search Our Site', 'nateag-enterprises'); ?></h2>
                    <p><?php esc_html_e('Maybe you can find what you\'re looking for with a search:', 'nateag-enterprises'); ?></p>
                    
                    <form class="search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="search-input-group">
                            <input type="search" 
                                   name="s" 
                                   placeholder="<?php esc_attr_e('Search for articles, services, or resources...', 'nateag-enterprises'); ?>" 
                                   value="<?php echo esc_attr(get_search_query()); ?>"
                                   required>
                            <button type="submit">
                                <span class="search-icon">🔍</span>
                                <?php esc_html_e('Search', 'nateag-enterprises'); ?>
                            </button>
                        </div>
                    </form>
                    
                    <!-- Popular Searches -->
                    <div class="popular-searches">
                        <h4><?php esc_html_e('Popular Searches:', 'nateag-enterprises'); ?></h4>
                        <div class="search-tags">
                            <a href="<?php echo esc_url(home_url('/?s=business+consulting')); ?>">
                                <?php esc_html_e('Business Consulting', 'nateag-enterprises'); ?>
                            </a>
                            <a href="<?php echo esc_url(home_url('/?s=marketing+solutions')); ?>">
                                <?php esc_html_e('Marketing Solutions', 'nateag-enterprises'); ?>
                            </a>
                            <a href="<?php echo esc_url(home_url('/?s=logistics')); ?>">
                                <?php esc_html_e('Logistics', 'nateag-enterprises'); ?>
                            </a>
                            <a href="<?php echo esc_url(home_url('/?s=entrepreneurship')); ?>">
                                <?php esc_html_e('Entrepreneurship', 'nateag-enterprises'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Preview -->
    <section class="services-section section">
        <div class="container">
            <div class="section-header text-center">
                <h2><?php esc_html_e('While You\'re Here...', 'nateag-enterprises'); ?></h2>
                <p><?php esc_html_e('Discover how NATEAG Enterprises can help transform your business', 'nateag-enterprises'); ?></p>
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
        </div>
    </section>

</main>

<style>
.error-icon {
    font-size: 6rem;
    margin-bottom: 2rem;
    opacity: 0.7;
}

.error-navigation {
    margin: 3rem 0;
}

.nav-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2rem;
    max-width: 4xl;
    margin: 0 auto;
}

@media (min-width: 768px) {
    .nav-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.nav-item {
    background: white;
    border-radius: 1rem;
    padding: 2rem;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.nav-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    border-color: #9333ea;
}

.nav-icon {
    width: 4rem;
    height: 4rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    font-size: 2rem;
    color: white;
}

.nav-item h4 {
    color: #111827;
    margin-bottom: 0.5rem;
    font-size: 1.25rem;
}

.nav-item p {
    color: #6b7280;
    margin-bottom: 1.5rem;
    font-size: 0.875rem;
}

.nav-link {
    color: #9333ea;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.875rem;
    transition: color 0.3s ease;
}

.nav-link:hover {
    color: #7c3aed;
}

.search-section {
    background: white;
    border-radius: 1rem;
    padding: 3rem 2rem;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    max-width: 4xl;
    margin: 0 auto;
}

.search-content h2 {
    color: #111827;
    margin-bottom: 0.5rem;
    font-size: 2rem;
}

.search-content p {
    color: #6b7280;
    margin-bottom: 2rem;
    font-size: 1.125rem;
}

.search-input-group {
    display: flex;
    max-width: 500px;
    margin: 0 auto 2rem;
    border-radius: 2rem;
    overflow: hidden;
    border: 2px solid #e5e7eb;
    transition: border-color 0.3s ease;
}

.search-input-group:focus-within {
    border-color: #9333ea;
}

.search-input-group input {
    flex: 1;
    padding: 1rem 1.5rem;
    border: none;
    font-size: 1rem;
    background: #f9fafb;
}

.search-input-group input:focus {
    outline: none;
    background: white;
}

.search-input-group button {
    background: linear-gradient(135deg, #9333ea 0%, #3b82f6 100%);
    color: white;
    border: none;
    padding: 1rem 1.5rem;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.search-input-group button:hover {
    background: linear-gradient(135deg, #7c3aed 0%, #2563eb 100%);
    transform: scale(1.05);
}

.search-icon {
    font-size: 1rem;
}

.popular-searches {
    text-align: center;
}

.popular-searches h4 {
    color: #374151;
    margin-bottom: 1rem;
    font-size: 1rem;
}

.search-tags {
    display: flex;
    justify-content: center;
    gap: 0.75rem;
    flex-wrap: wrap;
}

.search-tags a {
    background: #f3f4f6;
    color: #6b7280;
    padding: 0.5rem 1rem;
    border-radius: 1rem;
    text-decoration: none;
    font-size: 0.875rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.search-tags a:hover {
    background: #9333ea;
    color: white;
    transform: translateY(-2px);
}

@media (max-width: 640px) {
    .search-input-group {
        flex-direction: column;
        border-radius: 0.5rem;
    }
    
    .search-input-group input {
        border-radius: 0;
    }
    
    .search-input-group button {
        border-radius: 0;
        justify-content: center;
    }
}
</style>

<?php get_footer(); ?>