<?php
$ads = thedailysheeple_get_ads(3);

// Retrieve 10 breaking news articles
$tmp_query = $wp_query;
query_posts(array(
    'category_name' => 'featuredreports',
    'posts_per_page' => 14
));
?>
<header>
    <a href="/category/featuredreports/">See all breaking news</a>
    <h1><?php echo __('News Just In&hellip;', 'thedailysheeple'); ?></h1>
</header>
<div class="articles">
    <?php
    $index = 0;
    while (have_posts()):
        $index++;
        the_post();
        get_template_part('content', get_post_format());

        // Show an ad after 3 and 8
        if ($index === 3) {
            echo $ads ? $ads[0] : '';
        } else if ($index === 8) {
            echo $ads ? $ads[1] : '';
        }
    endwhile;

    // Show one more ad after all
    echo $ads ? $ads[2] : '';
    ?>
</div>

<?php $wp_query = $tmp_query; ?>
