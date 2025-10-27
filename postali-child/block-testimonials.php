<!-- Client Reviews Block --> 
<?php 
$args = array(
    'posts_per_page'         => '3',
    'order'                  => 'DESC',
    'orderby'                => 'menu_order',
    'post_type'              => 'testimonials',
    'tax_query'              => array(
        'relation' => 'OR',
        array(
            'post_type'        => 'testimonials',
            'taxonomy'         => 'testimonial_topic',
            'terms'            => 5,
            'include_children' => true,
        ),
    )
);
$query = new WP_Query($args);

if ($query->have_posts()): ?>
<section class="panel3 white">
    <div class="container extended">
        <div class="columns">
            <div class="column-full">
                <div id="client-reviews">
                    <h2 class="center-border">Client Reviews</h2>
                    
                    <div class="card-holder">
                        <?php  while ($query->have_posts()): $query->the_post(); ?>
                                <div class="testimonial card">
                                    <div class="wrapper">
                                        <div class="stars-multi"><img src="/wp-content/uploads/2022/03/5-stars.svg" alt="Five stars icon"/></div>
                                        <p>“<?php the_field('testimonial'); ?>”</p>
                                        <div class="spacer-30"></div>
                                        <p class="all-caps"><?php the_field('client'); ?></p>
                                        <p><?php the_field('date'); ?></p>
                                    </div>
                                </div> 
                            <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; wp_reset_postdata(); ?>