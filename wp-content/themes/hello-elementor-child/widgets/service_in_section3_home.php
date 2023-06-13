<?php
class service_in_section3_home extends WP_Widget {
	function __construct() {
		$widget_ops = [ 
			'classname' => 'services-section',
			'description' => esc_html__( 'Section 2 hiển thị trên trang chủ', 'hello-elementor' ),
			'customize_selective_refresh' => true
		];
		parent::__construct(
			'service_in_section3_home',
			esc_html__( '* Services trên section 3 ngoài trang chủ', 'hello-elementor' ),
			$widget_ops
		);
	}
	function init_repeat_sortable_fields() {
		$arr_fields = [
			'f_repeat_text_icon' =>[ 'type'=>'textarea', 'label' => 'Icons'],
			'f_repeat_text1' =>[ 'type'=>'text', 'label' => 'Tiêu đề'],
			'f_repeat_textarea' => ['type'=>'textarea', 'label' => 'Đoạn mô tả'],
		];
		return $arr_fields;
	}
	function form( $instance ) {
		$defaults = [
			'title' => '',
			'description' => '',
			'wle_repeat_sortable_data_1' => ''
		];
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'hello-elementor' );
		$description = ! empty( $instance['description'] ) ? $instance['description'] : esc_html__( '', 'hello-elementor' );
		$instance = wp_parse_args($instance, $defaults);
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Tiêu đề', 'hello-elementor' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php echo esc_html__( 'Đoạn mô tả ngắn', 'hello-elementor' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $description ); ?></textarea>
		</p>
		<!-- Repeat field -->
		<?php
		$id_field = 'wle_repeat_sortable_data_1'; 
		wpshare247_repeat_sortable::register_field($id_field, esc_attr($this->get_field_name($id_field)), 'Lặp lại và Sắp xếp thứ tự', $instance, $this->init_repeat_sortable_fields());

	}
	function update( $new_instance, $old_instance ) {
		$instance = [];
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['description']  = ( ! empty( $new_instance['description'] ) ) ? $new_instance['description'] : '';
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
		$description = $instance['description'];
		$data_field = $instance['wle_repeat_sortable_data_1']; 
		$arr_data = json_decode($data_field,true);
		?>
		<section class="strategy-section">
			<div class="auto-container">
				<div class="row clearfix">
					<!-- Title Box -->
					<div class="title-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<?php 
							if( !empty($title)) {
								echo $args['before_title'] . $title . $args['after_title'];
							}
							?>
							<p>
								<?php
								if( !empty($description)) {
									echo $description;
								}
								?>
							</p>
							<a class="more-service" href="">See Our Solution <span class="flaticon-next-2"></span></a>
						</div>
					</div>
					<!-- Block Box -->
					<div class="blocks-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="row clearfix">
								<!-- Service Block Two -->
								<?php 
								if($arr_data) {
									foreach($arr_data as $k => $arr_item) {
										$f_repeat_text_icon = $arr_item['f_repeat_text_icon']['val'];
										$f_repeat_text1 = $arr_item['f_repeat_text1']['val'];
										$f_repeat_textarea = $arr_item['f_repeat_textarea']['val'];
								?>
								<div class="service-block-two col-lg-6 col-md-6 col-sm-12">
									<div class="inner-box wow fadeInLeft animated">
										<div class="icon">
											<?php echo $f_repeat_text_icon;?>
										</div>
										<h5><a href=""><?php echo $f_repeat_text1;?></a></h5>
										<div class="text">
											<?php echo $f_repeat_textarea; ?>
										</div>
									</div>
								</div>
								<?php
									}
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
}	
}
?>