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
<?php wpp_get_mostpopular("limit=7"); ?>
