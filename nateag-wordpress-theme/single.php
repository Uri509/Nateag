<?php get_header(); ?>

<main class="main-content">
    
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Blog Post Hero -->
        <section class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-text">
                        <div class="hero-badge">
                            <span class="badge-icon">📚</span>
                            <?php 
                            $categories = get_the_category();
                            echo esc_html($categories[0]->name ?? 'Business Article');
                            ?>
                        </div>
                        
                        <h1 class="post-title"><?php the_title(); ?></h1>
                        
                        <div class="post-meta">
                            <div class="meta-item">
                                <span class="meta-icon">👤</span>
                                <span><?php esc_html_e('By', 'nateag-enterprises'); ?> <?php the_author(); ?></span>
                            </div>
                            <div class="meta-item">
                                <span class="meta-icon">📅</span>
                                <span><?php echo get_the_date('F j, Y'); ?></span>
                            </div>
                            <div class="meta-item">
                                <span class="meta-icon">⏰</span>
                                <span><?php echo esc_html(rand(5, 10)); ?> <?php esc_html_e('min read', 'nateag-enterprises'); ?></span>
                            </div>
                            <div class="meta-item">
                                <span class="meta-icon">📂</span>
                                <span>
                                    <?php 
                                    $categories = get_the_category();
                                    if ($categories) {
                                        echo esc_html($categories[0]->name);
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Image or Placeholder -->
                    <div class="hero-visual">
                        <div class="post-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', array('class' => 'featured-image')); ?>
                            <?php else : ?>
                                <div class="image-placeholder">
                                    <div class="placeholder-icon">📄</div>
                                    <p><?php the_title(); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Post Content -->
        <section class="section">
            <div class="container">
                <div class="post-content-wrapper">
                    <article class="post-content">
                        <?php the_content(); ?>
                    </article>
                    
                    <!-- Post Tags -->
                    <?php if (has_tag()) : ?>
                        <div class="post-tags">
                            <h4><?php esc_html_e('Tags:', 'nateag-enterprises'); ?></h4>
                            <div class="tags-list">
                                <?php the_tags('', '', ''); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Social Share -->
                    <div class="post-share">
                        <h4><?php esc_html_e('Share this article:', 'nateag-enterprises'); ?></h4>
                        <div class="share-buttons">
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="share-btn twitter">
                                🐦 <?php esc_html_e('Twitter', 'nateag-enterprises'); ?>
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="share-btn linkedin">
                                💼 <?php esc_html_e('LinkedIn', 'nateag-enterprises'); ?>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="share-btn facebook">
                                📘 <?php esc_html_e('Facebook', 'nateag-enterprises'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Related Posts -->
        <section class="blog-section section">
            <div class="container">
                <div class="section-header text-center">
                    <h2><?php esc_html_e('Related Articles', 'nateag-enterprises'); ?></h2>
                    <p><?php esc_html_e('Explore more insights and expert advice from NATEAG Enterprises', 'nateag-enterprises'); ?></p>
                </div>

                <?php
                $categories = get_the_category();
                $category_id = $categories ? $categories[0]->term_id : 0;
                
                $related_posts = get_posts(array(
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'post__not_in' => array(get_the_ID()),
                    'category__in' => array($category_id),
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                
                if (!$related_posts) {
                    $related_posts = get_posts(array(
                        'posts_per_page' => 3,
                        'post_status' => 'publish',
                        'post__not_in' => array(get_the_ID()),
                        'orderby' => 'date',
                        'order' => 'DESC'
                    ));
                }
                
                if ($related_posts) : ?>
                    <div class="blog-grid">
                        <?php foreach ($related_posts as $post) : 
                            setup_postdata($post);
                        ?>
                            <article class="blog-card">
                                <div class="blog-card-image">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('nateag-blog'); ?>
                                    <?php else : ?>
                                        <div class="blog-placeholder">
                                            <span class="blog-icon">📄</span>
                                        </div>
                                    <?php endif; ?>
                                    <div class="blog-category">
                                        <?php 
                                        $post_categories = get_the_category();
                                        echo esc_html($post_categories[0]->name ?? 'Business');
                                        ?>
                                    </div>
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
                        ?>
                    </div>
                <?php endif; ?>

                <div class="text-center">
                    <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn-primary">
                        <?php esc_html_e('View All Articles', 'nateag-enterprises'); ?> →
                    </a>
                </div>
            </div>
        </section>

    <?php endwhile; ?>
    
</main>

<style>
.post-title {
    font-size: 3rem;
    line-height: 1.1;
    margin-bottom: 2rem;
    color: #111827;
}

@media (max-width: 768px) {
    .post-title {
        font-size: 2rem;
    }
}

.post-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #6b7280;
    font-size: 0.875rem;
}

.meta-icon {
    font-size: 1rem;
}

.post-image {
    position: relative;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.featured-image {
    width: 100%;
    height: auto;
    display: block;
}

.image-placeholder {
    height: 300px;
    background: linear-gradient(135deg, #9333ea 0%, #3b82f6 100%);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: white;
    text-align: center;
    padding: 2rem;
}

.placeholder-icon {
    font-size: 4rem;
    margin-bottom: 1rem;
}

.post-content-wrapper {
    max-width: 4xl;
    margin: 0 auto;
}

.post-content {
    font-size: 1.125rem;
    line-height: 1.8;
    color: #374151;
    margin-bottom: 3rem;
}

.post-content h1,
.post-content h2,
.post-content h3,
.post-content h4,
.post-content h5,
.post-content h6 {
    margin-top: 2.5rem;
    margin-bottom: 1rem;
    color: #111827;
    font-weight: 700;
}

.post-content h2 {
    font-size: 2rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #e5e7eb;
}

.post-content h3 {
    font-size: 1.5rem;
}

.post-content p {
    margin-bottom: 1.5rem;
}

.post-content ul,
.post-content ol {
    margin-bottom: 1.5rem;
    padding-left: 2rem;
}

.post-content li {
    margin-bottom: 0.5rem;
}

.post-content blockquote {
    border-left: 4px solid #9333ea;
    padding: 1rem 2rem;
    margin: 2rem 0;
    background: rgba(147, 51, 234, 0.05);
    border-radius: 0 0.5rem 0.5rem 0;
    font-style: italic;
}

.post-content img {
    max-width: 100%;
    height: auto;
    border-radius: 0.5rem;
    margin: 2rem 0;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.post-tags,
.post-share {
    padding: 2rem 0;
    border-top: 1px solid #e5e7eb;
}

.post-tags h4,
.post-share h4 {
    color: #111827;
    margin-bottom: 1rem;
    font-size: 1.125rem;
}

.tags-list a {
    display: inline-block;
    background: #f3f4f6;
    color: #6b7280;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    text-decoration: none;
    font-size: 0.875rem;
    margin-right: 0.5rem;
    margin-bottom: 0.5rem;
    transition: all 0.3s ease;
}

.tags-list a:hover {
    background: #9333ea;
    color: white;
}

.share-buttons {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.share-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    border-radius: 2rem;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
}

.share-btn.twitter {
    background: #1da1f2;
    color: white;
}

.share-btn.linkedin {
    background: #0077b5;
    color: white;
}

.share-btn.facebook {
    background: #1877f2;
    color: white;
}

.share-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
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