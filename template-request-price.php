<?php
/**
 * Template Name: Request Price
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
                <h1 class="title">GỬI YÊU CẦU ĐỂ ĐƯỢC TƯ VẤN VÀ BÁO GIÁ</h1>
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
            <div class="row">
                <div class="content-background">

                    <ul class="list-quotation">


                    <?php

                        // check if the repeater field has rows of data
                        if( have_rows('list_request_price') ):

                        // loop through the rows of data
                        while ( have_rows('list_request_price') ) : the_row();
                    ?>
                            <li class="item animated" data-animation="fadeInUp">
                                <a href="javascript:void(0);" title="<?php the_sub_field("title_request_price")?>">
                                    <i class="fas fa-arrow-right"></i>
                                    <?php the_sub_field("title_request_price")?>
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
    
    <?php get_footer(); ?>