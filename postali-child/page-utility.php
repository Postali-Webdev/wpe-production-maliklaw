<?php
/**
 * Template Name: Utility
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div id="page-content">

    <section class="container breadcrumbs">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
    </section>

    <section class="page-header white">
    <div class="container">
        <div class="columns">
            <div class="column-full center center-children">
                <h1><?php echo get_the_title(); ?></h1>
            </div>
        </div>
    </div>
    </section>

    <section class="panel1">
        <div class="container">
            <div class="columns">
                <div class="column-75 center">
                    <div>
                        <?php echo the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div><!-- #page-content -->

<?php get_footer();?>