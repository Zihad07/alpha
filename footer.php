<div class="footer">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <?php
                    if(is_active_sidebar('footer-left')) {
                        dynamic_sidebar('footer-left');
                    }
                ?>
            </div>
            <div class="col-md-6">

<!--                --><?php
//                    if(is_active_sidebar('footer-right')) {
//                        dynamic_sidebar('footer-right');
//                    }
//                ?>

                <?php
                    wp_nav_menu(
                            array(
                                'theme_location' => 'footermenu',
                                'id' => 'footermenu-container',
                                'menu_class' => 'list-inline text-right'
                            )
                    );
                ?>

            </div>
        </div>
    </div>
</div>
<?php wp_footer();?>
</body>
</html>