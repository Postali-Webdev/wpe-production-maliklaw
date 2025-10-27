<?php
/**
 * 404 Error
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div id="page-content">

    <section class="container breadcrumbs">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
    </section>

    <section class="page-header panel1 white">
    <div class="container">
        <div class="columns">
            <div class="column-full center center-children">
                <div class="compass-frame">
                    <div class="compass-arrow"></div>
                </div>
                <div class="spacer-30"></div>
                <h1>This page has been lost.</h1>
                <div class="spacer-30"></div>
                <p>This page may have been removed, or the url is not correct.</p>
                <div class="spacer-30"></div>
                <a class="btn" href="/" title="return to home">Return To Home</a>
            </div>
        </div>
    </div>
</section>



</div><!-- #page-content -->

<?php get_footer();?>