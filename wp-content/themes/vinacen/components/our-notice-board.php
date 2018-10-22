<?php
if(!function_exists('vinacen_out_notice_board_slide')){
	function vinacen_out_notice_board_slide(){
			$args = array(
				'posts_per_page'         => -1,
				'nopaging'               => true,
				'meta_key'       => 'add_to_slides_our_notice_board',
				'meta_value'     => true,
				'lang' => pll_current_language()
			);
		
		$posts = new WP_Query( $args );

?>
<section class="ct-js-slick ct-slick ct-slick-arrow--type1" data-animations="true" data-autoplay="false"
	data-arrows="true" data-items="1" data-XSitems="1" data-SMitems="2" data-MDitems="3">
	<!-- Latest posts items!-->
	<?php
		if($posts->have_posts()){
			while($posts->have_posts()){
				$posts->the_post();
	?>
	<div class="item">
		<article class="ct-imageBox">
			<figure class="ct-imageBox-wrapperOuter">
				<a href="<?php echo get_the_permalink(); ?>">
					<div class="ct-imageBox-container ct-imageBox-container-shadow">
						<div class="ct-imageBox-hover ct-imageBox-hover--type1"></div>
						<!-- Latest posts item media!-->
						<div class="ct-blog-item-media">
							<figure>
								<a href="<?php echo get_the_permalink(); ?>">
									<img src="<?php echo the_field('slide_thumbnail'); ?>" class="attachment-ct_featured_image_latest size-ct_featured_image_latest wp-post-image" alt="<?php the_title(); ?>">
								</a>
							</figure>
						</div>
						<!-- Latest posts item media end!-->
						<?php
						$decorb = get_field('decoration_text_right_bottom');
						if($decorb !== ''){
						?>
						<div class="ct-decoration ct-decoration--type3 ct-decoration-decorationBorder">
							<div>
								<div class="ct-decoration-textContainer">
									<div class="ct-decoration-text">
										<h5>
										<span><?php echo $decorb; ?></span>
										</h5>
									</div>
								</div>
							</div>
						</div>
						<?php
						}
						?>
						
						<?php
						$decolt = get_field('decoration_text_left_top');
						if($decolt !== ''){
						?>
						<div
							class="ct-decoration ct-decoration--type4 ct-decoration-decorationBorder">
							<div>
								<div class="ct-decoration-textContainer">
									<div class="ct-decoration-text">
										<h5>
										<span><?php echo $decolt; ?></span>
										</h5>
									</div>
								</div>
							</div>
						</div>
						<?php
						}
						?>
						<?php
						$discount = get_field('discount');
						if($discount !== ''){
						?>
						<div class="ct-discount">
							<h2>
							<span><?php echo the_field('discount'); ?></span>
							</h2>
						</div>
						<?php
						}
						?>
					</div>
				</a>
				<figcaption class="ct-imageBox-wrapperInner ct-imageBox-wrapperInner--type3">
				<div class="ct-imageBox-titleContainer">
					<header class="ct-imageBox-title">
						<a href="<?php echo get_the_permalink(); ?>">
							<h6 title="<?php the_title(); ?>"><span class="ct-u-colorGrayDarker"><?php the_title(); ?></span></h6>
						</a>
					</header>
					<div class="text-center">
						<a class="btn ct-btn-link"
							href="<?php echo get_the_permalink(); ?>"><span><?php pll_e('Learn more'); ?></span></a>
						</div>
					</div>
					</figcaption>
				</figure>
			</article>
		</div>
		<?php
				}
			}
		?>
	</section>
	<?php
			wp_reset_query();
		}
	}
	add_action('our-notice-board', 'vinacen_out_notice_board_slide');

	if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_5bcd5077ee345',
	'title' => 'our notice board slides',
	'fields' => array (
		array (
			'key' => 'field_5bcd50b29809a',
			'label' => 'Add to slides "our notice board"',
			'name' => 'add_to_slides_our_notice_board',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'This post will be add to slide "your notice board"',
			'default_value' => 0,
		),
		array (
			'key' => 'field_5bcd515818c68',
			'label' => 'Slide Thumbnail',
			'name' => 'slide_thumbnail',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'full',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_5bcd51eb18c69',
			'label' => 'Label',
			'name' => 'label',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5bcd556369e62',
			'label' => 'Decoration text Left Top',
			'name' => 'decoration_text_left_top',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5bcd568069e64',
			'label' => 'Decoration text Right	Bottom',
			'name' => 'decoration_text_right_bottom',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5bcd557369e63',
			'label' => 'Discount',
			'name' => 'discount',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;