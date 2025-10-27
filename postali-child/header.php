<?php
/**
 * Theme header.
 *
 * @package Postali Child
 * @author Postali LLC
**/

$nav_location = 'header-nav';
$home = "/";
if( is_tree(79) ) {
	$nav_location = 'st-louis-header-nav';
	$home = "/st-louis/";
} elseif( is_tree(93) ) {
	$nav_location = 'fresno-header-nav';
	$home = "/fresno/";
} elseif( is_tree(96) ) {
	$nav_location = 'indianapolis-header-nav';
	$home = "/indianapolis/";
}

?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>

<?php if(is_front_page()) { ?>
    <link rel="preload" as="image" href="/wp-content/uploads/2022/03/homepage-header_auto_x2.jpg">
    <link rel="preload" as="image" href="/wp-content/uploads/2022/03/homepage-header_auto_x2.jpg.webp">
<?php } ?>

<?php if (has_post_thumbnail()) { 
$attachment_image = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
<link rel="preload" as="image" href="<?php echo $attachment_image; ?>">
<?php } ?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KP34Z8W');</script>
<!-- End Google Tag Manager -->

<!-- Add JSON Schema here -->
<?php 
// Global Schema
$global_schema = get_field('global_schema', 'options');
if ( !empty($global_schema) ) :
	echo '<script type="application/ld+json">' . $global_schema . '</script>';
endif;

// Single Page Schema
$single_schema = get_field('single_schema');
if ( !empty($single_schema) ) :
	echo '<script type="application/ld+json">' . $single_schema . '</script>';
endif; ?>

<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KP34Z8W"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<header>
		<!-- testing github push -->
		<div id="header-top" class="container">
			<div id="header-top_left">
				<a href="<?php esc_html_e($home); ?>" class="custom-logo-link" rel="home" aria-current="page"><div class="custom-logo"></div></a>
			</div>
			<div id="header-top_right">
				<div id="header-top_menu">
					<div id="full-nav">
						<?php
							$args = array(
								'container' => false,
								'menu_id'           => "",
								'theme_location' => $nav_location
							);
							wp_nav_menu( $args );
						?>	
						<form class="navbar-form-search" role="search" method="get" action="/">
							<div class="search-form-container hdn" id="search-input-container">
								<div class="search-input-group">
									<div class="form-group">
									<input type="text" name="s" placeholder="Search for..." id="search-input-5cab7fd94d469" value="" class="form-control">
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-search" id="search-button"><span class="icon-magnifying-glass" aria-hidden="true"></span></button>
						</form>	
					</div>
						
					<div id="header-top_mobile">
						<div id="menu-icon" class="toggle-nav">
							<span class="line line-1"></span>
							<span class="line line-2"></span>
							<span class="line line-3"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
