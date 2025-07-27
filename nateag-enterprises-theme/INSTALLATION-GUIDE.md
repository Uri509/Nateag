# NATEAG Enterprises WordPress Theme - Installation Guide

## Requirements
- WordPress 5.0 or higher
- PHP 7.4 or higher

## Installation Methods

### Method 1: Direct Upload via WordPress Admin (Recommended)

1. **Create ZIP file:**
   - Download all files from this theme folder
   - Create a ZIP file named `nateag-enterprises-theme.zip`
   - Make sure all files are in the root of the ZIP (not in a subfolder)

2. **Upload via WordPress Admin:**
   - Go to WordPress Admin → Appearance → Themes
   - Click "Add New"
   - Click "Upload Theme"
   - Choose your ZIP file
   - Click "Install Now"
   - After installation, click "Activate"

### Method 2: Manual FTP Upload

1. **Upload files:**
   - Upload all theme files to: `/wp-content/themes/nateag-enterprises/`
   - Make sure the folder structure is:
     ```
     /wp-content/themes/nateag-enterprises/
     ├── style.css
     ├── index.php
     ├── functions.php
     └── [all other theme files]
     ```

2. **Activate:**
   - Go to WordPress Admin → Appearance → Themes
   - Find "NATEAG Enterprises" and click "Activate"

## Required Files Checklist

Make sure these essential files are present:

- ✅ `style.css` (with WordPress theme header)
- ✅ `index.php` (main template file)
- ✅ `functions.php` (theme functions)
- ✅ `header.php` (header template)
- ✅ `footer.php` (footer template)

## Troubleshooting

### "The package could not be installed. The theme is missing the style.css stylesheet."

**Solution:**
1. Check that `style.css` is in the root of your theme folder
2. Verify the WordPress theme header is at the top of `style.css`
3. Make sure file permissions are correct (644 for files, 755 for folders)

### "The theme is missing the index.php template file."

**Solution:**
1. Ensure `index.php` is present in the theme root folder
2. Check that the file starts with `<?php get_header(); ?>`

### Theme not appearing in Themes list

**Solution:**
1. Verify all files are in `/wp-content/themes/nateag-enterprises/` (not in a subfolder)
2. Check that `style.css` has the proper WordPress theme header
3. Ensure file permissions allow WordPress to read the files

## After Installation

1. **Set up navigation menu:**
   - Go to Appearance → Menus
   - Create a new menu with: Home, About, Services, Blog, Contact
   - Assign to "Primary Menu" location

2. **Create required pages:**
   - Create "About" page (will use custom template)
   - Create "Contact" page (will use custom template)

3. **Configure homepage:**
   - Go to Settings → Reading
   - Choose "A static page" for homepage display
   - Select your homepage and posts page

4. **Add content:**
   - Add Services via "Services → Add New" in admin
   - Add Testimonials via "Testimonials → Add New" in admin

## Support

For installation support:
- Email: info@nateagenterprises.com
- Phone: (207) 417-4844

## File Permissions

Recommended file permissions:
- Folders: 755
- PHP files: 644
- CSS files: 644
- JS files: 644

Set permissions via FTP or command line:
```bash
find /wp-content/themes/nateag-enterprises/ -type d -exec chmod 755 {} \;
find /wp-content/themes/nateag-enterprises/ -type f -exec chmod 644 {} \;
```