<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage The_Daily_Sheeple
 * @since The Daily Sheeple 1.0
 */

if (is_single()):
    edit_post_link( __('Edit', 'thedailysheeple'), '<span class="edit-link">[', ']</span>');
    the_title('<header><h1 class="entry-title single-title">', '</h1></header>');
    if ('post' == get_post_type()) { ?>
    <h2 class="posted"><?php thedailysheeple_posted_on(true); ?></h2>
    <?php } ?>

<!-- START SHARE THIS -->
<div style="font-family: Tahoma, Geneva, sans-serif; font-size: 14pt; font-weight: bold; font-style:italic;">Please share: Spread the word to sheeple far and wide</div>
<div style="padding: 5px 0px 15px 0px; text-align: center;">
    <span class='st_fblike_vcount' displayText='Facebook Like'></span>
    <span class='st_facebook_vcount' displayText='Facebook'></span>
    <span class='st_twitter_vcount' displayText='Tweet'></span>
    <span class='st_reddit_vcount' displayText='Reddit'></span>
    <span class='st_plusone_vcount' displayText='Google +1'></span>
    <span class='st_sharethis_vcount' displayText='ShareThis'></span>
    <span class='st_email_vcount' displayText='Email'></span>
</div>
<!-- END SHARE THIS -->

    <div class="entry-content">
    <?php
    the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'thedailysheeple'));
    wp_link_pages(array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'thedailysheeple') . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>'
    ));
    ?>
    </div>

<?php else: ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php thedailysheeple_post_thumbnail(); ?>

    <header class="entry-header">
        <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?>
        <p class="published">
            <?php
                if ( 'post' == get_post_type() )
                    thedailysheeple_posted_on();

                edit_post_link( __( 'Edit', 'thedailysheeple' ), '<span class="edit-link">[', ']</span>' );
            ?>
        </p><!-- .published -->
        <?php
            endif;

            the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
        ?>
        </header><!-- .entry-header -->

    <?php if ( is_search() ) : ?>
    <div class="entry-summary">
        <!-- <?php the_excerpt(); ?> -->
    </div><!-- .entry-summary -->
    <?php else : ?>
    <div class="entry-content">
        <!-- <?php
            the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'thedailysheeple' ) );
            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'thedailysheeple' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) );
        ?> -->
    </div><!-- .entry-content -->
    <?php endif; ?>

    <?php //the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>

    <?php if (!post_password_required() && (comments_open() || get_comments_number())): ?>
    <div class="icons">
        <ul>
            <li><a href="<?php the_permalink() ?>#disqus_thread" class="icon-mini icon-discuss"></a>
            <?php comments_popup_link(null, '(1)', '(%)'); ?></li>
            <?php if (thedailysheeple_is_video(get_the_id())): ?>
            <li><a href="#" class="icon-mini icon-watch">Watch</a></li>
            <?php endif; ?>
            <li><span class='st_sharethis' displayText="" st_url="<?php the_permalink(); ?>"></span></li>
        </ul>
    </div>
    <?php endif; ?>
</article><!-- #post-## -->
<?php endif; ?>
