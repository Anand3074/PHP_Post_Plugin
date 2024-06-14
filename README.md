# Fetch Subdomain Posts Plugin: User Guide

## Introduction

This plugin seamlessly fetches posts from a designated subdomain and displays them beautifully using a customizable shortcode, enhancing your WordPress website's content. It simplifies integrating posts from another WordPress site into your multisite environment.

## Features

- **Flexibility:** Customize the displayed content through shortcode attributes (show_title, show_image, show_content, show_author, show_date).
- **Error Handling:** Gracefully handles potential errors during post retrieval, providing informative messages to the user.
- **Security:** Employs WordPress security best practices for data protection.
- **Clean Code:** Well-structured and commented code for easy maintenance and understanding.

## Installation

### Method 1: Using FileZilla (SFTP) (Recommended):
![FileZilla Layout](https://itsfoss.com/content/images/wordpress/2022/01/02_filezilla_layout.webp)
1. **Establish Connection:** Set up an SFTP connection to your WordPress site's hosting server using FileZilla or a similar FTP client.
2. **Navigate to Directory:** Locate and access the `/wp-content/plugins/` directory within your server's file structure.
3. **Upload ZIP File:** Create File and edit using your editor and paste the content of file Post_fetch_Plugin.php to that file and change the subdomain sites to your own.
4. **Activate Plugin:** Visit your WordPress admin panel (wp-admin) and navigate to Plugins. Locate "Fetch Subdomain Posts" and click Activate.


### Method 2: Using WordPress Dashboard (Optional):

1. **Log in:** Access your WordPress admin panel (wp-admin).
2. **Plugins:** Navigate to Plugins > Add New.
3. **Upload Plugin:** Click Upload Plugin and select the downloaded ZIP file (`fetch-subdomain-posts.zip`).
4. **Install Now:** Click Install Now and then Activate Plugin.


## Usage
1. **Create a New Page/Post:** Go to Pages > Add New or Posts > Add New.
2. **Insert Shortcode:** Paste the following shortcode [[subdomain_posts]

## Customize Shortcode (Optional)

Modify the shortcode attributes within the square brackets to control the displayed content:

- `show_title="yes|no"` (default: yes)
- `show_image="yes|no"` (default: yes)
- `show_content="yes|no"` (default: yes)
- `show_author="yes|no"` (default: yes)
- `show_date="yes|no"` (default: yes)

Click **Publish** to make the changes live.

## Additional CSS

The plugin uses basic styling. However, you can optionally create a custom stylesheet to personalize the appearance of the displayed posts. Here's how:

**From the CSS File (Optional)**: If you prefer to edit your theme's files, then copy the css from CSS file (fetch-subdomain-posts.css).

**That's it! Please feel free to connect if you encounter any error during install or other enquiry**
