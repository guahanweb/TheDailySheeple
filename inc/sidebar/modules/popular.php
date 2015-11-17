<header>
    <!-- <a href="#">See all popular</a> -->
    <h1><?php echo __('Popular&hellip;', 'thedailysheeple'); ?></h1>
</header>
<!-- This is where we GET Popular posts -->
<div class="articles">
    <?php
    $tmp_query = $wp_query;
    $result = stats_get_csv('postviews', array(
        'days' => -1,
        'limit' => 50
    ));

    $posts = array();
    foreach ($result as $data) {
        if (count($posts) < 10 && $data['post_id'] && 'post' === get_post_type($data['post_id'])) {
            $post = get_post($data['post_id']);
            $posts[] = $post;
    ?>
<article id="post-<?php echo $post->ID; ?>" <?php echo get_post_class($post->ID); ?>>
    <?php if (in_array('category', get_object_taxonomies(get_post_type($post->ID)))): ?>
    <p class="published">
        <?php
        if ('post' == get_post_type($post->ID)) {
            printf( '<span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></a></span> | <span class="byline"><span class="author vcard">%3$s</span></span>',
                esc_attr( get_the_date( 'c', $post->ID ) ),
                esc_html( get_the_date('F j, g:ia', $post->ID) ),
                thedailysheeple_get_authorname($post)
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
    $wp_query = $tmp_query;
    ?>
</div>
