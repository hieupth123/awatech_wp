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

        <!-- <div class="home-news box-home animated" data-animation="fadeInUp">
            <div class="container">
                <h2 class="heading main-heading">
                <span>
                    Tin Tức và Sự Kiện
                </span>
                <a class="view-all" href="/Tin-tuc.html">Xem tất cả</a>
            </h2>
                <div class="content-background">
                    <div class="row">

                        <div class="col-md-4 col-xs-12">
                            <div class="box-news-home">
                                <figure>
                                    <a href="/Tin-tuc/ANHTHUYTECH-TAP-HUAN-CAC-HO-SO-MOI-TRUONG-THEO-THONG-TU-NGHI-DINH-MOI-NHAT-ad3270.html" title="[ANHTHUYTECH] TẬP HUẤN CÁC HỒ SƠ MÔI TRƯỜNG THEO THÔNG TƯ - NGHỊ ĐỊNH MỚI NHẤT">
                                        <img alt="[ANHTHUYTECH] TẬP HUẤN CÁC HỒ SƠ MÔI TRƯỜNG THEO THÔNG TƯ - NGHỊ ĐỊNH MỚI NHẤT" src="/UserUpload/News/ANHTHUYTECH-TAP-HUAN-CAC-HO-SO-MOI-TRUONG-THEO-THONG-TU-NGHI-DINH-MOI-NHAT.jpg?width=370&amp;height=283&amp;mode=crop">
                                    </a>
                                </figure>
                                <div class="meta">
                                    <h3>
                                            <a href="/Tin-tuc/ANHTHUYTECH-TAP-HUAN-CAC-HO-SO-MOI-TRUONG-THEO-THONG-TU-NGHI-DINH-MOI-NHAT-ad3270.html" title="[ANHTHUYTECH] TẬP HUẤN CÁC HỒ SƠ MÔI TRƯỜNG THEO THÔNG TƯ - NGHỊ ĐỊNH MỚI NHẤT">
                                                [ANHTHUYTECH] TẬP HUẤN CÁC HỒ SƠ MÔI TRƯỜNG THEO THÔNG TƯ - NGHỊ ĐỊNH MỚI NHẤT
                                            </a>
                                        </h3>
                                    <span class="date">26/10/2019 , 09:22</span>
                                    <div class="description">
                                        Để nâng cao kiến thức của anh chị em cán bộ công nhân viên, công ty đã tổ chức buổi tập huấn hồ sơ môi trường theo thông tư nghị định hiện hành mới nhất.
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <div class="box-news-home">
                                <figure>
                                    <a href="/Tin-tuc/O-nhiem-khong-khi-Chu-de-Ngay-Moi-truong-The-gioi-nam-2019-ad3264.html" title="Ô nhiễm không khí: Chủ đề Ngày Môi trường Thế giới năm 2019">
                                        <img alt="Ô nhiễm không khí: Chủ đề Ngày Môi trường Thế giới năm 2019" src="/UserUpload/News/O-nhiem-khong-khi-Chu-de-Ngay-Moi-truong-The-gioi-nam-2019.jpg?width=370&amp;height=283&amp;mode=crop">
                                    </a>
                                </figure>
                                <div class="meta">
                                    <h3>
                                            <a href="/Tin-tuc/O-nhiem-khong-khi-Chu-de-Ngay-Moi-truong-The-gioi-nam-2019-ad3264.html" title="Ô nhiễm không khí: Chủ đề Ngày Môi trường Thế giới năm 2019">
                                                Ô nhiễm không khí: Chủ đề Ngày Môi trường Thế giới năm 2019
                                            </a>
                                        </h3>
                                    <span class="date">18/05/2019 , 09:34</span>
                                    <div class="description">
                                        Đại Hội đồng Liên Hiệp Quốc đã chọn ngày 5 tháng 6 hằng năm&nbsp;làm Ngày Môi Trường Thế Giới từ năm 1972&nbsp;và giao cho Chương trình Môi trường (UNEP)&nbsp;của Liên Hiệp Quốc&nbsp;có trụ sở tại Nairobi, Kenya&nbsp;tổ chức kỷ niệm sự kiện này.
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <div class="box-news-home">
                                <figure>
                                    <a href="/Tin-tuc/Thuc-hien-3T-de-bao-ve-moi-truong-ad3258.html" title="Thực hiện 3T để bảo vệ môi trường">
                                        <img alt="Thực hiện 3T để bảo vệ môi trường" src="/UserUpload/News/Thuc-hien-3T-de-bao-ve-moi-truong-3.jpg?width=370&amp;height=283&amp;mode=crop">
                                    </a>
                                </figure>
                                <div class="meta">
                                    <h3>
                                            <a href="/Tin-tuc/Thuc-hien-3T-de-bao-ve-moi-truong-ad3258.html" title="Thực hiện 3T để bảo vệ môi trường">
                                                Thực hiện 3T để bảo vệ môi trường
                                            </a>
                                        </h3>
                                    <span class="date">14/05/2019 , 14:48</span>
                                    <div class="description">
                                        Bằng những việc làm đơn giản, bạn đã giúp môi trường sống trở nên xanh và sạch hơn. Trung bình mỗi ngày TP.HCM đang phải tiếp nhận khoảng 7.000 tấn rác thải, một con số khổng lồ. Dự báo lượng rác này sẽ tăng lên gần 10.000...
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="box-partner animated " data-animation="fadeInUp">
            <div class="container">
                <h2 class="heading main-heading center">Đối tác khách hàng</h2>
                <div class="content-background">
                    <div class="row">
                        <div class="owl-carousel owl-theme owl-carousel-init" data-plugin-options="{&quot;items&quot;: 6, &quot;singleItem&quot;: false, &quot;autoPlay&quot;: true, &quot;navigation&quot;: true, &quot;pagination&quot;: false,&quot;slideSpeed&quot;:400,&quot;addClassActive&quot;:true,&quot;itemsDesktop&quot;: [1199, 6],&quot;itemsDesktopSmall&quot;: [991, 5],&quot;itemsTablet&quot;: [768, 4],&quot;itemsMobile&quot;: [479, 2]}" data-snap-ignore="true" style="opacity: 1; display: block;">
                            <div class="owl-wrapper-outer">
                                <div class="owl-wrapper" style="width: 4800px; left: 0px; display: block; transition: all 800ms ease 0s; transform: translate3d(-800px, 0px, 0px);">
                                    <div class="owl-item" style="width: 200px;">
                                        <a href="#">
                                            <img alt="COTECCONS" src="/UserUpload/Partner/COTECCONS.jpg?width=162&amp;height=96&amp;mode=pad">
                                        </a>
                                    </div>
                                    <div class="owl-item" style="width: 200px;">
                                        <a href="#">
                                            <img alt="Novaland" src="/UserUpload/Partner/Novaland.png?width=162&amp;height=96&amp;mode=pad">
                                        </a>
                                    </div>
                                    <div class="owl-item" style="width: 200px;">
                                        <a href="#">
                                            <img alt="Hoàng Quân Group" src="/UserUpload/Partner/Hoang-Quan-Group.png?width=162&amp;height=96&amp;mode=pad">
                                        </a>
                                    </div>
                                    <div class="owl-item" style="width: 200px;">
                                        <a href="#">
                                            <img alt="Chensea Phú Quốc" src="/UserUpload/Partner/Chensea-Phu-Quoc.jpg?width=162&amp;height=96&amp;mode=pad">
                                        </a>
                                    </div>
                                    <div class="owl-item active" style="width: 200px;">
                                        <a href="#">
                                            <img alt="City Garden" src="/UserUpload/Partner/City-Garden.jpg?width=162&amp;height=96&amp;mode=pad">
                                        </a>
                                    </div>
                                    <div class="owl-item active" style="width: 200px;">
                                        <a href="#">
                                            <img alt="Serenity Holding" src="/UserUpload/Partner/Serenity-holding.jpg?width=162&amp;height=96&amp;mode=pad">
                                        </a>
                                    </div>
                                    <div class="owl-item active" style="width: 200px;">
                                        <a href="#">
                                            <img alt="Lan Anh Phú Quốc" src="/UserUpload/Partner/Lan-Anh-Phu-Quoc.png?width=162&amp;height=96&amp;mode=pad">
                                        </a>
                                    </div>
                                    <div class="owl-item active" style="width: 200px;">
                                        <a href="#">
                                            <img alt="Laveranda Resort" src="/UserUpload/Partner/Lavarenda-Resort.jpg?width=162&amp;height=96&amp;mode=pad">
                                        </a>
                                    </div>
                                    <div class="owl-item active" style="width: 200px;">
                                        <a href="#">
                                            <img alt="FIDECO" src="/UserUpload/Partner/FIDECO.png?width=162&amp;height=96&amp;mode=pad">
                                        </a>
                                    </div>
                                    <div class="owl-item active" style="width: 200px;">
                                        <a href="#">
                                            <img alt="Ngân hàng SCB" src="/UserUpload/Partner/Ngan-hang-SCB.jpg?width=162&amp;height=96&amp;mode=pad">
                                        </a>
                                    </div>
                                    <div class="owl-item" style="width: 200px;">
                                        <a href="#">
                                            <img alt="Intresco" src="/UserUpload/Partner/Intresco.jpg?width=162&amp;height=96&amp;mode=pad">
                                        </a>
                                    </div>
                                    <div class="owl-item" style="width: 200px;">
                                        <a href="#">
                                            <img alt="Hưng Lộc Phát" src="/UserUpload/Partner/Hung-Loc-Phat.png?width=162&amp;height=96&amp;mode=pad">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="owl-controls clickable">
                                <div class="owl-buttons">
                                    <div class="owl-prev"><i class="fa fa-chevron-left"></i></div>
                                    <div class="owl-next"><i class="fa fa-chevron-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div> -->

    </div>
</div>

<?php get_footer(); ?>