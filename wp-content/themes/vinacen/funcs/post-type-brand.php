<?php
function cptui_register_my_cpts_brand() {
	/**
	* Post Type: Brands.
	*/
	$labels = array(
		"name" => __( "Brands", "vinacen" ),
		"singular_name" => __( "Brands", "vinacen" ),
		"menu_name" => __( "Brands", "vinacen" ),
		"all_items" => __( "All Brands", "vinacen" ),
		"add_new" => __( "Add new brand", "vinacen" ),
	);
	$args = array(
		"label" => __( "Brands", "vinacen" ),
		"labels" => $labels,
		"description" => "Brands",
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
		"rewrite" => array( "slug" => "brand", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "thumbnail" ),
	);
	register_post_type( "brand", $args );
}
add_action( 'init', 'cptui_register_my_cpts_brand' );
if(!function_exists('vinacen_show_brands')){
	function vinacen_show_brands(){
		$args = array(
			'post_type'   => 'brand',
			'post_status' => 'publish',
			'order'               => 'DESC',
			'orderby'             => 'date',
			'nopaging'               => true
		);
		
		$query = new WP_Query( $args );
?>
<section class="ct-js-slick ct-slick ct-slick-arrow--type2" data-height="60" data-animations="true"
	data-autoplay="false" data-arrows="true" data-items="1" data-XSitems="2" data-SMitems="3"
	data-MDitems="5">
	<?php
		if($query->have_posts()){
			while($query->have_posts()){
				$query->the_post();
	?>
	<div class="item">
		<?php the_post_thumbnail(); ?>
	</div>
	<?php
		}
	}
	?>
</section>
<?php
wp_reset_query();
}
}
add_action('show-brands-slide', 'vinacen_show_brands' );