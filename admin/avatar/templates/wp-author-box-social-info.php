<?php

/**
 * Author Box Social link page.
 *
 * @package Author Box Social link page.
 */
if (!defined('ABSPATH')) {
    exit;
}
?>
<?php

function add_user_social_contact_info($user_contact) {
    $user_contact['facebook'] = __('Facebook URL');
    $user_contact['skype'] = __('Skype');
    $user_contact['twitter'] = __('Twitter');
    $user_contact['youtube'] = __('Youtube Channel');
    $user_contact['linkedin'] = __('LinkedIn');
    $user_contact['googleplus'] = __('Google +');
    $user_contact['pinterest'] = __('Pinterest');
    $user_contact['instagram'] = __('Instagram');
    $user_contact['github'] = __('Github profile');
    return $user_contact;
}

add_filter('user_contactmethods', 'add_user_social_contact_info');

function wp_fontawesome_styles() {
    wp_register_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', '', '4.4.0', 'all');
    wp_enqueue_style('fontawesome');
}

add_action('wp_enqueue_scripts', 'wp_fontawesome_styles');

function wp_author_social_info_box($content) {

    global $post;

    if (is_single() && isset($post->post_author)) {

// Get author's display name
        $display_name = get_the_author_meta('first_name', $post->post_author);

// If display name is not available then use nickname
        if (empty($display_name))
            $display_name = get_the_author_meta('nickname', $post->post_author);

// Get author's biographical description
        $user_description = get_the_author_meta('user_description', $post->post_author);

// Get author's email
        $user_email = get_the_author_meta('email', $post->post_author);

// Get author's Facebook
        $user_facebook = get_the_author_meta('facebook', $post->post_author);

// Get author's Skype
        $user_skype = get_the_author_meta('skype', $post->post_author);

// Get author's Twitter
        $user_twitter = get_the_author_meta('twitter', $post->post_author);

// Get author's LinkedIn 
        $user_linkedin = get_the_author_meta('linkedin', $post->post_author);

// Get author's Youtube
        $user_youtube = get_the_author_meta('youtube', $post->post_author);

// Get author's Google+
        $user_googleplus = get_the_author_meta('googleplus', $post->post_author);

// Get author's Pinterest
        $user_pinterest = get_the_author_meta('pinterest', $post->post_author);

// Get author's Instagram
        $user_instagram = get_the_author_meta('instagram', $post->post_author);

// Get author's Github
        $user_github = get_the_author_meta('github', $post->post_author);


// Get link to the author  page
        $user_posts = get_author_posts_url(get_the_author_meta('ID', $post->post_author));
        if (!empty($display_name))
            $author_details = '<p class="author_name">' . get_the_author_meta('display_name') . '</p>';
        $author_details .= '<p class="author_image">' . get_avatar(get_the_author_meta('ID'), 90) . '</p>';
        $author_details .= '<p class="author_bio">' . get_the_author_meta('description') . '</p>';

// Display author Email link
        $author_details .= ' <a href="mailto:' . $user_email . '" target="_blank" rel="nofollow" title="E-mail" class="tooltip"><i class="fa fa-envelope-square fa-2x"></i> </a>';

// Display author Facebook link
        if (!empty($user_facebook)) {
            $author_details .= ' <a href="' . $user_facebook . '" target="_blank" rel="nofollow" title="Facebook" class="tooltip"><i class="fa fa-facebook-official fa-2x"></i> </a>';
        } else {
            $author_details .= '</p>';
        }

// Display author Skype link
        if (!empty($user_skype)) {
            $author_details .= ' <a href="' . $user_skype . '" target="_blank" rel="nofollow" title="Username paaljoachim Skype" class="tooltip"><i class="fa fa-skype fa-2x"></i> </a>';
        } else {
            $author_details .= '</p>';
        }

// Display author Twitter link
        if (!empty($user_twitter)) {
            $author_details .= ' <a href="' . $user_twitter . '" target="_blank" rel="nofollow" title="Twitter" class="tooltip"><i class="fa fa-twitter-square fa-2x"></i> </a>';
        } else {
            $author_details .= '</p>';
        }

// Display author LinkedIn link
        if (!empty($user_linkedin)) {
            $author_details .= ' <a href="' . $user_linkedin . '" target="_blank" rel="nofollow" title="LinkedIn" class="tooltip"><i class="fa fa-linkedin-square fa-2x"></i> </a>';
        } else {
            $author_details .= '</p>';
        }

// Display author Youtube link
        if (!empty($user_youtube)) {
            $author_details .= ' <a href="' . $user_youtube . '" target="_blank" rel="nofollow" title="Youtube" class="tooltip"><i class="fa fa-youtube-square fa-2x"></i> </a>';
        } else {
            $author_details .= '</p>';
        }

// Display author Google + link
        if (!empty($user_googleplus)) {
            $author_details .= ' <a href="' . $user_googleplus . '" target="_blank" rel="nofollow" title="Google+" class="tooltip"><i class="fa fa-google-plus-square fa-2x"></i> </a>';
        } else {
            $author_details .= '</p>';
        }

// Display author Pinterest link
        if (!empty($user_pinterest)) {
            $author_details .= ' <a href="' . $user_pinterest . '" target="_blank" rel="nofollow" title="Pinterest" class="tooltip"><i class="fa fa-pinterest-square fa-2x"></i> </a>';
        } else {
            $author_details .= '</p>';
        }
// Display author instagram link
        if (!empty($user_instagram)) {
            $author_details .= ' <a href="' . $user_instagram . '" target="_blank" rel="nofollow" title="instagram" class="tooltip"><i class="fa fa-instagram fa-2x"></i> </a>';
        } else {
            $author_details .= '</p>';
        }

// Display author Github link
        if (!empty($user_github)) {
            $author_details .= ' <a href="' . $user_github . '" target="_blank" rel="nofollow" title="Github" class="tooltip"><i class="fa fa-github-square fa-2x"></i> </a>';
        } else {
            $author_details .= '</p>';
        }
        $content = $content . '<footer class="author_bio_section" >' . $author_details . '</footer>';
    }
    return $content;
}

add_action('the_content', 'wp_author_social_info_box');
remove_filter('pre_user_description', 'wp_filter_kses');
