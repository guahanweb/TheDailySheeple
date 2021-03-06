<?php
/*
Template Name: Test Page
*/

get_header();
?>

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
<!-- START TABOOLA HOMEPAGE ELEMENT -->
<div style="padding-left: 10px; padding-right: 10px;">
<div id="taboola-mid-page-thumbnails"></div>
<script type="text/javascript">
  window._taboola = window._taboola || [];
  _taboola.push({
    mode: 'thumbnails-a',
    container: 'taboola-mid-page-thumbnails',
    placement: 'Mid Page Thumbnails',
    target_type: 'mix'
  });
</script>
</div>
<!-- END TABOOLA HOMEPAGE ELEMENT -->
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
