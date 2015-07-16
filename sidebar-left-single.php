<section class="articles articles-featured">
<?php
$posts = get_posts('numberposts=10&orderby=date&tag=featured');
foreach ($posts as $post): ?>

    <article>
        <header><h1><?php echo $post['title']; ?></h1></header>
    </article>

<?php endforeach; ?>
</section>
