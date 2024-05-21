<?php get_header(); ?>

    <main>
        <?php get_template_part('template-parts/breadcrumb.php') ?>

        <!-- お知らせ -->
        <section id="form" class="form container">
            <div class="form__wrapper">
                <h2 class="form__title"><span>お問い合わせ</span></h2>
                <div class="form__wrap">
                <?php echo do_shortcode( '[contact-form-7 id="180a3e3" title="確認画面"]' ); ?>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>