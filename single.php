<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package awatech
 */

get_header();
?>
	<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
		<div class="container">

			<?php if(function_exists('bcn_display'))
			{
				bcn_display();
			}?>
		</div>
	</div>
	<div id="primary" class="container content-area">
		<main id="main" class="site-main">
			<div class="row">
				<div class="col-md-8">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content-single', get_post_type() );

					endwhile; // End of the loop.
					?>
				</div>
				<div class="col-md-4">
					<?php get_sidebar();?>
				</div>
			</div>
		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
