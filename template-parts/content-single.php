<div class="row">
    <h1 class="title detail  col-xs-12" itemprop="name">
        <?php the_title();?>
            <span class="date">
            <i class="fas fa-calendar-alt"></i><?php echo get_the_time ( 'Y/m/d h:i' ); ?>
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
    <?php the_content(); ?>
</div>
