<?php get_header(); 
function show_only_products_with_qtdy_min_1( $meta_query, $query ) {
	if( is_admin() ) return $meta_query;

	    // Add your criteria
	$meta_query[] = array(
       'key'     => '_stock',
	    'type'    => 'numeric',
	    'value'   => 0,
		'compare' => '>'
	);
	return $meta_query;
};
?>
<div id="primary" class="content-area">
	<main >
		<div class="container">
			<div class="ct-breadcrumbs-container">
				<span id="transmark"></span>
				<div class="ct-breadcrumbs ct-js-breadcrumbs" data-bg-image="<?php echo the_field('banner_in_page_products', pll_get_post('6')); ?>" data-height="260" style="background-image: url(<?php echo the_field('banner_in_page_products', pll_get_post('6')); ?>); height: 260px;">
					<div class="ct-breadcrumbs-title">
						Shop
					</div>
				</div>
				
			</div>
		</div>
		<section class="ct-shopSection ct-u-paddingBoth100 ct-u-diagonalTopLeft ct-u-diagonalBottomRight">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-md-push-3">
						<?php 
							require_once('woocommerce/product-filterform.php');
						?>
						<?php
						var_dump($_GET);
						$orderby = vinacen_get_value('orderby', 'popularity');
						$limit = vinacen_get_value('posts', get_option( 'posts_per_page', 10 ));
						$cats = vinacen_get_value('checkproduct_cat');
						$on_sale = vinacen_get_value('on_sale');
						$in_stock = vinacen_get_value('in_stock');

						if(is_array($cats)){
							$category_names = array();
							foreach ($cats as $k => $v)
							{
							    $category_names[] = $v;
							}
							$cats = implode(', ', $category_names);
						}

						if($in_stock){
							add_filter( 'woocommerce_product_query_meta_query', 'show_only_products_with_qtdy_min_1', 10, 2 );
						}
						

						echo do_shortcode('[products 	
							paginate="true" 
							columns="4" 
							orderby="'.$orderby.'" 
							category="'.$cats.'"
							limit="'.$limit.'"
							'.($on_sale ? 'on_sale="true"' : '').'
							 ]');
						?>
					</div>
					<div class="col-md-3 col-md-pull-9 ct-js-sidebar"><?php get_sidebar( 'products' ); ?></div>
				</div>
			</div>
		</section>
	</main>
</div>
<?php get_footer(); ?>