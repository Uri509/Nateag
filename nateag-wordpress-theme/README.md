# NATEAG Enterprises WordPress Theme

A professional WordPress theme for NATEAG Enterprises, designed to showcase comprehensive consulting, marketing, and logistics services for entrepreneurs.

## Theme Information

- **Theme Name:** NATEAG Enterprises
- **Version:** 1.0.0
- **Author:** NATEAG Enterprises  
- **License:** GPL v2 or later
- **Requires WordPress:** 5.0 or higher
- **Requires PHP:** 7.4 or higher

## Features

### Design & Layout
- Modern gradient design with purple-to-blue color scheme
- Fully responsive design for all devices
- Smooth animations and hover effects
- Professional typography with Inter font family
- Hero sections with engaging visuals
- Clean, accessible markup

### Custom Post Types
- **Services:** Manage business services with custom fields
- **Testimonials:** Client testimonials with ratings and featured options

### Custom Fields (Meta Boxes)
#### Services
- Service Icon (Consulting, Marketing, Logistics)
- Color Theme (Purple, Blue, Indigo)
- Key Features (multi-line text)
- Starting Price

#### Testimonials
- Client Name
- Client Title
- Client Company
- Rating (1-5 stars)
- Featured Testimonial toggle

### Template Files
- `front-page.php` - Static homepage with hero, services, about, testimonials, blog preview, and newsletter
- `archive-services.php` - Services listing page
- `single-services.php` - Individual service pages
- `archive-testimonials.php` - Testimonials listing page
- `single-testimonials.php` - Individual testimonial pages
- `page-contact.php` - Contact page with form
- `page-about.php` - About page with company story
- `index.php` - Blog listing page
- `single.php` - Individual blog post pages
- `404.php` - Custom 404 error page

### Interactive Features
- Mobile-responsive navigation menu
- Contact form with AJAX submission
- Newsletter subscription form with AJAX
- Testimonial slider/carousel
- Smooth scrolling navigation
- Form validation and user feedback
- Search functionality

### JavaScript Components
- Mobile menu toggle
- Header scroll effects
- Contact form handler
- Newsletter form handler
- Testimonial slider automation
- Scroll animations
- Notification system

## Installation

1. **Upload Theme Files:**
   - Copy all files from `/app/nateag-wordpress-theme/` to your WordPress theme directory
   - Path: `/wp-content/themes/nateag-enterprises/`

2. **Activate Theme:**
   - Go to WordPress Admin → Appearance → Themes
   - Find "NATEAG Enterprises" and click "Activate"

3. **Set Up Menus:**
   - Go to Appearance → Menus
   - Create a new menu and assign it to "Primary Menu" location
   - Add pages: Home, About, Services, Blog, Resources, Contact

4. **Configure Pages:**
   - Create pages: About, Contact, Resources
   - Set a static page as homepage if desired
   - Set blog page for posts

## Content Setup

### Adding Services
1. Go to Services → Add New Service
2. Fill in service details:
   - Title and description
   - Select service icon and color theme
   - Add key features (one per line)
   - Set starting price (optional)
3. Publish the service

### Adding Testimonials
1. Go to Testimonials → Add New Testimonial
2. Fill in testimonial details:
   - Client quote in content area
   - Client name, title, and company
   - Set rating (1-5 stars)
   - Mark as featured if desired
3. Publish the testimonial

### Customizing Homepage Content
The homepage content is defined in `front-page.php` and includes:
- Hero section with company messaging
- Services overview (pulls from Services post type)
- About section with founder information
- Testimonials slider (pulls from featured testimonials)
- Blog preview (latest blog posts)
- Newsletter signup section

## Theme Customization

### Colors and Branding
The theme uses CSS custom properties for easy color customization:
- Primary gradient: Purple (#9333ea) to Blue (#3b82f6)
- Text colors: Dark gray (#111827) for headings, medium gray (#6b7280) for body text
- Background colors: White and light gray (#f9fafb)

### Fonts
- Primary font family: Inter (loaded from Google Fonts)
- Fallbacks: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif

### Logo
- Upload a custom logo via Appearance → Customize → Site Identity
- If no logo is set, displays "NATEAG ENTERPRISES" text with gradient styling

## AJAX Functionality

### Contact Form
- Endpoint: `wp_ajax_contact_form` and `wp_ajax_nopriv_contact_form`
- Handles form submissions with email validation
- Returns JSON success/error responses
- Displays user-friendly notifications

### Newsletter Subscription  
- Endpoint: `wp_ajax_newsletter_subscription` and `wp_ajax_nopriv_newsletter_subscription`
- Handles email subscriptions with duplicate prevention
- Returns JSON success/error responses
- Displays user-friendly notifications

## File Structure

```
nateag-wordpress-theme/
├── style.css                 # Main stylesheet with theme info
├── functions.php            # Theme functions and setup
├── header.php              # Header template
├── footer.php              # Footer template
├── front-page.php          # Homepage template
├── index.php               # Blog listing template
├── single.php              # Single post template
├── 404.php                 # 404 error template
├── page-about.php          # About page template
├── page-contact.php        # Contact page template
├── archive-services.php    # Services archive template
├── single-services.php     # Single service template
├── archive-testimonials.php # Testimonials archive template
├── single-testimonials.php # Single testimonial template
├── js/
│   └── main.js             # JavaScript functionality
└── README.md               # This documentation file
```

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Internet Explorer 11+

## Performance Features

- Optimized images with proper sizing
- Minified and efficient CSS
- JavaScript loaded with proper dependencies
- Semantic HTML markup
- Accessible design patterns

## SEO Features

- Semantic HTML5 markup
- Proper heading hierarchy
- Meta description support
- Open Graph ready
- Schema markup friendly
- Fast loading times
- Mobile-first responsive design

## Accessibility

- WCAG 2.1 AA compliant
- Proper ARIA labels
- Keyboard navigation support
- Screen reader friendly
- High contrast ratios
- Focus indicators
- Alt text for images

## Support

For theme support and customization:
- Email: info@nateagenterprises.com
- Phone: (207) 417-4844
- Address: 45 Dan Rd, Canton, MA 02021

## Changelog

### Version 1.0.0
- Initial release
- Complete WordPress theme with all templates
- Custom post types for Services and Testimonials
- AJAX forms for Contact and Newsletter
- Mobile-responsive design
- Accessibility features
- SEO optimization

## License

This theme is licensed under the GPL v2 or later.
Copyright © 2024 NATEAG Enterprises. All rights reserved.