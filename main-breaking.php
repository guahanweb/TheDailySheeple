<?php
$ads = thedailysheeple_get_ads(2);

// Retrieve 10 breaking news articles
$tmp_query = $wp_query;
query_posts(array(
	'category_name' => 'featuredreports',
	'posts_per_page' => 10
));
?>
<header>
	<a href="#">See all breaking news</a>
	<h1><?php echo __('News Just In&hellip;', 'thedailysheeple'); ?></h1>
</header>
<div class="articles">
	<?php 
	$index = 0;
	while (have_posts()):
		$index++;
		the_post();
		get_template_part('content', get_post_format());
		if ($index % 5 === 0) {
			if ($ads !== false) {
				echo $ads[($index / 5) - 1];
			}
		}
	endwhile;
	?>
</div>

<?php $wp_query = $tmp_query; ?>
