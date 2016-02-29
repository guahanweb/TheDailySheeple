<!DOCTYPE html>
<html>

<head>
  <title>
    <?php wp_title( '|', true, 'right' ); ?>
  </title>
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
    <header class="masthead">
      <div>
        <h1>TDS</h1>
      </div>
    </header>
