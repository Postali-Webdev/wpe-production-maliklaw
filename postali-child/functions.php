<?php
/**
 * Theme functions.
 * @author Postali LLC
 */
	require_once dirname( __FILE__ ) . '/includes/admin.php';
	require_once dirname( __FILE__ ) . '/includes/utility.php';
	require_once dirname( __FILE__ ) . '/includes/case-results-cpt.php'; // Custom Post Type Case Results
	require_once dirname( __FILE__ ) . '/includes/testimonials-cpt.php'; // Custom Post Type Testimonials
	require_once dirname( __FILE__ ) . '/includes/attorneys-cpt.php'; // Custom Post Type Attorneys
    require_once dirname( __FILE__ ) . '/includes/jobs-cpt.php'; // Custom Post Type Jobs
	//require_once dirname( __FILE__ ) . '/includes/social-share.php'; // Social Media Sharing
    //require_once dirname( __FILE__ ) . '/includes/media-mentions-cpt.php'; // Custom Post Type Media Mentions

	add_action('wp_enqueue_scripts', 'postali_parent');
	function postali_parent() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/assets/css/styles.css' ); // Enqueue parent theme styles
	
	}  

	add_action('wp_enqueue_scripts', 'postali_child');
	function postali_child() {

		wp_enqueue_style( 'child-styles', get_stylesheet_directory_uri() . '/style.css' ); // Enqueue Child theme style sheet (theme info)
		wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/assets/css/styles.css'); // Enqueue child theme styles.css
		wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/assets/css/slick.css'); // Enqueue child theme styles.css
		
		wp_register_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Cantata+One&family=Lato:wght@100;300;400;700;900&family=Montserrat:wght@100;200;400;700&display=swap" rel=stylesheet', array() );
		// wp_register_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Cantata+One&family=Lato:wght@100;300;400;700;900&family=Montserrat:wght@100;200;400;700&display=swap rel=stylesheet', array() );
		wp_enqueue_style('google-fonts');


		wp_register_style( 'icomoon-font', 'https://cdn.icomoon.io/152819/MalikLaw/style-cf.css?paxs6l" rel="stylesheet', array() );
		wp_enqueue_style('icomoon-font');

		// Compiled .js using Grunt.js
		wp_register_script('custom-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js',array('jquery'), null, true); 
		wp_enqueue_script('custom-scripts');

		//Slick slider library
		wp_register_script('slick-slider-scripts', get_stylesheet_directory_uri() . '/assets/js/slick.min.js',array('jquery'), null, true); 
		wp_enqueue_script('slick-slider-scripts');
		//Slick slider customizations
		wp_register_script('slick-custom', get_stylesheet_directory_uri() . '/assets/js/slick-custom.min.js',array('jquery'), null, true); 
		wp_enqueue_script('slick-custom');

		if ( is_page_template( 'front-page.php' ) ) {

		// Home Page Javascript
		// wp_register_script('home-js', get_stylesheet_directory_uri() . '/assets/js/home.min.js', array('jquery'));
		// wp_enqueue_script('home-js');		
		}

		// These scripts should be conditionally enqueued only on page templates where they are needed

		// Smooth Scroll
		// wp_register_script('smooth-scroll', get_stylesheet_directory_uri() . '/assets/js/smooth-scroll.min.js', array('jquery'));
		// wp_enqueue_script('smooth-scroll');
		// wp_register_script('smooth-scroll-settings', get_stylesheet_directory_uri() . '/assets/js/smooth-scroll-settings.min.js', array('jquery'));
		// wp_enqueue_script('smooth-scroll-settings');

        // Fitvids
        //wp_register_script('fitvids', get_stylesheet_directory_uri() . '/assets/js/fitvids.min.js',array('jquery'), null, true); 
		//wp_enqueue_script('fitvids');

		// Featherlight JS Call 
		// wp_register_script('featherlight-js', get_stylesheet_directory_uri() . '/assets/js/featherlight.min.js', array('jquery'));
		// wp_enqueue_script('featherlight-js');

	}

	// Register Site Navigations
	function postali_child_register_nav_menus() {
		register_nav_menus(
			array(
				'header-nav' => __( 'Header Navigation', 'postali' ),
				'st-louis-header-nav' => __( 'St. Louis Header Navigation', 'postali' ),
				'fresno-header-nav' => __( 'Fresno Header Navigation', 'postali' ),
				'indianapolis-header-nav' => __( 'Indianapolis Header Navigation', 'postali' ),
				'footer-nav' => __( 'Footer Navigation', 'postali' ),
			)
		);
	}
	add_action( 'init', 'postali_child_register_nav_menus' );

	// Add Custom Logo Support
	add_theme_support( 'custom-logo' );

	function postali_custom_logo_setup() {
		$defaults = array(
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );
	}
	add_action( 'after_setup_theme', 'postali_custom_logo_setup' );

	// ACF Options Pages
	if( function_exists('acf_add_options_page') ) {
		
		acf_add_options_page(array(
			'page_title'    => 'Instructions',
			'menu_title'    => 'Instructions',
			'menu_slug'     => 'theme-instructions',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-smiley', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Global Options',
			'menu_title'    => 'Global Options',
			'menu_slug'     => 'global-options',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-admin-customizer', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Contact Info',
			'menu_title'    => 'Contact Info',
			'menu_slug'     => 'contact-info',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-location', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

        acf_add_options_page(array(
			'page_title'    => 'Global Schema',
			'menu_title'    => 'Global Schema',
			'menu_slug'     => 'global_schema',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-media-code',
			'redirect'      => false
		));

	}

    //Remove Gutenberg Block Library CSS from loading on the frontend
    function smartwp_remove_wp_block_library_css(){
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
    } 
    add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

	// Register Custom Taxonomy
	function page_type_tax() {

		$labels = array(
			'name' => 'Page Types',
			'singular_name' => 'Page Type',
			'menu_name' => 'Page Types',
			'all_items' => 'Page Types',
			'parent_item' => 'Parent Page Type',
			'parent_item_colon' => 'Parent Page Type:',
			'new_item_name' => 'New Page Type',
			'add_new_item' => 'Add New Page Type',
			'edit_item' => 'Edit Page Type',
			'update_item' => 'Update Page Type',
			'view_item' => 'View Page Type',
			'separate_items_with_commas' => 'Separate page types with commas',
			'add_or_remove_items' => 'Add or remove page types',
			'choose_from_most_used' => 'Choose from the most used page types',
			'popular_items' => 'Popular Page Types',
			'search_items' => 'Search Page Types',
			'not_found' => 'Page Type Not Found',
			'no_terms' => 'No page types',
			'items_list' => 'Page type list',
			'items_list_navigation' => 'Page type list navigation',
		);

		$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_in_rest' => true,
			'show_tagcloud' => false,
		);

		register_taxonomy('page_type', array('page'), $args);
	}

	add_action('init', 'page_type_tax', 0);

	// Save newly created fields to child theme
	add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
	function my_acf_json_save_point( $path ) {
		
		// update path
		$path = get_stylesheet_directory() . '/acf-json';
		
		// return
		return $path;
	
	}
	
	// Add ability to add SVG to Wordpress Media Library
	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');
	
	//add SVG to allowed file uploads
	function add_file_types_to_uploads($file_types){

		$new_filetypes = array();
		$new_filetypes['svg'] = 'image/svg+xml';
		$file_types = array_merge($file_types, $new_filetypes );

		return $file_types;
	}
	add_action('upload_mimes', 'add_file_types_to_uploads');


	// Widget Logic Conditionals
	function is_child($parent) {
		global $post;
			return $post->post_parent == $parent;
		}
		
		// Widget Logic Conditionals (ancestor) 
		function is_tree( $pid ) {
		global $post;
		
		if ( is_page($pid) )
		return true;
		
		$anc = get_post_ancestors( $post->ID );
		foreach ( $anc as $ancestor ) {
			if( is_page() && $ancestor == $pid ) {
				return true;
				}
		}
		return false;
	}

	// Display Current Year as shortcode - [year]
	function year_shortcode () {
		$year = date_i18n ('Y');
		return $year;
		}
	add_shortcode ('year', 'year_shortcode');
	
	// WP Backend Menu area taller
	add_action('admin_head', 'taller_menus');

	function taller_menus() {
	echo '<style>
		.posttypediv div.tabs-panel {
			max-height:500px !important;
		}
	</style>';
	}

	// Customize the logo on the wp-login.php page
	function my_login_logo() { ?>
		<style type="text/css">
			#login h1 a, .login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png);
			height:45px;
			width:204px;
			background-size: 204px 45px;
			background-repeat: no-repeat;
			padding-bottom: 30px;
			}
		</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );
	// Contact Form 7 Submission Page Redirect
	add_action( 'wp_footer', 'mycustom_wp_footer' );
	
	function mycustom_wp_footer() {
	?>
	<script type="text/javascript">
	document.addEventListener( 'wpcf7mailsent', function( event ) {
		location = '/form-success/';
	}, false );
	</script>
	<?php
	}

	function get_pagination() {
		return '<div class="pagination">' . paginate_links( array(
			'base'   => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			'format' => '/page/%#%',
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'prev_text'    => __( '<span class="arrow-icon" id="prev">&nbsp;</span>', 'textdomain' ),
			'next_text'    => __( '<span class="arrow-icon" id="next">&nbsp;</span>', 'textdomain' )
		) ) . '</div>';
	}

    function retrieve_latest_gform_submissions() {
        $site_url = get_site_url();
        $search_criteria = [
            'status' => 'active'
        ];
        $form_ids = 1; //search all forms
        $sorting = [
            'key' => 'date_created',
            'direction' => 'DESC'
        ];
        $paging = [
            'offset' => 0,
            'page_size' => 5
        ];
        
        $submissions = GFAPI::get_entries($form_ids, null, $sorting, $paging);
        $start_date = date('Y-m-d H:i:s', strtotime('-5 day'));
        $end_date = date('Y-m-d H:i:s');
        $entry_in_last_5_days = false;
        
        foreach ($submissions as $submission) {
            if( $submission['date_created'] > $start_date  && $submission['date_created'] <= $end_date ) {
                $entry_in_last_5_days = true;
            } 
        }
        if( !$entry_in_last_5_days ) {
            wp_mail('webdev@postali.com', 'Submission Status', "No submissions in last 5 days on $site_url");
        }
    }
    add_action('check_form_entries', 'retrieve_latest_gform_submissions');

    /**
 * Disable Theme/Plugin File Editors in WP Admin
 * - Hides the submenu items
 * - Blocks direct access to editor screens
 */
