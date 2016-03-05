
<div style="padding: 5px 0px 15px 0px; text-align: center;">          
<a href="https://theempireisfalling.com/?utm_source=thedailysheeple.com&utm_medium=banner&utm_content=sidebar-left&utm_campaign=TEIF-Sidebar-Left-Banner" target="_blank" rel="nofollow" onClick="_gaq.push(['_trackEvent', 'Banner', 'Click', 'TEIF-Sidebar-Left-Banner']);"><img border="0" src="https://theempireisfalling.com/wp-content/uploads/2016/02/TEIF-Take-Action-Banner.png" /></a>
</div>

<header><h1>Featured</h1></header>
<div class="articles articles-side articles-featured">
    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 25,
        'orderby' => 'date',
        'category' => 'featuredreports'
    );

    $query = new WP_Query($args);
    $k = 0;
    while ($query->have_posts()):
        $query->the_post();
        if ($k === 5):
    ?>
    <!-- AD AREA -->
            <article class="ad ad-holder">
              
<div style="padding-top:10px;"><a href="http://www.silver.com/" target="_blank" rel="nofollow" onClick="_gaq.push(['_trackEvent', 'Banner', 'Click', 'JMBullion-LeftSidebar-Banner']);"><img border="0" src="http://www.thedailysheeple.com/wp-content/uploads/2015/11/silverdotcom-ad-250x250.jpg" /></a></div>

<div style="padding-top:10px;"><a href="http://amzn.to/1HZkbSD" target="_blank" rel="nofollow" onClick="_gaq.push(['_trackEvent', 'Banner', 'Click', 'PreppersBlueprint-LeftSidebar-Banner']);"><img border="0" src="http://www.thedailysheeple.com/wp-content/uploads/2015/11/preppersblueprint-250.jpg" /></a></div>
<!-- START AMAZON AD CODE -->
<div style="padding-top:10px; text-align: center;">
<script type="text/javascript" language="javascript" src="//c.amazon-adsystem.com/aax2/getads.js"></script>
<script type="text/javascript" language="javascript">
//<![CDATA[
aax_getad_mpb({
  "slot_uuid":"3526624f-92c3-4c13-a3fa-2dc544f2053e"
});
//]]>
</script>
</div>
<!-- END AMAZON AD CODE -->
                
            </article>
    <!-- END AD AREA -->        
        <?php endif; ?>
        <article id="post-<?php the_ID(); ?>" class="post-<?php the_ID(); ?> post post-mini type-post status-publish">
            <h1 class="entry-title"><?php printf('<a href="%s" rel="bookmark">%s</a>', get_permalink(get_the_ID()), get_the_title()); ?></h1>
        </article>
    <?php
        $k++;
    endwhile;
    wp_reset_postdata();
    ?>
</div>
<br />
<div style="padding: 5px 0px 15px 0px; text-align: center;">         
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- TDS-LeftSidebar160x600 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:160px;height:600px"
     data-ad-client="ca-pub-8010023987911623"
     data-ad-slot="5318864163"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>