<?php
/**
template name: Tour Event
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
		
		<div class="container">
			<?php
				$args = array(
					'lang' => pll_current_language(),
					'post_type'   => 'tour_event',
					'post_status' => 'publish',
					'order'               => 'DESC',
					'orderby'             => 'date',
					'ignore_sticky_posts' => true,
					'posts_per_page'         => 1,
				    'tax_query' => array(
				        array(                
				            'taxonomy' => 'post_format',
				            'field' => 'slug',
				            'terms' => array( 
				                'post-format-gallery',
				            ),
            			'operator' => 'IN'
        				)
				    )
				);
			
			$query = new WP_Query( $args );
			if($query->have_posts()){
				while($query->have_posts()){
					$query->the_post();
			?>
			<article class="ct-event-item ct-event-item--type1">
				<div class="ct-event-item-outer">
					<div class="ct-event-item-media">
						<?php
						$media = get_field('gallery');
						?>
						<figure>
							<div class="ct-slick--synced ct-slick--synced--type2" id="synced-5636">
								<div class="ct-slick ct-js-slick ct-js-slick-for" data-items="1" data-arrows="false" data-draggable="false" data-touchMove="false">
									<?php
									if($media){
										foreach ($media as $value) {
									?>
									<div class="item">
										<img src="<?php echo $value['sizes']['large']; ?>" alt="<?php echo $value['title']; ?>">
									</div>
									<?php
									}
									}
									?>
								</div>
								<div class="ct-slick ct-js-slick ct-js-slick-nav ct-slick-arrow--type4 ct-slick-thumbnailHover--type2" data-items="2" data-centerMode="false" data-centerPadding="0" data-asNavFor="#synced-5636 .ct-js-slick-for" data-XSitems="2" data-SMitems="4" data-focusOnSelect="true">
									<?php
									if($media){
										foreach ($media as $value) {
									?>
									<div class="item">
										<img src="<?php echo $value['sizes']['medium']; ?>" alt="<?php echo $value['title']; ?>">
									</div>
									<?
									}
									}
									?>
								</div>
							</div>
						</figure>
					</div>
					<div class="ct-event-item-wrapper">
						<div class="ct-imagedata ct-imagedata--left">
							<span class="ct-imagedata-day"><?php echo get_the_date('d'); ?></span>
							<span class="ct-imagedata-month"><?php echo get_the_date('M'); ?></span>
						</div>
						
						<div class="ct-event-item-inner">
							<section>
								<div class="ct-event-title">
									<a href="http://farmfresh.themeplayers.net/events/customer-appreciation-farm-tour/">
										<h6><span><?php the_title(); ?></span></h6>
									</a>
								</div>
								<div class="ct-event-text">
									<p><?php the_excerpt(); ?></p>
								</div>
								<div class="text-left">
									<a href="<?php the_permalink(); ?>"
										class="btn ct-btn-image btn-default"><span><?php pll_e('Buy Tickets'); ?></span>
									</a>
								</div>
							</section>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</article>
			<?php
			}
			}
			wp_reset_query();
			?>
			<!-- END POST FONT -->
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
				$args = array(
					'lang' => pll_current_language(),
					'post_type'   => 'tour_event',
					'post_status' => 'publish',
					'order'               => 'DESC',
					'orderby'             => 'date',
					'ignore_sticky_posts' => false,
					'posts_per_page'         => -1,
				);
			
			$query = new WP_Query( $args );
			if($query->have_posts()){
				while($query->have_posts()){
					$query->the_post();
			?>
			<article class="ct-event-item ct-event-item--type2">
				<div class="ct-event-item-outer">
					<div class="ct-event-item-media">
						<figure>
							<a href="<?php the_permalink(); ?>">
								<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
							</a>
							<div class="ct-imagedata ct-imagedata--left">
								
								<span class="ct-imagedata-day"><?php echo get_the_date('d'); ?>&nbsp;</span>
								<span class="ct-imagedata-month"><?php echo get_the_date('M'); ?>&nbsp;</span>                                </div>
							</figure>
						</div>
						<div class="ct-event-item-wrapper">
							<div class="ct-event-item-inner">
								<section>
									<div class="ct-event-title">
										<a href="<?php the_permalink(); ?>">
											<h6 title="<?php the_title(); ?>"><span class="ct-u-colorSecondary"><?php the_title(); ?></span></h6>
										</a>
									</div>
									
									<div class="ct-event-location">
										<ul class="list-unstyled">
											<li>
												<p>DATE: &nbsp;<?php the_field('date'); ?></p>
											</li>
											<li>
												<p>TIME: &nbsp;<?php the_field('time'); ?></p>
											</li>
											<li>
												<p>
												LOCATION: &nbsp;<?php the_field('location'); ?></p>
											</li>
										</ul>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="ct-event-meta">
												<ul class="list-unstyled list-inline">
													<li>
														<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>"><?php pll_e('Share this Event'); ?></a>
													</li>
													<li>
														<a href="http://farmfresh.themeplayers.net/get-in-touch/"><?php pll_e('Directions'); ?></a>
													</li>
												</ul>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="text-right">
												<a href="<?php the_permalink(); ?>" class="btn ct-btn-image btn-warning"><span><?php pll_e('Learn more'); ?></span></a>
												<a href="<?php echo get_the_permalink(248); ?>" class="btn ct-btn-image btn-default"><span><?php pll_e('Buy Tickets'); ?></span></a>
											</div>
										</div>
									</div>
								</section>
							</div>
						</div>
						<?php the_excerpt(); ?>
					</div>
					<div class="clearfix"></div>
					<div class="ct-divider ct-divider--big ct-u-marginTop10 ct-u-marginBottom30"></div>
				</article>
				<?php
					}
				}
				wp_reset_query();
				?>
			</div>
			<?php
				endwhile;
			?>
		</main>
	</div>
	<?php get_footer(); ?>