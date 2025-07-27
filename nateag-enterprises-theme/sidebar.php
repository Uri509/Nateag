<aside id="secondary" class="widget-area sidebar">
    
    <!-- Search Widget -->
    <div class="widget widget-search">
        <h3 class="widget-title"><?php esc_html_e('Search', 'nateag-enterprises'); ?></h3>
        <form class="search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <div class="search-input-group">
                <input type="search" 
                       name="s" 
                       placeholder="<?php esc_attr_e('Search...', 'nateag-enterprises'); ?>" 
                       value="<?php echo esc_attr(get_search_query()); ?>">
                <button type="submit">
                    <span class="search-icon">🔍</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Recent Posts Widget -->
    <div class="widget widget-recent-posts">
        <h3 class="widget-title"><?php esc_html_e('Recent Articles', 'nateag-enterprises'); ?></h3>
        <ul class="recent-posts-list">
            <?php
            $recent_posts = get_posts(array(
                'posts_per_page' => 5,
                'post_status' => 'publish'
            ));
            
            foreach ($recent_posts as $post) :
                setup_postdata($post);
            ?>
                <li class="recent-post-item">
                    <div class="post-thumbnail">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </a>
                        <?php else : ?>
                            <div class="placeholder-thumb">
                                <span>📄</span>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="post-info">
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <div class="post-meta">
                            <span class="post-date">📅 <?php echo get_the_date('M j'); ?></span>
                        </div>
                    </div>
                </li>
            <?php 
            endforeach;
            wp_reset_postdata();
            ?>
        </ul>
    </div>

    <!-- Categories Widget -->
    <div class="widget widget-categories">
        <h3 class="widget-title"><?php esc_html_e('Categories', 'nateag-enterprises'); ?></h3>
        <ul class="categories-list">
            <?php
            $categories = get_categories(array(
                'orderby' => 'count',
                'order' => 'DESC',
                'hide_empty' => true
            ));
            
            foreach ($categories as $category) :
            ?>
                <li class="category-item">
                    <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
                        <span class="category-name"><?php echo esc_html($category->name); ?></span>
                        <span class="post-count">(<?php echo $category->count; ?>)</span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Services Widget -->
    <div class="widget widget-services">
        <h3 class="widget-title"><?php esc_html_e('Our Services', 'nateag-enterprises'); ?></h3>
        <div class="services-list">
            <?php
            $services = nateag_get_services(3);
            if ($services) :
                foreach ($services as $service) :
                    $service_icon = get_post_meta($service->ID, '_service_icon', true) ?: 'consulting';
                    $icon_map = array(
                        'consulting' => '👥',
                        'marketing' => '📈', 
                        'logistics' => '🚚'
                    );
                    $icon = $icon_map[$service_icon] ?: '👥';
            ?>
                <div class="service-item">
                    <div class="service-icon-small">
                        <?php echo $icon; ?>
                    </div>
                    <div class="service-info">
                        <h4><a href="<?php echo esc_url(get_permalink($service)); ?>"><?php echo esc_html(get_the_title($service)); ?></a></h4>
                        <p><?php echo esc_html(wp_trim_words(get_the_excerpt($service), 8)); ?></p>
                    </div>
                </div>
            <?php 
                endforeach;
            endif;
            ?>
        </div>
        <div class="widget-footer">
            <a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>" class="btn-primary btn-small">
                <?php esc_html_e('View All Services', 'nateag-enterprises'); ?> →
            </a>
        </div>
    </div>

    <!-- Newsletter Widget -->
    <div class="widget widget-newsletter">
        <h3 class="widget-title"><?php esc_html_e('Stay Updated', 'nateag-enterprises'); ?></h3>
        <p><?php esc_html_e('Get the latest business insights delivered to your inbox.', 'nateag-enterprises'); ?></p>
        
        <form class="newsletter-form-sidebar" id="sidebar-newsletter-form">
            <div class="form-group">
                <input type="text" name="newsletter_name" placeholder="<?php esc_attr_e('Your Name', 'nateag-enterprises'); ?>" required>
            </div>
            <div class="form-group">
                <input type="email" name="newsletter_email" placeholder="<?php esc_attr_e('Your Email', 'nateag-enterprises'); ?>" required>
            </div>
            <button type="submit" class="btn-primary btn-small">
                <?php esc_html_e('Subscribe', 'nateag-enterprises'); ?>
            </button>
        </form>
    </div>

    <!-- Contact Widget -->
    <div class="widget widget-contact">
        <h3 class="widget-title"><?php esc_html_e('Get In Touch', 'nateag-enterprises'); ?></h3>
        <div class="contact-info">
            <div class="contact-item">
                <span class="contact-icon">📧</span>
                <div>
                    <strong><?php esc_html_e('Email', 'nateag-enterprises'); ?></strong>
                    <a href="mailto:info@nateagenterprises.com">info@nateagenterprises.com</a>
                </div>
            </div>
            
            <div class="contact-item">
                <span class="contact-icon">📞</span>
                <div>
                    <strong><?php esc_html_e('Phone', 'nateag-enterprises'); ?></strong>
                    <a href="tel:+12074174844">(207) 417-4844</a>
                </div>
            </div>
            
            <div class="contact-item">
                <span class="contact-icon">📍</span>
                <div>
                    <strong><?php esc_html_e('Address', 'nateag-enterprises'); ?></strong>
                    <span>45 Dan Rd, Canton, MA 02021</span>
                </div>
            </div>
        </div>
        
        <div class="widget-footer">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-secondary btn-small">
                <?php esc_html_e('Contact Us', 'nateag-enterprises'); ?>
            </a>
        </div>
    </div>

