<?php
/**
 * Template Name: Practice Areas
 * @package Postali Child
 * @author Postali LLC
**/
//global
$terms = 4;
//st. louis
if( is_tree(79) ) {
	$terms = 28;
//fresno
} elseif( is_tree(93) ) {
    //set terms when pages are ready and taxonomy is created
//indianapolis    
} elseif( is_tree(96) ) {
	//set terms when pages are ready and taxonomy is created
}

$args = array(
    'posts_per_page'         => '-1',
    'order'                  => 'DESC',
    'orderby'                => 'menu_order',
    'post_type'              => 'page',
    'tax_query'              => array(
        'relation' => 'OR',
        array(
            'post_type'        => 'page',
            'taxonomy'         => 'page_type',
            'terms'            => $terms,
            'include_children' => true,
        ),
    )
);
$query = new WP_Query($args);
get_header();?>

<div id="page-content">
<section class="page-header simple blue">
    <div class="container">
        <div class="columns">
            <div class="column-full center">
                <div class="spacer-60"></div>
                <h1><?php the_field('page_title'); ?></h1>
                <div class="spacer-60"></div>
            </div>
        </div>
    </div>
</section>

<section class="panel1 white">
    <div class="container extended">
        <div class="columns">
            <div class="column-50 center">
                <div>
                    <h2><?php the_field('p1_title'); ?></h2>
                    
                    <p><?php the_field('p1_intro'); ?></p>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column-full">
                <?php if ($query->have_posts()): ?>
                <div class="practice-areas">
                    <?PHP while ($query->have_posts()): $query->the_post(); 
                        $title = get_field('short_title');
                        $icon = get_field('small_icon');?>
                        <div class="practice-area card link-hunter">
                            <img src="<?php echo esc_url($icon); ?>" alt="<?php the_field('short_title'); ?> icon" />
                            <div class="spacer-15"></div>
                            <a href="<?php the_permalink(); ?>" title="Learn more about <?php echo $title; ?>"><h3><?php echo $title; ?></h3></a>
                        </div> 
                    <?php endwhile; ?>
                </div>
                <?php endif;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part( 'block', 'pre-footer' ); ?>

</div><!-- #page-content -->

<?php get_footer();?>