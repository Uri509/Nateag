<?php get_header(); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <div class="hero-content-editable">
                    <?php 
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            if (get_the_content()) {
                                echo '<div class="page-content">';
                                the_content();
                                echo '</div>';
                            } else {
                                // Default hero content
                                ?>
                                <div class="hero-badge">
                                    <span class="badge-icon">🚀</span>
                                    <?php esc_html_e('Empowering Entrepreneurs', 'nateag-enterprises'); ?>
                                </div>
                                
                                <h1>
                                    <?php esc_html_e('Transform Your Business with', 'nateag-enterprises'); ?>
                                    <span class="gradient-text"><?php esc_html_e('NATEAG Enterprises', 'nateag-enterprises'); ?></span>
                                </h1>
                                
                                <p><?php esc_html_e('Comprehensive consulting, marketing, and logistics solutions designed to drive sustainable growth and empower entrepreneurs in today\'s competitive business landscape.', 'nateag-enterprises'); ?></p>
                                <?php
                            }
                        endwhile;
                    endif;
                    ?>
                </div>
                
                <!-- Key Points -->
                <div class="key-points">
                    <div class="key-point">
                        <div class="point-icon purple">✓</div>
                        <div>
                            <strong><?php esc_html_e('Strategic Consulting', 'nateag-enterprises'); ?></strong>
                            <p><?php esc_html_e('Build effective strategies', 'nateag-enterprises'); ?></p>
                        </div>
                    </div>
                    
                    <div class="key-point">
                        <div class="point-icon blue">✓</div>
                        <div>
                            <strong><?php esc_html_e('Marketing Solutions', 'nateag-enterprises'); ?></strong>
                            <p><?php esc_html_e('Boost brand visibility', 'nateag-enterprises'); ?></p>
                        </div>
                    </div>
                    
                    <div class="key-point">
                        <div class="point-icon indigo">✓</div>
                        <div>
                            <strong><?php esc_html_e('Logistics Services', 'nateag-enterprises'); ?></strong>
                            <p><?php esc_html_e('Optimize supply chains', 'nateag-enterprises'); ?></p>
                        </div>
                    </div>
                </div>
                
                <!-- CTA Buttons -->
                <div class="hero-buttons">
                    <a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>" class="btn-primary">
                        <?php esc_html_e('Explore Our Services', 'nateag-enterprises'); ?> →
                    </a>
                    
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-secondary">
                        <?php esc_html_e('Get Free Consultation', 'nateag-enterprises'); ?>
                    </a>
                </div>
            </div>

            <!-- Visual Element -->
            <div class="hero-visual">
                <div class="hero-card">
                    <h3><?php esc_html_e('Ready to Transform Your Business?', 'nateag-enterprises'); ?></h3>
                    <p><?php esc_html_e('Join successful entrepreneurs who trust NATEAG Enterprises', 'nateag-enterprises'); ?></p>
                    
                    <div class="checklist">
                        <div class="check-item">
                            <span class="check-icon">✓</span>
                            <?php esc_html_e('Strategic Business Planning', 'nateag-enterprises'); ?>
                        </div>
                        <div class="check-item">
                            <span class="check-icon">✓</span>
                            <?php esc_html_e('Marketing & Brand Development', 'nateag-enterprises'); ?>
                        </div>
                        <div class="check-item">
                            <span class="check-icon">✓</span>
                            <?php esc_html_e('Supply Chain Optimization', 'nateag-enterprises'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section section">
    <div class="container">
        <div class="section-header text-center">
            <h2><?php esc_html_e('Comprehensive Business Solutions', 'nateag-enterprises'); ?></h2>
            <p><?php esc_html_e('We empower entrepreneurs with strategic consulting, innovative marketing, and efficient logistics solutions to compete confidently in national and international markets.', 'nateag-enterprises'); ?></p>
        </div>

        <div class="services-grid">
            <?php
            $services = nateag_get_services(3);
            if ($services) :
                $colors = array('purple', 'blue', 'indigo');
                $icons = array('👥', '📈', '🚚');
                foreach ($services as $index => $service) :
                    $color = $colors[$index % 3];
                    $icon = $icons[$index % 3];
            ?>
                <div class="service-card">
                    <div class="service-icon <?php echo esc_attr($color); ?>">
                        <?php echo $icon; ?>
                    </div>
                    <h3><?php echo esc_html(get_the_title($service)); ?></h3>
                    <p><?php echo esc_html(get_the_excerpt($service)); ?></p>
                    
                    <div class="service-features">
                        <div class="feature-item">• <?php esc_html_e('Expert consultation', 'nateag-enterprises'); ?></div>
                        <div class="feature-item">• <?php esc_html_e('Customized solutions', 'nateag-enterprises'); ?></div>
                        <div class="feature-item">• <?php esc_html_e('Ongoing support', 'nateag-enterprises'); ?></div>
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

<!-- About Preview Section -->
<section class="about-section section">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <div class="section-badge">
                    <span class="badge-icon">🏆</span>
                    <?php esc_html_e('Leadership Excellence', 'nateag-enterprises'); ?>
                </div>
                
                <h2>
                    <?php esc_html_e('Meet', 'nateag-enterprises'); ?>
                    <span class="gradient-text"><?php esc_html_e('Gaetan Junior Jean-Francois', 'nateag-enterprises'); ?></span>
                </h2>
                
                <p><?php esc_html_e('A visionary Haitian entrepreneur based in Boston, Gaetan leads NATEAG Enterprises with a mission to drive economic development and empower communities through sustainable business ventures in fisheries, agriculture, and beyond.', 'nateag-enterprises'); ?></p>
                
                <!-- Key Achievements -->
                <div class="about-stats">
                    <div class="stat-item">
                        <div class="stat-icon">🎯</div>
                        <div>
                            <strong><?php esc_html_e('2+ Years', 'nateag-enterprises'); ?></strong>
                            <p><?php esc_html_e('Hands-on business experience', 'nateag-enterprises'); ?></p>
                        </div>
                    </div>
                    
                    <div class="stat-item">
                        <div class="stat-icon">🌍</div>
                        <div>
                            <strong><?php esc_html_e('International Focus', 'nateag-enterprises'); ?></strong>
                            <p><?php esc_html_e('Global market expertise', 'nateag-enterprises'); ?></p>
                        </div>
                    </div>
                </div>
                
                <!-- Mission Statement -->
                <div class="mission-box">
                    <h3><?php esc_html_e('Our Mission', 'nateag-enterprises'); ?></h3>
                    <p><?php esc_html_e('"To empower entrepreneurs and communities by providing comprehensive business solutions that drive sustainable growth, economic development, and lasting positive impact in local and international markets."', 'nateag-enterprises'); ?></p>
                </div>
                
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>" class="btn-primary">
                    <?php esc_html_e('Learn More About Our Story', 'nateag-enterprises'); ?> →
                </a>
            </div>

            <!-- Visual Element -->
            <div class="about-visual">
                <div class="leader-card">
                    <div class="leader-avatar">GJF</div>
                    <h3><?php esc_html_e('Gaetan Junior Jean-Francois', 'nateag-enterprises'); ?></h3>
                    <p class="leader-title"><?php esc_html_e('Founder & CEO', 'nateag-enterprises'); ?></p>
                    <p class="leader-location"><?php esc_html_e('Boston, Massachusetts', 'nateag-enterprises'); ?></p>
                    
                    <div class="leader-details">
                        <div class="detail-row">
                            <span><?php esc_html_e('Experience', 'nateag-enterprises'); ?></span>
                            <strong><?php esc_html_e('2+ Years', 'nateag-enterprises'); ?></strong>
                        </div>
                        <div class="detail-row">
                            <span><?php esc_html_e('Focus Areas', 'nateag-enterprises'); ?></span>
                            <strong><?php esc_html_e('Fisheries, Agriculture', 'nateag-enterprises'); ?></strong>
                        </div>
                        <div class="detail-row">
                            <span><?php esc_html_e('Mission', 'nateag-enterprises'); ?></span>
                            <strong><?php esc_html_e('Community Empowerment', 'nateag-enterprises'); ?></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section section">
    <div class="container">
        <div class="section-header text-center">
            <h2><?php esc_html_e('What Our Clients Say', 'nateag-enterprises'); ?></h2>
            <p><?php esc_html_e('Hear from successful entrepreneurs who have transformed their businesses with NATEAG Enterprises', 'nateag-enterprises'); ?></p>
        </div>

        <div class="testimonial-slider">
            <?php
            $testimonials = nateag_get_testimonials(3);
            if ($testimonials) :
                foreach ($testimonials as $testimonial) :
                    $client_name = get_post_meta($testimonial->ID, '_client_name', true);
                    $client_title = get_post_meta($testimonial->ID, '_client_title', true);
                    $client_company = get_post_meta($testimonial->ID, '_client_company', true);
                    $rating = get_post_meta($testimonial->ID, '_rating', true) ?: 5;
            ?>
                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        <?php for ($i = 0; $i < $rating; $i++) : ?>
                            <span class="star">⭐</span>
                        <?php endfor; ?>
                    </div>
                    
                    <blockquote class="testimonial-quote">
                        "<?php echo esc_html(get_the_content(null, false, $testimonial)); ?>"
                    </blockquote>
                    
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <?php echo esc_html(substr($client_name, 0, 1)); ?>
                        </div>
                        <div class="author-info">
                            <h4><?php echo esc_html($client_name); ?></h4>
                            <p><?php echo esc_html($client_title . ($client_company ? ', ' . $client_company : '')); ?></p>
                        </div>
                    </div>
                </div>
            <?php 
                endforeach;
            endif;
            ?>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <span class="stat-number">150+</span>
                <span class="stat-label"><?php esc_html_e('Clients Served', 'nateag-enterprises'); ?></span>
            </div>
            <div class="stat-card">
                <span class="stat-number">2+</span>
                <span class="stat-label"><?php esc_html_e('Years of Experience', 'nateag-enterprises'); ?></span>
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
</section>

<!-- Blog Preview Section -->
<section class="blog-section section">
    <div class="container">
        <div class="section-header text-center">
            <h2><?php esc_html_e('Latest Business Insights', 'nateag-enterprises'); ?></h2>
            <p><?php esc_html_e('Stay ahead with expert advice on business strategy, marketing trends, and industry insights', 'nateag-enterprises'); ?></p>
        </div>

        <div class="blog-grid">
            <?php
            $recent_posts = get_posts(array(
                'posts_per_page' => 3,
                'post_status' => 'publish'
            ));
            
            if ($recent_posts) :
                foreach ($recent_posts as $post) :
                    setup_postdata($post);
            ?>
                <article class="blog-card">
                    <div class="blog-card-image">
                        <div class="blog-category"><?php echo esc_html(get_the_category()[0]->name ?? 'Business'); ?></div>
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
            <?php 
                endforeach;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <div class="text-center">
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn-primary">
                <?php esc_html_e('View All Articles', 'nateag-enterprises'); ?> →
            </a>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="newsletter-section">
    <div class="container">
        <div class="newsletter-content">
            <div class="newsletter-icon">📧</div>
            
            <h2><?php esc_html_e('Stay Ahead in Business', 'nateag-enterprises'); ?></h2>
            
            <p><?php esc_html_e('Get exclusive business insights, strategic tips, and industry trends delivered directly to your inbox. Join successful entrepreneurs who trust our expertise.', 'nateag-enterprises'); ?></p>
            
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
                    <?php esc_html_e('Exclusive Resources', 'nateag-enterprises'); ?>
                </div>
            </div>
            
            <!-- Form -->
            <form class="newsletter-form" id="homepage-newsletter-form">
                <input type="text" name="newsletter_name" placeholder="<?php esc_attr_e('Your Name', 'nateag-enterprises'); ?>" required>
                <input type="email" name="newsletter_email" placeholder="<?php esc_attr_e('Your Email Address', 'nateag-enterprises'); ?>" required>
                <button type="submit"><?php esc_html_e('Subscribe to Newsletter', 'nateag-enterprises'); ?></button>
            </form>
            
            <!-- Trust Indicators -->
            <div class="trust-indicators">
                <div class="trust-item">
                    <span class="trust-icon">✓</span>
                    <?php esc_html_e('No spam, ever', 'nateag-enterprises'); ?>
                </div>
                <div class="trust-item">
                    <span class="trust-icon">✓</span>
                    <?php esc_html_e('Unsubscribe anytime', 'nateag-enterprises'); ?>
                </div>
                <div class="trust-item">
                    <span class="trust-icon">✓</span>
                    <?php esc_html_e('150+ subscribers', 'nateag-enterprises'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>