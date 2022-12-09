 <?php 
    $wisdom_audio_file = '';
    if ( function_exists( 'the_field' ) ) {
        $wisdom_audio_file = get_field( 'source_file' );
    }
 ?>
 <article <?php post_class( 'masonry__brick entry format-audio' ); ?>data-aos="fade-up">

                    <div class="entry__thumb">
                        <a href="<?php echo wp_kses_post( $wisdom_audio_file ) ? $wisdom_audio_file : ''; ?>" class="entry__thumb-link">
                            <?php 
                                the_post_thumbnail( 'wisdom_post_square' )
                            ?>
                        </a>
                    </div>

                   <?php 
                    get_template_part( '/template-parts/common/post/summary' );
                   ?>
</article> <!-- end article -->