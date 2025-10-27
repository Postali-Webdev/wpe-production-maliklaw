<?php
/**
 * Template Name: Contact
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
            <div class="column-full">
                <h1><?php the_field('page_title'); ?></h1>
            </div>
            <div class="column-full">
                <p><span class="big-red">Phone: </span><a href="tel:<?php the_field('phone', 'option'); ?>"><?php the_field('phone', 'option'); ?></a></p>
            </div>
            <div class="column-full">
                <p><span class="big-red">Fax: </span><a href="fax:<?php the_field('fax', 'option'); ?>"><?php the_field('fax', 'option'); ?></a></p>
            </div>
            <div class="column-full">
                <div>
                <p><span class="big-red">Email: </span><a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a></p>
                <p >We have office locations in:</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="speech-bubble">
    <div class="container">
        <?php get_template_part('block', 'language-bubble'); ?>
    </div>
</section>

<section class="panel1">
    <div class="container">
        <div class="columns">
        <div class="column-full">
                
            </div>
            <div class="column-full">
                <div class="locations-grid">
                    <?php if( have_rows('contact_locations', 'option') ) : while( have_rows('contact_locations', 'option') ) : the_row(); 
                        $location = get_sub_field('location');
                        $clean_location = substr($location, 0, strpos($location, ','));
                        $page_link = get_sub_field('contact_location_page_link');
                        $phone = get_sub_field('phone');
                        $fax = get_sub_field('fax');
                        $email = get_sub_field('email');
                        $address = get_sub_field('street_address') . '<br>' . get_sub_field('city_zipcode') . '<br>' . get_sub_field('state');
                        $address_link = get_sub_field('directions_link');
                        $map = get_sub_field('map_embed');
                    ?>
                        <div class="location-item">
                           <div class="wrapper">
                                
                                <h2><?php echo $location; ?></h2>
                                <div class="line-spacer"></div>
                                <p>Phone: <a href="tel:<?php echo $phone; ?>" title="call us at <?php echo $phone; ?>"><?php echo $phone; ?></a></p>
                                <p>Fax: <a href="fax:<?php echo $fax; ?>" title="fax us at <?php echo $fax; ?>"><?php echo $fax; ?></a></p>
                                <p>Email: <a href="mailto:<?php echo $email; ?>" title="email us at <?php echo $email; ?>"><?php echo $clean_location; echo ($clean_location === "St. Louis" ? " - Head" : ""); ?> Office</a></p>
                                <div class="spacer-15"></div>
                                <div class="location-link">
                                    <div class="columns">
                                        <div class="column-66">
                                            <p><?php echo $address; ?></p>
                                        </div>
                                    </div>
                                    <?php if( have_rows('hours_of_operation') ) : ?>
                                    <div class="spacer-15"></div>
                                    <div class="columns">
                                        <div class="column-66">
                                            <div>
                                                <p>Hours of Operation:</p>
                                                <?php while( have_rows('hours_of_operation') ) : the_row(); ?>
                                                    <p><?php the_sub_field('days_hours_open'); ?></p>
                                                <?php endwhile; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="spacer-15"></div>
                                    <div class="columns">    
                                        <div class="column-66 contact-links">
                                            <a href="<?php echo $address_link; ?>" title="directions to <?php echo $location; ?> office" target="_blank">Directions<span class="dbl-arrows">»</span></a>
                                            <a href="<?php echo $page_link; ?>" title="visit <?php echo $location; ?> page">Visit <?php echo $location; ?> Page<span class="dbl-arrows">»</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="map">
                                <iframe src="<?php echo $map; ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>    
                        </div>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="panel2 white">
    <div class="container">
        <div class="columns">
            <div class="column-full center">
                <h2 class="center-border">Contact Us Using Our Online Form</h2>
            </div>
            <div class="column-full center">
                
            </div>
            <div class="column-50 center">
                <?php $gform = get_field('contact_form', 'option'); echo do_shortcode( $gform ); ?>
            </div>
        </div>
    </div>
</section>


</div><!-- #page-content -->

<?php get_footer();?>