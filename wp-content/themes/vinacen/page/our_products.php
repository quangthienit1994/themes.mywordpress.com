<?php
/**
template name: our product
*/
?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php get_sidebar( 'content-bottom' ); ?>
		<?php
		while ( have_posts() ) : the_post();
		?>
		<div class="bg-white container p-3">
			<div class="content"><?php the_content(); ?></div>
		</div>
		<?php
		endwhile;
		?>
	</main>
</div>
<?php get_footer(); ?>