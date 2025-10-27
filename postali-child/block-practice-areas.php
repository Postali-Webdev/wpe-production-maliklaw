<?php 
/** 
* Practice Areas List
*/
?>
<div id="practice-areas" class="card-holder">
    <?php 
    //global
    $terms = 4;
    //st. louis
    if( is_tree(79) ) {
        $terms = 28;
    //fresno
    } elseif( is_tree(93) ) {
        //set terms when pages are ready and taxonomy is created
    //indianapolis    
    } elseif( is_tree(96) ) {
        //set terms when pages are ready and taxonomy is created
    }
    
    $args = array(
        'posts_per_page'         => '-1',
        'order'                  => 'DESC',
        'orderby'                => 'menu_order',
        'post_type'              => 'page',
        'tax_query'              => array(
            'relation' => 'OR',
            array(
                'post_type'        => 'page',
                'taxonomy'         => 'page_type',
                'terms'            => $terms,
                'include_children' => true,
            ),
        )
    );
    $query = new WP_Query($args);
    
    if ($query->have_posts()):
        while ($query->have_posts()): $query->the_post(); 
            $include = get_field('add_to_homepage');
            $title = get_field('short_title');
            $icon = get_field('small_icon');
            if ( $include == true ): ?>
                <div class="practice-area card equal-height link-hunter">
                        <div class="wrapper">
                        <img src="<?php echo esc_url($icon); ?>" alt="<?php the_field('short_title'); ?> icon" />
                        <div class="spacer-15"></div>
                        <a href="<?php the_permalink(); ?>" title="Learn more about <?php echo $title; ?>"><h3><?php echo $title; ?></h3></a>
                        <p class="large"><?php the_field('hp_pa_subtitle'); ?></p>
                        <div class="spacer-30"></div>
                        <?php the_field('hp_pa_content'); ?>
                    </div>
                </div> 
            <?php endif;
        endwhile;
    endif;
    wp_reset_postdata(); ?>
</div>