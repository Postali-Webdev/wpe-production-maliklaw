<?php
/**
 * Template Name: Locations
 * @package Postali Child
 * @author Postali LLC
**/
get_header();
?>

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
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <div class="locations-grid">
                        <?php if( have_rows('contact_locations', 'option') ) : while( have_rows( 'contact_locations', 'option' ) ) : the_row();
                            $name = get_sub_field('location');
                            $clean_name = substr($name, 0, strpos($name, ','));
                            $icon = get_sub_field('contact_location_icon');
                            $page_link = get_sub_field('contact_location_page_link');
                        ?>
                        <div class="location-item link-hunter">
                            <div class="icon" style="background-image: url('<?php echo $icon['url']; ?>');"></div>
                            <h2><a href="<?php echo $page_link; ?>"><?php echo $clean_name; ?></a></h2>
                        </div>
                        <?php endwhile; endif;?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part( 'block', 'pre-footer' ); ?>

</div><!-- #page-content -->

<?php get_footer();?>