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

<!-- OPTIN MONSTER - INLINE -->
<!-- This site is converting visitors into subscribers and customers with OptinMonster - http://optinmonster.com --><script>var om570c5a8b4f4a3,om570c5a8b4f4a3_poll=function(){var r=0;return function(n,l){clearInterval(r),r=setInterval(n,l)}}();!function(e,t,n){if(e.getElementById(n)){om570c5a8b4f4a3_poll(function(){if(window['om_loaded']){if(!om570c5a8b4f4a3){om570c5a8b4f4a3=new OptinMonsterApp();return om570c5a8b4f4a3.init({"s":"6776.570c5a8b4f4a3","staging":0,"dev":0,"beta":0});}}},25);return;}var d=false,o=e.createElement(t);o.id=n,o.src="//a.optnmnstr.com/app/js/api.min.js",o.onload=o.onreadystatechange=function(){if(!d){if(!this.readyState||this.readyState==="loaded"||this.readyState==="complete"){try{d=om_loaded=true;om570c5a8b4f4a3=new OptinMonsterApp();om570c5a8b4f4a3.init({"s":"6776.570c5a8b4f4a3","staging":0,"dev":0,"beta":0});o.onload=o.onreadystatechange=null;}catch(t){}}}};(document.getElementsByTagName("head")[0]||document.documentElement).appendChild(o)}(document,"script","omapi-script");</script><!-- / OptinMonster -->
<!-- END OPTIN MONSTER - INLINE -->
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
<!-- START LOCKERDOME -->
<div id="ld-2433-1238"></div><script>(function(w,d,s,i){w.ldAdInit=w.ldAdInit||[];w.ldAdInit.push({slot:8263805645904743,size:[0, 0],id:"ld-2433-1238"});if(!d.getElementById(i)){var j=d.createElement(s),p=d.getElementsByTagName(s)[0];j.async=true;j.src="//cdn2.lockerdome.com/_js/ajs.js";j.id=i;p.parentNode.insertBefore(j,p);}})(window,document,"script","ld-ajs");</script>
<!-- END LOCKERDOME -->

                <!-- TOP VIDEO FEATURED AREA -->
<div class="container feature-holder" >
<!-- START YOTTI ELEMENTS -->
<style>
.yottie-widget-video-info-title {
white-space: normal;
font-family: "PT Serif",serif;
text-transform: uppercase
}
.yottie-widget-contents, .yottie-widget-header-channel-title {
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
<?php echo do_shortcode( '[yottie id="4"]' ); ?>
<!-- END YOTTI ELEMENTS -->

</div>
<!-- END VIDEO FEATURED AREA -->



<!-- POST NAV -->
<?php // Previous/next post navigation.
thedailysheeple_post_nav();
   
            ?>
<!-- END POST NAV -->            

<!-- Ad Area -->
     <!-- *** CURRENTLY EMPTY -->
<!-- END Ad Area -->

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
