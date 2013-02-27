<?php



function open4scrum_scripts() {

    wp_deregister_script('jquery');
    wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', false, '1.9.1', true);
    wp_enqueue_script('jquery');

    wp_enqueue_script(
        'jquery-ui',
        get_template_directory_uri() . '/js/jquery-ui-1.8.21.custom.min.js',
        array('jquery'),
        false, true
    );

    //<!-- transition / effect library -->
    wp_enqueue_script('bootstrap-transition-js',get_template_directory_uri() . '/js/bootstrap-transition.js', array(), false, true );
    //<!-- alert enhancer library -->
	wp_enqueue_script('bootstrap-alert-js',get_template_directory_uri() . '/js/bootstrap-alert.js', array(), false, true );
	//<!-- modal / dialog library -->
	wp_enqueue_script('bootstrap-modal-js',get_template_directory_uri() . '/js/bootstrap-modal.js', array(), false, true );
	//<!-- custom dropdown library -->
	wp_enqueue_script('bootstrap-dropdown-js',get_template_directory_uri() . '/js/bootstrap-dropdown.js', array(), false, true );
	//<!-- scrolspy library -->
	wp_enqueue_script('bootstrap-scrollspy-js',get_template_directory_uri() . '/js/bootstrap-scrollspy.js', array(), false, true );
    //<!-- library for creating tabs -->
	wp_enqueue_script('bootstrap-tab-js',get_template_directory_uri() . '/js/bootstrap-tab.js', array(), false, true );
    //<!-- library for advanced tooltip -->
	wp_enqueue_script('bootstrap-tooltip-js',get_template_directory_uri() . '/js/bootstrap-tooltip.js', array(), false, true );
    //<!-- popover effect library -->
	wp_enqueue_script('bootstrap-popover-js',get_template_directory_uri() . '/js/bootstrap-popover.js', array(), false, true );
    //<!-- button enhancer library -->
	wp_enqueue_script('bootstrap-button-js',get_template_directory_uri() . '/js/bootstrap-button.js', array(), false, true );
    //<!-- accordion library (optional, not used in demo) -->
	wp_enqueue_script('bootstrap-collapse-js',get_template_directory_uri() . '/js/bootstrap-collapse.js', array(), false, true );
    //<!-- carousel slideshow library (optional, not used in demo) -->
	wp_enqueue_script('bootstrap-carousel-js',get_template_directory_uri() . '/js/bootstrap-carousel.js', array(), false, true );
    //<!-- autocomplete library -->
	wp_enqueue_script('bootstrap-typeahead-js',get_template_directory_uri() . '/js/bootstrap-typeahead.js', array(), false, true );
    //<!-- tour library -->
	wp_enqueue_script('bootstrap-tour-js',get_template_directory_uri() . '/js/bootstrap-tour.js', array(), false, true );
    //<!-- library for cookie management -->
	wp_enqueue_script('jquery.cookie-js',get_template_directory_uri() . '/js/jquery.cookie.js', array(), false, true );

    // general
    wp_enqueue_script('open4scrum-js',get_template_directory_uri() . '/js/open4scrum.js', array('jquery'), '1.0', true );

    /*

	<!-- chart libraries start -->
	wp_enqueue_script('-js',get_template_directory_uri() . '/js/excanvas.js' );
	wp_enqueue_script('-js',get_template_directory_uri() . '/js/jquery.flot.min.js' );
	wp_enqueue_script('-js',get_template_directory_uri() . '/js/jquery.flot.pie.min.js' );
	wp_enqueue_script('-js',get_template_directory_uri() . '/js/jquery.flot.stack.js' );
	wp_enqueue_script('-js',get_template_directory_uri() . '/js/jquery.flot.resize.min.js' );
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	wp_enqueue_script('-js',get_template_directory_uri() . '/js/jquery.chosen.min.js' );
	<!-- checkbox, radio, and file input styler -->
	wp_enqueue_script('-js',get_template_directory_uri() . '/js/jquery.uniform.min.js' );
	<!-- plugin for gallery image view -->
	wp_enqueue_script('-js',get_template_directory_uri() . '/js/jquery.colorbox.min.js' );
	<!-- rich text editor library -->
	wp_enqueue_script('-js',get_template_directory_uri() . '/js/jquery.cleditor.min.js' );
	<!-- notification plugin -->
	wp_enqueue_script('-js',get_template_directory_uri() . '/js/jquery.noty.js' );
	<!-- file manager library -->
	wp_enqueue_script('-js',get_template_directory_uri() . '/js/jquery.elfinder.min.js' );
	<!-- star rating plugin -->
	wp_enqueue_script('-js',get_template_directory_uri() . '/js/jquery.raty.min.js' );
	<!-- for iOS style toggle switch -->
	wp_enqueue_script('-js',get_template_directory_uri() . '/js/jquery.iphone.toggle.js' );
	<!-- autogrowing textarea plugin -->
	wp_enqueue_script('-js',get_template_directory_uri() . '/js/jquery.autogrow-textarea.js' );
	<!-- multiple file upload plugin -->
	wp_enqueue_script('-js',get_template_directory_uri() . '/js/jquery.uploadify-3.1.min.js' );
	<!-- history.js for cross-browser state change on ajax -->
	wp_enqueue_script('-js',get_template_directory_uri() . '/js/jquery.history.js' );
	<!-- application script for Charisma demo -->
	wp_enqueue_script('-js',get_template_directory_uri() . '/js/charisma.js' );

     */



}

