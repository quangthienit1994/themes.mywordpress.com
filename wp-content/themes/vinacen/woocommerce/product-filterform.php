<?php 
	$oders = array(
		"menu" => "Default",
		"popularity" => "Popularity",
		"rating" => "Average rating",
		"date" => "Newnest",
		"price" => "Price: low to high",
		"price-desc" => "Price: high to low",
		"rand" => "Random products",
	);
	$orderBy = isset($_GET['orderby']) ? $_GET['orderby'] : 'menu';
	$posts_limit = isset($_GET['posts']) ? $_GET['posts'] : 20;
	$posts_per_pages = array(40, 36, 32, 28, 24, 20, 16, 12, 8 ,4);
?>
<div class="ct-inner">
	<form name="Form_one" id="ct-wooSearch-form1" method="GET" role="search" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="ct-wooSearch" id="content123">
			<div class="ct-wooSearch-sortingBar ">
				<ul class="ct-wooSearch-sortBy">
					<li>
						<span class="ct-sortBy-text"><?php pll_e('Sort by'); ?></span>
						<div class="ct-select-Wrapper">
							<select class="ct-select  select2-hidden-accessible" name="orderby">
								<?php 
								foreach ($oders as $key => $value) {
									?>
										<option value="<?php echo $key; ?>" <?php echo $orderBy === $key ? 'selected="selected"' : '' ?>><?php pll_e($value); ?></option>
									<?php
								}
								?>
							</select>
						</div>
					</li>
				</ul>
				<ul class="ct-wooSearch-pages">
					<li>
						<span><?php pll_e('Show'); ?></span>
						<div class="ct-select-Wrapper">
							<select class="ct-select  select2-hidden-accessible" name="posts">
								<?php 
								for($i = 0; $i < count($posts_per_pages); $i++){
									$value = $posts_per_pages[$i];
									?>
										<option value="<?php echo $value; ?>" <?php echo (int)$posts_limit === (int)$value ? 'selected="selected"' : '' ?>><?php pll_e($value); ?></option>
									<?php
								}
								?>
							</select>
						</div>
						<span><?php pll_e('Per page'); ?></span>
					</li>
				</ul>
			</div>
			<!-- Selected filter -->
			<div class="ct-wooSearch-filterSelect">
				<button type="button" id="ct-wooSearch-filterIcon">
				<img class="ct-wooSearch-loader" src="<?php echo get_template_directory_uri(); ?>/assets/images/loader.gif" alt="icon">
				<img class="ct-wooSearch-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/slider-icon.png" alt="icon">
				</button>
				<div class="ct-wooSearch-filters">
					<span class="ct-wooSearch-filtersTitle"><?php pll_e('Selected filters'); ?></span>
					<?php 

					if(isset($_GET) && !empty($_GET)){
						?>
						<div class="ct-wooSearch-scrollbar" data-mcs-axis="x" data-mcs-theme="light-3">
							<ul class="ct-wooSearch-filtersList ct-wooSearch-list" id="filter-list">
								<?php 
								$i = 0;
								foreach ($_GET as $key => $value) {
									if(!$value){
										continue;
									}
									if(is_string($value)){
										$v = $value;
										switch ($key) {
											case 'on_sale':
												$v = "On Sale";
												break;
											case 'in_stock':
												$v = "In Stock";
												break;
											case 'orderby':
											case 'posts':
											case 'ct_filter':
											case 'range':
												continue;
										}
									?>
										<li id="filter<?php echo $i; ?>">
											<a
											href="#" class="removeThis" data-remove="<?php echo $key; ?>"><?php echo $v; ?></a>
											<span
											class="removeThis" data-remove="<?php echo $key; ?>">x</span>
										</li>
									<?php
									}else{
										foreach ($value as $k => $v) {
											?>
												<li id="filter<?php echo $i; ?>">
													<a
													href="#" class="removeThis" data-remove="<?php echo $key; ?>[<?php echo $k ?>]"><?php echo $v; ?></a>
													<span
													class="removeThis" data-remove="<?php echo $key; ?>[<?php echo $k ?>]">x</span>
												</li>
											<?php
										}
									}
									$i++;
								}
								?>
							</ul>
							<span class="ct-wooSearch-filtersClear">
								<a id="ct-wooSearch-clear"><?php pll_e('Clear all'); ?></a>
							</span>
						</div>
						<?php
					}else{
						?>
							<span class="ct-wooSearch-noFilters">
								<?php pll_e('No filters selected'); ?>
							</span>
						<?php
					}

					?>
				</div>
			</div>
			<!-- Possible options -->
			<div id="ct-wooSearch-plugin" class="  " style="display: block;">
				<div class="ct-wooSearch-searchContent" id="optionSection">
					<div class="ct-wooSearch-row">
						<div class="ct-wooSearch-col--5 ct-wooSearch-col-push--1">
							<div class="ct-wooSearch-filter" id="ct-wooSearch-filter_product_tag">
								<h4 class="ct-wooSearch-filterTitle"><?php pll_e('Product tags'); ?></h4>
								<div class="ct-wooSearch-filterWrapper ct-wooSearch-simCheckWrapper">
									<ul class="">
										<?php 
										$tags = vinacen_get_categories_products_fillter(null, 'product_tag');
										foreach ($tags as $tag) {
											?>
											<li class="checkbox " id="li1">
												<input 
												
												<?php 
												$check = isset($_GET['checkproduct_tag']) && isset($_GET['checkproduct_tag'][$tag->term_id]) ? true : false;
												if($check){
													echo 'checked';
												}
												?>

												class="element " type="checkbox" name="checkproduct_tag[<?php echo $tag->term_id; ?>]" id="checkbox_product_tag_<?php echo $tag->term_id; ?>" value="<?php echo $tag->name; ?>">
												<label for="checkbox_product_tag_<?php echo $tag->term_id; ?>"><?php echo $tag->name; ?> 
													<?php
														$count = vinacen_count_by_query(array(
															'lang' => pll_current_language(),
															'tax_query' => array(
															        array(
															            'taxonomy' => 'product_tag',
															            'terms' => $tag->term_id,
															            'operator' => 'IN',
															        )
															    ), 'post_status' => 'publish', 'post_type' => 'product'));
														if($count){
															echo '('.$count.')';
														}
													?>
												</label>
											</li>
											<?php
										}
										?>
									</ul>
								</div>
							</div>
							<div class="ct-wooSearch-filter" id="ct-wooSearch-filter_product_shipping_class">
								<h4 class="ct-wooSearch-filterTitle"><?php pll_e('Product shipping classes'); ?></h4>
								<div class="ct-wooSearch-filterWrapper ct-wooSearch-selWrapper">
									<div class="ct-select-Wrapper">
										<select class="ct-select  " name="selecproduct_shipping_class">
											<option value=''  selected='selected'><?php pll_e('None'); ?></option>
											<?php 
											$array = get_terms(array('taxonomy' => 'product_shipping_class', 'hide_empty' => false));
											$product_type = vinacen_get_value('selecproduct_shipping_class');
											foreach ($array as $type) {
												$count = vinacen_count_by_query( array(
												'lang' => pll_current_language(),
												'tax_query' => array(
												        array(
												            'taxonomy' => 'product_shipping_class',
												            'terms' => $type->name,
            												'field'    => 'slug',
												        )
												    ),
												'post_status' => 'publish', 'post_type' => 'product') );
												echo '<option '.($product_type === $type->name ? 'selected' : '').' value="'.$type->name.'">'.$type->name.' '.($count ? '('.$count.')' : '').'</option>';
											}
											?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="ct-wooSearch-col--5 ct-wooSearch-col-push--1">
							<div class="ct-wooSearch-filter" id="ct-wooSearch-filter_product_cat">
								<h4 class="ct-wooSearch-filterTitle"><?php pll_e('Product categories'); ?></h4>
								<div class="ct-wooSearch-filterWrapper ct-wooSearch-simCheckWrapper">
									<ul class="">
										<?php 
											$cats = vinacen_get_categories_products_fillter();
											vinacen_get_categories_products_fillter_doom($cats);
										?>
									</ul>
								</div>
							</div>
							<div class="ct-wooSearch-filter" id="ct-wooSearch-filter_product_type">
								<h4 class="ct-wooSearch-filterTitle"><?php pll_e('Product Type'); ?></h4>
								<div class="ct-wooSearch-filterWrapper ct-wooSearch-selWrapper">
									<div class="ct-select-Wrapper">
										<select class="ct-select   select2-hidden-accessible" name="selecproduct_type" tabindex="-1" aria-hidden="true">
											<option value="" selected="selected"><?php pll_e('None'); ?></option>
											<?php 
											$array = get_terms(array('taxonomy' => 'product_type', 'hide_empty' => false));
											$product_type = vinacen_get_value('selecproduct_type');
											foreach ($array as $type) {
												$count = vinacen_count_by_query( array(
												'lang' => pll_current_language(),
												'tax_query' => array(
												        array(
												            'taxonomy' => 'product_type',
												            'terms' => $type->name,
            												'field'    => 'slug',
												        )
												    ),
												'post_status' => 'publish', 'post_type' => 'product') );
												echo '<option '.($product_type === $type->name ? 'selected' : '').' value="'.$type->name.'">'.$type->name.' '.($count ? '('.$count.')' : '').'</option>';
											}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="ct-wooSearch-filter" id="ct-wooSearch-filter_pa_color">
								<h4 class="ct-wooSearch-filterTitle"><?php pll_e('Product color'); ?></h4>
								<div class="ct-wooSearch-filterWrapper ct-wooSearch-selWrapper">
									<div class="ct-select-Wrapper">
										<select class="ct-select   select2-hidden-accessible" name="selecpa_color" tabindex="-1" aria-hidden="true">
											<option value="" selected="selected"><?php pll_e('None'); ?></option>
											<?php 
											$array = get_terms(array('taxonomy' => 'pa_color', 'hide_empty' => false));
											$color_value = vinacen_get_value('selecpa_color');
											foreach ($array as $color) {
												$count = vinacen_count_by_query( array(
													'lang' => pll_current_language(),
													'tax_query' => array(
												        array(
												            'taxonomy' => 'pa_color',
												            'field'           => 'slug',
												            'terms' => array($color->name),
												            'operator' => 'IN',
												        )
												    ),
												 	'post_status' => 'publish', 'post_type' => 'product') );
												echo '<option '.($color_value === $color->name ? 'selected' : '').' value="'.$color->name.'">'.$color->name.' '.($count ? '('.$count.')' : '').'</option>';
											}
											?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="ct-wooSearch-footer">
					<div class="ct-wooSearch-row">
						<div class="ct-wooSearch-col--4">
							<div class="ct-wooSearch-filter" id="ct-wooSearch-filter_price">
								<div class="ct-wooSearch-filterWrapper ct-wooSearch-slider-custom">
									<input type="text" id="range"
									class=""
									data-prefix="<?php echo get_woocommerce_currency_symbol(); ?>"
									data-min="5" data-max="30"
									data-grid="false"
									data-step="0"
									data-grid-snap="false"
									value="<?php echo vinacen_get_value('range'); ?>" name="range" />
								</div>
							</div>
						</div>
						<div class="ct-wooSearch-col--8">
							<div class="ct-wooSearch-button">
								<button class="btn ct-btn-image btn-warning" type="submit">
									<span><?php pll_e('Filter products'); ?></span>
								</button>
							</div>
							<input id="ct-isFiltering" type="hidden" name="ct_filter" value="true">
							<div class="ct-wooSearch-footerFilters ct-wooSearch-onSale">
								<input <?php echo vinacen_get_value('on_sale') === 'on' ? 'checked' : ''; ?> type="checkbox" id="1" style="display:inline-block!important" name="on_sale" class="">
								<label for="1"><?php pll_e('Show only products on sale'); ?></label>
							</div>
							<div class="ct-wooSearch-footerFilters ct-wooSearch-inStock">
								<input <?php echo vinacen_get_value('in_stock') === 'on' ? 'checked' : ''; ?> type="checkbox" id="2" style="display:inline-block!important" name="in_stock" clas="">
								<label for="2"><?php pll_e('Show only products in stock'); ?></label>
							</div>
						</div>
					</div>

					<input type="hidden" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
					<input type="hidden" name="post_type" value="product" />
					<style>.mCustomScrollbar .mCustomScrollBox{width:54%;}</style>
				</div>
			</div>
		</div>
	</form>
</div>
<?php wp_reset_query(); ?>
