<?php
/**
 * bricks functions and definitions
 *
 * @package bricks
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'bricks_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bricks_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bricks, use a find and replace
	 * to change 'bricks' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bricks', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bricks' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bricks_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
}
endif; // bricks_setup
add_action( 'after_setup_theme', 'bricks_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function bricks_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'bricks' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'bricks_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bricks_scripts() {

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );

	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css' );

	wp_enqueue_style( 'bricks-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/main.js', array('jquery'),'', true );

	wp_enqueue_script( 'imageload', get_template_directory_uri() . '/js/imageLoaded.js', array('jquery','custom'),'', true );

	wp_enqueue_script( 'jquery-masonry', array('jquery'),'', false );

	wp_enqueue_script( 'modernizr' ,get_template_directory_uri() . '/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js', array('jquery'),'', true );	

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array('jquery'),'', true );

	wp_enqueue_script( 'bricks-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_style('googlefont-first', '//fonts.googleapis.com/css?family=Josefin+Sans:400,700');

	wp_enqueue_style('googlefont-second', '//fonts.googleapis.com/css?family=Montserrat' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bricks_scripts' );


function bricks_posts_nav() {
	if(is_single()):
	?>
		<ul class="pager">
			<?php previous_post_link( '<li class="previous">%link</li>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'bricks') . '</span> %title' ); ?>
			<?php next_post_link( '<li class="next">%link</li>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'bricks') . '</span>' ); ?>
		</ul>
	<?php	
	else:
		global $wp_query;
		$big = 999999999;
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
		) );
	endif;	
}



function bricks_customize_register_option($wp_customize){
	

	/***For Container Color**/

	$wp_customize->add_section('bricks_color_scheme', array(
        'title'    => __('Color Scheme', 'bricks'),
        'priority' => 120,
    ));

     $wp_customize->add_setting('bricks_theme_options', array(
        'default'           => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url_raw'
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_color', array(
        'label'    => __('Box Color ', 'bricks'),
        'section'  => 'bricks_color_scheme',
        'settings' => 'bricks_theme_options',
    )));

    $wp_customize->add_section( 'bricks_logo_section' , array(
	    'title'       => __( 'Logo', 'bricks' ),
	    'priority'    => 30,
	    'description' => 'Upload a logo to replace the default site name and description in the header',
	));
  		
  	$wp_customize->add_setting( 'bricks_logo',array(
  		'sanitize_callback' => 'esc_url_raw'
  	));

  	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bricks_logo', array(
	    'label'    => __( 'Logo', 'bricks' ),
	    'section'  => 'bricks_logo_section',
	    'settings' => 'bricks_logo',
	)));



	/************End**************/
}
add_action('customize_register', 'bricks_customize_register_option');

function bricks_custom_style(){
		echo '<style type="text/css">';
        echo '.item {';
        echo 'background-color:'. get_option("bricks_theme_options");
        echo '}';
        echo '.post{';
        echo 'background-color:'. get_option("bricks_theme_options");
        echo '}';
        echo'</style>';
}

add_action( 'wp_head','bricks_custom_style');




/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/*if(is_admin())
 {
	 add_action('wp_head', 'show_template');
	 function show_template() {
	     global $template;
	     echo basename($template);
	 }
}*/


require_once('briks_navwalker.php');


