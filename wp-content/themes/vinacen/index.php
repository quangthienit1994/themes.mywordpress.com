<?php get_header(); ?>
<section  class="ct-u-colorWhite ct-u-paddingTop50">
	<div >
		<div class="ct-mediaSection-inner">
			<div class="container">
				<div  class="row vc_row vc_row-fluid wpb_row" >
					<div  class="col-sm-12 col-md-8">
						<?php do_action('vinacen_slides_at_home'); ?>
					</div>
					<div  class="col-sm-12 col-md-4">
						<div class="vc_row wpb_row vc_inner vc_row-fluid">
							<?php 
								/**
								 * location to add: at fields "Posts At Right Slides At Home"
								 */
								do_action('attach_to_right_slides_at_home');
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="container">
	<h3 class="ct-headline text-center ct-u-marginBottom50">
	<span class="ct-headline-container ct-u-colorMotive">
		<span class="ct-headline-line ct-headline-line--left"></span>
		this week’s featured
		<span class="ct-headline-line ct-headline-line--right"></span>
	</span>
	</h3>

	<?php do_action('vinacen_featured_weeks_slides'); ?>
</div>
<?php get_footer(); ?>