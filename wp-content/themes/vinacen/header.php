<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="ct-js-wrapper">
			<header class="ct-mainHeader">
				<div class="ct-topBar topBar--type1 ct-js-headroom animatedDif headroom--top">
					<div class="navbar navbar-default">
						<div class="container ct-navbar-container">
							<p class="navbar-text navbar-left"><i class="fa fa-phone"></i> Support: (012) 345-6789</p>
							<ul>
								<li class="ct-wooCart dropdown">
									<a href="<?php echo get_permalink( wc_get_page_id( 'cart' ) ); ?>" title="View your shopping cart">
										<i class="fa fa-fw fa-shopping-cart"></i>
										<span class="ct-wooCart-numberItems"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
									</a>
									<ul class="dropdown-menu ct-wooCart-cartBox">
										<li></li>
									</ul>
								</li>
							</ul>
							<!--shop user menu-->
							<nav class="ct-topBar-navigation pull-left">
								<ul class="list-unstyled list-inline">
									<li><a href="<?php echo get_template_directory_uri(); ?>/my-account/" title="Login / Register">Login / Register</a></li>
								</ul>
								</nav><!--shop user menu END-->
								<div class="navbar-block navbar-right">
									<div class="navbar-block-inner">
									<ul class="socialicons socialicons--image"></ul>
								</div>
							</div>
							<p class="navbar-text navbar-right">Welcome to Our Organic Shop!</p>
						</div>
					</div>
				</div>
				<nav class="navbar navbar-default navbar--type1 yamm">
					<div class="container ct-navbar-container">
						<form class="navbar-form navbar-right" role="search"  action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<div class="input-group">
								<input value=""
								type="text" class="form-control"
								placeholder="Search for"
								name="s" id="s">
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit"><i
									class="fa fa-search"></i>
									</button>
								</span>
							</div>
							<!-- /input-group -->
						</form>
						<div class="navbar-header">
							<a  href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand" >
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Farmfresh" class="navbar-brand-defaultColor" >
							</a>
						</div>
						<div id="mega-menu-wrap-primary_navigation" class="mega-menu-wrap">
							<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
						</div>
					</div>
				</nav>
			</header>
		</div>