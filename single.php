<?php get_header(); ?>

<main>
    <section class="container">
        <div class="section__wrapper">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <h2 class="single__title"><span><?php the_title(); ?></span></h2>
                    <div class="single-item__date-category">
                        <?php the_time(get_option('date_format')); ?>
                        <span class="single-item__category">
                            <?php
                            $cats = get_the_category();
                            foreach ($cats as $cat) :
                                echo $cat->cat_name;
                            endforeach;
                            ?>
                        </span>
                    </div>
                    <div class="section__wrap">
                        <div class="single__thumbnail">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail(); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/no-image.png" alt="">
                            <?php endif; ?>
                        </div>
                        <div class="single__posts">
                            <div class="post__index">
                                <div class="index__title">目次</div>

                                <ol class="index-of-lists">
                                    <?php $index = $cfs->get('index'); ?>
                                    <?php if (!$index == '') : ?>
                                        <?php
                                        $fields = $cfs->get('index');
                                        foreach ($fields as $field) {
                                            echo '<li class="index-of-list">' . $field['h2_title'] . '</li>';
                                            echo '<ol class="index-of-lists--marker"><li class="index-of-list--marker">' . $field['h3_title'] . '</ol></li>';
                                        };
                                        ?>
                                    <?php else : ?>
                                    <?php endif; ?>
                                </ol>
                            </div>
                            <h2 class="post__title--h2">
                                <?php $title_1 = $cfs->get('title_1'); ?>
                                <?php if (!$title_1 == '') : ?>
                                    <?php echo $cfs->get('title_1'); ?>
                                <?php else : ?>
                                <?php endif; ?>
                            </h2>
                            <p class="post__text">
                                <?php $text_1 = $cfs->get('text_1'); ?>
                                <?php if (!$text_1 == '') : ?>
                                    <?php echo $cfs->get('text_1'); ?>
                                <?php else : ?>
                                <?php endif; ?>
                            </p>

                            <h3 class="post__title--h3">
                                <?php $title_2 = $cfs->get('title_2'); ?>
                                <?php if (!$title_2 == '') : ?>
                                    <?php echo $cfs->get('title_2'); ?>
                                <?php else : ?>
                                <?php endif; ?>
                            </h3>
                            <p class="post__lists">
                            <ul>
                                <?php $lists = $cfs->get('lists'); ?>
                                <?php if (!$lists == '') : ?>
                                    <?php
                                    $fields = $cfs->get('lists');
                                    foreach ($fields as $field) {
                                        echo "<li>" . $field['list'] . "</li>";
                                    };
                                    ?>
                                <?php else : ?>
                                <?php endif; ?>
                            </ul>
                            </p>
                            <p class="post__text">
                                <?php $text_2 = $cfs->get('text_2'); ?>
                                <?php if (!$text_2 == '') : ?>
                                    <?php echo $cfs->get('text_2'); ?>
                                <?php else : ?>
                                <?php endif; ?>
                            </p>

                            <h2 class="post__title--h2">
                                <?php $title_3 = $cfs->get('title_3'); ?>
                                <?php if (!$title_3 == '') : ?>
                                    <?php echo $cfs->get('title_3'); ?>
                                <?php else : ?>
                                <?php endif; ?>
                            </h2>
                            <div class="post__column">
                                <?php $text_3 = $cfs->get('text_3'); ?>
                                <?php if (!$text_3 == '') : ?>
                                    <p class="post__text"><?php echo $cfs->get('text_3'); ?>
                                    <?php else : ?>
                                    <?php endif; ?>
                                    </p>
                                    <div class="post__img">
                                        <?php $image = $cfs->get('image'); ?>
                                        <?php if (!$image == '') : ?>
                                            <img src="<?php echo $cfs->get('image'); ?>" alt="<?php the_title(); ?>" width="auto" height="auto" />
                                        <?php else : ?>
                                        <?php endif; ?>
                                    </div>
                            </div>

                            <h3 class="post__title--h3">
                                <?php $title_4 = $cfs->get('title_4'); ?>
                                <?php if (!$title_4 == '') : ?>
                                    <?php echo $cfs->get('title_4'); ?>
                                <?php else : ?>
                                <?php endif; ?>
                            </h3>
                            <p class="post__text">
                                <?php $text_4 = $cfs->get('text_4'); ?>
                                <?php if (!$text_4 == '') : ?>
                                    <?php echo $cfs->get('text_4'); ?>
                                <?php else : ?>
                                <?php endif; ?>
                            </p>
                        </div>
                        <div class="section__button-top">
                            <?php
                            // ブログ一覧ページのURLを取得
                            $blog_page_url = get_permalink(get_option('page_for_posts'));
                            ?>
                            <a href="<?php echo esc_url($blog_page_url); ?>">一覧に戻る</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>

    <?php get_template_part('template-parts/contact') ?>
</main>

<?php get_footer(); ?>