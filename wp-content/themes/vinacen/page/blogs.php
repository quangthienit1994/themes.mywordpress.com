<?php
/**
template name: Blogs
*/
get_header(); ?>
<div id="primary" class="content-area">
	<main >
		<?php
		if(have_posts()){
			while(have_posts()){
				the_post();
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
		<section class="container">
			<h3 class="ct-headline text-center ct-u-marginBottom50">
			<span class="ct-headline-container ct-u-colorMotive">
				<span class="ct-headline-line ct-headline-line--left"></span>
				<?php the_field('label_below_baner'); ?>
				<span class="ct-headline-line ct-headline-line--right"></span>
			</span>
			</h3>
		</section>
		
		<section>
			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<div class="ct-blog-container ct-gallery">
							<?php
								$args = array(
									'post_type'   => 'post',
									'post_status' => 'publish',
									'lang' => pll_current_language(),
									'order'               => 'DESC',
									'orderby'             => 'date',
									'posts_per_page'         => get_option( 'posts_per_page', 10 ),
									'paged'                  => get_query_var( 'paged' ),
							
								);
							
							$query = new WP_Query( $args );
							
							if($query->have_posts()){
								while($query->have_posts()){
									$query->the_post();
							?>
							<article id="post-2586" <?php post_class("ct-blog-item ct-gallery-item ct-gallery-item--type2"); ?>>
								<div class="ct-blog-item-outer">
									<div class="ct-blog-item-media">
										<figure>
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail(); ?>
											</a>
										</figure>
									</div>
									<div class="ct-blog-item-wrapper">
										<div class="ct-blog-item-inner">
											<section>
												<div class="ct-blog-item-title">
													<a href="<?php the_permalink(); ?>">
														<h5 title="<?php the_title(); ?>"><span><?php the_title(); ?></span></h5>
													</a>
												</div>
												<div class="ct-blog-item-meta"><span>
													By&nbsp;
													<a href="<?php the_permalink(); ?>"><span class="ct-blog-item-meta-author">admin</span></a>
													&nbsp;On                <time datetime="October 18, 2015"> October 18, 2015</time>
													&nbsp;-&nbsp;<a href="<?php the_permalink(); ?>/#comments"><span class="ct-blog-item-meta-comments"><?php get_comments_number() || 0; ?> <?php pll_e('Comments'); ?> </span></a></span>
												</div>
												<div class="ct-blog-item-contentText">
													<p class="ct-u-colorBrownDark2">
														<?php the_excerpt(); ?>
													</p>
												</div>
												<div class="text-left">
													<a href="<?php the_permalink(); ?>" class="btn btn-lg ct-btn-image btn-warning"><span><?php pll_e('Read More'); ?></span></a>
												</div>
											</section>
										</div>
									</div>
								</div>
							</article>
							<?php
							}
							}
							?>
							<div class="ct-pagination text-center ct-u-marginBottom80">
								<ul class="list-unstyled list-inline">
								<?php
									$args = array(
    								'base' => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
									'format'             => '?paged=%#%',
									'total'              => $query->max_num_pages,
									'current'            => get_query_var( 'paged' ),
									'end_size'           => 5,
									'mid_size'           => 5,
									'prev_next'          => true,
									'type' => 'array',
									'prev_text'          => __('«'),
									'next_text'          => __('»'),
									);
									$paginations = paginate_links( $args );
									if(is_array($paginations)){
										foreach ($paginations as $value) {
											if(strpos($value, '<span') === 0){
												echo '<li><a class="active">'.$value.'</a></li>';
											}else{
												echo '<li>'.$value.'</li>';
											}
										}
									}
								?>
								</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3 ct-sidebar-right">
					<div class="widget-1 widget-first widget widget_search">
						<div class="widget-inner">
							<div class="ct-widget-header">
								<h6><span><?php pll_e('search'); ?></span></h6></div>
								<form role="search" method="get" id="searchform" class="form-search" action="/">
									<input type="text" class="form-control input-lg" value="" name="s" id="s" placeholder="Enter keywords..." required="">
									<button type="submit" class="btn btn-lg ct-btn--black text-capitalize" name="Search"><?php pll_e('search'); ?></button>
								</form>
							</div>
						</div>
						<?php if ( is_active_sidebar( 'sidebar-single' )  ) : ?>
						<?php dynamic_sidebar( 'sidebar-single' ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
		<?php
		}
		}
		?>
	</main>
</div>
<?php get_footer(); ?>