function open4scrum_styles(){

    wp_enqueue_style( 'open4scrum-css', get_stylesheet_directory_uri() . '/css/open4scrum.css' );
    wp_enqueue_style( 'bootstrap-responsive-css', get_stylesheet_directory_uri() . '/css/bootstrap-responsive.css' );
    wp_enqueue_style( 'charisma-app-css', get_stylesheet_directory_uri() . '/css/charisma-app.css' );
    wp_enqueue_style( 'jquery-ui-css', get_stylesheet_directory_uri() . '/css/jquery-ui-1.8.21.custom.css' );

    wp_enqueue_style( 'fullcalendar-css', get_stylesheet_directory_uri() . '/css/fullcalendar.css' );
    wp_enqueue_style( 'fullcalendar.print-css', get_stylesheet_directory_uri() . '/css/fullcalendar.print.css' );
    wp_enqueue_style( 'chosen-css', get_stylesheet_directory_uri() . '/css/chosen.css' );
    wp_enqueue_style( 'uniform-css', get_stylesheet_directory_uri() . '/css/uniform.default.css' );
    wp_enqueue_style( 'colorbox-css', get_stylesheet_directory_uri() . '/css/colorbox.css' );
    wp_enqueue_style( 'cleditor-css', get_stylesheet_directory_uri() . '/css/jquery.cleditor.css' );
    wp_enqueue_style( 'noty-css', get_stylesheet_directory_uri() . '/css/jquery.noty.css' );
    wp_enqueue_style( 'noty_theme_default-css', get_stylesheet_directory_uri() . '/css/noty_theme_default.css' );
    wp_enqueue_style( 'elfinder-css', get_stylesheet_directory_uri() . '/css/elfinder.min.css' );
    wp_enqueue_style( 'elfinder.theme-css', get_stylesheet_directory_uri() . '/css/elfinder.theme.css' );
    wp_enqueue_style( 'iphone.toggle-css', get_stylesheet_directory_uri() . '/css/jquery.iphone.toggle.css' );
    wp_enqueue_style( 'opa-icons-css', get_stylesheet_directory_uri() . '/css/opa-icons.css' );
    //wp_enqueue_style( 'uploadify-css', get_stylesheet_directory_uri() . '/css/uploadify.css' );

    /*
  <link id="bs-css" href="<?php echo ' );
<style type="text/css">
  body {
    padding-bottom: 40px;
  }
  .sidebar-nav {
    padding: 9px 0;
  }
</style>

 */

}

add_action( 'wp_enqueue_scripts', 'open4scrum_styles' );
add_action( 'wp_enqueue_scripts', 'open4scrum_scripts' );




?>