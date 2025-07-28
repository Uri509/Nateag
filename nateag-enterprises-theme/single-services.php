<?php get_header(); ?>

<main class="main-content">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Service Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-text">
                        <div class="hero-badge">
                            <span class="badge-icon">🎯</span>
                            <?php echo esc_html(get_post_meta(get_the_ID(), '_service_price', true) ?: 'Professional Service'); ?>
                        </div>
                        
                        <h1>
                            <span class="gradient-text"><?php the_title(); ?></span>
                        </h1>
                        
                        <div class="service-excerpt">
                            <?php 
                            if (get_the_excerpt()) {
                                the_excerpt();
                            } else {
                                echo '<p>' . esc_html__('Discover how our expert service can transform your business operations and drive sustainable growth.', 'nateag-enterprises') . '</p>';
                            }
                            ?>
                        </div>
                        
                        <!-- Service Features -->
                        <?php 
                        $features = nateag_get_service_features(get_the_ID());
                        if (!empty($features)) : ?>
                            <div class="key-points">
                                <?php 
                                $colors = array('purple', 'blue', 'indigo');
                                foreach (array_slice($features, 0, 3) as $index => $feature) : 
                                    $color = $colors[$index % 3];
                                ?>
                                    <div class="key-point">
                                        <div class="point-icon <?php echo esc_attr($color); ?>">✓</div>
                                        <div>
                                            <strong><?php echo esc_html($feature); ?></strong>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        
                        <!-- CTA Buttons -->
                        <div class="hero-buttons">
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-primary">
                                <?php esc_html_e('Get Started Today', 'nateag-enterprises'); ?> →
                            </a>
                            
                            <a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>" class="btn-secondary">
                                <?php esc_html_e('View All Services', 'nateag-enterprises'); ?>
                            </a>
                        </div>
                    </div>

                    <!-- Service Details Card -->
                    <div class="hero-visual">
                        <div class="hero-card">
                            <div class="service-icon-large <?php echo esc_attr(get_post_meta(get_the_ID(), '_service_color', true) ?: 'purple'); ?>">
                                <?php
                                $icon_map = array(
                                    'consulting' => '👥',
                                    'marketing' => '📈', 
                                    'logistics' => '🚚'
                                );
                                echo $icon_map[get_post_meta(get_the_ID(), '_service_icon', true)] ?: '👥';
                                ?>
                            </div>
                            
                            <h3><?php esc_html_e('What You Get', 'nateag-enterprises'); ?></h3>
                            
                            <div class="checklist">
                                <?php foreach ($features as $feature) : ?>
                                    <div class="check-item">
                                        <span class="check-icon">✓</span>
                                        <?php echo esc_html($feature); ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Service Content -->
        <section class="section">
            <div class="container">
                <div class="service-content">
                    <div class="content-main">
                        <?php 
                        if (get_the_content()) {
                            the_content();
                        } else {
                            echo '<h2>' . esc_html__('About This Service', 'nateag-enterprises') . '</h2>';
                            echo '<p>' . esc_html__('This comprehensive service is designed to address your specific business needs with expert guidance and proven methodologies.', 'nateag-enterprises') . '</p>';
                            echo '<p>' . esc_html__('Our team of professionals will work closely with you to develop and implement solutions that drive measurable results and sustainable growth.', 'nateag-enterprises') . '</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Related Services -->
        <section class="services-section section">
            <div class="container">
                <div class="section-header text-center">
                    <h2><?php esc_html_e('Other Services', 'nateag-enterprises'); ?></h2>
                    <p><?php esc_html_e('Explore our comprehensive range of business solutions', 'nateag-enterprises'); ?></p>
                </div>

                <div class="services-grid">
                    <?php
                    $related_services = get_posts(array(
                        'post_type' => 'services',
                        'posts_per_page' => 3,
                        'post_status' => 'publish',
                        'post__not_in' => array(get_the_ID()),
                        'orderby' => 'rand'
                    ));
                    
                    if ($related_services) :
                        $colors = array('purple', 'blue', 'indigo');
                        $icons = array('👥', '📈', '🚚');
                        
                        foreach ($related_services as $index => $service) :
                            $service_icon = get_post_meta($service->ID, '_service_icon', true) ?: 'consulting';
                            $service_color = get_post_meta($service->ID, '_service_color', true) ?: 'purple';
                            $icon = $icon_map[$service_icon] ?: '👥';
                    ?>
                        <div class="service-card">
                            <div class="service-icon <?php echo esc_attr($service_color); ?>">
                                <?php echo $icon; ?>
                            </div>
                            <h3><?php echo esc_html(get_the_title($service)); ?></h3>
                            <p><?php echo esc_html(get_the_excerpt($service)); ?></p>
                            
                            <div class="service-features">
                                <?php 
                                $service_features = nateag_get_service_features($service->ID);
                                foreach (array_slice($service_features, 0, 3) as $feature) : ?>
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

    <?php endwhile; ?>
</main>

<style>
.service-icon-large {
    width: 5rem;
    height: 5rem;
    border-radius: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 2.5rem;
    color: white;
}

.service-content {
    max-width: 4xl;
    margin: 0 auto;
}

.content-main {
    font-size: 1.125rem;
    line-height: 1.8;
    color: #374151;
}

.content-main h2,
.content-main h3,
.content-main h4 {
    margin-top: 2rem;
    margin-bottom: 1rem;
    color: #111827;
}

.content-main p {
    margin-bottom: 1.5rem;
}

.content-main ul,
.content-main ol {
    margin-bottom: 1.5rem;
    padding-left: 1.5rem;
}

.content-main li {
    margin-bottom: 0.5rem;
}

.service-excerpt {
    font-size: 1.25rem;
    color: #6b7280;
    margin-bottom: 2rem;
    line-height: 1.6;
}
</style>

<?php get_footer(); ?>