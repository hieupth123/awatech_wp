<section id="columns" class="columns-home container">
    <div class="columns-home-row">

            <div class="article content-background">
                <div class="row">
                    <div class="col-sm-6 col-xs-12 hidden-xs">
                        <div id="myCarousel" class="carousel slide shadow">
                            <!-- main slider carousel items -->
                            <div class="carousel-inner">
                                <?php 
                                    $images = get_field('product_gallery');
                                    if( $images ): ?>
                                        <?php foreach( $images as $image ): ?>
                                            <div class="carousel-item" data-slide-number="<?php echo esc_url($image['ID']); ?>">
                                                <img src="<?php echo esc_url($image['sizes']['large']); ?>" class="img-fluid">
                                            </div>
                                        <?php endforeach; ?>
                                <?php endif; ?>

                                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>

                            </div>
                            <!-- main slider carousel nav controls -->
                            <ul class="carousel-indicators list-inline mx-auto border px-2">
                                <?php 
                                    $images = get_field('product_gallery');
                                    if( $images ): ?>
                                        <?php foreach( $images as $image ): ?>
                                            <li class="list-inline-item active">
                                                <a id="carousel-selector-<?php echo esc_url($image['ID']); ?>" class="selected" data-slide-to="<?php echo esc_url($image['ID']); ?>" data-target="#myCarousel">
                                                    <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" class="img-fluid">
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                <?php endif; ?>
                                
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xs-12 article-detail">
                        <h1 class="title product-detail" itemprop="name">
                            <span>
                                <?php the_title();?>
                            </span>
                        </h1>
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
                        <div class="property">
                            <span class="category">
                            <?php
                                $terms =  get_the_terms( $post->ID, 'taxonomy_sanpham');
                                $term = array_pop($terms);
                                $currentTaxonomyId  = $term;
                                $currentParentTaxonomyId = $term->parent;
                                $nameCategory = $currentTaxonomyId->name;
                                $term_get_link = get_term_link($term, 'taxonomy_sanpham');
                            ?>
                            <strong class="lbl"><i class="fa fa-angle-down"></i> Danh mục: </strong>
                            <a href="<?php echo $term_get_link;?>" title="<?php echo $nameCategory;?>">
                                <span><?php echo $nameCategory;?></span>
                            </a>
                            </span>
                            <div class="price-all">
                                <span>Giá:</span>
                                <?php
                                    if (!empty(get_field('price'))) {
                                        the_field('price');
                                    } else {
                                        echo '<a title= "'.get_the_title().'" href="javascript:void(0);" class="action">Liên hệ</a>';
                                    }
                                ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="description short" itemprop="description">
                            <p style="text-align: justify;"><span style="font-size:18px"><span style="font-family:arial,helvetica,sans-serif"><strong>Hiệu:</strong></span><?php the_field('label')?></span>
                            </p>

                            <p style="text-align: justify;"><span style="font-size:18px"><span style="font-family:arial,helvetica,sans-serif"><strong>Model:</strong></span><?php the_field('product_code')?></span>
                            </p>

                            <p style="text-align: justify;"><span style="font-size:18px"><span style="font-family:arial,helvetica,sans-serif"><strong>Xuất xứ:</strong></span><?php the_field('name')?></span>
                            </p>
                            
                            <?php

                                // check if the repeater field has rows of data
                                if( have_rows('specification') ):

                                // loop through the rows of data
                                while ( have_rows('specification') ) : the_row();
                                ?>
                                    <p style="text-align: justify;"><span style="font-size:18px"><span style="font-family:arial,helvetica,sans-serif"><strong><?php the_sub_field('title_specification');?>: </strong></span><?php the_sub_field('description_specification');?></span>
                                    </p>
                                <?php
                                endwhile;
                                else :
                                endif;

                                ?>
                        </div>

                    </div>
                </div>
                
                <div class="clearfix"></div>
                <div class="col-xs-12 description full" itemprop="description">
                    <p style="text-align: justify;"><strong><span style="color:#0000FF"><span style="font-size:18px"><span style="font-family:arial,helvetica,sans-serif">Thông tin chi tiết:</span></span></span></strong></p>
                    <?php the_content()?>
                </div>

            </div>
            <h2 class="title">Sản phẩm khác</h2>
            <div class="content-background">
                <?php
                    // WP_Query arguments
                    $args = array(
                        'post_type'              => array( 'sanpham' ),
                        'post_status'            => array( 'publish' ),
                        'posts_per_page'         => '4',
                        'orderby'                => 'date',
                        'order'                  => 'ASC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'taxonomy_sanpham',
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
                    <div class="col-md-3 col-xs-6">
                        <div class="row">
                            <div class=" box-block box-product  ">
                                <figure>
                                    <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                                        <img alt="<?php the_title();?>" class="lazy" src="<?php the_post_thumbnail_url();?>">
                                    </a>

                                </figure>
                                <div class="meta">
                                    <h3>
                                    <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
                                </h3>

                                </div>
                            </div>
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
</section>