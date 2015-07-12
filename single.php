<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage The_Daily_Sheeple
 * @since The Daily Sheeple 1.0
 */

get_header(); ?>

	<section id="main-column" class="content-area column column-triple">
		<div class="container">
            <section class="column column-one-third left-column">
				<header><h1>Left Column</h1></header>
			</section>
			<section class="column column-two-third site-content" id="main" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

					// Previous/next post navigation.
					thedailysheeple_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>
			</section><!-- #content -->
		</div><!-- .container -->
	</section><!-- #primary -->
<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
