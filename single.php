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
                                <li><a href="<?php echo $wisdom_author_fb_links; ?>">Facebook</a></li>
                                <?php
                            }

                             if( $wisdom_author_twitter_links ) {
                                ?>
                                <li><a href="<?php echo $wisdom_author_twitter_links; ?>">Twitter</a></li>
                                <?php
                            }

                             if( $wisdom_author_instagram_links ) {
                                ?>
                                <li><a href="<?php echo $wisdom_author_instagram_links; ?>">Instagram</a></li>
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
                                <a href="#0" rel="prev">
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
                                    <a href="#0" rel="next">
                                        <span><?php _e( 'Previous Next', 'wisdom' ); ?></span>
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


    <!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row top">

            <div class="col-eight md-six tab-full popular">
                <h3>Popular Posts</h3>

                <div class="block-1-2 block-m-full popular__posts">
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/wheel-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">Visiting Theme Parks Improves Your Health.</a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2017-12-19">Dec 19, 2017</time></span>
                        </section>
                    </article>
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/shutterbug-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">Key Benefits Of Family Photography.</a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2017-12-18">Dec 18, 2017</time></span>
                        </section>
                    </article>
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/cookies-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">Absolutely No Sugar Oatmeal Cookies.</a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2017-12-16">Dec 16, 2017</time></span>
                        </section>
                    </article>
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/beetle-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">Throwback To The Good Old Days.</a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2017-12-16">Dec 16, 2017</time></span>
                        </section>
                    </article>
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/tulips-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">10 Interesting Facts About Caffeine.</a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2017-12-14">Dec 14, 2017</time></span>
                        </section>
                    </article>
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/salad-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">Healthy Mediterranean Salad Recipes</a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2017-12-12">Dec 12, 2017</time></span>
                        </section>
                    </article>
                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->
            
            <div class="col-four md-six tab-full about">
                <h3>About Philosophy</h3>

                <p>
                Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Pellentesque in ipsum id orci porta dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada.
                </p>

                <ul class="about__social">
                    <li>
                        <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </li>
                </ul> <!-- end header__social -->
            </div> <!-- end about -->

        </div> <!-- end row -->

        <div class="row bottom tags-wrap">
            <div class="col-full tags">
                <h3>Tags</h3>

                <div class="tagcloud">
                    <a href="#0">Salad</a>
                    <a href="#0">Recipe</a>
                    <a href="#0">Places</a>
                    <a href="#0">Tips</a>
                    <a href="#0">Friends</a>
                    <a href="#0">Travel</a>
                    <a href="#0">Exercise</a>
                    <a href="#0">Reading</a>
                    <a href="#0">Running</a>
                    <a href="#0">Self-Help</a>
                    <a href="#0">Vacation</a>
                </div> <!-- end tagcloud -->
            </div> <!-- end tags -->
        </div> <!-- end tags-wrap -->

    </section> <!-- end s-extra -->

<?php 
    get_footer();
?>