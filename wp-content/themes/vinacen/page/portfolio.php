<?php
/**
template name: Portfolio
*/
get_header();
?>
<div id="primary" class="content-area">
	<main >
		<?php
			while ( have_posts() ) : the_post();
		?>
		<div class="container">
			<div class="ct-breadcrumbs-container">
				<span id="transmark"></span>
				<div class="ct-breadcrumbs ct-js-breadcrumbs" data-bg-image="<?php echo the_field('banner_in_page_products'); ?>" data-height="260" style="background-image: url(<?php echo the_field('banner_in_page_products'); ?>); height: 260px;">
					<div class="ct-breadcrumbs-title">
						<?php the_title(); ?>
					</div>
				</div>
				
			</div>
		</div>
		<section class="ct-shopSection ct-u-paddingBoth100 ct-u-diagonalTopLeft ct-u-diagonalBottomRight">
			<div class="container">
				<?php
				$label = get_field('label_below_baner');
				if($label){
				?>
				<h3 class="ct-headline text-center ct-u-marginBottom50">
				<span class="ct-headline-container ct-u-colorMotive">
					<span class="ct-headline-line ct-headline-line--left"></span>
					<?php echo $label; ?>
					<span class="ct-headline-line ct-headline-line--right"></span>
				</span>
				</h3>
				<?php
				}
				?>
				<?php
					the_content();
				?>
			</div>
			<section class="ct-u-colorWhite">
				<div>
					<div class="ct-mediaSection-inner">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<div class="container ct-u-marginBottom40">
										<?php
											do_action( 'portolio_slides' );
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="ct-u-colorWhite">
				<div>
					<div class="ct-mediaSection-inner">
						<div class="container">
							<div  class="row vc_row vc_row-fluid wpb_row" >
								<div  class="col-sm-12">
									<section class="ct-js-slick ct-slick ct-slick-arrow--type1" data-animations="true" data-autoplay="false" data-arrows="true" data-items="1" data-XSitems="1" data-SMitems="2" data-MDitems="3">
										<?php
										if( have_rows('brochure_online_slides') ):
										while ( have_rows('brochure_online_slides') ) : the_row();
										?>
										<div class="item">
											<div class="ct-js-slick ct-slick ct-slick-arrow--type1">
												<article class="ct-imageBox">
													<figure class="ct-imageBox-wrapperOuter">
														<a class="ct-js-magnificPopupImage" href="<?php the_sub_field('brochure_online_file'); ?>" title="brochure 1">
															<div class="ct-imageBox-container ct-imageBox-container-shadow">
																<div class="ct-imageBox-hover ct-imageBox-hover--type1"></div>
																<img src="<?php the_sub_field('brochure_online_slides_thumbnail'); ?>" alt="slider item img">
																<div class="ct-decoration ct-decoration-decorationBorder"><div></div></div>
															</div>
														</a>
														<figcaption class="ct-imageBox-wrapperInner ct-imageBox-wrapperInner--type3">
														<div class="ct-imageBox-titleContainer">
															<header class="ct-imageBox-metaList">
																<ul class="ct-preFooter-mainList list-unstyled list-inline">
																	<li>
																		<a href="<?php the_sub_field('brochure_online_file'); ?>" target="blank">
																			<i  class="fa fa-eye fa-eye" style="color:#9cdf3a"></i>  <?php pll_e('see brochure online'); ?>
																		</a>
																	</li>
																	<li>
																		<a download="true" href="<?php the_sub_field('brochure_online_file'); ?>" target="blank">
																			<i  class="fa fa-download fa-download" style="color:#9cdf3a"></i>  <?php pll_e('download'); ?>
																		</a>
																	</li>
																</ul>
															</header>
														</div>
														</figcaption>
													</figure>
												</article>
											</div>
										</div>
										<?php
										endwhile;
										endif;
										?>
									</section>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</section>
		<?php
			endwhile;
		?>
	</main>
</div>
<?php
get_footer();