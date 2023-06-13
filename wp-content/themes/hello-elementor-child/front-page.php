<?php get_header(); ?>
<?php
if(is_active_sidebar( 'tp-home' )):
	dynamic_sidebar( 'tp-home' );
endif;
?>
<?php get_footer(); ?>