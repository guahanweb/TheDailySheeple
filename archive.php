<?php
/**
 *
 */

get_header(); ?>
    <section id="main-column" class="content-area column column-triple">
        <div class="container">
            <section class="column column-one-third left-column">
                <?php get_sidebar('left-single'); ?>
            </section>
            <section class="column column-two-third site-content" id="main" role="main">
                <header>
                <?php
                $obj = get_queried_object();
                printf('<h1>%s</h1>', $obj->name);
                ?>
                </header>
                <div class="articles">
                <?php
                if (have_posts()):
                    while(have_posts()) : the_post();
                    get_template_part('content', get_post_format());
                    endwhile;
                    thedailysheeple_paging_nav();
                else:
                    get_template_part('content', 'none');
                endif;
                ?>
                </div>
            </section>
        </div>
    </section>
    <?php
get_sidebar('content');
get_footer();
