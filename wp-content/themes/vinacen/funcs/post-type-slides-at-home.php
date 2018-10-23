<?php
function cptui_register_my_cpts_slides_at_home() {
	/**
	* Post Type: Slides At Home.
	*/
	$labels = array(
		"name" => __( "Slides At Home", "vinacen" ),
		"singular_name" => __( "Slide At Home", "vinacen" ),
	);
	$args = array(
		"label" => __( "Slides At Home", "vinacen" ),
		"labels" => $labels,
		"description" => "",
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
		"rewrite" => array( "slug" => "slides_at_home", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "thumbnail" ),
	);
	register_post_type( "slides_at_home", $args );
}
add_action( 'init', 'cptui_register_my_cpts_slides_at_home' );
if( function_exists('acf_add_local_field_group') ):
acf_add_local_field_group(array (
	'key' => 'group_5bcec53a4d634',
	'title' => 'Gallery For Slide At Home',
	'fields' => array (
		array (
			'key' => 'field_5bcec5682dc75',
			'label' => 'Label Small',
			'name' => 'label_small',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5bcec5a12dc76',
			'label' => 'Button Read More Content',
			'name' => 'button_read_more_content',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Read About Us',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5bcec5b12dc77',
			'label' => 'Button Read More URL',
			'name' => 'button_read_more_url',
			'type' => 'url',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'slides_at_home',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));
endif;
function vinacen_slides_at_home(){

	$args = array(
		'lang' => pll_current_language(),
		'post_type'   => 'slides_at_home',
		'post_status' => 'publish',
		'order'               => 'DESC',
		'orderby'             => 'date'
	);
	
	$query = new WP_Query( $args );

	if($query->have_posts()){
		?>
			<section class="ct-js-slick ct-slick ct-slick-arrow--type3 ct-u-marginBottom30" data-autoplay="true" data-arrows="true" data-items="1" data-XSitems="1" data-SMitems="1" data-MDitems="1">
			<?php
				while($query->have_posts()){
					$query->the_post();
					?>
					<div class="item">
						<article <?php post_class('ct-imageBox ct-u-paddingBoth0'); ?>>
							<figure class="ct-imageBox-wrapperOuter">
								<div class="ct-imageBox-container"><img src="<?php the_post_thumbnail_url( 'large' ); ?>" alt="slider img"></div>
								<figcaption class="ct-imageBox-wrapperInner ct-imageBox-wrapperInner--type1">
								<div class="ct-imageBox-titleContainer">
									<header class="ct-imageBox-title">
										<h4 class="ct-u-marginBottom0"><span><?php the_field('label_small'); ?></span></h4>
										<h1><span><?php the_title(); ?></span></h1>
										<div class="text-right">
											<a href="<?php the_field('button_read_more_url'); ?>" target="blank" class="btn btn-lg ct-btn-image btn-warning">
												<span><?php the_field('button_read_more_content'); ?></span>
											</a>
										</div>
									</header>
								</div>
								</figcaption>
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

add_action('vinacen_slides_at_home', 'vinacen_slides_at_home');

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_5bceca1f56d9e',
	'title' => 'Posts At Right Slides At Home',
	'fields' => array (
		array (
			'key' => 'field_5bceca63a3b93',
			'label' => 'Posts At Right Slides At Home',
			'name' => 'posts_at_right_slides_at_home',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'Attach to front page',
			'default_value' => 0,
		),
		array (
			'key' => 'field_5bcecabca3b94',
			'label' => 'Image',
			'name' => 'attach_image_to_right_url',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'full',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post',
				'operator' => '!=',
				'value' => '1',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;

function attach_to_right_slides_at_home(){

	$args = array(
		'lang' => pll_current_language(),
		'post_status' => 'publish',
		'order'               => 'DESC',
		'orderby'             => 'date',
		'posts_per_page' => 2,
		'tax_query' => array(
			'meta_key' => 'posts_at_right_slides_at_home',
			'meta_value' => true
		)
	);
	
	$query = new WP_Query( $args );

	if($query->have_posts()){
		while($query->have_posts()){
			$query->the_post();
					?>
							<div class="wpb_column vc_column_container vc_col-sm-6 vc_col-lg-12 vc_col-md-12">
								<div class="vc_column-inner ">
									<div class="wpb_wrapper">
										<article class="ct-imageBox">
											<a href="<?php the_permalink(); ?>" target="_blank" title="<?php the_title(); ?>">
												<figure class="ct-imageBox-wrapperOuter">
													<div class="ct-imageBox-container">
														<img src="<?php the_field('attach_image_to_right_url'); ?>" alt="<?php the_title(); ?>">
													</div>
												</figure>
											</a>
										</article>
									</div>
								</div>
							</div>
					<?php
				}
			?>
		<?php
	}
	wp_reset_query();
}

add_action('attach_to_right_slides_at_home', 'attach_to_right_slides_at_home');
