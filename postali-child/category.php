<?php
/**
 * Template Name: Category
 * 
 * @package Postali Child
 * @author Postali LLC
 */

$term = get_queried_object();
$tax = $term->taxonomy;
$tax_name = $term->name;
$args = array (
	'post_type' => 'post',
	'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
	'post_per_page' => '9',
	'post_status' => 'publish',
	'order' => 'DESC',
	'tax_query'         => [
        ['taxonomy' => $tax,            
        'field' => 'slug',
        'terms' => $tax_name],
    ],
);
$the_query = new WP_Query($args);

get_header(); ?>

<div id="page-content">

<section class="page-header simple blue">
	<div class="container">
		<div class="columns">
			<div class="column-full center">
				<div class="spacer-60"></div>
				<h1>Legal Blog<?php //the_field('page_title'); ?></h1>
				<div class="spacer-60"></div>
			</div>
		</div>
	</div>
</section>

<section class="panel1">
	<div class="container">
		<div class="columns">
			<div class="column-full">
				<?php get_template_part('block', 'category-select'); ?>
				<div class="blog-grid">
					<?php if( have_posts() ) : while( have_posts() ) : the_post(); 
						$date = date( 'F d, y', strtotime(get_the_date()) );
						$link = get_the_permalink();
						foreach( get_the_category() as $cat) {
							$category = $cat->name;
						}
					?>
						<div class="grid-item ltblue link-hunter">
							<p class="small-blue"><?php esc_html_e($date); ?></p>
							<h2><a href="<?php esc_html_e( $link ); ?>" title="<?php esc_html_e( get_the_title() ); ?>"><?php esc_html_e( get_the_title() ); ?></a></h2>
							<p class="blog-cat"><strong>Category: </strong><?php esc_html_e($category); ?></p>
						</div>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
		<div class="columns">
			<div class="column-full">
				<div class="pagination">
					<?php
						$total_pages = $the_query->max_num_pages;
						if ($total_pages > 1) {
							$current_page = max(1, get_query_var('paged'));
							echo paginate_links(array(
								'base' => get_pagenum_link(1) . '%_%',
								'format' => 'page/%#%/',
								'current' => $current_page,
								'total' => $total_pages,
								'prev_text'    => __( '<span class="arrow-icon" id="prev">&nbsp;</span>', 'textdomain' ),
								'next_text'    => __( '<span class="arrow-icon" id="next">&nbsp;</span>', 'textdomain' )
							));
						}    
					wp_reset_postdata(); ?> 
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_template_part( 'block', 'pre-footer' ); ?>

</div>

<?php get_footer(); ?>
