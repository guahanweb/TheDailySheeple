<div class="">
    <header>
        <h1>Popular Posts</h1>
    </header>
    <div class="articles">
<?php
$res = stats_get_csv('postviews', array(
    'days' => -1,
    'limit' => -1
));

echo "<pre>" . print_r($res, TRUE) . "</pre>\n";
?>
    </div>
</div>
