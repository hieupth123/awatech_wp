<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package awatech
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-xs-12 animated fadeInLeft animation-visible" data-animation="fadeInLeft">
					<div class="box-footer footer-address">
						<h2 class="heading footer-heading">Văn Phòng Công Ty Cổ Phần Công Nghệ Thiết Bị Dịch Vụ và Môi Trường AWATECH</h2>

						<?php if ( is_active_sidebar( 'footer-1' ) ) {?>
			
							<?php dynamic_sidebar( 'footer-1' ); ?>
						
						<?php } ?>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 animated hidden-xs hidden-sm fadeInUp animation-visible" data-animation="fadeInUp">
					<div id="widget-Helpfull" data-widget="/Widget/Widget?name=Helpfull" data-callback="">
						<div class="box-footer footer-services pull-left">
							<h2 class="heading footer-heading">Thông tin hữu ích</h2>
							<?php if ( is_active_sidebar( 'footer-2' ) ) {?>
			
								<?php dynamic_sidebar( 'footer-2' ); ?>
							
							<?php } ?>
							
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 animated hidden-xs hidden-sm fadeInUp animation-visible" data-animation="fadeInUp">
					<div id="widget-ImagesHome" data-widget="/Widget/Widget?name=ImagesHome" data-callback="">
						<div class="box-footer footer-images">
							<h2 class="heading footer-heading">Hình ảnh về chúng tôi</h2>

							<?php if ( is_active_sidebar( 'footer-3' ) ) {?>
			
								<?php dynamic_sidebar( 'footer-3' ); ?>
							
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 animated hidden-xs hidden-sm fadeInRight animation-visible" data-animation="fadeInRight">
					<div class="box-footer footer-newsletter pull-left">
						<h2 class="heading footer-heading">Đăng ký email</h2>
						<?php if ( is_active_sidebar( 'footer-4' ) ) {?>
			
							<?php dynamic_sidebar( 'footer-4' ); ?>
						
						<?php } ?>
						
					</div>
				</div>
			</div>

		</div>
		<div class="site-info">
				<section id="copy-right">
					<div class="container">
						<div class="row">
							<div class="col-md-4 col-xs-6">
								<a href="/" class="footer-logo animation-visible" data-animation="">
									<img alt="image" src="<?php echo get_template_directory_uri();?>/image/logo.png?width=150&amp;height=118&amp;mode=crop">
								</a>
								<div class="copy-right">
									<a href="/">moitruongawatech.com</a>
									<p>© Copyright 2016 </p>
								</div>
							</div>
							<div class="col-md-4">
								<div id="online" class="hidden-sm hidden-xs">
									<div class="item">
										<span class="lbl">Đang trực tuyến</span>
										<span class="ctn" id="ol"><?php echo wp_statistics_visitor('today'); ?></span>
									</div>
									<div class="item total">
										<span class="lbl">Tổng truy cập</span>
										<span class="ctn" id="tl"><?php echo wp_statistics_visitor('year'); ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<!-- set up the modal to start hidden and fade in and out -->
	<div id="myModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- dialog body -->
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<?php
						echo do_shortcode('[contact-form-7 id="113" title="Yêu cầu"]');
					?>
				</div>
			</div>
		</div>
	</div>
	<div id="myModalContact" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- dialog body -->
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<?php
						echo do_shortcode('[contact-form-7 id="113" title="Liên hệ"]');
					?>
				</div>
			</div>
		</div>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
