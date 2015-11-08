<?php
// Retrieve 50 and just list the title
$tmp_query = $wp_query;
query_posts(array(
    'posts_per_page' => 50,
    'post__not_in' => thedailysheeple_get_rendered_post_ids()
));
?>
<header>
    <a href="<?php echo date('/Y/m/', strtotime('1 month ago')); ?>"><?php echo __('See Full Archives', 'thedailysheeple'); ?></a>
    <h1><?php echo __('Sheeple News Archives', 'thedailysheeple'); ?></h1>
</header>
<div class="articles">
    <?php
    while (have_posts()):
        the_post();
        echo "<article><h1><a href=\"" . get_the_permalink() . "\">";
        echo get_the_title();
        echo "</a></h1></article>\n";
    endwhile;
    ?>
</div>
<?php $wp_query = $tmp_query; ?>
