<?php
function cptui_register_my_cpts_this_weeks_featured() {
	/**
	* Post Type: this week’s featured.
	*/
	$labels = array(
		"name" => __( "this week’s featured", "vinacen" ),
		"singular_name" => __( "this week’s featured", "vinacen" ),
	);
	$args = array(
		"label" => __( "this week’s featured", "vinacen" ),
		"labels" => $labels,
		"description" => "The slides at home page",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "this_weeks_featured", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "thumbnail" ),
	);
	register_post_type( "this_weeks_featured", $args );
}
add_action( 'init', 'cptui_register_my_cpts_this_weeks_featured' );
function vinacen_featured_weeks_slides(){

	$args = array(
		'lang' => pll_current_language(),
		'post_type'   => 'this_weeks_featured',
		'post_status' => 'publish',
		'order'               => 'DESC',
		'orderby'             => 'date'
	);
	
	$query = new WP_Query( $args );

	if($query->have_posts()){
		?>
		<section data-items="1" data-XSitems="1" data-SMitems="2" data-MDitems="3" data-LGitems="3" data-accessibility="true" data-adaptiveHeight="false" data-autoplay="false" data-autoplaySpeed="3000" data-arrows="true" data-prevArrow="&lt;button type=&#039;button&#039; class=&#039;slick-prev&#039;&gt;Previous&lt;/button&gt;" data-centerMode="false" data-centerPadding="50px" data-cssEase="ease" data-dots="false" data-draggable="true" data-fade="false" data-easing="linear" data-edgeFriction="0.15" data-infinite="true" data-initialSlide="0" data-lazyLoad="ondemand" data-mobileFirst="true" data-pauseOnHover="false" data-pauseOnDotsHover="false" data-respondTo="window" data-speed="300" data-swipe="true" data-swipeToSlide="false" data-touchMove="true" data-touchThreshold="5" data-useCSS="true" data-variableWidth="false" data-vertical="false" data-rtl="false" class="ct-js-slick ct-slick ct-slick-arrow--type1" data-animations="true">
		<?php
		while($query->have_posts()){
			$query->the_post();
			?>
			<div class="item">
				<article <?php post_class( 'ct-imageBox'); ?>>
					<figure class="ct-imageBox-wrapperOuter">
						<a class="ct-js-magnificPopupImage" href="<?php the_post_thumbnail_url( 'post-large' ); ?>" title="SliderImage4">
							<div class="ct-imageBox-container ct-imageBox-container-shadow">
								<div class="ct-imageBox-hover ct-imageBox-hover--type1"></div>
								<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
							</div>
						</a>
					</figure>
				</article>
				</div>
			<?php
		}
		?>
		</section>
		<?php
	}
	wp_reset_query();
}

add_action('vinacen_featured_weeks_slides', 'vinacen_featured_weeks_slides');

add_action('wp_enqueue_scripts', 'vinacen_featured_weeks_slides_enqueue_scripts');
function vinacen_featured_weeks_slides_enqueue_scripts() {
	wp_enqueue_script('maginic-popup', get_template_directory_uri() . '/assets/js/maginic-popup.js' , array('jquery'), '1.0', true);
}