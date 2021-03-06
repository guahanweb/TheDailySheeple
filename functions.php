<?php
remove_filter('pre_user_description', 'wp_filter_kses');
add_filter('pre_user_description', 'wp_filter_post_kses');

/**
 * The Daily Sheeple only works in WordPress 3.6 or later.
 */
if (version_compare($GLOBALS['wp_version'], '3.6', '<')) {
    require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('thedailysheeple_setup')):
function thedailysheeple_setup() {
    $options = get_option('thedailysheeple-theme-options');
    // Default to 100 if none set
    $size = isset($options['thumbnail_size']) ? $options['thumbnail_size'] : 100;

    load_theme_textdomain('thedailysheeple', get_template_directory() . '/languages');

    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));

    add_image_size('feature', 1038, 576, true);
    update_option('thumbnail_size_w', $size);
    update_option('thumbnail_size_h', $size);
    set_post_thumbnail_size($size, $size, true);
}
endif;
add_action('after_setup_theme', 'thedailysheeple_setup');

// Check Facebook like counts
if (!function_exists('thedailysheeple_update_facebook')):
function thedailysheeple_update_facebook() {
    return;

    // TODO: The graph endpoint now requires an OAuth token.
    // We need to integrate with it in order to pull the live data
    $option = 'thedailysheeple_facebook_time';
    $likes  = 'thedailysheeple_facebook_likes';
    $expiry = time() - (24 * 60 * 60);

    $last_run = get_option($option);
    if ($last_run === false || $last_run <= $expiry) {
        // Load up Facebook Graph API Data
        $data = json_decode(file_get_contents('http://graph.facebook.com/114637491995485'));
        update_option($likes, $data->likes);
        update_option($option, time());
    }
}

function thedailysheeple_get_likes() {
    $theme_options = get_option('thedailysheeple-theme-options');
    $truncate = $theme_options['social_truncate_count'];
    $static_value = $theme_options['social_static_count'];

    $data = '';
    // Use the static value if it has been provided
    $likes = $static_value ? $static_value : intval(get_option('thedailysheeple_facebook_likes'));
    if ($truncate) {
        if ($likes > 1000000) {
            $data .= number_format($likes / 1000000, 2) . 'M';
        } else if ($likes > 1000) {
            $data .= number_format($likes / 1000, 2) . 'K';
        } else {
            $data .= $likes;
        }
    } else {
        $data = number_format($likes);
    }
    return $data;
}
endif;
add_action('init', 'thedailysheeple_update_facebook');

$thedailysheeple_ads = array();
if (!function_exists('thedailysheeple_register_ad')):
function thedailysheeple_register_ad($content) {
    global $thedailysheeple_ads;
    $thedailysheeple_ads[] = $content;
}
endif;

if (!function_exists('thedailysheeple_get_ads')):
function thedailysheeple_get_ads($count, $random = true) {
    global $thedailysheeple_ads;
    if (count($thedailysheeple_ads) < $count) {
        return false;
    }

    if ($random) {
        shuffle($thedailysheeple_ads);
    }

    return array_splice($thedailysheeple_ads, 0, $count);
}
endif;

if (!function_exists('thedailysheeple_is_video')):
function thedailysheeple_is_video($id) {
    $cats = get_the_category($id);
    if ($cats) {
        foreach ($cats as $cat) {
            $slug = $cat->slug;
            if ($cat->slug == 'videos') {
                return true;
            }

            if ($cat->category_parent) {
                $parent = get_the_category($cat->category_parent);
                if ($parent->slug === 'videos') {
                    return true;
                }
            }
        }
    }

    return false;
}
endif;

if (!function_exists('thedailysheeple_get_post_image_url')):
function thedailysheeple_get_post_image_url($id) {
    if (has_post_thumbnail($id)) {
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'thedailysheeple-thumb');
        return $image[0];
    }
    return null;
}
endif;

/**
 * Retrieve the visual author URL for a post. This looks for any
 * custom overrides at both the post and author level.
 */
function thedailysheeple_get_authorurl($post) {
  $author_id = get_usermeta($post->post_author, 'ID');
  if (in_array($author_id, array(2, 3))) {
    return get_post_meta($post->ID, 'websiteurl', true);
  } else {
    // look for post level override
    $url = get_usermeta($post->post_author, 'user_url');
    $override = get_post_meta($post->ID, 'author-override-link', true);
    return !empty($override) ? $override : $url;
  }
}

/**
 * Retrieve the visual author name for a post. This looks for any
 * custom overrides at both the post and author level.
 */
function thedailysheeple_get_authorname($post) {
  $author_id = get_usermeta($post->post_author, 'ID');
  if (in_array($author_id, array(2, 3))) {
    return get_post_meta($post->ID, 'Author', true);
  } else {
    // look for post level override
    $author = get_usermeta($post->post_author, 'display_name');
    $override = get_post_meta($post->ID, 'author-override-name', true);
    return !empty($override) ? $override : $author;
  }
}

