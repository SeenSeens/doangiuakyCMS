<?php
class footer_2 extends WP_Widget  {
	function __construct() {
		$widget_ops = [ 
			'classname' => 'upper-box',
			'description' => esc_html__( '', 'hello-elementor' ),
			'customize_selective_refresh' => true
		];
		parent::__construct(
			'footer_2',
			esc_html__( '* Footer-2', 'hello-elementor' ),
			$widget_ops
		);
	}
	function init_repeat_sortable_fields() {
		$arr_fields = [
			'f_repeat_menu' => [
				'type' => 'nav_menu',
				'label' => 'Menu',
				'options' => get_registered_nav_menus()
			]
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
		<div class="widgets-section">
    <div class="row clearfix">
        <!-- Column -->
        <div class="big-column col-lg-6 col-md-12 col-sm-12">
            <div class="row clearfix">
                <!-- Footer Column -->
                <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-widget links-widget">
                        <h6>OUR LOCATION</h6>
                        <div class="menu-community-container">
                            <ul id="menu-community" class="page-list">
                                <li id="menu-item-1335" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1335"><a href="#">Help Center</a></li>
                                <li id="menu-item-1336" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1336"><a href="#">Partners</a></li>
                                <li id="menu-item-1337" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1337"><a href="#">Suggestions</a></li>
                                <li id="menu-item-1338" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1338"><a href="https://themexriver.com/wp/barnix/blog/">Blog</a></li>
                                <li id="menu-item-1339" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1339"><a href="#">Newsletters</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Footer Column -->
                <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-widget links-widget">
                        <h6>OUR SERVICE</h6>
                        <div class="menu-community-container">
                            <ul id="menu-community-1" class="page-list">
                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1335"><a href="#">Help Center</a></li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1336"><a href="#">Partners</a></li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1337"><a href="#">Suggestions</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1338"><a href="https://themexriver.com/wp/barnix/blog/">Blog</a></li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1339"><a href="#">Newsletters</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="big-column col-lg-6 col-md-12 col-sm-12">
            <div class="row clearfix">
                <!-- Footer Column -->
                <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-widget links-widget">
                        <h6>QUICK LINKS</h6>
                        <div class="menu-community-container">
                            <ul id="menu-community-2" class="page-list">
                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1335"><a href="#">Help Center</a></li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1336"><a href="#">Partners</a></li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1337"><a href="#">Suggestions</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1338"><a href="https://themexriver.com/wp/barnix/blog/">Blog</a></li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1339"><a href="#">Newsletters</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Footer Column -->
                <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-widget newslatter-widget">
                        <h6>Newsletter</h6>
                        <div class="text">Exerci tation ullamcorper suscipit lobortis nisl aliquip ex ea commodo</div>
                        <!-- Subscribe Form -->
                        <div class="subscribe-form">
                            <div class="wpcf7 js" id="wpcf7-f1369-o2" lang="en-US" dir="ltr">
                                <div class="screen-reader-response">
                                    <p role="status" aria-live="polite" aria-atomic="true"></p>
                                    <ul></ul>
                                </div>
                                <form action="/wp/barnix/#wpcf7-f1369-o2" method="post" class="wpcf7-form init" aria-label="Contact form" novalidate="novalidate" data-status="init">
                                    <div style="display: none;">
                                        <input type="hidden" name="_wpcf7" value="1369">
                                        <input type="hidden" name="_wpcf7_version" value="5.7.6">
                                        <input type="hidden" name="_wpcf7_locale" value="en_US">
                                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f1369-o2">
                                        <input type="hidden" name="_wpcf7_container_post" value="0">
                                        <input type="hidden" name="_wpcf7_posted_data_hash" value="">
                                    </div>
                                    <div class="form-group">
                                        <p><span class="wpcf7-form-control-wrap" data-name="ftv1-email-103"><input size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Enter your mail" value="" type="email" name="ftv1-email-103"></span><br>
                                            <button type="submit" class="submit-btn"><span class="icon flaticon-send"></span></button>
                                        </p>
                                    </div>
                                    <div class="wpcf7-response-output" aria-hidden="true"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
		<?php
	}	
}
?>