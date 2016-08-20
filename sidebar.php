<!-- START GARTH ORIGINAL CODE -->

<section class="column column-single" id="right-column">
  <div class="container">
    <section class="ad-list">
        <div class="ad-block">
          <?php
            the_widget('TDS_MailChimp_Widget', array(), array(
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => ''
            ));
          ?>

          <!-- START DIRECT AD JMB -->
          <div class="ad ad-JMB">
            <a href="http://www.jmbullion.com/silver/" target="_blank" rel="nofollow" onClick="_gaq.push(['_trackEvent', 'Banner', 'Click', 'JMB-banner-bison']);"><img border="0" src="http://www.thedailysheeple.com/wp-content/uploads/2016/03/JM-Bullion-Gold-And-Silver1.jpg" width=300 height=250 /></a>
          </div>
          <!-- END DIRECT AD JMB -->
          <!-- PREMIER SHUFFLING ADS -->
<?php
$ads = array();


// Second Ad
$ads[] = <<<EOA
         <div class="ad ad-FMT">
            <a href="http://www.futuremoneytrends.com/goldipo" target="_blank" rel="nofollow" onClick="_gaq.push(['_trackEvent', 'Banner', 'Click', 'FMT-K92-Banner-OSTO']);"><img border="0" src="http://www.thedailysheeple.com/wp-content/uploads/2016/05/K92-300x300-B.png" /></a>
          </div>
EOA;

// Third Ad
$ads[] = <<<EOA
         <div class="ad ad-FMT">
            <a href="http://www.futuremoneytrends.com/investright" target="_blank" rel="nofollow" onClick="_gaq.push(['_trackEvent', 'Banner', 'Click', 'FMT-FF-Banner']);"><img border="0" src="http://www.thedailysheeple.com/wp-content/uploads/2016/04/FF-300-ReadNow-b.jpg" /></a>
          </div>
EOA;

// Shuffle and output
shuffle($ads);
foreach ($ads as $ad) {
    echo $ad;
}
?>
   
          <!-- End PREMIER SHUFFLING ADS  -->

        

          <!-- SHUFFLING AD UNITS -->
          <div id="region-sidebarrightshuffle">

<!-- TTG -->
  <div class="sidebar_right_ad">
            <a href="http://toptiergearusa.com/?utm_source=thedailysheeple.com&utm_medium=banner&utm_content=Sidebar-Right&utm_campaign=TTG-Sidebar-Right-Banner-AYR" target="_blank" rel="nofollow" onClick="_gaq.push(['_trackEvent', 'Banner', 'Click', 'TTG-RightBannerTopAYR']);"><img src="http://www.thedailysheeple.com/wp-content/uploads/2016/03/300x300.gif" alt="" width="300" height="300" border="0" /></a>
          </div>
<!-- END TTG -->
            <!-- START Direct Ads JHL CAMPING SUPPLY -->
            <div class="sidebar_right_ad">
              <a href="https://www.campingsurvival.com/dailysheeple_ad1.html" target="_blank" rel="nofollow" onClick="_gaq.push(['_trackEvent', 'Banner', 'Click', 'CampingSurvival-banner']);"><img src="https://www.campingsurvival.com/media/adverts/dailysheeple_ad1.jpg" alt="" BORDER=0 WIDTH=300 HEIGHT=300 /></a>
            </div>

            <div class="sidebar_right_ad">
              <A HREF="https://www.campingsurvival.com/dailysheeple_ad2.html" target="_blank" rel="nofollow" onClick="_gaq.push(['_trackEvent', 'Banner', 'Click', 'CampingSurvival-banner2']);">
                <IMG SRC="https://www.campingsurvival.com/media/adverts/dailysheeple_ad2.jpg" BORDER=0 WIDTH=300 HEIGHT=300>
              </A>
            </div>
            <!-- END  Direct Ads JHL CAMPING SUPPLY -->

            <!-- START Direct Ad SOLO STOVE-->
            <div class="sidebar_right_ad">
              <a href="http://www.solostove.com/?utm_source=TheDailySheeple.com&utm_medium=banner&utm_campaign=TheDailySheeple.com" target="_blank" rel="nofollow" onClick="_gaq.push(['_trackEvent', 'Banner', 'Click', 'SoloStove']);"><img src="/images/banners/250x250-solostove.jpg" alt="" width="300" height="300" border="0" /></a>
            </div>
            <!-- END Direct Ad SOLOSTOVE -->

            <!-- START Direct Ad DOTCOMMER -->
            <div class="sidebar_right_ad">
              <iframe src="http://dcmr.sitescoutadserver.com/disp?pid=8C31C68DDF&rnd=[CACHE-BUSTING-ID-HERE]" width='300' height='300' marginwidth='0' marginheight='0' scrollbars='0' scrolling='no' frameborder='0' bordercolor='#000000' vspace='0' hspace='0'></iframe>
            </div>
            <!-- END Direct Ad DOTTCOMMER -->

            <!-- START Direct Ads Directive21 -->
            <div class="sidebar_right_ad">
              <A HREF="http://www.directive21.com/" target="_blank" rel="nofollow" onClick="_gaq.push(['_trackEvent', 'Banner', 'Click', 'Directive21-Banner']);">
                <IMG SRC="/images/banners/250x208-LPC-berkey.jpg" BORDER=0 WIDTH=300 HEIGHT=300>
              </A>
            </div>

            <div class="sidebar_right_ad">
              <A HREF="http://www.directive21.com/product-category/survival-cave-food-storage/" target="_blank" rel="nofollow" onClick="_gaq.push(['_trackEvent', 'Banner', 'Click', 'Directive21-Banner-Cavefood']);">
                <IMG SRC="/images/banners/250x250-cavefood-directive21.jpg" BORDER=0 WIDTH=300 HEIGHT=300>
              </A>
            </div>
            <!-- END Direct Ads Directive21 -->
<!-- AMAZON -->
            <div class="sidebar_right_ad">
            <script type="text/javascript" language="javascript" src="//c.amazon-adsystem.com/aax2/getads.js"></script>
            <script type="text/javascript" language="javascript">
              //<![CDATA[
              aax_getad_mpb({
                "slot_uuid": "5eddd92e-a15b-4e83-8567-2d34bd7f3e0f"
              });
              //]]>
            </script>
            </div>
<!-- END AMAZON -->


          </div>
          <!-- END region-sidebarrightshuffle DIV -->

          <!-- END SHUFFLING AD UNITS -->


        </div>
    </section>
  </div>
</section>

<!-- END GARTH ORIGINAL CODE -->
