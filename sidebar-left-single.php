<header><h1>Featured</h1></header>
<div class="articles articles-side articles-featured">
    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 25,
        'orderby' => 'date',
        'category' => 'featuredreports'
    );

    $query = new WP_Query($args);
    while ($query->have_posts()):
        $query->the_post();
        $k = 0;
        if ($k === 10):
    ?>
            <article class="ad ad-holder">
                <p>Here go the ads!</p>
            </article>
        <?php endif; ?>
        <article id="post-<?php the_ID(); ?>" class="post-<?php the_ID(); ?> post post-mini type-post status-publish">
            <h1 class="entry-title"><?php printf('<a href="%s" rel="bookmark">%s</a>', get_permalink(get_the_ID()), the_title()); ?></h1>
        </article>
    <?php
        $k++;
    endwhile;
    wp_reset_postdata();
    ?>
</div>
