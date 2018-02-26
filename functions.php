<?php

function my_theme_enqueue_styles() {

    $parent_style = 'twentyseventeen-style'; 

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function add_custom_script() {
    wp_register_script('custom_script', home_url() . '/wp-content/themes/twentyseventeen-child/assets/js/custom.js', array( 'jquery' ), 1.0, true);
//     wp_enqueue_script('custom_script');
}  
add_action( 'wp_enqueue_scripts', 'add_custom_script' );

function wpc_custom_front_sections( $num_sections )
	{
		return 10; //Change this number to change the number of the sections.
	}


add_filter('twentyseventeen_front_page_sections', 'wpc_custom_front_sections');

/**
Taken from: https://journalxtra.com/wordpress/quicksnips/make-wordpress-theme-headers-shrink-on-scroll/
**/
 
add_action ('wp_footer', 'transition_navbar_onscroll', 1);
function transition_navbar_onscroll() {
?>
 
<script>
jQuery(document).ready(function(jQuery) {
    jQuery(window).scroll(function () {
        if (jQuery(window).scrollTop() > 2) { 
            jQuery('.navigation-top').addClass('navbar-transition');
        }
        else{
            jQuery('.navigation-top').removeClass('navbar-transition');
        }
    });
});

</script>
 
<?php 
}
?>
