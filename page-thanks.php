<?php get_header(); ?>

    <main>
    <?php get_template_part('template-parts/breadcrumb.php') ?>

        <section id="form" class="form container">
            <div class="form__wrapper">
                <h2 class="form__title"><span>お問い合わせ</span></h2>
                <div class="form__wrap thanks">
                    <h3 class="form__thanks-message">お問い合わせ<br class="br-sp">ありがとうございました。</h3>
                    <p>
                        担当者より<br class="br-sp">5営業日以内に返信いたします。<br>
                        お急ぎの場合は、<br class="br-sp">お電話にてお問い合わせください。
                    </p>
                    <ul class="contact__address thanks">
                        <li>問い合わせ電話<span class="pc-only">：</span><br class="br-sp"><span class="contact__tel">123-4567-8910</span></li>
                        <li><span class="contact__time">【受付時間】<br>10:00 ~ 18:00（土日祝を除く）</span></li>
                    </ul>
                    <div class="form__button-top">
                        <a href="<?php echo home_url('/'); ?>">TOPに戻る</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>