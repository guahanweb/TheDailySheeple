<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage The_Daily_Sheeple
 * @since The Daily Sheeple 1.0
 */

get_header(); ?>

<section class="column column-triple" id="main-column">
    <div class="container">
        <section class="column column-one-third left-column">
            <?php get_sidebar('left-single'); ?>
        </section>
        <section class="column column-two-third" id="main" role="main">
<?php
            if ( is_front_page() && thedailysheeple_has_featured_posts() ) {
                // Include the featured content template.
                get_template_part( 'featured-content' );
            }
                // Start the Loop.
                while ( have_posts() ) : the_post();

                    // Include the page content template.
                    get_template_part( 'content', 'page' );


                endwhile;
            ?>

        </section>
    </div>
</section>
<?php
get_sidebar('ads');
get_footer();
