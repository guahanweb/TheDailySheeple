<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage The_Daily_Sheeple
 * @since The Daily Sheeple 1.0
 */

get_header(); ?>
        <section class="column column-triple" id="main-column">
            <div class="container">
                <section class="column column-one-third left-column">
					<header><h1>Left Column</h1></header>
				</section>
				<section class="column column-two-third">
					<header>
						<h1 class="page-title"><?php printf(__('Search Results for: %s', 'thedailysheeple'), get_search_query()); ?></h1>
					</header>
					<?php if ( have_posts() ) : ?>
					<div class="articles">
				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );

					endwhile;
					// Previous/next post navigation.
					thedailysheeple_paging_nav();
					echo "</div>\n";
				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
				</section>
			</div>
		</section>
<?php get_sidebar();
get_footer();
