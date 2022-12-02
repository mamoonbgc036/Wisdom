 <article class="masonry__brick entry format-gallery" data-aos="fade-up">

                    <div class="entry__thumb slider">
                        <div class="slider__slides">
                            <div class="slider__slide">
                               <?php the_post_thumbnail( 'wisdom_post_square' );?>
                            </div>
                        </div>
                    </div>

                   <?php 
                    get_template_part( '/template-parts/common/post/summary' );
                   ?>

                </article> <!-- end article -->