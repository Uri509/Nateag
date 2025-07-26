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

// Meta boxes for custom fields
function nateag_add_meta_boxes() {
    add_meta_box(
        'testimonial_details',
        __('Testimonial Details', 'nateag-enterprises'),
        'nateag_testimonial_meta_box',
        'testimonials',
        'normal',
        'default'
    );
    
    add_meta_box(
        'service_details',
        __('Service Details', 'nateag-enterprises'),
        'nateag_service_meta_box',
        'services',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'nateag_add_meta_boxes');

// Testimonial meta box callback
function nateag_testimonial_meta_box($post) {
    wp_nonce_field(basename(__FILE__), 'nateag_testimonial_nonce');
    
    $client_name = get_post_meta($post->ID, '_client_name', true);
    $client_title = get_post_meta($post->ID, '_client_title', true);
    $client_company = get_post_meta($post->ID, '_client_company', true);
    $rating = get_post_meta($post->ID, '_rating', true) ?: 5;
    $featured = get_post_meta($post->ID, '_featured', true);
    
    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="client_name">' . __('Client Name', 'nateag-enterprises') . '</label></th>';
    echo '<td><input type="text" name="client_name" id="client_name" value="' . esc_attr($client_name) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="client_title">' . __('Client Title', 'nateag-enterprises') . '</label></th>';
    echo '<td><input type="text" name="client_title" id="client_title" value="' . esc_attr($client_title) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="client_company">' . __('Client Company', 'nateag-enterprises') . '</label></th>';
    echo '<td><input type="text" name="client_company" id="client_company" value="' . esc_attr($client_company) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="rating">' . __('Rating', 'nateag-enterprises') . '</label></th>';
    echo '<td><select name="rating" id="rating">';
    for ($i = 1; $i <= 5; $i++) {
        echo '<option value="' . $i . '"' . selected($rating, $i, false) . '>' . $i . ' Star' . ($i > 1 ? 's' : '') . '</option>';
    }
    echo '</select></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="featured">' . __('Featured Testimonial', 'nateag-enterprises') . '</label></th>';
    echo '<td><input type="checkbox" name="featured" id="featured" value="1"' . checked($featured, 1, false) . ' /></td>';
    echo '</tr>';
    echo '</table>';
}

// Service meta box callback
function nateag_service_meta_box($post) {
    wp_nonce_field(basename(__FILE__), 'nateag_service_nonce');
    
    $icon = get_post_meta($post->ID, '_service_icon', true) ?: 'consulting';
    $color = get_post_meta($post->ID, '_service_color', true) ?: 'purple';
    $features = get_post_meta($post->ID, '_service_features', true);
    $price = get_post_meta($post->ID, '_service_price', true);
    
    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="service_icon">' . __('Service Icon', 'nateag-enterprises') . '</label></th>';
    echo '<td><select name="service_icon" id="service_icon">';
    $icons = array('consulting' => 'Consulting', 'marketing' => 'Marketing', 'logistics' => 'Logistics');
    foreach ($icons as $value => $label) {
        echo '<option value="' . $value . '"' . selected($icon, $value, false) . '>' . $label . '</option>';
    }
    echo '</select></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="service_color">' . __('Color Theme', 'nateag-enterprises') . '</label></th>';
    echo '<td><select name="service_color" id="service_color">';
    $colors = array('purple' => 'Purple', 'blue' => 'Blue', 'indigo' => 'Indigo');
    foreach ($colors as $value => $label) {
        echo '<option value="' . $value . '"' . selected($color, $value, false) . '>' . $label . '</option>';
    }
    echo '</select></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="service_features">' . __('Key Features (one per line)', 'nateag-enterprises') . '</label></th>';
    echo '<td><textarea name="service_features" id="service_features" rows="5" class="large-text">' . esc_textarea($features) . '</textarea></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="service_price">' . __('Starting Price', 'nateag-enterprises') . '</label></th>';
    echo '<td><input type="text" name="service_price" id="service_price" value="' . esc_attr($price) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '</table>';
}

// Save meta box data
function nateag_save_meta_boxes($post_id) {
    if (!isset($_POST['nateag_testimonial_nonce']) && !isset($_POST['nateag_service_nonce'])) {
        return;
    }
    
    if (isset($_POST['nateag_testimonial_nonce']) && !wp_verify_nonce($_POST['nateag_testimonial_nonce'], basename(__FILE__))) {
        return;
    }
    
    if (isset($_POST['nateag_service_nonce']) && !wp_verify_nonce($_POST['nateag_service_nonce'], basename(__FILE__))) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (isset($_POST['post_type']) && $_POST['post_type'] == 'testimonials') {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
        
        $fields = array('client_name', 'client_title', 'client_company', 'rating');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
            }
        }
        
        update_post_meta($post_id, '_featured', isset($_POST['featured']) ? 1 : 0);
    }
    
    if (isset($_POST['post_type']) && $_POST['post_type'] == 'services') {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
        
        $fields = array('service_icon', 'service_color', 'service_features', 'service_price');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                if ($field == 'service_features') {
                    update_post_meta($post_id, '_' . $field, sanitize_textarea_field($_POST[$field]));
                } else {
                    update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
                }
            }
        }
    }
}
add_action('save_post', 'nateag_save_meta_boxes');

// Helper functions
function nateag_get_testimonials($limit = 3, $featured_only = false) {
    $args = array(
        'post_type' => 'testimonials',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    );
    
    if ($featured_only) {
        $args['meta_query'] = array(
            array(
                'key' => '_featured',
                'value' => '1',
                'compare' => '='
            )
        );
    }
    
    return get_posts($args);
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

// Get service features as array
function nateag_get_service_features($post_id) {
    $features = get_post_meta($post_id, '_service_features', true);
    if (empty($features)) {
        return array(
            'Expert consultation',
            'Customized solutions', 
            'Ongoing support'
        );
    }
    return array_filter(array_map('trim', explode("\n", $features)));
}
?>