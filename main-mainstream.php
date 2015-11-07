<?php
// Retrieve 10 undisplayed articles
$tmp_query = $wp_query;
query_posts(array(
    'posts_per_page' => 10,
    'post__not_in' => thedailysheeple_get_rendered_post_ids()
));
?>
<header>
    <!-- <a href="#"><?php echo __('More', 'thedailysheeple'); ?></a> -->
    <h1><?php echo __('Main Stream&hellip;', 'thedailysheeple'); ?></h1>
</header>
<div class="articles">
    <?php
    while (have_posts()):
        the_post();
        get_template_part('content', 'list-minimal');
    endwhile;
    ?>
</div>
<?php $wp_query = $tmp_query; ?>
