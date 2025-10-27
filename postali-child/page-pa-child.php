<?php
/**
 * Template Name: Practice Area – Child
 * @package Postali Child
 * @author Postali LLC
**/

$parent_id = wp_get_post_parent_id();
$parent_link = get_the_permalink($parent_id);
$parent_title = get_the_title($parent_id);
get_header();?>

<div id="page-content">

<section class="container breadcrumbs">
    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
</section>

<section class="page-header white">
    <div class="container">
        <div class="columns">
            <div class="column-50 center">
                <div class="spacer-60"></div>
                <h1><?php the_field('title'); ?></h1>
                <p class="centered"><?php the_field('intro'); ?></p>
                <div class="spacer-60"></div>
            </div>
        </div>
    </div>
</section>

<section class="panel1 white">
    <div class="container">
        <div class="columns">
            <div class="column-50 center">
                <div>
                    <a href="<?php echo $parent_link; ?>" class="return-link" title="Back to <?php echo $parent_title; ?>">« Back to <?php echo $parent_title; ?></a>
                    <div class="spacer-45"></div>
                    <?php the_field('main_content'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part( 'block', 'pre-footer' ); ?>

</div><!-- #page-content -->

<?php get_footer();?>