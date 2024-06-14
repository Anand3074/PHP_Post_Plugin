<?php
/*
Plugin Name: Fetch Subdomain Posts
Plugin URI: http://dharte.com/
Description: This plugin fetches complete posts from a subdomain and displays them using a shortcode.
Version: 1.0
Author: Your Name
Author URI: http://yourwebsite.com/
*/

function fetch_subdomain_posts($atts) {
    $atts = shortcode_atts(array(
        'show_title' => 'yes',
        'show_image' => 'yes',
        'show_content' => 'yes',
        'show_author' => 'yes',
        'show_date' => 'yes',
    ), $atts, 'subdomain_posts');

    $response = wp_remote_get('https://dharte.ca/wp-json/wp/v2/posts?per_page=5&_embed');
    if (is_wp_error($response)) {
        error_log('Failed to fetch posts: ' . $response->get_error_message());
        return 'Error fetching posts.';
    }

    $posts = json_decode(wp_remote_retrieve_body($response), true);
    if (empty($posts)) {
        return 'No posts found.';
    }

    $output = '<div class="subdomain-posts">';
    foreach ($posts as $post) {
        $output .= '<article>';

        if ('yes' === $atts['show_title']) {
            $output .= '<header><h2><a href="' . esc_url($post['link']) . '">' . esc_html($post['title']['rendered']) . '</a></h2></header>';
        }

        if ('yes' === $atts['show_image'] && isset($post['_embedded']['wp:featuredmedia'][0]['source_url'])) {
            $output .= '<img src="' . esc_url($post['_embedded']['wp:featuredmedia'][0]['source_url']) . '" alt="' . esc_attr($post['title']['rendered']) . '" style="width:100%;height:auto;">';
        }

        if ('yes' === $atts['show_content']) {
            $output .= '<div>' . wp_kses_post($post['content']['rendered']) . '</div>';
        }

        if ('yes' === $atts['show_author'] || 'yes' === $atts['show_date']) {
            $output .= '<footer>';
            if ('yes' === $atts['show_author']) {
                $output .= 'Posted by ' . esc_html($post['_embedded']['author'][0]['name']);
            }
            if ('yes' === $atts['show_date']) {
                $output .= ' on ' . date('F j, Y', strtotime($post['date']));
            }
            $output .= '</footer>';
        }

        $output .= '</article>';
    }
    $output .= '</div>';

    return $output;
}
add_shortcode('subdomain_posts', 'fetch_subdomain_posts');
?>
