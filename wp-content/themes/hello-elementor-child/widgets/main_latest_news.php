<?php
class main_latest_news extends WP_Widget {
	function __construct() {
		$widget_ops = [ 
			'classname' => 'news-section',
			'description' => esc_html__( 'Hiện thị các bài viết mới ở trang chủ', 'hello-elementor' ),
			'customize_selective_refresh' => true
		];
		parent::__construct(
			'main_latest_news',
			esc_html__( '* Latest News Blog ', 'hello-elementor' ),
			$widget_ops
		);
	}
	function form( $instance ) {
		$defaults = [
			'title' => '',
			'description' => '',
			'categories' => '',
			'number' => ''
		];
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'hello-elementor' );
		$description = ! empty( $instance['description'] ) ? $instance['description'] : esc_html__( '', 'hello-elementor' );
		$categories = ! empty( $instance['categories'] ) ? $instance['categories'] : esc_html__( '', 'hello-elementor' );
		$number    = isset($instance['number']) ? absint($instance['number']) : 3;
		$instance = wp_parse_args($instance, $defaults);
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Tiêu đề', 'hello-elementor' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'categories' ) ); ?>"><?php echo esc_html__( 'Chuyên mục', 'hello-elementor' ); ?></label>
			<select name="<?= $this->get_field_id('categories'); ?>" id="<?= $this->get_field_id('categories'); ?>" style='width:50%;margin-left:5px'>
				<option value="">Bất kỳ</option>
				<?php
				$taxonomy     = 'category';
				$orderby      = 'name';
				$show_count   = 0;
				$pad_counts   = 0;
				$hierarchical = 1;
				$title        = '';
				$empty        = 0;
				$args = array(
					'taxonomy'     => $taxonomy,
					'orderby'      => $orderby,
					'show_count'   => $show_count,
					'pad_counts'   => $pad_counts,
					'hierarchical' => $hierarchical,
					'title_li'     => $title,
					'hide_empty'   => $empty
				);
				$all_categories = get_categories($args);
				foreach ($all_categories as $cat) {
					$sl = "";
					if ($cat->term_id == $categories) {
						$sl = "selected";
					}
					echo "<option value=\"" . $cat->term_id . "\" $sl>" . $cat->name . "</option>";
				}
				?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php echo esc_html__( 'Số bài viết', 'hello-elementor' ); ?></label>
			<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>">
		</p>
		<?php
	}
	function update( $new_instance, $old_instance ) {
		$instance = [];
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['categories'] = $_POST[$this->get_field_id('categories')];
		$instance['number']    = (int)$new_instance['number'];
		return $instance;
	}
	function widget( $args, $instance ) {
		extract( $args );
		$title = $instance['title'];
		$description = get_field( 'mo_ta', 'widget_' . $widget_id);
		$categories = $instance['categories'];
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 4;
		$query = new WP_Query( [
			'post_type' => 'post',
			'post_status' => 'publish',
			'taxonomy' => 'category',
			'posts_per_page' => $number,
			'cat' => $categories
		] );
		echo $args['before_widget'];
		?>
			<div class="auto-container">
				<div class="row clearfix">
					<!-- Title Column -->
					<div class="title-column col-lg-4 col-md-12 col-sm-12">
						<div class="inner-column">
							<!-- Sec Title -->
							<div class="sec-title">
								<?php 
								if( !empty( $title )) :
									echo $args['before_title'] . $title . $args['after_tỉtle'];
								endif;
								?>
								<div class="text">
								 <?= $description; ?>                       
								</div>
							</div>
							<div class="button-box">
								<a href="" class="theme-btn btn-style-two">
									<span class="btn-wrap">
										<span class="text-one">More Blog</span>
										<span class="text-two">More Blog</span>
									</span>
								</a>
							</div>
						</div>
					</div>
					<!-- Blocks Column -->
					<div class="blocks-column col-lg-8 col-md-12 col-sm-12">
						<div class="inner-column">
							<?php
							
							if($query->have_posts()) :
								while($query->have_posts()) :
									$query->the_post();
							?>
							<!-- News Block -->
							<div class="news-block">
								<div class="inner-box d-flex justify-content-between">
									<!-- Info Box -->
									<div class="news-info-box">
										<div class="author-image">
											<?php
											// Lấy ID tác giả hiện tại
											$author_id = get_the_author_meta( 'ID' );
											// Lấy URL ảnh đại diện của tác giả
											$author_avatar = get_avatar_url( $author_id );
											?>
											<img alt="" src="<?= $author_avatar; ?>" class="avatar photo" height="62" width="62" loading="lazy" decoding="async">									
										</div>
										<div class="author-name">By: <span><?php the_author(); ?></span></div>
										<div class="post-time"><?php the_modified_date(); ?></div>
									</div>
									<!-- Middle Content -->
									<div class="middle-content">
										<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
										<div class="text"><?php the_excerpt(); ?></div>
									</div>
									<div class="read-more">
										<a class="more-service" href="<?php the_permalink(); ?>">Read More <span class="flaticon-next-2"></span></a>
									</div>
								</div>
							</div>
							<?php
								endwhile;
								wp_reset_postdata();
							endif;
							wp_reset_query();
							?>
						</div>
					</div>
				</div>
			</div>
		<?php
		echo $args['after_widget'];
	}	
}

?>