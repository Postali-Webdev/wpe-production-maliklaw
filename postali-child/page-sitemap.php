<?php
/**
 * Template Name: Sitemap
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
            <div class="column-50">
                <h2>Pages</h2> 
                <div class="spacer-30"></div>
                <ul>
                    <?php wp_list_pages("title_li=" ); ?>
                </ul> 
            </div>
            <div class="column-50">
                <h2>Blog Posts</h2> 
                <div class="spacer-30"></div>
                <ul>
                    <?php wp_get_archives('type=postbypost'); ?>
                </ul>
            </div>
        </div>
    </div>
</section>

</div><!-- #page-content -->

<?php get_footer();?>