<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package doangiuky
 */

?>
<footer class="main-footer">
	<div class="auto-container">
		<div class="upper-box">
			<?php 
			if( is_active_sidebar( 'tp-footer' )) :
				dynamic_sidebar( 'tp-footer' );
			endif;
			?>
		</div>
		<div class="widgets-section">
			<div class="row clearfix">
				<?php 
				if( is_active_sidebar( 'tp-footer1' )) :
					dynamic_sidebar( 'tp-footer1' );
				endif;
				?>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="row clearfix">
				<?php 
				if( is_active_sidebar( 'tp-footer2' )) :
					dynamic_sidebar( 'tp-footer2' );
				endif;
				?>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>

</body>
</html>
