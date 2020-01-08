<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package awatech
 */

get_header();
$currentTaxonomyId = get_queried_object()->term_id;
$terms =  get_the_terms( $post->ID, 'taxonomy_sanpham');
if (! is_wp_error( $terms )) {
    $term = array_pop($terms);
    $currentTaxonomyId  = $term;
    $currentParentTaxonomyId = $term->parent;
}
?>
	<div class="category-type" style="background-image:url(<?php echo get_template_directory_uri();?>/image/panel-title.jpg)">
        <div class="container">
            
            <div class="wc">
                <h1 class="title">HÓA CHẤT - THIẾT BỊ</h1>

                <div class="wc-inner">
                    <ul class="list-item">

                        <?php
                        // WP_Query arguments
                            $args = array(
                                'post_type'              => array( 'sanpham' ),
                                'post_status'            => array( 'publish' ),
                                'posts_per_page'         => '-1',
                                'orderby'                => 'date',
                                'order'                  => 'ASC',
                            );
                            $terms = get_terms( array( 
                                'taxonomy' => 'taxonomy_sanpham',
                                'parent'   => 0
                            ) );
                            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                                foreach ( $terms as $term ) {
                                    $term_get_link = get_term_link($term, $tax_name);
                                    $taxId = $term->term_id;
                                ?>
                                    <li class = "<?php echo $taxId == $currentParentTaxonomyId ? "active" : ""; ?>">
                                        <a href="<?php echo esc_url($term_get_link);?>" title="<?php echo esc_html($term->name); ?>"><?php echo esc_html($term->name);?></a>
                                    </li>
                                <?php
                                }
                            }
                            // The Query
                            $query = new WP_Query( $args );

                            // The Loop
                            if ( $query->have_posts() ) {
                                while ( $query->have_posts() ) {
                                        $query->the_post();
                                        $postId = get_the_ID();
                        ?>
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
    <div class="category-sub">
            <ul class="list-sub-item">
                <?php
                    $childTerms = get_term_children($currentParentTaxonomyId,'taxonomy_sanpham');
                    // var_dump($childTerms);
                    if ( ! empty( $childTerms ) && ! is_wp_error( $childTerms ) ){
                        foreach ( $childTerms as $childTerm ) {
                            $childTerm_get_link = get_term_link($childTerm, 'taxonomy_sanpham');
                            $term_get = get_term_by( 'id', $childTerm, 'taxonomy_sanpham');
                        ?>
                            <li class = "<?php echo $term_get->term_id == $currentTaxonomyId->term_id ? "active" : ""; ?>">
                                <a href="<?php echo esc_url($childTerm_get_link);?>" title="<?php echo esc_html($term_get->name); ?>"><?php echo esc_html($term_get->name);?></a>
                            </li>
                        <?php
                        }
                    }
                ?>
            </ul>
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
				<div class="col-md-12">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'single_sanpham' );

					endwhile; // End of the loop.
					?>
				</div>
			</div>
		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
