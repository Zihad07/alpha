
<?php
/**
 * Template Name: About Page Template
 */
get_header();?>
<?php get_template_part('/template-parts/about-page/hero-page');?>
    <div class="posts">
        <?php
        while(have_posts()):
            the_post()
            ?>
            <div class="post" <?php post_class()?>>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <h2 class="post-title text-center">
                                <?php the_title()?>
                            </h2>
                        </div>
                        <div class="col-md-10 offset-md-1">
                            <p class="text-center">
                                <strong><?php the_author()?></strong><br/>
                                <?php echo get_the_date();?>
                            </p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <p>
                                <?php
                                if(has_post_thumbnail()){
//                                            $thumnail_url = get_the_post_thumbnail_url(null, 'large');
//                                            printf('<a href="%s" data-featherlight="image">', $thumnail_url);
//                                            the_post_thumbnail('large', array("class"=> "img-fluid"));
//                                            printf('</a>');


                                    echo'<a class="popup-img" href="#" data-featherlight="image">';
                                    the_post_thumbnail('large', array("class"=> "img-fluid"));
                                    echo '</a>';
                                }
                                ?>
                            </p>
                            <?php
                            the_content();
                            ?>

                            <?php
//                            next_post_link();
//                            //                            echo ":";
//                            previous_post_link();
//                            echo "<hr/>";
                            ?>
                        </div>




                    </div>

                </div>
            </div>
        <?php
        endwhile; ?>



    </div>
<?php get_footer();?>