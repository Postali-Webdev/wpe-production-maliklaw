<?php
/**
 * Template Name: Practice Area – Parent
 * @package Postali Child
 * @author Postali LLC
**/
get_header();
$featured_image = get_the_post_thumbnail_url();
?>
<div id="page-content">
<section class="page-header blue" style="background-image: url('<?php echo $featured_image ? $featured_image : '/wp-content/uploads/2022/03/homepage-header.jpg'; ?>')">
    <div class="container">
        <div class="columns">
            <div class="column-50 center column-vertical center-children">
                <div class="spacer-90"></div>
                <span class="pa-icon small"><img src="<?php the_field('small_icon'); ?>" alt="<?php the_field('short_title'); ?> icon"></span>
                <div class="spacer-15"></div>
                <h1><?php the_field('page_title'); ?></h1>
                <p class="centered"><?php the_field('page_intro'); ?></p>
                <span class="spacer-15"></span>
                <a class="btn" href="tel:<?php the_field('phone', 'options'); ?>" title="Call American Immigration Law Group"><?php the_field('phone', 'options'); ?></a>
                <div class="spacer-90"></div>
            </div>
        </div>
        <div class="columns row-2">
            <?php get_template_part('block', 'language-bubble'); ?>
        </div>
    </div>
</section>

<section class="panel1 white" style="background-image:url('');">
    <img src="<?php the_field('small_icon'); ?>" alt="<?php echo the_field('short_title'); ?>" class="bg-icon" />
    <div class="container">
        <div class="columns">
            <div class="column-50 center">
                <div>
                    <h2><?php the_field('p1_title'); ?></h2>
                    
                    <?php the_field('p1_content'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Client has requested to remove these for now - we may add them back later -->
<!-- <section class="panel2 white">
    <div class="container extended">
        <div class="columns">
            <div class="column-full">
                <?php //get_template_part( 'block', 'testimonials' ); ?>
            </div>
        </div>
    </div>
</section> -->

<section class="panel3 white">
    <div class="container">
        <div class="columns">
            <div class="column-50 center">
                <h2><?php the_field('p3_title'); ?></h2>
                <?php the_field('p3_content'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part( 'block', 'pre-footer' ); ?>

</div><!-- #page-content -->

<?php get_footer();?>