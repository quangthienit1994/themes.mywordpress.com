<?php
get_header();
if(have_posts()){
	while(have_posts()){
		the_post();
?>
<section class="ct-u-marginTop40 ct-u-marginBottom80">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img class="ct-u-borderAll2 ct-u-marginBottom30 img-responsive w-100" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
			</div>
			<div class="col-md-6">
				<div class="col-xs-12">
					<h3 class="ct-u-ff--2 ct-u-colorMotive ct-u-marginBottom20" title="<?php the_title(); ?>"><?php the_title(); ?></h3>
					<?php the_content(); ?>
					<p class="ct-u-colorGray ct-u-marginBottom10"><span class="ct-fw-600">Phone:</span> <?php the_field('phone'); ?></p>
					<p class="ct-u-colorGray ct-u-marginBottom40"><span class="ct-fw-600">Email:</span> <?php the_field('email'); ?></p>
					
					<ul class="socialicons socialicons--image">
						<li><a href="<?php the_field('facebook'); ?>" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="<?php the_field('linkedin'); ?>" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="linkedin"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="<?php the_field('twitter'); ?>" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="twitter"><i class="fa fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
}
}
?>
<section class="container">
	<h3 class="ct-headline text-center ct-u-marginBottom50">
	<span class="ct-headline-container ct-u-colorMotive">
		<span class="ct-headline-line ct-headline-line--left"></span>
		<?php pll_e('Our Great Team'); ?>
		<span class="ct-headline-line ct-headline-line--right"></span>
	</span>
	</h3>
</section>
<section class="ct-u-marginBottom40">
	<div class="container">
		<?php do_action( 'show-members-slide'); ?>
	</div>
</section>
<?php
get_footer();