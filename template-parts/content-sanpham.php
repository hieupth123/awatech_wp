<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package awatech
 */

?>

<div class="col-md-3 col-xs-6">
        <div class="box-block box-product">
            <span class="new-product"></span>
            <figure>
                <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                    <img alt="<?php the_title();?>" src="<?php the_post_thumbnail_url("thumbnail");?>">
                </a>
            </figure>

            <div class="meta">
                <h3>
                        <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
                    </h3>

            </div>
        </div>

</div>

