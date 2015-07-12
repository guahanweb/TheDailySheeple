<?php
/**
 *
 */

get_header(); ?>
	<section class="column column-triple" id="main-column">
		<div class="container">
			<section class="column column-one-third left-column">
				<header><h1>Left Column</h1></header>
			</section>
			<section class="column column-two-third">
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
get_sidebar('ads');
get_footer();
