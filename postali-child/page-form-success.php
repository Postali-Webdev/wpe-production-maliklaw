<?php 
/**
 * Template Name: Form Success
 *
 * @package Postali Parent
 * @author Postali LLC
 */

get_header(); ?>

<section class="container breadcrumbs">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
    </section>

    <section class="page-header panel1 white">
    <div class="container">
        <div class="columns">
            <div class="column-full center center-children">
                <div class="spacer-30"></div>
                <h1>Form Submitted</h1>
                <div class="spacer-30"></div>
                <p>Thank you for reaching out to the American Immigration Law Group, we’ll be in touch soon.</p>
                <div class="spacer-30"></div>
                <a class="btn" href="/" title="return to home">Return To Home</a>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>