<header>
    <!-- <a href="#">See all popular</a> -->
    <h1><?php echo __('Popular&hellip;', 'thedailysheeple'); ?></h1>
</header>
<!-- This is where we GET Popular posts -->
<div class="articles">
    <?php
    $result = stats_get_csv('postviews', array(
        'days' => -1,
        'limit' => 50
    ));

    $posts = array();
    foreach ($result as $data) {
        if (count($posts) < 10 && $data['post_id'] && 'post' === get_post_type($data['post_id'])) {
            $post = get_post($data['post_id']);
    ?>
<article id="post-<?php echo $post->ID; ?>" <?php echo get_post_class($post->ID); ?>>
    <?php if (in_array('category', get_object_taxonomies(get_post_type($post->ID)))): ?>
    <p class="published">
        <?php
        if ('post' == get_post_type($post->ID)) {
            printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> | <span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author" target="_blank">%5$s</a></span></span>',
                esc_url( get_permalink($post->ID) ),
                esc_attr( get_the_date( 'c', $post->ID ) ),
                esc_html( get_the_date('D. F j, Y, g:ia', $post->ID) ),
                esc_url( thedailysheeple_get_authorurl($post->ID) ),
                thedailysheeple_get_authorname($post->ID)
            );
        }
        edit_post_link( __('Edit', 'thedailysheeple'), '<span class="edit-link">[', ']</span>');
        ?>
    </p>
    <?php endif; ?>
    <?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
</article>
    <?php
        }
    }
    ?>
</div>
