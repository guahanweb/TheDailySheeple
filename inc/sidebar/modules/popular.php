<div class="">
    <header>
        <h1>Popular Posts</h1>
    </header>
    <div class="articles">
<?php
$res = stats_get_csv('postviews', array(
    'days' => -1,
    'limit' => 50
));

$posts = array();
foreach ($res as $post) {
    if (count($posts) < 10 && $post['post_id'] && get_post($post['post_id']) && 'post' === get_post_type($post['post_id'])) {
        $posts[] = $post;
    }
}

echo '<pre>' . print_r($posts, true) . '</pre>';
?>
    </div>
</div>
