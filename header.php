<!DOCTYPE html>
<html>
<head>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <meta name="author" content="">
    <meta name="DC.creator" content="Meat Grinder Media">
    <?php if (is_single()): ?>
    <meta property="og:image" content="<?php echo thedailysheeple_get_post_image_url(get_queried_object_id()); ?>">
    <?php endif; ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
    <!-- TABOOLA REQUIRED SCRIPTS  -->
        <?php if (is_single()): ?>
    <!-- TABOOLA CODE SNIPPET -->
  <script type="text/javascript">
               window._taboola = window._taboola || [];
               _taboola.push({article:'auto'});
          </script>
          <script type="text/javascript" src="http://cdn.taboolasyndication.com/libtrc/shtf-network/loader.js"></script>
  <!-- END TABOOLA CODE SNIPPET -->
    <?php endif; ?>
    <?php if (is_front_page()): ?>
<script type="text/javascript">
  window._taboola = window._taboola || [];
  _taboola.push({home:'auto'});
  !function (e, f, u) {
    e.async = 1;
    e.src = u;
    f.parentNode.insertBefore(e, f);
  }(document.createElement('script'),
  document.getElementsByTagName('script')[0],
  '//cdn.taboola.com/libtrc/shtf-dailysheeple/loader.js');
</script> 

 <?php endif; ?>
    <!-- END TABOOLA REQUIRED SCRIPTS -->
    <!-- GOGGLE ANALYTICS -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27183492-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- END GOGGLE ANALYTICS -->

    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">
        stLight.options({
            publisher: "7b290577-a1b4-42f5-8f2d-755a8aabb6c1",
            doNotHash: false,
            doNotCopy: true,
            hashAddressBar: false,
            onhover: false
        });
    </script>
</head>
<body>
    <div class="wrapper container">
        <header class="masthead">
            <div>
                <section class="top container">
                    <div class="tip-jar">
                        <p><a href="/contact-us" target="_blank">Send us a tip</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/advertising" target="_blank">Advertising</a><br>
                        <a href="/about" target="_blank">About The Daily Sheeple</a></p>
                    </div>
                    <div class="edition">
                        <p>US Edition<br>
                        <?php echo date('l, F jS, Y'); ?></p>
                    </div>
                    <div class="social-media">
                        <form name="search" role="search" id="searchform" action="/" method="get">
                        <ul>
                            <li><div class="input-field input-search">
                                <div class="input-part input-text">
                                    <input type="text" placeholder="<?php echo __('Type Search Term', 'thedailysheeple'); ?>" name="s" id="s">
                                </div>
                                <div class="input-part input-submit">
                                    <button class="search search-icon" type="submit">Submit</button>
                                </div>
                            </div></li>
                            <li><a href="#" class="icon icon-mail manual-optin-trigger" data-optin-slug="k5vywtzbwd-lightbox"><?php echo __('Newsletter', 'thedailysheeple'); ?></a></li>
                            <li><a href="#" data-action="bookmark" class="icon icon-star"><?php echo __('Star', 'thedailysheeple'); ?></a></li>
                            <li><a href="http://feeds.feedburner.com/dailysheeple" target="_blank" class="icon icon-rss"><?php echo __('RSS', 'thedailysheeple'); ?></a></li>
                            <li><div class="icon-extended icon-ex-facebook" data-action="facebook">
                                <span class="icon icon-facebook">FB</span>
                                <span class="like">Like</span>
                                <span class="like-count">
                                    <span class="content"><?php echo thedailysheeple_get_likes(); ?></span>
                                </span>
                                <a href="https://www.facebook.com/pages/The-Daily-Sheeple/114637491995485" target="_blank" class="overlay">&nbsp;</a>
                            </div></li>
                            <li><div class="icon-extended icon-ex-twitter" data-action="twitter">
                                <span class="icon icon-twitter">Twitter</span>
                                <span class="like">Follow</span>
                                <a href="https://twitter.com/TheDailySheeple" target="_blank" class="overlay">&nbsp;</a>
                            </div></li>
                        </ul>
                        </form>
                    </div>
                </section>
                <section class="main">
                    <a href="http://www.thedailysheeple.com/"><img src="<?php echo get_template_directory_uri(); ?>/images/main-banner.png" height="161" width="948" border="0"alt="The Daily Sheeple: Wake the Flock Up!"></a>
                </section>
                <section class="ad-holder container">
                    <div class="highlights left">
                        <ul>
                            <li><a href="http://www.jmbullion.com/" target="_blank" rel="nofollow" onClick="_gaq.push(['_trackEvent', 'TextAd', 'Click', 'JMBullion-TextAdMain']);">Invest In Physical Gold & Silver</a></li>
                            <li><a href="http://hypertracker.com/go/dotcommer/sheeplesecret/" target="_blank" onClick="_gaq.push(['_trackEvent', 'TextAd', 'Click', 'Jason Dinner-TextAdMain']);" rel="nofollow">GUN CONTROL & FOOD CRISIS</a></li>
                            <li><!-- Promo though Jan 5, 2015 --><a href="http://www.campingsurvival.com/lifestraw.html" target="_blank" rel="nofollow"onClick="_gaq.push(['_trackEvent', 'TextAd', 'Click', 'CampingSurvival-TextAdMain']);">Lifestraw - Clean Water Anywhere</a></li>
                        </ul>
                    </div>
                    <div class="highlights right">
                        <ul>
                            <li><a href="http://www.clarocet.com/clarocet-nri/" target="_blank" rel="nofollow" onClick="_gaq.push(['_trackEvent', 'TextAd', 'Click', 'Clarocet-TextAdMain']);">Instant Stress & Anxiety Relief</a></li>
                            <li><a href="https://secure.avangate.com/affiliate.php?ACCOUNT=BRENTVEN&AFFILIATE=42896&PATH=http%3A%2F%2Fwww.bulletproofhome.com%2Fvsl%2F" target="_blank" rel="nofollow" onClick="_gaq.push(['_trackEvent', 'InFeed', 'Click', 'AFF-BulletProofHome-TextAdMain']);">Bulletproof Home</a></li>
                            <li><a href="https://secure.avangate.com/affiliate.php?ACCOUNT=HIGHPEON&AFFILIATE=42896&PATH=http%3A%2F%2Fwww.blackoutusa.com%2Fvsl%2Findex.php&AFFSRC=text" target="_blank" rel="nofollow" onClick="_gaq.push(['_trackEvent', 'InFeed', 'Click', 'AFF-BlackoutUSA-TextAdMain']);">Blackout USA: EMP Survival</a></li>
                        </ul>
                    </div>
                    <div class="third-party">
                        <div class="ads">
<!-- FRAMED AD -->
<iframe src="http://dcmr.sitescoutadserver.com/disp?pid=8F0825501A&rnd=[CACHE-BUSTING-ID-HERE]" width='728' height='90' marginwidth='0' marginheight='0' scrollbars='0' scrolling='no' frameborder='0' bordercolor='#000000' vspace='0' hspace='0'></iframe>
<!-- END FRAMED AD -->
                        </div>
                    </div>
                </section>
            </div>
        </header>
