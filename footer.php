<footer id="footer">
    <div class="footer container">
        <div class="footer__flex">
            <div class="footer__contents">
                <h3 class="footer__logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt=""></a></h3>
                <ul class="footer__address">
                    <li>〒123-4567</li>
                    <li>千葉県〇〇市××町1丁目23-45</li>
                </ul>
                <ul class="footer__address">
                    <li>TEL:123-4567-8910</li>
                    <li>FAX:12-345-6789</li>
                </ul>
            </div>
            <div class="footer__nav">
                <div class="footer__menu">
                    <?php
                    $args = [
                        'menu' => 'フッターナビ',
                        'menu_class' => '',
                        'container' => false,
                        'items_wrap' => '<ul class="footer__menu">%3$s</ul>'
                    ];
                    wp_nav_menu($args);
                    ?>
                </div>
                <ul class="footer__sns">
                    <li><a href=""><img src="<?php echo get_template_directory_uri(); ?>/img/x-icon.svg" alt=""></a></li>
                    <li><a href=""><img src="<?php echo get_template_directory_uri(); ?>/img/insta-icon.svg" alt=""></a></li>
                    <li><a href=""><img src="<?php echo get_template_directory_uri(); ?>/img/youtube-icon.svg" alt=""></a></li>
                </ul>
            </div>
        </div>
        <small class="copyright">&copy; shizen-no-megumi-nouen Inc .2023</small>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>