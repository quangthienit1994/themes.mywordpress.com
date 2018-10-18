<?php 

if(!function_exists('vinacen_count_by_query')){
	/**
	 * Lấy số lượng sản phẩm dựa vào query
	 * @param  [type] $query WP_QUERY params
	 * @return [number]
	 */
	function vinacen_count_by_query($query){
		$query = new WP_Query( $query );
		return count($query->posts);
	}
}


										function vinacen_get_categories_products_fillter($category_id = null, $taxonomy = 'product_cat' ){
											  $orderby      = 'name';  
											  $show_count   = 0;      // 1 for yes, 0 for no
											  $pad_counts   = 0;      // 1 for yes, 0 for no
											  $hierarchical = 1;      // 1 for yes, 0 for no  
											  $title        = '';  
											  $empty        = 0;

											  $args = array(
											         'taxonomy'     => $taxonomy,
											         'orderby'      => $orderby,
											  		 'parent'       => $category_id,
											         'show_count'   => $show_count,
											         'pad_counts'   => $pad_counts,
											         'hierarchical' => $hierarchical,
											         'title_li'     => $title,
											         'hide_empty'   => $empty
											  );
											 return get_categories( $args );
										}
										function vinacen_get_categories_products_fillter_doom($all_categories){
											 foreach ($all_categories as $cat) {
											    	?>
													<li class="checkbox " id="li3">
														<input class="element " type="checkbox" name="checkproduct_cat[]" id="checkbox_product_cat_<?php echo $cat->term_id; ?>" value="<?php echo $cat->term_id; ?>">
														<label for="checkbox_product_cat_<?php echo $cat->term_id; ?>"><?php echo $cat->name; ?> 
															<?php
															$count = vinacen_count_by_query(array(
													'lang' => pll_current_language(),
															'tax_query' => array(
															        array(
															            'taxonomy' => 'product_cat',
															            'terms' => $cat->term_id,
															            'operator' => 'IN',
															        )
															    ),
															 'post_status' => 'publish', 'post_type' => 'product'));
															if($count){
																echo '('.$count.')';
															}
															?>
														</label>
														<?php 
														$childs = vinacen_get_categories_products_fillter($cat->term_id);
														if(count($childs)){
															?>
															<a href="#" class="ct-wooSearch-subButton ">+</a>
															<ul class="ct-wooSearch-sub">
																<?php vinacen_get_categories_products_fillter_doom($childs); ?>
															</ul>
															<?php
														}
														?>
													</li>
													<?php
											}
										}