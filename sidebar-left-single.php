<header><h1>Featured</h1></header>
<div class="articles articles-featured">
    <?php
    $posts = get_posts('numberposts=10&orderby=date&tag=featured');
    foreach ($posts as $post): ?>

        <article id="post-<?php echo $post->ID; ?>" class="post-<?php echo $post->ID; ?> post type-post status-publish">
            <h1 class="entry-title"><?php printf('<a href="%s" rel="bookmark">%s</a>', get_permalink($post->ID), $post->post_title); ?></h1>
        </article>

    <?php endforeach; ?>
</div>
