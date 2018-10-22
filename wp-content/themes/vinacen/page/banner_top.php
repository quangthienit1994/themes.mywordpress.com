<?php
/**
template name: banner top
*/
get_header(); ?>
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
		</section>
		<?php
			endwhile;
		?>
	</main>
</div>
<?php get_footer(); ?>