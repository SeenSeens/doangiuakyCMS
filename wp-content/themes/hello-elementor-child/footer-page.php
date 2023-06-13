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
<footer class="footer-style-two style-two">
	<div class="auto-container">
		<div class="widgets-section">
			<div class="row clearfix">
				<?php
				if( is_active_sidebar( 'tp-footer-page' )) :
					dynamic_sidebar( 'tp-footer-page' );
				endif;
				?>
			</div>
			
		</div>
		<div class="footer-bottom"></div>
	</div>
</footer>
<?php wp_footer(); ?>

</body>
</html>
