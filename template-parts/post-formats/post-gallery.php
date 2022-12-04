 <article class="masonry__brick entry format-gallery" data-aos="fade-up">
    <?php
       if( class_exists( 'Attachments' ) ):
        $attachments = new Attachments( 'gallery' );
        if( $attachments->exist() ){
    ?>
    <div class="entry__thumb slider">
        <div class="slider__slides">
            <?php while( $attachment = $attachments->get() ): ?>
            <div class="slider__slide">
                <?php echo $attachments->image( 'wisdom_post_square' );?>
            </div>
            <?php  endwhile;?>
        </div>
    </div>
    <?php 
        }else{
            ?>
            <div class="entry__thumb slider">
                <div class="slider__slides">
                    <div class="slider__slide">
                        <?php the_post_thumbnail( 'wisdom_post_square' );?>
                    </div>
                </div>
            </div>
            <?php
        }
    endif;
    ?>

    <?php 
    get_template_part( '/template-parts/common/post/summary' );
    ?>

</article> <!-- end article -->