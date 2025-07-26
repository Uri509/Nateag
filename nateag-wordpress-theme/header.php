<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="masthead">
    <div class="container">
        <div class="header-content">
            <!-- Logo -->
            <div class="site-logo">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <div class="logo-text">NATEAG</div>
                        <div class="logo-subtitle">ENTERPRISES</div>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Navigation -->
            <nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'nateag-enterprises'); ?>">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => false,
                ));
                ?>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="cta-button">
                    <?php esc_html_e('Get Started', 'nateag-enterprises'); ?>
                </a>
            </nav>

            <!-- Mobile menu toggle -->
            <button class="mobile-menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="sr-only"><?php esc_html_e('Main Menu', 'nateag-enterprises'); ?></span>
                <span class="menu-icon">☰</span>
            </button>
        </div>
    </div>
</header>

<div id="page" class="site">
    <div id="content" class="site-content">