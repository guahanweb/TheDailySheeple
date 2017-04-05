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
           
                <!-- TOP FEATURED AREA -->
<div class="container feature-holder" >
<!-- START YOTTI ELEMENTS -->
<style>
.yottie-widget-video-info-title {
white-space: normal;
font-family: "PT Serif",serif;
text-transform: uppercase
}
.yottie-widget-contents {
	font-family: "PT Serif",serif;
}
.yottie-widget-nav-list-item yottie-active {
	font-size: 20px;
    line-height: 24px
}
.yottie-widget-video-info {
	height: 90px;
}
</style>
<?php echo do_shortcode( '[yottie id="1"]' ); ?>
<!-- END YOTTI ELEMENTS -->

<!-- DIRECT AD -->
<div style="text-align: center;">
<a href="http://toptiergearusa.com/?utm_source=thedailysheeple.com&utm_medium=SponsoredAd&utm_campaign=TTG-SA" target="_blank" onClick="_gaq.push(['_trackEvent', 'Banner', 'Click', 'TTG-HP-AboveFold']);"><img src="http://www.thedailysheeple.com/wp-content/uploads/2017/03/TTG-threat-920.jpg" alt="Top Tier Gear USA" width="920" height="85" border="0" /></a>
</div>
<!-- END DIRECT AD -->

</div>
<!-- END TOP FEATURED AREA -->
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
 <!-- START MID FEATURED AREA -->
<div class="container feature-holder" >

<!-- AMZN AD -->
<div style="text-align: center;">
<script type="text/javascript" language="javascript" src="//c.amazon-adsystem.com/aax2/getads.js"></script>
<script type="text/javascript" language="javascript">
  //<![CDATA[
    aax_getad_mpb({
      "slot_uuid":"82136d89-cb63-41a4-9fc8-7824f9889560"
    });
  //]]>
</script>

</div>
<!-- END AMZN AD -->

<!-- START YOTTI ELEMENTS -->
<?php echo do_shortcode( '[yottie id="2"]' ); ?>
<?php echo do_shortcode( '[yottie id="3"]' ); ?>
<!-- END YOTTI ELEMENTS -->

<!-- START AMZN AD -->
<div style="text-align: center;">
<script type="text/javascript" language="javascript" src="//c.amazon-adsystem.com/aax2/getads.js"></script>
<script type="text/javascript" language="javascript">
  //<![CDATA[
    aax_getad_mpb({
      "slot_uuid":"5a0c206a-261a-4d15-bdab-aee30e08e534"
    });
  //]]>
</script>
</div>
<!-- END AMZN AD -->

</div>
<!-- END MID FEATURED AREA -->
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