function postali_disable_file_editors_menu() {
    // Remove Theme File Editor from Appearance menu
    remove_submenu_page( 'themes.php', 'theme-editor.php' );
    // Optional: also remove Plugin File Editor from Plugins menu
    remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
}
add_action( 'admin_menu', 'postali_disable_file_editors_menu', 999 );

// Block direct access to the editors even if someone knows the URL
function postali_block_file_editors_direct_access() {
    wp_die( __( 'File editing through the WordPress admin is disabled.' ), 403 );
}
add_action( 'load-theme-editor.php', 'postali_block_file_editors_direct_access' );
add_action( 'load-plugin-editor.php', 'postali_block_file_editors_direct_access' );

/**
 * Disable the Additional CSS panel in the Customizer.
 * Primary method: remove the custom_css component early in load.
 */
function postali_disable_customizer_additional_css_component( $components ) {
    $key = array_search( 'custom_css', $components, true );
    if ( false !== $key ) {
        unset( $components[ $key ] );
    }
    return $components;
}
add_filter( 'customize_loaded_components', 'postali_disable_customizer_additional_css_component' );

/**
 * Fallback: remove the Additional CSS section if it's present.
 */
function postali_remove_customizer_additional_css_section( $wp_customize ) {
    if ( method_exists( $wp_customize, 'remove_section' ) ) {
        $wp_customize->remove_section( 'custom_css' );
    }
}
add_action( 'customize_register', 'postali_remove_customizer_additional_css_section', 20 );
?>