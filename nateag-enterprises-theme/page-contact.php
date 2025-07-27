<?php get_header(); ?>

<main class="main-content">
    
    <!-- Contact Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <div class="hero-badge">
                        <span class="badge-icon">📞</span>
                        <?php esc_html_e('Get In Touch', 'nateag-enterprises'); ?>
                    </div>
                    
                    <h1>
                        <?php esc_html_e('Let\'s', 'nateag-enterprises'); ?>
                        <span class="gradient-text"><?php esc_html_e('Transform', 'nateag-enterprises'); ?></span>
                        <?php esc_html_e('Your Business Together', 'nateag-enterprises'); ?>
                    </h1>
                    
                    <p><?php esc_html_e('Ready to take your business to the next level? Our team of experts is here to provide you with comprehensive solutions tailored to your unique needs. Get in touch today for a free consultation.', 'nateag-enterprises'); ?></p>
                    
                    <!-- Contact Features -->
                    <div class="key-points">
                        <div class="key-point">
                            <div class="point-icon purple">⚡</div>
                            <div>
                                <strong><?php esc_html_e('Quick Response', 'nateag-enterprises'); ?></strong>
                                <p><?php esc_html_e('We respond within 24 hours', 'nateag-enterprises'); ?></p>
                            </div>
                        </div>
                        
                        <div class="key-point">
                            <div class="point-icon blue">🎯</div>
                            <div>
                                <strong><?php esc_html_e('Free Consultation', 'nateag-enterprises'); ?></strong>
                                <p><?php esc_html_e('No-cost initial assessment', 'nateag-enterprises'); ?></p>
                            </div>
                        </div>
                        
                        <div class="key-point">
                            <div class="point-icon indigo">👥</div>
                            <div>
                                <strong><?php esc_html_e('Expert Team', 'nateag-enterprises'); ?></strong>
                                <p><?php esc_html_e('2+ years of experience', 'nateag-enterprises'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information Card -->
                <div class="hero-visual">
                    <div class="hero-card">
                        <h3><?php esc_html_e('Contact Information', 'nateag-enterprises'); ?></h3>
                        
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
                            
                            <div class="contact-item">
                                <span class="contact-icon">🕒</span>
                                <div>
                                    <strong><?php esc_html_e('Business Hours', 'nateag-enterprises'); ?></strong>
                                    <span><?php esc_html_e('Mon-Fri: 9AM-6PM EST', 'nateag-enterprises'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="section">
        <div class="container">
            <div class="contact-form-wrapper">
                <div class="section-header text-center">
                    <h2><?php esc_html_e('Send Us a Message', 'nateag-enterprises'); ?></h2>
                    <p><?php esc_html_e('Fill out the form below and we\'ll get back to you within 24 hours with a customized solution for your business needs.', 'nateag-enterprises'); ?></p>
                </div>

                <div class="contact-form-container">
                    <form id="contact-form" class="contact-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact_name"><?php esc_html_e('Full Name', 'nateag-enterprises'); ?> *</label>
                                <input type="text" id="contact_name" name="name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="contact_email"><?php esc_html_e('Email Address', 'nateag-enterprises'); ?> *</label>
                                <input type="email" id="contact_email" name="email" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact_phone"><?php esc_html_e('Phone Number', 'nateag-enterprises'); ?></label>
                                <input type="tel" id="contact_phone" name="phone">
                            </div>
                            
                            <div class="form-group">
                                <label for="contact_company"><?php esc_html_e('Company Name', 'nateag-enterprises'); ?></label>
                                <input type="text" id="contact_company" name="company">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_service"><?php esc_html_e('Service of Interest', 'nateag-enterprises'); ?></label>
                            <select id="contact_service" name="service">
                                <option value=""><?php esc_html_e('Select a service...', 'nateag-enterprises'); ?></option>
                                <option value="Strategic Business Consulting"><?php esc_html_e('Strategic Business Consulting', 'nateag-enterprises'); ?></option>
                                <option value="Marketing Solutions"><?php esc_html_e('Marketing Solutions', 'nateag-enterprises'); ?></option>
                                <option value="Logistics Services"><?php esc_html_e('Logistics Services', 'nateag-enterprises'); ?></option>
                                <option value="Business Planning"><?php esc_html_e('Business Planning', 'nateag-enterprises'); ?></option>
                                <option value="Other"><?php esc_html_e('Other', 'nateag-enterprises'); ?></option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_message"><?php esc_html_e('Message', 'nateag-enterprises'); ?> *</label>
                            <textarea id="contact_message" name="message" rows="6" placeholder="<?php esc_attr_e('Tell us about your business needs and how we can help...', 'nateag-enterprises'); ?>" required></textarea>
                        </div>
                        
                        <div class="form-submit">
                            <button type="submit" class="btn-primary">
                                <?php esc_html_e('Send Message', 'nateag-enterprises'); ?> →
                            </button>
                            
                            <p class="form-note">
                                <?php esc_html_e('By submitting this form, you agree to our privacy policy. We\'ll never share your information with third parties.', 'nateag-enterprises'); ?>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Preview -->
    <section class="services-section section">
        <div class="container">
            <div class="section-header text-center">
                <h2><?php esc_html_e('How We Can Help', 'nateag-enterprises'); ?></h2>
                <p><?php esc_html_e('Our comprehensive services are designed to address every aspect of your business growth', 'nateag-enterprises'); ?></p>
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
.contact-form-wrapper {
    max-width: 800px;
    margin: 0 auto;
}

.contact-form-container {
    background: white;
    border-radius: 1rem;
    padding: 3rem;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    border: 1px solid #f3f4f6;
}

.contact-form {
    max-width: none;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
    margin-bottom: 1.5rem;
}

@media (min-width: 768px) {
    .form-row {
        grid-template-columns: 1fr 1fr;
    }
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: #374151;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 2px solid #e5e7eb;
    border-radius: 0.5rem;
    font-size: 1rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    background: #f9fafb;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #9333ea;
    box-shadow: 0 0 0 3px rgba(147, 51, 234, 0.1);
    background: white;
}

.form-group textarea {
    resize: vertical;
    min-height: 120px;
}

.form-submit {
    text-align: center;
    margin-top: 2rem;
}

.form-submit .btn-primary {
    min-width: 200px;
    margin-bottom: 1rem;
}

.form-note {
    font-size: 0.875rem;
    color: #6b7280;
    margin-top: 1rem;
    line-height: 1.5;
}

.contact-info {
    space-y: 1.5rem;
}

.contact-info .contact-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1rem 0;
    border-bottom: 1px solid #f3f4f6;
}

.contact-info .contact-item:last-child {
    border-bottom: none;
}

.contact-info .contact-icon {
    font-size: 1.25rem;
    width: 2.5rem;
    height: 2.5rem;
    background: linear-gradient(135deg, #9333ea 0%, #3b82f6 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.contact-info .contact-item div {
    flex: 1;
}

.contact-info .contact-item strong {
    display: block;
    margin-bottom: 0.25rem;
    color: #111827;
}

.contact-info .contact-item a {
    color: #9333ea;
    text-decoration: none;
    font-weight: 500;
}

.contact-info .contact-item a:hover {
    color: #7c3aed;
    text-decoration: underline;
}
</style>

<?php get_footer(); ?>