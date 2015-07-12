<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (in_array('category', get_object_taxonomies( get_post_type()))): ?>
    <p class="published">
        <?php
        if ('post' == get_post_type()) {
            thedailysheeple_posted_on();
        }
        edit_post_link( __('Edit', 'thedailysheeple'), '<span class="edit-link">[', ']</span>');
        ?>
    </p>
    <?php endif; ?>
    <?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
</article>
