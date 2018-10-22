<?php get_header(); ?>
<div id="primary" class="content-area">
	<main >
		<div class="container">
			<div class="ct-breadcrumbs-container">
				<span id="transmark"></span>
				<div class="ct-breadcrumbs ct-js-breadcrumbs" data-bg-image="/wp-content/uploads/2018/10/breadcrumbs3.png" data-height="260" style="background-image: url(/wp-content/uploads/2018/10/breadcrumbs3.png); height: 260px;">
					<div class="ct-breadcrumbs-title">
						<?php pll_e('Blog'); ?>
					</div>
				</div>
			</div>
		</div>
		<section class="container">
			<h3 class="ct-headline text-center ct-u-marginBottom50">
			<span class="ct-headline-container ct-u-colorMotive">
				<span class="ct-headline-line ct-headline-line--left"></span>
				<?php pll_e('Single article'); ?>
				<span class="ct-headline-line ct-headline-line--right"></span>
			</span>
			</h3>
		</section>
		
		<section>
			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						
						<?php
						if(have_posts()){
							while(have_posts()){
								the_post();
						?>
						<div class="ct-blog-item-outer">
							<div class="ct-blog-item-media">
								<figure>
									<a href="http://farmfresh.themeplayers.net/bunch-of-fresh-asparagus-on-wooden-table/">
										<?php the_post_thumbnail("full"); ?>
									</a>
								</figure>
							</div>
							<div class="ct-blog-item-wrapper">
								<div class="ct-blog-item-inner">
									<section>
										<div class="ct-blog-item-preTitle text-center" xmlns="http://www.w3.org/1999/html">
											<p>
												<!--post single author meta!-->
												<?php pll_e('By'); ?>&nbsp;
												<a href="#"><?php the_author( ); ?></a>
												<!--post single author meta end!-->
												
												<!--post single date meta!-->
												&nbsp;<?php pll_e('On'); ?>   <time datetime="<?php the_date(); ?>"><?php the_date(); ?></time>
												<!--post single date meta end!-->
												
											</p>
										</div>
										<div class="ct-blog-item-title text-center">
											<h3 title="<?php the_title(); ?>"><span><?php the_title(); ?></span></h3>
										</div>
										<?php the_content(); ?>
										<div class="ct-divider ct-divider--big ct-u-marginBottom30"></div>
										<div class="ct-blog-item-tags">
											<p><?php pll_e('Tags'); ?>:</p>
											<?php the_tags( '<ul class="list-unstyled list-inline"><li>' ,'</li><li>', '</li></ul>' ); ?>
										</div>
										<div class="ct-blog-item-categories">
											<p><?php pll_e('In'); ?>:</p>
											<ul class="list-unstyled list-inline">
												<li>
												<?php the_category( '</li><li>'); ?>
											</li>
										</ul>
									</div>
									<div class="ct-singlePost-pagination">
										<ul class="list-unstyled">
											<?php
												$previous_post = get_previous_post( );
												if($previous_post){
											?>
											?>
											<li>
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
											<li>
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
					<?php
					}
					}
					?>
				</div>
				<div class="col-sm-6 col-lg-3 ct-sidebar-right">
					<?php if ( is_active_sidebar( 'sidebar-single' )  ) : ?>
					<?php dynamic_sidebar( 'sidebar-single' ); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
</main>
</div>
<?php get_footer(); ?>