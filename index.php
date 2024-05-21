<?php get_header(); ?>

<main>
    <section class="container">
        <div class="section__wrapper">
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            <h2 class="section__title"><span><?php the_title(); ?></span></h2>
            <div class="section__wrap">
                <?php the_content(); ?>
            <?php endwhile; ?>
            <?php endif; ?>
                <div class="section__button-top">
                    <a href="<?php echo esc_url(home_url('/')); ?>">TOPに戻る</a>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/contact') ?>
</main>

<?php get_footer(); ?>