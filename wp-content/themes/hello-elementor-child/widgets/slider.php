<?php
class slider extends WP_Widget {
	function __construct() {
		$widget_ops = [ 
			'classname' => '',
			'description' => esc_html__( 'Slider ở trang chủ', 'hello-elementor' ),
			'customize_selective_refresh' => true
		];
		parent::__construct(
			'slider',
			esc_html__( '* Slider', 'hello-elementor' ),
			$widget_ops
		);
	}
	function init_repeat_sortable_fields() {
		$arr_fields = [
			'f_repeat_image' => [ 'type'=>'image', 'label' => 'Ảnh' ],
			'f_repeat_title' => [ 'type' => 'text', 'label' => 'Tiêu đề ảnh' ],
			'f_repeat_cat' => [ 'type' => 'text', 'label' => 'Chuyên mục' ],
			'f_repeat_icons' => [ 'type' => 'text', 'label' => 'Icons' ]
		];
		return $arr_fields;
	}
	function form( $instance ) {
		$defaults = [
			'wle_repeat_sortable_data_1' => ''
		];
		
		$instance = wp_parse_args($instance, $defaults);
		?>
		<!-- Repeat field -->
		<?php
		$id_field = 'wle_repeat_sortable_data_1'; 
		wpshare247_repeat_sortable::register_field($id_field, esc_attr($this->get_field_name($id_field)), 'Lặp lại và Sắp xếp thứ tự', $instance, $this->init_repeat_sortable_fields());

	}
	function update( $new_instance, $old_instance ) {
		$instance = [];
		if (!empty($new_instance['wle_repeat_sortable_data_1'])) {
			$instance['wle_repeat_sortable_data_1'] = ($new_instance['wle_repeat_sortable_data_1']);
		}
		return $instance;
	}
	function widget( $args, $instance ) {
		extract( $args );
		$defaults = [
			'wle_repeat_sortable_data_1' => '' ];
		$data_field = $instance['wle_repeat_sortable_data_1']; 
		$arr_data = json_decode($data_field,true);
		if( $arr_data ):
		?>
		<section class="projects-section">
			<div class="outer-container">
				<div class="services-carousel owl-carousel owl-theme">
					<?php
					foreach ($arr_data as $key => $value) :
						$f_repeat_image = $value['f_repeat_image']['val'];
						$f_repeat_title = $value['f_repeat_title']['val'];
						$f_repeat_cat = $value['f_repeat_cat']['val'];
						$f_repeat_icons = $value['f_repeat_icons']['val'];
						?>
							<div class="project-block">
								<div class="inner-box">
									<div class="image">
										<img loading="lazy" src="<?= $f_repeat_image; ?>" class="wp-post-image" alt="" decoding="async"/>
										<div class="overlay-box">
											<div class="content">
												<h4>
													<a href=""><?= $f_repeat_title; ?></a>
												</h4>
												<div class="title"><?= $f_repeat_cat?></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php
					endforeach;
					?>
				</div>
			</div>
		</section>
		<script>
			jQuery(document).ready(function($) {
				$('.services-carousel').owlCarousel({
					loop:true,
					margin:0,
					nav: true,
					dots: false,
					autoplay: true,
					autoplayTimeout: 1000,
					autoplayHoverPause: true,
					autoplaySpeed: 1000,
					navSpeed: 1000,
					dotsSpeed: 1000,
					lazyLoad: true,
					responsiveClass:true,
					smartSpeed: 700,
					responsive:{
						0: {
							items: 1
						},
						480: {
							items: 1
						},
						768: {
							items: 2
						},
						1024: {
							items: 3
						},
						1200: {
							items: 4
						},
						1600: {
							items: 4
						}
					},
				});
			});
		</script>
		<?php
		endif;
	}	
}
?>