</aside>

<style>
.sidebar {
    max-width: 350px;
    margin-top: 2rem;
}

.widget {
    background: white;
    border-radius: 1rem;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    border: 1px solid #f3f4f6;
}

.widget-title {
    color: #111827;
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    padding-bottom: 0.75rem;
    border-bottom: 2px solid #9333ea;
    position: relative;
}

.widget-title::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 2rem;
    height: 2px;
    background: linear-gradient(135deg, #9333ea 0%, #3b82f6 100%);
}

/* Search Widget */
.widget-search .search-input-group {
    display: flex;
    border: 2px solid #e5e7eb;
    border-radius: 2rem;
    overflow: hidden;
    transition: border-color 0.3s ease;
}

.widget-search .search-input-group:focus-within {
    border-color: #9333ea;
}

.widget-search input {
    flex: 1;
    padding: 0.75rem 1rem;
    border: none;
    background: #f9fafb;
    font-size: 0.875rem;
}

.widget-search input:focus {
    outline: none;
    background: white;
}

.widget-search button {
    background: linear-gradient(135deg, #9333ea 0%, #3b82f6 100%);
    color: white;
    border: none;
    padding: 0.75rem 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.widget-search button:hover {
    background: linear-gradient(135deg, #7c3aed 0%, #2563eb 100%);
}

/* Recent Posts Widget */
.recent-posts-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.recent-post-item {
    display: flex;
    gap: 1rem;
    margin-bottom: 1.5rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #f3f4f6;
}

.recent-post-item:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.post-thumbnail {
    flex-shrink: 0;
    width: 4rem;
    height: 4rem;
    border-radius: 0.5rem;
    overflow: hidden;
}

.post-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.placeholder-thumb {
    width: 4rem;
    height: 4rem;
    background: linear-gradient(135deg, #9333ea 0%, #3b82f6 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 0.5rem;
    color: white;
    font-size: 1.5rem;
}

.post-info h4 {
    margin-bottom: 0.5rem;
}

.post-info h4 a {
    color: #111827;
    text-decoration: none;
    font-size: 0.875rem;
    font-weight: 600;
    line-height: 1.4;
    transition: color 0.3s ease;
}

.post-info h4 a:hover {
    color: #9333ea;
}

.post-meta {
    font-size: 0.75rem;
    color: #6b7280;
}

/* Categories Widget */
.categories-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.category-item {
    margin-bottom: 0.75rem;
}

.category-item a {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #374151;
    text-decoration: none;
    padding: 0.5rem 0.75rem;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
}

.category-item a:hover {
    background: rgba(147, 51, 234, 0.1);
    color: #9333ea;
}

.post-count {
    background: #f3f4f6;
    color: #6b7280;
    padding: 0.25rem 0.5rem;
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: 600;
}

.category-item a:hover .post-count {
    background: #9333ea;
    color: white;
}

/* Services Widget */
.services-list {
    margin-bottom: 1.5rem;
}

.service-item {
    display: flex;
    gap: 1rem;
    margin-bottom: 1.5rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #f3f4f6;
}

.service-item:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.service-icon-small {
    width: 3rem;
    height: 3rem;
    background: linear-gradient(135deg, #9333ea 0%, #3b82f6 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    color: white;
    flex-shrink: 0;
}

.service-info h4 {
    margin-bottom: 0.5rem;
}

.service-info h4 a {
    color: #111827;
    text-decoration: none;
    font-size: 0.875rem;
    font-weight: 600;
    transition: color 0.3s ease;
}

.service-info h4 a:hover {
    color: #9333ea;
}

.service-info p {
    color: #6b7280;
    font-size: 0.75rem;
    line-height: 1.5;
}

/* Newsletter Widget */
.newsletter-form-sidebar .form-group {
    margin-bottom: 1rem;
}

.newsletter-form-sidebar input {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 2px solid #e5e7eb;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    background: #f9fafb;
    transition: all 0.3s ease;
}

.newsletter-form-sidebar input:focus {
    outline: none;
    border-color: #9333ea;
    background: white;
    box-shadow: 0 0 0 3px rgba(147, 51, 234, 0.1);
}

/* Contact Widget */
.contact-info .contact-item {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    margin-bottom: 1rem;
}

.contact-info .contact-item:last-child {
    margin-bottom: 0;
}

.contact-info .contact-icon {
    width: 2rem;
    height: 2rem;
    background: linear-gradient(135deg, #9333ea 0%, #3b82f6 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.875rem;
    color: white;
    flex-shrink: 0;
}

.contact-info .contact-item div {
    flex: 1;
}

.contact-info .contact-item strong {
    display: block;
    margin-bottom: 0.25rem;
    color: #111827;
    font-size: 0.875rem;
}

.contact-info .contact-item a {
    color: #9333ea;
    text-decoration: none;
    font-size: 0.875rem;
    font-weight: 500;
    transition: color 0.3s ease;
}

.contact-info .contact-item a:hover {
    color: #7c3aed;
}

.contact-info .contact-item span {
    color: #6b7280;
    font-size: 0.875rem;
}

/* Button Styles */
.btn-small {
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    border-radius: 1.5rem;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    cursor: pointer;
    border: none;
}

.btn-primary.btn-small {
    background: linear-gradient(135deg, #9333ea 0%, #3b82f6 100%);
    color: white;
}

.btn-primary.btn-small:hover {
    background: linear-gradient(135deg, #7c3aed 0%, #2563eb 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(147, 51, 234, 0.3);
}

.btn-secondary.btn-small {
    background: transparent;
    color: #9333ea;
    border: 2px solid #9333ea;
}

.btn-secondary.btn-small:hover {
    background: #9333ea;
    color: white;
    transform: translateY(-2px);
}

.widget-footer {
    margin-top: 1.5rem;
    text-align: center;
}

@media (max-width: 1024px) {
    .sidebar {
        margin-top: 3rem;
        max-width: none;
    }
    
    .widget {
        margin-bottom: 1.5rem;
    }
}
</style>