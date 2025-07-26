<?php
/**
 * NATEAG Enterprises Theme Functions
 */

// Theme setup
function nateag_theme_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'nateag-enterprises'),
        'footer' => __('Footer Menu', 'nateag-enterprises'),
    ));

    // Add custom image sizes
    add_image_size('nateag-hero', 800, 600, true);
    add_image_size('nateag-service', 400, 300, true);
    add_image_size('nateag-blog', 400, 250, true);
}
add_action('after_setup_theme', 'nateag_theme_setup');

// Enqueue styles and scripts
function nateag_enqueue_scripts() {
    wp_enqueue_style('nateag-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    wp_enqueue_style('nateag-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', array(), null);
    wp_enqueue_script('nateag-main', get_template_directory_uri() . '/js/main.js', array('jquery'), wp_get_theme()->get('Version'), true);
    
    wp_localize_script('nateag-main', 'nateag_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('nateag_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'nateag_enqueue_scripts');

// Custom post types
function nateag_custom_post_types() {
    // Services post type
    register_post_type('services', array(
        'labels' => array(
            'name' => __('Services', 'nateag-enterprises'),
            'singular_name' => __('Service', 'nateag-enterprises'),
            'add_new' => __('Add New Service', 'nateag-enterprises'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest' => true,
    ));

    // Testimonials post type
    register_post_type('testimonials', array(
        'labels' => array(
            'name' => __('Testimonials', 'nateag-enterprises'),
            'singular_name' => __('Testimonial', 'nateag-enterprises'),
            'add_new' => __('Add New Testimonial', 'nateag-enterprises'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-testimonial',
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'nateag_custom_post_types');

// Contact form handler
function nateag_handle_contact_form() {
    check_ajax_referer('nateag_nonce', 'nonce');

    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $company = sanitize_text_field($_POST['company']);
    $service = sanitize_text_field($_POST['service']);
    $message = sanitize_textarea_field($_POST['message']);

    $to = get_option('admin_email');
    $subject = 'New Contact Form Submission from ' . $name;
    $body = "Name: $name\nEmail: $email\nPhone: $phone\nCompany: $company\nService: $service\nMessage: $message\n";

    if (wp_mail($to, $subject, $body)) {
        wp_send_json_success(array('message' => 'Thank you for your message! We\'ll get back to you within 24 hours.'));
    } else {
        wp_send_json_error(array('message' => 'There was an error sending your message. Please try again.'));
    }
}
add_action('wp_ajax_contact_form', 'nateag_handle_contact_form');
add_action('wp_ajax_nopriv_contact_form', 'nateag_handle_contact_form');

// Newsletter subscription handler
function nateag_handle_newsletter_subscription() {
    check_ajax_referer('nateag_nonce', 'nonce');

    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);

    $to = $email;
    $subject = 'Welcome to NATEAG Enterprises Newsletter';
    $body = "Hi $name,\n\nThank you for subscribing to our newsletter!\n\nBest regards,\nNATEAG Enterprises Team";

    if (wp_mail($to, $subject, $body)) {
        wp_send_json_success(array('message' => 'Successfully subscribed! Thank you for joining our newsletter.'));
    } else {
        wp_send_json_error(array('message' => 'There was an error with your subscription. Please try again.'));
    }
}
add_action('wp_ajax_newsletter_subscription', 'nateag_handle_newsletter_subscription');
add_action('wp_ajax_nopriv_newsletter_subscription', 'nateag_handle_newsletter_subscription');

// Helper functions
function nateag_get_testimonials($limit = 3) {
    return get_posts(array(
        'post_type' => 'testimonials',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    ));
}

function nateag_get_services($limit = 3) {
    return get_posts(array(
        'post_type' => 'services',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order' => 'ASC',
    ));
}
?>