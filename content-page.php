<header>
	<h1><?php the_title(); ?></h1>
</header>
<div class="page-content">
	<?php the_content('<p>Read the rest of this page &raquo;</p>'); ?>
	<?php wp_link_pages(array(
		'before' => '<p><strong>Pages:</strong> ',
		'after' => '</p>',
		'next_or_number' => 'number'));
	?>
</div>
