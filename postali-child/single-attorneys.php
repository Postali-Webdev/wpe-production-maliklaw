<?php
/**
 * Attorneys Single Post
 * @package Postali Child
 * @author Postali LLC
**/
get_header();
foreach ( get_the_terms( get_the_ID(), 'role' ) as $tax ) {
    $role = ( $tax->name );
}
?>

<div id="page-content">

<section class="container breadcrumbs">
    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
</section>

<?php if( have_posts()) : while( have_posts() ) : the_post(); ?>
<section class="panel1 liberty-left">
    <span class="page-header white"></span>
    <div class="container">
        <div class="columns">
            <div class="column-50 img-container">
                <div class="attorney-headshot" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
            </div>
            <div class="column-50">
                <div>
                    <h1><?php echo get_the_title();?></h1>
                    <p class="big-red"><?php esc_html_e($role); ?></p>
                    <div class="attorney_socials">
                        <?php if( have_rows('contact_info') ) : while( have_rows('contact_info') ) : the_row(); 
                            $icon = get_sub_field('icon');
                            $social = get_sub_field('social_media');
                            $link = get_sub_field('social_link');
                            
                        ?>
                        <a href="<?php echo $link; ?>" target="_blank" title="<?php echo $social; ?> link" class="attorney-social" style="background-image:url('<?php echo $icon['url']; ?>');"></a>
                        <?php endwhile; endif; ?>
                    </div>
                    <div><?php echo the_content(); ?></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="panel2 ltblue">
    <div class="container">
        <div class="columns">
            <div class="column-full">
                <div class="bio-grid">
                    <?php if( have_rows('bio_sections') ) : while( have_rows('bio_sections') ) : the_row(); 
                    $section_title = get_sub_field('bio_section_title');
                    $section_content = get_sub_field('bio_section_content');?>
                        <div class="bio-grid_item">
                            <h2><?php echo $section_title; ?></h2>
                            
                            <div><?php echo $section_content; ?></div>
                        </div>

                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php endwhile; endif; wp_reset_postdata( ); ?>

<?php get_template_part( 'block', 'pre-footer' ); ?>

</div><!-- #page-content -->

<?php get_footer();?>