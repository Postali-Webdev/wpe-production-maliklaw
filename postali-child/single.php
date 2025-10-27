<?php
/**
 * Single Post
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div id="page-content">
<?php if( have_posts() ) : while( have_posts() ) : the_post();
    foreach( get_the_category() as $cat ) {
        $category = $cat->name;
    }
?>
    <section class="page-header">
            <div class="columns">
                <div class="column-50 ltblue">
                    <div class="container">
                        <div class="column-75 title-wrapper">
                            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                            <div class="spacer-60"></div>
                            <div class="date-cat">
                                <p class="date"><?php esc_html_e(get_the_date()); ?></p>
                                <p class="post-cat"><strong>CATEGORY: </strong><?php echo $category; ?></p>
                            </div>
                            <h1><?php echo get_the_title(); ?></h1>
                        </div>
                    </div>
                </div>
                <div class="column-50 featured-post-image" style="background-image: url('<?php echo ( get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : '/wp-content/uploads/2022/03/blog-generic.jpg' ); ?>');"></div>
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
    
    <section class="panel2">
        <div class="container">
            <div class="columns">
                <div class="column-full center">
                    <?php get_template_part('block', 'related-posts'); ?>
                </div>
            </div>
        </div>
    </section>
    <?php echo get_template_part('block', 'pre-footer'); ?>
<?php endwhile; endif; ?>
</div><!-- #page-content -->

<?php get_footer();?>