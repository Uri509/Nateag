    </div><!-- #content -->

    <footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <!-- Company Info -->
                <div class="footer-section">
                    <div class="footer-logo">
                        <div class="logo-text">NATEAG</div>
                        <div class="logo-subtitle">ENTERPRISES</div>
                    </div>
                    <p><?php esc_html_e('Empowering entrepreneurs through comprehensive consulting, marketing, and logistics solutions. Building sustainable businesses that make a lasting impact.', 'nateag-enterprises'); ?></p>
                    
                    <div class="contact-info">
                        <div class="contact-item">
                            <span class="contact-icon">📧</span>
                            <a href="mailto:info@nateagenterprises.com">info@nateagenterprises.com</a>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">📞</span>
                            <a href="tel:+12074174844">(207) 417-4844</a>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">📍</span>
                            <span>45 Dan Rd, Canton, MA 02021</span>
                        </div>
                    </div>
                </div>

                <!-- Company Links -->
                <div class="footer-section">
                    <h3><?php esc_html_e('Company', 'nateag-enterprises'); ?></h3>
                    <ul>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>"><?php esc_html_e('About Us', 'nateag-enterprises'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>"><?php esc_html_e('Our Services', 'nateag-enterprises'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>"><?php esc_html_e('Leadership', 'nateag-enterprises'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>"><?php esc_html_e('Contact', 'nateag-enterprises'); ?></a></li>
                    </ul>
                </div>

                <!-- Services Links -->
                <div class="footer-section">
                    <h3><?php esc_html_e('Services', 'nateag-enterprises'); ?></h3>
                    <ul>
                        <li><a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>"><?php esc_html_e('Strategic Consulting', 'nateag-enterprises'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>"><?php esc_html_e('Marketing Solutions', 'nateag-enterprises'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>"><?php esc_html_e('Logistics Services', 'nateag-enterprises'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>"><?php esc_html_e('Business Planning', 'nateag-enterprises'); ?></a></li>
                    </ul>
                </div>

                <!-- Resources Links -->
                <div class="footer-section">
                    <h3><?php esc_html_e('Resources', 'nateag-enterprises'); ?></h3>
                    <ul>
                        <li><a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"><?php esc_html_e('Business Blog', 'nateag-enterprises'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('resources'))); ?>"><?php esc_html_e('Free Resources', 'nateag-enterprises'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"><?php esc_html_e('Industry Insights', 'nateag-enterprises'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_post_type_archive_link('testimonials')); ?>"><?php esc_html_e('Success Stories', 'nateag-enterprises'); ?></a></li>
                    </ul>
                </div>
            </div>

            <!-- Newsletter Signup -->
            <div class="newsletter-section">
                <div class="newsletter-content">
                    <h3><?php esc_html_e('Stay Updated', 'nateag-enterprises'); ?></h3>
                    <p><?php esc_html_e('Get the latest business insights and resources delivered to your inbox.', 'nateag-enterprises'); ?></p>
                </div>
                
                <form class="newsletter-form" id="newsletter-form">
                    <input type="email" name="newsletter_email" placeholder="<?php esc_attr_e('Enter your email', 'nateag-enterprises'); ?>" required>
                    <input type="text" name="newsletter_name" placeholder="<?php esc_attr_e('Your name', 'nateag-enterprises'); ?>" required>
                    <button type="submit"><?php esc_html_e('Subscribe', 'nateag-enterprises'); ?></button>
                </form>
            </div>

            <!-- Social Links -->
            <div class="social-section">
                <div class="social-links">
                    <a href="#" aria-label="<?php esc_attr_e('Facebook', 'nateag-enterprises'); ?>">📘</a>
                    <a href="#" aria-label="<?php esc_attr_e('Twitter', 'nateag-enterprises'); ?>">🐦</a>
                    <a href="#" aria-label="<?php esc_attr_e('LinkedIn', 'nateag-enterprises'); ?>">💼</a>
                    <a href="#" aria-label="<?php esc_attr_e('Instagram', 'nateag-enterprises'); ?>">📷</a>
                </div>
                
                <div class="founder-info">
                    <p><?php esc_html_e('Founded by', 'nateag-enterprises'); ?> <strong><?php esc_html_e('Gaetan Junior Jean-Francois', 'nateag-enterprises'); ?></strong></p>
                    <p class="tagline"><?php esc_html_e('Empowering communities through sustainable business ventures', 'nateag-enterprises'); ?></p>
                </div>
            </div>

            <!-- Copyright -->
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php esc_html_e('NATEAG Enterprises. All rights reserved.', 'nateag-enterprises'); ?></p>
                
                <div class="footer-links">
                    <a href="#"><?php esc_html_e('Privacy Policy', 'nateag-enterprises'); ?></a>
                    <a href="#"><?php esc_html_e('Terms of Service', 'nateag-enterprises'); ?></a>
                    <a href="#"><?php esc_html_e('Cookie Policy', 'nateag-enterprises'); ?></a>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>