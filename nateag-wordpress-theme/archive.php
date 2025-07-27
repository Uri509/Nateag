<?php get_header(); ?>

<main class="main-content">
    
    <!-- Archive Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content text-center">
                <div class="hero-text">
                    <div class="hero-badge">
                        <span class="badge-icon">📁</span>
                        <?php 
                        if (is_category()) {
                            esc_html_e('Category Archive', 'nateag-enterprises');
                        } elseif (is_tag()) {
                            esc_html_e('Tag Archive', 'nateag-enterprises');
                        } elseif (is_date()) {
                            esc_html_e('Date Archive', 'nateag-enterprises');
                        } elseif (is_author()) {
                            esc_html_e('Author Archive', 'nateag-enterprises');
                        } else {
                            esc_html_e('Archives', 'nateag-enterprises');
                        }
                        ?>
                    </div>
                    
                    <h1>
                        <?php
                        if (is_category()) {
                            echo '<span class="gradient-text">' . single_cat_title('', false) . '</span>';
                            echo '<br>' . esc_html__('Category', 'nateag-enterprises');
                        } elseif (is_tag()) {
                            echo '<span class="gradient-text">' . single_tag_title('', false) . '</span>';
                            echo '<br>' . esc_html__('Tag', 'nateag-enterprises');
                        } elseif (is_date()) {
                            echo '<span class="gradient-text">' . get_the_date('F Y') . '</span>';
                            echo '<br>' . esc_html__('Archive', 'nateag-enterprises');
                        } elseif (is_author()) {
                            echo esc_html__('Posts by', 'nateag-enterprises') . '<br>';
                            echo '<span class="gradient-text">' . get_the_author() . '</span>';
                        } else {
                            echo '<span class="gradient-text">' . esc_html__('Archives', 'nateag-enterprises') . '</span>';
                        }
                        ?>
                    </h1>
                    
                    <p>
                        <?php
                        if (is_category()) {
                            $description = category_description();
                            if (!empty($description)) {
                                echo esc_html(strip_tags($description));
                            } else {
                                esc_html_e('Explore all posts in this category to discover valuable business insights and expert advice.', 'nateag-enterprises');
                            }
                        } elseif (is_tag()) {
                            $description = tag_description();
                            if (!empty($description)) {
                                echo esc_html(strip_tags($description));
                            } else {
                                esc_html_e('Browse all posts tagged with this topic for focused business content.', 'nateag-enterprises');
                            }
                        } elseif (is_date()) {
                            esc_html_e('All posts published during this time period, featuring our latest business insights and expert guidance.', 'nateag-enterprises');
                        } elseif (is_author()) {
                            esc_html_e('All articles and insights written by this author, showcasing their expertise and knowledge.', 'nateag-enterprises');
                        } else {
                            esc_html_e('Browse through our archived content to find the business insights and expert advice you need.', 'nateag-enterprises');
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Archive Content -->
    <section class="blog-section section">
        <div class="container">
            
            <?php if (have_posts()) : ?>
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
                                    <?php if (is_author()) : ?>
                                        <span class="blog-author">👤 <?php the_author(); ?></span>
                                    <?php endif; ?>
                                </div>
                                
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php echo esc_html(get_the_excerpt()); ?></p>
                                
                                <div class="blog-footer">
                                    <?php if (!is_author()) : ?>
                                        <span class="author-name">👤 <?php the_author(); ?></span>
                                    <?php endif; ?>
                                    <a href="<?php the_permalink(); ?>" class="read-more">
                                        <?php esc_html_e('Read More', 'nateag-enterprises'); ?> →
                                    </a>
                                </div>
                                
                                <?php if (has_tag()) : ?>
                                    <div class="post-tags">
                                        <?php the_tags('<div class="tags-list">', '', '</div>'); ?>
                                    </div>
                                <?php endif; ?>
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
                <div class="no-posts text-center">
                    <div class="empty-state">
                        <div class="empty-icon">📁</div>
                        <h3><?php esc_html_e('No Posts Found', 'nateag-enterprises'); ?></h3>
                        <p>
                            <?php 
                            if (is_category() || is_tag()) {
                                esc_html_e('No posts have been published in this category or tag yet. Please check back later or explore our other content.', 'nateag-enterprises');
                            } else {
                                esc_html_e('No posts are available for this archive. Please check back later or browse our other content.', 'nateag-enterprises');
                            }
                            ?>
                        </p>
                        <div class="empty-actions">
                            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn-primary">
                                <?php esc_html_e('View All Posts', 'nateag-enterprises'); ?>
                            </a>
                            <a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>" class="btn-secondary">
                                <?php esc_html_e('Explore Services', 'nateag-enterprises'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Related Content -->
    <?php if (is_category() || is_tag()) : ?>
        <section class="section">
            <div class="container">
                <div class="section-header text-center">
                    <h2><?php esc_html_e('You Might Also Like', 'nateag-enterprises'); ?></h2>
                    <p><?php esc_html_e('Explore more business insights and expert advice', 'nateag-enterprises'); ?></p>
                </div>

                <?php
                // Get related posts from other categories/tags
                $related_args = array(
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'orderby' => 'rand',
                );
                
                if (is_category()) {
                    $current_cat = get_queried_object_id();
                    $related_args['category__not_in'] = array($current_cat);
                } elseif (is_tag()) {
                    $current_tag = get_queried_object_id();
                    $related_args['tag__not_in'] = array($current_tag);
                }
                
                $related_posts = get_posts($related_args);
                
                if ($related_posts) : ?>
                    <div class="blog-grid">
                        <?php foreach ($related_posts as $post) : 
                            setup_postdata($post);
                        ?>
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
                                    
                                    <div class="blog-footer">
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
                        ?>
                    </div>
                <?php endif; ?>

                <div class="text-center">
                    <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn-primary">
                        <?php esc_html_e('View All Posts', 'nateag-enterprises'); ?> →
                    </a>
                </div>
            </div>
        </section>
    <?php endif; ?>

</main>

<style>
.blog-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: auto;
}

.post-tags {
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 1px solid #f3f4f6;
}

.post-tags .tags-list a {
    display: inline-block;
    background: #f3f4f6;
    color: #6b7280;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    text-decoration: none;
    font-size: 0.75rem;
    margin-right: 0.5rem;
    margin-bottom: 0.5rem;
    transition: all 0.3s ease;
}

.post-tags .tags-list a:hover {
    background: #9333ea;
    color: white;
}

.blog-card-content {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.blog-card h3 a {
    color: inherit;
    text-decoration: none;
    transition: color 0.3s ease;
}

.blog-card h3 a:hover {
    color: #9333ea;
}
</style>

<?php get_footer(); ?>