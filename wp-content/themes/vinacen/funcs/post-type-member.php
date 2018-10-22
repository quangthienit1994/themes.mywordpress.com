<?php
function cptui_register_my_cpts_members() {
	/**
	* Post Type: Members.
	*/
	$labels = array(
		"name" => __( "Members", "vinacen" ),
		"singular_name" => __( "Memeber", "vinacen" ),
		"add_new" => __( "Add new members", "vinacen" ),
		"add_new_item" => __( "Add new members", "vinacen" ),
		"edit_item" => __( "Edit member", "vinacen" ),
	);
	$args = array(
		"label" => __( "Members", "vinacen" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "members", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail", "category" ),
	);
	register_post_type( "members", $args );
}
add_action( 'init', 'cptui_register_my_cpts_members' );
function cptui_register_my_taxes_job() {
	/**
	* Taxonomy: Jobs.
	*/
	$labels = array(
		"name" => __( "All Jobs", "vinacen" ),
		"singular_name" => __( "Job", "vinacen" ),
	);
	$args = array(
		"label" => __( "Jobs", "vinacen" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Jobs",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'job', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "job",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "job", array( "members" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes_job' );
if( function_exists('acf_add_local_field_group') ):
acf_add_local_field_group(array (
	'key' => 'group_5bcd3f67dbdf0',
	'title' => 'Member custom fields',
	'fields' => array (
		array (
			'key' => 'field_5bcd4005b98af',
			'label' => 'Phone',
			'name' => 'phone',
			'type' => 'text',
			'instructions' => 'A Phone of member',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '+444 123456789',
			'prepend' => '',
			'append' => '',
			'maxlength' => 30,
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5bcd4032b98b0',
			'label' => 'Email',
			'name' => 'email',
			'type' => 'email',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'example@gmail.com',
			'prepend' => '',
			'append' => '',
		),
		array (
			'key' => 'field_5bcd4050b98b1',
			'label' => 'Facebook',
			'name' => 'socials',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'https://facebook.com/#',
			'placeholder' => 'https://facebook.com/example',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5bcd40bbb98b2',
			'label' => 'Twitter',
			'name' => 'twitter',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'https://twitter.com/#',
			'placeholder' => 'https://twitter.com/example',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5bcd40cfb98b3',
			'label' => 'Linkein',
			'name' => 'linkein',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'https://linkein.com/#',
			'placeholder' => 'https://linkein.com/example',
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
				'value' => 'members',
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
if(!function_exists('vinacen_show_members')){
	function vinacen_show_members(){
		$args = array(
			'post_type'   => 'members',
			'post_status' => 'publish',
			'order'               => 'DESC',
			'orderby'             => 'date',
			'nopaging'               => true
		);
		
		$query = new WP_Query( $args );

		?>
		<section data-autoplay="false" data-animations="true" data-XSitems="1" data-SMitems="2" data-MDitems="3" data-arrows="true" data-items="1" class="ct-js-slick ct-slick ct-slick-arrow--type1">
			<?php
				if($query->have_posts()){
					while($query->have_posts()){
						$query->the_post();
			?>
				<div class="item">
					<article class="ct-imageBox">
						<figure class="ct-imageBox-wrapperOuter">
							<a href="<?php echo get_the_permalink(); ?>">
								<div class="ct-imageBox-container ct-imageBox-container-shadow">
									<div class="ct-imageBox-hover ct-imageBox-hover--type2"></div>
									<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_post_thumbnail_caption(); ?>">
									<div class="ct-decoration ct-decoration-decorationBorder"><div></div>
								</div>
							</div>
						</a>
						<figcaption class="ct-imageBox-wrapperInner ct-imageBox-wrapperInner--type3">
							<div class="ct-imageBox-titleContainer">
								<header class="ct-imageBox-title">
									<a href="<?php echo get_the_permalink(); ?>"><h6 title="<?php the_title(); ?>"><span class="ct-u-colorGray3"><?php the_title(); ?></span></h6></a>
								</header>
								
								<div class="ct-imageBox-social">
									<ul class="socialicons socialicons--image">
										<li><a href="<?php echo the_field('facebook'); ?>" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="facebook"><i class="fa fa-facebook"></i></a></li>
										<li><a href="<?php echo the_field('linkein'); ?>" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="linkedin"><i class="fa fa-linkedin"></i></a></li>
										<li><a href="<?php echo the_field('twitter'); ?>" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="twitter"><i class="fa fa-twitter"></i></a></li>
									</ul>
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
add_action('show-members-slide', 'vinacen_show_members' );


	add_action('wp_enqueue_scripts', "vinacen_member_enqueue_scripts");
		
	function vinacen_member_enqueue_scripts() {
		wp_enqueue_script('slick-js', get_template_directory_uri().'/assets/plugins/slick/slick.min.js', array('jquery'), '1.8', true);
		wp_enqueue_script('slick-init', get_template_directory_uri().'/assets/js/slick-slider.js', array('jquery', 'slick-js'), '1.0', true);
		wp_enqueue_style( 'slick-css', get_template_directory_uri().'/assets/plugins/slick/slick.css' );
		wp_enqueue_style( 'slick-theme', get_template_directory_uri().'/assets/plugins/slick/slick-theme.css' );
	}
