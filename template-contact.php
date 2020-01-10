<?php
/**
 * Template Name: Contact
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package flatshop
 */
get_header();
?>
<div class="category-type" style="background-image:url(<?php echo get_template_directory_uri();?>/image/panel-title.jpg)">
    <div class="container">
        
        <div class="wc">
            <h1 class="title">Liên hệ</h1>
        </div>
    </div>
</div>
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
    <div class="container">

        <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }?>
    </div>
</div>
<div class="container">
    <?php echo get_field('map');?>
</div>
<div class="container">
    <?php 
        while( have_posts() ):
            the_post(); 
            the_content();
        endwhile; wp_reset_postdata();
   ?>
</div>
<?php get_footer(); ?>