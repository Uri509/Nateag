<?php get_header(); ?>

<main class="main-content">
    <?php while (have_posts()) : the_post(); 
        $client_name = get_post_meta(get_the_ID(), '_client_name', true);
        $client_title = get_post_meta(get_the_ID(), '_client_title', true);
        $client_company = get_post_meta(get_the_ID(), '_client_company', true);
        $rating = get_post_meta(get_the_ID(), '_rating', true) ?: 5;
    ?>
        
        <!-- Testimonial Hero Section -->
        <section class="testimonials-section section">
            <div class="container">
                <div class="section-header text-center">
                    <h1><?php esc_html_e('Client Success Story', 'nateag-enterprises'); ?></h1>
                    <p><?php esc_html_e('Hear how NATEAG Enterprises helped transform their business', 'nateag-enterprises'); ?></p>
                </div>

                <div class="testimonial-featured">
                    <div class="testimonial-card">
                        <div class="testimonial-stars">
                            <?php for ($i = 0; $i < $rating; $i++) : ?>
                                <span class="star">⭐</span>
                            <?php endfor; ?>
                        </div>
                        
                        <blockquote class="testimonial-quote">
                            "<?php the_content(); ?>"
                        </blockquote>
                        
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                <?php echo esc_html(substr($client_name ?: 'C', 0, 1)); ?>
                            </div>
                            <div class="author-info">
                                <h4><?php echo esc_html($client_name ?: 'Anonymous'); ?></h4>
                                <p>
                                    <?php 
                                    $title_company = array();
                                    if ($client_title) $title_company[] = $client_title;
                                    if ($client_company) $title_company[] = $client_company;
                                    echo esc_html(implode(', ', $title_company));
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Related Services -->
        <section class="services-section section">
            <div class="container">
                <div class="section-header text-center">
                    <h2><?php esc_html_e('Our Services', 'nateag-enterprises'); ?></h2>
                    <p><?php esc_html_e('See how we can help transform your business too', 'nateag-enterprises'); ?></p>
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

        <!-- More Testimonials -->
        <section class="testimonials-section section">
            <div class="container">
                <div class="section-header text-center">
                    <h2><?php esc_html_e('More Success Stories', 'nateag-enterprises'); ?></h2>
                    <p><?php esc_html_e('See what other clients are saying about NATEAG Enterprises', 'nateag-enterprises'); ?></p>
                </div>

                <div class="testimonials-grid">
                    <?php
                    $other_testimonials = get_posts(array(
                        'post_type' => 'testimonials',
                        'posts_per_page' => 3,
                        'post_status' => 'publish',
                        'post__not_in' => array(get_the_ID()),
                        'orderby' => 'rand'
                    ));
                    
                    if ($other_testimonials) :
                        foreach ($other_testimonials as $testimonial) :
                            $other_client_name = get_post_meta($testimonial->ID, '_client_name', true);
                            $other_client_title = get_post_meta($testimonial->ID, '_client_title', true);
                            $other_client_company = get_post_meta($testimonial->ID, '_client_company', true);
                            $other_rating = get_post_meta($testimonial->ID, '_rating', true) ?: 5;
                    ?>
                        <div class="testimonial-card-small">
                            <div class="testimonial-stars">
                                <?php for ($i = 0; $i < $other_rating; $i++) : ?>
                                    <span class="star">⭐</span>
                                <?php endfor; ?>
                            </div>
                            
                            <blockquote>
                                "<?php echo esc_html(wp_trim_words(get_the_content(null, false, $testimonial), 20)); ?>"
                            </blockquote>
                            
                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    <?php echo esc_html(substr($other_client_name ?: 'C', 0, 1)); ?>
                                </div>
                                <div class="author-info">
                                    <h5><?php echo esc_html($other_client_name ?: 'Anonymous'); ?></h5>
                                    <p>
                                        <?php 
                                        $other_title_company = array();
                                        if ($other_client_title) $other_title_company[] = $other_client_title;
                                        if ($other_client_company) $other_title_company[] = $other_client_company;
                                        echo esc_html(implode(', ', $other_title_company));
                                        ?>
                                    </p>
                                </div>
                            </div>
                            
                            <a href="<?php echo esc_url(get_permalink($testimonial)); ?>" class="read-more">
                                <?php esc_html_e('Read Full Story', 'nateag-enterprises'); ?> →
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
.testimonial-featured {
    max-width: 4rem;
    margin: 0 auto;
}

.testimonial-featured .testimonial-card {
    padding: 4rem 3rem;
    margin-bottom: 0;
}

.testimonial-featured .testimonial-quote {
    font-size: 1.5rem;
    margin-bottom: 3rem;
}

@media (min-width: 768px) {
    .testimonial-featured .testimonial-quote {
        font-size: 2rem;
    }
}

.testimonials-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2rem;
    margin-top: 3rem;
}

@media (min-width: 768px) {
    .testimonials-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.testimonial-card-small {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border-radius: 1rem;
    padding: 2rem;
    text-align: center;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
}

.testimonial-card-small:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.testimonial-card-small .testimonial-stars {
    margin-bottom: 1rem;
}

.testimonial-card-small blockquote {
    font-size: 1rem;
    line-height: 1.6;
    color: #374151;
    font-style: italic;
    margin-bottom: 1.5rem;
}

.testimonial-card-small .testimonial-author {
    margin-bottom: 1rem;
}

.testimonial-card-small .author-avatar {
    width: 3rem;
    height: 3rem;
    font-size: 1rem;
    margin-bottom: 0.5rem;
}

.testimonial-card-small .author-info h5 {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.testimonial-card-small .author-info p {
    font-size: 0.875rem;
    color: #9333ea;
}

.testimonial-card-small .read-more {
    color: #9333ea;
    font-weight: 600;
    text-decoration: none;
    font-size: 0.875rem;
    transition: color 0.3s ease;
}

.testimonial-card-small .read-more:hover {
    color: #7c3aed;
}
</style>

<?php get_footer(); ?>