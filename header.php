<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package awatech
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<!-- <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'awatech' ); ?></a> -->

	<header id="masthead" class="site-header">
		<div class="container">

			<div class="right pull-right hidden-sm hidden-xs">
				<nav class="menu-top">
					<ul>
						<li class="dropdown research">

							<a href="/Tai-Lieu-Moi-Truong.html">
								<span class="menu-title">Tài liệu môi trường</span>
							</a>
						</li>

						<li class="dropdown video">

							<a href="/Thu-Vien-Anh.html">
								<span class="menu-title">Thư Viện Ảnh</span>
							</a>
						</li>
						<li>
							<a href="/Home/Contact">Liên hệ</a>
						</li>
						<li>
							<span>HOTLINE: 0385195235</span>
						</li>
					</ul>
				</nav>

				<div class="search-btn pull-right">
					<i class="fa fa-search"></i>
					<div class="search">
						
						<form role="search" method="get" id="searchform"
							class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<div>
								<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
								<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
								<input type="submit" id="searchsubmit"
									value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
							</div>
							<!-- <input type="text" name="keyword" class="txt-search" placeholder="Nhập từ khóa...">
							<button type="submit" class="bt-search"><i class="fa fa-search"></i></button>
							<input name="pageSize" type="hidden" value="16">
							<input name="pageIndex" type="hidden" value="1"> -->
						</form>
					</div>
				</div>
			</div>

			<div class="main-head">
				<div class = "brand">
					<!-- This is logo -->
					<div class="site-branding" id="site-branding">
						<?php
						the_custom_logo();
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
						$awatech_description = get_bloginfo( 'description', 'display' );
						if ( $awatech_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $awatech_description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div>
					<!-- .site-branding -->

					<a href="/" class="header-title  animation-visible" data-animation="">
						<img alt="image" src="<?php echo get_template_directory_uri();?>/image/header-title.png?width=505&amp;height=68&amp;mode=crop">
					</a>
				</div>
					
				<div class="banner" dir="rtl">
					<a href="/" class="slogan animation-visible" data-animation="">
						<marquee><span class ="marquee-font">THEO ĐUỔI SỰ TINH TÚY- THÀNH CÔNG THEO ĐUỔI BẠN</span></marquee>
					</a>
				</div>
			</div>

		</div>
	</header><!-- #masthead -->
	<nav id="site-navigation" class="main-navigation">
		<div class="container"> 
			<?php
			wp_nav_menu( array(
				'theme_location' => '',
				'menu_id'        => 'primary-menu',
				'container'		 => 'div',
				'depth'           => 3,
			) );
			?>
		</div>
	</nav><!-- #site-navigation -->
	<?php get_template_part( 'page-title'); ?>
	<div id="content" class="site-content">
