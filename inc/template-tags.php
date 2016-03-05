<?php
if (!function_exists('thedailysheeple_paging_nav')):
/**
 * Set up global pagination for our listing pages
 * @since The Daily Sheeple 1.0
 */
function thedailysheeple_paging_nav() {
    // Don't print empty markup if there's only one page
    if ($GLOBALS['wp_query']->max_num_pages < 2) {
        return;
    }

    $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );

    if ( isset( $url_parts[1] ) ) {
        wp_parse_str( $url_parts[1], $query_args );
    }

    $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
    $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

    $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
    $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

    // Set up paginated links.
    $links = paginate_links( array(
        'base'     => $pagenum_link,
        'format'   => $format,
        'total'    => $GLOBALS['wp_query']->max_num_pages,
        'current'  => $paged,
        'mid_size' => 1,
        'add_args' => array_map( 'urlencode', $query_args ),
        'prev_text' => __( '&larr; Previous', 'twentyfourteen' ),
        'next_text' => __( 'Next &rarr;', 'twentyfourteen' ),
    ) );

    if ( $links ) :
    ?>
    <nav class="navigation paging-navigation" role="navigation">
        <h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'thedailysheeple' ); ?></h1>
        <div class="pagination loop-pagination">
            <?php echo $links; ?>
        </div><!-- .pagination -->
    </nav><!-- .navigation -->
    <?php
    endif;
}
endif;

if ( ! function_exists( 'twentyfourteen_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @since The Daily Sheeple 1.0
 */
function thedailysheeple_post_nav() {
    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous ) {
        return;
    }

    ?>
    <nav class="navigation post-navigation container" role="navigation">
        <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'thedailysheeple' ); ?></h1>
        <div class="nav-links clearfix">
            <?php
            if ( is_attachment() ) :
                previous_post_link( '<span class="prev-link">%link</span>', __( '<span class="meta-nav">Published In</span>%title', 'thedailysheeple' ) );
            else :
                previous_post_link( '<span class="prev-link">%link</span>', __( '<span class="meta-nav">Previous Post: </span>%title', 'thedailysheeple' ) );
                next_post_link( '<span class="next-link">%link</span>', __( '<span class="meta-nav">Next Post: </span>%title', 'thedailysheeple' ) );
            endif;
            ?>
        </div><!-- .nav-links -->
    </nav><!-- .navigation -->
    <?php
}
endif;

/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index
 * views, or a div element when on single views.
 *
 * @since The Daily Sheeple 1.0
 */
function thedailysheeple_post_thumbnail() {
    $is_video = thedailysheeple_is_video(get_the_id());
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
        return;
    }

    if ( is_singular() ) : ?>
    <div class="post-thumbnail single">
    <?php the_post_thumbnail(); ?>
    </div>

    <?php else : ?>
    <!-- VIDEO: <?php echo $is_video; ?> -->
    <a class="post-thumbnail<?php echo $is_video ? ' video' : '' ?>" href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail('thumbnail'); ?>
    <?php if ($is_video): ?>
      <span class="video-icon"></span>
    <?php endif; ?>
    </a>

    <?php endif; // End is_singular()
}

if ( ! function_exists( 'thedailysheeple_posted_on' ) ) :
/**
 * Print HTML with meta information for the current post-date/time and author.
 *
 * @since The Daily Sheeple 1.0
 */
function thedailysheeple_posted_on($single = false) {
    if ( is_sticky() && is_home() && ! is_paged() ) {
        echo '<span class="featured-post">' . __( 'Sticky', 'thedailysheeple' ) . '</span>';
    }

    $post = get_post(get_the_ID());

    if ($single) {
        // Set up and print post meta information.
        $website = thedailysheeple_get_authorwebsite($post);
        printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> | <span class="byline"><span class="author vcard">%4$s</span></span> | <span class="byline"><span class="author-website"><a href="%5$s">%6$s</a></span>',
            esc_url( get_permalink() ),
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date('F j, Y') ),
            thedailysheeple_get_authorname($post),
            $website['url'],
            $website['name']
       );

        if (function_exists('the_views')) {
            echo ' | <span class="post-views">';
            the_views();
            echo '</span>';
        }
    } else {
        // Set up and print post meta information.
        printf( '<span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> | <span class="byline"><span class="author vcard">%3$s</span></span>',
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date('F j, g:ia') ),
            thedailysheeple_get_authorname($post)
        );

        if (function_exists('the_views')) {
            echo ' | <span class="post-views">';
            the_views();
            echo '</span>';
        }
    }
}
endif;
