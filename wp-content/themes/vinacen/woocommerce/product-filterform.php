<div class="ct-inner">
	<form name="Form_one" id="ct-wooSearch-form1" method="GET" role="search" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="ct-wooSearch" id="content123">
			<div class="ct-wooSearch-sortingBar ">
				<ul class="ct-wooSearch-sortBy">
					<li>
						<span class="ct-sortBy-text"><?php pll_e('Sort by'); ?></span>
						<div class="ct-select-Wrapper">
							<select class="ct-select  select2-hidden-accessible" name="orderby">
								<option value="menu-order" selected="selected"><?php pll_e('Default'); ?></option>
								<option value="popularity"><?php pll_e('Popularity'); ?></option>
								<option value="rating"><?php pll_e('Average rating'); ?></option>
								<option value="date"><?php pll_e('Newness'); ?></option>
								<option value="price"><?php pll_e('Price: low to high'); ?></option>
								<option value="price-desc"><?php pll_e('Price: high to low'); ?></option>
								<option value="rand"><?php pll_e('Random products'); ?></option>
							</select>
						</div>
					</li>
				</ul>
				<ul class="ct-wooSearch-pages">
					<li>
						<span><?php pll_e('Show'); ?></span>
						<div class="ct-select-Wrapper">
							<select class="ct-select  select2-hidden-accessible" name="posts">
								<option value="40"> 40</option>
								<option value="36"> 36</option>
								<option value="32"> 32</option>
								<option value="28"> 28</option>
								<option value="24"> 24</option>
								<option value="20" selected=""> 20</option>
								<option value="16"> 16</option>
								<option value="12"> 12</option>
								<option value="8"> &nbsp;8</option>
								<option value="4"> &nbsp;4</option>
							</select>
						</div>
						<span><?php pll_e('Per page'); ?></span>
					</li>
				</ul>
			</div>
			<!-- Selected filter -->
			<div class="ct-wooSearch-filterSelect">
				<button type="button" id="ct-wooSearch-filterIcon">
				<img class="ct-wooSearch-loader" src="http://farmfresh.themeplayers.net/wp-content/plugins/ct-woofiltering/assets/img/loader.gif" alt="icon">
				<img class="ct-wooSearch-icon" src="http://farmfresh.themeplayers.net/wp-content/plugins/ct-woofiltering/assets/img/slider-icon.png" alt="icon">
				</button>
				<div class="ct-wooSearch-filters">
					<span class="ct-wooSearch-filtersTitle"><?php pll_e('Selected filters'); ?></span>
					<div class="ct-wooSearch-scrollbar" data-mcs-axis="x" data-mcs-theme="light-3">
						<ul class="ct-wooSearch-filtersList ct-wooSearch-list" id="filter-list">
							<li id="filter3">
								<a
								href="#" class="removeThis" data-remove="checkproduct_tag[230]">mushrooms</a>
								<span
								class="removeThis" data-remove="checkproduct_tag[230]">x</span>
							</li>
							
							<li id="filter3">
								<a
								href="#" class="removeThis" data-remove="checkproduct_tag[231]">fresh</a>
								<span
								class="removeThis" data-remove="checkproduct_tag[231]">x</span>
							</li>
							
							<li id="filter5">
								<a href="#" class="removeThis" data-remove="selecproduct_type">simple</a>
								<span class="removeThis" data-remove="selecproduct_type">x</span>
							</li>
							<li id="filter6">
								<a href="#" class="removeThis" data-remove="selecpa_color">Green</a>
								<span class="removeThis" data-remove="selecpa_color">x</span>
							</li>
							<li id="filter7">
								<a href="#" class="removeThis" data-remove="range">&pound;5 - &pound;23</a>
								<span class="removeThis" data-remove="range">x</span>
							</li>
							<li id="filter9">
								<a href="#" class="removeThis" data-remove="on_sale">On sale</a>
								<span class="removeThis"
								data-remove="on_sale">x</span>
							</li>
							<li id="filter10">
								<a href="#" class="removeThis" data-remove="in_stock">In stock</a>
								<span class="removeThis" data-remove="in_stock">x</span>
							</li>
						</ul>
						<span class="ct-wooSearch-filtersClear">
							<a id="ct-wooSearch-clear"><?php pll_e('Clear all'); ?></a>
						</span>
					</div>
					<span class="ct-wooSearch-noFilters">
						<?php pll_e('No filters selected'); ?>
					</span>
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
												<input class="element " type="checkbox" name="checkproduct_tag[]" id="checkbox_product_tag_<?php echo $tag->term_id; ?>" value="<?php echo $tag->term_id; ?>">
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
								<h4 class="ct-wooSearch-filterTitle">Product shipping classes</h4>
								<div class="ct-wooSearch-filterWrapper ct-wooSearch-selWrapper">
									<div class="ct-select-Wrapper">
										<select class="ct-select  " name="selecproduct_shipping_class">
											<option value=''  selected='selected'><?php pll_e('None'); ?></option>
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
											foreach ($array as $color) {
												$count = vinacen_count_by_query( array(
												'lang' => pll_current_language(),
												'tax_query' => array(
												        array(
												            'taxonomy' => 'product_type',
												            'terms' => $color->name,
            												'field'    => 'slug',
												        )
												    ),
												'post_status' => 'publish', 'post_type' => 'product') );
												echo '<option value="'.$color->term_id.'">'.$color->name.' '.($count ? '('.$count.')' : '').'</option>';
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
												echo '<option value="'.$color->term_id.'">'.$color->name.' '.($count ? '('.$count.')' : '').'</option>';
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
									value="" name="range" />
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
								<input type="checkbox" id="1" style="display:inline-block!important" name="on_sale" class="">
								<label for="1"><?php pll_e('Show only products on sale'); ?></label>
							</div>
							<div class="ct-wooSearch-footerFilters ct-wooSearch-inStock">
								<input type="checkbox" id="2" style="display:inline-block!important" name="in_stock" clas="">
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