<div class="col-sm-6 col-xs-12">
    <div class="box-project item-1">
        <figure>
            <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                <img alt="<?php the_title();?>" class="lazy" src="<?php the_post_thumbnail_url();?>">
            </a>

        </figure>
        <div class="meta">
            <h3><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>

        </div>
    </div>
</div>