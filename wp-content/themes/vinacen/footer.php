<?php require_once(get_template_directory().'/components/parallax.php'); ?>
<section class="container">
	<h3 class="ct-headline text-center ct-u-marginBottom50">
	<span class="ct-headline-container ct-u-colorMotive">
		<span class="ct-headline-line ct-headline-line--left"></span>
		<?php pll_e('our notice board    '); ?>
		<span class="ct-headline-line ct-headline-line--right"></span>
	</span>
	</h3>
</section>
<div class="container">
	<?php do_action('our-notice-board'); ?>
</div>
<div class="ct-u-borderTop">
	<section class="container ct-u-marginBoth50">
		<h3 class="ct-headline text-left">
		<span class="ct-headline-container ct-u-colorMotive">
			<span class="ct-headline-line ct-headline-line--left"></span>
			<?php pll_e('Our brands'); ?>
			<span class="ct-headline-line ct-headline-line--right"></span>
		</span>
		</h3>
	</section>
</div>
<section class="ct-u-paddingBottom50">
	<div class="container">
		<?php do_action('show-brands-slide'); ?>
	</div>
</section>
<footer>
	<!--main footer!-->
	<div class="ct-preFooter ct-u-backgroundGray ct-u-paddingTop70 ct-u-paddingBottom15">
		<div class="container">
			<div class="row" id="widget-footer">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
		</div>
	</div>
</div>
<!--main footer end!-->
<!--post footer!-->
<div class="ct-postFooter">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div  id="copyright-2" class="widget-1 widget-first copyright widget widget-postfooter"><span  class="ct-copyright">© 2018 Organic Farm Fresh. All Rights Reserved.</span></div>                    </div>
				<div class="col-sm-6">
					<div  id="ct_simple_gallery-2" class="widget-1 widget-first ct_simple_gallery widget widget-postfooter">
						<!--simple gallery start-->
						<ul class="list-unstyled list-inline ct-u-marginBoth0">
							<li><img src="http://farmfresh.themeplayers.net/wp-content/uploads/2015/10/cart1.jpg" alt="gallery item"></li>
							<li><img src="http://farmfresh.themeplayers.net/wp-content/uploads/2015/10/cart2.jpg" alt="gallery item"></li>
							<li><img src="http://farmfresh.themeplayers.net/wp-content/uploads/2015/10/cart3.jpg" alt="gallery item"></li>
							<li><img src="http://farmfresh.themeplayers.net/wp-content/uploads/2015/10/cart4.jpg" alt="gallery item"></li>
						</ul>
						<!--simple gallery end-->
					</div>                    </div>
				</div>
			</div>
		</div>
		<!--post footer end!-->
	</footer>
</div>
<a href="#" class="ct-js-btnScrollUp"><i class="fa fa-angle-up"></i></a>
<?php wp_footer(); ?>
</body>
</html>