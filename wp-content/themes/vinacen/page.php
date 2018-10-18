<?php get_header(); ?>
<div id="primary" class="content-area">
	<main >
		<div class="container">
			<div class="ct-breadcrumbs-container">
				<span id="transmark"></span>
				<div class="ct-breadcrumbs ct-js-breadcrumbs" data-bg-image="<?php echo the_field('banner_in_page_products'); ?>" data-height="260" style="background-image: url(<?php echo the_field('banner_in_page_products'); ?>); height: 260px;">
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
						while ( have_posts() ) : the_post();
							the_content();
						endwhile;
						?>
					</div>
					<div class="col-md-3 col-md-pull-9 ct-js-sidebar"><?php get_sidebar( 'products' ); ?></div>
				</div>
			</div>
		</section>
	</main>
</div>
<?php get_footer(); ?>