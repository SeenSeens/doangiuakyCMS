<?php
class main_slider extends WP_Widget {
	function __construct() {
		$widget_ops = [ 
			'classname' => '',
			'description' => esc_html__( 'Slider đầu trang ở trang chủ', 'hello-elementor' ),
			'customize_selective_refresh' => true
		];
		parent::__construct(
			'main_slider',
			esc_html__( '* Slider Header Main', 'hello-elementor' ),
			$widget_ops
		);
	}

	function init_repeat_sortable_fields() {
		$arr_fields = [
			'f_repeat_image' => [ 'type'=>'image', 'label' => 'Ảnh' ],
			'f_repeat_title' => [ 'type' => 'text', 'label' => 'Tiêu đề ảnh' ],
			'f_repeat_des' => [ 'type' => 'text', 'label' => 'Mô tả ngắn' ],
			'f_repeat_textButton' => [ 'type' => 'text', 'label' => 'Text Button' ]
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
			'wle_repeat_sortable_data_1' => ''
		];
		$data_field = $instance['wle_repeat_sortable_data_1']; 
		$arr_data = json_decode($data_field,true);
		if( $arr_data ):
		?>
		<!-- Main Section -->
		<section class="main-slider">
			<div class="container mxw_1645">
				<div class="main-slider-carousel owl-carousel owl-theme">
					<!-- Slide One -->
					<?php
					if( $arr_data ) :
						foreach ($arr_data as $key => $value) :
							$f_repeat_image = $value['f_repeat_image']['val'];
							$f_repeat_title = $value['f_repeat_title']['val'];
							$f_repeat_des = $value['f_repeat_des']['val'];
							$f_repeat_textButton = $value['f_repeat_textButton']['val'];
					?>
					<div class="slide">
						<div class="image-layer" style="background-image: url(<?= $f_repeat_image ?>)"></div>
						<!-- Content Boxed -->
						<div class="content-boxed">
							<div class="inner-box" style="background-image: url(http://localhost:8080/branix/wp-content/uploads/2023/05/pattern-1.png)" >
								<div class="content">
									<h1><?= $f_repeat_title; ?></h1>
									<div class="text"><?= $f_repeat_des; ?></div>
									<div class="btns-box">
										<a href="" class="theme-btn btn-style-one clearfix">
											<span class="btn-wrap">
												<span class="text-one"><?= $f_repeat_textButton; ?></span>
												<span class="text-two"><?= $f_repeat_textButton; ?></span>
											</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
						endforeach;
					endif;
					?>
				</div>
			</div>
			<!-- Social Box -->
			<ul class="social-box">
				<li><a href="#"><i aria-hidden="true" class="fab fa-facebook-f"></i> <span>Facebook</span></a></li>
				<li><a href="#"><i aria-hidden="true" class="fab fa-youtube"></i> <span>Youtube</span></a></li>
				<li><a href="#"><i aria-hidden="true" class="fab fa-twitter"></i> <span>Twitter</span></a></li>
				<li><a href="#"><i aria-hidden="true" class="fab fa-linkedin-in"></i> <span>Linkedin</span></a></li>
			</ul>
			<!-- End Social Box -->
			<!-- Scroll Box -->
			<div class="scroll-box scroll-to-target" data-target=".info-section">
				<a href="#service"><span class="icon flaticon-mouse"></span>Scrool Down</a>
			</div>
			<!-- End Scroll Box -->
		</section>
		<!-- End Main Section -->
		<script>
			jQuery(document).ready(function($) {
				$('.main-slider-carousel').owlCarousel({
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
							items: 1
						},
						1024: {
							items: 1
						},
						1200: {
							items: 1
						},
						1600: {
							items: 1
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