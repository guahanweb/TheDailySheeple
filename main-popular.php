
<!-- SEE main-popular-garth-070215.php for original code -->
<!-- wpp_get_mostpopular posts eliminated -->
<!-- replace with Jetpack Top Posts and Pages Sidebar Widget (Already installed and accessible in Widget area -->

<?php
$tmp_query = $wp_query;
query_posts(array(
	'category_name' => 'editors-choice',
	'posts_per_page' => 10,
	'post__not_in' => thedailysheeple_get_rendered_post_ids()
));
?>
<header>
	<a href="/category/editors-choice/">See more</a>
	<h1><?php echo __('Editor\'s Picks', 'thedailysheeple'); ?></h1>
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

<header>
	<!-- <a href="#">See all popular</a> -->
	<h1><?php echo __('Popular&hellip;', 'thedailysheeple'); ?></h1>
</header>
<!-- This is where we GET Popular posts via (widget?) -->
