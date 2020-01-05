<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package awatech
 */

get_header();
$currentId = get_the_ID();
?>
    <div class="category-type" style="background-image:url(http://anhthuytech.vn/UserUpload/ArticleType/2889cfc8-1c41-428a-9b37-bd2a87f060b4.jpg)">
        <div class="container">
            
            <div class="wc">
                <h1 class="title">Giới thiệu</h1>

                <div class="wc-inner">
                    <ul class="list-item">

                        
                        <?php
                        // WP_Query arguments
                            $args = array(
                                'post_type'              => array( 'gioithieu_post_type' ),
                                'post_status'            => array( 'publish' ),
                                'posts_per_page'         => '3',
                            );

                            // The Query
                            $query = new WP_Query( $args );

                            // The Loop
                            if ( $query->have_posts() ) {
                                while ( $query->have_posts() ) {
                                        $query->the_post();
                                        $postId = get_the_ID();
                        ?>
                        
                            <li class="<?php echo $postId == $currentId ? "active" : "" ;?>">
                                <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
                            </li>

                        <?php
                                }
                            } else {
                                // no posts found
                            }

                            // Restore original Post Data
                            wp_reset_postdata();
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

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
