<?php
/**
 * Template Name: Homepage
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

$args = [
    'post_type' => 'attorneys',
    'orderby'   => 'date',
    'order' => 'asc',
    'tax_query'  => [[
        'taxonomy' => 'role',
        'field' =>  'term_id',
        'terms' => 20,
    ]]
];
$attorney_query = new WP_Query($args);
$numb_attorneys = $attorney_query->found_posts;
    ?>
<div id="page-content">
<section class="page-header blue">
    <div class="container">
        <div class="columns column-vertical center-children">
            <div class="column-75 column-vertical center center-children">
                <div class="spacer-90"></div>
                <span class="red-star"></span>
                <div class="spacer-15"></div>
                <h1><?php the_field('page_title'); ?><span class="red">.</span></h1>
                <div class="spacer-30"></div>
                <p class="centered header-intro"><?php the_field('page_intro'); ?></p>
                <div class="spacer-15"></div>
                <p class="centered header-intro">Contact American Immigration Law Group</p>
                <div class="spacer-15"></div>
                <a class="btn" href="tel:<?php the_field('phone', 'options'); ?>" title="Call American Immigration Law Group"><?php the_field('phone', 'options'); ?></a>
                <div class="spacer-90"></div>
            </div>
        </div>

        <div class="columns row-2">
            <?php get_template_part('block', 'language-bubble'); ?>
            <div class="social-container">
                <?php if( have_rows('social_links', 'option') ) : while( have_rows('social_links', 'option') ) : the_row(); 
                    $link = get_sub_field('profile_link');
                    $icon = get_sub_field('social_icon');
                    $name = get_sub_field('social_media');
                ?>
                    <a class="social-icon <?php echo strtolower($name);?>-icon" href="<?php echo $link; ?>" title="<?php echo $name; ?> link" style="background-image: url('<?php echo $icon['url']; ?>');"></a>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="panel1 white liberty-right">
    <div class="container">
        <div class="columns">

            <div class="column-50 center">
                <div class="spacer-30"></div>
                <h2><?php the_field('p1_title'); ?></h2>
                
                <div class="spacer-15"></div>
                <?php the_field('p1_intro'); ?>
            </div>
        </div>
    </div>
    <div class="container extended">
        <div class="columns">
                <div class="column-full">
                    <?php get_template_part( 'block', 'practice-areas' ); ?>
                </div>
            </div>
        </div>
</section>

<section class="panel2 blue">
    <div class="container">
        <div class="columns">
            <div class="column-50 center">
                <h2><?php the_field('p2_title'); ?></h2>
                <?php the_field('p2_intro'); ?>
            </div>
        </div>
        <div class="columns">
            <div class="column-full">
                <?php if ( have_rows( 'about_cards' ) ): ?>
                    <div class="card-holder">
                        <?php while ( have_rows( 'about_cards' ) ) : the_row(); ?>
                            <div class="card about">
                                <div class="wrapper">
                                    <h3><?php the_sub_field('value_prop'); ?></h3>
                                    <p><?php the_sub_field('description'); ?></p>
                                    <p class="star-single"><span class="red-star"></span><?php the_sub_field('outcome'); ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part( 'block', 'testimonials' ); ?>

<section class="panel4 white">
    <div class="container">
        <div class="columns">
            <div class="column-50 center">
                <h2><?php the_field('p4_title'); ?></h2>
                <?php the_field('p4_intro'); ?>
            </div>
        </div>
        <div class="columns">
            <div class="column-full">
                <?php get_template_part( 'block', 'related-posts' ); ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part( 'block', 'pre-footer' ); ?>

</div><!-- #page-content -->

<?php get_footer();?>