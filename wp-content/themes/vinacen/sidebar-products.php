<?php
?>

<?php if ( is_active_sidebar( 'sidebar-products' )  ) : ?>
	<aside id="secondary" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-products' ); ?>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
