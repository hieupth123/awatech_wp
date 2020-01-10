<article class="article content-background" itemscope="" itemtype="http://schema.org/Article">
        <div class="">
            <h1 class="title detail  col-xs-12" itemprop="name">VIVA RIVERSIDE (VIỆT GIA PHÚ)</h1>
            <div class="share-article btn-group col-xs-12">
                <a href="#" class="btn" id="facebook">
                    <i class="fab fa-facebook-f"></i> <span>Facebook</span>
                </a>
                <a href="#" class="btn" id="twitter">
                    <i class="fab fa-twitter"></i> <span>twitter</span>
                </a>
                <a href="#" class="btn" id="google">
                    <i class="fab fa-google"></i> <span>google</span>
                </a>
                <a href="#" class="btn hidden" id="linkedin">
                    <i class="fab fa-linkedin-in"></i> <span>linkedin</span>
                </a>
            </div>
        </div>

        <?php the_content();?>

        <div class="clearfix"></div>
</article>
<h2 class="title"><a href="#">Dự án khác</a></h2>
<div class="content-background">
    <div class="row">
    <?php
        $terms =  get_the_terms( $post->ID, 'taxonomy_duan');
        $term = array_pop($terms);
        $currentTaxonomyId  = $term;
        // WP_Query arguments
        $args = array(
            'post_type'              => array( 'duan' ),
            'post_status'            => array( 'publish' ),
            'posts_per_page'         => '4',
            'orderby'                => 'date',
            'order'                  => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'taxonomy_duan',
                    'field' => 'id',
                    'terms' => $currentTaxonomyId
                )
                ),
            'post__not_in'           => array(get_the_ID())
        );

        // The Query
        $query = new WP_Query( $args );

        // The Loop
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                    $query->the_post();
                    $postId = get_the_ID();
    ?>
    
        <div class="col-md-6 col-xs-12 box-project item-1">
            <figure>
                <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                    <img alt="<?php the_title();?>" class="lazy" src="<?php the_post_thumbnail_url();?>">
                </a>
            </figure>
            <div class="meta">
                <h3><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
            </div>
        </div>

    <?php
            }
        } else {
            // no posts found
        }

        // Restore original Post Data
        wp_reset_postdata();
    ?>
            
    </div>
</div>