<?php get_header(); ?>

<main class="main-content">
    
    <!-- Search Results Hero -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content text-center">
                <div class="hero-text">
                    <div class="hero-badge">
                        <span class="badge-icon">🔍</span>
                        <?php esc_html_e('Search Results', 'nateag-enterprises'); ?>
                    </div>
                    
                    <h1>
                        <?php if (have_posts()) : ?>
                            <?php esc_html_e('Search Results for:', 'nateag-enterprises'); ?>
                            <span class="gradient-text">"<?php echo get_search_query(); ?>"</span>
                        <?php else : ?>
                            <?php esc_html_e('No Results Found for:', 'nateag-enterprises'); ?>
                            <span class="gradient-text">"<?php echo get_search_query(); ?>"</span>
                        <?php endif; ?>
                    </h1>
                    
                    <?php if (have_posts()) : ?>
                        <p><?php esc_html_e('Here are the search results matching your query:', 'nateag-enterprises'); ?></p>
                    <?php else : ?>
                        <p><?php esc_html_e('Sorry, no results were found. Please try a different search term or browse our services and articles below.', 'nateag-enterprises'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Results -->
    <section class="section">
        <div class="container">
            
            <!-- Search Form -->
            <div class="search-form-container">
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
            </div>

            <?php if (have_posts()) : ?>
                <div class="search-results">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="search-result-item">
                            <div class="result-content">
                                <div class="result-meta">
                                    <span class="result-type">
                                        <?php 
                                        $post_type_obj = get_post_type_object(get_post_type());
                                        echo esc_html($post_type_obj->labels->singular_name);
                                        ?>
                                    </span>
                                    <span class="result-date">
                                        📅 <?php echo get_the_date('M j, Y'); ?>
                                    </span>
                                </div>
                                
                                <h3 class="result-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                
                                <div class="result-excerpt">
                                    <?php 
                                    $excerpt = get_the_excerpt();
                                    if (empty($excerpt)) {
                                        $excerpt = wp_trim_words(get_the_content(), 25);
                                    }
                                    echo esc_html($excerpt);
                                    ?>
                                </div>
                                
                                <div class="result-actions">
                                    <a href="<?php the_permalink(); ?>" class="read-more">
                                        <?php esc_html_e('Read More', 'nateag-enterprises'); ?> →
                                    </a>
                                    
                                    <?php if (get_post_type() === 'services') : ?>
                                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>?service=<?php echo urlencode(get_the_title()); ?>" class="cta-button">
                                            <?php esc_html_e('Get Started', 'nateag-enterprises'); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                
                <!-- Pagination -->
                <?php if (get_next_posts_link() || get_previous_posts_link()) : ?>
                    <div class="pagination-wrapper text-center">
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
                <div class="no-results">
                    <div class="empty-state">
                        <div class="empty-icon">🔍</div>
                        <h3><?php esc_html_e('No Results Found', 'nateag-enterprises'); ?></h3>
                        <p><?php esc_html_e('We couldn\'t find any content matching your search. Try using different keywords or browse our services and articles below.', 'nateag-enterprises'); ?></p>
                        
                        <!-- Suggestions -->
                        <div class="search-suggestions">
                            <h4><?php esc_html_e('Try searching for:', 'nateag-enterprises'); ?></h4>
                            <div class="suggestion-tags">
                                <a href="<?php echo esc_url(home_url('/?s=business+consulting')); ?>">
                                    <?php esc_html_e('Business Consulting', 'nateag-enterprises'); ?>
                                </a>
                                <a href="<?php echo esc_url(home_url('/?s=marketing')); ?>">
                                    <?php esc_html_e('Marketing', 'nateag-enterprises'); ?>
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
            <?php endif; ?>
        </div>
    </section>

    <!-- Services Suggestion -->
    <section class="services-section section">
        <div class="container">
            <div class="section-header text-center">
                <h2><?php esc_html_e('Explore Our Services', 'nateag-enterprises'); ?></h2>
                <p><?php esc_html_e('Maybe one of our business solutions can help you achieve your goals', 'nateag-enterprises'); ?></p>
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
.search-form-container {
    max-width: 600px;
    margin: 0 auto 3rem;
    text-align: center;
}

.search-input-group {
    display: flex;
    border-radius: 2rem;
    overflow: hidden;
    border: 2px solid #e5e7eb;
    transition: border-color 0.3s ease;
    background: white;
}

.search-input-group:focus-within {
    border-color: #9333ea;
    box-shadow: 0 0 0 3px rgba(147, 51, 234, 0.1);
}

.search-input-group input {
    flex: 1;
    padding: 1rem 1.5rem;
    border: none;
    font-size: 1rem;
    background: transparent;
}

.search-input-group input:focus {
    outline: none;
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
    white-space: nowrap;
}

.search-input-group button:hover {
    background: linear-gradient(135deg, #7c3aed 0%, #2563eb 100%);
}

.search-results {
    max-width: 4xl;
    margin: 0 auto;
}

.search-result-item {
    background: white;
    border-radius: 1rem;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    border: 1px solid #f3f4f6;
}

.search-result-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    border-color: #9333ea;
}

.result-meta {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
    font-size: 0.875rem;
    color: #6b7280;
}

.result-type {
    background: linear-gradient(135deg, #9333ea 0%, #3b82f6 100%);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-weight: 600;
    font-size: 0.75rem;
    text-transform: uppercase;
}

.result-title {
    margin-bottom: 1rem;
}

.result-title a {
    color: #111827;
    text-decoration: none;
    font-size: 1.5rem;
    font-weight: 700;
    transition: color 0.3s ease;
}

.result-title a:hover {
    color: #9333ea;
}

.result-excerpt {
    color: #6b7280;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.result-actions {
    display: flex;
    gap: 1rem;
    align-items: center;
}

.read-more {
    color: #9333ea;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

.read-more:hover {
    color: #7c3aed;
}

.search-suggestions {
    margin-top: 2rem;
}

.search-suggestions h4 {
    color: #374151;
    margin-bottom: 1rem;
}

.suggestion-tags {
    display: flex;
    justify-content: center;
    gap: 0.75rem;
    flex-wrap: wrap;
}

.suggestion-tags a {
    background: #f3f4f6;
    color: #6b7280;
    padding: 0.5rem 1rem;
    border-radius: 1rem;
    text-decoration: none;
    font-size: 0.875rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.suggestion-tags a:hover {
    background: #9333ea;
    color: white;
    transform: translateY(-2px);
}

@media (max-width: 640px) {
    .search-input-group {
        flex-direction: column;
        border-radius: 0.5rem;
    }
    
    .result-actions {
        flex-direction: column;
        align-items: stretch;
    }
    
    .result-actions .cta-button {
        text-align: center;
    }
}
</style>

<?php get_footer(); ?>