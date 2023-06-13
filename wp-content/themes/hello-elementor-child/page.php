<?php get_header('page'); ?>
<section class="page-title">
	<div class="auto-container">
		<div class="content">
			<?php the_title( '<h2>', '</h2>' ); ?>
			<!-- Button Box -->
			<div class="button-box">
				<a href="<?php the_permalink(); ?>" class="theme-btn btn-style-eleven clearfix">
					<span class="btn-wrap">
						<span class="text-one">Get started now</span>
						<span class="text-two">Get started now</span>
					</span>
				</a>
			</div>
			<!-- End Button Box -->
		</div>
	</div>
</section>
<?php
while( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/content', 'page' );
endwhile;
?>
<?php get_footer( 'page' ); ?>