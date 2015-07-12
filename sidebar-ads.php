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
                        <div class="ad ad-blueprint">
                            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/ad-blueprint.png" height="280" width="281" alt="blueprint"></a>
                        </div>
                        <div class="ad ad-prepper">
                            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/ad-prepper.png" height="108" width="280" alt="prepper"></a>
                        </div>
                    </div>
                </section>
            </div>
            <?php get_template_part('ads', 'sidebar'); ?>
        </section>
