<?php
if( function_exists('acf_add_local_field_group') ):
acf_add_local_field_group(array (
	'key' => 'group_5bcecf28700e6',
	'title' => 'Portfolio',
	'fields' => array (
		array (
			'key' => 'field_5bcecfc28099a',
			'label' => 'Brochure online slides',
			'name' => 'brochure_online_slides',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => '',
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => '',
			'max' => '',
			'layout' => 'table',
			'button_label' => 'Add Row',
			'sub_fields' => array (
				array (
					'key' => 'field_5bcecfeb8099b',
					'label' => 'thumbnail',
					'name' => 'brochure_online_slides_thumbnail',
					'type' => 'image',
					'instructions' => '',
					'required' => 1,
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
				array (
					'key' => 'field_5bced0088099c',
					'label' => 'file',
					'name' => 'brochure_online_file',
					'type' => 'file',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'library' => 'all',
					'min_size' => '',
					'max_size' => '',
					'mime_types' => '',
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page/portfolio.php',
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
function cptui_register_my_cpts_portfolio() {
	/**
	* Post Type: portfolio.
	*/
	$labels = array(
		"name" => __( "Portfolios", "vinacen" ),
		"singular_name" => __( "Portfolio", "vinacen" ),
	);
	$args = array(
		"label" => __( "portfolio", "vinacen" ),
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
		"rewrite" => array( "slug" => "portfolio", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);
	register_post_type( "portfolio", $args );
}
add_action( 'init', 'cptui_register_my_cpts_portfolio' );
function Portolio_slides(){
?>
<section class="ct-js-slick ct-slick ct-slick-arrow--type6" data-animations="true" data-autoplay="false" data-arrows="true" data-items="1">
	<?php
	$args = array(
		'lang' => pll_current_language(),
		'post_status' => 'publish',
		'post_type'   => 'portfolio',
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
	<div class="item">
		<article class="ct-imageBox">
			<figure class="ct-imageBox-wrapperOuter">
				<a href="http://farmfresh.themeplayers.net/portfolio/mixed-seeds-for-a-perfect-tea/">
					<div class="ct-imageBox-container">
						<img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
					</div>
				</a>
				<figcaption class="ct-imageBox-wrapperInner ct-imageBox-wrapperInner--type5">
				<div class="ct-imageBox-titleContainer">
					<header class="ct-imageBox-title">
						<a href="<?php the_permalink(); ?>"><h3 title="<?php the_title(); ?>"><span><?php the_title(); ?></span></h3></a>
					</header>
					<div class="ct-imageBox-text">
						<?php the_content(); ?>
					</div>
				</div>
				</figcaption>
			</figure>
		</article>
	</div>
	<?php
	}
	?>
	<?php
	}
	?>
</section>
<?php
	wp_reset_query();
}

add_action('portolio_slides', 'Portolio_slides');
