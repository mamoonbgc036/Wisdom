<?php 
    the_post();
    get_header();
?>


    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow s-content--no-padding-bottom">

        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    <?php the_title(); ?>
                </h1>
                <ul class="s-content__header-meta">
                    <li class="date"><?php echo get_the_date(); ?></li>
                    <li class="cat">
                        In
                        <?php the_category(' '); ?>
                    </li>
                </ul>
            </div> <!-- end s-content__header -->
    
            <div class="s-content__media col-full">
                <div class="s-content__post-thumb">
                    <?php the_post_thumbnail( 'large' ); ?>
                </div>
            </div> <!-- end s-content__media -->

            <div class="col-full s-content__main">

               <?php 
                the_content();
                wp_link_pages();
               ?>

                <p class="s-content__tags">
                    <span>Post Tags</span>

                    <span class="s-content__tag-list">
                       <?php the_tags(' '); ?>
                    </span>
                </p> <!-- end s-content__tags -->

                <div class="s-content__author">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>

                    <div class="s-content__author-about">
                        <h4 class="s-content__author-name">
                            <a href="#0"><?php the_author(); ?></a>
                        </h4>
                    
                        <p>
                            <?php the_author_meta( 'description' ); ?>
                        </p>

                        <ul class="s-content__author-social">
                            <?php 
                                $wisdom_author_fb_links = get_field( 'facebook', 'user_'.get_the_author_meta( 'ID' ) );
                                $wisdom_author_twitter_links = get_field( 'twitter', 'user_'.get_the_author_meta( 'ID' ) );
                                $wisdom_author_instagram_links = get_field( 'instagram', 'user_'.get_the_author_meta( 'ID' ) );
                            ?>
                            <?php 
                                if( $wisdom_author_fb_links ) {
                                ?>
                                <li><a href="<?php echo wp_kses_post($wisdom_author_fb_links); ?>">Facebook</a></li>
                                <?php
                            }

                             if( $wisdom_author_twitter_links ) {
                                ?>
                                <li><a href="<?php echo wp_kses_post( $wisdom_author_twitter_links ); ?>">Twitter</a></li>
                                <?php
                            }

                             if( $wisdom_author_instagram_links ) {
                                ?>
                                <li><a href="<?php echo wp_kses_post( $wisdom_author_instagram_links ); ?>">Instagram</a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>

                <div class="s-content__pagenav">
                    <div class="s-content__nav">
                        <div class="s-content__prev">
                            <?php 
                                $wisdom_prev_post = get_previous_post();
                                if( $wisdom_prev_post ){
                                ?>
                                <a href="<?php echo get_the_permalink( $wisdom_prev_post ) ?>" rel="prev">
                                    <span><?php _e( 'Previous Post', 'wisdom' ); ?></span>
                                    <?php echo get_the_title( $wisdom_prev_post ); ?>
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="s-content__next">
                             <?php 
                                $wisdom_next_post = get_next_post();
                                    if( $wisdom_next_post ){
                                    ?>
                                    <a href="<?php echo get_the_permalink( $wisdom_next_post ) ?>" rel="next">
                                        <span><?php _e( 'Next Post', 'wisdom' ); ?></span>
                                        <?php echo get_the_title( $wisdom_next_post ); ?>
                                    </a>
                                    <?php
                                }
                                ?>
                        </div>
                    </div>
                </div> <!-- end s-content__pagenav -->

            </div> <!-- end s-content__main -->

        </article>


        <!-- comments
        ================================================== -->
        <?php 
            if( !post_password_required() ) {
            comments_template();
        }
        ?>

    </section> <!-- s-content -->
<?php 
    get_footer();
?>