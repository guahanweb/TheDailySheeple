<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
    <section id="main-column" class="content-area column column-triple">
        <div class="container">
            <section class="column column-one-third left-column">
                <?php get_sidebar('left-single'); ?>
            </section>
            <section class="column column-two-third">
                <header>
                    <h1><?php printf(__('Category: %s', 'thedailysheeple'), single_cat_title('', false)); ?></h1>
                    <?php
                    $term_description = term_description();
                    if (!empty($term_description)) {
                        printf('<h2 class="description">%s</h2>', $term_description);
                    }
                    ?>
                </header>
                <div class="articles">
                <?php
                if (have_posts()):
                    // Include appropriate content for post type
                    while (have_posts()) : the_post();
                    get_template_part('content', get_post_format());
                    endwhile;
                    thedailysheeple_paging_nav();
                else:
                    get_template_part('content', 'none');
                endif;
                ?>
                </div>
            </section>
        </div>
    </section>
<?php
get_sidebar('content');
get_footer();
