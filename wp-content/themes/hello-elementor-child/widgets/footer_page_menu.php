<?php

class footer_page_menu extends WP_Widget {

	function __construct() {
		$widget_ops = [ 
			'classname' => 'footer-column col-lg-3 col-md-3 col-sm-12', 
			'description' => esc_html__( 'Footer menu hiện thị trên các page', 'hello-elementor' ),
			'customize_selective_refresh' => true
		];
		parent::__construct( 
			'footer_page_menu',
			esc_html__( '* Footer Menu', 'hello-elementor' ),
			$widget_ops
		);
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title = $instance['title'];
		$menu_id = $instance['menu_id'];
		echo $args['before_widget'];
		?>
			<div class="page-list">
				<div id="nav_menu-2" class="footer-widget  links-widget widget_nav_menu">
					<?php
					if( !empty($title)) {
						echo $args['before_title'] . $title . $args['after_title'];
					}
					?>
					<div class="menu-useful-link-container">
					<?php
					if( $menu_id ) :
						wp_nav_menu( [
							'menu' => $menu_id,
						]);
					endif; ?>
					</div>
				</div>
			</div>                                
		<?php
		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		$instance = [];
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['menu_id'] = ( ! empty( $new_instance['menu_id'] ) ) ? sanitize_text_field( $new_instance['menu_id'] ) : '';
		return $instance;
	}

	function form( $instance ) {
		$defaults = [
			'title' => '',
			'menu_id' => ''
		];
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'hello-elementor' );
		$instance = wp_parse_args($instance, $defaults);
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Tiêu đề', 'hello-elementor' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php Ws247_M_WG::helper_wp_nav_field('menu_id', 'Menu', $this, $instance); ?>
		<?php
	}
}
