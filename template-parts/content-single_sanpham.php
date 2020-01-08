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
                                Hóa chất Xử lý Nước Cấp 01
                            </span>
                        </h1>
                        <div class="row">
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
                        <div class="property">
                            <span class="category">
                            <strong class="lbl"><i class="fa fa-angle-down"></i> Danh mục: </strong>
                            <a href="/Hoa-Chat-Thiet-bi/HOA-CHAT-XU-LY-NUOC-CAP-ac1022.html" title="HÓA CHẤT XỬ LÝ NƯỚC CẤP">
                                <span>HÓA CHẤT XỬ LÝ NƯỚC CẤP</span>
                            </a>
                            </span>
                            <div class="price-all">

                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="action">
                            <a href="/Home/Contact/3079" class="">Liên hệ</a>
                        </div>

                        <div class="description short" itemprop="description">
                            <p style="text-align: justify;"><span style="font-size:18px"><span style="font-family:arial,helvetica,sans-serif"><strong>Hiệu:</strong></span></span>
                            </p>

                            <p style="text-align: justify;"><span style="font-size:18px"><span style="font-family:arial,helvetica,sans-serif"><strong>Model:</strong></span></span>
                            </p>

                            <p style="text-align: justify;"><span style="font-size:18px"><span style="font-family:arial,helvetica,sans-serif"><strong>Xuất xứ:</strong></span></span>
                            </p>

                        </div>

                    </div>
                </div>
                
                <div class="clearfix"></div>
                <div class="col-xs-12 description full" itemprop="description">
                    <p style="text-align: justify;"><strong><span style="color:#0000FF"><span style="font-size:18px"><span style="font-family:arial,helvetica,sans-serif">Thông tin chi tiết:</span></span></span></strong></p>

                </div>

            </div>
            <h2 class="title">Sản phẩm khác</h2>
            <div class="content-background">

                <div class="col-md-3 col-xs-6">
                    <div class="row">
                        <div class=" box-block box-product  ">
                            <figure>
                                <a href="/Hoa-Chat-Thiet-bi/PHEN-KEP-AMONI-NH4-AL-SO4-2-ad1010.html" title="PHÈN KÉP AMONI - (NH4)AL(SO4)2">
                                    <img alt="PHÈN KÉP AMONI - (NH4)AL(SO4)2" class="lazy" data-src="/UserUpload/Product/PHEN-KEP-AMONI-NH4-AL-SO4-2.png?width=255&amp;height=208&amp;mode=pad" src="/UserUpload/Product/PHEN-KEP-AMONI-NH4-AL-SO4-2.png?width=255&amp;height=208&amp;mode=pad" style="display: block;">
                                </a>

                            </figure>
                            <div class="meta">
                                <h3>
                                <a href="/Hoa-Chat-Thiet-bi/PHEN-KEP-AMONI-NH4-AL-SO4-2-ad1010.html" title="PHÈN KÉP AMONI - (NH4)AL(SO4)2">PHÈN KÉP AMONI - (NH4)AL(SO4)2</a>
                            </h3>

                            </div>
                        </div>
                    </div>

                </div>

            </div>


    </div>
</section>