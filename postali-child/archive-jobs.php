<?php
/**
 * Template Name: Blog
 * 
 * @package Postali Child
 * @author Postali LLC
 */

get_header();

?>

<div id="page-content">

<section class="page-header simple blue">
	<div class="container">
		<div class="columns">
			<div class="column-full center">
				<div class="spacer-60"></div>
				<h1>Employment Opportunities</h1>
				<div class="spacer-60"></div>
			</div>
		</div>
	</div>
</section>

<section class="panel1">
	<div class="container">
		<div class="columns">
			<div class="column-full">
				<div class="blog-grid">
					<?php if( have_posts() ) : while( have_posts() ) : the_post(); 
						$date = date( 'F d, y', strtotime(get_the_date()) );
						$link = get_the_permalink();
					?>
						<div class="grid-item ltblue link-hunter">
							<p class="small-blue"><strong>Date Posted:</strong>  <?php esc_html_e($date); ?></p>
							<h2><a href="<?php esc_html_e( $link ); ?>" title="<?php esc_html_e( get_the_title() ); ?>"><?php esc_html_e( get_the_title() ); ?></a></h2>
						</div>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_template_part( 'block', 'pre-footer' ); ?>

</div>

<?php get_footer(); ?>
