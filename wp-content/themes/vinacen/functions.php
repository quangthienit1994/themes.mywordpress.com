<?php
if ( ! function_exists( 'vinacen_setup' ) ) :
function vinacen_setup() {
	load_theme_textdomain( 'vinacen' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 9999 );
    
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'vinacen' ),
    ) );
    
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; 
add_action( 'after_setup_theme', 'vinacen_setup' );

function vinacen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vinacen_content_width', 840 );
}
add_action( 'after_setup_theme', 'vinacen_content_width', 0 );

function vinacen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar Products', 'vinacen' ),
		'id'            => 'sidebar-products',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'vinacen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Menu footer', 'vinacen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'vinacen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'vinacen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'vinacen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'vinacen_widgets_init' );


/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function vinacen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 840 <= $width ) {
		$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
	}

	if ( 'page' === get_post_type() ) {
		if ( 840 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	} else {
		if ( 840 > $width && 600 <= $width ) {
			$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		} elseif ( 600 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'vinacen_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function vinacen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		} else {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
		}
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'vinacen_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function vinacen_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list'; 

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'vinacen_widget_tag_cloud_args' );

if(!function_exists('vinacen_enqueue_scripts')){
	function vinacen_enqueue_scripts(){
		wp_enqueue_style( 'bootstrap-3', get_template_directory_uri().'/assets/inc/bootstrap-3/css/bootstrap.min.css' );
		wp_enqueue_script('bootstrap-3', get_template_directory_uri().'/assets/inc/bootstrap-3/js/bootstrap.min.js', array('jquery'), '3.3', false);
		wp_enqueue_style( 'fontawesome-4', get_template_directory_uri().'/assets/inc/font-awesome/css/font-awesome.min.css', '4.7' );


		wp_enqueue_style( 'style-form-filter', get_template_directory_uri().'/assets/css/form-filter-style.css', '1.0' );
		wp_enqueue_style( 'style-1', get_template_directory_uri().'/assets/css/style.css', '1.0' );
		wp_enqueue_style( 'style-2', get_template_directory_uri().'/assets/css/style2.css', '1.0' );
		wp_enqueue_style( 'style-3', get_template_directory_uri().'/assets/css/style3.css', '1.0' );
		wp_enqueue_style( 'style-4', get_template_directory_uri().'/assets/css/style4.css', '1.0' );
		
		wp_enqueue_style( 'vinacen', get_template_directory_uri().'/assets/css/vinacen.css', '1.0' );

		wp_enqueue_script('form-filter', get_template_directory_uri().'/assets/js/filter.js', array('jquery'), '1.0', true);
		wp_enqueue_script('vinacen-main', get_template_directory_uri().'/assets/js/main.js', array('jquery'), '1.0', true);
	}
	add_action('wp_enqueue_scripts', 'vinacen_enqueue_scripts');
}

require(get_template_directory().'/funcs/funcs.php');
require(get_template_directory().'/funcs/string_languages.php');
require(get_template_directory().'/funcs/options.php');
