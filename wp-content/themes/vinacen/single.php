<?php require("header.php"); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main container" role="main">
		<?php
		while ( have_posts() ) : the_post();

		the_content();

		endwhile;
		?>

	</main>
</div>

<?php require("footer.php"); ?>