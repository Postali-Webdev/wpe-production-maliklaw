<?php
/**
 * Template Name: Blog
 * 
 * @package Postali Child
 * @author Postali LLC
 */

get_header();

$pagination = paginate_links( array(
	'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
    'current'      => max( 1, get_query_var( 'paged' ) ),
    'show_all'     => false,
    'type'         => 'plain',
    'end_size'     => 2,
    'mid_size'     => 1,
    'prev_next'    => true,
    'add_args'     => false,
    'add_fragment' => '',
    'format' => 'page/%#%/',
    'prev_text'    => __( '<span class="arrow-icon" id="prev">&nbsp;</span>', 'textdomain' ),
    'next_text'    => __( '<span class="arrow-icon" id="next">&nbsp;</span>', 'textdomain' )
) );

?>

<div id="page-content">

<section class="page-header simple blue">
	<div class="container">
		<div class="columns">
			<div class="column-full center">
				<div class="spacer-60"></div>
				<h1>Case Results</h1>
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
					<?php echo $pagination; ?> 
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_template_part( 'block', 'pre-footer' ); ?>

</div>

<?php get_footer(); ?>
