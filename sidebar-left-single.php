<section class="articles articles-featured">
    <header><h1>Featured</h1></header>
    <?php
    $posts = get_posts('numberposts=10&orderby=date&tag=featured');
    foreach ($posts as $post): ?>

        <article class="mini">
            <header>
                <h1><?php printf('<a href="%s">%s</a>', get_permalink($post->ID), $post->post_title); ?></h1>
            </header>
        </article>

    <?php endforeach; ?>
</section>
