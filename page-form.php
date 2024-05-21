<?php get_header(); ?>

    <main>
        <?php get_template_part('template-parts/breadcrumb.php'); ?>

        <!-- お知らせ -->
        <section id="form" class="form container">
            <div class="form__wrapper">
                <h2 class="form__title"><span>お問い合わせ</span></h2>
                <p class="form__text">
                    お仕事のご相談、農園体験、牧場の見学、その他ご質問など、お気軽にお問い合わせください。
                </p>
                <div class="form__wrap">
                <?php echo do_shortcode( '[contact-form-7 id="f3a78a5" title="入力画面"]' ); ?>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>