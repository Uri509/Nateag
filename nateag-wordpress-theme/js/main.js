/**
 * NATEAG Enterprises Theme JavaScript
 * Handles interactive functionality for the WordPress theme
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize all components
    initMobileMenu();
    initScrollHeader();
    initContactForm();
    initNewsletterForm();
    initTestimonialSlider();
    initSmoothScrolling();
    initAnimations();
    
    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const mobileToggle = document.querySelector('.mobile-menu-toggle');
        const navigation = document.querySelector('.main-navigation');
        
        if (mobileToggle && navigation) {
            mobileToggle.addEventListener('click', function() {
                navigation.classList.toggle('mobile-open');
                const icon = this.querySelector('.menu-icon');
                if (icon) {
                    icon.textContent = navigation.classList.contains('mobile-open') ? '✕' : '☰';
                }
            });
            
            // Close mobile menu when clicking outside
            document.addEventListener('click', function(e) {
                if (!navigation.contains(e.target) && !mobileToggle.contains(e.target)) {
                    navigation.classList.remove('mobile-open');
                    const icon = mobileToggle.querySelector('.menu-icon');
                    if (icon) {
                        icon.textContent = '☰';
                    }
                }
            });
        }
    }
    
    /**
     * Header Scroll Effect
     */
    function initScrollHeader() {
        const header = document.querySelector('.site-header');
        
        if (header) {
            window.addEventListener('scroll', function() {
                if (window.scrollY > 20) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });
        }
    }
    
    /**
     * Contact Form Handler
     */
    function initContactForm() {
        const contactForm = document.getElementById('contact-form');
        
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;
                
                // Show loading state
                submitBtn.textContent = 'Sending...';
                submitBtn.disabled = true;
                
                const formData = new FormData(this);
                formData.append('action', 'contact_form');
                formData.append('nonce', nateag_ajax.nonce);
                
                fetch(nateag_ajax.ajax_url, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showNotification('Thank you! Your message has been sent successfully.', 'success');
                        contactForm.reset();
                    } else {
                        showNotification('Sorry, there was an error sending your message. Please try again.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showNotification('Sorry, there was an error sending your message. Please try again.', 'error');
                })
                .finally(() => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                });
            });
        }
    }
    
    /**
     * Newsletter Form Handler
     */
    function initNewsletterForm() {
        const newsletterForms = document.querySelectorAll('#newsletter-form, #homepage-newsletter-form');
        
        newsletterForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;
                
                // Show loading state
                submitBtn.textContent = 'Subscribing...';
                submitBtn.disabled = true;
                
                const formData = new FormData(this);
                formData.append('action', 'newsletter_subscription');
                formData.append('nonce', nateag_ajax.nonce);
                
                fetch(nateag_ajax.ajax_url, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showNotification('Thank you for subscribing to our newsletter!', 'success');
                        form.reset();
                    } else {
                        showNotification('Sorry, there was an error with your subscription. Please try again.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showNotification('Sorry, there was an error with your subscription. Please try again.', 'error');
                })
                .finally(() => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                });
            });
        });
    }
    
    /**
     * Testimonial Slider
     */
    function initTestimonialSlider() {
        const testimonials = document.querySelectorAll('.testimonial-card');
        const prevBtn = document.querySelector('.testimonial-prev');
        const nextBtn = document.querySelector('.testimonial-next');
        const dots = document.querySelectorAll('.testimonial-dot');
        
        if (testimonials.length > 0) {
            let currentIndex = 0;
            let autoSlideInterval;
            
            // Show testimonial
            function showTestimonial(index) {
                testimonials.forEach((testimonial, i) => {
                    testimonial.style.display = i === index ? 'block' : 'none';
                });
                
                dots.forEach((dot, i) => {
                    dot.classList.toggle('active', i === index);
                });
            }
            
            // Next testimonial
            function nextTestimonial() {
                currentIndex = (currentIndex + 1) % testimonials.length;
                showTestimonial(currentIndex);
            }
            
            // Previous testimonial
            function prevTestimonial() {
                currentIndex = (currentIndex - 1 + testimonials.length) % testimonials.length;
                showTestimonial(currentIndex);
            }
            
            // Auto slide
            function startAutoSlide() {
                autoSlideInterval = setInterval(nextTestimonial, 5000);
            }
            
            function stopAutoSlide() {
                clearInterval(autoSlideInterval);
            }
            
            // Initialize
            showTestimonial(0);
            startAutoSlide();
            
            // Event listeners
            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    stopAutoSlide();
                    nextTestimonial();
                    startAutoSlide();
                });
            }
            
            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    stopAutoSlide();
                    prevTestimonial();
                    startAutoSlide();
                });
            }
            
            dots.forEach((dot, i) => {
                dot.addEventListener('click', () => {
                    stopAutoSlide();
                    currentIndex = i;
                    showTestimonial(currentIndex);
                    startAutoSlide();
                });
            });
            
            // Pause on hover
            const sliderContainer = document.querySelector('.testimonial-slider');
            if (sliderContainer) {
                sliderContainer.addEventListener('mouseenter', stopAutoSlide);
                sliderContainer.addEventListener('mouseleave', startAutoSlide);
            }
        }
    }
    
    /**
     * Smooth Scrolling for Anchor Links
     */
    function initSmoothScrolling() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offsetTop = target.getBoundingClientRect().top + window.pageYOffset - 80;
                    
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }
    
    /**
     * Scroll Animations
     */
    function initAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, observerOptions);
        
        // Elements to animate
        const animatedElements = document.querySelectorAll([
            '.service-card',
            '.testimonial-card',
            '.blog-card',
            '.stat-card',
            '.hero-card',
            '.leader-card'
        ].join(','));
        
        animatedElements.forEach(el => {
            el.classList.add('animate-on-scroll');
            observer.observe(el);
        });
    }
    
    /**
     * Show Notification
     */
    function showNotification(message, type = 'info') {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.innerHTML = `
            <div class="notification-content">
                <span class="notification-message">${message}</span>
                <button class="notification-close" onclick="this.parentElement.parentElement.remove()">×</button>
            </div>
        `;
        
        // Add notification styles if not already added
        if (!document.getElementById('notification-styles')) {
            const style = document.createElement('style');
            style.id = 'notification-styles';
            style.textContent = `
                .notification {
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    z-index: 10000;
                    min-width: 300px;
                    padding: 1rem;
                    border-radius: 0.5rem;
                    color: white;
                    animation: slideInRight 0.3s ease;
                }
                
                .notification-success {
                    background: linear-gradient(135deg, #10b981, #059669);
                }
                
                .notification-error {
                    background: linear-gradient(135deg, #ef4444, #dc2626);
                }
                
                .notification-info {
                    background: linear-gradient(135deg, #3b82f6, #2563eb);
                }
                
                .notification-content {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    gap: 1rem;
                }
                
                .notification-close {
                    background: none;
                    border: none;
                    color: white;
                    font-size: 1.25rem;
                    cursor: pointer;
                    padding: 0;
                    width: 24px;
                    height: 24px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                
                @keyframes slideInRight {
                    from {
                        transform: translateX(100%);
                        opacity: 0;
                    }
                    to {
                        transform: translateX(0);
                        opacity: 1;
                    }
                }
            `;
            document.head.appendChild(style);
        }
        
        // Add to DOM
        document.body.appendChild(notification);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            if (notification.parentElement) {
                notification.remove();
            }
        }, 5000);
    }
    
    /**
     * Counter Animation for Stats
     */
    function animateCounters() {
        const counters = document.querySelectorAll('.stat-number[data-count]');
        
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-count'));
            const duration = 2000;
            const increment = target / (duration / 16);
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                counter.textContent = Math.floor(current) + (counter.textContent.includes('+') ? '+' : '');
            }, 16);
        });
    }
    
    // Initialize counter animation when stats come into view
    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
                statsObserver.disconnect();
            }
        });
    });
    
    const statsSection = document.querySelector('.stats-grid');
    if (statsSection) {
        statsObserver.observe(statsSection);
    }
});

// Add CSS for scroll animations
document.addEventListener('DOMContentLoaded', function() {
    if (!document.getElementById('scroll-animation-styles')) {
        const style = document.createElement('style');
        style.id = 'scroll-animation-styles';
        style.textContent = `
            .animate-on-scroll {
                opacity: 0;
                transform: translateY(30px);
                transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            }
            
            .animate-on-scroll.animate-in {
                opacity: 1;
                transform: translateY(0);
            }
            
            .animate-on-scroll:nth-child(2) {
                transition-delay: 0.1s;
            }
            
            .animate-on-scroll:nth-child(3) {
                transition-delay: 0.2s;
            }
            
            .animate-on-scroll:nth-child(4) {
                transition-delay: 0.3s;
            }
        `;
        document.head.appendChild(style);
    }
});