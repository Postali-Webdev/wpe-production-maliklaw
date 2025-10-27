<?php
$object = get_queried_object();
$cat = $object->name; 
$base_slug = 'blog';

if ( is_post_type_archive('results') || is_tax('case-category') ) {
	$base_slug = '/case-results/case-category/';
	$archive_slug = '/case-results/';
	$taxonomy = 'case-category';
} else {
	$base_slug = '/blog/category/';
	$archive_slug = '/blog/';
	$taxonomy = 'category';
}


?>

<div id="app-cover">
	<div id="select-box">
		<input type="checkbox" id="options-view-button">
		<div id="select-button" class="brd">
			<div id="selected-value">
				<span class="filter-holder"><strong>Category:</strong> <?php echo ($cat === "results" || $cat === "" ? "All" : $cat); ?></span>
			</div>
			<div id="chevrons">
				<span class="icon-tick-down"></span>
			</div>
		</div>
		<div id="options">
		<?php if( $terms = get_terms( array(
			'taxonomy' => $taxonomy, 
			'orderby' => 'name'
		) ) ) : ?>
			<div class="option">
				<a href="<?php esc_html_e($archive_slug); ?>">All Posts</a>
			</div>
			<?php foreach ( $terms as $term ) : ?>
				<div class="option">
					<a href="<?php esc_html_e($base_slug); ?><?php echo $term->slug; ?>/"><?php echo $term->name; ?></a>
				</div>
			<?php endforeach; ?>
			<?php endif; ?>
			<div id="option-bg"></div>
		</div>
	</div>
</div> 