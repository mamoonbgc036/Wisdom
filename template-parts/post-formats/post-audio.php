 <?php 
    $wisdom_audio_file = '';
    if ( function_exists( 'the_field' ) ) {
        $wisdom_audio_file = get_field( 'source_file' );
    }
 ?>
 <article class="masonry__brick entry format-audio" data-aos="fade-up">

                    <div class="entry__thumb">
                        <a href="<?php echo $wisdom_audio_file ? $wisdom_audio_file : ''; ?>" class="entry__thumb-link">
                            <?php 
                                the_post_thumbnail( 'wisdom_post_square' )
                            ?>
                        </a>
                    </div>

                   <?php 
                    get_template_part( '/template-parts/common/post/summary' );
                   ?>
</article> <!-- end article -->