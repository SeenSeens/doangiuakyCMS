<?php

class footer_page_logo extends WP_Widget {

	function __construct() {
		$widget_ops = [ 
			'classname' => 'footer-column col-lg-3 col-md-3 col-sm-12', 
			'description' => esc_html__( '', 'hello-elementor' ),
			'customize_selective_refresh' => true
		];
		parent::__construct( 
			'footer_page_logo',
			esc_html__( '* Footer Column 1 Out Inđex', 'hello-elementor' ),
			$widget_ops
		);
	}

	function widget( $args, $instance ) {
		extract( $args );
		$logo_url = get_field( 'logo', 'widget_' . $widget_id );
		$description = get_field( 'description', 'widget_' . $widget_id );
		$link_facebook =  get_field( 'facebook', 'widget_' . $widget_id);
		$link_twitter =  get_field( 'twitter', 'widget_' . $widget_id);
		$link_linkedin =  get_field( 'linkedin', 'widget_' . $widget_id);
		$link_instagram =  get_field( 'instagram', 'widget_' . $widget_id);
		echo $args['before_widget'];
		?>
			<div class="footer-widget logo-widget">
				<div class="logo">
					<a href="<?php bloginfo('url'); ?>">
						<?php echo wp_get_attachment_image( $logo_url, 'full' ); ?>
					</a>
				</div>
				<div id="text-4" class="footerwidget text widget_text">
					<div class="textwidget">
						<p><?= $description; ?></p>
				</div>
				</div>
				<!-- Social Box -->
				<ul class="social-box">
					<li><a href="<?= $link_facebook; ?>"><i class="fab fa-facebook-f"></i></a></li>
					<li><a href="<?= $link_twitter; ?>"><i class="fab fa-twitter"></i></a></li>
					<li><a href="<?= $link_linkedin; ?>"><i class="fab fa-linkedin-in"></i></a></li>
					<li><a href="<?= $link_instagram; ?>"><i class="fab fa-instagram"></i></a></li>
				</ul>
			</div>
		<?php
		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		$instance = [];
		return $instance;
	}

	function form( $instance ) {

	}
}
