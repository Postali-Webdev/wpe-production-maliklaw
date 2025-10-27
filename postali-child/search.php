<?php
/**
 * Search results template.
 *
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); 
$search_keyword = get_search_query();
$keys = implode('|', array_filter(explode(' ', $search_keyword)));
?>

<div id="page-content">
    <section class="container breadcrumbs">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
    </section>

    <section class="page-header white">
        <div class="container">
            <div class="columns">
                <div class="column-75 center center-children">
                    <h1>Search Results for <br> <span class="search-results">"<?php echo $search_keyword?>"</span></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="panel1">
        <div class="container">
            <div class="columns">
                <div class="column-75 center block">
                    <?php if( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post();
                        $title = preg_replace('/(' . $keys .')/iu', '<span class="search-highlight">\0</span>', get_the_title());
                        $excerpt = preg_replace('/(' . $keys .')/iu', '<span class="search-highlight">\0</span>', get_the_excerpt());
                    ?>
                        <div class="search-result">
                            <h2><a href="<?php the_permalink();?>"><?php echo $title; ?></a></h2>
                            <p><?php echo $excerpt; ?></p>
                        </div>
                    <?php endwhile ?>
                    <?php else : ?>
                        <p><?php printf( esc_html__( 'Our apologies but there\'s nothing that matches your search for "%s"', 'postali' ), get_search_query() ); ?></p>
                        <?php get_search_form(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="panel2">
        <div class="container">
            <div class="columns">
                <div class="column-75 center">
                    <div class="pagination">
                    <?php _e( get_pagination() ); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer();