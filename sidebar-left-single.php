<header><h1>Featured</h1></header>
<div class="articles articles-side articles-featured">
    <?php
    $posts = get_posts('numberposts=25&orderby=date&tag=featured');
    foreach ($posts as $k => $post): ?>

    <?php if ($k === 10): ?>
        <article class="ad ad-holder">
            <p>Here go the ads!</p>
        </article>
    <?php endif; ?>

        <article id="post-<?php echo $post->ID; ?>" class="post-<?php echo $post->ID; ?> post post-mini type-post status-publish">
            <h1 class="entry-title"><?php printf('<a href="%s" rel="bookmark">%s</a>', get_permalink($post->ID), $post->post_title); ?></h1>
        </article>

    <?php endforeach; ?>
</div>
