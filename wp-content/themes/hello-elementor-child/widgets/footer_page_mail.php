<?php
class footer_page_mail extends WP_Widget {
	public function __construct(){
		$widget_ops = [
			'classname' => 'footer-column col-lg-3 col-md-3 col-sm-12',
			'description' => esc_html__( '',  'hello-elementor'),
			'customize_selective_refresh' => true
		];
		parent::__construct(
			'footer_page_mail',
			esc_html__( '* Mail Footer Page', 'hello-elementor' ),
			$widget_ops
		);
	}
	public function form( $instance ){
		$defaults = [
			'title' => '',
			'description' => '',
			//'contact_form_id' => ''
		];
		$title = !empty($instance['title']) ? $instance['title'] : esc_html__( '', 'hello-elementor' );
		$description = !empty($instance['description']) ? $instance['description'] : esc_html__( '', 'hello-elementor' );
		// $post_types = 'wpcf7_contact_form';
		// $forms = get_post_types( [
		// 	'name' => $post_types
		// ] );
		$instance = wp_parse_args( $instance, $defaults );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Tiêu đề', 'hello-elementor' ); ?></label>
			<input class="widefat" type="text" name="<?= esc_attr( $this->get_field_name( 'title' ) ); ?>" id="<?= esc_attr( $this->get_field_id( 'title' ) ); ?>" value="<?= esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?= esc_attr( $this->get_field_id( 'description' ) ); ?>"><?= esc_html__( 'Mô tả', 'hello-elementor' ); ?></label>
			<textarea class="widefat" name="<?= esc_attr( $this->get_field_name( 'description' ) ); ?>" id="<?= esc_attr( $this->get_field_id( 'description' ) ); ?>" type="text" rows="10" cols="30"><?= esc_attr( $description ); ?></textarea>
		</p>
		<!-- <p>
			<label for="<?= esc_attr( $this->get_field_id( 'contact_form_id' ) ); ?>"><?= esc_html__( 'Form liên hẹ', 'hello-elementor' ); ?></label>
			<select class="widefat" id="<?= esc_attr( $this->get_field_id( 'contact_form_id' ) ); ?>" name="<?= esc_attr( $this->get_field_name( 'contact_form_id' ) ); ?>">
				<option value="" <?php selected( '', $instance['contact_form_id'] ); ?>><?= esc_html__( '--- Chọn ---', 'hello-elementor' ); ?></option>
				<?php
				/*if($forms) :
					foreach($forms as $form) :
						$form_id = $form->id();
						?>
						<option value="<?= esc_attr($form_id); ?>" <?php selected($form_id, $instance['contact_form_id']); ?>><?= esc_html__($form->title(), 'hello-elementor'); ?></option>
						<?php
					endforeach;
				endif;*/
				?>
			</select>
		</p> -->
		<?php //Ws247_M_WG::helper_contact_form7_field('contact_form_id', 'Form liên hệ', $this, $instance); ?>
		<?php
	}
	public function update( $new_instance, $old_instance) {
		$instance = $old_instance;
    	$instance['title'] = sanitize_text_field($new_instance['title']);
    	$instance['description'] = sanitize_textarea_field($new_instance['description']);
    	$instance['contact_form_id'] = sanitize_text_field($new_instance['contact_form_id']);
    	return $instance;
	}
	public function widget( $args, $instance ) {
		$title = isset($instance['title']) ? $instance['title'] : '';
    	$description = isset($instance['description']) ? $instance['description'] : '';
    	$contact_form_id = isset($instance['contact_form_id']) ? $instance['contact_form_id'] : '';
    	echo $args['before_widget'];
		?>
		    <div id="text-3" class="footer-widget newslatter-widget widget_text">
		    	<?php
		    	if( !empty($title)) {
		    		echo $args['before_title'] . $title . $args['after_title'];
		    	}
		    	?>
		        <div class="textwidget">
		            <p><?php if( !empty($description)) { echo $description; } ?></p>
		            <?php echo do_shortcode( '[contact-form-7 id="1891" title="Footer Mail"]' ); ?>
		        </div>
		    </div>
		<?php
		echo $args['after_widget'];
	}
}
?>