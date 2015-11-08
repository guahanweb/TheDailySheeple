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

        <section class="column column-triple" id="main-column">
            <div class="container">
                <section class="column column-two-third news-just-in">
            <!-- Breaking News -->
            <?php get_template_part('main', 'breaking'); ?>
                </section>
                <section class="column column-one-third news-popular">
            <!-- Popular News -->
            <?php get_template_part('main', 'popular'); ?>
                </section>
            </div>
            <div class="container feature-holder">
                <div class="features">
                    <div class="feature">
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/feature-splash.png" width="276" height="222"></a>
                    </div>
                    <div class="feature">
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/feature-splash.png" width="276" height="222"></a>
                    </div>
                    <div class="feature">
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/feature-splash.png" width="276" height="222"></a>
                    </div>
                    <div class="feature">
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/feature-splash.png" width="276" height="222"></a>
                    </div>
                    <div class="feature">
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/feature-splash.png" width="276" height="222"></a>
                    </div>
                    <div class="feature">
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/feature-splash.png" width="276" height="222"></a>
                    </div>
                </div>
                <p class="ad-signature">Ads by Taboola</p>
            </div>
            <div class="container news-streams">
                <section class="column column-one-third stream-main">
                    <?php get_template_part('main', 'mainstream'); ?>
                </section>
                <section class="column column-one-third stream-editors-pick">
                    <?php get_template_part('main', 'videos'); ?>
                </section>
                <section class="column column-one-third stream-discussion">
                    <header>
                        <h1>Discussion&hellip;</h1>
                    </header>
                    <div class="articles discussion">
<?php
$tpl = <<<EOT
<article>
    <h1><a href="{commenturl}"><strong>{commenter}:</strong> <em>"{commentsnippet}"</a></em></h1>
</article>
EOT;
recent_comments("limit=20&output_template=$tpl");
?>
                    </div>
                </section>
            </div>
            <div class="container archive-block" id="archives">
                <?php get_sidebar('left-column'); ?>
                <section class="archives column column-two-third">
                    <?php get_template_part('main', 'archive'); ?>
                </section>
            </div>
        </section>
        <?php get_sidebar(); ?>
<?php
get_footer();