function thedailysheeple_get_authorwebsite($post) {
    $website = null;
    $author_id = get_usermeta($post->post_author, 'ID');
    $contrib = in_array($author_id, array(2, 3));

    $name = $contrib ? get_post_meta($post->ID, 'websitename', true) : get_usermeta($post->post_author, 'profilewebsitename', true);
    $website = array(
        'name' => $name,
        'url' => thedailysheeple_get_authorurl($post)
    );
    return $website;
}

function thedailysheeple_format_minimal_post($post) {
    $tpl = <<<EOT
<article>
    <p class="published">%s | <a href="%s">%s</a></p>
    <h1><a target="_blank" href="%s">%s</a></h1>
</article>
EOT;

    $output = sprintf($tpl,
        date('D. M j, Y', strtotime($post->post_date)),
        thedailysheeple_get_authorurl($post),
        thedailysheeple_get_authorname($post),
        get_permalink($post->ID),
        $post->post_title
    );

    return $output;
}

if (!function_exists('thedailysheeple_wpp_html_filter')):
function thedailysheeple_wpp_html_filter($content, $post_data) {

    $output = "<div class=\"articles\">\n ";
    foreach ($post_data as $p) {
        $post = get_post($p->id);
        $output .= thedailysheeple_format_minimal_post($post);
    }
    $output .= "</div>\n";
    return $output;
}
endif;
add_filter('wpp_html', 'thedailysheeple_wpp_html_filter', 10, 2);

/**
 * Enqueue frontend scripts and styles
 */
function thedailysheeple_scripts() {
    // Set up Google Fonts
    wp_enqueue_style('thedailysheeple-font-gudea', '//fonts.googleapis.com/css?family=Gudea:400,700,400italic', array(), null);
    wp_enqueue_style('thedailysheeple-font-ptserif', '//fonts.googleapis.com/css?family=PT+Serif:400,400italic', array(), null);

    // Main Styles
//    wp_enqueue_style('thedailysheeple-style', get_template_directory_uri() . '/css/main.css', array('thedailysheeple-font-gudea', 'thedailysheeple-font-ptserif'));
    wp_enqueue_style('thedailysheeple-style', get_template_directory_uri() . '/css/thedailysheeple.min.css', array('thedailysheeple-font-gudea', 'thedailysheeple-font-ptserif'));

    // Enqueue Scripts
    wp_enqueue_script('thedailysheeple-disqus-count', get_template_directory_uri() . '/js/disqus.js', array(), null, true);
    wp_enqueue_script('thedailysheeple-shuffle', get_template_directory_uri() . '/js/jquery.shuffle.js', array('jquery'), null, true);
    wp_enqueue_script('thedailysheeple-core', get_template_directory_uri() . '/js/thedailysheeple.js', array('thedailysheeple-shuffle'), null, true);
    wp_enqueue_script('thedailysheeple-lazyload', get_template_directory_uri() . '/js/lazyload.js', array(), null, true);
}
add_action( 'wp_enqueue_scripts', 'thedailysheeple_scripts' );

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Custom ad template for this theme.
require get_template_directory() . '/inc/ads.php';

// This is where we add back in the admin fields, etc
require 'functions/thedailysheeple.php';
$legacy = new thedailysheeple();

// Set up theme options in admin panel
require get_template_directory() . '/inc/theme-options.php';
add_action('after_setup_theme', array('TheDailySheepleOptions', 'init'));

if (is_admin()) {
    require get_template_directory() . '/inc/theme-views.php';
    add_action('admin_menu', array('TheDailySheepleOptions', 'registerAdminMenu'));
    add_action('admin_init', array('TheDailySheepleOptions', 'settingsInit'));
}

// Keep track of which posts are used throughout a page render
$pageposts = array();
function thedailysheeple_register_post($post) {
    global $pageposts;
    if (!in_array($post->ID, $pageposts)) {
        $pageposts[] = $post->ID;
    }
}

function thedailysheeple_get_rendered_post_ids() {
    global $pageposts;
    return $pageposts;
}
add_action('the_post', 'thedailysheeple_register_post');

function thedailysheeple_widgets_init() {
    register_sidebar(array(
        'name' => 'Main Sidebar',
        'id' => 'main-sidebar-1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h1 class="title">',
        'after_title' => '</h1>'
    ));
}
add_action('widgets_init', 'thedailysheeple_widgets_init');

function thedailysheeple_footer_script() { ?>
<script>
(function () {
    'use strict';
    var switchTo5x = false;
    LazyLoad.js('http://w.sharethis.com/button/buttons.js', function () {
        stLight.options({
            publisher: 'YOUR-UUID',
            doNotHash: true,
            doNotCopy: true
        });
    });
})();
</script>
<?php }

function thedailysheeple_custom_search_filter($query) {
    if (!is_admin() && $query->is_main_query()) {
        if ($query->is_search) {
            switch ($query->query_vars['s']) {
                /* Custom search queries can be overridden here */
            }
        }
    }
}
add_action('pre_get_posts', 'thedailysheeple_custom_search_filter');
