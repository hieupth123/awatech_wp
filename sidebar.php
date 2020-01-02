<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package awatech
 */
	$args = array(                    
    'post_status'         => 'publish',
    'post_type'           => 'post',
    'ignore_sticky_posts' => true,
	'posts_per_page'      => 5,
	'post__not_in'    => array (get_the_ID())
	); 
	$tags = (array) get_the_tags();
	$categories = (array) get_the_category();
	if ( empty( $tags ) && empty( $categories ) )
    return;

	$args['tag']      = wp_list_pluck( $tags, 'slug' );
	$args['category'] = wp_list_pluck( $categories, 'slug' );
?>

<aside id="secondary" class="widget-area">
	<div class="right-wc">
		<div class="content-background related">
			<h2 class="title">Bài viết liên quan</h2>
			<div class="col-md-12 col-xs-6">
				<div class="row">
				<?php             
					$tags = wp_get_post_tags($post->ID);
					if ( $tags || $categories ) {
						$query = new WP_Query($args);
						if( $query->have_posts() ) {
							while ($query->have_posts()) : $query->the_post(); ?>
							<div class="box-block box-news-home">
								<figure>
									<a href="<?php the_permalink();?>" title="<?php the_title();?>">
										<img alt="<?php the_title();?>" class="lazy width-full" src="<?php the_post_thumbnail_url();?>" style="display: block;">
									</a>
								</figure>
								<div class="meta">
									<h3>
										<a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
									</h3>
									<span class="date"><?php echo get_the_time ( 'Y/m/d h:i' ); ?></span>
								</div>
							</div>
							<?php
							endwhile;
						}
						wp_reset_postdata();
					}
				?>
				</div>
			</div>
		</div>
	</div>
</aside><!-- #secondary -->
