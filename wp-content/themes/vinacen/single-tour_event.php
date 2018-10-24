<?php get_header(); ?>
<div id="primary" class="content-area">
	<?php
	if(have_posts()){
		while(have_posts()){
			the_post();
	?>
	<main >
		<div class="container">
			<div class="ct-breadcrumbs-container">
				<span id="transmark"></span>
				<div class="ct-breadcrumbs ct-js-breadcrumbs" data-bg-image="/wp-content/uploads/2018/10/breadcrumbs3.png" data-height="260" style="background-image: url(/wp-content/uploads/2018/10/breadcrumbs3.png); height: 260px;">
					<div class="ct-breadcrumbs-title">
						<?php the_title(); ?>
					</div>
				</div>
			</div>
		</div>
		<section class="container">
			<h3 class="ct-headline text-center ct-u-marginBottom50">
			<span class="ct-headline-container ct-u-colorMotive">
				<span class="ct-headline-line ct-headline-line--left"></span>
				<?php pll_e('Single Event'); ?>
				<span class="ct-headline-line ct-headline-line--right"></span>
			</span>
			</h3>
		</section>
		
		<section class="ct-single-event">
			<div class="container">
				<div class="ct-blog-item-outer">
					<div class="ct-blog-item-wrapper">
						<div class="ct-blog-item-inner">
							<section>
							<div class="ct-single-event-preTitle text-center" xmlns="http://www.w3.org/1999/html">
								<p>
									<!--post single author meta!-->
									<?php pll_e('By'); ?>&nbsp;
									<a href="<?php the_author_link(); ?>"><?php the_author( ); ?></a>
									<!--post single author meta end!-->
									
									<!--post single date meta!-->
									&nbsp;<span class="text-uppercase"><?php pll_e('Created On'); ?></span> 
									<time datetime="<?php the_date(); ?>"><?php the_date(); ?></time>
									<!--post single date meta end!-->
									
								</p>
							</div>
							<div class="ct-single-event-title text-center">
								<h3 title="<?php the_title(); ?>"><span><?php the_title(); ?></span></h3>
							</div>
							<?php the_content(); ?>
							<div class="ct-divider ct-divider--big ct-u-marginBottom30"></div>
							<div class="ct-single-event-social pull-right">
                                <ul class="socialicons socialicons--image">
                                	<li><a href="http://www.facebook.com/https://www.facebook.com/createITpl " target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="facebook"><i class="fa fa-facebook"></i></a></li>
                                	<li><a href="http://plus.google.com/# " target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="google"><i class="fa fa-google-plus"></i></a></li>
                                	<li><a href="http://instagram.com/# " target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="instagram"><i class="fa fa-instagram"></i></a></li>
                                	<li><a href="http://#.tumblr.com# " target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="tumblr"><i class="fa fa-tumblr"></i></a></li>
                                	<li><a href="http://www.twitter.com/# " target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="twitter"><i class="fa fa-twitter"></i></a></li>
                                </ul>                            
                            </div>
							<div class="ct-single-event-categories">
								<p><?php pll_e('Categories'); ?>:</p>
								<ul class="list-unstyled list-inline">
									<li>
									<?php the_category( '</li><li>'); ?>
								</li>
							</ul>
						</div>
						<div class="ct-singlePost-pagination">
							<ul class="list-unstyled clearfix">
								<?php
									$previous_post = get_previous_post( );
									if($previous_post){
								?>
								<li class="pull-left">
									<div class="ct-singlePost-pagination-inner ">
										<div class="ct-ct-singlePost-pagination-arrowLeft">
											<a href="<?php the_permalink( $previous_post->ID ); ?>"></a>
										</div>
										<div class="media ct-media">
											<div class="media-left">
												<a href="<?php the_permalink( $previous_post->ID ); ?>">
													<img src="<?php echo get_the_post_thumbnail_url($previous_post->ID ); ?>" alt="<?php the_post_thumbnail_caption($previous_post->ID); ?>" class="media-object ct-media-object">
												</a>
											</div>
											<div class="media-body ct-media-body media-middle">
												<a href="<?php the_permalink( $previous_post->ID ); ?>"><h6 title="<?php echo get_the_title($previous_post->ID); ?>" class="media-heading ct-media-heading"><?php echo get_the_title($previous_post->ID); ?></h6>
												</a>
											</div>
										</div>
									</div>
								</li>
								<?php
								}
								?>
								<?php
									$next_post = get_next_post( );
									if($next_post){
								?>
								<li class="pull-right">
									<div class="ct-singlePost-pagination-inner ">
										<div class="ct-ct-singlePost-pagination-arrowRight">
											<a href="<?php the_permalink( $next_post->ID ); ?>"></a>
										</div>
										<div class="media ct-media">
											<div class="media-body ct-media-body media-middle">
												<a href="<?php the_permalink( $next_post->ID ); ?>"><h6 class="media-heading ct-media-heading" title="<?php echo get_the_title($next_post->ID); ?>"><?php echo get_the_title($next_post->ID); ?></h6>
												</a>
											</div>
											<div class="media-right">
												<a href="<?php the_permalink( $next_post->ID ); ?>">
													<img src="<?php  echo get_the_post_thumbnail_url($next_post->ID ); ?>" alt="<?php the_post_thumbnail_caption($next_post->ID); ?>" class="media-object ct-media-object">
												</a>
											</div>
										</div>
									</div>
								</li>
								<?php
								}
								?>
							</ul>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</section>
</main>
<?php
}
}
?>
</div>
<?php get_footer(); ?>