<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package awatech
 */

?>
<div class="col-md-4 col-xs-6">
	<div class=" box-block box-news-home">
		<figure>
			<a href="<?php the_permalink();?>" title="<?php the_title();?>">
				<img alt="<?php the_title();?>" src="<?php the_post_thumbnail_url();?>">
			</a>
		</figure>
		<div class="meta">
			<h3>
					<a href="<?php the_permalink();?>" title="<?php the_title();?>">
					<?php the_title();?>
					</a>
				</h3>
			<span class="date"><?php echo get_the_time ( 'Y/m/d h:i' ); ?></span>
			<div class="description">
			<?php the_excerpt();?>
			</div>

		</div>
	</div>
</div>

