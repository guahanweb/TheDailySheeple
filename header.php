<!DOCTYPE html>
<html>

<head>
  <title>
    <?php wp_title( '|', true, 'right' ); ?>
  </title>
  <meta charset="utf-8">
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
            _taboola.push({
              article: 'auto'
            });
          </script>
          <script type="text/javascript" src="http://cdn.taboolasyndication.com/libtrc/shtf-network/loader.js"></script>
          <!-- END TABOOLA CODE SNIPPET -->
          <?php endif; ?>
            <?php if (is_front_page()): ?>
              <script type="text/javascript">
                window._taboola = window._taboola || [];
                _taboola.push({
                  home: 'auto'
                });
                ! function (e, f, u) {
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

                  (function () {
                    var ga = document.createElement('script');
                    ga.type = 'text/javascript';
                    ga.async = true;
                    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(ga, s);
                  })();
                </script>
                <!-- END GOGGLE ANALYTICS -->

                <script type="text/javascript">
                  var switchTo5x = true;
                </script>
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
    <header class="masthead small">
      <div id="masthead-secondary" class="mini">
        <section class="container top-main">
          <div class="search-form">
            <form name="search" role="search" id="searchform" action="/" method="get">
              <div class="input-field input-search">
                <div class="input-part input-text">
                  <input type="text" placeholder="<?php echo __('Search The Daily Sheeple', 'thedailysheeple'); ?>" name="s" id="s">
                </div>
                <div class="input-part input-submit">
                  <button class="search search-icon" type="submit">Submit</button>
                </div>
              </div>
            </form>
          </div>
          <div class="top-nav">
            <nav>
              <ul>
                <li class="dropdown">
                  <a class="hamburger" href="#">Sections</a>
                  <ul>
                    <li><a href="/category/featuredreports/">Breaking</a></li>
                    <li><a href="/category/videos/">Video</a></li>
                    <!--<li><a href="#">Popular</a></li>-->
                    <li><a href="/category/editors-choice/">Editor&apos;s Pick</a></li>
                    <!--<li><a href="#">Main Stream</a></li>-->
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
          <div class="social-media">
            <ul>
              <li>
                <a href="#" class="icon icon-mail manual-optin-trigger" data-optin-slug="k5vywtzbwd-lightbox">
                  <?php echo __('Newsletter', 'thedailysheeple'); ?>
                </a>
              </li>
              <li>
                <a href="#" data-action="bookmark" class="icon icon-star">
                  <?php echo __('Star', 'thedailysheeple'); ?>
                </a>
              </li>
              <li>
                <a href="http://feeds.feedburner.com/dailysheeple" target="_blank" class="icon icon-rss">
                  <?php echo __('RSS', 'thedailysheeple'); ?>
                </a>
              </li>
              <li>
                <div class="icon-extended icon-ex-facebook" data-action="facebook">
                  <span class="icon icon-facebook">FB</span>
                  <span class="like">Like</span>
                  <span class="like-count">
                                    <span class="content"><?php echo thedailysheeple_get_likes(); ?></span>
                  </span>
                  <a href="https://www.facebook.com/pages/The-Daily-Sheeple/114637491995485" target="_blank" class="overlay">&nbsp;</a>
                </div>
              </li>
              <li>
                <div class="icon-extended icon-ex-twitter" data-action="twitter">
                  <span class="icon icon-twitter">Twitter</span>
                  <span class="like">Follow</span>
                  <a href="https://twitter.com/TheDailySheeple" target="_blank" class="overlay">&nbsp;</a>
                </div>
              </li>
            </ul>
          </div>
          <div class="main-logo">
            <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri() . '/images/header-mini-logo.png'; ?>" height="38" width="350" alt="The Daily Sheeple"></a>
          </div>
        </section>
      </div>
      <div>
        <section class="container top-main">
          <div class="search-form">
            <form name="search" role="search" id="searchform" action="/" method="get">
              <div class="input-field input-search">
                <div class="input-part input-text">
                  <input type="text" placeholder="<?php echo __('Search The Daily Sheeple', 'thedailysheeple'); ?>" name="s" id="s">
                </div>
                <div class="input-part input-submit">
                  <button class="search search-icon" type="submit">Submit</button>
                </div>
              </div>
            </form>
          </div>
          <div class="top-nav">
            <nav>
              <ul>
                <li><a href="/category/featuredreports/">Breaking</a></li>
                <li><a href="/category/videos/">Video</a></li>
                <!--<li><a href="#">Popular</a></li>-->
                <li><a href="/category/editors-choice/">Editor&apos;s Pick</a></li>
                <!--<li><a href="#">Main Stream</a></li>-->
              </ul>
            </nav>
          </div>
          <div class="social-media">
            <ul>
              <li>
                <a href="#" class="icon icon-mail manual-optin-trigger" data-optin-slug="k5vywtzbwd-lightbox">
                  <?php echo __('Newsletter', 'thedailysheeple'); ?>
                </a>
              </li>
              <li>
                <a href="#" data-action="bookmark" class="icon icon-star">
                  <?php echo __('Star', 'thedailysheeple'); ?>
                </a>
              </li>
              <li>
                <a href="http://feeds.feedburner.com/dailysheeple" target="_blank" class="icon icon-rss">
                  <?php echo __('RSS', 'thedailysheeple'); ?>
                </a>
              </li>
              <li>
                <div class="icon-extended icon-ex-facebook" data-action="facebook">
                  <span class="icon icon-facebook">FB</span>
                  <span class="like">Like</span>
                  <span class="like-count">
                                    <span class="content"><?php echo thedailysheeple_get_likes(); ?></span>
                  </span>
                  <a href="https://www.facebook.com/pages/The-Daily-Sheeple/114637491995485" target="_blank" class="overlay">&nbsp;</a>
                </div>
              </li>
              <li>
                <div class="icon-extended icon-ex-twitter" data-action="twitter">
                  <span class="icon icon-twitter">Twitter</span>
                  <span class="like">Follow</span>
                  <a href="https://twitter.com/TheDailySheeple" target="_blank" class="overlay">&nbsp;</a>
                </div>
              </li>
            </ul>
          </div>
        </section>
        <section class="container main-logo">
          <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri() . '/images/header-mini-logo.png'; ?>" height="38" width="350" alt="The Daily Sheeple"></a>
          <p class="issue-date"><?php echo date('l, F jS, Y'); ?></p>
        </section>
      </div>
      <section class="third-party">
        <div class="ads">
          <!-- FRAMED AD -->
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- TDS-SiteTop-970x250 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:970px;height:250px"
     data-ad-client="ca-pub-8010023987911623"
     data-ad-slot="6809454507"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

          <!-- END FRAMED AD -->
        </div>
      </section>
    </header>
