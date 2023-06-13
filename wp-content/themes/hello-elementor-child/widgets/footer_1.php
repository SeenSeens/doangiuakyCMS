<?php
class footer_1 extends WP_Widget {
	function __construct() {
		$widget_ops = [ 
			'classname' => 'upper-box',
			'description' => esc_html__( '', 'hello-elementor' ),
			'customize_selective_refresh' => true
		];
		parent::__construct(
			'footer_1',
			esc_html__( '* Footer-1', 'hello-elementor' ),
			$widget_ops
		);
	}
	function init_repeat_sortable_fields() {
		$arr_fields = [
			'f_repeat_image' => array('type'=>'image', 'label' => 'Hình'),
		];
		return $arr_fields;
	}
	function form( $instance ) {
		$defaults = [
			'title' => '',
			'wle_repeat_sortable_data_1' => ''
		];
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'hello-elementor' );
		$instance = wp_parse_args($instance, $defaults);
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Tiêu đề', 'hello-elementor' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<!-- Repeat field -->
		<?php
		$id_field = 'wle_repeat_sortable_data_1'; 
		wpshare247_repeat_sortable::register_field($id_field, esc_attr($this->get_field_name($id_field)), 'Lặp lại và Sắp xếp thứ tự', $instance, $this->init_repeat_sortable_fields());

	}
	function update( $new_instance, $old_instance ) {
		$instance = [];
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? $new_instance['title'] : '';
		if (!empty($new_instance['wle_repeat_sortable_data_1'])) {
			$instance['wle_repeat_sortable_data_1'] = ($new_instance['wle_repeat_sortable_data_1']);
		}
		return $instance;
	}
	function widget( $args, $instance ) {
		extract( $args );
		$defaults = [
			'title'=>'',
			'description' => '',
			'wle_repeat_sortable_data_1' => '' ];
		$title = $instance['title'];
		$data_field = $instance['wle_repeat_sortable_data_1']; 
		$arr_data = json_decode($data_field,true);
		?>
		<div class="upper-box">
			<div class="row clearfix">
				<!-- Title Column -->
				<div class="title-column col-lg-6 col-md-12 col-sm-12">
					<?php
					if( !empty($title)) {
						echo '<h3>' . $title . '</h3>';
					}
					?>
				</div>
				<!-- Gallery Column -->
				<div class="gallery-column col-lg-6 col-md-12 col-sm-12">
					<div class="gallery-outer d-flex justify-content-between align-items-right">
						<?php
						if( $arr_data ):
							foreach($arr_data as $k => $arr_item) :
								$f_repeat_image_url = $arr_item['f_repeat_image']['val'];
						?>
						<div class="insta-gallery">
							<img src="<?= $f_repeat_image_url; ?>" class="attachment-full size-full " alt="" decoding="async" loading="lazy">
							<div class="overlay-box">
								<div class="overlay-inner">
									<a class="lightbox-image icon flaticon-instagram" href="<?= $f_repeat_image_url; ?>"></a>
								</div>
							</div>
						</div>
						<?php
							endforeach;
						endif; 
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}	
}
?>