<header>
    <h1 class="entry-title single-title"><?php the_title(); ?></h1>
</header>
<div class="entry-content">
    <?php the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'thedailysheeple')); ?>
    <?php wp_link_pages(array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'thedailysheeple') . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>'
        // 'next_or_number' => 'number'
    )); ?>
</div>
