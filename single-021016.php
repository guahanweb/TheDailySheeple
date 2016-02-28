<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage The_Daily_Sheeple
 * @since The Daily Sheeple 1.0
 */

get_header();
?>


    <section id="main-column" class="content-area column column-triple">
        <div class="container">
            <section class="column column-one-third left-column">
                <?php get_sidebar('left-single'); ?>
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
?>
<!-- START SHARE THIS -->
<div style="font-family: Tahoma, Geneva, sans-serif; font-size: 14pt; font-weight: bold; font-style:italic;">Wake The Flock Up! Please Share With Sheeple Far &amp; Wide:</div>
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
<!-- START THE EMPIRE IS FALLING -->
<div style="padding: 15px 0px 15px 0px; text-align: center;">              
<a href="https://theempireisfalling.com/?utm_source=thedailysheeple.com&utm_medium=banner&utm_content=ArticleBottom&utm_campaign=TEIF-ArticleBottom-Banner" target="_blank" rel="nofollow" onClick="_gaq.push(['_trackEvent', 'Banner', 'Click', 'TEIF-ArticleBottom-Banner']);"><img border="0" src="https://theempireisfalling.com/wp-content/uploads/2016/02/560x315-America-TEIF-Banner.gif" /></a>
</div>
<!-- END THE EMPIRE IS FALLING -->
<!-- START TABOOLA -->
<div id='taboola-bottom-main-column'></div>
           <script type="text/javascript">
               window._taboola = window._taboola || [];
               _taboola.push({mode:'autosized-generated-2r', container:'taboola-bottom-main-column', placement:'bottom-main-column'});
            </script>
<div id='taboola-text-2-columns'></div>
<script type="text/javascript">
window._taboola = window._taboola || [];
_taboola.push({mode:'text-links-2c', container:'taboola-text-2-columns', placement:'text-2-columns'});
</script>

<!-- END TABOOLA -->
<!-- POST NAV -->
<?php // Previous/next post navigation.
thedailysheeple_post_nav();
   
            ?>
<!-- END POST NAV -->            
<!-- START GOOGLE AD -->
<div style="padding-top: 15px;padding-bottom: 10px; text-align: center;">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- TDS 2.0 - Article Bottom Large -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-8010023987911623"
     data-ad-slot="9365583366"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<!-- END GOOGLE AD -->
<?php

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
// get_sidebar( 'ads' );
get_footer();
