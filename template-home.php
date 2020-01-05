<?php
/**
 * Template Name: Home
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package flatshop
 */
get_header();
?>
<div class="container" id="slide-header">
    <div class="row">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <?php 
                $images = get_field('slide_banner');
                $size = 'full'; // (thumbnail, medium, large, full or custom size)
            ?>
            <ol class="carousel-indicators">
            <?php foreach( $images as $key=>$image_id ): ?>
                <li data-target="#myCarousel" data-slide-to="<?php echo $key; ?>"></li>
            <?php endforeach; ?>
            <!-- <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li> -->
            </ol>
            <div class="carousel-inner">
                <!-- Get image from gallery -->
                <?php 
                    if( $images ): ?>
                        <?php foreach( $images as $image_id ): ?>
                            <div class="carousel-item">
                                <img src="<?php echo esc_url($image_id['url']); ?>" alt="<?php echo esc_attr($image_id['alt']); ?>" />
                            </div>
                        <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<div id="columns" class="columns-home">
    <div class="columns-home-row">
        <div class="aboutus-home animated fadeInUp animation-visible" data-animation="fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <h2 class="main main-heading">Giới Thiệu</h2>
                        <h4 class="title">Về Môi Trường Ánh Thủy</h4>
                        <div class="short-desc">
                            <p style="text-align:justify"><span style="font-size:18px"><span style="font-family:times new roman,times,serif"><em>Kính gửi Quý Cơ quan, Doanh nghiệp!</em></span></span>
                            </p>

                            <p style="text-align:justify"><span style="font-size:18px"><span style="font-family:times new roman,times,serif">Trước tiên, <strong>Công ty Cổ phần Công Nghệ Thiết Bị Dịch Vụ Và Môi Trường Ánh Thủy</strong> xin gửi đến Quý đối tác lời chào trân trọng nhất!</span></span>
                            </p>
                        </div>

                        <div class="view-detail">
                            <a href="/Gioi-thieu/Ve-Moi-Truong-Anh-Thuy-ad5.html" title="Về Môi Trường Ánh Thủy">
                                Xem thêm
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <img alt="Về Môi Trường Ánh Thủy" src="http://anhthuytech.vn/UserUpload/Aboutus/CONG-TY-CP-CONG-NGHE-THIET-BI-DICH-VU-va-MOI-TRUONG-ANH-THUY.jpg?width=570&height=328&mode=crop">
                    </div>
                </div>
            </div>
        </div>

        <div class="box-project-home hot animated fadeInUp animation-visible" data-animation="fadeInUp">
            <div class="container">

                <h2 class="heading main-heading">Dự án tư vấn thành công</h2>
                <div class="desc">
                    <p>Chúng tôi đã thực hiện hơn 700 dự án tư vấn, quản lý môi trường</p>

                </div>
                <div class="content-background">
                    <div class="row">
                        <div class="owl-carousel owl-theme">
                        <?php

                        $post_objects = get_field('complete_box_project');
                        // var_dump($post_object);
                        if( $post_objects ): ?>
                            <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                <?php setup_postdata($post); ?>
                                    <div class="box-project animated fadeInUp animation-visible" data-animation="fadeInUp">
                                        <figure>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php
                                                    the_post_thumbnail("full");
                                                ?>
                                            </a>
                                        </figure>
                                        <div class="meta">
                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        </div>
                                    </div>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                        <?php endif;?>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <div class="box-treatment-home animated" data-animation="fadeInUp">
            <div class="container">
                <div class="head">
                    <h2 class="heading main-heading2">
                        <span>Dịch Vụ Môi Trường</span>
                        <div class="line-icon">
                            <div class="line-1 line"></div>
                            <div class="line-2 line"></div>
                            <div class="line-3 line"></div>
                        </div>
                    </h2>
                </div>
                <div class="list-category">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <?php
                        // check if the repeater field has rows of data
                        if( have_rows('tab_service') ):
                            $count_service = 0;
                            // loop through the rows of data
                            while ( have_rows('tab_service') ) : the_row();
                                $count_service ++;
                                $id_tab = "tab-".$count_service;
                        ?>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($count_service == 1) echo "active";?>" id="<?php echo $id_tab?>-tab" data-toggle="tab" href="#<?php echo $id_tab?>" role="tab" aria-controls="<?php echo $id_tab?>" aria-selected="true"><?php the_sub_field('title_tab');?></a>
                        </li>
                        <?php
                            endwhile;

                                // no rows found

                        endif;

                        ?>

                    </ul>
                </div>
                <div class="content-background">
                    <div class="tab-content" id="myTabContent">

                        <?php
                            // check if the repeater field has rows of data
                            if( have_rows('tab_service') ):
                                $count_service = 0;
                                // loop through the rows of data
                                while ( have_rows('tab_service') ) : the_row();
                                    $count_service ++;
                                    $id_tab = "tab-".$count_service;
                            ?>
                            <div class="tab-pane fade show <?php if ($count_service == 1) echo "active";?>" id="<?php echo $id_tab?>" role="tabpanel" aria-labelledby="<?php echo $id_tab?>-tab">
                                <div class="row">
                                    <?php
                                        $post_objects_services = get_sub_field('select_box');
                                        if( $post_objects_services ): ?>
                                            <?php foreach( $post_objects_services as $post): // variable must be called $post (IMPORTANT) ?>
                                                <?php setup_postdata($post); ?>
                                                <div class=" col-sm-4 col-xs-6">
                                                    <div class="box-treatment">
                                                            <figure>
                                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                                <?php
                                                                    the_post_thumbnail("full");
                                                                ?>
                                                                </a>
                                                            </figure>
                                                        <div class="meta">
                                                            <h3>
                                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span><?php the_title(); ?></span></a>
                                                            </h3>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                    <?php endif;?>
                                </div>
                            </div>
                            <?php
                                endwhile;
                            endif;
                        ?>
                    </div>
                </div>
            </div>

        </div>

        <div class="box-quotation-home animated" data-animation="fadeInUp">
            <div class="container">
                <h2 class="heading main-heading2 ">
                <span>
                    Gửi yêu cầu để được tư vấn và báo giá
                </span>
                <div class="line-icon">
                            <div class="line-1 line"></div>
                            <div class="line-2 line"></div>
                            <div class="line-3 line"></div>
                        </div>
            </h2>
                <div class="desc">
                    <p>Quý Doanh nghiệp đang có nhu cầu được tư vấn và báo giá về :</p>

                </div>
                <div class="content-background">

                    <ul class="list-quotation">


                    <?php

                        // check if the repeater field has rows of data
                        if( have_rows('list_request') ):

                        // loop through the rows of data
                        while ( have_rows('list_request') ) : the_row();
                    ?>
                            <li class="item animated" data-animation="fadeInUp">
                                <a href="javascript:void(0);" title="<?php echo get_sub_field("title_request")?>">
                                    <i class="fas fa-arrow-right"></i>
                                    <?php echo get_sub_field("title_request")?>
                                </a>
                            </li>
                    <?php
                        endwhile;

                        else :

                            // no rows found

                        endif;

                    ?>
                       
                    </ul>

                </div>
            </div>
        </div>
        <div class="box-products-home animated" data-animation="fadeInUp">
            <div class="container">
                <div class="head">
                    <h2 class="heading main-heading2">
                        <span>Thiết Bị Mới Nhất</span>
                        <div class="line-icon">
                            <div class="line-1 line"></div>
                            <div class="line-2 line"></div>
                            <div class="line-3 line"></div>
                        </div>
                    </h2>
                </div>
                <div class="content-background">

                    <div class="owl-carousel owl-theme">

                        <?php
                            // WP_Query arguments
                            $args = array(
                                'post_type'              => array( 'sanpham' ),
                                'posts_per_page'         => '8',
                            );

                            // The Query
                            $query = new WP_Query( $args );

                            // The Loop
                            if ( $query->have_posts() ) {
                                while ( $query->have_posts() ) {
                                    $query->the_post();
                        ?>
                                    <div class="item">
                                        <div class="box-block box-product">
                                            <span class="new-product"></span>
                                            <figure>

                                                <a href="<?php the_permalink()?>">
                                                    <?php the_post_thumbnail('full');?>
                                                </a>
                                            </figure>

                                            <div class="meta">
                                                <h3>
                                                    <a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a>
                                                </h3>

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

            </div>

        </div>

        <div class="home-news box-home animated" data-animation="fadeInUp">
            <div class="container">
                <h2 class="heading main-heading">
                <span>
                    Tin Tức và Sự Kiện
                </span>
                <a class="view-all" href="<?php echo get_home_url();?>/blog">Xem tất cả</a>
            </h2>
                <div class="content-background">
                    <div class="row">

                    <?php
                        // WP_Query arguments
                            $args = array(
                                'post_type'              => array( 'post' ),
                                'post_status'            => array( 'publish' ),
                                'posts_per_page'         => '3',
                            );

                            // The Query
                            $query = new WP_Query( $args );

                            // The Loop
                            if ( $query->have_posts() ) {
                                while ( $query->have_posts() ) {
                                    $query->the_post();
                    ?>
                                <div class="col-md-4 col-xs-12">
                                    <div class="box-news-home">
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
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>