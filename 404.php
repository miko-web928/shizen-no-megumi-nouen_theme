<?php get_header(); ?>

<main>
    <section class="container">
        <div class="wrapper">
            <h2 class="section__title"><span>エラー</span></h2>
            <div class="section__wrap">
                <p>お探しのページが見つかりませんでした。</p>
                <p>申し訳ございませんが、以下のリンクからトップページにお戻りください。</p>
                <div class="section__button-top">
                    <a href="<?php echo esc_url(home_url('/')); ?>">TOPに戻る</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>