<?php get_header();?>
<?php get_template_part('hero');?>
<div class="posts">
    <?php
        while(have_posts()):
            the_post()
    ?>
    <div class="post" <?php post_class()?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="post-title">
                        <a href="<?php the_permalink();?>"><?php the_title()?></a>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>
                        <strong><?php the_author()?></strong><br/>
                        <?php echo get_the_date();?>
                    </p>

                    <?php echo get_the_tag_list("<ul class=\"list-unstyled\"><li>", "</li><li>", "</li></ul>");?>
<!--                    <ul class="list-unstyled">-->
<!--                        <li>dhaka</li>-->
<!--                    </ul>-->
                </div>
                <div class="col-md-8">
                    <p>
                        <?php
                            if(has_post_thumbnail()){
                                the_post_thumbnail('large', array("class"=> "img-fluid"));
                            }
                        ?>
                    </p>
                    <?php
//                        is_single() ? the_content() : the_excerpt();
//                          the_excerpt();

//                        if(!post_password_required()) {
//                            the_excerpt();
//                        }else {
//                            echo get_the_password_form();
//                        }

//                    By hook call
                    the_excerpt();

                    ?>
                </div>
            </div>

        </div>
    </div>
    <?php
        endwhile; ?>

    <div class="container post-pagination">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <?php the_posts_pagination(array(
                        "screen_reader_text" => ' ',
                        "next_text" => 'Old Post',
                        "prev_text" => 'New Post'
                ));?>
            </div>
        </div>
    </div>

</div>
<?php get_footer();?>