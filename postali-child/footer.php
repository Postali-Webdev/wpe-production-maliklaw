<?php
/**
 * Theme footer
 *
 * @package Postali Child
 * @author Postali LLC
**/
?>
<footer>
    <section class="contact-footer">
        <div class="container">
            <?php if ( have_rows('contact_locations', 'option') ): ?>
                <div class="location-list horizontal-list">
                    <?php while ( have_rows('contact_locations', 'option') ) : the_row(); 
                        $location_input = get_sub_field('location');
                        $page_link = get_sub_field('contact_location_page_link');
                        $gmb_link = get_sub_field('gmb_link');
                        if ( $location_input == 'St. Louis, MO') {
                            $location = "St. Louis – Head Office";
                        } else if ( $location_input == 'Fresno, CA' ) {
                            $location = "Fresno Office";
                        } else if ( $location_input == 'Greenwood, IN' ) {
                            $location = "Greenwood Office";
                        }
                    ?>
                        <div class="location-list_item">
                            <p class="location-list_item_title"><a href="<?php esc_html_e($page_link); ?>"><?php the_sub_field('location'); ?></a></p>
                            <div class="line-spacer"></div>
                            <div class="contact-grid">
                                <div class="location-list_item_map">
                                    <iframe src="<?php the_sub_field('map_embed','options'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                                <div class="location-list_item_address">
                                    <a href="<?php esc_html_e($gmb_link); ?>" target="_blank" title="google my business page">
                                        <p><?php the_sub_field('street_address'); ?></p>
                                        <p><?php the_sub_field('city_zipcode'); ?>,</p>
                                        <div class="state-directions">
                                            <p><?php the_sub_field('state'); ?></p>
                                            <span class="location-icon"></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="location-list_item_phone-email">
                                    <p>Phone: <a href="tel:<?php the_sub_field('phone'); ?>" title="Call <?php the_sub_field('location'); ?> Office"><?php the_sub_field('phone'); ?></a> (Toll Free)</p>
                                    <p>Fax: <a href="fax:<?php the_sub_field('fax'); ?>" title="Fax <?php the_sub_field('location'); ?> Office"><?php the_sub_field('fax'); ?></a></p>
                                    <p>Email: <a href="mailto:<?php the_sub_field('email'); ?>" title="Email <?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <section class="utility-footer">
        <div class="container">

            <div class="columns utility-footer_upper">
                <div class="column-25">
                    <?php the_custom_logo(); ?>
                </div>
                <div class="column-75" id="bottom-border-box"></div>
            </div>

            <div class="columns utility-footer_mid">
                <div class="column-75">
                    <p class="disclaimer">The information you obtain at this site is not, nor is it intended to be, legal advice. You should consult an attorney for advice regarding your individual situation. We invite you to contact us and welcome your calls, letters and electronic mail. Contacting us does not create an attorney-client relationship. Please do not send any confidential information to us until such time as an attorney-client relationship has been established.</p>
                </div>
                <div class="column-25">
                    <div class="social-holder">
                        <div class="social-container">
                            <?php if( have_rows('social_links', 'option') ) : while( have_rows('social_links', 'option') ) : the_row(); 
                                $link = get_sub_field('profile_link');
                                $icon = get_sub_field('social_icon');
                                $name = get_sub_field('social_media');
                            ?>
                                <a class="social-icon <?php echo strtolower($name);?>-icon" href="<?php echo $link; ?>" title="<?php echo $name; ?> link" style="background: url('<?php echo $icon['url']; ?>') no-repeat;"></a>
                            <?php endwhile; endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="columns utility-footer_lower">
                <div class="column-full">
                    <div class="footer-menu">
                        <nav>
                        <?php
                            $args = array(
                                'container' => false,
                                'theme_location' => 'footer-nav'
                            );
                            wp_nav_menu( $args );
                        ?>	
                        </nav>
                    </div>
                    <p class="copyright">Copyright ©<?php echo date("Y"); ?> American Immigration Law Group. All rights reserved.</p>
                    <?php if(is_page_template('front-page.php')) { ?>
                    <div class="spacer-30"></div>
                    <a href="https://www.postali.com" title="Site design and development by Postali" target="blank"><img src="https://www.postali.com/wp-content/themes/postali-site/img/postali-tag-reversed.png" alt="Postali | Results Driven Marketing" style="display:block; max-width:250px;" /></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</footer>
    
<?php wp_footer(); ?>
<!-- V4 Intaker -->
<script>(function (w,d,s,v,odl){(w[v]=w[v]||{})['odl']=odl;;
var f=d.getElementsByTagName(s)[0],j=d.createElement(s);j.async=true;
j.src='https://intaker.azureedge.net/widget/chat.min.js';
f.parentNode.insertBefore(j,f);
})(window, document, 'script','Intaker', 'americanimmigrationlawgroup');
</script>
<!-- /V4 Intaker -->
</body>
</html>


