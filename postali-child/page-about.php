<?php
/**
 * Template Name: About
 * @package Postali Child
 * @author Postali LLC
**/
get_header();
//Panel 1
$p1_image_upper = get_field('p1_image_upper');
$p1_image_lower = get_field('p1_image_lower');
$circle_logo = get_field('global_circle_logo', 'option');

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
            <div class="grid columns">
                <div class="column-50">
                    
                    <div class="wrapper">
                        <h2><?php the_field('p1_title_left'); ?></h2>
                        
                        <div><?php the_field('p1_content_left'); ?></div>
                    </div>
                    
                </div>
                <div class="column-50">
                    <div class="panel-bg-img" style="background-image: url('<?php echo $p1_image_upper['url']; ?>');"></div>
                </div>
        </div>
        
            <div class="grid columns">
            <div class="column-50">
                    <div class="panel-bg-img" style="background-image: url('<?php echo $p1_image_lower['url']; ?>')"></div>
                </div>
                <div class="column-50">
                    
                        <div class="wrapper">
                            <h2><?php the_field('p1_title_right'); ?></h2>
                            
                            <div><?php the_field('p1_content_right'); ?></div>
                        </div>
                    
                </div>
  
            </div>
        
    </section>

    <section class="panel2 ltblue">
        <div class="container">
            <div class="columns">
                <div class="column-50 center">
                    <div>
                        <img class="circle-logo" src="<?php echo $circle_logo['url']; ?>" alt="<?php echo $circle_logo['alt']; ?>" title="<?php echo $circle_logo['title']; ?>" width="50" height="50"/>
                        <h2><?php the_field('p2_title'); ?></h2>
                        
                        <div><?php the_field('p2_content'); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="panel3 white">
        <div class="container">
            <div class="columns">
                <div class="primary-attorneys column-full center center-children">
                    <div>
                        <h2 class="center-border">Immigration Attorneys</h2>
                        
                    
                        <div class="attorney-row attorney-row_<?php echo $numb_attorneys; ?>">
                        <?php
                            if( $attorney_query->have_posts() ) : while( $attorney_query->have_posts() ) : $attorney_query->the_post();
                                $name = get_the_title();
                                $terms = get_the_terms(get_the_ID(), 'role');
                                $img = get_the_post_thumbnail_url();
                                $link = get_the_permalink();
                                $roles = [];
                                $content = get_the_content();
                                if( $terms ) {
                                    foreach($terms as $term) {
                                        array_push($roles, $term->name);
                                    }
                                }
                        ?>
                            <div class="attorney">
                                <div class="attorney_image" style="background-image:url('<?php esc_html_e($img); ?>');"></div>
                                <p class="big-blue"><?php esc_html_e($name); ?></p>
                                <!-- <p class="small-red"><span class="red-star"></span><span><?php //foreach($roles as $role) { echo $role; } ?></span></p> -->
                                <p class="small-blue <?php if( !$content ) { echo "hide-link"; } ?>"><a href="<?php esc_html_e($link); ?>">Read <?php esc_html_e($name); ?>'s Bio <span class="nav-arrow"></span></a></p>
                                <div class="attorney_socials">
                                    <?php if( have_rows('contact_info') ) : while( have_rows('contact_info') ) : the_row(); 
                                        $icon = get_sub_field('icon');
                                        $social = get_sub_field('social_media');
                                        $link = get_sub_field('social_link');
                                        
                                    ?>
                                    <a href="<?php echo $link; ?>" target="_blank" title="<?php echo $social; ?> link" class="attorney-social" style="background-image:url('<?php echo $icon['url']; ?>');"></a>
                                    <?php endwhile; endif; ?>
                                </div>
                            </div>
                        <?php endwhile; endif; wp_reset_query(); ?>
                    </div>
                </div>
                </div>
                <div class="staff column-full center center-children">
                    <div>
                        <h2 class="center-border">Our Staff</h2>
                        

                        <div class="attorney-row">
                        <?php
                        $args = [
                            'post_type' => 'attorneys',
                            'posts_per_page'   => -1,
                            'orderby'   => 'date',
                            'order' => 'asc',
                            'tax_query'  => [[
                                'taxonomy' => 'role',
                                'field' =>  'term_id',
                                'terms' => 20,
                                'operator' => 'NOT IN',
                            ]]
                        ];
                            $staff_query = new WP_Query($args);
                            if( $staff_query->have_posts() ) : while( $staff_query->have_posts() ) : $staff_query->the_post();
                                $name = get_the_title();
                                $img = get_the_post_thumbnail_url();
                                $link = get_the_permalink();
                                $terms = get_the_terms(get_the_ID(), 'role');
                                $roles = [];
                                $content = get_the_content();
                                if( $terms ) {
                                    foreach($terms as $term) {
                                        array_push($roles, $term->name);
                                    }
                                }

                        ?>
                            <div class="attorney">
                                <div class="attorney_image" style="background-image:url('<?php esc_html_e($img); ?>');"></div>
                                <p class="big-blue"><?php esc_html_e($name); ?></p>
                                <p class="small-red"><span class="red-star"></span><span><?php foreach($roles as $role) { echo $role; } ?></span></p>
                                <?php if($content) : ?><p class="small-blue"><a href="<?php esc_html_e($link); ?>">Read <?php esc_html_e($name); ?>'s Bio <span class="nav-arrow"></span></a></p><?php endif; ?>
                                
                            </div>
                        <?php endwhile; endif; wp_reset_query(); ?>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
    </section>
<?php get_template_part( 'block', 'pre-footer' ); ?>

</div><!-- #page-content -->

<?php get_footer();?>